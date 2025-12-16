<?php

/**
 *@copyright :Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author     : Ram mohamad Singh< er.amudeep@gmail.com >
 */

namespace app\controllers;

use app\components\TActiveForm;
use app\components\TController;
use app\models\ContactForm;
use app\models\EmailQueue;
use app\models\User;
use Yii;
use app\components\filters\AccessControl;
use app\models\LostFoundPet;
use app\models\Pet;
use app\models\Petcategory;
use app\models\Post;
use app\models\search\LostFoundPet as SearchLostFoundPet;
use app\models\search\Pet as SearchPet;
use app\models\search\Post as SearchPost;
use yii\web\Response;
use app\modules\page\models\Page;
use bizley\contenttools\actions\UploadAction;
use bizley\contenttools\actions\InsertAction;
use bizley\contenttools\actions\RotateAction;
use yii\data\ActiveDataProvider;

class SiteController extends TController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'contact',
                            'about',
                            'privacy',
                            'terms',
                            'feed',
                            'error',
                            'content-tools-image-upload',
                            'content-tools-image-insert',
                            'content-tools-image-rotate',
                            'discover',
                            'pet-detail',
                            'ready-to-adopt',
                            'adopt',
                            'contact-now',
                            'local-services',
                            'alerts',
                            'events'
                        ],
                        'allow' => true,
                        'roles' => [
                            '*',
                            '@',
                            '?'
                        ]
                    ]
                ]
            ]
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'content-tools-image-upload' => UploadAction::className(),
            'content-tools-image-insert' => InsertAction::className(),
            'content-tools-image-rotate' => RotateAction::className()
        ];
    }

    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        return $this->render('error', [
            'message' => $exception->getMessage(),
            'name' => 'Error'
        ]);
    }

    public function actionIndex()
    {

        $this->layout = User::LAYOUT_GUEST_MAIN;
        $featured = Post::find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $searchModel = new SearchPost();
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->limit(6)->where(['state_id' => Post::STATE_ACTIVE])->orderBy('id DESC'),
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $featured
        ]);
    }

    public function actionContact()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $model = new ContactForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return TActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $sub = 'New Contact: ' . $model->subject;
            $from = $model->email;
            $message = \yii::$app->view->renderFile('@app/mail/contact.php', [
                'user' => $model
            ]);
            EmailQueue::sendEmailToAdmins([
                'from' => $from,
                'subject' => $sub,
                'html' => $message
            ], true);
            \Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'Warm Greetings!! Thank you for contacting us. We have received your request. Our representative will contact you soon.'));
            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionAbout()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $model = Page::find()->where([
            'type_id' => Page::TYPE_ABOUT_US
        ])->one();
        return $this->render('about', [
            'model' => $model
        ]);
    }

    public function actionDiscover()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        return $this->render('discover');
    }
    public function actionFeed()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $searchModel = new SearchPost();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('feed', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdopt()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $searchModel = new SearchPet();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;


        $petCategory = Petcategory::find()->where(['state_id' => Petcategory::STATE_ACTIVE])->orderBy(['created_on' => SORT_DESC])->all();

        return $this->render('adopt', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'petCategory' => $petCategory
        ]);
    }
    public function actionContactNow($id)
    {
        $pet = Pet::findOne($id);
        $model = new ContactForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return TActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {


                $sub = 'New Contact: ' . $model->subject;
                $from = $model->email;
                $message = \yii::$app->view->renderFile('@app/mail/contact.php', [
                    'user' => $model
                ]);
                EmailQueue::sendEmailToAdmins([
                    'from' => $from,
                    'subject' => $sub,
                    'html' => $message
                ], true);
                \Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'Warm Greetings!! Thank you for contacting us. We have received your request. Our representative will contact you soon.'));
                return $this->refresh();
            }
            // else {
            //     \Yii::$app->getSession()->setFlash('error', "Error !!" . $model->getErrorsString());
            // }
        }
        $this->layout = User::LAYOUT_GUEST_MAIN;
        return $this->render('adopt-now', ['pet' => $pet, 'model' => $model]);
    }

    public function actionLocalServices()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $searchModel = new SearchPet();
        $dataProvider = new ActiveDataProvider([
            'query' => Pet::find()->limit(4)->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('local-services', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionAlerts()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;

        $model = new LostFoundPet();
        $model->loadDefaultValues();
        $model->state_id = LostFoundPet::STATE_NEW;

        $model->checkRelatedData([
            'created_by_id' => User::class,
            'updated_by_id' => User::class,
        ]);

        $post = \yii::$app->request->post();
        if (\yii::$app->request->isAjax && $model->load($post)) {
            \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return TActiveForm::validate($model);
        }
        if ($model->load($post)) {
            $model->saveUploadedFile($model, 'image');
            if (!$model->save()) {
                \Yii::$app->getSession()->setFlash('error', "Error !!" . $model->getErrorsString());
            } else {
                if (Yii::$app->user->identity->role_id !== User::ROLE_ADMIN) {
                    \Yii::$app->getSession()->setFlash('success', "Your content is under admin review and will be published soon. ");
                }
                return $this->render('alerts', [
                    'model' => new LostFoundPet()
                ]);
            }
        }

        $searchModel = new SearchLostFoundPet();
        $dataProvider = new ActiveDataProvider([
            'query' => LostFoundPet::find()->limit(4)->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('alerts', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionEvents()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        return $this->render('events');
    }

    public function actionPetDetail()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;

        return $this->render('pet-detail');
    }
    public function actionPrivacy()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;
        $model = Page::find()->where([
            'type_id' => Page::TYPE_PRIVACY
        ])->one();
        return $this->render('policy', [
            'model' => $model
        ]);
    }

    public function actionTerms()
    {
        $this->layout = User::LAYOUT_GUEST_MAIN;

        $model = Page::find()->where([
            'type_id' => Page::TYPE_TERM_CONDITION
        ])->one();
        return $this->render('term', [
            'model' => $model
        ]);
    }
}

<?php

/**
 *@copyright :Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author     : Ram mohamad Singh< er.amudeep@gmail.com >
 */

namespace app\controllers;

use app\components\TController;
use app\models\User;
use app\components\filters\AccessControl;
use app\models\Pet;
use app\models\Petcategory;
use app\models\Post;
use app\models\Setting;
use Yii;

class DashboardController extends TController
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
                            'default-data'
                        ],
                        'allow' => true,
                        'roles' => [
                            '@'
                        ]
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $this->updateMenuItems();
        $smtpConfig = isset(\Yii::$app->settings) ? \Yii::$app->settings->smtp : null;
        $users = User::find()->count();
        if (Yii::$app->user->identity->role_id === User::ROLE_ADMIN) {
            $pets = Pet::find()->count();
            $posts = Post::find()->count();
            $petCat = Petcategory::find()->count();
        } else {
            $pets = Pet::find()->where(['created_by_id'=>Yii::$app->user->identity->id])->count();
            $posts = Post::find()->where(['created_by_id'=>Yii::$app->user->identity->id])->count();
            $petCat = Petcategory::find()->where(['created_by_id'=>Yii::$app->user->identity->id])->count();
        }
        if (empty($smtpConfig)) {
            Setting::setDefaultConfig();
        }
        return $this->render('index', [
            'users' => $users,
            'pets' => $pets,
            'posts' => $posts,
            'petCat' => $petCat
        ]);
    }

    public static function MonthlySignups()
    {
        $date = new \DateTime();
        $date->modify('-12  months');
        $count = array();
        for ($i = 1; $i <= 12; $i++) {
            $date->modify('+1 months');
            $month = $date->format('Y-m');

            $count[$month] = (int) Post::find()->where([
                'like',
                'created_on',
                $month
            ])
                ->andWhere([
                    '!=',
                    'state_id',
                    Post::STATE_DELETED
                ])
                ->count();
        }
        return $count;
    }

    public function actionDefaultData()
    {
        Setting::setDefaultConfig();
        $msg = 'Done !! Setting reset succefully!!!';
        \Yii::$app->session->setFlash('success', $msg);
        return $this->redirect(\Yii::$app->request->referrer);
    }
}

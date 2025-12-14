<?php

/**
 *@copyright : Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author	 : Amu < er.amu@live.com >
 */

namespace app\controllers;

use Yii;
use app\models\Pet;
use app\models\search\Pet as PetSearch;
use app\components\TController;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use app\models\User;
use yii\web\HttpException;
use app\components\TActiveForm;
use app\models\Post;
use app\models\search\Post as SearchPost;
use yii\data\ActiveDataProvider;

/**
 * PetController implements the CRUD actions for Pet model.
 */
class PetController extends TController
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'ruleConfig' => [
					'class' => AccessRule::className()
				],
				'rules' => [
					[
						'actions' => [
							'index',
							'add',
							'view',
							'update',
							'delete',
							'ajax',
							'mass',
							'detail'
						],
						'allow' => true,
						'roles' => [
							'@'
						]
					],
					[
						'actions' => [

							'view',
							'detail'
						],
						'allow' => true,
						'roles' => [
							'?',
							'*'
						]
					]
				]
			],
			'verbs' => [
				'class' => \yii\filters\VerbFilter::className(),
				'actions' => [
					'delete' => [
						'post'
					],
				]
			]
		];
	}


	/**
	 * Lists all Pet models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new PetSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$this->updateMenuItems();
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Pet model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);
		$this->updateMenuItems($model);
		return $this->render('view', ['model' => $model]);
	}

	public function actionDetail($id)
	{
		$this->layout = User::LAYOUT_GUEST_MAIN;
		$model = $this->findModel($id);
		$this->updateMenuItems($model);
		 $searchModel = new PetSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Pet::find()->limit(4)->orderBy('id DESC'),
            'pagination' => [
				'pageSize' => 4,
			],
        ]);

		$searchModelPost = new SearchPost();
		$dataProviderpost = new ActiveDataProvider([
			'query' => Post::find()->limit(4)->orderBy('id DESC'),
			'pagination' => [
				'pageSize' => 4,
			],
		]);

		return $this->render('detail', [
			'model' => $model,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'dataProviderpost'=>$dataProviderpost,
			'searchModelPost'=>$searchModelPost

		]);
	}


	/**
	 * Creates a new Pet model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionAdd()
	{
		$model = new Pet();
		$model->loadDefaultValues();
		$model->state_id = Pet::STATE_ACTIVE;
		$post = \yii::$app->request->post();
		if (\yii::$app->request->isAjax && $model->load($post)) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate($model);
		}
		if ($model->load($post)) {
			$model->saveUploadedFile($model, 'profile_picture');
			if (!$model->save()) {
				\Yii::$app->getSession()->setFlash('error', "Error !!" . $model->getErrorsString());
			} else {
				return $this->redirect($model->getUrl());
			}
		}
		$this->updateMenuItems();
		return $this->render('add', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Pet model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		$post = \yii::$app->request->post();
		if (\yii::$app->request->isAjax && $model->load($post)) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate($model);
		}
		$old_image = $model->profile_picture;
		if ($model->load($post)) {
				
			 if (! $model->saveUploadedFile($model, 'profile_picture', $old_image)) {
                $model->profile_picture = $old_image;
            }

			print_r($post);die;
			if (!$model->save()) {
				\Yii::$app->getSession()->setFlash('error', "Error !!" . $model->getErrorsString());
			} else {
				return $this->redirect($model->getUrl());
			}
		}
		$this->updateMenuItems($model);
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Pet model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		
		$model = $this->findModel($id);

		$model->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Pet model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Pet the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id, $accessCheck = true)
	{
		if (($model = Pet::findOne($id)) !== null) {

			if ($accessCheck && ! ($model->isAllowed()))
				throw new HttpException(403, Yii::t('app', 'You are not allowed to access this page.'));

			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	protected function updateMenuItems($model = null)
	{

		switch (\Yii::$app->controller->action->id) {

			case 'add': {
					$this->menu['manage'] = [
						'label' => '<span class="glyphicon glyphicon-list"></span>',
						'title' => Yii::t('app', 'Manage'),
						'url' => [
							'index'
						],
						//	'visible' => User::isAdmin ()
					];
				}
				break;
			case 'index': {
					$this->menu['add'] = [
						'label' => '<span class="glyphicon glyphicon-plus"></span>',
						'title' => Yii::t('app', 'Add'),
						'url' => [
							'add'
						],
						//	'visible' => User::isAdmin ()
					];
				}
				break;
			case 'update': {
					$this->menu['add'] = [
						'label' => '<span class="glyphicon glyphicon-plus"></span>',
						'title' => Yii::t('app', 'add'),
						'url' => [
							'add'
						],
						//	'visible' => User::isAdmin ()
					];
					$this->menu['manage'] = [
						'label' => '<span class="glyphicon glyphicon-list"></span>',
						'title' => Yii::t('app', 'Manage'),
						'url' => [
							'index'
						],
						//	'visible' => User::isAdmin ()
					];
				}
				break;
			default:
			 case 'view': {
                  
                    $this->menu['add'] = [
                        'label' => '<span class="glyphicon glyphicon-plus"></span>',
                        'title' => Yii::t('app', 'Add'),
                        'url' => [
                            'add'
                        ],
                        'visible' => User::isAdmin()
                    ];
                    if ($model != null)
                        $this->menu['update'] = [
                            'label' => '<span class="glyphicon glyphicon-pencil"></span>',
                            'title' => Yii::t('app', 'Update'),
                            'url' => $model->getUrl('update'),

                            'visible' => User::isAdmin()
                        ];
                    $this->menu['manage'] = [
                        'label' => '<span class="glyphicon glyphicon-list"></span>',
                        'title' => Yii::t('app', 'Manage'),
                        'url' => [
                            'index'
                        ],
                        'visible' => User::isAdmin()
                    ];
                    if ($model != null)
                        $this->menu['delete'] = [
                            'label' => '<span class="glyphicon glyphicon-trash"></span>',
                            'title' => Yii::t('app', 'Delete'),
                            'url' => $model->getUrl('delete'),
                            'htmlOptions' => [
                                'data-method' => 'post'
                            ],
                            'visible' => User::isAdmin()
                        ];
                }
		}
	}
}

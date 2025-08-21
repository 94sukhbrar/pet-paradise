<?php

/**
 *@copyright : Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author	 : Amu < er.amu@live.com >
 */

namespace app\controllers;

use app\components\filters\AccessControl;
use app\components\filters\AccessRule;
use Yii;
use app\models\Post;
use app\models\search\Post as PostSearch;
use app\components\TController;
use yii\web\NotFoundHttpException;
use app\models\User;
use yii\web\HttpException;
use app\components\TActiveForm;
use yii\data\ActiveDataProvider;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends TController
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
							'mass'
						],
						'allow' => true,
						'roles' => [
							'@'
						]
					],
					[
						'actions' => [

							'view',
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
	 * Lists all Post models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new PostSearch();
		if (Yii::$app->user->identity->role_id == User::ROLE_ADMIN) {
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			$this->updateMenuItems();
			$this->layout = User::LAYOUT_MAIN;
			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		} else {
			$dataProvider = new ActiveDataProvider([
				'query' => Post::find()->orderBy(['created_on' => SORT_DESC]),
				'pagination' => [
					'pageSize' => 10,
				],
			]);
			$this->layout = User::LAYOUT_PET_MAIN;
			return $this->render('feed', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}
	}

	/**
	 * Displays a single Post model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);
		$this->updateMenuItems($model);
		return $this->render('view', ['model' => $model]);
	}

	/**
	 * Creates a new Post model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionAdd()
	{
		$model = new Post();
		$model->loadDefaultValues();
		$model->state_id = Post::STATE_ACTIVE;
		$post = \yii::$app->request->post();
		if (\yii::$app->request->isAjax && $model->load($post)) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate($model);
		}
		if ($model->load($post)) {
			$model->saveUploadedFile($model, 'image_file');
			$model->save();
			return $this->redirect($model->getUrl());
		}
		$this->updateMenuItems();
		return $this->render('add', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Post model.
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
		if ($model->load($post)) {
			if(isset($model->image_file)){
				$model->saveUploadedFile($model, 'image_file');
			}
			$model->save();
			return $this->redirect($model->getUrl());
		}
		$this->updateMenuItems($model);
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Post model.
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
	 * Finds the Post model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Post the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id, $accessCheck = true)
	{
		if (($model = Post::findOne($id)) !== null) {

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
					$this->menu['manage'] = [
						'label' => '<span class="glyphicon glyphicon-list"></span>',
						'title' => Yii::t('app', 'Manage'),
						'url' => [
							'index'
						],
						//	'visible' => User::isAdmin ()
					];
					if ($model != null) {
						$this->menu['update'] = [
							'label' => '<span class="glyphicon glyphicon-pencil"></span>',
							'title' => Yii::t('app', 'Update'),
							'url' => $model->getUrl(),
							//		'visible' => User::isAdmin ()
						];
						$this->menu['delete'] = [
							'label' => '<span class="glyphicon glyphicon-trash"></span>',
							'title' => Yii::t('app', 'Delete'),
							'url' => $model->getUrl()
							//	 'visible' => User::isAdmin ()
						];
					}
				}
		}
	}
}

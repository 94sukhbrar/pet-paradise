<?php
/**
 *
 *@copyright :Amusoftech Pvt. Ltd. < www.amusoftech.com >
*@author     : Sukhwinder Kaur< er.brarsukh@gmail.com >
 *
 * All Rights Reserved.
 * Proprietary and confidential :  All information contained herein is, and remains
 * the property of Amusoftech Pvt. Ltd. and its partners.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 */
namespace app\controllers;

use Yii;
use app\models\LostFoundPet;
use app\models\search\LostFoundPet as LostFoundPetSearch;
use app\components\TController;
use yii\web\NotFoundHttpException;
use app\components\filters\AccessRule;
use app\components\filters\AccessControl;
use app\models\User;
use yii\web\HttpException;
use app\components\TActiveForm;
/**
 * LostFoundPetController implements the CRUD actions for LostFoundPet model.
 */
class LostFoundPetController extends TController
{
  public function behaviors() {
		return [
				'access' => [
						'class' => AccessControl::className (),
						'ruleConfig' => [
								'class' => AccessRule::className ()
						],
						'rules' => [
								[
										'actions' => [
												'clear',
												'delete',
										],
										'allow' => true,
										'matchCallback' => function () {
                                            return User::isAdmin();
                                        }
								],
								[
										'actions' => [
												'index',
												'add',
												'view',
												'update',
												'clone',
												'ajax',
												'mass'
										],
										'allow' => true,
										'roles' => [
												'@'
										]
								]
								
						]
				],
				'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'post'
                    ]
                ]
            ]
		];
	}


    /**
     * Lists all LostFoundPet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LostFoundPetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 		$this->updateMenuItems();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LostFoundPet model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $this->updateMenuItems($model);
        if(Yii::$app->request->isAjax) 
		{
    		return $this->renderAjax('view', [
                'model' => $model
            ]);
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * actionMass delete in mass as items are checked
     *
     * @param string $action
     * @return string
     */
    public function actionMass($action = 'delete')
    {
        \Yii::$app->response->format = 'json';
        $response['status'] = 'NOK';
        $status = LostFoundPet::massDelete();
        if ($status == true) {
            $response['status'] = 'OK';
        }
        return $response;
    }
    
    /**
     * Creates a new LostFoundPet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd(/* $id*/)
    {
        $model = new LostFoundPet();
        $model->loadDefaultValues();
        $model->state_id = LostFoundPet::STATE_ACTIVE;
        
       /* if (is_numeric($id)) {
            $post = Post::findOne($id);
            if ($post == null)
            {
              throw new NotFoundHttpException('The requested post does not exist.');
            }
            $model->id = $id;
                
        }*/
        
        $model->checkRelatedData([
       	'created_by_id' => User::class,
	'updated_by_id' => User::class,
        ]);
		$post = \yii::$app->request->post ();
		if (\yii::$app->request->isAjax && $model->load ( $post )) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate ( $model );
		}
        if ($model->load($post) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('app', "Record has been added Successfully."));        
            return $this->redirect($model->getUrl());
        }
        $this->updateMenuItems();
        return $this->render('add', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing LostFoundPet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

 		$post = \yii::$app->request->post ();
		if (\yii::$app->request->isAjax && $model->load ( $post )) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate ( $model );
		}
        if ($model->load($post) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('app', "Record has been updated Successfully."));
            return $this->redirect($model->getUrl());
        }
        $this->updateMenuItems($model);
        if(Yii::$app->request->isAjax) 
		{
    		return $this->renderAjax('update', [
                'model' => $model
            ]);
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }
    
    /**
     * Clone an existing LostFoundPet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionClone($id)
    {
        $old = $this->findModel($id);
        
        $model = new LostFoundPet();
        $model->loadDefaultValues();
        $model->state_id = LostFoundPet::STATE_ACTIVE;
        
        		 	 $model->pet_name  = $old->pet_name;
				 	 $model->pet_type  = $old->pet_type;
				 	 $model->last_seen_location  = $old->last_seen_location;
				 	 $model->date_lost  = $old->date_lost;
				 	 $model->found_location  = $old->found_location;
				 	 $model->date_found  = $old->date_found;
				 	 $model->image  = $old->image;
				 	 $model->reward_amount  = $old->reward_amount;
		//$model->state_id  = $old->state_id		 	 $model->state_id  = $old->state_id;
				 	 $model->type_id  = $old->type_id;
		//$model->created_on  = $old->created_on		 	 $model->created_on  = $old->created_on;
				 	 $model->updated_on  = $old->updated_on;
		//$model->created_by_id  = $old->created_by_id		 	 $model->created_by_id  = $old->created_by_id;
				 	 $model->updated_by_id  = $old->updated_by_id;
				
 		$post = \yii::$app->request->post ();
		if (\yii::$app->request->isAjax && $model->load ( $post )) {
			\yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return TActiveForm::validate ( $model );
		}
        if ($model->load($post) && $model->save()) {
            return $this->redirect($model->getUrl());
        }
        $this->updateMenuItems($model);
        return $this->render('update', [
                'model' => $model,
            ]);

    }
    
    /**
     * Deletes an existing LostFoundPet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

		if(\yii::$app->request->post())
		{
			$model->delete();
			\Yii::$app->getSession()->setFlash('success', \Yii::t('app', "Record has been deleted Successfully."));
        	return $this->redirect(['index']);
		}
		return $this->render('delete', [
                'model' => $model,
            ]);
    }
    /**
     * Truncate an existing LostFoundPet model.
     * If truncate is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionClear($truncate = true)
    {
        $query = LostFoundPet::find();
        foreach ($query->each() as $model) {
            $model->delete();
        }
        if ($truncate) {
            LostFoundPet::truncate();
        }
        \Yii::$app->session->setFlash('success', 'LostFoundPet Cleared !!!');
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the LostFoundPet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LostFoundPet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $accessCheck = true)
    {
        if (($model = LostFoundPet::findOne($id)) !== null) {

			if ($accessCheck && ! ($model->isAllowed ()))
				throw new HttpException ( 403, Yii::t ( 'app', 'You are not allowed to access this page.' ) );

            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
  
 protected function updateMenuItems($model = null)
    {
        switch (\Yii::$app->controller->action->id) {
            
            case 'add':
                {
                    $this->menu['manage'] = [
                        'label' => '<span class="glyphicon glyphicon-list"></span>',
                        'title' => Yii::t('app', 'Manage'),
                        'url' => [
                            'index'
                        ]
                        // 'visible' => User::isAdmin ()
                    ];
                }
                break;
            case 'index':
                {
                    $this->menu['add'] = [
                        'label' => '<span class="glyphicon glyphicon-plus"></span>',
                        'title' => Yii::t('app', 'Add'),
                        'url' => [
                            'add'
                        ]
                        // 'visible' => User::isAdmin ()
                    ];
                    $this->menu['clear'] = [
                        'label' => '<span class="glyphicon glyphicon-remove"></span>',
                        'title' => Yii::t('app', 'Clear'),
                        'url' => [
                            'clear'
                        ],
                        'htmlOptions' => [
                            'data-confirm' => "Are you sure to delete these items?"
                        ],
                         'visible' => false
                    ];
                }
                break;
            case 'update':
                {
                    $this->menu['add'] = [
                        'label' => '<span class="glyphicon glyphicon-plus"></span>',
                        'title' => Yii::t('app', 'add'),
                        'url' => [
                            'add'
                        ]
                        // 'visible' => User::isAdmin ()
                    ];
                    $this->menu['manage'] = [
                        'label' => '<span class="glyphicon glyphicon-list"></span>',
                        'title' => Yii::t('app', 'Manage'),
                        'url' => [
                            'index'
                        ]
                        // 'visible' => User::isAdmin ()
                    ];
                }
                break;
 
            default:
            case 'view':
                {
                    $this->menu['manage'] = [
                        'label' => '<span class="glyphicon glyphicon-list"></span>',
                        'title' => Yii::t('app', 'Manage'),
                        'url' => [
                            'index'
                        ]
                        // 'visible' => User::isAdmin ()
                    ];
                    if ($model != null) {
                        $this->menu['clone'] = array(
                            'label' => '<span class="glyphicon glyphicon-file">Clone</span>',
                            'title' => Yii::t('app', 'Clone'),
                            'url' => $model->getUrl('clone'),
                            'visible' => false
                        );
                      $this->menu['update'] = [
                            'label' => '<span class="glyphicon glyphicon-pencil"></span>',
                            'title' => Yii::t('app', 'Update'),
                            'url' => $model->getUrl('update')
                            // 'visible' => User::isAdmin ()
                        ];
                        $this->menu['delete'] = [
                            'label' => '<span class="glyphicon glyphicon-trash"></span>',
                            'title' => Yii::t('app', 'Delete'),
                            'htmlOptions' => [
                                'data-method' => 'post'
                             ],
                            'url' => $model->getUrl('delete')
                            // 'visible' => User::isAdmin ()
                        ];
                    }
                }
        }
    }


 }

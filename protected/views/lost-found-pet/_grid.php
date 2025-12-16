<?php

use app\components\TGridView;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\MassAction;
use app\models\User;

use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\LostFoundPet $searchModel
 */

?>
<?php

echo MassAction::widget([
    'url' => Url::toRoute([
        '/lost-found-pet/mass'
    ]),
    'grid_id' => 'lost-found-pet-grid',
    'pjax_grid_id' => 'lost-found-pet-pjax-grid'
]);

?>
<div class='table table-responsive'>

    <?php Pjax::begin(['id' => 'lost-found-pet-pjax-grid']); ?>
    <?php echo TGridView::widget([
        'id' => 'lost-found-pet-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn','header'=>'<a>S.No.<a/>'],
            [
                'name' => 'check',
                'class' => 'yii\grid\CheckboxColumn',
                'visible' => User::isAdmin()
            ],

            //'id',
             'pet_name',
            [
                'attribute' => 'pet_type',
                'format' => 'raw',
                'filter' => isset($searchModel) ? $searchModel->getPetCategoryOptions() : null,
                'value' => function ($data) {
                    return $data->getCategory();
                },
            ],
            // 'last_seen_location',
            // 'date_lost:date',
            // 'found_location',
            // 'date_found:date',
            /* 'image',*/
            // 'reward_amount',
            [
                'attribute' => 'state_id',
                'format' => 'raw',
                'filter' => isset($searchModel) ? $searchModel->getStateOptions() : null,
                'value' => function ($data) {
                    return $data->getStateBadge();
                },
            ],
            [
                'attribute' => 'type_id',
                'filter' => isset($searchModel) ? $searchModel->getTypeOptions() : null,
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->getTypeBadge();
                },
            ],


            [
                'attribute' => 'created_by_id',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->getRelatedDataLink('created_by_id');
                },
            ],
            /* [
				'attribute' => 'updated_by_id',
				'format'=>'raw',
				'value' => function ($data) { return $data->getRelatedDataLink('updated_by_id');  },
				],*/

            [
                'class' => 'app\components\TActionColumn',
                'header' => '<a>Actions</a>'/*  'showModal' => \Yii::$app->params['useCrudModals'] = false */
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
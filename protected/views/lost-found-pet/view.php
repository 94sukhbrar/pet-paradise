<?php

use app\components\useraction\UserAction;
use app\models\LostFoundPet;
use app\models\User;
use app\modules\comment\widgets\CommentsWidget;
/* @var $this yii\web\View */
/* @var $model app\models\LostFoundPet */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lost Found Pets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (string)$model;
?>

<div class="wrapper">
	<div class=" card ">

		<div
			class="lost-found-pet-view card-body">
			<?= \app\components\PageHeader::widget(['model' => $model]); ?>



		</div>
	</div>

	<div class=" card ">
		<div class=" card-body ">
			<?php echo \app\components\TDetailView::widget([
				'id'	=> 'lost-found-pet-detail-view',
				'model' => $model,
				'options' => ['class' => 'table table-bordered'],
				'attributes' => [
					'id',
					[
						'attribute' => 'pet_name',
						'visible' =>  !empty($model->pet_name),
					],
					[
						'attribute' => 'pet_type',
						'format' => 'raw',
						'filter' => isset($searchModel) ? $searchModel->getPetCategoryOptions() : null,
						'value' => function ($data) {
							return $data->getCategory();
						},
					],
					[
						'attribute' => 'last_seen_location',
						'visible' => !empty($model->last_seen_location),
					],
					[
						'attribute' => 'date_lost',
						'visible' =>  !empty($model->date_lost),
					],
					[
						'attribute' => 'found_location',
						'visible' => !empty($model->found_location),
					],
					[
						'attribute' => 'date_found',
						'visible' =>  !empty($model->date_found),
					],
					[
						'attribute' => 'date_found',
						'visible' =>  !empty($model->reward_amount),
					],
					[
						'attribute' => 'type_id',
						'filter' => isset($searchModel) ? $searchModel->getTypeOptions() : null,
						'format' => 'raw',
						'value' => function ($data) {
							return $data->getTypeBadge();
						},
					],
					'created_on:datetime',
					'updated_on:datetime',
					[
						'attribute' => 'created_by_id',
						'format' => 'raw',
						'value' => $model->getRelatedDataLink('created_by_id'),
					],
					// [
					// 	'attribute' => 'updated_by_id',
					// 	'format' => 'raw',
					// 	'value' => $model->getRelatedDataLink('updated_by_id'),
					// ],
				],
			]) ?>


			<?php  ?>

			<?php

			if (Yii::$app->user->identity->role_id === User::ROLE_ADMIN) {
				echo UserAction::widget([
					'model' => $model,
					'attribute' => 'state_id',
					'states' => $model->getStateOptions()
				]);
			}
			?>

		</div>
	</div>



	<div class=" card ">
		<div class=" card-body ">
			<div
				class="lost-found-pet-panel">

				<?php
				$this->context->startPanel();
				$this->context->addPanel('Feeds', 'feeds', 'Feed', $model /*,null,true*/);

				$this->context->endPanel();
				?>
			</div>
		</div>
	</div>

	<div class=" card ">
		<div class=" card-body ">
			<?php //CommentsWidget::widget(['model'=>$model]); 
			?>
		</div>
	</div>
</div>
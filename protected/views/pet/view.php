<?php

use app\components\useraction\UserAction;
/* @var $this yii\web\View */
/* @var $model app\models\Pet */

/*$this->title =  $model->label() .' : ' . $model->name; */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (string)$model;
?>

<div class="wrapper">
	<div class=" panel ">

		<div
			class="pet-view panel-body">
			<?php echo  \app\components\PageHeader::widget(['model' => $model]); ?>



		</div>
	</div>

	<div class=" panel ">
		<div class=" panel-body ">
			<?php echo \app\components\TDetailView::widget([
				'id'	=> 'pet-detail-view',
				'model' => $model,
				'options' => ['class' => 'table table-bordered'],
				'attributes' => [
					'id',
					'name',
					/*'content:html',*/
					'date_of_birth:date',
					[
						'attribute' => 'gender',
						'format' => 'raw',
						'filter' => isset($searchModel) ? $searchModel->getGenders() : null,
						'value' => function ($data) {
							return $data->getGender();
						},
					],
					'about_me',
					'contact_no',
					'address',
					'breed',
					[
						'attribute' => 'pet_category_id',
						'format' => 'raw',
						'value' => $model->getRelatedDataLink('pet_category_id'),
					],
					[
						'attribute' => 'state_id',
						'format' => 'raw',
						'value' => $model->getStateBadge(),
					],
					[
						'attribute' => 'type_id',
						'value' => $model->getType(),
					],
					'created_on:datetime',
					'updated_on:datetime',
					[
						'attribute' => 'created_by_id',
						'format' => 'raw',
						'value' => $model->getRelatedDataLink('created_by_id'),
					],
				],
			]);

			?>

			<?php echo $model->content; ?>


			<?php echo UserAction::widget([
				'model' => $model,
				'attribute' => 'state_id',
				'states' => $model->getStateOptions()
			]);
			?>

		</div>
	</div>
	<div class="panel">
		<div class="panel-body">
			<?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'blog-header.jpg'); ?>

		</div>
	</div>
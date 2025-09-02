<?php

use app\components\useraction\UserAction;
/* @var $this yii\web\View */
/* @var $model app\models\Petcategory */

/*$this->title =  $model->label() .' : ' . $model->title; */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Petcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (string)$model;
?>

<div class="wrapper">
	<div class=" panel ">

		<div
			class="petcategory-view panel-body">
			<?php echo  \app\components\PageHeader::widget(['model' => $model]); ?>



		</div>
	</div>

	<div class=" panel ">
		<div class=" panel-body ">
			<?php echo \app\components\TDetailView::widget([
				'id'	=> 'petcategory-detail-view',
				'model' => $model,
				'options' => ['class' => 'table table-bordered'],
				'attributes' => [
					'id',
					'title',
					'pet_icon',
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
			]) ?>


			<?php  ?>


			<?php echo UserAction::widget([
				'model' => $model,
				'attribute' => 'state_id',
				'states' => $model->getStateOptions()
			]);
			?>

		</div>
	</div>



	<div class=" panel ">
		<div class=" panel-body ">
			 <?= $model->displayImage($model->pet_icon, $options = [], $defaultImg = 'blog-header.jpg'); ?>
			<div class="petcategory-panel">

				<?php
				$this->context->startPanel();
				$this->context->addPanel('Pets', 'pets', 'Pet', $model);

				$this->context->endPanel();
				?>
			</div>
		</div>
	</div>
<?php

use app\components\useraction\UserAction;
use app\models\User;
use app\modules\comment\widgets\CommentsWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Post */

/*$this->title =  $model->label() .' : ' . $model->title; */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (string)$model;
?>

<div class="wrapper">
	<div class=" panel ">

		<div
			class="post-view panel-body">
			<?php echo  \app\components\PageHeader::widget(['model' => $model]); ?>



		</div>
	</div>

	<div class=" panel ">
		<div class=" panel-body ">
			<?php echo \app\components\TDetailView::widget([
				'id'	=> 'post-detail-view',
				'model' => $model,
				'options' => ['class' => 'table table-bordered'],
				'attributes' => [
					'id',
					'title',
					/*'content:html',*/
					'keywords',
					'image_file',
					'view_count',
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


			<?php echo $model->content; ?>



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
	<div class="card">
		<div class="card-body">
			<?= $model->displayImage($model->image_file, ['class' => 'w-50 mb-3 rounded'], 'default.png', true); ?>
		</div>
	</div>
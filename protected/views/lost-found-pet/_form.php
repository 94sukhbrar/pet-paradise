<?php

use yii\helpers\Html;
use app\components\TActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\LostFoundPet */
/* @var $form yii\widgets\ActiveForm */
?>
<header class="card-header">
	<?= strtoupper(Yii::$app->controller->action->id); ?>
</header>
<div class="card-body">
	<?php
	$form = TActiveForm::begin([

		'id'	=> 'lost-found-pet-form',
		'options' => [
			'class' => 'row'
		]
	]);
	//echo $form->errorSummary($model);	
	?>


	<div class="row">


		<div class="col-md-6">
			<?php /*echo $form->field($model, 'pet_name')->textInput(['maxlength' => 255]) */ ?>
		</div>


		<div class="col-md-6">

			<?php echo $form->field($model, 'pet_type')->textInput(['maxlength' => 100]) ?>
		</div>


		<div class="col-md-6">

			<?php /*echo $form->field($model, 'last_seen_location')->textInput(['maxlength' => 255]) */ ?>
		</div>


		<div class="col-md-6">

			<?php /*echo $form->field($model, 'date_lost')->widget(yii\jui\DatePicker::class,
			[
					//'dateFormat' => 'php:Y-m-d',
	 				'options' => [ 'class' => 'form-control' ],
	 				'clientOptions' =>
	 				[
			'minDate' => date('Y-m-d'),
            'maxDate' => date('Y-m-d',strtotime('+30 days')),
			'changeMonth' => true,'changeYear' => true ] ]) */ ?>
		</div>


		<div class="col-md-6">
			<?php /*echo $form->field($model, 'found_location')->textInput(['maxlength' => 255]) */ ?>
		</div>


		<div class="col-md-6">

			<?php /*echo $form->field($model, 'date_found')->widget(yii\jui\DatePicker::class,
			[
					//'dateFormat' => 'php:Y-m-d',
	 				'options' => [ 'class' => 'form-control' ],
	 				'clientOptions' =>
	 				[
			'minDate' => date('Y-m-d'),
            'maxDate' => date('Y-m-d',strtotime('+30 days')),
			'changeMonth' => true,'changeYear' => true ] ]) */ ?>
		</div>



		<div class="col-md-6">

			<?php /*echo $form->field($model, 'image')->textInput(['maxlength' => 255]) */ ?>
		</div>


		<div class="col-md-6">

			<?php /*echo $form->field($model, 'reward_amount')->textInput(['maxlength' => 10]) */ ?>
		</div>


		<div class="col-md-6">

			<?php if (User::isAdmin()) { ?> <?php echo $form->field($model, 'state_id')->dropDownList($model->getStateOptions(), ['prompt' => '']) ?>
			<?php } ?> </div>


		<div class="col-md-6">

			<?php echo $form->field($model, 'type_id')->dropDownList($model->getTypeOptions(), ['prompt' => '']) ?>
		</div>


		<div class="col-md-6">

			<?php /*echo $form->field($model, 'updated_by_id')->dropDownList($model->getUpdatedByOptions(), ['prompt' => '']) */ ?>


		</div>

	</div>



	<div
		class="col-md-12 bottom-admin-button btn-space-bottom text-right">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['id' => 'lost-found-pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php TActiveForm::end(); ?>
</div>
<?php

use yii\helpers\Html;
use app\components\TActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */
/* @var $form yii\widgets\ActiveForm */
?>
<header class="panel-heading">
	<?php echo strtoupper(Yii::$app->controller->action->id); ?>
</header>
<div class="panel-body">

	<?php
	$form = TActiveForm::begin([
		// 'layout' => 'horizontal',
		'id'	=> 'pet-form',
	]);


	echo $form->errorSummary($model);
	?>





	<div class="col-md-6">


		<?php echo $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>



		<?php echo $form->field($model, 'content')->textarea(['rows' => 6]); 
		?>



		<?php echo $form->field($model, 'date_of_birth')->widget(yii\jui\DatePicker::className(),
			[
					//'dateFormat' => 'php:Y-m-d',
	 				'options' => [ 'class' => 'form-control' ],
	 				'clientOptions' =>
	 				[
			//'minDate' => 0,
			'changeMonth' => true,'changeYear' => true ] ])  ?>



		<?php echo $form->field($model, 'gender')->dropDownList($model->getGenderOptions(), ['prompt' => '']) ?>



		<?php echo $form->field($model, 'about_me')->textarea(['rows' => 6,'placeholder'=>'About my like and dislike'])?>



		<?php echo $form->field($model, 'contact_no')->textInput(['maxlength' => 255]) ?>


	</div>
	<div class="col-md-6">


		<?php echo $form->field($model, 'address')->textInput(['maxlength' => 512]) ?>



		<?php echo $form->field($model, 'breed')->textInput(['maxlength' => 100]) ?>



		<?php echo $form->field($model, 'pet_category_id')->dropDownList($model->getPetCategoryOptions(), ['prompt' => '']) ?>

		<?php echo $form->field($model, 'profile_picture')->fileInput()  ?>



		<?php echo $form->field($model, 'state_id')->dropDownList($model->getStateOptions(), ['prompt' => '']) ?>
		


		<?php echo $form->field($model, 'type_id')->dropDownList($model->getTypeOptions(), ['prompt' => ''])  ?>

	</div>




	<div class="form-group">
		<div
			class="col-md-6 col-md-offset-3 bottom-admin-button btn-space-bottom text-right">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['id' => 'pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>

	<?php TActiveForm::end(); ?>

</div>
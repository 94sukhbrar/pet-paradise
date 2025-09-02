<?php

/**
 *@copyright : ToXSL Technologies Pvt. Ltd. < www.toxsl.com >
 *@author	 : Shiv Charan Panjeta < shiv@toxsl.com >
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use app\components\TActiveForm;

/*
 * $this->title = 'Contact';
 * $this->params ['breadcrumbs'] [] = $this->title;
 */
?>


<div class="site-about pt--60 pb--60">
	<div class="container mt-4">
		<div class="row mt-4">
			<div class="col-sm-8 col-md-8 offset-2 mt-4">
				<div class="form-outer padd-lt">
					<?php
					$form = TActiveForm::begin([
						'id' => 'contact-form',
						'options' => [
							'class' => 'driver-form form-horizontal'
						],
						'fieldConfig' => [
							'template' => "{label}{input}{error}"
						]
					]);
					?>
					<div class="row">
						<div class="col-md-6">
							<?php echo $form->field($model, 'name')->textInput(['placeholder' => 'Name']) ?>
						</div>
						<div class="col-md-6">
							<?php echo  $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>
						</div>
					</div>

					<?php echo  $form->field($model, 'subject')->textInput(['placeholder' => 'Subject']) ?>
					<?php echo $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => 'Message']) ?>
					<?php

					echo \yii\helpers\Html::submitButton('Submit', [
						'class' => 'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light',
						'name' => 'submit-button'
					]) ?>

					<?php TActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
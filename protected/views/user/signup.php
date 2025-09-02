<?php

use app\components\TActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<section class="main-content hero-wrap mt-4">
	<div class="a mt-4">
		<div class="overlay"></div>
		<div class="inner-section mt-4 mb-4 ">
			<div class="container mt-4">
				<div class="login-box card mt-4">
					<div class="card-block">
						<?php

						$form = TActiveForm::begin([
							'id' => 'form-signup',
							'options' => [
								'class' => 'login-form form-horizontal form-material'
							]
						]);
						?>
						<h3 class="box-title m-b-20">Sign Up</h3>
						<?= $form->field($model, 'full_name', ['template' => '<div class="col-xs-12">{input}{error}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Full Name'])->label(false) ?>
						<?= $form->field($model, 'email', ['template' => '<div class="col-xs-12">{input}{error}</div>'])->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label(false) ?>
						<?= $form->field($model, 'password', ['template' => '<div class="col-xs-12">{input}{error}</div>'])->passwordInput(['maxlength' => true, 'placeholder' => 'Password'])->label(false) ?>
						<?= $form->field($model, 'confirm_password', ['template' => '<div class="col-xs-12">{input}{error}</div>'])->passwordInput(['maxlength' => true, 'placeholder' => 'Confirm Password'])->label(false) ?>

						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<?= Html::submitButton(Yii::t("app", 'Sign In'), ['class' => 'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light', 'name' => 'signup-button']) ?>
							</div>
						</div>
						<div class="form-group m-b-0">
							<div class="col-sm-12 text-center">
								<p>
									<?= Yii::t("app", 'Already have an account?') ?> <a
										href="<?= Url::toRoute(['/user/login']) ?>"
										class="text-info m-l-5"><b><?= Yii::t("app", 'Sign In') ?></b></a>
								</p>
							</div>
						</div>
						<?php

						TActiveForm::end();
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
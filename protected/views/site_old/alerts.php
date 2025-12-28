<?php

use app\components\TActiveForm;
use app\models\LostFoundPet;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>
<div class="container">

    <!-- HEADER -->
    <div class="lost-found-header text-center">
        <h2><i class="fa-solid fa-paw"></i> Lost & Found Pets</h2>
        <p>Help the community by sharing details about missing or found pets.</p>
    </div>


    <div class="row">
        <!-- LOST PET FORM -->
        <div class="col-md-6">
            <div class="pet-form-box">
                <div class="form-title"><i class="fa-solid fa-search"></i> Report Lost Pet</div>

                <?php $form = TActiveForm::begin([

                    'id'    => 'lost-pet-form',

                ]);
                //echo $form->errorSummary($model);	
                ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'pet_name')->textInput(['maxlength' => 255]) ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'pet_type')->dropDownList($model->getPetCategoryOptions(), ['prompt' => '']) ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'location')->textInput(['maxlength' => 255])->label('Last Seen Location');; ?>
                </div>
                <?php echo $form->field($model, 'type_id')->hiddenInput(['maxlength' => 100, 'value' => LostFoundPet::TYPE_LOST])->label(false); ?>

                <div class="form-group">
                    <?php echo $form->field($model, 'date_lost')->widget(
                        yii\jui\DatePicker::class,
                        [
                            //'dateFormat' => 'php:Y-m-d',
                            'options' => ['class' => 'form-control'],
                            'clientOptions' =>
                            [
                                'minDate' => -15,
                                'maxDate' => date('Y-m-d'),
                                'changeMonth' => true,
                                'changeYear' => true
                            ]
                        ]
                    ) ?>

                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'image')->fileInput(['class' => 'form-control'])  ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'contact_detail')->textarea(['rows' => 6]); ?>
                </div>

                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Lost Report') : Yii::t('app', 'Update'), ['id' => 'lost-pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-success btn-block']) ?>

                <?php TActiveForm::end(); ?>
            </div>
        </div>

        <!-- FOUND PET FORM -->
        <div class="col-md-6">
            <div class="pet-form-box">
                <div class="form-title"><i class="fa-solid fa-dog"></i> Report Found Pet</div>

                <?php $form = TActiveForm::begin([

                    'id'    => 'found-pet-form',

                ]);
                //echo $form->errorSummary($model);	
                ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'pet_type')->dropDownList($model->getPetCategoryOptions(), ['prompt' => '']) ?>
                </div>
                <?php echo $form->field($model, 'type_id')->hiddenInput(['maxlength' => 100, 'value' => LostFoundPet::TYPE_FOUND])->label(false); ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'location')->textInput(['maxlength' => 255, "placeholder" => "Example: Bus Stand, Ferozepur"])->label('Found At'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'date_found')->widget(
                        yii\jui\DatePicker::class,
                        [
                            //'dateFormat' => 'php:Y-m-d',
                            'options' => ['class' => 'form-control'],
                            'clientOptions' =>
                            [
                                'minDate' => -15,
                                'maxDate' => date('Y-m-d'),
                                'changeMonth' => true,
                                'changeYear' => true
                            ]
                        ]
                    ); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'image')->fileInput(['class' => 'form-control'])  ?>
                </div>
                <div class="form-group">
                    <?php echo $form->field($model, 'contact_detail')->textarea(['rows' => 6]); ?>
                </div>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Found Report') : Yii::t('app', 'Update'), ['id' => 'found-pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-primary btn-block' : 'btn btn-primary btn-block']) ?>

                <?php TActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 style="color:#148f77;">Recent Reports</h4>
        <a href="<?= Url::to(['site/lost-found'])  ?>" class="text-success font-weight-bold">
            See all reports →
        </a>
    </div>

    <div class="row">
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_alert',
            'layout' => "<div class='row'>{items}</div>",
            'options' => ['class' => 'container', 'id' => 'pet-list'],
            'itemOptions' => ['class' => 'col-lg-3 col-md-4 mb-4'],
        ]);

        ?>
    </div>

</div>
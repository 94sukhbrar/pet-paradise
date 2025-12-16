<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .lost-found-header {
        background: #009688;
        color: #fff;
        padding: 40px;
        border-radius: 10px;
        margin-bottom: 40px;
    }

    .lost-found-header h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .pet-form-box {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .pet-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
    }

    .pet-card img {
        border-radius: 10px;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .badge-lost {
        background: #e91e63 !important;
        font-size: 12px;
    }

    .badge-found {
        background: #4caf50 !important;
        font-size: 12px;
    }

    .form-title {
        font-size: 20px;
        font-weight: bold;
        color: #009688;
        margin-bottom: 15px;
    }
</style>
<?php

use app\components\TActiveForm;
use app\models\LostFoundPet;
use yii\helpers\Html;

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
                    <?php echo $form->field($model, 'last_seen_location')->textInput(['maxlength' => 255]); ?>
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
                    <?php echo $form->field($model, 'contact_detail')->textarea(['rows' => 6]);?>
                </div>

                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Lost Report') : Yii::t('app', 'Update'), ['id' => 'lost-found-pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-success btn-block']) ?>

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
                    <?php echo $form->field($model, 'found_location')->textInput(['maxlength' => 255, "placeholder" => "Example: Bus Stand, Ferozepur"]); ?>

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
                    <?php echo $form->field($model, 'contact_detail')->textarea(['rows' => 6]);?>
                </div>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Found Report') : Yii::t('app', 'Update'), ['id' => 'lost-found-pet-form-submit', 'class' => $model->isNewRecord ? 'btn btn-primary btn-block' : 'btn btn-primary btn-block']) ?>

                <?php TActiveForm::end(); ?>
            </div>
        </div>
    </div>



    <!-- LIST OF LOST & FOUND PETS -->
    <h3 class="mt-5 mb-3" style="color:#009688;">Recent Reports</h3>

    <div class="row">

        <!-- example cards -->
       <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_alert', // your view file for each record
            'options' => [
                'tag' => 'div',
                'class' => 'row',   // remove main wrapper class
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-3',  // or 'div' with empty class
            ],
            'summaryOptions' => [
                'tag' => 'div',
                'class' => 'row col-md-12',   // remove summary class
            ],
            'summary' => false,
            'pager' => ['options' => ['style' => 'display:none']],
        ]) ?> 


        

    </div>

</div>
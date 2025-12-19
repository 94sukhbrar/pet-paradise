<?php

use app\models\LostFoundPet;
use yii\helpers\Url;

?>
<div class="container py-5">

    <!-- LOST PET DETAIL -->
    <div class="card shadow-lg mb-5 border-0">
        <div class="card-body">

            <div class="row">
                <div class="col-md-5">
                    <?= $model->displayImage($model->image, $options = ['class' => 'img-fluid rounded'], $defaultImg = 'pp.png'); ?>
                </div>

                <div class="col-md-7">
                    <h2 style="color:#148f77;">🐾 <?= $model->getType() ?> Pet Report</h2>
                    <hr>


                    <?= !empty($model->pet_name) ? '<p><strong>Pet Name:</strong> ' . $model->pet_name . '</p>' : '' ?>
                    <p><strong>Category:</strong> <?= $model->getCategory() ?></p>
                    <?php
                    if (($model->type_id == LostFoundPet::TYPE_FOUND)) {
                    ?>
                        <p><strong>Found At:</strong> <?= $model->location ?></p>
                        <p><strong>Found Date :</strong> <?= $model->date_found ?></p>
                    <?php
                    } else {
                    ?>
                        <p><strong>Last Seen Location:</strong> <?= $model->location ?></p>
                        <p><strong>Lost Date:</strong> <?= $model->date_lost ?></p>
                    <?php
                    }
                    ?>

                    <p><strong>Description:</strong><br>
                        <?= $model->contact_detail ?>
                    </p>
                    <?php if (!empty($model->reward_amount)) { ?>
                        <div class="alert alert-info mt-3">
                            💰 <strong>Reward:</strong> ₹<?= $model->reward_amount ?>?> will be given to the finder
                        </div>
                    <?php } ?>
                    <!-- <button class="btn btn-success">
                        <i class="fas fa-phone"></i> Contact Owner
                    </button> -->
                </div>
            </div>

        </div>
    </div>

    <!-- RECENT LOST & FOUND REPORTS -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 style="color:#148f77;">Recent Reports</h4>
        <a href="<?=Url::to(['site/lost-found'])  ?> class="text-success font-weight-bold">
            See all reports →
        </a>
    </div>

    <!-- example cards -->
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//site/_alert', // your view file for each record
        'options' => [
            'tag' => 'div',
            'class' => 'row',   // remove main wrapper class
        ],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-md-3 ',  // or 'div' with empty class
        ],
        'summaryOptions' => [
            'tag' => 'div',
            'class' => 'row col-md-12',   // remove summary class
        ],
        'summary' => false,
        'pager' => ['options' => ['style' => 'display:none']],
    ]) ?>
</div>
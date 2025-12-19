<?php

use app\models\LostFoundPet;
use yii\helpers\Url;

?>
<div class="pet-card" style="text-align:left">
    <?= $model->displayImage($model->image, $options = [], $defaultImg = 'pp.png'); ?>
    <h5 class="mt-3">
        <?php if ($model->type_id == LostFoundPet::TYPE_LOST) { ?>
            <?= $model->pet_name ?> -
        <?php } ?>
        <?= $model->getCategory() ?>
    </h5>
    <p>
        <?php $icon = '<i class="fa-solid fa-location-dot"></i>'; ?>
        <?= (!empty($model->$model->last_seen_location)) ? $icon . 'Last seen:' . $model->last_seen_location : ((!empty($model->$model->found_location)) ? $icon . 'Found At:' . $model->found_location : '') ?> </p>
    <div>
        <div class="row">
            <div class="col-md-6">
                <a href="<?= Url::toRoute(['lost-found-pet/detail', 'id' => $model->id]) ?>" class="btn btn-sm">See Details</a>
            </div>
            <div class="col-md-6" style="text-align:right">
                <span class="badge <?= ($model->type_id == LostFoundPet::TYPE_FOUND) ? 'badge-lost' : 'badge-found' ?>"> <?= ($model->type_id == LostFoundPet::TYPE_FOUND) ? 'FOUND' : 'LOST' ?></span>
            </div>
        </div>
    </div>
</div>
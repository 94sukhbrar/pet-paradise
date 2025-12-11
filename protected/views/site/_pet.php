<?php
use app\models\Pet;
use yii\helpers\Url;
?>
<div class="pet-item <?= $model->petCategory ?>">
    <div class="card pet-card">
        <?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pp.png'); ?>
        <div class="card-body text-center">
            <h5 class="card-title"><?= !empty($model->breed)?$model->breed:'Availabe soon' ?></h5>
            <?php
            if ($model->type_id == Pet::TYPE_FREE) { ?>
                <p class="price"><span class="symbol"></span><?= $model->price ?>  <span class="dark">|</span>
            <?php } else { ?>
                <p class="price">Free <span class="dark">|</span>
            <?php } ?>
           <span><?= $model->getGender() ?></span></p>
            <a href="<?=Url::toRoute(['pet/detail','id'=>$model->id])?>">
                <button class="btn btn-outline-success quick-view-btn">Quick View</button>
            </a>
        </div>
    </div>
</div>
<?php
use app\models\Pet;
use yii\helpers\Url;
?>
<div class="col-md-3 mb-4 pet-item <?= $model->petCategory ?>">
    <div class="card pet-card">
        <?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pet.jpg'); ?>
        <!-- <img src="https://place-puppy.com/300x200" alt="<?= $model->petCategory ?>"> -->
        <div class="card-body text-center">
            <h5 class="card-title"><?= !empty($model->breed)?$model->breed:'Availabe soon' ?></h5>
            <?php
            if ($model->type_id == Pet::TYPE_FREE) { ?>
                <p class="price"><span class="symbol"></span><?= $model->price ?></p>
            <?php } else { ?>
                <p class="price">Free</p>
            <?php } ?>
             <p><?= !empty($model->gender)?$model->getGender():"Don't know 😔" ?></p>
            <a href="<?=Url::toRoute(['pet/detail','id'=>$model->id])?>">
                <button class="btn btn-outline-success quick-view-btn">Quick View</button>
            </a>
        </div>
    </div>
</div>
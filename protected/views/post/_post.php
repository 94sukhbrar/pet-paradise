<?php
/** @var $model app\models\Post */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="card feed-card mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center mb-2">
            <?= $model->displayImage($model->pet->profile_picture, ['class' => 'profile-pic pet-profile'], 'default.png', true); ?>
        <div>
                <strong><?= $model->pet->name ?></strong><br>
                <small class="text-muted"><?= $model->calculateAge($model->created_on) ?></small>
            </div>
        </div>
    </div>
    <hr class="no-margin">
    <div class="card-body py-0 px-0">
        <div class="image-container bg-box ">
            <?= $model->displayImage($model->image_file, $options = ['class' => 'w-100'], $defaultImg = 'blog-header.jpg'); ?>
        </div>
    </div>
    <div class="card-body">
         <div class="m-2">
            <i class="fa-regular fa-heart"></i><span class="me-2">&nbsp;12</span>
            <i class="fa-regular fa-comment"></i>&nbsp;<span>2</span>
        </div>
        <p class="m-2"><strong><?= Html::a(Html::encode($model->title), Url::toRoute(['post/detail', 'id' => $model->id,]),['class'=>'no-style']) ?></strong>
            <br>
            <?= \yii\helpers\StringHelper::truncateWords($model->content, 15) ?>
        </p>
       
    </div>
</div>
<?php

use yii\helpers\Url;
?>

<div class="mb-4">
    <div class="card post-card">
        <?= $model->displayImage($model->image_file, $options = ['class' => 'card-img-top'], $defaultImg = 'pp1.png'); ?>
        <div class="card-body">
            <h5 class="card-title"><?= $model->title ?></h5>
            <p class="card-text meta">
                By <strong><?= $model->getRelatedDataLink('created_by_id') ?> </strong> 
                • <span class="meta"><?= Yii::$app->formatter->asDate($model->created_on, 'php:d F Y'); ?></span> . <span></span>
            </p>
            <p class="mb-2" style="color:var(--muted)"><?= \yii\helpers\StringHelper::truncateWords($model->content, 20) ?></p>
            <a href="<?= Url::toRoute(['post/detail', 'id' => $model->id]) ?>" class="btn btn-primary btn-sm">Read More</a>
        </div>
    </div>
</div>
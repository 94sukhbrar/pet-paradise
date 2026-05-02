<?php

use yii\helpers\Url;

if (Yii::$app->controller->id === 'pet') {
?>
    <div class="recent-post">
        <?= $model->displayImage($model->image_file, $options = [], $defaultImg = 'pp1.png'); ?>
        <a href="<?= Url::toRoute(['post/detail', 'id' => $model->id]) ?>" class="text-dark">
            <h6 class="mt-3"><?= $model->title ?></h6>
        </a>
        <small>3 days ago</small>

    </div>
<?php
} else {
?>
    <div class="mb-4 mt-4">
        <div class="card post-card shadow-sm">
            <?= $model->displayImage($model->image_file, $options = ['class' => 'card-img-top'], $defaultImg = 'pp1.png'); ?>
            <div class="card-body">
                <h5 class="card-title" data-bs-toggle="tooltip" title="<?= $model->title ?>"><?= \yii\helpers\StringHelper::truncate($model->title, 18) ?></h5>
                <p class="card-text text-muted">
                    <?= \yii\helpers\StringHelper::truncate(strip_tags($model->content), 150) ?>
                </p>
                <a href="<?= Url::toRoute(['post/detail', 'id' => $model->id]) ?>" class="btn btn-primary btn-sm">Read More</a>
            </div>
        </div>
    </div>
<?php
}
?>
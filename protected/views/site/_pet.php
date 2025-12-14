<?php

use app\models\Pet;
use yii\helpers\Url;
?>
<div class="pet-card">
    <div class="pet-icon">
        <?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pp.png'); ?>
    </div>
    <div class="pet-info">
        <h5><?= $model->name ?></h5>
        <span><?= !empty($model->breed) ? $model->breed : 'Mix' ?> • <?= $model->calculateAge($model->date_of_birth) ?></span><br>
        <a href="<?= Url::toRoute(['pet/detail', 'id' => $model->id]) ?>" class="btn btn-view btn-sm">View Details</a>
    </div>
</div>
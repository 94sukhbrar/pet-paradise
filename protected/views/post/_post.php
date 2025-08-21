<?php

/** @var $model app\models\Post */

use yii\helpers\Url;

?>

<!-- <div class="card mb-3">
    <div class="card-body">
        <h5><?= \yii\helpers\Html::encode($model->title) ?></h5>
        <p><?= \yii\helpers\StringHelper::truncateWords($model->content, 30) ?></p>
        <small class="text-muted">
            Posted on <?= Yii::$app->formatter->asDate($model->created_on) ?>
        </small>
    </div>
</div> -->

<div class="col-md-4">
    <div class="card feed-card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-2">
                <div>
                    <strong>Buddy</strong><br>
                    <?php

                    $date1 = new DateTime($model->created_on);
                    $date2 = new DateTime(date('Y-m-d h:i:sa'));

                    // Difference
                    $diff = $date1->diff($date2);

                    // Convert to total hours
                    $totalHours = ($diff->days * 24) + $diff->h + ($diff->i / 60);                  
                    

                    if ($totalHours < 24) {
                        $data = round($totalHours ). " hours ago";
                    } else {
                         $data =$diff->days . " days ago";
                    }

                    ?>
                    <small class="text-muted"><?= $data ?></small>
                </div>
            </div>

            <?= $model->displayImage($model->image_file, $options = [], $defaultImg = 'blog-header.jpg'); ?>
            <p><strong>Buddy</strong> <?= \yii\helpers\StringHelper::truncateWords($model->content, 30) ?></p>
            <div>
                <i class="fa-regular fa-heart me-3"></i>
                <i class="fa-regular fa-comment"></i>
            </div>
        </div>
    </div>
</div>
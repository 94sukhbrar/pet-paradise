<?php

/** @var $model app\models\Post */

use yii\helpers\Html;
use yii\helpers\Url;
?>




<!-- Top Hero Image -->
<div class="container mt-4">
    <?= $model->displayImage($model->image_file, $options = ['class' => 'header-image'], $defaultImg = 'blog-header.jpg'); ?>
</div>

<!-- Post Content Box -->
<div class="container">
    <div class="post-container">

        <h1 class="post-title">Top Grooming Tips to Keep Your Pet Happy</h1>

        <p class="post-meta mb-4">
            Posted on <strong><?= Yii::$app->formatter->asDate($model->created_on, 'php:d F Y'); ?></strong> • By <strong><?= $model->getRelatedDataLink('created_by_id') ?> (Pet Paradise Team)</strong>
        </p>

        <p class="lead">
            <?= $model->content ?>
        </p>
        <hr>

        <!-- Tags -->
        <div class="mb-3">
            <span class="tag">#PetCare</span>
            <span class="tag">#DogGrooming</span>
            <span class="tag">#CatCare</span>
        </div>

    </div>

    <!-- Comment Section -->
    <div class="comment-section mt-4">
        <h5 class="mb-3">Leave a Comment</h5>
        <form>
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label>Your Comment</label>
                <textarea class="form-control" rows="3" placeholder="Write your comment..."></textarea>
            </div>

            <button class="btn btn-custom">Submit Comment</button>
        </form>
    </div>
    <div class="row m-4">
        <!-- Related Posts -->
        <h4 class="font-weight-bold mb-3">Related Posts</h4>
        <div class="row">
            <!-- Related Post Card -->
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '/site/_item', // your view file for each record
                'options' => [
                    'tag' => 'div',
                    'class' => 'row',   // remove main wrapper class
                ],
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'col-md-3',  // or 'div' with empty class
                ],
                'pager' => ['options' => ['style' => 'display:none']],
                'summary' => false,


            ]) ?>
        </div>

    </div>
</div>
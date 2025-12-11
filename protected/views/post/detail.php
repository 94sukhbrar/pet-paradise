<?php

/** @var $model app\models\Post */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container mt-5" style="display: none;">
    <div class="row">
        <div class="col-md-5">
            <div class="card feed-card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <strong><?= $model->title ?></strong><br>
                        </div>
                    </div>
                    <div class="image-container">
                        <?= $model->displayImage($model->image_file, $options = [], $defaultImg = 'blog-header.jpg'); ?>
                    </div>
                    <p>
                        <?= $model->content ?>
                    </p>
                    <div>
                        <i class="fa-regular fa-heart me-3" id="likeme"></i>
                        <i class="fa-regular fa-comment" id="commenthere"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <!-- Profile Header -->
            <div class="profile-header d-flex align-items-center">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img mr-3">400×400</div>
                    </div>
                    <div class="col-md-9">
                        <div>
                            <h2 class="mb-0 font-weight-bold"><?= $model->pet->name ?>
                                <button class="btn follow-btn btn-sm ml-2">Follow</button>
                            </h2>
                            <p class="mb-1">
                                <span class="font-weight-bold">0</span> posts
                                <span class="font-weight-bold text-primary ml-2">1.2k</span> followers
                                <span class="font-weight-bold text-info ml-2">300</span> following
                            </p>
                            <p class="mb-1"><?= $model->pet->content ?></p>
                            <small class="text-muted">Owned by <a href="#"><?= $model->createdBy->full_name ?></a></small>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Pet Details -->
            <div class="pet-details mt-4 p-3 border rounded">
                <h4 class="font-weight-bold mb-4">Pet Details</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="detail-card">
                            <h6>Type</h6>
                            <?= $model->pet->petCategory->title ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="detail-card">
                            <h6>Breed</h6>
                            <?= !empty($model->pet->breed) ? $model->pet->breed : 'not define' ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="detail-card">
                            <h6>Age</h6>
                            <?= $model->calculateAge($model->pet->date_of_birth) ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="detail-card">
                            <h6>Gender</h6>
                            <?= !empty($model->pet->gender) ? $model->pet->gender : 'not define' ?>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                    <div class="detail-card">
                        <h6>Color</h6>
                        Golden
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="detail-card">
                        <h6>Weight</h6>
                        30 kg
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="detail-card">
                        <h6>Height</h6>
                        58 cm
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="detail-card">
                        <h6>Favorite Food</h6>
                        Peanut butter
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-card">
                        <h6>Hobbies</h6>
                        Chasing squirrels, swimming
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row">
         <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="card shadow-sm  p-4 mb-4">
                <h2 class="font-weight-bold"><?= $model->title ?></h2>

                <div class="text-muted mb-3">
                    <small>By <?= $model->getRelatedDataLink('created_by_id') ?> | <?= Yii::$app->formatter->asDate($model->created_on, 'php:F d, Y'); ?></small>
                </div>

                <!-- Featured Image -->
                <?= $model->displayImage($model->image_file, $options = [], $defaultImg = 'blog-header.jpg'); ?>
                <!-- Post Content -->
                <p class="lead">
                    <?= \yii\helpers\StringHelper::truncateWords($model->content, 20) ?>

                </p>

                <blockquote class="blockquote pl-3 border-left border-primary">
                    “A memorable quote from the post can go here to highlight something important.”
                </blockquote>

                <p>
                    <?= $model->content ?>
                </p>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 py-4">
                <?= $this->render('//post/right_sidebar') ?>
            </div>
        </div>
    </div>

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
            'summaryOptions' => [
                'tag' => 'div',
                'class' => 'row col-md-12',   // remove summary class
            ],
            'summary' => false,

        ]) ?>
    </div>

</div>
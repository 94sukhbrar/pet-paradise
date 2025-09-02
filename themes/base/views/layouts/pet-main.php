<?php

use app\components\FlashMessage;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetLink</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="<?= $this->theme->getUrl('css/petLayout.css') ?>" id="theme" rel="stylesheet">
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="mb-4"><i class="fa fa-paw"></i>&nbsp;PetLink</h4>
        <a href="<?= Url::toRoute('/post/index') ?>"><i class="fa fa-home"></i> Feed</a>
        <a href="<?= Url::toRoute('/site/discover') ?>"><i class="fa fa-compass"></i> Discover</a>
        <a href="<?= Url::toRoute('/site/adopt') ?>"><i class="fa fa-heart"></i> Ready to Adopt</a>
        <a href="<?= Url::toRoute('/site/local-services') ?>"><i class="fa fa-map"></i> Local Services</a>
        <!-- <hr class="bg-light"> -->
        <!-- <a href="<?= Url::toRoute('/site/alerts') ?>"><i class="fa fa-exclamation-triangle"></i> Lost Pet Alerts</a> -->
        <!-- <a href="#"><i class="fa fa-chart-line"></i> Pet Growth Tracker</a> -->
        <!-- <a href="<?= Url::toRoute('/site/events') ?>"><i class="fa fa-users"></i> Events & Communities</a> -->
        <!-- <a href="#"><i class="fa fa-newspaper"></i> Articles</a> -->
        <a href="<?=Url::toRoute(['site/contact'])?>"><i class="fa fa-envelope"></i> Contact</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <!-- Top bar -->
        <?php
        if (Yii::$app->user->isGuest) {         
          ?>
           <div class="top-bar">
            <a href="<?= Url::toRoute('/user/login') ?>">
              <button class="btn-signin">Sign In</button>
            </a>
        </div>

          <?php
        } else {
           ?>
           <div class="top-bar">
            <a href="<?= Url::toRoute('/user/logout') ?>">
          <button class="btn-signin">Logout</button>
          </a>
        </div>

          <?php
        }

        ?>
       <hr class="no-margin">
        <!-- Feed Section -->
        <div class="row px-4">
            <?=FlashMessage::widget(['type' => 'toster' /* 'position' => 'bottom-right' */])?>
          <?= $content; ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
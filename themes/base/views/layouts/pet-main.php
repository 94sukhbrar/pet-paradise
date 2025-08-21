<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetLink Feed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="<?= $this->theme->getUrl('css/petLayout.css') ?>" id="theme" rel="stylesheet">
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="mb-4"><i class="fa fa-paw"> </i></h4>
        <a href="<?= Url::toRoute('/post/index') ?>"><i class="fa fa-home"></i> Feed</a>
        <a href="#"><i class="fa fa-compass"></i> Discover</a>
        <a href="#"><i class="fa fa-heart"></i> Ready to Adopt</a>
        <a href="#"><i class="fa fa-map"></i> Local Services</a>
        <hr class="bg-light">
        <a href="#"><i class="fa fa-exclamation-triangle"></i> Lost Pet Alerts</a>
        <a href="#"><i class="fa fa-chart-line"></i> Pet Growth Tracker</a>
        <a href="#"><i class="fa fa-users"></i> Events & Communities</a>
        <a href="#"><i class="fa fa-newspaper"></i> Articles</a>
        <a href="#"><i class="fa fa-envelope"></i> Contact</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <!-- Top bar -->
        <?php
        if (Yii::$app->user->isGuest) {         
          ?>
           <div class="top-bar">
          <button class="btn-signin">Sign In</button>
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
       
        <!-- Feed Section -->
        <div class="row px-4">
          <!-- <div class="col-md-4">
          <div class="card feed-card mb-4">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-2">
                <div>
                  <strong>Buddy</strong><br>
                  <small class="text-muted">2 hours ago</small>
                </div>
              </div>
              <img src="https://via.placeholder.com/600x400" class="w-100 mb-3 rounded">
              <p><strong>Buddy</strong> Had a great time at the park today! So many new smells!</p>
              <div>
                <i class="fa-regular fa-heart me-3"></i>
                <i class="fa-regular fa-comment"></i>
              </div>
            </div>
          </div>
        </div> -->

          <?= $content; ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<?php

use yii\helpers\Url;
?>


      <!-- Single post preview -->
      <div class="card mb-4">
        <div class="card-body">
          <h6 class="card-title">Featured Post</h6>
         
          <?= $model->displayImage($model->image_file, $options = ['class' => 'img-fluid rounded mb-3'], $defaultImg = 'pp1.png'); ?>
          <h5><?=$model->title ?></h5>
          <p class="meta">By <strong><?= $model->getRelatedDataLink('created_by_id') ?></strong> • <?= Yii::$app->formatter->asDate($model->created_on, 'php:d F Y'); ?></p>
          <p style="color:var(--muted)"><?= \yii\helpers\StringHelper::truncateWords($model->content, 20) ?></p>
          <a href="<?= Url::toRoute(['post/detail', 'id' => $model->id]) ?>" class="btn btn-outline-primary btn-sm">Read Full</a>
        </div>
      </div>

      <!-- Palette showcase -->
      <div class="card mb-4">
        <div class="card-body">
          <h6 class="card-title">Color Palettes</h6>    
          <p class="mb-1 meta">Preview all themes:</p>
          <div class="d-flex">
            <button class="btn btn-sm btn-outline-primary mr-2" onclick="setTheme('theme-turquoise')">Turquoise</button>
            <button class="btn btn-sm btn-outline-primary mr-2" onclick="setTheme('theme-warm')">Warm</button>
            <button class="btn btn-sm btn-outline-primary mr-2" onclick="setTheme('theme-pastel')">Pastel</button>
            <button class="btn btn-sm btn-outline-primary" onclick="setTheme('theme-mint')">Mint</button>
          </div>
        </div>
      </div>
      <!-- Contact / CTA -->
      <div class="card">
        <div class="card-body text-center">
          <h6>Book a Grooming Slot</h6>
          <p class="meta">Quick appointment for a clean, happy pet.</p>
          <a class="btn btn-primary btn-block" href="<?= Url::toRoute(['/site/contact']) ?>">Book Now</a>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-body text-center">
          <h6>Find-Lost Pets</h6>
          <p class="meta">Share your pet details we will help you.</p>
          <a class="btn btn-primary btn-block" href="<?= Url::toRoute(['/site/alerts']) ?>">Share Now</a>
        </div>
      </div>
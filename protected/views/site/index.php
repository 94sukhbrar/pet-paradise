<?php

use yii\helpers\Url;
?>
<div class="container py-4">
  <div class="hero">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h1 class="mb-1" style="color:var(--text)">Welcome to PetParadise</h1>
        <p class="mb-1 meta">Friendly pet care, grooming tips and adorable stories. Theme preview using your brand colors.</p>
        <div class="mt-3">
          <a href="<?= Url::toRoute(['/site/adopt']) ?>" class="btn btn-primary mr-2">Get Started</a>
          <a href="<?= Url::toRoute(['/site/local-services']) ?>" class="btn btn-outline-primary">Learn More</a>
        </div>
      </div>

      <div class="col-md-4 text-md-right mt-3 mt-md-0">
        <div class="chip">Open: Mon–Sat • 9am–6pm</div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- MAIN FEED -->
    <div class="col-lg-8">
      <!-- Feed header -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Latest Posts</h5>
        <small class="meta">Showing latest 6</small>
      </div>


      <div class="row">
        <!-- Example post card (repeat) -->
        <?= \yii\widgets\ListView::widget([
          'dataProvider' => $dataProvider,
          'itemView' => '_post', // your view file for each record
          'summary' => false,
          'options' => [
            'tag' => 'div',
            'class' => 'row',   // remove main wrapper class
          ],
          'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-md-6',  // or 'div' with empty class
          ]
        ]) ?>

      </div><!-- /row -->

    </div> <!-- /col-lg-8 -->

    <!-- SIDEBAR -->
    <div class="col-lg-4">

      <?= $this->render('_sidebar', ['model' => $model]) ?>
    </div>
  </div>
</div>
<?= $this->render('_services') ?>
<?= $this->render('_whyus') ?>
<?= $this->render('_review') ?>
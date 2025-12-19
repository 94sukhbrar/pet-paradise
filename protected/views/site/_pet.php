<?php

use app\models\Pet;
use yii\helpers\Url;
?>


<div class="pet-card" style="text-align:left">
  <?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pp.png'); ?>
  <h5 class="mt-3 text-capitalize">
     <?= $model->name ?>
    </h5>
   <p class="text-capitalize"><strong>Breed : </strong><?= !empty($model->breed) ? $model->breed : 'Mix' ?> <br><strong>Age: </strong><?= $model->calculateAge($model->date_of_birth) ?></p>
  <p>
   
  <div>
    <div class="row">
      <div class="col-md-6">
        <a href="<?= Url::toRoute(['/pet/detail', 'id' => $model->id]) ?>" class="btn btn-outline-success btn-sm">See Details</a>
      </div>
      <div class="col-md-6" style="text-align:right">
        <span class="badge <?= ($model->type_id == Pet::TYPE_ADOPT) ? 'badge-lost' : 'badge-found' ?>"> <?= ($model->type_id == Pet::TYPE_ADOPT) ? 'Adoption' : 'Buy' ?></span>
      </div>
    </div>
  </div>
</div>
<?php

use app\models\LostFoundPet;
?>
  <div class="pet-card">
      <span class="badge <?= ($model->type_id==LostFoundPet::TYPE_FOUND)?'badge-lost':'badge-found' ?>"> <?= ($model->type_id==LostFoundPet::TYPE_FOUND)?'LOST':'FOUND' ?></span>
     <?= $model->displayImage($model->image, $options = [], $defaultImg = 'pp.png'); ?>
     <h5 class="mt-3">
      <?php if($model->type_id==LostFoundPet::TYPE_LOST){ ?> 
        <?= $model->pet_name ?> -
        <?php } ?>
        <?= $model->getCategory() ?>
        </h5> 
      <p><i class="fa-solid fa-location-dot"></i> Last seen: Model Town, Ferozepur</p>
      <button class="btn btn-outline-danger btn-sm btn-block">View Details</button>
  </div>
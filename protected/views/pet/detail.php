<?php

use app\models\Pet;
use yii\helpers\Url;
?>
<style>
    .profile-card {
        max-width: 900px;
        margin: 30px auto;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .profile-header {
        position: relative;
        background: url('https://placekitten.com/1000/400') center/cover no-repeat;
        height: 250px;
    }

    .profile-header img {
        width: 200px;
        height: 180px;
        border-radius: 50%;
        border: 5px solid #fff;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background: #fff;
    }

    .profile-body {
        padding: 10px 20px 30px;
        text-align: center;
    }

    .profile-body h2 {
        margin-bottom: 10px;
        font-weight: bold;
    }

    .pet-info {
        text-align: left;
    }

    .pet-info li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .btn-adopt {
        margin-top: 20px;
    }
</style>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><div class="profile-card bg-white">
            <!-- Header with banner and pet photo -->
            <div class="profile-header">

                <?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pet.jpg'); ?>
            </div>

            <!-- Body content -->
            <div class="profile-body">
                <h2>
                    <?= !empty($model->name) ? $model->name : 'Buddy' ?>
                    <?php if (!empty($model->gender) && ($model->gender == Pet::GENDER_MALE)) { ?>
                        <span class="text-primary"><i class="fas fa-mars"></i></span>
                    <?php } else { ?>

                        <span class="text-primary">&#9794;</span>
                    <?php }  ?>
                </h2>
                <p class="text-muted"><?= $model->breed . '.' ?> <?= $model->calculateAge($model->date_of_birth) ?> Old</p>

                <!-- Info Section -->
                <ul class="list-unstyled pet-info">
                    <li><strong>Breed:</strong> <?= $model->breed ?></li>
                    <li><strong>Age:</strong> <?= $model->calculateAge($model->date_of_birth) ?></li>
                    <li><strong>Gender:</strong> <?= $model->getGender() ?></li>
                    <li><strong>Location:</strong> <?= $model->address ?></li>
                    <li><strong>Price:</strong> <span class="text-success"><span class="symbol"></span><?= $model->price ?></span></li>
                    <li><strong>Vaccinated:</strong> Yes</li>
                    <li><strong>About me:</strong> <?= $model->about_me ?></li>
                </ul>

                <!-- Description -->
                <p class="mt-3">
                    <?= $model->content ?>
                </p>

                <!-- Buttons -->
                <a href="#" class="btn btn-success btn-adopt">Adopt Now</a>
                <a href="<?= Url::toRoute(['site/contact-now', 'id' => $model->id]) ?>" class="btn btn-outline-primary btn-adopt">Message Owner</a>
            </div>
        </div></div>
            <div class="col-md-2"></div>
        </div>
        

    </div>
    <div class="col-md-3 bg-white">
        <?= $this->render('//post/right_sidebar') ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    fetch("https://ipapi.co/json/")
        .then(res => res.json())
        .then(data => {
            let country = data.country_name;
            let currency = (data.currency === 'INR' ? '₹' : '$');

            $(".symbol").text(currency);
        });
</script>
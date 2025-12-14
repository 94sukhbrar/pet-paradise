<?php

use yii\helpers\Url;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    body {
        background: #f7fffd;
        font-family: "Segoe UI", sans-serif;
    }

    .pet-title {
        font-size: 32px;
        font-weight: bold;
        color: #009688;
    }

    .pet-image {
        width: 100%;
        height: 350px;
        border-radius: 15px;
        object-fit: contain;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .pet-info-box {
        background: #ffffff;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.12);
    }

    .pet-attr {
        margin-bottom: 8px;
        font-size: 16px;
    }

    .sidebar-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.12);
    }

    .sidebar-card img {
        height: 80px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .recent-post {
        background: #fff;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 20px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.12);
    }

    .recent-post img {
        width: 100%;
        height: 180px;
        border-radius: 15px;
        object-fit: cover;
    }
</style>


<div class="container mt-5">

    <div class="row">

        <!-- MAIN PET DETAIL AREA -->
        <div class="col-md-8">

            <!-- Pet Name -->
            <h1 class="pet-title"><?= !empty($model->name) ? $model->name : 'Simba' ?><?= !empty($model->breed) ? $model->breed : ' (Golden Retriever)' ?> </h1>

            <!-- Photo -->

            <?= $model->displayImage($model->profile_picture, $options = ['class' => 'pet-image mb-4'], $defaultImg = 'pet.jpg'); ?>
            <!-- Details Box -->
            <div class="pet-info-box">

                <h4 class="mb-3"><i class="fa-solid fa-paw"></i> Pet Information</h4>



                <p class="pet-attr"> <strong>Breed:</strong> <?= !empty($model->breed) ? $model->breed : 'Golden Retriever' ?></p>
                <p class="pet-attr"> <strong>Age:</strong> <?= $model->calculateAge($model->date_of_birth) ?></p>
                <p class="pet-attr"> <strong>Gender:</strong> <?= $model->getGender() ?></p>
                <p class="pet-attr"> <strong>Location:</strong> <?= $model->address ?></p>
                <p class="pet-attr"> <strong>Price:</strong> <span class="text-success"><span class="symbol"></span><?= $model->price ?></span></p>
                <p class="pet-attr"> <strong>Vaccinated:</strong> Yes</p>

                <hr>

                <h4 class="mt-4 mb-3">About <?= !empty($model->name) ? $model->name : 'Simba' ?></h4>
                <p>
                    <?= !empty($model->about_me) ? $model->about_me : "Simba is a friendly, energetic Golden Retriever who loves playing with kids
                    and enjoys long walks. Vaccinations are up to date. He is trained and responds
                    to basic commands." ?>

                </p>
                <a href="<?= Url::toRoute(['site/contact-now', 'id' => $model->id]) ?>" class="btn btn-outline-primary btn-adopt">Message Owner</a>

            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="col-md-4">

            <!-- NEW PETS -->
            <h4 class="mb-3" style="color:#009688;">New Pets</h4>
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '/site/_new_pets', // your view file for each record
                'options' => [
                    'tag' => 'div',
                    'class' => 'row',   // remove main wrapper class
                ],
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'pet-card w-100',  // or 'div' with empty class
                ],
                'pager' => ['options' => ['style' => 'display:none']],
                'summary' => false,


            ]) ?>

        </div>

    </div>




    <!-- RECENT POSTS SECTION -->
    <h3 class="mt-5 mb-3" style="color:#009688;">Recent Posts</h3>

    <div class="row">
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProviderpost,
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


<script>
    fetch("https://ipapi.co/json/")
        .then(res => res.json())
        .then(data => {
            let country = data.country_name;
            let currency = (data.currency === 'INR' ? '₹' : '$');

            $(".symbol").text(currency);
        });
</script>
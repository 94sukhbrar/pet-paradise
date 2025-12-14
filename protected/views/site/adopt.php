<?php

use yii\helpers\Url;
?>
<style>
  body {
    background: #f9fafb;
    font-family: 'Segoe UI', sans-serif;
  }

  .page-header {
    background: transparent;
    padding: 30px 0;
    text-align: center;
    color: #003b5c;
  }

  .filter-btns button {
    border-radius: 30px;
    margin: 5px;
    padding: 8px 20px;
    border: 1px solid #009688;
    background: #fff;
    color: #009688;
    cursor: pointer;
    transition: 0.3s;
  }

  .filter-btns button.active,
  .filter-btns button:hover {
    background: #009688;
    color: #fff;
  }

  .pet-card-view {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    transition: 0.3s;
    overflow: hidden;
  }
  .pet-card-view img {
      width: 100%;
      /* height: 150px; */
      object-fit: cover;
      border-radius: 10px;
  }

  .pet-card-view:hover {
    transform: translateY(-5px);
  }

  .pet-icon {
    /* height: 160px; */
    background: #eaf6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    color: #009688;
  }

  .pet-info {
    padding: 18px;
    text-align: center;
  }

  .pet-info h5 {
    margin-bottom: 5px;
    font-weight: 600;
  }

  .pet-info span {
    font-size: 14px;
    color: #666;
  }

  .btn-view {
    background: #009688;
    color: #fff;
    border-radius: 30px;
    padding: 6px 18px;
    margin-top: 10px;
  }

  .btn-view:hover {
    background: #009688;
    color: #fff;
  }

  li.page-item.next.disabled,
  li.page-item.last.disabled,
  li.page-item.prev.disabled,
  li.page-item.first.disabled {
    padding: 6px 12px;
    border: 1px solid #dee2e6;
    color: #009688;
    background-color: #d9d0d0;
  }

  .pagination .page-item.active .page-link {
    background-color: #009688;
    border-color: #009688;
  }

  .pagination .page-link {
    color: #009688;
  }
</style>
</head>

<body>

  <!-- Header -->
  <section class="page-header">
    <h1>Adopt a Pet</h1>
    <p>Find your new best friend 🐾</p>
  </section>

  <div class="container py-5">

    <!-- Filter Buttons -->
    <div class="text-center mb-4 filter-btns">
      <button class="active" onclick="filterPets('all')">All</button>
      <?php
      foreach ($petCategory as $value) {
      ?>

        <button onclick="filterPets('<?= $value['title'] ?>')"><?= $value['title'] ?></button>
      <?php } ?>

    </div>

    <!-- Pet Cards -->
    <div class="row">


      <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_pet', // your view file for each record
        'layout' => "
              <div class='row mt-3 summaryDiv'>
                  <div class='col-12 text-center'>{summary}</div>
              </div>
              <div class='row'>{items}</div>                
              {pager}",
        'options' => [
          'tag' => 'div',
          'class' => 'row',   // remove main wrapper class
        ],
        // 'itemOptions' => [
        //   'tag' => 'div',
        //   'class' => 'col-md-4 mb-4 pet-item',  // or 'div' with empty class

        // ],
        'itemOptions' => function ($model, $key, $index, $widget) {
          return [
            'class' => 'col-md-3 mb-4 pet-item',
            'data-category' => $model->petCategory->title,
          ];
        },
        'summaryOptions' => [
          'tag' => 'div',
          'class' => 'row m-4',   // remove summary class
        ],
        'summary' => "Displaying {begin} - {end} of {totalCount} posts",
        'pager' => [
          'firstPageLabel' => 'First',
          'lastPageLabel'  => 'Last',
          'prevPageLabel'  => '<',
          'nextPageLabel'  => '>',
          'maxButtonCount' => 5,

          // Bootstrap 4 pagination classes
          'options' => ['class' => ' d-flex justify-content-center mt-4 pagination pagination-xs row col-md-12'],
          'linkContainerOptions' => ['class' => 'page-item'],
          'linkOptions' => ['class' => 'page-link'],
        ],
      ]) ?>

    </div>
  </div>
  <script>
    function filterPets(category) {
      let pets = document.querySelectorAll('.pet-item');
      let buttons = document.querySelectorAll('.filter-btns button');

      buttons.forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');
      $(".summaryDiv").hide();
      pets.forEach(pet => {
        if (category === 'all' || pet.dataset.category === category) {
          pet.style.display = 'block';
          $(".summaryDiv").show();
        } else {
          pet.style.display = 'none';
        }
      });
    }
  </script>
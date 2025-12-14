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

  .filter-btns a {
    border-radius: 30px;
    margin: 5px;
    padding: 8px 20px;
    border: 1px solid #009688;
    background: #fff;
    color: #009688;
    cursor: pointer;
    transition: 0.3s;
  }

  .filter-btns a.active,
  .filter-btns a:hover {
    background: #009688;
    color: #fff;
  }

  .pet-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    transition: 0.3s;
    overflow: hidden;
  }

  .pet-card:hover {
    transform: translateY(-5px);
  }

  .pet-icon {
    height: 160px;
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
      <a href='<?= Url::toRoute(['site/adopt']) ?>' class="active">All</a>
      <?php
      foreach ($petCategory as $key => $value) {
      ?>
        <a href="<?= Url::toRoute(['site/adopt',['Pet[pet_category_id]'=>$key]]) ?>" class="<?= isset(Yii::$app->request->queryParams['Pet']['pet_category_id']) &&  Yii::$app->request->queryParams['Pet']['pet_category_id'] ==  $key ? 'active' : '' ?>" onclick="filterPets('<?= $value ?>')"><?= $value ?></button>
        <?php } ?>

    </div>

    <!-- Pet Cards -->
    <div class="row">


      <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_pet', // your view file for each record
        'layout' => "
        <div class='row mt-3'>
            <div class='col-12 text-center'>{summary}</div>
        </div>
        <div class='row'>{items}</div>
       {pager}
        </div>
    ",
        'options' => [
          'tag' => 'div',
          'class' => 'row',   // remove main wrapper class
        ],
        'itemOptions' => [
          'tag' => 'div',
          'class' => 'col-md-3 pet-item',  // or 'div' with empty class
        ],
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
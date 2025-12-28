<?php

use app\components\TActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>


<div class="container py-4 bg-turquoise">

  <h2 class="text-center text-turquoise mb-4">🐾Adopt a Pet</h2>
  <p class="text-center text-turquoise mb-4">Find your new best friend 🐾</p>

  <?php $form = TActiveForm::begin([
    'method' => 'get',
    'options' => [
      'onsubmit' => 'filterPets(); return false;',
      'id' => 'filter-form',
      'class' => 'mb-4 mt-4 py-4'
    ],

  ]); ?>

  <div class="row">

    <div class="col-md-3">
      <?php echo $form->field($model, 'pet_category_id')->dropDownList($model->getPetCategoryOptions(), ['prompt' => '-- Select Pet Type --'])->label(false)->error(false)  ?>
    </div>
    <div class="col-md-2">
      <?php echo $form->field($model, 'gender')->dropDownList($model->getGenders(), ['prompt' => '-- Gender --'])->label(false)->error(false)  ?>
    </div>
    <div class="col-md-2">
      <?php echo $form->field($model, 'type_id')->dropDownList($model->getTypeOptions(), ['prompt' => 'Adopt/Buy'])->label(false)->error(false)   ?>

    </div>

    <div class="col-md-2">
      <?= Html::submitButton('Search', ['class' => 'btn btn-turquoise btn-block']) ?>
    </div>
    <div class="col-md-2">
      <a href="<?= \yii\helpers\Url::to(['site/adopt']) ?>" class="btn btn-block btn-secondary">
        Clear Filters
      </a>
    </div>
    <div class="col-md-1"></div>
  </div>

  <?php TActiveForm::end();

  echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_pet',
    'layout' => "
         <div class='row'>{summary}</div>
        <div class='row'>{items}</div>
        {pager}
        </div>
    ",

    'options' => ['class' => 'container', 'id' => 'pet-list'],
    'itemOptions' => ['class' => 'col-lg-3 col-md-4 mb-4'],
    'summary' => "Displaying {begin} - {end} of {totalCount} posts",
    'pager' => [
      'firstPageLabel' => 'First',
      'lastPageLabel'  => 'Last',
      'prevPageLabel'  => '<',
      'nextPageLabel'  => '>',
      'maxButtonCount' => 5,

      // Bootstrap 4 pagination classes
      'options' => ['class' => 'd-flex justify-content-center mt-4 pagination pagination-xs row col-md-12'],
      'linkContainerOptions' => ['class' => 'page-item'],
      'linkOptions' => ['class' => 'page-link'],
    ],
  ]);
  ?>
  <script>
    function filterPets() {
      $.get('<?= Url::to(['site/adopt']) ?>', $('#filter-form').serialize(), function(response) {

        // Extract only ListView HTML
        let html = $(response).find('#pet-list').html();

        // Replace content
        $('#pet-list').html(html);
      });
    }
  </script>
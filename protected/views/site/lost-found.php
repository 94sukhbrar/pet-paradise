<?php

use app\components\TActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>


<div class="container py-4 bg-turquoise">

    <h2 class="text-center text-turquoise mb-4">🐾 Lost & Found Pets</h2>

    <?php $form = TActiveForm::begin([
        'method' => 'get',
        'options' => [
            'onsubmit' => 'filterPets(); return false;',
            'id' => 'filter-form',
            'class' => 'mb-4'
        ],

    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'type_id')
                ->dropDownList([0 => 'Lost', 1 => 'Found'], ['prompt' => 'Lost / Found'])
                ->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'pet_type')
                ->dropDownList($model->getPetCategoryOptions(), ['prompt' => ''])
                ->label(false) ?>
        </div>
        <div class="col-md-3">
        <?= $form->field($model, 'location')
            ->textInput(['placeholder' => 'Location'])
            ->label(false) ?>
    </div>

        <div class="col-md-3">
            <?= Html::submitButton('Search', ['class' => 'btn btn-turquoise btn-block']) ?>
        </div>

    </div>

    <?php TActiveForm::end();

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_lost_found_item',
        'layout' => "
         <div class='row'>{summary}</div>
        <div class='row'>{items}</div>
        {pager}
        </div>
    ",

        'options' => ['class' => 'container','id'=>'pet-list'],
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
            $.get('<?= Url::to(['site/lost-found']) ?>', $('#filter-form').serialize(), function(response) {

                // Extract only ListView HTML
                let html = $(response).find('#pet-list').html();

                // Replace content
                $('#pet-list').html(html);
            });
        }
    </script>
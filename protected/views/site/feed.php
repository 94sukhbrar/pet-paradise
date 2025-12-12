<div class="container py-4">
    <div class="text-center mb-4">
        <h2 class="font-weight-bold">Post Feed</h2>
        <p class="text-muted">Latest updates and articles</p>
    </div>
    <div class="row">

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item', // your view file for each record
            'options' => [
                'tag' => 'div',
                'class' => 'row',   // remove main wrapper class
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-3',  // or 'div' with empty class
            ],
            'summaryOptions' => [
                'tag' => 'div',
                'class' => 'row col-md-12',   // remove summary class
            ],
            'summary' => "Displaying {begin} - {end} of {totalCount} posts",
            'pager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last',
                'prevPageLabel'  => '<',
                'nextPageLabel'  => '>',
                'maxButtonCount' => 5,

                // Bootstrap 4 pagination classes
                'options' => ['class' => 'pagination pagination-xs row col-md-12'],
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
            ],
        ]) ?> 

    </div>

</div>

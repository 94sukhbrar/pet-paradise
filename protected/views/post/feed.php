<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',   // partial view file for rendering each post
    'layout' => "{items}\n{pager}",  // show items and pager
    'pager' => [
        'class' => \yii\widgets\LinkPager::class,
        'maxButtonCount' => 5,
    ],
]);

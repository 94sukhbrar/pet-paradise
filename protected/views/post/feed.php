<?php

use yii\widgets\ListView;
?>
<div class="row">
    <div class="col-md-9 mt-4">
    <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_post',   // partial view file for rendering each post
            'options' => [
                'tag' => 'div',
                'class' => 'list-view row',   // 👈 main container class
                'id' => 'post-list',
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-md-4 post-item mb-3',   // 👈 class for each item
            ],
            'layout' => "{items}\n{pager}",  // show items and pager
            'pager' => [
                'class' => \yii\widgets\LinkPager::class,
                'maxButtonCount' => 5,
            ],
        ]);

        ?>
    </div>
    <div class="col-md-3 bg-white">
        <?= $this->render ('right_sidebar')?>
    </div>
</div>
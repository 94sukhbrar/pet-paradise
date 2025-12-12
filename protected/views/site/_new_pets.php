<?= $model->displayImage($model->profile_picture, $options = [], $defaultImg = 'pp.png'); ?>
<h4><?= ucfirst($model->name); ?> - <?= ($model->breed)?$model->breed:'Golder retriever' ?></h4>
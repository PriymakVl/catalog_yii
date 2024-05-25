<?php

use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?//= $this->render('@app/views/templates/menu') ?>

<div class="container mb-3">
  <?php
      NavBar::begin([
          'options' => [
              'class' => 'navbar navbar-expand-md  navbar-light bg-light',
          ],
      ]);

      echo Nav::widget([
          'options' => ['class' => 'navbar-nav'],
          'items' => [
              ['label' => 'Home', 'url' => ['/main/index']],
              ['label' => 'Products', 'url' => ['/product/index']],
          ],
      ]);

      NavBar::end();
  ?>
</div>

<div class="container">
    <?= Alert::widget() ?>
</div>

<div class="container">
    <? echo $content; ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
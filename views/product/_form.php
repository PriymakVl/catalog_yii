<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-7 mx-auto">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($product, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($product, 'price')->textInput() ?>

        <?= $form->field($product, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($product, 'img')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>




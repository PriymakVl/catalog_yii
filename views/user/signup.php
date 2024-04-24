<?php
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
?>

<div class="container">
    <div class="row">
        <div class="col-8 m-auto">
            <h1 class="text-center">Форма регистрации</h1>
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>
</div>


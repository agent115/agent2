<div class="container">
    <div class="row">

        <div class="col-md-5">
            <h1>ВХОД</h1>
            <?php
            use yii\widgets\ActiveForm;
 \Yii::$app->getSecurity()->generatePasswordHash("123456");
            ?>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([

                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",

            ]) ?>
            <div>
                <button class="btn btn-success" type="submit">Вход</button>
                <a class='btn btn-success' href="<?= \yii\helpers\Url::to(['site/signup'])?>">Регистрация</a>
            </div>



            <?php $form = ActiveForm::end(); ?>

        </div>
    </div>
</div>
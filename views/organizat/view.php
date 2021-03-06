<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Organizat;

?>


<?php foreach ($organization as $ord): ?>


    <title> <?= $ord->name ?></title>
<?php endforeach; ?>

<?php $this->title = 'Организации'; ?>


<?php foreach ($categ as $cats): ?>
    <ul class="breadcrumb">
        <li><a href="<?= \yii\helpers\Url::home() ?>"><i class="glyphicon glyphicon-home"> </i> Главная</a> <span
                class="divider">/</span></li>
        <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $cats->id]) ?>"><?= $cats->name ?></a></li>
        <li>

            <?php if (!empty($organization)): ?>
                <?php foreach ($organization as $ord): ?>

                    <?= $ord->name ?></a>

                <?php endforeach; ?>

            <?php endif; ?>
        </li>

    </ul>
<?php endforeach; ?>
<section>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php if (!empty($organization)): ?>
                    <?php foreach ($organization as $ord): ?>
                        <!--проверка ширины экрана для карты-->


                            <div class="maps"><i class="maps"><?= $ord->mars ?></i><?php if(empty($ord->mars)){
                                echo '<h2>Карта отсутствует</h2>';
                                }?></div>


                        <h3><?= $ord->name ?></h3>
                        <p><i class="glyphicon glyphicon-earphone"></i>Телефон:<?= $ord->phone ?></p>
                        <?php if (!empty($ord->phone_2)): ?>

                            <?php ifelse: ?>
                            <p><i class="glyphicon glyphicon-earphone"></i>Телефон:<?= $ord->phone_2 ?></p>
                        <?php endif; ?>

                        <?php if (!empty($ord->adress)): ?>

                            <p><i class="glyphicon glyphicon-map-marker"></i>Адрес:<?= $ord->adress ?></p>
                        <?php endif; ?>

                        <?php if (!empty($ord->grafic)): ?>
                            <p><i class="glyphicon glyphicon-time"> </i>График: <?= $ord->grafic ?></p>
                        <?php endif; ?>
                        <?php if (!empty($ord->keywords)): ?>
                            <pre><?= $ord->keywords ?></pre>
                        <?php endif; ?>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
            <div class="col-md-2 col-md-offset-1 ">
                <?php foreach ($Category as $cat): ?>
                    <a id='icon' title="<?= $cat->name ?> "
                       href="<?= \yii\helpers\Url::to(['category/view', 'id' => $cat['id']]) ?>"><?= Html::img("@web/{$cat-> description}", ['class' => 'vidget']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!--Комментарии-->
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-md-offset-3">
                <h3>Отзывы к организации (<?php print_r($counts) ?>)</h3>
                <hr>


                <?php foreach ($comments as $commi): ?>

                    <span id="time" class="flash animated"><?= $commi->created ?></span><br/>
                    <span id="comment_author" class="flash animated"> <?= $commi->comment_author ?></span>
                    <?php if (!(\Yii::$app->user->identity->username == $commi->comment_author)): ?>
                        <a href="<?= \yii\helpers\Url::to(['site/com', 'com_id' => $commi->comment_id]) ?>"
                           title="Пожаловаться на комментарий"><i class="glyphicon glyphicon-eye-close"></i></a>
                    <?php endif; ?>

                    <?php if (\Yii::$app->user->identity->username == $commi->comment_author): ?>
                        <a href="?del=<?= $commi->comment_id ?>" id="com_remove"> <i
                                class="glyphicon glyphicon-remove"></i></a><br/>
                    <?php endif; ?>


                    <div id="comment_text" class="flash animated"> <?= $commi->comment_text ?></div><br/>


                    <hr>

                <?php endforeach; ?>

                <?php if (!Yii::$app->user->isGuest): ?>
                    <!--//получаем коммент к организации-->


                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                      
                    <?php endif; ?>

                    <?php $form = ActiveForm::begin(); ?>



                    <?= $form->field($model, 'comment_text')->textarea(['rows' => 5]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('ДОБАВИТЬ', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                <?php else: ?>

                    <h4>Комментарии, <span style="color:red;">вы не зарегестрированный</span></h4>
                <?php endif; ?>
            </div>

        </div>


    </div>


</section>

<?php
/*$js = <<<JS

$(function () {

            $("p").css(
            {
                color: "green",
                backgroundColor: "lightgray"
            });

        });
    
JS;

$this->registerJs($js);*/
$this->registerJs('
 $("iframe").addClass("maps");    
', $this::POS_END,'hello-message');
?>


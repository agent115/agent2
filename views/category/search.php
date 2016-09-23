<title>ПОИСК</title>
<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1 ">

                <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                <?php if (!empty($products)): ?>
                    <?php $i = 0;
                    foreach ($products as $prod): ?>


                        <div class='row'>
                            <div class="col-md-6 col-md-offset-2">


                                <h3>
                                    <a href="<?= \yii\helpers\Url::to(['organizat/view', 'id' => $prod['id']]) ?>">- <?= $prod->name ?></a>
                                </h3>


                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <?php $i++ ?>
                        <?php if ($i % 3 == 0): ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <hr>
                    <div class="clearfix"></div>

                <?php else : ?>
                    <h2>Ничего не найдено...</h2>
                <?php endif; ?>
            </div><!--features_items-->
        </div>

    </div>
</section>
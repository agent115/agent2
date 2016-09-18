<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maps-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить отметку', ['create'], ['class' => 'btn btn-danger']) ?>
        <button type="button" class="btn btn-primary"><a href="<?= \yii\helpers\Url::to(['category/index']) ?>">Категории</a>
        </button>
        <button type="button" class="btn btn-primary"><a href="<?= \yii\helpers\Url::to(['organizat/index']) ?>">Организации</a>
        </button>
        <button type="button" class="btn btn-primary"><a href="<?= \yii\helpers\Url::to(['comments/index']) ?>">Комментарии</a>
        </button>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'adress',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {mydelete}',
                'buttons' => [
                    'mydelete' => function ($url, $model) {
                        return Html::a(
                            "<span class=\"glyphicon glyphicon-trash\"></span>",
                            ['delete', 'id' => $model->id, 'second_hren' => 'hihichpock']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

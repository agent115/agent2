<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="comments-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <!--    <button  type="button" class="btn btn-primary"><a href="<? /*= \yii\helpers\Url::to(['category/index'])*/ ?>">Категории</a></button>
        <button  type="button" class="btn btn-primary"><a href="<? /*= \yii\helpers\Url::to(['maps/index'])*/ ?>">Отметка на карте</a></button>
        <button  type="button" class="btn btn-primary"><a href="<? /*= \yii\helpers\Url::to(['organizat/index'])*/ ?>">Организации</a></button>-->

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'created',
            'comment_author',
            'comment_text',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {mydelete}',
                'buttons' => [
                    'mydelete' => function ($url, $model) {
                        return Html::a(
                            "<span class=\"glyphicon glyphicon-trash\"></span>",
                            ['delete', 'id' => $model->comment_id, 'second_hren' => 'hihichpock']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

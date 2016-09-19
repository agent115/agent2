<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (\Yii::$app->user->identity->username == 'Manager'): ?>
    <div class="category-index container">
        <title>Админка</title>
        <h1><?= Html::encode($this->title) ?></h1>

        <p>


            <?= Html::a('Добавить категорию', ['create'], ['class' => ' btn btn-success',])  ?>


         <!--   <button type="button" class="btn btn-primary bt-admin-r"><a href="<?/*= \yii\helpers\Url::to(['organizat/index']) */?>">
                   <i class="glyphicon glyphicon-folder-open"> </i> Организации</a>
            </button>
            <button type="button" class="btn btn-primary "><a href="<?/*= \yii\helpers\Url::to(['maps/index']) */?>">
                    <i class="glyphicon glyphicon-map-marker"> </i> Отметка
                    на карте</a></button>
            <button type="button" class="btn btn-primary bt-admin-r" ><a href="<?/*= \yii\helpers\Url::to(['comments/index']) */?>">
                    <i class="glyphicon glyphicon-comment"></i> Комментарии</a>
            </button>-->
        </p>



        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                /* 'parent_id',*/
                /*['attribute'=> 'parent_id',
                'valuer'=> $data->category->name;
                    ],*/
                'name',
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
<?php else: ?>
    <?php \yii\helpers\Url::home() ?>
    <h1>Ты не АДМИН</h1>
<? endif; ?>
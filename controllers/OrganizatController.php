<?php
namespace app\controllers;

use app\controllers\AppController;
use app\models\Category;
use app\models\Organizat;
use app\models\Comment;
use app\models\Comments;
use app\models\Arrcom;
use app\models\Raitip;
use app\models\Testform;
use yii\db\ActiveRecord;


use Yii;

class OrganizatController extends AppController
{

    function actionView()
    {
        $id = Yii::$app->request->get('id');
        $del = Yii::$app->request->get('del');
        $idd = Yii::$app->request->get('idd');
        if (!empty($del)) {
            $del_org = Comments::findOne($del);
            $del_org->delete();
            return $this->redirect(['view','id' => $id, 'idd'=>$idd]);
        }
       /* function deleteGET($url, $name, $amp = true) {
            //$url = str_replace("&amp;", "&", $url); // Заменяем сущности на амперсанд, если требуется
            list($url_part, $qs_part) = array_pad(explode("?", $url), 2, ""); // Разбиваем URL на 2 части: до знака ? и после
            parse_str($qs_part, $qs_vars); // Разбиваем строку с запросом на массив с параметрами и их значениями
            unset($qs_vars[$name]); // Удаляем необходимый параметр
            if (count($qs_vars) > 0) { // Если есть параметры
                $url = $url_part."?".http_build_query($qs_vars); // Собираем URL обратно
                if ($amp) $url = str_replace("&", "&amp;", $url); // Заменяем амперсанды обратно на сущности, если требуется
            }
            else $url = $url_part; // Если параметров не осталось, то просто берём всё, что идёт до знака ?
            return $url; // Возвращаем итоговый URL
        }*/

        $comments = Comments::find()->where(["comment_product" => $id])->all();
        $count = Comments::find()->select(['comment_id'])->where(["comment_product" => $id])->all();
        $counts = count($count);
        // $model = Comment::find()->where(['title' => 'some post title'])->one();
        // $model = new Coment;


        $model = new Comment;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                //  Yii::$app->session->setFlash('success','Комментарий записан');
                if (!Yii::$app->user->isGuest) {
                    $model->comment_author = Yii::$app->user->identity->username;
                    $model->comment_product = $id;
                }
                $model->save();
                return $this->refresh();
            } else(
            Yii::$app->session->setFlash('error', 'Ошибка')
            );
        }

        $Models = new Raitip;
        $Models->stati_id = Yii::$app->request->post('id');
        $Models->ip = Yii::$app->request->post('rate');


        $idd = Yii::$app->request->get('idd');
        $organization = Organizat::find()->where(['id' => $id])->orderBy(['raiting' => SORT_ASC])->all();
        $Category = Category::find()->all();
        $categ = Category::find()->where(['id' => $idd])->all();

        return $this->render('view', compact('organization', 'Category', 'categ', 'comments', 'model', 'counts'));

    }

    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['view']);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}



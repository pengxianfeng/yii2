<?php
namespace frontend\modules\back\controllers;

use yii\web\Controller;;
use app\models\Categroy;

/**
 * Site controller
 */
class CategoryController extends Controller
{
    public function actionIndex()
    {
        $model = new Categroy();
        $list = $model->find()->where(['id'=>1])->asArray()->all();
        return $this->render('login',['list'=>$list]);
    }
}

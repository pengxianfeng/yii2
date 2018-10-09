<?php
namespace frontend\modules\back\controllers;

use yii\web\Controller;;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
    	echo '11111111';
    	$a = \Yii::$app->request->get("a",'1');
    	echo $a;
    	exit;
    }
}

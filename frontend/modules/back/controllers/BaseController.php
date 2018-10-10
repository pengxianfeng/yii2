<?php

namespace frontend\modules\back\controllers;

use Yii;

class BaseController extends \yii\web\Controller
{
	public $enableCsrfValidation=false;
	
    public function beforeAction($action)
    {
    	if( Yii::$app->user->isGuest){
    	    return $this->redirect(array('/site/login'));
	    }
	    return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
	
	public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    

}

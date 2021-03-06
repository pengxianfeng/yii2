<?php

namespace frontend\modules\back\controllers;

use Yii;
use common\models\User;
use yii\web\BadRequestHttpException;
use frontend\models\ResetPasswordForm;

class UserController extends BaseController
{
	
	public function beforeAction($action)
	{
		return parent::beforeAction($action); // TODO: Change the autogenerated stub
	}
	
	public function actionIndex()
    {
    	$model =  new User();
	    $list = $model->find()->asArray()->all();
        return $this->render('index',['list'=>$list]);
    }
    
    public function actionUpdate()
    {
    	if(Yii::$app->request->isPost){
		    $id = Yii::$app->request->get('id',0);
		    if(empty($id)){
			    throw new BadRequestHttpException("ID is error!");
		    }
    	    $reset_model = new ResetPasswordForm();
    	    $reset_model->findByID($id);
		    if($reset_model->load(Yii::$app->request->post())  &&  $reset_model->resetPassword()){
		    	echo "update success!";
		    	exit;
		    }else{
			    echo "update error!";
			    exit;
		    }
	    }
	    $id = Yii::$app->request->get('id',0);
    	if(empty($id)){
		    throw new BadRequestHttpException("ID is error!");
	    }
	    $model = new User();
    	$info = $model->find()->where(['id'=>$id])->asArray()->one();
    	return $this->render('update',['info'=>$info,'id'=>$id]);
    }
    
    public function actionRemove()
    {
    
    }

}

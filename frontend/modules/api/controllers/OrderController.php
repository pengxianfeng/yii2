<?php

namespace frontend\modules\api\controllers;

use app\models\Member;

class OrderController extends BaseController
{
	public function beforeAction($action)
	{
		return parent::beforeAction($action); // TODO: Change the autogenerated stub
	}
	
	public function behaviors(){
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'=>['list','add','detail','delete'],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter:: className(),
				'actions' => [
					'list'  => [ 'get'],
					'add'  => [ 'post'],
					'detail'  => [ 'post'],
					'delete'  => [ 'post'],
				],
			],
		];
	}
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionList()
    {
	    $data = [];
	    
	    $openid = \Yii::$app->request->post('openid','');
	    $u_model = new Member();
	    $user_info = $u_model->find();
	    return $this->asJson($data);
    }

}
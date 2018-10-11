<?php

namespace frontend\modules\back\controllers;

use app\models\Member;
use app\models\Order;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$member_model = new Member();
    	$list = $member_model->find()->asArray()->all();
        return $this->render('index',['list'=>$list]);
    }
    
    public function actionOrder()
    {
        $id = \Yii::$app->request->get('id',0);
	    $order_list = [];
        if(!empty($id)){
	        $model = new Order();
	        $order_list = $model->find()->where(['member_id'=>$id])->asArray()->all();
        }
        return $this->render('order_list',['list'=>$order_list]);
    }

}

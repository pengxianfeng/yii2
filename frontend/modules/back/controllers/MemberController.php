<?php

namespace frontend\modules\back\controllers;

use app\models\Member;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$member_model = new Member();
    	$list = $member_model->find()->asArray()->all();
        return $this->render('index',['list'=>$list]);
    }

}

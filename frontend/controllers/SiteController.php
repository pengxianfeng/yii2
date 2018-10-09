<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use EasyWeChat\Payment\Order as payorder;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }
	
    /**
     * Displays homepage.
     *
     * @return mixed
     */
	public function actionIndex()
	{
	
	}
	
    public function _actionIndex()
    {
	    if(Yii::$app->wechat->isWechat && !Yii::$app->wechat->isAuthorized()) {
		    return Yii::$app->wechat->authorizeRequired()->send();
	    }
	    $user = Yii::$app->wechat->getUser();
//
	    var_dump($user->openid);
//	    $jsconfig = Yii::$app->wechat->js->config(['onMenuShareQQ'],true,true);
//	    $product = [
//		    'trade_type'       => 'JSAPI', // 微信公众号支付填JSAPI
//		    'body'             => '一盒火柴',
//		    'detail'           => '一盒火些',
//		    'out_trade_no'     => 'MYERPORDERID12345678', // 这是自己ERP系统里的订单ID，不重复就行。
//		    'total_fee'        => 8888, // 金额，这里的8888分人民币。单位只能是分。
//		    'notify_url'       => 'http://www.xxx.com/order_notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
//		    'openid'           => 'you-open-id', // 这个不能少，少了要报错。
//		    // ...  基本上这些参数就够了，或者参考微信文档自行添加删除。
//	    ];
//	    $jsconfig = new payorder($product);
//	    $jsconfig = Yii::$app->wechat->payment->prepare($jsconfig);
//	    var_dump($jsconfig);
	    exit;
    }
    
    public function actionTest(){
		
		    try{
			    $app    = Yii::$app->wechat->getApp();
			   
			    $server = $app->server;
			    $server->setMessageHandler(function ($message) {
				    // $message->FromUserName // 用户的 openid
				    // $message->MsgType // 消息类型：event, text....
				    switch ($message->MsgType) {
					    case 'event':
						    //订阅公众号
						    if($message->Event == 'subscribe'){
							    return $this->subscribe($message);
						    }
						    //取消订阅事件
						    if($message->Event == 'unsubscribe'){
							    return $this->unsubscribe($message);
						    }
						    //已经订阅事件
						    if($message->Event == 'SCAN'){
							    //return $this->unsubscribe($message);
						    }
						    return '收到事件消息';
						    break;
					    case 'text':
						    return '收到文字消息';
						    break;
					    case 'image':
						    return '收到图片消息';
						    break;
					    case 'voice':
						    return '收到语音消息';
						    break;
					    case 'video':
						    return '收到视频消息';
						    break;
					    case 'location':
						    return '收到坐标消息';
						    break;
					    case 'link':
						    return '收到链接消息';
						    break;
					    default:
						    return '收到其它消息';
						    break;
				    }
			    });
			
			    $response = $server->serve();
			    return $response->send();
		    }catch (BadRequestException $e){
			
			    if($e->getMessage() === 'Invalid request.'){
				    throw  new HttpException(404);
			    }
			
		    }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

<?php
namespace frontend\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
//    public function __construct($token, $config = [])
//    {
//        if (empty($token) || !is_string($token)) {
//            throw new InvalidParamException('Password reset token cannot be blank.');
//        }
//        $this->_user = User::findByPasswordResetToken($token);
//        if (!$this->_user) {
//            throw new InvalidParamException('Wrong password reset token.');
//        }
//        parent::__construct($config);
//    }
	public function __construct( $config = [])
	{
		parent::__construct($config);
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
    
    /**
        修改密码，通过ID来处理
     */
    public function findByID($id)
    {
	    $this->_user = User::findOne(['id'=>intval($id)]);
	    if (!$this->_user) {
		    throw new InvalidParamException('ID is error');
	    }
    }
    
}

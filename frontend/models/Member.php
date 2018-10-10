<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 *
 * @property int $id ID编号
 * @property string $name 名称（不能为空）
 * @property string $sex 性别
 * @property string $headimage 头像
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sex'], 'required'],
            [['sex'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['headimage'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'headimage' => 'Headimage',
        ];
    }
}

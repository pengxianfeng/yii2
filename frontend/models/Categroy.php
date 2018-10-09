<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categroy".
 *
 * @property int $id ID编号
 * @property string $name 分类名称（不能为空）
 * @property int $f_id 上级ID
 * @property int $level 等级（一级菜单or二级菜单）
 * @property int $sort 排序
 */
class Categroy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categroy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'f_id', 'level', 'sort'], 'required'],
            [['f_id', 'level', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'f_id' => 'F ID',
            'level' => 'Level',
            'sort' => 'Sort',
        ];
    }
}

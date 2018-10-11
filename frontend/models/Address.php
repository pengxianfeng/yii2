<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id 自增ID
 * @property int $member_id 会员ID
 * @property string $province 省
 * @property string $city 市
 * @property string $district 区
 * @property string $address 地址
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'province', 'city', 'district', 'address', 'created_at', 'updated_at'], 'required'],
            [['member_id', 'created_at', 'updated_at'], 'integer'],
            [['province', 'city', 'district'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

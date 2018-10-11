<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id 自增ID
 * @property string $order_sn 订单编号
 * @property int $member_id 会员ID
 * @property double $price 订单价格
 * @property double $real_price 实际支付金额
 * @property double $free_price 减免金额
 * @property string $address 地址
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_sn', 'member_id', 'price', 'real_price', 'free_price', 'address', 'created_at', 'updated_at'], 'required'],
            [['member_id', 'created_at', 'updated_at'], 'integer'],
            [['price', 'real_price', 'free_price'], 'number'],
            [['order_sn'], 'string', 'max' => 60],
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
            'order_sn' => 'Order Sn',
            'member_id' => 'Member ID',
            'price' => 'Price',
            'real_price' => 'Real Price',
            'free_price' => 'Free Price',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_goods".
 *
 * @property int $id 自增ID
 * @property string $order_id 订单编号
 * @property int $member_id 会员ID
 * @property int $goods_id 商品ID
 * @property string $goods_sn 商品编号
 * @property double $price 商品价格
 * @property int $number 购买数量
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'member_id', 'goods_id', 'goods_sn', 'price', 'number', 'created_at', 'updated_at'], 'required'],
            [['member_id', 'goods_id', 'number', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['order_id'], 'string', 'max' => 60],
            [['goods_sn'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'member_id' => 'Member ID',
            'goods_id' => 'Goods ID',
            'goods_sn' => 'Goods Sn',
            'price' => 'Price',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<div class="self-default-index">
    <!--    <ul class="list-group">-->
    <!--		--><?php //foreach($list as $key=>$val){ ?>
    <!--            <li  class="list-group-item">--><?//=$val['username'] ?><!-- </li>-->
    <!--		--><?php // } ?>
    <!--    </ul>-->
    <div class="panel panel-default">
        <div class="panel-heading">会员订单</div>
        <table class="table">
            <tr><th>ID</th><th>订单号</th><th>总金额</th><th>实际支付金额</th><th>减免金额</th><th>操作</th></tr>
			<?php foreach($list as $key=>$val){ ?>
                <tr  >
                    <td  ><?=$val['id'] ?> </td>
                    <td  ><?=$val['order_sn'] ?> </td>
                    <td  ><?=$val['price'] ?> </td>
                    <td  ><?=$val['real_price'] ?> </td>
                    <td  ><?=$val['free_price'] ?> </td>
                    <td >
                        <a href="#">详情</a>
                    </td>
                </tr>
			<?php  } ?>
        </table>
    </div>
</div>
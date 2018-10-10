<div class="self-default-index">
    <!--    <ul class="list-group">-->
    <!--		--><?php //foreach($list as $key=>$val){ ?>
    <!--            <li  class="list-group-item">--><?//=$val['username'] ?><!-- </li>-->
    <!--		--><?php // } ?>
    <!--    </ul>-->
    <div class="panel panel-default">
        <div class="panel-heading">会员列表</div>
        <table class="table">
            <tr><th>ID</th><th>用户名</th><th>操作</th></tr>
			<?php foreach($list as $key=>$val){ ?>
                <tr  >
                    <td  ><?=$val['id'] ?> </td>
                    <td  ><?=$val['name'] ?> </td>
                    <td >
                        <a href="?r=back/member/update&id=<?=$val['id'] ?>">修改</a>
                        <a href="?r=back/member/update&id=<?=$val['id'] ?>">订单</a>
                        <a href="?r=back/member/update&id=<?=$val['id'] ?>">地址信息</a>
                    </td>
                </tr>
			<?php  } ?>
        </table>
    </div>
</div>
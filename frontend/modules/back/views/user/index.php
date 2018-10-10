<div class="self-default-index">
<!--    <ul class="list-group">-->
<!--		--><?php //foreach($list as $key=>$val){ ?>
<!--            <li  class="list-group-item">--><?//=$val['username'] ?><!-- </li>-->
<!--		--><?php // } ?>
<!--    </ul>-->
    <div class="panel panel-default">
        <div class="panel-heading">用户列表</div>
        <table class="table">
            <tr><th>ID</th><th>用户名</th><th>创建时间</th><th>操作</th></tr>
	        <?php foreach($list as $key=>$val){ ?>
            <tr  >
                <td  ><?=$val['id'] ?> </td>
                <td  ><?=$val['username'] ?> </td>
                <td ><?=date('Y-m-d',$val['created_at']) ?> </td>
                <td ><a href="?r=back/user/update&id=<?=$val['id'] ?>">修改</a> </td>
            </tr>
            <?php  } ?>
        </table>
    </div>
</div>
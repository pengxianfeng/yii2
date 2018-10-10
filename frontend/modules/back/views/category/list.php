<div class="self-default-index">
    <ul class="list-group">
        <li  class="list-group-item">
            <a  href="?r=back/category/add&id=0" class="glyphicon glyphicon-plus">新增顶级分类</a>
        </li>
		<?php foreach($list as $key=>$val){ ?>
            <li  class="list-group-item"><?=$val['name'] ?>
                <a  href="?r=back/category/add&id=<?=$val['id']?>" class="glyphicon glyphicon-plus"></a>
                <a  href="?r=back/category/delete&id=<?=$val['id']?>" class="glyphicon glyphicon-minus"></a>
            </li>
			<?php if(!empty($val['list'])){
				foreach($val['list'] as $k=>$v){ ?>
                    <li class="list-group-item">
                        <ul>
                            <li  class="" style="list-style:none"><?=$v['name'] ?>
                                <a  href="?r=back/category/delete&id=<?=$v['id']?>" class="glyphicon glyphicon-minus"></a>
                            </li>
                        </ul>
                    </li>
				<?php } } } ?>
    </ul>
</div>

<script src="/assets/a19762cd/jquery.js"></script>
<script src="/js/category.js"></script>

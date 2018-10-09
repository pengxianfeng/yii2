<div class="self-default-index">
    <ul class="list-group">
        <?php foreach($list as $key=>$val){ ?>
                <li  class="list-group-item"><?=$val['name'] ?> <a  href="javescript::void(0);"  data-id="<?=$val['id']?>" class="glyphicon glyphicon-plus addcate"></a> <a  href="javescript::void(0);" data-id="<?=$val['id']?>" class="glyphicon glyphicon-minus dropcate"></a></li>
                <li class="list-group-item">
                    <ul>
                            <li  class="" style="list-style:none"><?=$val['name'] ?>    <a  href="javescript::void(0);"  data-id="<?=$val['id']?>" class="glyphicon glyphicon-minus dropcate"></a></li>
                    </ul>
                </li>
        <?php  } ?>
    </ul>
</div>

<script src="/assets/a19762cd/jquery.js"></script>
<script src="/js/category.js"></script>

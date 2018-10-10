<div class="self-default-index">

    <div class="row">
        <div class="col-lg-5">
            <form  action="/index.php?r=back/category/add&id=<?=$info['id']?>" method="post">
                <div class="form-group field-resetpasswordform-password required">
                    <label class="control-label" >上级分类：<?=$info['name']?></label>
                    <p class="help-block help-block-error"></p>
                    <label class="control-label">新建分类名称</label>
                    <input type="text" id="name" class="form-control" name="name" autofocus aria-required="true">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

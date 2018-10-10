<div class="self-default-index">

    <div class="row">
        <div class="col-lg-5">
            <form id="reset-password-form" action="/index.php?r=back/user/update&id=<?=$id?>" method="post">
                <div class="form-group field-resetpasswordform-password required">
                    <label class="control-label" for="resetpasswordform-password">Password</label>
                    <input type="password" id="resetpasswordform-password" class="form-control" name="ResetPasswordForm[password]" autofocus aria-required="true">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

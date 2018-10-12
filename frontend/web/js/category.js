    $(".dropcate").click(function () {
        alert('aaaaaaaa');
    });
    $(".addcate").click(function () {
        abc();
    });

    function abc() {
        //设置自动提示窗口的配置信息
        var setting = {
            //提示的内容
            content: "弹出提示内容dsafdsafdsa"
        };

        //弹出提示信息
        sqh_tips(setting);
    }

    function sqh_tips(mysetting) {
        var setting = {
            //提示的内容
            content: "弹出提示内容",
            //指明弹出窗口的内容
            width: "200px",
            //显示的时间
            persistent: 1000,
            //显示回调函数
            beforeShow: function (obj) {
                $(obj).remove();
            }
            //退出的时间
            // hide: 300
        };

        //获取用户的配置文件
        setting = $.extend(setting, mysetting);

        function addHtml(setting) {
            var contentHtml = '<div id="' + setting.target + '">' +
                '<div style="position: fixed;top:30%;width: 100%;z-index:1050;" id="__dialog_div">' +
                '<div style="position: relative;width: ' + setting.width + ';margin:0px auto;" onclick="remove()">' +
                '<div class="alert alert-info">' +
                setting.content +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="modal-backdrop fade in" id="__zhezhao"></div>' +
                '</div>';
            //将遮罩效果代码添加到body标签中
            $("body").append(contentHtml);
            //让弹出内容有进入 和 退出的效果
            $("#" + setting.target).show().delay(setting.persistent).hide(setting.hide, function () {
                setting.beforeShow(this);
            });
        }

        //如果传递的参数不正确，则
        if (typeof setting != "object") {
            setting.content = "参数传递有误";
        }

        //添加代码，弹出效果
        addHtml(setting);
    }

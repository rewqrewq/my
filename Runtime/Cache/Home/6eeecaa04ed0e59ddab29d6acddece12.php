<?php if (!defined('THINK_PATH')) exit();?><link href="/my/Application/Weibo/Static/css/weibo.css" type="text/css" rel="stylesheet"/>
<div class="block-bar">
    <div class="container">
        <div class="block-body row">
                                                    <div class="col-md-10" style="padding: 5px">
                                                        <div class="weibo_content_p">
<script>
    $(function(){
        $('#weibo-list-1').slimScroll({
            height: '100%'
        });
        $('#weibo-list-2').slimScroll({
            height: '100%'
        });
        $('.pswp__ui--hidden').hide();
    });
</script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 visible-lg">
                                                    <div class="col-md-10" style="padding: 5px">
                                                        <div class="weibo_content_p">
                    <span>
                                                            &nbsp;&nbsp;<span><?php echo L('_FROM_');?> <?php if($weibo['from'] == ''): echo L('_WEBSITE_SIDE_');?> <?php else: ?><strong><?php echo ($weibo["from"]); ?></strong><?php endif; ?></span>
                                                        </div>
<script>
    $(function () {
        ucard();
        bind_weibo_popup();
    })

</script>
<link rel="stylesheet" href="/my/Application/Weibo/Static/css/photoswipe.css">
<link rel="stylesheet" href="/my/Application/Weibo/Static/css/default-skin/default-skin.css">
<script src="/my/Application/Weibo/Static/js/photoswipe.min.js"></script>
<script src="/my/Application/Weibo/Static/js/photoswipe-ui-default.min.js"></script>
<script src="/my/Application/Weibo/Static/js/weibo.js"></script>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php echo hook('syncMeta');?>

<?php $oneplus_seo_meta = get_seo_meta($vars,$seo); ?>
<?php if($oneplus_seo_meta['title']): ?><title><?php echo ($oneplus_seo_meta['title']); ?></title>
    <?php else: ?>
    <title><?php echo modC('WEB_SITE_NAME',L('_OPEN_SNS_'),'Config');?></title><?php endif; ?>
<?php if($oneplus_seo_meta['keywords']): ?><meta name="keywords" content="<?php echo ($oneplus_seo_meta['keywords']); ?>"/><?php endif; ?>
<?php if($oneplus_seo_meta['description']): ?><meta name="description" content="<?php echo ($oneplus_seo_meta['description']); ?>"/><?php endif; ?>

<!-- zui -->
<link href="/Public/zui/css/zui.css" rel="stylesheet">

<link href="/Public/zui/css/zui-theme.css" rel="stylesheet">
<link href="/Public/css/core.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/Public/js/ext/magnific/magnific-popup.css"/>
<!--<script src="/Public/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/js/com/com.functions.js"></script>

<script type="text/javascript" src="/Public/js/core.js"></script>-->
<script src="/Public/js.php?f=js/jquery-2.0.3.min.js,js/com/com.functions.js,js/core.js,js/com/com.toast.class.js,js/com/com.ucard.js"></script>




    <link href="/Application/People/Static/css/people.css" rel="stylesheet" type="text/css"/>

<!--合并前的js-->
<?php $config = api('Config/lists'); C($config); $count_code=C('COUNT_CODE'); ?>
<script type="text/javascript">
    var ThinkPHP = window.Think = {
        "ROOT": "", //当前网站地址
        "APP": "/index.php?s=", //当前项目地址
        "PUBLIC": "/Public", //项目公共目录地址
        "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
        "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        'URL_MODEL': "<?php echo C('URL_MODEL');?>",
        'WEIBO_ID': "<?php echo C('SHARE_WEIBO_ID');?>"
    }
    var cookie_config={
        "prefix":"<?php echo C('COOKIE_PREFIX');?>"
    }
    var Config={
        'GET_INFORMATION':<?php echo modC('GET_INFORMATION',1,'Config');?>,
        'GET_INFORMATION_INTERNAL':<?php echo modC('GET_INFORMATION_INTERNAL',10,'Config');?>*1000
    }
    var weibo_comment_order = "<?php echo modC('COMMENT_ORDER',0,'WEIBO');?>";
</script>

<script src="/Public/lang.php?module=<?php echo strtolower(MODULE_NAME);?>&lang=<?php echo LANG_SET;?>"></script>

<script src="/Public/expression.php"></script>

<!-- Bootstrap库 -->
<!--
<?php $js[]=urlencode('/static/bootstrap/js/bootstrap.min.js'); ?>

&lt;!&ndash; 其他库 &ndash;&gt;
<script src="/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/Public/Core/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.iframe-transport.js"></script>
-->
<!--CNZZ广告管家，可自行更改-->
<!--<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>-->
<!--CNZZ广告管家，可自行更改end-->
<!-- 自定义js -->
<!--<script src="/Public/js.php?get=<?php echo implode(',',$js);?>"></script>-->


<script>
    //全局内容的定义
    var _ROOT_ = "";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
    var ACTION_NAME="<?php echo ACTION_NAME; ?>";
    var CONTROLLER_NAME ="<?php echo CONTROLLER_NAME; ?>";
    var initNum = "<?php echo modC('WEIBO_NUM',140,'WEIBO');?>";
    function adjust_navbar(){
        $('#sub_nav').css('top',$('#nav_bar').height());
        $('#main-container').css('padding-top',$('#nav_bar').height()+$('#sub_nav').height()+20)
    }
</script>

<audio id="music" src="" autoplay="autoplay"></audio>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>
</head>
<body>
	<!-- 头部 -->
	<script src="/Public/js/com/com.talker.class.js"></script>
<?php if((is_login()) ): ?><div id="talker">

    </div><?php endif; ?>

<?php D('Common/Member')->need_login(); ?>
<!--[if lt IE 8]>
<div class="alert alert-danger" style="margin-bottom: 0"><?php echo L('_TIP_BROWSER_DEPRECATED_1_');?> <strong><?php echo L('_TIP_BROWSER_DEPRECATED_2_');?></strong>
    <?php echo L('_TIP_BROWSER_DEPRECATED_3_');?> <a target="_blank"
                                          href="http://browsehappy.com/"><?php echo L('_TIP_BROWSER_DEPRECATED_4_');?></a>
    <?php echo L('_TIP_BROWSER_DEPRECATED_5_');?>
</div>
<![endif]-->

<?php $unreadMessage=D('Common/Message')->getHaventReadMeassageAndToasted(is_login()); ?>

<div id="nav_bar" class="nav_bar">

    <div class="container">

        <nav class="" id="nav_bar_container">
            <?php $logo = get_cover(modC('LOGO',0,'Config'),'path'); $logo = $logo?$logo:'/Public/images/logo.png'; ?>

            <a class="navbar-brand logo" href="/" style="padding:3px"><img src="<?php echo ($logo); ?>" style="height: 47px"/></a>

            <div class="" id="nav_bar_main">

                <ul class="nav navbar-nav navbar-left">
                    <?php $__NAV__ = D('Channel')->lists(true);$__NAV__ = list_to_tree($__NAV__, "id", "pid", "_"); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav['_']) != ""): ?><li class="dropdown">
                                <a title="<?php echo ($nav["title"]); ?>" class="dropdown-toggle nav_item" data-toggle="dropdown"
                                   href="#"><i
                                        class="icon-<?php echo ($nav["icon"]); ?> app-icon"></i> <?php echo ($nav["title"]); ?> <i
                                        class="icon-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if(is_array($nav["_"])): $i = 0; $__LIST__ = $nav["_"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subnav): $mod = ($i % 2 );++$i;?><li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   style="color:<?php echo ($subnav["color"]); ?>"
                                                                   href="<?php echo (get_nav_url($subnav["url"])); ?>"
                                                                   target="<?php if(($subnav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><i
                                                class="icon-<?php echo ($subnav["icon"]); ?>"></i> <?php echo ($subnav["title"]); ?>
                                        </a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li class="<?php if((get_nav_active($nav["url"])) == "1"): ?>active<?php else: endif; ?>">
                                <a title="<?php echo ($nav["title"]); ?>" href="<?php echo (get_nav_url($nav["url"])); ?>"
                                   target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><i
                                        class="icon-<?php echo ($nav["icon"]); ?> app-icon "></i>
                                    <span style="color:<?php echo ($nav["color"]); ?>"><?php echo ($nav["title"]); ?></span>
                                    <span class="label label-badge rank-label" title="<?php echo ($nav["band_text"]); ?>"
                                          style="background: <?php echo ($nav["band_color"]); ?> !important;color:white !important;"><?php echo ($nav["band_text"]); ?></span>
                                </a>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(modC('OPEN_IM',1,'Config')): ?><li>
                            <?php if(is_login()): ?><a class="" onclick="talker.show()"><i class="icon-chat-dot"> </i>
                                    <i id="friend_has_new"
                                    <?php $map_mid=is_login(); $modelTP=D('talk_push'); $has_talk_push=$modelTP->where("(uid = ".$map_mid." and status = 1) or (uid =
                                        ".$map_mid." and status =
                                        0)")->count(); $has_message_push=D('talk_message_push')->where("uid= ".$map_mid." and (status=1 or
                                        status=0)")->count(); if($has_talk_push || $has_message_push){ ?>
                                    style="display: inline-block"
                                    <?php } ?>
                                    ></i>
                                </a>
                                <?php else: ?>
                                <a onclick="toast.error(<?php echo L('_PANEL_LIMIT_');?>)"> <i class="icon-chat-dot"> </i>
                                </a><?php endif; ?>
                        </li><?php endif; ?>


                    <!--登陆面板-->
                    <?php if(is_login()): ?><li class="dropdown">
                            <div></div>
                            <a id="nav_info" class="dropdown-toggle text-left" data-toggle="dropdown">
                                <span class="icon-bell"></span><span id="nav_bandage_count"
                                <?php if(count($unreadMessage) == 0): ?>style="display: none"<?php endif; ?>
                                class="label label-badge label-success"><?php echo count($unreadMessage);?></span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <li>
                                    <div class="clearfix header">
                                        <div class="col-xs-6 nav_align_left"><span
                                                id="nav_hint_count"><?php echo count($unreadMessage);?></span> <?php echo L('_UNREAD_');?>
                                        </div>
                                    </div>
                                </li>
                                <li class="info-list">
                                    <div class="list-wrap">
                                        <ul id="nav_message" class="dropdown-menu-list scroller  list-data"
                                            style="width: auto;">
                                            <?php if(count($unreadMessage) == 0): ?><div style="font-size: 18px;color: #ccc;font-weight: normal;text-align: center;line-height: 150px">
                                                    <?php echo L('_NO_MESSAGE_');?>
                                                </div>
                                                <?php else: ?>
                                                <?php if(is_array($unreadMessage)): $i = 0; $__LIST__ = $unreadMessage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?><li>
                                                        <a data-url="<?php echo ($message["content"]["web_url"]); ?>"
                                                           onclick="Notify.readMessage(this,<?php echo ($message["id"]); ?>)">
                                                            <h3 class="margin-top-0"><i class="icon-bell"></i>
                                                                <?php echo ($message["content"]["title"]); ?></h3>

                                                            <p> <?php echo ($message["content"]["content"]); ?></p>
                                                        <span class="time">

                                                         <?php echo ($message["ctime"]); ?>

                                                        </span>
                                                        </a>
                                                    </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                        </ul>
                                    </div>
                                </li>
                                <li class="footer text-right">
                                    <div class="btn-group">
                                        <button onclick="Notify.setAllReaded()" class="btn btn-sm  "><i
                                                class="icon-check"></i> <?php echo L('_ALL_HAS_READ_');?>
                                        </button>
                                        <a class="btn  btn-sm  " href="<?php echo U('ucenter/Message/message');?>">
                                            <?php echo L('_VIEW_NEWS_');?>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a title="<?php echo L('_EDIT_INFO_');?>" href="<?php echo U('ucenter/Config/index');?>"><i
                                    class="icon-cog"></i></a>
                        </li>
                        <li class="top_spliter"></li>
                        <li class="dropdown">
                            <?php $common_header_user = query_user(array('nickname')); ?>
                            <a role="button" class="dropdown-toggle dropdown-toggle-avatar" data-toggle="dropdown">
                                <?php echo ($common_header_user["nickname"]); ?>&nbsp;<i style="font-size: 12px"
                                                                       class="icon-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu text-left" role="menu">
                                <?php $user_nav=S('common_user_nav'); if($user_nav===false){ $user_nav=D('UserNav')->order('sort asc')->where('status=1')->select(); S('common_user_nav',$user_nav); } ?>

                                <?php if(is_array($user_nav)): $i = 0; $__LIST__ = $user_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a style="color:<?php echo ($vo["color"]); ?>"
                                           target="<?php if(($vo["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"
                                           href="<?php echo get_nav_url($vo['url']);?>"><span
                                            class="icon-<?php echo ($vo["icon"]); ?>"></span>&nbsp;&nbsp;<?php echo ($vo["title"]); ?> <span
                                            class="label label-badge rank-label" title="<?php echo ($vo["band_text"]); ?>"
                                            style="background: <?php echo ($vo["band_color"]); ?> !important;color:white !important;"><?php echo ($vo["band_text"]); ?></span></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                <?php $register_type=modC('REGISTER_TYPE','normal','Invite'); $register_type=explode(',',$register_type); if(in_array('invite',$register_type)){ ?>
                                <li><a href="<?php echo U('ucenter/Invite/invite');?>"><span
                                        class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;<?php echo L('_INVITE_FRIENDS_');?></a>
                                </li>
                                <?php } ?>

                                <?php echo hook('personalMenus');?>
                                <?php if(check_auth('Admin/Index/index')): ?><li><a href="<?php echo U('Admin/Index/index');?>" target="_blank"><span
                                            class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;<?php echo L('_MANAGE_BACKGROUND_');?></a>
                                    </li><?php endif; ?>
                                <li><a event-node="logout"><span
                                        class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;<?php echo L('_LOGOUT_');?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="top_spliter "></li>
                        <?php else: ?>


                        <li class="top_spliter "></li>
                        <?php $open_quick_login=modC('OPEN_QUICK_LOGIN', 0, 'USERCONFIG'); $register_type=modC('REGISTER_TYPE','normal','Invite'); $register_type=explode(',',$register_type); $only_open_register=0; if(in_array('invite',$register_type)&&!in_array('normal',$register_type)){ $only_open_register=1; } ?>
                        <script>
                            var OPEN_QUICK_LOGIN = "<?php echo ($open_quick_login); ?>";
                            var ONLY_OPEN_REGISTER = "<?php echo ($only_open_register); ?>";
                        </script>
                        <li class="">
                            <a data-login="do_login"><?php echo L('_LOGIN_');?></a>
                        </li>
                        <li class="">
                            <a data-role="do_register" data-url="<?php echo U('Ucenter/Member/register');?>"><?php echo L('_REGISTER_');?></a>
                        </li>
                        <li class="spliter "></li><?php endif; ?>
                </ul>

            </div>
            <!--导航栏菜单项-->

        </nav>
    </div>
</div>
<!--换肤插件钩子-->
<?php echo hook('setSkin');?>
<!--换肤插件钩子 end-->
<div id="tool" class="tool ">
    <?php echo hook('tool');?>
    <?php if(check_auth('Core/Admin/View')): ?><!--  <a href="javascript:;" class="admin-view"></a>--><?php endif; ?>
    <a  id="go-top" href="javascript:;" class="go-top "></a>

</div>
<?php if(is_login()&&(get_login_role_audit()==2||get_login_role_audit()==0)){ ?>
<div id="top-role-tip" class="alert alert-danger">
    <?php echo L('_TIP_ROLE_NOT_AUDITED1_');?> <strong><?php echo L('_TIP_ROLE_NOT_AUDITED2_');?></strong><?php echo L('_TIP_ROLE_NOT_AUDITED3_');?>
    <a target="_blank" href="<?php echo U('ucenter/config/role');?>"><?php echo L('_TIP_ROLE_NOT_AUDITED4_');?></a>
</div>
<script>
    $(function () {
        $('#top-role-tip').css('margin-top', $('#nav_bar').height() + 15);
        $('#top-role-tip').css('margin-bottom', -$('#nav_bar').height()+15);
    });
</script>
<?php } ?>
<!--顶部导航之后的钩子，调用公告等-->
<?php echo hook('afterTop');?>
<!--顶部导航之后的钩子，调用公告等 end-->



	<!-- /头部 -->
	
	<!-- 主体 -->
	<div class="main-wrapper">
    
    <div id="sub_nav">
    <?php $logo = get_cover(modC('LOGO',0,'Config'),'path'); $logo = $logo?$logo:'/Public/images/logo.png'; ?>

    <nav class="navbar navbar-default" >
        <div class="container"  style="width:1180px;">
            <a class="navbar-brand logo" href="<?php echo U('index');?>"><i class="icon-group"></i> <?php echo L('_FP_');?></a>
            <ul class="nav navbar-nav navbar-left">
                <li id="tab_index">
                    <a href="<?php echo U('index');?>"><?php echo L('_FP_BY_TAG_');?></a>
                </li>
                <li id="tab_area">
                    <a href="<?php echo U('area');?>"><?php echo L('_FP_BY_AREA_');?></a>
                </li>
            </ul>
            <script>
                $('#tab_<?php echo ($tab); ?>').addClass('active');
                var follower = {
                    'bind_follow': function () {
                        $('[data-role="follow"]').unbind('click')
                        $('[data-role="follow"]').click(function () {
                            var $this = $(this);
                            var uid = $this.attr('data-follow-who');
                            $.post(U('Core/Public/follow'), {uid: uid}, function (msg) {
                                if (msg.status) {

                                    $this.attr('class', $this.attr('data-before'));
                                    $this.attr('data-role', 'unfollow');
                                    $this.html('<?php echo L("_FOLLOWED_");?>');
                                    follower.bind_follow();
                                    toast.success(msg.info, <?php echo L('_PROMPT_');?>);
                                } else {
                                    toast.error(msg.info,<?php echo L('_PROMPT_');?>);
                                }
                            }, 'json');
                        })

                        $('[data-role="unfollow"]').unbind('click')
                        $('[data-role="unfollow"]').click(function () {
                            var $this = $(this);
                            var uid = $this.attr('data-follow-who');
                            $.post(U('Core/Public/unfollow'), {uid: uid}, function (msg) {
                                if (msg.status) {
                                    $this.attr('class', $this.attr('data-after'));
                                    $this.attr('data-role', 'follow');
                                    $this.html('<?php echo L("_FOLLOWERS_");?>');
                                    follower.bind_follow();
                                    toast.success(msg.info,<?php echo L('_PROMPT_');?>);
                                } else {
                                    toast.error(msg.info, <?php echo L('_PROMPT_');?>);
                                }
                            }, 'json');
                        })
                    }
                }
            </script>
            <form class="navbar-form navbar-right" action="<?php echo U('People/Index/index');?>"  method="post" role="search">
                <input  type="hidden" name="tag" value="<?php echo ($tag_id); ?>">
                <input  type="hidden" name="role" value="<?php echo ($role_id); ?>">
                <div class="search-input-group">
                    <a href="javascript:void(0);" onclick="$(this).parents('form').submit();" class="input-btn"><i class="icon-search"></i></a>
                    <input type="text" class="input" placeholder="<?php echo L('_NICKNAME_');?>" name="keywords" value="<?php echo ($nickname); ?>">
                </div>
                </span>
            </form>
        </div>
    </nav>
</div>

    <div id="main-container" class="container">
        <div class="row">
            

    <div class="container">
    <!--地区选择块-->
        

    <div class="row">

        <?php if(!empty($tag_arealist)||!empty($role_list)): ?><div class="col-xs-12">
                <form id="tag-select" class="form-horizontal" action="<?php echo U('People/Index/index');?>" method="post">
                    <input type="hidden" name="role" data-role="role-id" value="<?php echo ($role_id); ?>">
                    <input type="hidden" name="tag" data-role="tag-id" value="<?php echo ($tag_id); ?>">
                    <input type="hidden" name="keywords" data-role="keywords" value="<?php echo ($nickname); ?>">
                    <div class="common-block margin-bottom-15" style="padding-bottom: 10px;border: 1px solid #ddd;">

                        <div id="tag_list_block" >
                            <?php if(!empty($tag_arealist)): ?><div class="tag-select-area-block clearfix" style="padding-top:10px;">
                                        <!--地区内容-->

                                        <b>

                                          <a class="area_name_1"  href="<?php echo U('Index/area',array('arearank'=>0));?>"> 全部</a>
                                            <a class="area_name_1"  href="javascript:void(0);" onclick="goback()"> <?php echo ($goback); ?></a>
                                        </b>



                                        <b><a><?php echo ($areaname); ?></a></b><br/>
                                <?php if(is_array($tag_arealist)): $i = 0; $__LIST__ = $tag_arealist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a  class="area_name" href="<?php echo U('Index/area',array('arearank'=>$vo['id'],'arealv'=>$vo['level'],'areaname'=>$vo['name']));?>"><?php echo ($vo["name"]); ?>(<?php echo ($vo["number"]); ?>)</a><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </div><?php endif; ?>

                        </div>

                        <div id="show_more_button_block" class="tag-select-block clearfix" style="padding-top:10px;text-align: center;border-top: 1px dashed #CDCDCD;display: none;">
                            <a href="javascript:void(0);" data-role="show_more_button" act-type="down" style="display: inline-block;width: 100%;">
                                <?php echo L("_UNFOLD_"); echo L("_ALL_");?><i class="icon-double-angle-down" style="font-size: 16px;margin-left: 5px;"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div><?php endif; ?>
        <?php if(!empty($tag_arealist)||!empty($role_list)): ?><script>
                var show_height="<?php echo modC('MAX_SHOW_HEIGHT','160','People');?>";
                var tag_arealist_block_height=$('#tag_arealist_block').height();
                var set_tag_arealist=function(){
                    $('#tag_arealist_block').css("height",show_height);
                    $('#show_more_button_block').show();
                }
                    if(tag_arealist_block_height>show_height){
                        set_tag_arealist();
                        $('[data-role="show_more_button"]').click(function(){
                            var click_type=$(this).attr('act-type');
                            if(click_type=='down'){
                                $(this).attr('act-type','up');
                                $(this).html('<?php echo L("_TEMP_FOLD_");?><i class="icon-double-angle-up" style="font-size: 16px;margin-left: 5px;"></i>');
                                $('#tag_arealist_block').animate({"height":tag_arealist_block_height});
                            }else{
                                $(this).attr('act-type','down');
                                $(this).html('<?php echo L("_UNFOLD_"); echo L("_ALL_");?><i class="icon-double-angle-down" style="font-size: 16px;margin-left: 5px;"></i>');
                                $('#tag_arealist_block').animate({"height":show_height});
                            }
                        });
                    }

                    $('[data-role="select_tag"]').click(function () {
                        var id = $(this).attr('data-id');
                        $('[data-role="tag-id"]').val(id);
                        $('#tag-select').submit();
                    });
                    $('[data-role="select_role"]').click(function () {
                        var id = $(this).attr('data-id');
                        $('[data-role="role-id"]').val(id);
                        $('[data-role="tag-id"]').val('');
                        $('#tag-select').submit();
                    });



            </script><?php endif; ?>

    </div>
<script>
    function goback() {
    history.go(-1);
    }

</script>

        <!--会员显示区-->
        <div class="row">
            <?php if(is_array($lists["data"])): $i = 0; $__LIST__ = $lists["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-3 ">
    <div class="user-card user-card-area">

        <div class="top_self" style="background: white;height: 70px;border-radius: 3px">

        </div>
        <div class="user_info" style="padding: 0;background-color: #ffffff;">

            <div class="avatar-bg">
                <div class="headpic ">
                    <a href="<?php echo ($vo["space_url"]); ?>" ucard="<?php echo ($vo["uid"]); ?>">
                        <img src="<?php echo ($vo["avatar128"]); ?>" class="avatar-img" style="width:80px;"/>
                    </a>
                </div>
                <div class="clearfix " style="margin-bottom:8px">
                    <div class="clearfix text-ellipsis ">
                        <div class="col-xs-12 nickname" style="text-align: center">
                        <span class="">
                            <?php echo ($vo["title"]); ?>
                        <a ucard="<?php echo ($vo["uid"]); ?>" href="<?php echo ($vo["space_url"]); ?>"
                           class="user_name"><?php echo (htmlspecialchars($vo["nickname"])); ?></a>

                            </span><br/>

                               <!--输出用户所在地-->
                            <span class="text-muted"><?php echo ($vo["province"]); ?>
                            <?php echo ($vo["city"]); ?>
                            <?php echo ($vo["district"]); ?></span>

                        </div>

                    </div>
                 <!--   <script>
                        $(function () {
                            $('#upgrade_' + '<?php echo ($vo["uid"]); ?>').tooltip({
                                        html: true,
                                        title: '<?php echo L("_CURRENT_STAGE_");?>：<?php echo ($vo["title"]); ?> <br/><?php echo L("_NEXT_STAGE_");?>：<?php echo ($vo["level"]["next"]); ?><br/><?php echo L("_NOW_");?>：<?php echo ($vo["score"]); ?><br/><?php echo L("_NEED_");?>：<?php echo ($vo["level"]["upgrade_require"]); ?><br/><?php echo L("_NEXT_"); echo L("_NEED_");?>： <?php echo ($vo["level"]["left"]); ?><br/><?php echo L("_LV_UP_PROGRESS_");?>：<?php echo ($vo["level"]["percent"]); ?>% <br/> '
                                    }
                            );
                        })
                    </script>-->

                </div>

                <div id="upgrade_<?php echo ($vo["uid"]); ?>" data-toggle="tooltip" data-placement="bottom" title=""
                     style="padding-bottom: 10px;padding-top: 0px">
                    <div style="border-top:1px solid #eee;"></div>
                <!--    <div style="border-top: 1px solid rgb(3, 199, 3);margin-top: -1px;width: <?php echo ($vo["level"]["percent"]); ?>%;z-index: 9999;">

                    </div>-->
                </div>
                <div class="clearfix user-data">

                    <div class="col-xs-4 text-center">
                        <a href="<?php echo U('Ucenter/index/fans',array('uid'=>$vo['uid']));?>" title="<?php echo L('_FANS_'); echo L('_NUMBER_');?>"><?php echo ($vo["fans"]); ?></a><br><?php echo L('_FANS_');?>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="<?php echo U('Ucenter/index/following',array('uid'=>$vo['uid']));?>"
                           title="<?php echo L('_FOLLOWERS_'); echo L('_NUMBER_');?>"><?php echo ($vo["following"]); ?></a><br><?php echo L('_FOLLOWERS_');?>
                    </div>
                    <div class="col-xs-4 text-center">
                        <?php if(is_login() && $vo['uid'] != get_uid()): ?><p class="text-center">
                                <?php echo W('Common/Follow/follow',array('follow_who'=>$vo['uid'],'btn-before','btn-after'));?>
                            </p>
                            <?php else: ?>
                            <?php if($vo['uid'] == get_uid()): ?><p class="text-center">
                                    <a class="" disabled="disabled" style="  line-height: 40px;">
                                        <?php echo L('_SELF_');?>
                                    </a>
                                </p><?php endif; endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<script>

</script><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

    <?php if($lists['count'] == 0): ?><div style="font-size:3em;padding:2em 0;color: #ccc;text-align: center"><?php echo L('_NO_ONE_');?></div><?php endif; ?>

    <div class="pull-right">
        <?php echo ($lists["html"]); ?>
    </div>

    </div>


        </div>
    </div>
</div>
	<!-- /主体 -->

	<!-- 底部 -->
	<div class="footer-bar ">

    <div class="container">
        <div class="row">
            <div class="col-xs-4">

                <h2>
                    <i class="icon-location-arrow"></i> <?php echo L('_ABOUT_US_');?>
                </h2>
                <p>
                    <?php echo modC('ABOUT_US',L('_NOT_SET_NOW_'),'Config');?>
                </p>
            </div>
            <div class="col-xs-4">
                <h2>
                    <i class="icon-star-empty"></i> <?php echo L('_FOLLOW_US_');?>
                </h2>
                <p>
                    <?php echo modC('SUBSCRIB_US',L('_NOT_SET_NOW_'),'Config');?>
                </p>
            </div>
            <div class="col-xs-4">
                <h2>
                    <i class="icon-link"></i> <?php echo L('_FRIENDLY_LINK_');?>
                </h2>

                <ul class="friend-link">
                    <?php echo Hook('friendLink');?>
                </ul>

            </div>
        </div>

        <div class="row text-center">
            <hr>

                <h4> <?php echo modC('COPY_RIGHT',L('_NOT_SET_NOW_'),'Config');?></h4>
                <div class="col-xs-12"><?php echo L('_RECORD_N_');?><a href="http://www.miitbeian.gov.cn/" target="_blank">
                    <?php echo modC('ICP',L('_NOT_SET_NOW_'),'Config');?> </a>
                </div>

            <?php echo ($count_code); ?>
            <div>
                Powered by Alex
            </div>

        </div>
    </div>

</div>

<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->


<!-- 为了让html5shiv生效，请将所有的CSS都添加到此处 -->
<link type="text/css" rel="stylesheet" href="/Public/static/qtip/jquery.qtip.css"/>


<!--<script type="text/javascript" src="/Public/js/com/com.notify.class.js"></script>-->

<!-- 其他库-->
<!--<script src="/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/Public/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.iframe-transport.js"></script>

<script type="text/javascript" src="/Public/js/ext/magnific/jquery.magnific-popup.min.js"></script>-->

<!--<script type="text/javascript" src="/Public/js/ext/placeholder/placeholder.js"></script>
<script type="text/javascript" src="/Public/js/ext/atwho/atwho.js"></script>
<script type="text/javascript" src="/Public/zui/js/zui.js"></script>-->
<link type="text/css" rel="stylesheet" href="/Public/js/ext/atwho/atwho.css"/>

<script src="/Public/js.php?t=js&f=js/com/com.notify.class.js,static/qtip/jquery.qtip.js,js/ext/slimscroll/jquery.slimscroll.min.js,js/ext/magnific/jquery.magnific-popup.min.js,js/ext/placeholder/placeholder.js,js/ext/atwho/atwho.js,zui/js/zui.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script type="text/javascript" src="/Public/static/jquery.iframe-transport.js"></script>

<script src="/Public/js/ext/lazyload/lazyload.js"></script>



<!-- 用于加载js代码 -->

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
    
</div>

	<!-- /底部 -->
</body>
</html>
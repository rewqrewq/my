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




    <link href="/Application/Issue/Static/css/issue.css" rel="stylesheet" type="text/css"/>

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

            <a class="navbar-brand logo" href="/"><img src="<?php echo ($logo); ?>" style="height: 47px"/></a>

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




	<!-- /头部 -->
	
	<!-- 主体 -->
	<div class="main-wrapper">
    
    <?php echo W('Common/SubMenu/render',array($sub_menu,$current,$MODULE_ALIAS,''));?>

    <!--顶部导航之后的钩子，调用公告等-->
<?php echo hook('afterTop');?>
<!--顶部导航之后的钩子，调用公告等 end-->
    <div id="main-container" class="container">
        <div class="row">
            


<div class="content-body col-md-12">
        <h2 class="content-title">
            <?php echo ($content["title"]); ?>
        </h2>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img  style="width: 350px;height: 262px" src="<?php echo (getthumbimagebyid($content["cover_id"],350,262)); ?>"/>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="row">

                    <div class="col-md-8">
                        <ul class="operation clearfix">
                            <li><i class="icon-eye-open"></i><?php echo ($content["view_count"]); ?></li>
                            <li><?php echo Hook('support',array('table'=>'issue_content','row'=>$content['id'],'app'=>'Issue','uid'=>$content['uid'],'jump'=>'issue/index/issuecontentdetail'));?></li>
                            <li><i class="icon-comments-alt"></i><?php echo ($content["reply_count"]); ?></li>
                        </ul>

                    </div>
                    <div class="col-md-4">
                        <div class="pull-right">
                            <?php echo W('Common/Share/detailShare');?>
                        </div>

                    </div>

                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-2" style="text-align: center">
                        <img ucard="<?php echo ($content["user"]["id"]); ?>" src="<?php echo ($content["user"]["avatar64"]); ?>" class="avatar-img" style="width: 64px"/>
                        <br/>

                           <a href="<?php echo ($content["user"]["space_url"]); ?>"> <?php echo ($content["user"]["nickname"]); ?> </a>

                    </div>
                    <div class="col-md-8">

                        <div class="signature word-wrap">
                            <div class="triangle"></div>
                            <div class="triangle_left"></div>
                            <?php if(($content["user"]["signature"]) == ""): echo L('_NO_MIND_'); endif; ?>
                            <?php echo ($content["user"]["signature"]); ?>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 40px">
                    <div class="col-md-4">
                        <?php if(($content["url"]) != ""): ?><a class="btn btn-primary " target="_blank" href="<?php echo ($content["url"]); ?>" ><i class="glyphicon glyphicon-cloud"></i>&nbsp;<?php echo L('_VISIT_');?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
                        <?php if(($content['uid'] == is_login()) OR check_auth('editIssueContent')): ?><a class="btn btn-primary " href="<?php echo U('edit',array('id'=>$content['id']));?>" style="margin-right: 25px;" ><i class="glyphicon glyphicon-pencil"></i>&nbsp;<?php echo L('_EDIT_');?></a><?php endif; ?>

                       <?php echo W('Weibo/Share/shareBtn',array('param'=>array('app'=>'Issue','model'=>'IssueContent','method'=>'find','id'=>$content['id'],'img'=>get_cover($content['cover_id'],'path'),'from'=>L('_MODULE_'),'site_link'=>U('issue/index/issuecontentdetail',array('id'=>$content['id']))),'text'=>L('_SHARE_'),'css'=>array('class'=>'btn btn-primary')));?>



                    </div>
                    <div class="col-md-8">
                        <div class="pull-right" style="color: #999">
                            <?php echo L('_PUBLISH_TIME_');?>：  <?php echo (friendlydate($content["create_time"])); ?> &nbsp;&nbsp;
                            <?php echo L('_UPDATE_TIME_');?>： <?php echo (friendlydate($content["update_time"])); ?>
                        </div>
                    </div>

               </div>


           </div>


        </div>

    <hr/>
        <div>
            <h3><?php echo L('_INTRO_');?></h3>
            <?php echo (render($content["content"])); ?>
        </div>
    <div>
    <?php echo hook('localComment', array('path'=>"Issue/issueContent/$content[id]", 'uid'=>$content['uid'],'count_model'=>'issue_content','count_field'=>'reply_count','this_url'=>'Issue/Index/issueContentDetail'));?>
    </div>
</div>


    <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/static/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css"/>
    <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>

    <?php if(check_auth('addIssueContent')): ?><!-- Modal -->
    <div id="frm-post-popup" class="white-popup mfp-hide" style="max-width: 745px">
        <h2><?php echo L('_CONTRIBUTE_');?></h2>

        <div class="aline" style="margin-bottom: 10px"></div>
        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="controls">
                        <input type="file" id="upload_picture_cover">
                        <div class="upload-img-box" style="margin-top: 20px;width: 250px">
                            <div style="font-size:3em;padding:2em 0;color: #ccc;text-align: center"><?php echo L('_COVER_NASI_');?></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <form class="form-horizontal  ajax-form" role="form"  action="<?php echo U('Issue/Index/doPost');?>" method="post">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><?php echo L('_TITLE_');?></label>

                            <div class="col-sm-10">
                                <input id="title" name="title" type="" class="form-control" value="" placeholder=<?php echo L('_TITLE_');?>/>
                            </div>

                            <input type="hidden" name="cover_id" id="cover_id_cover" value="<?php echo ($data['cover']); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="issue_top" class="col-sm-2 control-label"><?php echo L('_CATEGORY_');?></label>
                            <div class="col-sm-5">
                                <select id="issue_top" name="issue" class="form-control">
                                    <?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><option value="<?php echo ($top["id"]); ?>">
                                            <?php echo ($top["title"]); ?>
                                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>

                            <script>
                                $(function(){

                                    $('#issue_top').change(function(){
                                        var pid=$(this).val();
                                        $.post("<?php echo U('Issue/Index/selectDropdown');?>",{pid:pid},function(data){
                                            $('#issue_second').html('');
                                            $.each(data,function(index,element){

                                                        $('#issue_second').append('<option value="'+element.id+'">'+element.title+'</option>')
                                                    }
                                            )
                                        },'json');
                                    });
                                    $('#issue_top').change();
                                })

                            </script>
                            <div class="col-sm-5">
                                <select id="issue_second" name="issue_id" class="form-control">
                                    <?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><option value="<?php echo ($top["id"]); ?>">
                                            <?php echo ($top["title"]); ?>
                                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="url" class="col-sm-2 control-label"><?php echo L('_URL_');?></label>

                            <div class="col-sm-10">

                                <input id="url" name="url" type="text" class="form-control" value="http://" placeholder="<?php echo L('_HOLDER_URL_');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label"><?php echo L('_INTRO_');?></label>

                            <div class="col-sm-10">



                                <?php $config="toolbars:[['source','|','bold','italic','underline','fontsize','forecolor','justifyleft','fontfamily','|','map','emotion','insertimage','insertcode']]"; ?>
                                <?php echo W('Common/Ueditor/editor',array('myeditor','content',$post['content'],'378px','250px',$config,'',array('zIndex'=>1040)));?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary " href="<?php echo U('Issue/Index/doPost');?>"><?php echo L('_SUBMIT_');?></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /.modal -->
    
        <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
        <script>
            $(function () {
                $('#top_nav >li >a ').mouseenter(function () {
                    $('.children_nav').hide();
                    $('#children_' + $(this).attr('data')).show();
                });
                $('.open-popup-link').magnificPopup({
                    type: 'inline',
                    midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                    closeOnBgClick:false
                });

                $('.open-popup-ajax').magnificPopup({
                    type: 'iframe',
                    midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                    closeOnBgClick:false

                });




                bind_support();
            })
        </script>

        <script type="text/javascript">
            var SUPPORT_URL="<?php echo addons_url('Support://Support/doSupport');?>";
            //上传图片
            /* 初始化上传插件 */
            $("#upload_picture_cover").uploadify({
                "height"          : 30,
                "swf"             : "/Public/static/uploadify/uploadify.swf",
                "fileObjName"     : "download",
                "buttonText"      : "<?php echo L('_UPLOAD_COVER_');?>",
                "buttonClass":"uploadcover",
                "uploader"        : "<?php echo U('Core/File/uploadPicture',array('session_id'=>session_id()));?>",
                "width"           : 250,
                'removeTimeout'	  : 1,
                'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                "onUploadSuccess" : uploadPicturecover,
                'overrideEvents':['onUploadProgress','onUploadComplete','onUploadStart','onSelect'],
                'onFallback' : function() {
                    alert("<?php echo L('_FLASH_NOT_DETECTED_');?>");
                }, 'onUploadProgress': function (file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
                    $("#cover_id_cover").parent().find('.upload-img-box').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');
                },'onUploadComplete' : function(file) {
                    //alert('The file ' + file.name + ' finished processing.');
                },'onUploadStart' : function(file) {
                    //alert('Starting to upload ' + file.name);
                },'onQueueComplete' : function(queueData) {
                    // alert(queueData.uploadsSuccessful + ' files were successfully uploaded.');
                }
            });
            function uploadPicturecover(file, data){
                var data = $.parseJSON(data);
                var src = '';
                if(data.status){
                    $("#cover_id_cover").val(data.id);
                    src = data.url ||  data.path
                    $('.upload-img-box').html(
                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                    );
                } else {
                    toast.error("<?php echo L('_ERROR_FAIL_UPLOAD_COVER_');?>","<?php echo L('_PROMPT_');?>");
                }
            }
        </script><?php endif; ?>


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
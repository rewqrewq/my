<?php if (!defined('THINK_PATH')) exit(); if($top_hide == false): ?><div id="weibo_<?php echo ($weibo["id"]); ?>" <?php if($can_hide): ?>class="row top_can_hide"<?php else: ?>class="row"<?php endif; ?> <?php if($top_hide): ?>style="display:none"<?php endif; ?>>
    <div class="col-xs-12">
        <div class="col-xs-12 weibo_content" style="padding: 0;position:relative;">
            <div class="weibo_icon">
                <?php if(check_auth('Weibo/Index/setTop')): if(($weibo["is_top"]) == "0"): ?><li data-weibo-id="<?php echo ($weibo["id"]); ?>" title="<?php echo L('_SET_TOP_');?>" data-role="weibo_set_top">
                            <i class="icon icon-arrow-up"></i>
                        </li>
                        <?php else: ?>
                        <li data-weibo-id="<?php echo ($weibo["id"]); ?>" title="<?php echo L('_CANCEL_TOP_');?>" data-role="weibo_set_top">
                            <i class="icon icon-arrow-down"></i>
                        </li><?php endif; endif; ?>
                <?php if($weibo['can_delete']): ?><li data-weibo-id="<?php echo ($weibo["id"]); ?>" title="<?php echo L('_DELETE_');?>" data-role="del_weibo">
                        <i class="icon icon-trash"></i>
                    </li><?php endif; ?>
                <?php if($can_hide): ?><li data-weibo-id="<?php echo ($weibo["id"]); ?>" title="<?php echo L('_HIDE_TOP_');?>" data-role="hide_top_weibo">
                        <i class="icon icon-eye-close"></i>
                    </li><?php endif; ?>
            </div>
            <div class="" style="padding: 10px 10px 5px 10px">
                <div class="col-xs-2 text-center" style="position: relative;padding: 0px">
                    <a class="s_avatar" href="<?php echo ($weibo["user"]["space_url"]); ?>" ucard="<?php echo ($weibo["user"]["uid"]); ?>">
                        <img src="<?php echo ($weibo["user"]["avatar64"]); ?>" class="avatar-img" style="width: 64px;"/>
                    </a>
                </div>
                <div class="col-xs-10" style="padding: 5px">
                    <?php if(($weibo["is_top"]) == "1"): ?><div class="ribbion-green"></div><?php endif; ?>
                    <p>
                        <?php if(modC('SHOW_TITLE',1)): ?><small class="font_grey">【<?php echo ($weibo["user"]["title"]); ?>】</small><?php endif; ?>
                        <a ucard="<?php echo ($weibo["user"]["uid"]); ?>" href="<?php echo ($weibo["user"]["space_url"]); ?>" class="user_name">
                            <?php echo ($weibo["user"]["nickname"]); ?>
                        </a>
                        <?php echo W('Common/UserRank/render',array($weibo['uid']));?>

                    </p>
                    <div class="weibo_content_p ">
                        <?php echo ($weibo["fetchContent"]); ?>
                    <span class="text-muted">
                        <a href="<?php echo U('Weibo/Index/weiboDetail',array('id'=>$weibo['id']));?>"><?php echo (friendlydate($weibo["create_time"])); ?></a>

                        &nbsp;&nbsp;<span ><?php echo L('_FROM_');?> <?php if($weibo['from'] == ''): echo L('_PC_');?> <?php else: ?><strong><?php echo ($weibo["from"]); ?></strong><?php endif; ?></span>
                       &nbsp;&nbsp; <?php echo hook('report',array('type'=>$MODULE_ALIAS.'/'.$MODULE_ALIAS,'url'=>"Weibo/Index/weiboDetail?id=$weibo[id]",'data'=>array('weibo-id'=>$weibo['id'])));?>
                        &nbsp;&nbsp; <?php echo hook('giveReward',array('type'=>$MODULE_ALIAS.'/'.$MODULE_ALIAS,'url'=>"Weibo/Index/weiboDetail?id=$weibo[id]",'data'=>array('user-id'=>$weibo['user']['uid'])));?>
                        </span>  </div>

                </div>
            </div>
            <div class="col-xs-12 weibo_content_bottom">
                <div class="col-xs-12" style="padding: 0;text-align: center" data-weibo-id="<?php echo ($weibo["id"]); ?>">
                    <?php $weiboCommentTotalCount = $weibo['comment_count']; ?>
                    <div class="col-xs-4"style="padding: 0px"><?php echo Hook('support',array('table'=>'weibo','row'=>$weibo['id'],'app'=>'Weibo','uid'=>$weibo['uid'],'jump'=>'weibo/index/weibodetail'));?></div>

<?php $sourceId =$weibo['data']['sourceId']?$weibo['data']['sourceId']:$weibo['id']; ?>
<a title="<?php echo L('_REPOST_');?>"  data-role="send_repost"  href="<?php echo U('Weibo/Index/sendrepost',array('sourceId'=>$sourceId,'weiboId'=>$weibo['id']));?>"><?php echo L('_REPOST_');?> <?php echo ($weibo["repost_count"]); ?></a>


<div class=" col-xs-4" style="padding: 0px"><span class="cpointer" data-role="weibo_comment_btn"  data-weibo-id="<?php echo ($weibo["id"]); ?>">
    <?php echo L('_COMMENT_');?> <?php echo ($weiboCommentTotalCount); ?>
</span>
</div>
                </div>
            </div>
        </div>
        <div class="row weibo-comment-list"   <?php if(modC('SHOW_COMMENT',1)): ?>style="display: block;" <?php else: ?> style="display: none;"<?php endif; ?> data-weibo-id="<?php echo ($weibo["id"]); ?>">
            <?php if(modC('SHOW_COMMENT',1)): ?><div class="col-xs-12">
                <div class="light-jumbotron weibo-comment-block" style="padding: 1em 2em;">
                    <div class="weibo-comment-container">
                        <?php echo W('Weibo/Comment/someComment',array('weibo_id'=>$weibo['id']));?>
                    </div>
                </div>
            </div><?php endif; ?>

        </div>
    </div>
</div><?php endif; ?>
<script>
  // alert($('.weibo-comment-container').text());
</script>
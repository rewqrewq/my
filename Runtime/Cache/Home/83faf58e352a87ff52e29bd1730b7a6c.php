<?php if (!defined('THINK_PATH')) exit();?><div class="block-bar">
    <div class="container">
        <div class="block-body row">
            <div class="col-xs-12 col-lg-6">
                <div class="common-block">
                    <h2>
                       <i class="icon-group app-icon "></i> <?php echo modC('USER_SHOW_TITLE1',L('_ACTIVE_MEMBER_'),'People');?>
                    </h2>
                                            <div class="user-name">
                                                <a ucard="<?php echo ($v["uid"]); ?>"><?php echo ($v["user"]["nickname"]); ?></a>
                                            </div>

                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>


                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="common-block">
                    <div>
                                            </div>
                                            <div class="user-name">
                                                <a href="<?php echo ($v["user"]["space_url"]); ?>" ucard="<?php echo ($v["uid"]); ?>"><?php echo ($v["user"]["nickname"]); ?></a>
                                            </div>

                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(function () {
        ucard();
    })
</script>
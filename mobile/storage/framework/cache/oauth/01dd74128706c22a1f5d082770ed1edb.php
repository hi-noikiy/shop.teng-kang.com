<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_title; ?></title>
<?php echo global_assets('css', 'console', 1);?>
<script type="text/javascript">var ROOT_URL = '/mobile/';</script>
<?php echo global_assets('js', 'console', 1);?>
</head>

<body class="iframe_body">

<div class="warpper">
    <div class="title"><a href="<?php echo url('index');?>" class="s-back">返回</a> 手机-<?php echo $ur_here; ?></div>
    <div class="content">
    	<div class="explanation" id="explanation">
          <div class="ex_tit">
          	<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
          </div>
          <ul>
          	  <li>请填写在第三方申请的有效的APP_ID， APP_KEY 等配置信息。</li>
          	  <li>"*"为必填项。</li>
              <?php if($info['type'] == 'wechat') { ?>
                <li>微信登录，申请地址在 <a href="https://open.weixin.qq.com" target="_blank">微信开放平台</a>，通过认证后需要绑定微信公众号，点击进入<a href="https://mp.weixin.qq.com" target="_blank">微信公众平台</a></li>
              <?php } ?>
          </ul>
      </div>
    	<div class="flexilist">
    		<div class="main-info">
          <div class="plugin_item mr0 mb8" style="clear:both">
              <div class="plugin_icon <?php echo $info['type']; ?>-bgcolor" >
                  <img src="<?php echo elixir('img/oauth/sns_'.$info['type'].'.png');?>" alt="">
              </div>
              <div class="plugin_content"><h3 class="title"><?php echo $info['name']; ?></h3><p class="desc">版本:<?php echo $info['version']; ?></p></div>
          </div>
          <form action="<?php echo url('edit');?>" method="post" class="form-horizontal" role="form">
            <div class="switch_info">
              <?php $n=1; if(is_array($info['config'])) foreach($info['config'] as $key => $vo) { ?>
              <div class="item">
                <?php if($vo['type'] == 'text') { ?>
                <div class="label-t"><?php echo $vo['label']; ?>：</div>
                <div class="label_value">
                  <input name="cfg_value[]" type="text" maxlength="50" class="text" value="<?php echo $vo['value']; ?>" />   *
                  <input name="cfg_name[]" type="hidden" value="<?php echo $vo['name']; ?>" />
                  <input name="cfg_type[]" type="hidden" value="<?php echo $vo['type']; ?>" />
                  <input name="cfg_label[]" type="hidden" value="<?php echo $vo['label']; ?>" />
                </div>
                <?php } ?>
              </div>
              <?php $n++;}unset($n); ?>
              <div class="item">
                  <div class="label-t">排序：</div>
                  <div class="label_value">
                      <input type="text" name='sort' value='<?php echo $info['sort']; ?>' class="text" autocomplete="off" />
                  </div>
              </div>
              <div class="item">
                  <div class="label-t">是否显示：</div>
                  <div class="label_value">
                      <div class="checkbox_items">
                          <div class="checkbox_item">
                              <input type="radio" name="status" class="ui-radio event_zhuangtai" id="status_0" value="1" <?php if($info['status'] == 1) { ?>checked<?php } ?>>
                              <label for="status_0" class="ui-radio-label <?php if($info['status']==1) { ?>active<?php } ?>">显示</label>
                          </div>
                          <div class="checkbox_item">
                              <input type="radio" name="status" class="ui-radio event_zhuangtai" id="status_1" value="0" <?php if($info['status'] == 0) { ?>checked<?php } ?>>
                              <label for="status_1" class="ui-radio-label <?php if($info['status'] == 0) { ?>active<?php } ?>">关闭</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="item">
                <div class="label-t">申请地址：</div>
                <div class="label_value"><?php echo $info['website']; ?> <a href="<?php echo $info['website']; ?>" class="btn button" target="_blank">立即申请</a></div>
              </div>
              <div class="item">
                <div class="label-t">&nbsp;</div>
                <div class="label_value info_btn">
                    <input type="hidden"  name="type" value="<?php echo $info['type']; ?>" />
                    <input type="submit" value="编辑" class="button" />
                    <input type="reset" value="重置" class="button button_reset" />
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
</div>
<script>
    //验证表单
    $('input[type="submit"]').click(function(){
        var cfg_value = $('input[name="cfg_value[]"]').val();
        if(!cfg_value){
            layer.msg('配置信息不能为空', {icon: 2});
            return false;
        }
    });


	$("#explanationZoom").on("click",function(){
		var explanation = $(this).parents(".explanation");
		var width = $(".content").width();
		if($(this).hasClass("shopUp")){
			$(this).removeClass("shopUp");
			$(this).attr("title","收起提示");
			explanation.find(".ex_tit").css("margin-bottom",10);
			explanation.animate({
				width:width-0
			},300,function(){
				$(".explanation").find("ul").show();
			});
		}else{
			$(this).addClass("shopUp");
			$(this).attr("title","提示相关设置操作时应注意的要点");
			explanation.find(".ex_tit").css("margin-bottom",0);
			explanation.animate({
				width:"115"
			},300);
			explanation.find("ul").hide();
		}
	});
</script>
</body>
</html>
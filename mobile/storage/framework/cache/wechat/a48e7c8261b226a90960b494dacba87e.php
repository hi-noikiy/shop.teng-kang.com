<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $lang['cp_home']; ?></title>
<?php echo global_assets('css', 'wechat');?>
<script type="text/javascript">var ROOT_URL = '/mobile/';</script>
<?php echo global_assets('js', 'wechat');?>

</head>
<body>

<style>
#footer {position: static;bottom:0px;}
</style>
<div class="wrapper">
	<div class="title"><?php echo $lang['wechat_menu']; ?> - 功能扩展</div>
    <div class="content_tips">
    	<div class="explanation" id="explanation">
        	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
            	<li>功能扩展里的功能，安装配置好之后，可复制相对应的关键词，加入到微信自定义菜单中配合使用。 </li>
                <li>例如，精品 对应的关键词是 best（也可以使用相应的扩展词），在自定义菜单中添加一个菜单，菜单类型选择 关键词click。</li>
            </ul>
        </div>
		<div class="flexilist">
			<div class="common-content">
				<ul class="items-box seller-extend">
                    <?php $n=1;if(is_array($modules)) foreach($modules as $val) { ?>
                    <li class="item_wrap">
                        <div class="plugin_item">
                            <div class="plugin_icon">
                                <i class="icon iconfont icon-<?php echo $val['command']; ?> bg-<?php echo $val['command']; ?>"></i>
                            </div>
                            <div class="plugin_status">
                                <span class="status_txt">
                                   <div class="list-div">
                                        <div class="handle">
                                            <div class="tDiv">
                                                <?php if(isset($val['enable']) && !empty($val['enable'])) { ?>
							                    <a href="<?php echo url('edit', array('ks'=>$val['command'], 'handler'=>'edit'));?>" class="btn_edit"><i class="fa fa-edit"></i>编辑</a>
							                    <a href="javascript:if(confirm('确认卸载吗？')){window.location.href='<?php echo url('uninstall', array('ks'=>$val['command']));?>'};" class="btn_trash"><i class="fa fa-trash-o"></i>卸载</a>
							                    <?php } else { ?>
							                    <a href="<?php echo url('edit', array('ks'=>$val['command']));?>" class="btn_inst"><i class="sc_icon sc_icon_inst"></i>安装</a>
							                    <?php } ?>
							                    <?php if($val['enable'] == 1 && $val['config']['haslist'] == 1) { ?><a href="<?php echo url('winner_list', array('ks'=>$val['command']));?>" class="btn_see"><i class="sc_icon sc_icon_see"></i>查看记录</a><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="plugin_content"><h3 class="title"><?php echo $val['name']; ?></h3><p class="desc"><?php echo $val['command']; ?></p></div>
                        </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                </ul>
			</div>
		</div>
    </div>
</div>
<!-- 版权 -->
<div id="footer">
    <p><?php echo $lang['copyright']; ?></p>
</div>

<script type="text/javascript">
$(function(){
	// 操作提示
	$("#explanationZoom").on("click",function(){
		var explanation = $(this).parents(".explanation");
		var width = $(".content_tips").width();
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
				width:"118"
			},300);
			explanation.find("ul").hide();
		}
	});


	//弹出框
	$(".fancybox").fancybox({
		width		: '60%',
		height		: '60%',
		closeBtn	: true,
		title       : ''
	});

	// 删除
    $(".delete").click(function(){
        var url = $(this).attr("data-href");
        //询问框
        layer.confirm('您确定要删除此条记录吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            window.location.href = url;
        });
    });


});

// 修改分页数量
function changePageSize(e){
    var keynum = window.event ? e.keyCode : e.which;
    if (keynum == 13)
    {
        var page_num = $("#pageSize").val();
        $.post("<?php echo url('index');?>", {page_num:page_num}, function(data){
            if(data.status > 0){
                window.location.reload();
            }
        }, 'json');
        return false;
    }
}
</script>
</body>
</html>
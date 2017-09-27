<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ECTouch Message</title>
<?php echo global_assets('css', 'wechat');?>
<script type="text/javascript">var ROOT_URL = '/mobile/';</script>
<?php echo global_assets('js', 'wechat');?>
</head>
<body>
<script type="text/javascript">
layer.msg('<?php echo ($data['message']); ?>', {icon: <?php echo ($data['type']); ?>, offset: '150px', time: 1000, title: '提示'});
(function(){
	var time = 1;
	var href = '<?php echo ($data['url']); ?>';
	var interval = setInterval(function(){
		--time;
		if(time <= 0) {
			window.location.href = href;
			clearInterval(interval);
		};
	}, 1000);
})();
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>可视化装修</title>
    <link rel=stylesheet href="//at.alicdn.com/t/font_u366719ytlat6gvi.css" media="screen" title="no title">
    <link rel=stylesheet href="//at.alicdn.com/t/font_lkv63qpdlo8khuxr.css" media="screen" title="no title">
    <link href="/mobile/public/css/backend.css?v=<?=time()?>" rel="stylesheet">
    <script>
        window.ROOT_URL = '/mobile/';
        window.PC_URL = '/';
        window.shopInfo = <?php echo $shopInfo; ?>;
    </script>
</head>
<body>
<div id="app"></div>
<script type="text/javascript" src="/mobile/public/js/manifest.js?v=<?=time()?>"></script>
<script type="text/javascript" src="/mobile/public/js/vendor.js?v=<?=time()?>"></script>
<script type="text/javascript" src="/mobile/public/js/backend.js?v=<?=time()?>"></script>
<script>
    // 去除火狐默认事件
    document.body.ondrop = function (event) {
        event.preventDefault();
        event.stopPropagation();
    }
</script>
</body>
</html>
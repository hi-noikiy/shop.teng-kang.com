<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title><?php echo $this->_var['lang']['online_service']; ?></title>
</head>
<body>

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js,transport_jquery.js,cart_common.js,cart_quick_links.js')); ?>
<!--[if lt IE 9]>
<script src="https://g.alicdn.com/aliww/ww/json/json.js" charset="utf-8"></script>
<![endif]-->

<script src="https://g.alicdn.com/aliww/??h5.openim.sdk/1.0.6/scripts/wsdk.js,h5.openim.kit/0.3.3/scripts/kit.js" charset="utf-8"></script>

<script type="text/javascript">
    var step=0
    var timer=0;
    function flash_title()
    {
        step++
        if (step==3) {step=1}
        if (step==1) {document.title='<?php echo $this->_var['lang']['message_see']; ?>'}
        if (step==2) {document.title='<?php echo $this->_var['lang']['message_not']; ?>'}
        timer= setTimeout("flash_title()",500);
    }
    window.onload = function(){
            WKIT.init({
            container: document.getElementById('J_demo'),
            width: 700,
            height: 500,
            uid: '<?php echo $this->_var['user_id']; ?>',
            appkey: '<?php echo $this->_var['kf_appkey']; ?>',
            credential: '<?php echo $this->_var['user_id']; ?>',
            touid: '<?php echo $this->_var['kf_touid']; ?>',
                customData: {
                    item: {
                        id: '<?php echo $this->_var['goods_id']; ?>'
                    }
                },
            sendMsgToCustomService: true,
            logo: '<?php echo $this->_var['kf_logo']; ?>',//客服小头像
            toAvatar: '<?php echo $this->_var['kf_logo']; ?>',//客服大头像
            avatar: '<?php echo $this->_var['user_logo']; ?>',
            pluginUrl: '<?php echo $this->_var['IM_menu']; ?>',
            welcomeMsg: '<?php echo $this->_var['kf_welcomeMsg']; ?>',
            sendBtn: true,
            onMsgReceived:function(){
                flash_title()
            }
        });
        $(document).click(function(){
            $('title').html('<?php echo $this->_var['lang']['online_service']; ?>');
            clearTimeout(timer)
        })
    }
	
	 setTimeout(function(){
		$('.wkit-powered-by a').html(' Powered by <?php echo $this->_var['dwt_shop_name']; ?>').attr({'href':'javascript:;','target':''});
	},200)
</script>
</body>
</html>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="<?php echo $this->_var['action_link']['href']; ?>" class="s-back"><?php echo $this->_var['lang']['back']; ?></a>商家 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
                <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                    <li>标识“<em>*</em>”的选项为必填项，其余为选填项。</li>
                    <li>二级域名需要先解析通过后才能使用。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info">
						<form  action="" method="post"  name="theForm" >
                            <div class="switch_info">
                                <div class="items">
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['is_open']; ?>：</div>
                                        <div class="label_value">
											<div class="checkbox_items">
												<div class="checkbox_item"> 
													<input name="is_enable" type="radio" class="ui-radio" value="0" id="is_enable_0"<?php if ($this->_var['domian']['is_enable'] == 0 || $this->_var['domian']['is_enable'] == ''): ?>checked="checked"<?php endif; ?> />
													<label for="is_enable_0" class="ui-radio-label">否</label>
												</div>
												<div class="checkbox_item"> 
													<input name="is_enable" type="radio" class="ui-radio" value="1" id="is_enable_1" <?php if ($this->_var['domian']['is_enable']): ?>checked="checked"<?php endif; ?> />
													<label for="is_enable_1" class="ui-radio-label">是</label>
												</div>
											</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['site_name']; ?>：</div>
                                        <div class="label_value">
											<input type="text" name="domain_name" id="domain_name" class="text" value="<?php echo $this->_var['domian']['domain_name']; ?>" autocomplete="off" />
											<label class="blue_label">（例如：http://apple.ecmoban.com）</label>
										</div>
                                    </div>
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['valid_time']; ?>：</div>
                                        <div class="label_value">
										  <div class="text_time" id="text_time1">
											  <input type="text" name="validity_time" value="<?php echo $this->_var['domian']['validity_time']; ?>" id="start_time" class="text" readonly />
										  </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="label">&nbsp;</div>
                                        <div class="label_value info_btn">
											<input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button"  name="sub"/>
											<input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
<script language="JavaScript">
<!--

//日期选择插件调用start sunle
var opts1 = {
	'targetId':'start_time',//时间写入对象的id
	'triggerId':['start_time'],//触发事件的对象id
	'alignId':'text_time1',//日历对齐对象
	'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
	'min':'<?php echo $this->_var['snatch']['start_time']; ?>' //最小时间
}

xvDate(opts1);
xvDate(opts2);
//日期选择插件调用end sunle
//-->

</script>	
</body>
</html>

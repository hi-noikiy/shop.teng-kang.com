<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="topic.php?act=list" class="s-back"><?php echo $this->_var['lang']['back']; ?></a>促销 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
            <div class="explanation" id="explanation"> 
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
					<li>标识“<em>*</em>”的选项为必填项，其余为选填项。</li>
                    <li>添加专题信息：通用信息、专题商品、专题介绍、高级选项等。</li>
                    <li>点击确定即可创建一个专题页面。</li>
                    <li>在列表页点击查看即可看到前台展示的专题页面。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info mian-info-two">
						<form action="topic.php" method="post" name="theForm" enctype="multipart/form-data" id="topic_form">
							<div class="step" ectype="filter">
                            <div class="switch_info">
                                <div class="items">
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['topic_title']; ?>：</div>
                                        <div class="label_value">
                                        	<input type="text" name="topic_name" id="snatch_name" class="text" value="<?php echo $this->_var['topic']['title']; ?>" autocomplete="off" />
                                            <div class="form_prompt"></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['cycle']; ?>：</div>
                                        <div class="label_value">
                                            <div class="text_time" id="text_start_time" >
                                                <input type="text" class="text mr0" name="start_time" id="start_time" value="<?php echo $this->_var['topic']['start_time']; ?>" autocomplete="off" />
                                            </div>
                                            <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                                            <div class="text_time" id="text_end_time" >
                                                <input type="text" class="text" name="end_time" id="end_time" value="<?php echo $this->_var['topic']['end_time']; ?>" autocomplete="off" />
											</div>
										</div>
									</div>
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['lable_topic_keywords']; ?>：</div>
                                        <div class="label_value">
                                        	<textarea name="keywords" id="keywords" cols="40" rows="3" class="textarea"><?php echo $this->_var['topic']['keywords']; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['lable_topic_description']; ?>：</div>
                                        <div class="label_value">
                                        	<textarea name="description" id="description" cols="40" rows="5" class="textarea"><?php echo $this->_var['topic']['description']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if ($this->_var['act'] == 'update' && $this->_var['topic']['user_id'] != 0): ?>
                                <div class="item">
                                    <div class="label"><?php echo $this->_var['lang']['adopt_status']; ?>：</div>
                                    <div class="label_value">
                                        <div class="checkbox_items">
                                            <div class="checkbox_item"> 
                                                <input name="review_status" type="radio" class="ui-radio" value="1" id="review_status_1" <?php if ($this->_var['topic']['review_status'] == 1): ?>checked="checked"<?php endif; ?> onclick="get_review_status(this.value)" />
                                                <label for="review_status_1" class="ui-radio-label"><?php echo $this->_var['lang']['not_audited']; ?></label>
                                            </div>
                                            <div class="checkbox_item"> 
                                                <input name="review_status" type="radio" class="ui-radio" value="2" id="review_status_2" <?php if ($this->_var['topic']['review_status'] == 2): ?>checked="checked"<?php endif; ?> onclick="get_review_status(this.value)" />
                                                <label for="review_status_2" class="ui-radio-label"><?php echo $this->_var['lang']['audited_not_adopt']; ?></label>
                                            </div>
                                            <div class="checkbox_item"> 
                                                <input name="review_status" type="radio" class="ui-radio" value="3" id="review_status_3" <?php if ($this->_var['topic']['review_status'] == 3): ?>checked="checked"<?php endif; ?> onclick="get_review_status(this.value)" />
                                                <label for="review_status_3" class="ui-radio-label"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>			
                                <div class="item <?php if ($this->_var['topic']['review_status'] != 2): ?>hide<?php endif; ?>" id="review_content">
                                    <div class="label"><?php echo $this->_var['lang']['adopt_reply']; ?>：</div>
                                    <div class="value">
                                        <textarea name="review_content" class="textarea h100"><?php echo $this->_var['topic']['review_content']; ?></textarea>
                                    </div>
                                </div>
                                <?php endif; ?>
                            
                            </div>
                            
                            <div class="info_btn info_btn_bf100 button-info-item0" id="info_btn_bf100">
                            	<div class="label">&nbsp;</div>
                            	<div class="value font0">
									<input  name="topic_data" type="hidden" id="topic_data" value='' />
									<input  name="act" type="hidden" id="act" value='<?php echo $this->_var['act']; ?>' />
									<input  name="topic_id" type="hidden" id="topic_id" value='<?php echo $this->_var['topic']['topic_id']; ?>' />
									<input type="submit" name="Submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button mr10"/>
									<input type="reset" name="Reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset"/>
                                </div>
                            </div>
                        </form>
						</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <style type="text/css">
		.button-info-item0,.button-info-item3{text-align:left;}
    	.button-info-item0 .label,.button-info-item3 .label{width:30%; padding-right:9px;}
    </style>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<?php echo $this->smarty_insert_scripts(array('files'=>'spectrum-master/spectrum.js')); ?>
    
	<script type="text/javascript">
        var myTopic = Object();
        //表单验证
        $(function(){
            $("#submitBtn").click(function(){
                if($("#topic_form").valid()){
                    $("#topic_form").submit();
                }
            });
        
            $('#topic_form').validate({
                errorPlacement: function(error, element){
                    var error_div = element.parent('div.label_value').children('div.form_prompt');
                    error_div.append(error);
                },
                rules : {
                    topic_name : {
                    	required : true
                    }
                },
                messages : {
                    topic_name : {
                    	required : '<i class="icon icon-exclamation-sign"></i>'+topic_name_empty
                    }
                }
            });
        });
		
		//时间选择
		var opts1 = {
			'targetId':'start_time',//时间写入对象的id
			'triggerId':['start_time'],//触发事件的对象id
			'alignId':'text_start_time',//日历对齐对象
			'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
			'min':'' //最小时间
		},opts2 = {
			'targetId':'end_time',
			'triggerId':['end_time'],
			'alignId':'text_end_time',
			'format':'-',
			'min':''
		}
		xvDate(opts1);
		xvDate(opts2);
		
		function get_review_status(val){
			if(val == 2){
				$("#review_content").show();
			}else{
				$("#review_content").hide();
			}
		}
    </script>
</body>
</html>

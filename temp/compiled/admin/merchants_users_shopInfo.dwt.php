<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="<?php echo $this->_var['action_link']['href']; ?>" class="s-back"><?php echo $this->_var['lang']['back']; ?></a>店铺 - <?php echo $this->_var['lang']['02_merchants_users_list']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>标识“<em>*</em>”的选项为必填项，其余为选填项。</li>
                    <li>请先选择商城已注册会员进行添加店铺操作。</li>
                    <li>请根据提示信息准确无误填写店铺信息。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
				<form method="post" enctype="multipart/form-data" action="merchants_users_list.php" name="theForm" id="merchants_users_list_form">
                	<div class="mian-info">
                    	<div class="switch_info business_info">
							<?php if ($this->_var['user_id'] == 0): ?>
                        	<div class="step">
                            	<div class="tit"><h4><?php echo $this->_var['lang']['user_select_please']; ?></h4></div>
                               	<div class="items">
                                	<div class="item">
                                    	<div class="label"><em class="require-field">*</em><?php echo $this->_var['lang']['steps_user_name']; ?></div>
                                        <div class="value nt_value">
                                        	<div class="selection_select">
                                                <div class="selection">
                                                    <input type="text" name="user_name" id="user_name" class="text w140 valid" autocomplete="off" value="" readonly>
                                                    <input type="hidden" name="user_id" id="user_id" value="">
                                                </div>
                                                <div class="select-container" style="display:none;">
                                                    <div class="select-top2">
                                                        <div class="s_search"><input name="userName" id="userName" type="text" class="s_text" placeholder="<?php echo $this->_var['lang']['search_key']; ?>"><a href="javascript:void(0);" onclick="get_search_user()" class="btn-mini"><i class="icon icon-search"></i></a></div>
                                                    </div>
                                                    <div class="select-list2" id="user_list">
                                                        <ul >
														<?php $_from = $this->_var['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
                                                            <li data-name="<?php echo $this->_var['user']['user_name']; ?>" data-id="<?php echo $this->_var['user']['user_id']; ?>"><?php echo $this->_var['user']['user_name']; ?></li>
														<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form_prompt"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php endif; ?>
							<?php $_from = $this->_var['shopInfo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shopInfo');if (count($_from)):
    foreach ($_from AS $this->_var['shopInfo']):
?>
								<?php $_from = $this->_var['shopInfo']['steps_title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['title']):
?>  
									<?php if ($this->_var['title']['steps_style'] == 0): ?>
										<?php echo $this->fetch('merchants_steps_basicType.dwt'); ?>
									<?php elseif ($this->_var['title']['steps_style'] == 1): ?>
										<?php echo $this->fetch('merchants_steps_shopType.dwt'); ?>
									<?php elseif ($this->_var['title']['steps_style'] == 2): ?>
										<?php echo $this->fetch('merchants_steps_cateType.dwt'); ?>
									<?php elseif ($this->_var['title']['steps_style'] == 3 && $this->_var['title']['fields_titles'] != '$lang.search_wap_brand'): ?>
										<?php echo $this->fetch('merchants_steps_brankType.dwt'); ?> 
									<?php elseif ($this->_var['title']['steps_style'] == 4): ?>
										<?php echo $this->fetch('merchants_steps_shopInfo.dwt'); ?>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							<div class="step">
								<div class="tit"><h4><?php echo $this->_var['lang']['admin_operation']; ?></h4></div>
								<div class="items items_w60">
									<?php if ($this->_var['user_id'] > 0): ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['user_sub_status']; ?>：</div>
										<div class="value red"><?php if ($this->_var['merchants']['steps_audit'] == 1): ?><?php echo $this->_var['lang']['already_sub']; ?><?php else: ?><?php echo $this->_var['lang']['not_sub']; ?><?php endif; ?></div>
									</div>
									<?php endif; ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['setup_audit']; ?>：</div>
										<div class="value">
                                        	<div class="checkbox_items">
                                                <?php if ($this->_var['user_id'] > 0): ?>
                                                <div class="checkbox_item">
                                                    <input name="review_goods" type="radio" value="0" class="ui-radio" id="review_no" <?php if ($this->_var['merchants']['review_goods'] == 0): ?>checked="checked"<?php endif; ?> />
                                                    <label for="review_no" class="ui-radio-label"><?php echo $this->_var['lang']['no']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input name="review_goods" type="radio" value="1" class="ui-radio" id="review_yes" <?php if ($this->_var['merchants']['review_goods'] == 1): ?>checked="checked"<?php endif; ?> />
                                                    <label for="review_yes" class="ui-radio-label"><?php echo $this->_var['lang']['yes']; ?></label>
                                                </div>
                                                <?php else: ?>
                                                <div class="checkbox_item">
                                                    <input name="review_goods" type="radio" value="0" class="ui-radio" id="review_no" />
                                                    <label for="review_no" class="ui-radio-label"><?php echo $this->_var['lang']['no']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input name="review_goods" type="radio" value="1" class="ui-radio" id="review_yes" checked="checked" />
                                                    <label for="review_yes" class="ui-radio-label"><?php echo $this->_var['lang']['yes']; ?></label>
                                                </div>
                                                <?php endif; ?>
                                            </div>
										</div>
									</div>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['is_self_run']; ?>：</div>
										<div class="value">
                                        	<div class="checkbox_items">
                                                <div class="checkbox_item">
                                                    <input name="self_run" type="radio" value="0" class="ui-radio" id="self_run_no"  <?php if (! $this->_var['merchants']['self_run']): ?>checked="checked"<?php endif; ?> />
                                                    <label for="self_run_no" class="ui-radio-label"><?php echo $this->_var['lang']['no']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input name="self_run" type="radio" value="1" class="ui-radio" id="self_run_yes" <?php if ($this->_var['merchants']['self_run']): ?>checked="checked"<?php endif; ?>/>
                                                    <label for="self_run_yes" class="ui-radio-label"><?php echo $this->_var['lang']['yes']; ?></label>
                                                </div>
                                            </div>
										</div>
									</div>
									
									<div class="item">
										<div class="label">暂时关闭店铺：</div>
										<div class="value">
                                        	<div class="checkbox_items">
                                                <div class="checkbox_item">
                                                    <input name="shop_close" type="radio" value="1" class="ui-radio" id="shop_close_no"  <?php if ($this->_var['status'] == 1): ?>checked="checked"<?php endif; ?> />
                                                    <label for="shop_close_no" class="ui-radio-label"><?php echo $this->_var['lang']['no']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input name="shop_close" type="radio" value="0" class="ui-radio" id="shop_close_yes" <?php if ($this->_var['status'] == 0): ?>checked="checked"<?php endif; ?>/>
                                                    <label for="shop_close_yes" class="ui-radio-label"><?php echo $this->_var['lang']['yes']; ?></label>
                                                </div>
                                            </div>
										</div>
									</div>
									
									<?php if ($this->_var['seller_shopinfo']['shopname_audit'] == 0): ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['audit_shop']; ?>：</div>
										<div class="value">
                                        	<div class="checkbox_items">
                                                <div class="checkbox_item">
                                                    <input type="radio" name="shopname_audit" value="0" id="shopname_audit_0" class="ui-radio" <?php if ($this->_var['shop_info']['shopname_audit'] == 0): ?>checked="checked"<?php endif; ?> />
                                                    <label for="shopname_audit_0" class="ui-radio-label"><?php echo $this->_var['lang']['not_audited']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="shopname_audit" value="1" id="shopname_audit_1" class="ui-radio" <?php if ($this->_var['shop_info']['check_sellername'] == 1): ?>checked="checked"<?php endif; ?> />
                                                    <label for="shopname_audit_1" class="ui-radio-label"><?php echo $this->_var['lang']['have_audited']; ?></label>
                                                </div>
                                                <font class="red">（<?php echo $this->_var['lang']['audit_shop_1']; ?>：<?php if ($this->_var['seller_shopinfo']['check_sellername'] == 1): ?><?php echo $this->_var['lang']['audit_shop_2']; ?><?php elseif ($this->_var['seller_shopinfo']['check_sellername'] == 2): ?><?php echo $this->_var['lang']['audit_shop_3']; ?><?php else: ?><?php echo $this->_var['lang']['audit_shop_4']; ?><?php endif; ?>）</font>
                                            </div>
										</div>
									</div>
									<?php else: ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['seller_shop_name_type']; ?>：</div>
										<div class="value red"><?php if ($this->_var['seller_shopinfo']['check_sellername'] == 1): ?><?php echo $this->_var['lang']['audit_shop_2']; ?><?php elseif ($this->_var['seller_shopinfo']['check_sellername'] == 2): ?><?php echo $this->_var['lang']['audit_shop_3']; ?><?php else: ?><?php echo $this->_var['lang']['audit_shop_4']; ?><?php endif; ?>(<?php echo $this->_var['lang']['have_audited']; ?>)</div>
									</div>
									<?php endif; ?>
									<?php if ($this->_var['merchants']['steps_audit'] == 1): ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['seller_updata_apply']; ?>：</div>
										<div class="value">
                                        	<div class="checkbox_items">
                                        	<div class="checkbox_item">
                                                <input type="radio" name="merchants_allow" value="0" id="merchants_allow_0" class="ui-radio" checked="checked" />
                                                <label for="merchants_allow_0" class="ui-radio-label"><?php echo $this->_var['lang']['not_allow']; ?></label>
                                            </div>
                                            <div class="checkbox_item">
                                                <input type="radio" name="merchants_allow" value="1" id="merchants_allow_1" class="ui-radio" />
                                                <label for="merchants_allow_1" class="ui-radio-label"><?php echo $this->_var['lang']['allow']; ?></label>
                                            </div>
                                            </div>
										</div>
									</div>
									<?php endif; ?>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['seller_info_audit']; ?>：</div>
										<div class="value">
                                        	<div class="checkbox_items">
											<?php if ($this->_var['user_id'] > 0): ?>
												<?php if ($this->_var['merchants']['steps_audit'] == 1): ?>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="0" id="merchants_audit_0" class="ui-radio" <?php if ($this->_var['merchants']['merchants_audit'] == 0): ?>checked="checked"<?php endif; ?> onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_0" class="ui-radio-label"><?php echo $this->_var['lang']['not_audited']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="1" id="merchants_audit_1" class="ui-radio" <?php if ($this->_var['merchants']['merchants_audit'] == 1): ?>checked="checked"<?php endif; ?> onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_1" class="ui-radio-label"><?php echo $this->_var['lang']['yes_through']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="2" id="merchants_audit_2" class="ui-radio" <?php if ($this->_var['merchants']['merchants_audit'] == 2): ?>checked="checked"<?php endif; ?> onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_2" class="ui-radio-label"><?php echo $this->_var['lang']['not_through']; ?></label>
                                                </div>
												<?php else: ?>
												<font class="red"><?php echo $this->_var['lang']['not_apply']; ?></font>
												<?php endif; ?>
											 <?php else: ?>
                                             	<div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="0" id="merchants_audit_0" class="ui-radio" onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_0" class="ui-radio-label"><?php echo $this->_var['lang']['not_audited']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="1" id="merchants_audit_1" class="ui-radio" checked="checked" onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_1" class="ui-radio-label"><?php echo $this->_var['lang']['yes_through']; ?></label>
                                                </div>
                                                <div class="checkbox_item">
                                                    <input type="radio" name="merchants_audit" value="2" id="merchants_audit_2" class="ui-radio" onclick="get_merchants_audit(this.value)" />
                                                    <label for="merchants_audit_2" class="ui-radio-label"><?php echo $this->_var['lang']['not_through']; ?></label>
                                                </div>
											 <?php endif; ?>
                                             </div>
										</div>
									</div>	
									
									<div class="item" <?php if ($this->_var['merchants']['merchants_audit'] != 1): ?>style="display:none" <?php endif; ?> id="grade_id">
										<div class="clearfix mb10">
                                            <div class="label">店铺等级：</div>
                                            <div class="value">
                                                <div id="grade_id" class="imitate_select select_w320">
                                                    <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                                    <ul>
                                                    <?php $_from = $this->_var['seller_grade_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade_list');if (count($_from)):
    foreach ($_from AS $this->_var['grade_list']):
?>
                                                        <li><a href='javascript:;' data-value='<?php echo $this->_var['grade_list']['id']; ?>' class='ftx-01'><?php echo $this->_var['grade_list']['grade_name']; ?></a></li>
                                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                    </ul>
                                                    <input name="grade_id" type="hidden" value="<?php echo $this->_var['grade']['grade_id']; ?>" id="grade_id_val">
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="clearfix mb5">
                                            <div class="label">等级年限：</div>
                                            <div class="value">
                                                <input name="year_num" class="text w120" type="text" value="<?php echo empty($this->_var['grade']['year_num']) ? '1' : $this->_var['grade']['year_num']; ?>"/>
                                            </div>
                                        </div>
									</div>	

									<?php if ($this->_var['merchants']['steps_audit'] == 1): ?>									
									<div class="item" style="display:<?php if ($this->_var['merchants']['merchants_audit'] == 2): ?>block<?php else: ?>none<?php endif; ?>" id="tr_merchantsAudit">
										<div class="label"><?php echo $this->_var['lang']['reply_seller']; ?>：</div>
										<div class="value">
											<textarea name="merchants_message" class="textarea h100"><?php echo $this->_var['merchants']['merchants_message']; ?></textarea>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="step">
								<div class="items">
                                    <div class="item">
                                        <div class="label">&nbsp;</div>
                                        <div class="value info_btn">
                                        <input name="numAdd" value="1" id="numAdd" type="hidden" />
                                        <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" id="submitBtn" />
                                        <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset" />
                                        <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
                                        <?php if ($this->_var['user_id'] > 0): ?>
                                        <input type="hidden" name="user_id" value="<?php echo $this->_var['user_id']; ?>" id="user_id" /> 
                                        <?php endif; ?>
                                        </div>
                                    </div>
								</div>
							</div>
							<!--<ul ectype="region" style="display:none;">
							<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['v']):
?>
							<li data-index='<?php echo $this->_var['k']; ?>'><?php echo $this->_var['v']; ?></li>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</ul>-->
                        </div>
                    </div>
				</form>
                </div>
            </div>
        </div>
    </div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <script type="text/javascript" src="js/region.js"></script>
    
	<script type="text/javascript" src="js/jquery.purebox.js"></script>
	<script type="text/javascript">
		if($('.ui-dropdown input').val() == $('ul[ectype=region] li').data('index')){
			
		}
	
		$(function(){
			//点击查看图片
			$('.nyroModal').nyroModal();
			
			//表单验证
			$("#submitBtn").click(function(){
				if($("#merchants_users_list_form").valid()){
					$("#merchants_users_list_form").submit();
				}
			});
		
			$('#merchants_users_list_form').validate({
				errorPlacement:function(error, element){
					var error_div = element.parents('div.nt_value').find('div.form_prompt');
					element.parents('div.nt_value').find(".notic").hide();
					error_div.append(error);
				},
				rules:{
					user_name :{
						required : true
					},
					ec_rz_shopName:{
						required : true
					},
					ec_hopeLoginName:{
						required : true
					}
				},
				messages:{
					user_name:{
						 required : '<i class="icon icon-exclamation-sign"></i>请选择会员'
					},
					ec_rz_shopName:{
						required : '<i class="icon icon-exclamation-sign"></i>请填写期望店铺名称'
					},
					ec_hopeLoginName:{
						required : '<i class="icon icon-exclamation-sign"></i>请填写期望店铺登陆用户名'
					}
				}			
			});
			
			//全选
			$("input[name='all_list']").click(function(){
				if($(this).prop("checked")==true){
					$(this).parents(".category_checkbox_list").find("input[type='checkbox']").prop("checked",true);
				}else{
					$(this).parents(".category_checkbox_list").find("input[type='checkbox']").prop("checked",false);
				}
			});
		});
		
		//地区三级联动
		$.levelLink();
        
		//添加品牌
		function saveBrandQualificationBtn(bid){
			var title = $(bid).attr('data-title');
			var user_id = '<?php echo $this->_var['user_id']; ?>';
			if(bid){
				Ajax.call('merchants_users_list.php?is_ajax=1&act=addBrand&brandView=brandView','user_id='+user_id+'&ec_shop_bid='+bid+'#brandId_edit',addBrandResponse, "GET", "JSON")
			}else{
				Ajax.call('merchants_users_list.php?is_ajax=1&act=addBrand&brandView=brandView#brandId_edit','user_id='+user_id,addBrandResponse, "GET", "JSON")
			}
			
			function addBrandResponse(result){
				pb({
					id:"addBrand_dialog",
					title:title,
					content:result.content,
					ok_title:"确定",
					cl_title:"取消",
					width:1200,
					drag:false,
					onOk:function(){
						addBrand();
					}
				});
			}
		}
		
		//删除二级类目
		function get_deleteBrand(ct_id){
			var filter = new Object;
			filter.ct_id  = ct_id;
			filter.user_id  = '<?php echo $this->_var['user_id']; ?>';
			
			if (confirm('确实删除这条品牌资质信息吗')){
				Ajax.call('merchants_users_list.php?is_ajax=1&act=deleteBrand', filter, responseDeleteBrand, 'GET', 'JSON');
			}
		}
		function responseDeleteBrand(result){
			if(result.error == 0){
				document.getElementById('brandList').innerHTML = result.content;
			}
		}
    
		function addBrand(){
			var ec_bank_name_letter = $("#ec_bank_name_letter").val();
			var ec_brandName=$("#ec_brandName").val();
			var ec_brandFirstChar=$("#ec_brandFirstChar").val();
			var ec_brandLogo =$("#ec_brandLogo").val();
			if(ec_brandLogo.length >0){
					type=ec_brandLogo.match(/^(.*)(\.)(.{1,8})$/)[3];
					type=type.toUpperCase();
					if(type!="JPEG"   &&   type!="PNG"   &&   type!="JPG"   &&   type!="GIF"){
						alert("上传图片类型错误"); 
						return false;
					}
				}
			if(ec_brandName.length == 0){
				alert("品牌中文名称不能为空");
			}else if(ec_bank_name_letter.length == 0){
				alert("品牌英文名称不能为空");
			}else if(ec_brandFirstChar.length == 0){
				alert("品牌首字母不能为空");
			}else{
				var actionUrl = "merchants_users_list.php?is_ajax=1&act=addImg&user_id=<?php echo $this->_var['user_id']; ?>";  
				$("#addBatchImg_from").ajaxSubmit({
					type: "POST",
					dataType: "json",
					url: actionUrl,
					data: {"action": "TemporaryImage"},
					success: function (data) {
						if (data.error == "1") {
						  alert(data.massege);
						} else if (data.error == "2") {
						   $("#brandList").html(data.content);
						}
					},
					async: true  
				});
			}
		}
		
		function addBrandTable(obj)
		{
			var add_num = 3;
			var num = $('#numAdd').val();
			var obj = $(obj);
			var tbl = obj.parents('.zizhi_item');
			if(num < add_num){
				var input = tbl.clone();
				input.find('.up').attr('onclick','removeBrandTable(this)');
				input.find('.up').removeClass().addClass('down');
				tbl.parents('#parentNode_dateTimeDiv').append(input);
				num++;
				$('#numAdd').val(num);
			}else{
				alert('批量添加' + add_num +'次');
			}
			
			for(i=0;i<num;i++){
				var expiredDate = document.getElementsByName("ec_expiredDateInput[]");
				expiredDate[i].id = 'expiredDateInput_' + i;
			}
		}
		function removeBrandTable(obj,b_fid)
		{
			var num = $('#numAdd').val();
			if(b_fid > 0){
			   if (confirm('确定删除这条品牌资质信息吗')){
				   location.href = 'merchants_users_list.php?is_ajax=1&act=brand_edit&ec_shop_bid=<?php echo $this->_var['ec_shop_bid']; ?>&del_bFid=' + b_fid + '&user_id=<?php echo $this->_var['user_id']; ?>&brandView=brandView#brandId_edit';
			   }
			}else{
				var obj = $(obj);
				var tbl = obj.parents('.zizhi_item');
				tbl.remove();
				num--;
				$('#numAdd').val(num);
				for(i=0;i<num;i++){
					var radioCheckbox_val = document.getElementsByName("radioCheckbox_val[]");
					radioCheckbox_val[i].value = i;
				}
			}
		}
	
		function get_merchants_audit(val){
			var audit = document.getElementById('tr_merchantsAudit');
			var grade_id = document.getElementById('grade_id');
			if(val == 2){
				audit.style.display = 'block';
			}else{
				audit.style.display = 'none';
			}
			if(val == 1){
				 grade_id.style.display = 'block';
			}else{
				grade_id.style.display = 'none';
			}
		}
		
		function get_categoryId_permanent(f, permanent_date, dt_id){
			var categoryId = document.getElementById('categoryId_date_' + dt_id);
			if(f.checked){
				categoryId.value = '';
			}else{
				if(permanent_date != ''){
					categoryId.value = permanent_date;
				}
			}
		}
		
		function get_expiredDate_permanent(f, expiredDateInput, b_fid){
			if(b_fid > 0){
				var expiredDate = document.getElementById('expiredDateInput_' + b_fid);
				if(f.checked){
					expiredDate.value = '';
				}else{
					if(expiredDateInput != ''){
						expiredDate.value = expiredDateInput;
					}
				}
			}else{
				
				var DateInput = document.getElementsByName("ec_expiredDateInput[]");
				var permanent = document.getElementsByName("ec_expiredDate_permanent[]");
				for(i=0; i<permanent.length; i++){
					if(permanent[i].checked){
						if(DateInput[i].value != ''){
							DateInput[i].value = '';
						}
					}
				}
			}
		}
		
		function get_brandEndTime_permanent(f, brandEndTime){
			var ec_brandEndTime = document.getElementById('ec_brandEndTime');
			if(f.checked){
				ec_brandEndTime.value = '';
			}else{
				if(brandEndTime != ''){
					ec_brandEndTime.value = brandEndTime;
				}
			}
		}
		
		//查询会员
		function get_search_user(){
			var user_name = $("#userName").val();
			Ajax.call('merchants_users_list.php?is_ajax=1&act=get_user_name', "user_name="+user_name, user_nameResponse, "GET", "JSON");
		}
		
		function user_nameResponse(result)
		{
		  if (result.error == 0)
		  {
			  document.getElementById('user_list').innerHTML = result.content;
			  $(".select-list2").perfectScrollbar("destroy");
			  $(".select-list2").perfectScrollbar();
		  }
		}
	</script>
</body>
</html>

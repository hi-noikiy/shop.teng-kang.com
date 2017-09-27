<div class="step">
<div class="tit"><h4><?php echo $this->_var['title']['fields_titles']; ?></h4></div>
<div class="items"> 
	<?php $_from = $this->_var['title']['cententFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fields_0_90685600_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['fields_0_90685600_1506353992']):
?>
	<div class="item">
		<div class="label"><?php echo $this->_var['fields_0_90685600_1506353992']['fieldsFormName']; ?>：</div>
		<div class="value">
			<?php if ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'input'): ?>
				<input class="text" type="text" value="<?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?>" size="<?php echo $this->_var['fields_0_90685600_1506353992']['inputForm']; ?>" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>">
			<?php elseif ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'other'): ?>
				<?php if ($this->_var['fields_0_90685600_1506353992']['otherForm'] == 'textArea'): ?>
				<div class="level_linkage">
					<div class="fl">
						<div class="ui-dropdown smartdropdown alien">
							<input type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['textAreaForm']['country']; ?>" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]">
							<div class="txt">国家</div>
							<i class="down u-dropdown-icon"></i>
							<div class="options clearfix" style="max-height:300px;">
							<!-- <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country_0_90695500_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['country_0_90695500_1506353992']):
?> -->
								<span class="liv" data-text="中国"  data-type="1" data-value="<?php echo $this->_var['country_0_90695500_1506353992']['region_id']; ?>">中国</span>
							<!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
							</div>
						</div>
						<div class="ui-dropdown smartdropdown alien">
							<input type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['textAreaForm']['province']; ?>" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]" id="selProvinces">
							<div class="txt">省/直辖市</div>
							<i class="down u-dropdown-icon"></i>
							<div class="options clearfix" style="max-height:300px;">
								<!--<?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list_0_90699200_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['list_0_90699200_1506353992']):
?>-->
								<span class="liv" data-text="<?php echo $this->_var['list_0_90699200_1506353992']['region_name']; ?>" data-type="2" data-value="<?php echo $this->_var['list_0_90699200_1506353992']['region_id']; ?>"><?php echo $this->_var['list_0_90699200_1506353992']['region_name']; ?></span>
								<!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
							</div>
						</div>
						<div class="ui-dropdown smartdropdown alien">
							<input type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['textAreaForm']['city']; ?>" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]" id="selCities">
							<div class="txt">市</div>
							<i class="down u-dropdown-icon"></i>
							<div class="options clearfix" style="max-height:300px;">
							<!-- <?php $_from = $this->_var['fields_0_90685600_1506353992']['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city_list_0_90703400_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['city_list_0_90703400_1506353992']):
?> -->
								<span class="liv hide" data-text="市" data-type="3" data-value="<?php echo $this->_var['city_list_0_90703400_1506353992']['region_id']; ?>">市</span>
							<!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
							</div>
						</div>
						<div class="ui-dropdown smartdropdown alien">
							<input type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['textAreaForm']['district']; ?>" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]" id="selDistricts">
							<div class="txt">区/县</div>
							<i class="down u-dropdown-icon"></i>
							<div class="options clearfix" style="max-height:300px;">
								<!-- <?php $_from = $this->_var['fields_0_90685600_1506353992']['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district_list_0_90706800_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['district_list_0_90706800_1506353992']):
?> -->
								<span class="liv hide" data-text="区/县" data-type="4" data-value="<?php echo $this->_var['district_list_0_90706800_1506353992']['region_id']; ?>">区/县</span>
								<!--<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>-->
							</div>
						</div>
					</div>
				</div>
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['otherForm'] == 'dateFile'): ?>
					<div class="type-file-box">
						<input type="button" name="button" id="button" class="type-file-button" value="" />
						<input type="file" class="type-file-file" name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" size="30" hidefocus="true" value="" />
						<input name="text_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?>" />
						<span class="show">
							<?php if ($this->_var['fields_0_90685600_1506353992']['titles_centents'] != ''): ?><a href="../<?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?>" target="_blank" class="nyroModal"><?php endif; ?><i class="icon icon-picture" onmouseover="toolTip('<img src=../<?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?>>')" onmouseout="toolTip()"></i></a>
						</span>
						<input type="text" name="textfile" class="type-file-text" id="textfield" readonly />
					</div>
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['otherForm'] == 'dateTime'): ?> 
					<?php $_from = $this->_var['fields_0_90685600_1506353992']['dateTimeForm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('dk', 'date_0_90716800_1506353992');$this->_foreach['date'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['date']['total'] > 0):
    foreach ($_from AS $this->_var['dk'] => $this->_var['date_0_90716800_1506353992']):
        $this->_foreach['date']['iteration']++;
?>
						<?php if ($this->_var['dk'] == 0): ?>  
						<div class="text_time" id="text_time_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>">
						<input name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]" type="text"  id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>" size="<?php echo $this->_var['date_0_90716800_1506353992']['dateSize']; ?>" value='<?php echo $this->_var['date_0_90716800_1506353992']['dateCentent']; ?>' readonly />
						<input name="selbtn_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>" type="button" id="selbtn_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>"> 
						</div>
						<?php else: ?>
						<span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
						<div class="text_time" id="text_time_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>">
							<input name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>[]" type="text" id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>" size="<?php echo $this->_var['date_0_90716800_1506353992']['dateSize']; ?>" value='<?php echo $this->_var['date_0_90716800_1506353992']['dateCentent']; ?>' readonly />
							<input name="selbtn_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>" type="button" id="selbtn_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>"> 
						</div>
						<?php endif; ?>
						<script type="text/javascript">
							var opts = {
								'targetId':'<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>',
								'triggerId':['selbtn_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>'],
								'alignId':'text_time_<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['dk']; ?>',
								'hms':'off',
								'format':'-'
							}
							xvDate(opts);
						</script>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php endif; ?>
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'textarea'): ?>
					<textarea name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" cols="<?php echo $this->_var['fields_0_90685600_1506353992']['cols']; ?>" rows="<?php echo $this->_var['fields_0_90685600_1506353992']['rows']; ?>" class="textarea"><?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?></textarea>  
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'select'): ?>
					<div id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" class="imitate_select select_w320">
						<div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
						<ul>
						<?php $_from = $this->_var['fields_0_90685600_1506353992']['selectList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'selectList_0_90736400_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['selectList_0_90736400_1506353992']):
?>
							<li><a href='javascript:;' data-value='<?php echo $this->_var['selectList_0_90736400_1506353992']; ?>' class='ftx-01'><?php echo $this->_var['selectList_0_90736400_1506353992']; ?></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</ul>
						<input name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" type="hidden" value="<?php echo $this->_var['fields_0_90685600_1506353992']['titles_centents']; ?>" id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_val">
					</div>  
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'radio'): ?>
                	<div class="checkbox_items">
					<?php $_from = $this->_var['fields_0_90685600_1506353992']['radioCheckboxForm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('rc_k', 'radio_0_90742100_1506353992');if (count($_from)):
    foreach ($_from AS $this->_var['rc_k'] => $this->_var['radio_0_90742100_1506353992']):
?>
						<div class="checkbox_item"> 
                            <input name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" type="radio" class="ui-radio" value="<?php echo $this->_var['radio_0_90742100_1506353992']['radioCheckbox']; ?>" id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['radio_0_90742100_1506353992']['radioCheckbox']; ?>" <?php if ($this->_var['fields_0_90685600_1506353992']['titles_centents'] == $this->_var['radio_0_90742100_1506353992']['radioCheckbox']): ?>checked="checked"<?php else: ?><?php if ($this->_var['rc_k'] == 0): ?>checked="checked"<?php endif; ?><?php endif; ?> />
                            <label for="<?php echo $this->_var[' ']['textFields']; ?>_<?php echo $this->_var['radio_0_90742100_1506353992']['radioCheckbox']; ?>" class="ui-radio-label"><?php echo $this->_var['radio_0_90742100_1506353992']['radioCheckbox']; ?></label>
                        </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
				<?php elseif ($this->_var['fields_0_90685600_1506353992']['chooseForm'] == 'checkbox'): ?>   
					<div class="checkbox_items">
                    <?php $_from = $this->_var['fields_0_90685600_1506353992']['radioCheckboxForm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('rc_k', 'checkbox');if (count($_from)):
    foreach ($_from AS $this->_var['rc_k'] => $this->_var['checkbox']):
?>
                        <div class="checkbox_item">
                       		<input name="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>" type="checkbox" class="ui-checkbox" value="<?php echo $this->_var['checkbox']['radioCheckbox']; ?>" id="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['checkbox']['radioCheckbox']; ?>" <?php if ($this->_var['fields_0_90685600_1506353992']['titles_centents'] == $this->_var['checkbox']['radioCheckbox']): ?>checked="checked"<?php else: ?><?php if ($this->_var['rc_k'] == 0): ?>checked="checked"<?php endif; ?><?php endif; ?> />
                        	<label for="<?php echo $this->_var['fields_0_90685600_1506353992']['textFields']; ?>_<?php echo $this->_var['checkbox']['radioCheckbox']; ?>" class="ui-label"><?php echo $this->_var['checkbox']['radioCheckbox']; ?></label>
                        </div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
				<?php endif; ?>
			<div class="fl org"><?php echo $this->_var['fields_0_90685600_1506353992']['formSpecial']; ?></div>
		</div>
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<!--以上是自定义基本信息，以下是固定信息-->
	<div class="item">
		<div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['expect_shop_type']; ?>：</div>
		<div class="value red">
			<!--<?php if ($this->_var['title']['parentType']['shoprz_type'] == 1): ?><?php echo $this->_var['lang']['flagship_store']; ?><?php elseif ($this->_var['title']['parentType']['shoprz_type'] == 2): ?><?php echo $this->_var['lang']['exclusive_shop']; ?><?php elseif ($this->_var['title']['parentType']['shoprz_type'] == 3): ?><?php echo $this->_var['lang']['franchised_store']; ?><?php endif; ?>--> 
                        <?php echo $this->_var['title']['parentType']['shoprz_type']; ?>
                </div>
	</div>
	<div class="item">
		<div class="label"><?php echo $this->_var['lang']['naming_conventions']; ?>：</div>
		<div class="value">
			<div class="callout"><?php echo $this->_var['lang']['shop_name_describe']; ?>&nbsp;&nbsp;<span class="red"><?php echo $this->_var['lang']['notice_shop_custom']; ?></span></div>
		</div>
	</div>
	<div class="item">
		<div class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['title']['fields_titles']; ?>：</div>
        <div class="value">
                <div class="red"><?php echo $this->_var['title']['titles_annotation']; ?></div>
                <div class="callout callout_list mt10">
                    <?php if ($this->_var['seller_shopinfo']['shop_name']): ?>
                    <div class="dl">
                        <div class="dt"><?php echo $this->_var['lang']['company_name']; ?>：</div>
                        <div class="dd red"><?php echo $this->_var['seller_shopinfo']['shop_name']; ?></div>
                    </div>   
                    <?php endif; ?>
                    <div class="dl">
                        <div class="dt"><?php echo $this->_var['lang']['select_brand_name']; ?>：</div>
                        <div class="dd">
							<div class="imitate_select select_w320">
								<div class="cite"><?php echo $this->_var['lang']['select_brand_name_two']; ?></div>
								<ul>
								<?php $_from = $this->_var['title']['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
									<li><a href='javascript:;' data-value='<?php echo $this->_var['brand']['brandName']; ?>' class='ftx-01'><?php echo $this->_var['brand']['brandName']; ?></a></li>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</ul>
								<input name="ec_shoprz_brandName" type="hidden" value="<?php echo $this->_var['title']['parentType']['shoprz_brandName']; ?>" id="<?php echo $this->_var['fields']['textFields']; ?>_val">
							</div> 
                        </div>
					</div>   
                    <div class="dl">    
                    	<div class="dt"><?php echo $this->_var['lang']['category_desc_key']; ?>：</div>
                        <div class="dd">
                             <input type="text" name="ec_shop_class_keyWords" size="30" value="<?php echo $this->_var['title']['parentType']['shop_class_keyWords']; ?>" class="text">&nbsp;&nbsp;                     
                    	</div>
					</div>   
                    <div class="dl">
                    	<div class="dt"><?php echo $this->_var['lang']['select_shop_suffix']; ?>：</div>
                        <div class="dd">
							<div class="imitate_select select_w320">
								<div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
								<ul>
									<li><a href='javascript:;' data-value='<?php echo $this->_var['lang']['flagship_store']; ?>' class='ftx-01'><?php echo $this->_var['lang']['flagship_store']; ?></a></li>
									<li><a href='javascript:;' data-value='<?php echo $this->_var['lang']['exclusive_shop']; ?>' class='ftx-01'><?php echo $this->_var['lang']['exclusive_shop']; ?></a></li>
									<li><a href='javascript:;' data-value='<?php echo $this->_var['lang']['franchised_store']; ?>' class='ftx-01'><?php echo $this->_var['lang']['franchised_store']; ?></a></li>
									<li><a href='javascript:;' data-value='<?php echo $this->_var['lang']['shop_store']; ?>' class='ftx-01'><?php echo $this->_var['lang']['shop_store']; ?></a></li>
								</ul>
								<input name="ec_shopNameSuffix" type="hidden" value="<?php echo $this->_var['title']['parentType']['shoprz_type']; ?>" >
							</div> 							
                        </div>
					</div>   
                    <div class="dl nt_value">
                        <div class="dt"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['expect_shop_name']; ?>：</div>
                        <div class="dd">
                           <input type="text" name="ec_rz_shopName" id="rz_shopName" size="30" value="<?php echo $this->_var['title']['parentType']['rz_shopName']; ?>" class="text">
                           <div class="form_prompt"></div>
                        </div>
					</div>   
                    <div class="dl nt_value">    
                        <div class="dt"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['shop_admin_user']; ?>：</div>
                        <div class="dd">
                            <input type="text" name="ec_hopeLoginName" id="hopeLoginName" size="30" value="<?php echo $this->_var['title']['parentType']['hopeLoginName']; ?>" class="text">
                            <div class="form_prompt"></div>            
                        </div> 
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
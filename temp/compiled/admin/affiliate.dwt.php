<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">推荐分成 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>请按照提示填写推荐设置信息。</li>
                    <li>请谨慎添加推荐分成百分比，关乎您的销售利润。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info">
						<div class="switch_info">
                        	<form method="post" action="affiliate.php">
							<div class="item">
								<div class="label"><?php echo $this->_var['lang']['separate_set']; ?>：</div>
								<div class="label_value">
									<div class="checkbox_items">
										<div class="checkbox_item">
											<input type="radio" class="ui-radio" name="on" id="on_1" value="1" <?php if ($this->_var['config']['on'] == 1): ?> checked="true" <?php endif; ?> onClick="javascript:actDiv('separate','');actDiv('btnon','none');" />
											<label for="on_1" class="ui-radio-label"><?php echo $this->_var['lang']['on']; ?></label>
										</div>
										<div class="checkbox_item">
											<input type="radio" class="ui-radio" name="on" id="on_0" value="0" <?php if (! $this->_var['config']['on'] || $this->_var['config']['on'] == 0): ?> checked="true" <?php endif; ?> onClick="javascript:actDiv('separate','none');actDiv('btnon','');" />
											<label for="on_0" class="ui-radio-label"><?php echo $this->_var['lang']['off']; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="item" id="btnon">
								<div class="label">&nbsp;</div>
								<div class="label_value info_btn">
									<div class="tj_info">
										<div class="desc red"><?php echo $this->_var['lang']['close_tj']; ?></div>
										<input type="hidden" name="act" value="on" />
										<input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button"/>
									</div>
								</div>
							</div>															
							</form>
							<div id="separate">
								<form action="affiliate.php" method="post">
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['separate_way']; ?>：</div>
										<div class="label_value">
											<div class="checkbox_items">
												<div class="checkbox_item">
													<input type="radio" class="ui-radio" name="separate_by" id="separate_by_0" value="0" <?php if (! $this->_var['config']['config']['separate_by'] || $this->_var['config']['config']['separate_by'] == 0): ?> checked="true" <?php endif; ?> onClick="actDiv('listDiv','');" />
													<label for="separate_by_0" class="ui-radio-label"><?php echo $this->_var['lang']['separate_by']['0']; ?></label>
												</div>
												<div class="checkbox_item">
													<input type="radio" class="ui-radio" name="separate_by" id="separate_by_1" value="1" <?php if ($this->_var['config']['config']['separate_by'] == 1): ?> checked="true" <?php endif; ?> onClick="actDiv('listDiv','none');" />
													<label for="separate_by_1" class="ui-radio-label"><?php echo $this->_var['lang']['separate_by']['1']; ?></label>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['expire']; ?></div>
										<div class="label_value">
											<input type="text" name="expire" maxlength="150" size="10" class="text text_5 mr10" autocomplete="off" value="<?php echo $this->_var['config']['config']['expire']; ?>" />
											<div id="" class="imitate_select select_w120">
												<div class="cite">请选择</div>
												<ul>
													<?php $_from = $this->_var['lang']['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['data']):
?>
													<li><a href="javascript:;" data-value="<?php echo $this->_var['key']; ?>" class="ftx-01"><?php echo $this->_var['data']; ?></a></li>
													<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
												</ul>
												<input name="expire_unit" type="hidden" value="<?php echo $this->_var['config']['config']['expire_unit']; ?>" id="">
											</div>
											<div class="notic"><?php echo nl2br($this->_var['lang']['help_expire']); ?></div>
										</div>
									</div>								
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['level_point_all']; ?></div>
										<div class="label_value">
											<input type="text" name="level_point_all" maxlength="150" size="10" class="text text_5" autocomplete="off" value="<?php echo $this->_var['config']['config']['level_point_all']; ?>" />
											<div class="notic"><?php echo nl2br($this->_var['lang']['help_lpa']); ?></div>
										</div>
									</div>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['level_money_all']; ?></div>
										<div class="label_value">
											<input type="text" name="level_money_all" maxlength="150" size="10" class="text text_5" autocomplete="off" value="<?php echo $this->_var['config']['config']['level_money_all']; ?>" />
											<div class="notic"><?php echo nl2br($this->_var['lang']['help_lma']); ?></div>
										</div>
									</div>								
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['level_register_all']; ?></div>
										<div class="label_value">
											<input type="text" name="level_register_all" maxlength="150" size="10" class="text text_5" autocomplete="off" value="<?php echo $this->_var['config']['config']['level_register_all']; ?>" />
											<div class="notic"><?php echo nl2br($this->_var['lang']['help_lra']); ?></div>
										</div>
									</div>
									<div class="item">
										<div class="label"><?php echo $this->_var['lang']['level_register_up']; ?></div>
										<div class="label_value">
											<input type="text" name="level_register_up" maxlength="150" size="10" class="text text_5" autocomplete="off" value="<?php echo $this->_var['config']['config']['level_register_up']; ?>" />
											<div class="notic"><?php echo nl2br($this->_var['lang']['help_lru']); ?></div>
										</div>
									</div>								
									<div class="item">
										<div class="label">&nbsp;</div>
										<div class="label_value info_btn">
											<input type="hidden" name="act" value="updata" />
                                            <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
										</div>
									</div>
								</form>
							
								<div class="list-div" id="listDiv">
									<?php endif; ?>
									<table width="100%">
										<tr>
											<th width="10%" name="levels" ReadOnly="true"><div class="tDiv"><?php echo $this->_var['lang']['levels']; ?></div></th>
											<th width="30%" name="level_point" Type="TextBox"><div class="tDiv"><?php echo $this->_var['lang']['level_point']; ?></div></th>
											<th width="30%" name="level_money" Type="TextBox"><div class="tDiv"><?php echo $this->_var['lang']['level_money']; ?></div></th>
											<th width="30%" class="handle" Type="Button"><?php echo $this->_var['lang']['handler']; ?></th>
										</tr>
										<?php $_from = $this->_var['config']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['nav']['iteration']++;
?>
										<tr>
											<td><div class="tDiv"><?php echo $this->_foreach['nav']['iteration']; ?></div></td>
											<td><div class="tDiv"><span onclick="listTable.edit(this, 'edit_point', '<?php echo $this->_foreach['nav']['iteration']; ?>'); return false;"><?php echo $this->_var['val']['level_point']; ?></span></div></td>
											<td><div class="tDiv"><span onclick="listTable.edit(this, 'edit_money', '<?php echo $this->_foreach['nav']['iteration']; ?>'); return false;"><?php echo $this->_var['val']['level_money']; ?></span></div></td>
											<td class="handle">
                                                <div class="tDiv a1">
                                                	<a href="javascript:confirm_redirect(lang_removeconfirm, 'affiliate.php?act=del&id=<?php echo $this->_foreach['nav']['iteration']; ?>')" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>
                                                </div>
                                            </td>
										</tr>
										<?php endforeach; else: ?>
										<tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_ads']; ?></td></tr>
										<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</table>
									<?php if ($this->_var['full_page']): ?>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
		</div>
    </div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript">
	<!--
	<?php if (! $this->_var['config']['on'] || $this->_var['config']['on'] == 0): ?>
	actDiv('separate','none');
	<?php else: ?>
	actDiv('btnon','none');
	<?php endif; ?>
	<?php if ($this->_var['config']['config']['separate_by'] == 1): ?>
	actDiv('listDiv','none');
	<?php endif; ?>

	var all_null = '<?php echo $this->_var['lang']['all_null']; ?>';
	
	onload = function()
	{
	  cleanWhitespace(document.getElementById("listDiv"));
	  if (document.getElementById("listDiv").childNodes[0].rows.length<6)
	  {
		listTable.addRow(check);
	  }
	  
	}
	function check(frm)
	{
	  if (frm['level_point'].value == "" && frm['level_money'].value == "")
	  {
		 frm['level_point'].focus();
		 alert(all_null);
		 return false;  
	  }
	  
	  return true;
	}
	function actDiv(divname, flag)
	{
		document.getElementById(divname).style.display = flag;
	}
	
	//-->
	</script>
</body>
</html>
<?php endif; ?>
<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">促销 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-6400.html" target="_blank">商城夺宝奇兵活动说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>	
				</div>
                <ul>
                	<li>列表页可查看该活动信息字段，如活动名称、商家名称、活动开始时间、活动结束时间、价格下限等，可进行搜索、增删改查功能。</li>
                    <li>根据活动名称、店铺名称等条件搜索出具体活动相关信息。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                	<div class="fl">
                        <a href="snatch.php?act=add"><div class="fbutton"><div class="add" title="添加夺宝奇兵"><span><i class="icon icon-plus"></i>添加夺宝奇兵</span></div></div></a>
                    </div>
                    <div class="refresh">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
                    <div class="search">
						<?php echo $this->fetch('library/search_store.lbi'); ?>
                        <div class="select m0">
                            <div class="imitate_select select_w170">
                                <div class="cite"><?php echo $this->_var['lang']['adopt_status']; ?></div>
                                <ul>
                                    <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['adopt_status']; ?></a></li>
                                    <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['not_audited']; ?></a></li>
                                    <li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['audited_not_adopt']; ?></a></li>
                                    <li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></a></li>
                                </ul>
                                <input name="review_status" type="hidden" value="0" id="">
                            </div>
                        </div>
                    	<div class="input">
                        	<input type="text" name="keywords" class="text nofocus" placeholder="活动名称" autocomplete="off" /><button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
				<form method="post" action="snatch.php?act=batch_drop" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
                	<div class="list-div" id="listDiv">
                    	<div class="flexigrid ht_goods_list">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0" class="table_layout">
                        	<thead>
                            	<tr>
									<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>								
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="22%"><div class="tDiv"><?php echo $this->_var['lang']['snatch_name']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="14%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="12%"><div class="tDiv"><?php echo $this->_var['lang']['end_time']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['min_price']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['integral']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['is_hot']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $_from = $this->_var['snatch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'snatch');if (count($_from)):
    foreach ($_from AS $this->_var['snatch']):
?>
                            	<tr>
								    <td class="sign">
                                        <div class="tDiv">
                                            <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['snatch']['act_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['snatch']['act_id']; ?>" />
                                            <label for="checkbox_<?php echo $this->_var['snatch']['act_id']; ?>" class="checkbox_stars"></label>
                                        </div>
                                    </td>
                                    <td><div class="tDiv"><?php echo $this->_var['snatch']['act_id']; ?></div></td>
                                	<td><div class="tDiv overflow_view"><span title="<?php echo $this->_var['snatch']['snatch_name']; ?>" data-toggle="tooltip"><?php echo $this->_var['snatch']['snatch_name']; ?></span></div></td>
                                    <td><div class="tDiv red"><?php echo $this->_var['snatch']['ru_name']; ?></div></td>
                                    <td><div class="tDiv overflow_view"><span title="<?php echo $this->_var['snatch']['goods_name']; ?>" data-toggle="tooltip"><?php echo $this->_var['snatch']['goods_name']; ?></span></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['snatch']['end_time']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['snatch']['start_price']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['snatch']['cost_points']; ?></div></td>
                                    <td>
                                    	<div class="tDiv">
                                        	<div class="switch mauto <?php if ($this->_var['snatch']['is_hot']): ?>active<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_hot', <?php echo $this->_var['snatch']['act_id']; ?>)" title="是">
                                            	<div class="circle"></div>
                                            </div>
                                            <input type="hidden" value="0" name="">
                                        </div>
                                    </td> 
                                    <td>
                                    	<div class="tDiv">
                                            <?php if ($this->_var['snatch']['review_status'] == 1): ?>
                                            <font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                            <?php elseif ($this->_var['snatch']['review_status'] == 2): ?>
                                            <font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font><br/>
                                            <i class="tip yellow" title="<?php echo $this->_var['snatch']['review_content']; ?>" data-toggle="tooltip"><?php echo $this->_var['lang']['prompt']; ?></i>
                                            <?php elseif ($this->_var['snatch']['review_status'] == 3): ?>
                                            <font class="blue"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                            <?php endif; ?>									
                                        </div>
                                    </td>   
                                    <td class="handle">
										<div class="tDiv ht_tdiv">
											<a href="snatch.php?act=view&amp;snatch_id=<?php echo $this->_var['snatch']['act_id']; ?>" title="<?php echo $this->_var['lang']['view_detail']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
											<a href="snatch.php?act=edit&amp;id=<?php echo $this->_var['snatch']['act_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
											<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['snatch']['act_id']; ?>,'<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>									
										</div>
									</td>
                                </tr>
							<?php endforeach; else: ?>
							<tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
							<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>					
                            	<tr>
                                    <td colspan="11">
										<div class="tDiv">
											<div class="tfoot_btninfo">
											  <div class="shenhe">
												<input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['drop']; ?>" class="btn btn_disabled" disabled="true" ectype="btnSubmit" />
											  </div>										
											</div>											
											<div class="list-page">
												<?php echo $this->fetch('library/page.lbi'); ?>
											</div>
										</div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
						<?php if ($this->_var['full_page']): ?>
                        </div>
                    </div>
				</form>
                </div>
            </div>
        </div>
    </div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
<script type="text/javascript">
	//列表导航栏设置下路选项
	$(".ps-container").perfectScrollbar();

	//分页传值
	listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
	listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';

	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	

</script>
</body>
</html>
<?php endif; ?>

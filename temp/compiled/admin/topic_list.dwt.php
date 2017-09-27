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
                        	<a href="http://help.ecmoban.com/article-6547.html" target="_blank">商城专题管理操作说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>				
				</div>
                <ul>
                	<li>展示专题活动的相关信息。</li>
                    <li>可进行发布广告、发布Flash播放等操作。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                	<div class="fl">
						<a href="topic.php?act=add"><div class="fbutton"><div class="add" title="添加专题"><span><i class="icon icon-plus"></i>添加专题</span></div></div></a>
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
					<form method="POST" action="" name="listForm">
                	<div class="list-div" id="listDiv">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="20%"><div class="tDiv"><?php echo $this->_var['lang']['topic_title']; ?></div></th>
                                    <th width="13%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="11%"><div class="tDiv"><?php echo $this->_var['lang']['start_time']; ?></div></th>
                                    <th width="11%"><div class="tDiv"><?php echo $this->_var['lang']['end_time']; ?></div></th>
                                    <th width="11%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th width="18%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $_from = $this->_var['topic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'topic');if (count($_from)):
    foreach ($_from AS $this->_var['topic']):
?>
								<tr>
								<td class="sign"><div class="tDiv">
									<input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['topic']['topic_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['topic']['topic_id']; ?>" />
									<label for="checkbox_<?php echo $this->_var['topic']['topic_id']; ?>" class="checkbox_stars"></label>
								</div></td>
								<td><div class="tDiv"><?php echo $this->_var['topic']['topic_id']; ?></div></td>
							    <td><div class="tDiv"><?php echo $this->_var['topic']['title']; ?></div></td>
                                <td><div class="tDiv red"><?php echo $this->_var['topic']['ru_name']; ?></div></td>
							    <td><div class="tDiv"><?php echo $this->_var['topic']['start_time']; ?></div></td>
							    <td><div class="tDiv"><?php echo $this->_var['topic']['end_time']; ?></div></td>
                                <td>
                                    <div class="tDiv">
                                        <?php if ($this->_var['topic']['review_status'] == 1): ?>
                                        <font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                        <?php elseif ($this->_var['topic']['review_status'] == 2): ?>
                                        <font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font><br/>
                                        <i class="tip yellow" title="<?php echo $this->_var['topic']['review_content']; ?>" data-toggle="tooltip"><?php echo $this->_var['lang']['prompt']; ?></i>
                                        <?php elseif ($this->_var['topic']['review_status'] == 3): ?>
                                        <font class="blue"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                        <?php endif; ?>									
                                    </div>
                                </td>
							    <td class="handle">
									<div class="tDiv a5">
									  <a href="../topic.php?topic_id=<?php echo $this->_var['topic']['topic_id']; ?>" title="<?php echo $this->_var['lang']['view']; ?>" target="_blank" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
									  <a href="topic.php?act=edit&topic_id=<?php echo $this->_var['topic']['topic_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
									  <?php if ($this->_var['topic']['user_id'] == 0): ?><a href="topic.php?act=visual&topic_id=<?php echo $this->_var['topic']['topic_id']; ?>" target="_blank" class="btn_region"><i class="icon icon-edit"></i>装修</a><?php endif; ?>
									  <a href="javascript:;" on title="<?php echo $this->_var['lang']['drop']; ?>" onclick="listTable.remove(<?php echo $this->_var['topic']['topic_id']; ?>,delete_topic_confirm,'delete');" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>
									  <a href="ads.php?act=add&ad_name=<?php echo $this->_var['topic']['title']; ?>&ad_link=<?php echo $this->_var['topic']['url']; ?>" class="btn_region"><i class="icon icon-screenshot"></i><?php echo $this->_var['lang']['publish_to_ads']; ?></a>
									  <!--<a href="flashplay.php?act=add&ad_link=<?php echo $this->_var['topic']['url']; ?>" title="<?php echo $this->_var['lang']['publish_to_player']; ?>" class="btn_region"><i class="icon icon-screenshot"></i><?php echo $this->_var['lang']['publish_to_player']; ?></a>-->		
									</div>
								</td>
								</tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records"  align="center" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
								<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
									<td colspan="12">
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
					</form>
                </div>
            </div>
        </div>
    </div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript">
        //分页传值
        listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
        listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';
    
        <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
	  document.getElementById("btnSubmit").onclick = function()
	  {
		if (confirm(delete_topic_confirm))
		{
		  document.forms["listForm"].action = "topic.php?act=delete";
		  return;
		}
		else
		{
		  return false;
		}
	  }		
    </script>
</body>
</html>
<?php endif; ?>
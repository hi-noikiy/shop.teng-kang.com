<!--申请店铺信息-->
<div class="step">
    <div class="tit"><h4>选择可经营类目</h4></div>
    <div class="items">
        <div class="item">
            <div class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['steps_main_categories']; ?>：</div>
            <div class="value">
                <div id="shop_categoryMain_id" class="imitate_select select_w320">
                    <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                    <ul>
                    <?php $_from = $this->_var['title']['first_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['cate']):
?>
                        <li><a href='javascript:;' data-value='<?php echo $this->_var['cate']['cat_id']; ?>' class='ftx-01'><?php echo $this->_var['cate']['cat_name']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <input name="ec_shop_categoryMain" type="hidden" value="<?php echo $this->_var['title']['parentType']['shop_categoryMain']; ?>" id="shop_categoryMain_id_val">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['detailed_directory']; ?>：</div>
            <div class="value">
                <div id="addCategoryMain_Id" class="imitate_select select_w320">
                    <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                    <ul>
                    <?php $_from = $this->_var['title']['first_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['cate']):
?>
                        <li><a href='javascript:;' data-value='<?php echo $this->_var['cate']['cat_id']; ?>' class='ftx-01'><?php echo $this->_var['cate']['cat_name']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <input name="addCategoryMain" type="hidden" value="0" id="addCategoryMain_Id_val">
                </div>
                <div class="category_checkbox_list">
                    <div class="checkbox_items" id="steps_re_span">
                    </div>
                    <div class="m-category-handle">
                        <div class="checkbox_item" style="width:auto;">
                            <input type="checkbox" name="all_list" class="ui-checkbox" id="allList" />
                            <label for="allList" class="ui-label"><?php echo $this->_var['lang']['check_all_back']; ?></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn30 btn_blue" onclick="selectChildCate_cheked()" ><?php echo $this->_var['lang']['add']; ?></a>
                    </div>
                </div>
                <div class="list-div" id="detailCategoryTable">
                    <table class="m-table mt20" >
                        <thead>
                            <tr>
                                <th width="10%"><?php echo $this->_var['lang']['snumber']; ?></th>
                                <th width="35%"><?php echo $this->_var['langone_level_directorysnumber']; ?></th>
                                <th width="35%"><?php echo $this->_var['lang']['two_level_directory']; ?></th>
                                <th width="20%"><?php echo $this->_var['lang']['handler']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $_from = $this->_var['category_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'category');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['category']):
?>
                            <tr>
                                <td align="center">
                                    <p>
                                        <span class="index"><?php echo $this->_var['k']; ?></span>
                                        <input type="hidden" value="<?php echo $this->_var['category']['cat_id']; ?>" name="cat_id[]" class="cId">
                                    </p>
                                </td>
                                <td align="center" >
                                    <p>
                                        <input type="hidden" value="<?php echo $this->_var['category']['parent_name']; ?>" name="parent_name[]" class="cl1Name">
                                        <?php echo $this->_var['category']['parent_name']; ?>
                                    </p>
                                </td>
                                <td align="center">
                                    <p>
                                        <input type="hidden" value="<?php echo $this->_var['category']['cat_name']; ?>" name="cat_name[]" class="cl2Name">
                                        <?php echo $this->_var['category']['cat_name']; ?>
                                    </p>
                                </td>
                                <td><div class="tDiv"><a class="btn_trash" href="javascript:void(0);" onClick="deleteChildCate(<?php echo $this->_var['category']['ct_id']; ?>)"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a></div></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan='4'>暂时没有分类</td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="item" id="category_permanent">
            <div class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['directory_industry_qualification']; ?>：</div>
            <div class="value">
                <p><a class="blue" target="_blank" href="#"><?php echo $this->_var['lang']['industry_qualification_standard']; ?></a></p>
                <div class="list-div" id="category_permanent">
                    <table class="m-table mt10" id="detailCategoryQuaTable">
                        <thead>
                            <tr>
                                <th width="25%"><?php echo $this->_var['lang']['directory_name']; ?></th>
                                <th width="25%"><?php echo $this->_var['lang']['brand_zizhi']; ?></th>
                                <th width="25%"><?php echo $this->_var['lang']['brand_zizhi_dzb']; ?></th>
                                <th width="25%"><?php echo $this->_var['lang']['brand_zizhi_end_time']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
							<?php $_from = $this->_var['permanent_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pk', 'permanent');if (count($_from)):
    foreach ($_from AS $this->_var['pk'] => $this->_var['permanent']):
?>
                            <tr>
                                <td><?php echo $this->_var['permanent']['cat_name']; ?><input type="hidden" value="<?php echo $this->_var['permanent']['cat_id']; ?>" name="permanentCat_id_<?php echo $this->_var['permanent']['cat_id']; ?>[]"></td>
                                <td><?php echo $this->_var['permanent']['dt_title']; ?><input type="hidden" value="<?php echo $this->_var['permanent']['dt_id']; ?>" name="permanent_title_<?php echo $this->_var['permanent']['cat_id']; ?>[]"></td>
                                <td>
                                    <div class="type-file-box">
                                        <input type="button" name="button" id="button" class="type-file-button" value="" />
                                        <input type="file" class="type-file-file" id="legal_person_fileImg" name="permanentFile_<?php echo $this->_var['permanent']['cat_id']; ?>[]" size="30" hidefocus="true" value="" />
										<?php if ($this->_var['permanent']['permanent_file']): ?>
										<span class="show">
                                            <a href="../<?php echo $this->_var['permanent']['permanent_file']; ?>" class="nyroModal"><i class="icon icon-picture" onmouseover="toolTip('<img src=../<?php echo $this->_var['permanent']['permanent_file']; ?>>')" onmouseout="toolTip()"></i></a>
                                        </span>
										<?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_xz_time">
                                        <div class="text_time" id="categoryId_date_time">
                                            <input type="text" class="text" name="categoryId_date_<?php echo $this->_var['permanent']['dt_id']; ?>" id="categoryId_date_<?php echo $this->_var['permanent']['dt_id']; ?>" value="" readonly>
                                        </div>
                                        <div class="checkbox_item fl">
                                            <input type="checkbox" name="categoryId_permanent_<?php echo $this->_var['permanent']['cat_id']; ?>[]" class="ui-checkbox" id="categoryId_permanent_<?php echo $this->_var['permanent']['dt_id']; ?>" onClick="get_categoryId_permanent(this, '<?php echo $this->_var['permanent']['permanent_date']; ?>', <?php echo $this->_var['permanent']['dt_id']; ?>)">
                                            <label for="categoryId_permanent_<?php echo $this->_var['permanent']['dt_id']; ?>" class="ui-label">永久</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <script type="text/javascript">
                            		//时间选择
									var opts<?php echo $this->_var['permanent']['dt_id']; ?> = {
										'targetId':'categoryId_date_<?php echo $this->_var['permanent']['dt_id']; ?>',//时间写入对象的id
										'triggerId':'categoryId_date_<?php echo $this->_var['permanent']['dt_id']; ?>',//触发事件的对象id
										'alignId':'categoryId_date_time',//日历对齐对象
										'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
										'min':'', //最小时间
										'hms':'off'
									}
									xvDate(opts<?php echo $this->_var['permanent']['dt_id']; ?>);
                            </script>
							<?php endforeach; else: ?>
                            <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	onload = function(){
		<?php if (! $this->_var['title']['parentType']['shop_categoryMain']): ?>
			var shop_categoryMain = document.getElementById('shop_categoryMain_id');//  主营类目
			
			if(shop_categoryMain.value != 0){
				shop_categoryMain.value = 0;
			}
		<?php endif; ?>
	}
	
	//----全选/反选 或 全部取消  (type=1:取消)
	function get_cateAll(type,f){ 
		var cateChild = document.getElementsByName('cateChild[]');
		var addCategoryBtn = document.getElementsByName('addCategoryBtn[]');
		var addCategoryMain = document.getElementById('addCategoryMain_Id');
		var oneCat_id;
		
		if(type == 1){ 
			if(addCategoryMain.value != 0){
				addCategoryMain.value = 0;
				
				if(document.getElementById('oneCat_id')){
					oneCat_id = document.getElementById('oneCat_id').value;
				}else{
					oneCat_id = 0;
				}
				
				if(oneCat_id > 0){
					cat_id = oneCat_id;
				}else{
					cat_id = addCategoryMain.value;
				}
				
				var cateArr = new Object();
				var child = new Array();
				for(i=0; i<cateChild.length; i++){
					if(cateChild[i].checked == true){
						child[i] = cateChild[i].value;
					}else{
						child[i] = '';
					}
				}
				cateArr.cat_id = child;
				
				selectChildCate(cat_id,1,cateArr);
				closeDiv(); //关闭层
			}
		}
		
		for(i=0; i<cateChild.length; i++){
			if(type == 1){
				cateChild[i].checked = false;
				addCategoryBtn[0].checked = false;
			}else{
				if(f.checked){
					if(cateChild[i].checked == false){
						cateChild[i].checked = true;
					}else{
						cateChild[i].checked = false;
					}			
				}else{
					if(cateChild[i].checked == true){
						cateChild[i].checked = false;
					}else{
						cateChild[i].checked = true;
					}
				}
			}
		}
	}
	
	//删除二级类目
	function deleteChildCate(ct_id){
		
		var user_id = document.getElementById('user_id').value;
		
		Ajax.call('merchants_users_list.php?is_ajax=1&act=deleteChildCate_checked', 'ct_id=' + ct_id + '&user_id=' + user_id, responseDeleteChildCate, 'POST', 'JSON');
	}
	function responseDeleteChildCate(result){
		
		$('#detailCategoryTable').html(result.content); //删除类目
		$('#category_permanent').html(result.catePermanent); //以及类目证件列表	
	}
	
	$.divselect("#addCategoryMain_Id","#addCategoryMain_Id_val",function(){
		val = $("#addCategoryMain_Id_val").val();	
		var filter = new Object;
		filter.cat_id  = val;
		filter.user_id  = <?php echo $this->_var['user_id']; ?>;
		Ajax.call('merchants_users_list.php?is_ajax=1&act=addChildCate', filter, responseSelectChildCate, 'GET', 'JSON');
	})
	
	function responseSelectChildCate(result){
		
		var steps = document.getElementById('steps_re_span');
		
		if(result.error == 0){
			steps.innerHTML = result.content;
		}
	}
	
	//添加二级类目
	function selectChildCate_cheked(){
		
		var cateArr = new Object();
		var child = new Array();
		var cateChild = document.getElementsByName('cateChild[]');
		var user_id = document.getElementById('user_id').value;
		
		for(i=0; i<cateChild.length; i++){
			if(cateChild[i].checked == true){
				child[i] = cateChild[i].value;
			}else{
				child[i] = '';
			}
		}
		
		cateArr.cat_id = child;
		cateArr.user_id = user_id;
		if(cateChild.length > 0){
                    Ajax.call('merchants_users_list.php?is_ajax=1&act=addChildCate_checked', 'cat_id=' + $.toJSON(cateArr), responseSelectChildCate_cheked, 'POST', 'JSON');
                }
	}
	function responseSelectChildCate_cheked(result){
		
		 $('#detailCategoryTable').html(result.content); //二级类目别表
		 $('#category_permanent').html(result.catePermanent); //以及类目证件列表
	}
</script>
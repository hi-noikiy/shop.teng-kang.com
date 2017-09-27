<?php if ($this->_var['temp'] == 'shop_banner'): ?>
<div class="tishi">
	<div class="tishi_info">
    	<?php if (! $this->_var['uploadImage']): ?>
        <p class="first">注意：1、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全；</p>
        <?php else: ?>
        <p class="first">注意：1、请按照模板展示模式图片上面的尺寸来设置广告；</p>
        <p>2、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全；</p>
        <i class="icon"></i>
        <?php endif; ?>
    </div>
</div>
<div class="tab">
	<ul class="clearfix">
    	<li class="current">内容设置</li>
        <?php if (! $this->_var['uploadImage'] && $this->_var['mode'] != 'h-streamer'): ?><li>显示设置</li><?php endif; ?>
    </ul>
</div>
<div class="modal-body">
    <div class="body_info" id="banner_info">
        <div class="ps_table">
            <table id="addpictable" class="table">
                <thead>
                    <tr>
                        <th>图片</th>
                        <?php if ($this->_var['uploadImage'] != 1): ?>
                        <th>图片链接</th>
                        <th class="center">排序</th>
                        <?php if ($this->_var['mode'] == 'lunbo'): ?>
                        <th class="center">背景颜色</th>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->_var['titleup'] == 1): ?>
                        <th class="center">主标题</th>
                        <th class="center">副标题</th>
                        <?php endif; ?>
                        <th class="center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_var['banner_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['item']):
?>
                        <tr>
                            <td>
                                <div class="img">
                                    <span><img src="<?php echo $this->_var['item']['pic_src']; ?>"></span>
                                    <input type="hidden" name="pic_src[]" value="<?php echo $this->_var['item']['pic_src']; ?>"/>
                                </div>
                            </td>
                            <?php if ($this->_var['uploadImage'] != 1): ?>
                            <td>
                                <input type="text" name="link[]" value="<?php echo $this->_var['item']['link']; ?>" class="form-control">
                            </td>
                            <td class="center">
                                <input type="text" value="<?php echo $this->_var['item']['sort']; ?>" name="sort[]" class="form-control small">
                            </td>
                            <?php if ($this->_var['mode'] == 'lunbo'): ?>
                            <td class="center">
                                <input type="text" value="<?php echo $this->_var['item']['bg_color']; ?>" name="bg_color[]" class="form-control small">
                            </td>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($this->_var['titleup'] == 1): ?>
                            <td class="center">
                                <input type="text" value="<?php echo $this->_var['item']['title']; ?>" name="title[]" class="form-control small">
                            </td>
                            <td class="center">
                                <input type="text" value="<?php echo $this->_var['item']['subtitle']; ?>" name="subtitle[]" class="form-control small">
                            </td>
                            <?php endif; ?>
                            <td class="center">
                                <a href="javascript:;" class="pic_del del">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr class="notic">
                            <td colspan="5">点击下列图片空间图片可添加图片或点击上传图片按钮上传新图片</td>
                        </tr>    
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </tbody>
            </table>
        </div>
        <div class="images_space">
            <div class="goods_gallery mt20" ectype="album-warp">
                <div class="nav">
                    <form action="" id="gallery_pic" method="post" enctype="multipart/form-data"  runat="server">
                        <div class="fl" ectype="albumFilter">
                            <div class="imitate_select select_w220" id="album_id">
                                <div class="cite">请选择相册...</div>		
                                <ul style="display: none;" class="ps-container" ectype="album_list_check">
                                    <li><a href="javascript:;" data-value="0" class="ftx-01">请选择...</a></li>
                                    <?php $_from = $this->_var['album_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['list']):
?>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['list']['album_id']; ?>" class="ftx-01"><?php echo $this->_var['list']['album_mame']; ?></a></li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </ul>
                                <input name="album_id" type="hidden" value="<?php echo $this->_var['album_id']; ?>" id="album_id_val">
                            </div>
                            <div class="imitate_select select_w220" id="sort_name">
                                <div class="cite">请选择...</div>
                                <ul style="display: none;" class="ps-container">
                                    <li><a href="javascript:;" data-value="2" class="ftx-01">按上传时间从晚到早</a></li>
                                    <li><a href="javascript:;" data-value="1" class="ftx-01">按上传时间从早到晚</a></li>
                                    <li><a href="javascript:;" data-value="3" class="ftx-01">按图片从小到大</a></li>
                                    <li><a href="javascript:;" data-value="4" class="ftx-01">按图片从大到小</a></li>
                                    <li><a href="javascript:;" data-value="5" class="ftx-01">按图片名升序</a></li>
                                    <li><a href="javascript:;" data-value="6" class="ftx-01">按图片名降序</a></li>
                                </ul>
                                <input name="sort_name" type="hidden" value="2" id="sort_name_val">
                            </div>
                        </div>
                        <div class="updata_btn">
                        	<a href="javascript:void(0);" class="btn30 sc-btn red_btn">上传图片<input name="file" type="file"></a>
                            <a href="javascript:void(0);" class="btn30 sc-btn red_btn" ectype="add_album">添加相册</a>
                        </div>
                    </form>
                </div>
                
                <div class="table_list" ectype='pic_list'>
                    <div class="gallery_album" data-act="get_albun_pic" data-inid="pic_list" data-url='get_ajax_content.php' data-where="sort_name=<?php echo $this->_var['filter']['sort_name']; ?>&album_id=<?php echo $this->_var['filter']['album_id']; ?>">
                        <ul class="ga-images-ul">
                            <?php $_from = $this->_var['pic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pic_list');if (count($_from)):
    foreach ($_from AS $this->_var['pic_list']):
?>
                            <li><a href="javascript:;" onclick="addpic('<?php echo $this->_var['pic_list']['pic_file']; ?>',this)"><img src="<?php echo $this->_var['pic_list']['pic_file']; ?>"><span class="pixel"><?php echo $this->_var['pic_list']['pic_spec']; ?></span></a></li>
                            <?php endforeach; else: ?>
                            <li class="notic">暂无图片</li>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                        <div class="clear"></div>
                        <?php echo $this->fetch('library/lib_page.lbi'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body_info" style="display:none;">
    	<div class="control_list<?php if ($this->_var['mode'] == 'topBanner'): ?> hide<?php endif; ?>">
        	<div class="control_item">
                <div class="control_text"><em class="red">*</em>图片高度：</div>
                <div class="control_value">
                	<div class="fl mr10"><input type="text" name="picHeight" value="<?php if ($this->_var['spec_attr']['picHeight']): ?><?php echo $this->_var['spec_attr']['picHeight']; ?><?php else: ?>500<?php endif; ?>" class="shop_text" ectype="required" data-msg="请在显示设置填写轮播图高度" autocomplete="off" /><span>px</span></div>
                    <div class="notic">请设置在300-500px这个之间</div>
                </div>
            </div>
            <?php if ($this->_var['mode'] == 'lunbo'): ?>
            <div class="control_item">
                <div class="control_text">切换效果：</div>
                <div class="control_value">
                	<div class="checkbox_items">
                        <div class="checkbox_item">
                            <input type="radio" name="slide_type" value="fold" class="ui-radio" id="shade" <?php if ($this->_var['spec_attr']['slide_type'] != 'roll'): ?>checked<?php endif; ?> >
                            <label class="ui-radio-label" for="shade">渐变</label>
                        </div>
                        <div class="checkbox_item">
                            <input type="radio" name="slide_type" value="roll" class="ui-radio" id="roll" <?php if ($this->_var['spec_attr']['slide_type'] == 'roll'): ?>checked<?php endif; ?>>
                            <label class="ui-radio-label" for="roll">滚动</label>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_var['mode'] == 'advImg1'): ?>
            <div class="control_item">
           		<div class="control_text">是否轮播切换：</div>
                <div class="control_value">
                	<div class="checkbox_items">
                        <div class="checkbox_item">
                            <input type="radio" name="slide_type" value="yesSlide" class="ui-radio" id="yesSlide" <?php if ($this->_var['spec_attr']['slide_type'] != 'noSlide'): ?>checked<?php endif; ?> >
                            <label class="ui-radio-label" for="yesSlide">渐变</label>
                        </div>
                        <div class="checkbox_item">
                            <input type="radio" name="slide_type" value="noSlide" class="ui-radio" id="noSlide" <?php if ($this->_var['spec_attr']['slide_type'] == 'noSlide'): ?>checked<?php endif; ?>>
                            <label class="ui-radio-label" for="noSlide">滚动</label>
                        </div>
                    </div>
                </div>
            </div>    
            <?php endif; ?>
            <?php if ($this->_var['mode'] == 'advImg4'): ?>
            <div class="control_item">
                <div class="control_text">展示方式：</div>
                <div class="control_value">
                	<div class="itemsLayout line-item3" data-line="row3">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'row3'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">展示3个广告位<br>（建议尺寸394*394）</div>
                    </div>
                    <div class="itemsLayout line-item4" data-line="row4">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'row4'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">展示4个广告位<br>（建议尺寸292*350）</div>
                    </div>
                    <div class="itemsLayout line-item5" data-line="row5">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'row5'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">展示5个广告位<br>（建议尺寸232*337）</div>
                    </div>
                    <div class="itemsLayout line-item6" data-line="row6">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'row6' || $this->_var['spec_attr']['itemsLayout'] == ''): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">展示6个广告位<br>（建议尺寸190*250）</div>
                    </div>
                </div>
            </div>
            <input name="itemsLayout" type="hidden" value="<?php if ($this->_var['spec_attr']['itemsLayout']): ?><?php echo $this->_var['spec_attr']['itemsLayout']; ?><?php else: ?>row6<?php endif; ?>"/>
            <?php endif; ?>
            <?php if ($this->_var['mode'] == 'advImg3'): ?>
            <div class="control_item">
                <div class="control_text">展示方式：</div>
                <div class="control_value">
                	<div class="itemsLayout line-item-left-right" data-line="left-right">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'left-right' || $this->_var['spec_attr']['itemsLayout'] == ''): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">左小图右大图</div>
                    </div>
                    <div class="itemsLayout line-item-right-left" data-line="right-left">
                    	<div class="itemsLayoutShot <?php if ($this->_var['spec_attr']['itemsLayout'] == 'right-left'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">左大图右小图</div>
                    </div>
                </div>
            </div>
            <input name="itemsLayout" type="hidden" value="<?php if ($this->_var['spec_attr']['itemsLayout']): ?><?php echo $this->_var['spec_attr']['itemsLayout']; ?><?php else: ?>left-right<?php endif; ?>"/>
            <?php endif; ?>
            <div class="control_item">
                <div class="control_text">是否新窗口打开：</div>
                <div class="control_value">
                	<div class="checkbox_items">
                        <div class="checkbox_item">
                            <input type="radio" name="target" value="_blank" class="ui-radio" id="blank" <?php if ($this->_var['spec_attr']['target'] != '_self'): ?>checked<?php endif; ?> >
                            <label class="ui-radio-label" for="blank">是</label>
                        </div>
                        <div class="checkbox_item">
                            <input type="radio" name="target" value="_self" class="ui-radio" id="self" <?php if ($this->_var['spec_attr']['target'] == '_self'): ?>checked<?php endif; ?>>
                            <label class="ui-radio-label" for="self">否</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="control_list<?php if ($this->_var['mode'] != 'topBanner'): ?> hide<?php endif; ?>">
            <div class='control_item'>
                <div class="tit_head mb10">
                    <div class="control_item">
                        <div class="control_text">背景色：</div>
                        <div class="control_value">
                            <input type="text" name="navColor" class="navColor" value="<?php if ($this->_var['spec_attr']['navColor']): ?><?php echo $this->_var['spec_attr']['navColor']; ?><?php else: ?>#dbe0e4<?php endif; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
<script type="text/javascript">
    $.divselect("#album_id","#album_id_val",function(obj){
        var val = obj.attr("data-value");
        changedpic(val,obj,0);
    });
	
    $.divselect("#sort_name","#sort_name_val",function(obj){
		 var sort = obj.attr("data-value");
        changedpic(0,obj,0,sort);
    });
    
	$("input[name='file']").change(function(){
		var album_id = $("input[name='album_id']").val();
		if(album_id > 0){
			var actionUrl = "gallery_album.php?act=upload_pic";
			$("#gallery_pic").ajaxSubmit({
				type: "POST",
				dataType: "json",
				url: actionUrl,
				data: {"action": "TemporaryImage"},
				success: function (data) {
					if (data.error == "1") {
						alert(data.massege);
					}else{
						changedpic(0);
					}
				},
				async: true
			});
		}else{
			alert("请选择相册");
		}
	});
	
	function addpic(src,obj){
		var i = 0;
		var mode = "<?php echo $this->_var['mode']; ?>";
		var length = "<?php echo $this->_var['pic_number']; ?>";
		var uploadImage = "<?php echo $this->_var['uploadImage']; ?>";
		var titleup = "<?php echo $this->_var['titleup']; ?>";
		var id = $(obj).parents(".pb").attr("id");
		
		$("#addpictable").find('tr').each(function(){
			i++
		});
		
		if($("#addpictable").find('tr.notic').length>0){
			i-=1;
		}

		if( length< i  && length != 0){
			alert("此模块最多可添加"+length+"个图片");
		}else{
			if(mode != "lunbo"){
				if(uploadImage == 1){
					var html = '<tr><td><div class="img"><span><img src="'+src+'"></span><input type="hidden" name="pic_src[]" value="'+src+'"/></div></td><td class="center"><a href="javascript:;" class="pic_del del">删除</a></td></tr>';
				}else{
					var title = '';
					if(titleup == 1){
						title = '<td class="center"><input type="text" value="" name="title[]" class="form-control small"></td><td class="center"> <input type="text" value="" name="subtitle[]" class="form-control small"></td>';
					}
					var html = '<tr><td><div class="img"><span><img src="'+src+'"></span><input type="hidden" name="pic_src[]" value="'+src+'"/></div></td><td><input type="text" name="link[]" class="form-control"></td><td class="center"><input type="text" value="1" name="sort[]" class="form-control small"></td>' + title + '<td class="center"><a href="javascript:;" class="pic_del del">删除</a></td></tr>';
				}
			}else{
				var html = '<tr><td><div class="img"><span><img src="'+src+'"></span><input type="hidden" name="pic_src[]" value="'+src+'"/></div></td><td><input type="text" name="link[]" class="form-control"></td><td class="center"><input type="text" value="1" name="sort[]" class="form-control small"></td><td class="center"><input type="text" value="" name="bg_color[]" class="form-control small"></td><td class="center"><a href="javascript:;" class="pic_del del">删除</a></td></tr>';
			}
			
			if($("#addpictable").find(".notic").length>0){
				$("#addpictable").find(".notic").remove();
			}
			$("#addpictable").find("tbody").prepend(html);
		}
		pbct("#"+id);
	}
	
    <?php if ($this->_var['mode'] == 'topBanner'): ?>
    var navColor = $(".navColor").val();
	$(".navColor").spectrum({
		showInitial: true,
		showPalette: true,
		showSelectionPalette: true,
		showInput: true,
		color: navColor,
		showSelectionPalette: true,
		maxPaletteSize: 10,
		preferredFormat: "hex",
		palette: [
			["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
			"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
			["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
			"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
			["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
			"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
			"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
			"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
			"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
			"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
			"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
			"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
			"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
			"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
		]
	});
	$(".sp-choose").click(function(){
		var val = $(this).parents(".sp-picker-container").find(".sp-input").val();
		$(".navColor").val(val);
	});
        <?php endif; ?>
            //select下拉默认值赋值
            function imitate_select(){
                $('.imitate_select').each(function()
                {
                        var sel_this = $(this)
                        var val = sel_this.children('input[type=hidden]').val();
                        sel_this.find('a').each(function(){
                                if($(this).attr('data-value') == val){
                                        sel_this.children('.cite').html($(this).html());
                                }
                        })
                });
            }
	
</script>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'goods_info'): ?>
<div class="tishi">
	<div class="tishi_info">
        <p class="first">注意：1、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全；</p>
    </div>
</div>

<?php if ($this->_var['goods_type'] != 1): ?>
<div class="tab">
	<ul class="clearfix">
    	<li class="current">内容设置</li>
        <li>显示设置</li>
    </ul>
</div>
<?php endif; ?>

<div class="modal-body">
	<div class="body_info floor_info">
        <div class="search">
            <div class="select_box mr10">
                <div class="categorySelect fl">
                    <div class="selection">
                        <input type="text" name="category_name" id="category_name" class="text w250 mr0 valid" value="<?php if ($this->_var['parent_category']): ?><?php echo $this->_var['parent_category']; ?><?php else: ?>顶级分类<?php endif; ?>" autocomplete="off" readonly data-filter="cat_name" />
                        <input type="hidden" name="cat_id" ectype="goods_cat_dialog" id="category_id" value="<?php echo empty($this->_var['cat_id']) ? '0' : $this->_var['cat_id']; ?>" data-filter="cat_id" />
                    </div>
                    <div class="select-container" style="display:none;">
                        <?php echo $this->fetch('library/filter_category.lbi'); ?>
                    </div>
                </div>
            </div>

            <div class="search_con mr10"><input width="20" name="keyword_brand" type="text" id="keyword_brand" class="text text_6 mr0"></div>
            <a href="javascript:void(0);" class="sc-btn fl" ectype="changedgoods">确定</a>
            <div class="checkobx-item">
                <input type="checkbox" name="is_selected" id="is_selected" class="ui-checkbox" onclick="checkd_selected(this)"/>
                <label class="ui-label" for="is_selected">已选择商品</label>
            </div>
        </div>
        <div class="table_list" ectype='goods_list'>
            <div class="gallery_album" data-act="changedgoods" data-goods='1' data-inid="goods_list" data-url='get_ajax_content.php' data-where="cat_id=<?php echo $this->_var['filter']['cat_id']; ?>&sort_order=<?php echo $this->_var['filter']['sort_order']; ?>&keyword=<?php echo $this->_var['filter']['keyword']; ?>&search_type=<?php echo $this->_var['filter']['search_type']; ?>&goods_id=<?php echo $this->_var['filter']['goods_id']; ?>&type=1">
                <ul class="ga-goods-ul" id="goods_list">
                    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['gl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gl']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['gl']['iteration']++;
?>
                    <li class="on">
                        <div class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></div>
                        <div class="name"><?php echo $this->_var['goods']['goods_name']; ?></div>
                        <div class="price"><?php echo $this->_var['goods']['shop_price']; ?></div>
                        <div class="choose"><a href="javascript:void(0);" class="on" onclick="selected_goods(this,'<?php echo $this->_var['goods']['goods_id']; ?>')"><i class="iconfont icon-gou"></i>已选择</a></div>
                    </li>
                    <?php endforeach; else: ?>
                    <li class="notic">请先搜索商品</li>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="body_info floor_info" style="display:none;">
        <div class="control_list">
        	<div class="control_item">
                <div class="control_text">是否显示标题：</div>
                <div class="control_value">
                	<div class="checkbox_items">
                        <div class="checkbox_item">
                        	<input type="radio" name="is_title" value="1" class="ui-radio" id="is_title_1" <?php if ($this->_var['arr']['is_title'] != 0): ?> checked <?php endif; ?>>
                        	<label class="ui-radio-label" for="is_title_1">是</label>
                        </div>
                        <div class="checkbox_item">
                        	<input type="radio" name="is_title" value="0" class="ui-radio" id="is_title_0" <?php if ($this->_var['arr']['is_title'] == 0): ?> checked <?php endif; ?>>
                            <label class="ui-radio-label" for="is_title_0">否</label>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="tit_head mb10"<?php if ($this->_var['arr']['is_title'] == 0): ?> style="display:none;"<?php endif; ?>>
                <div class="control_item">
                    <div class="control_text">标题名称：</div>
                    <div class="control_value"><input name="cat_name" type="text" class="text text2" size="25" value="<?php echo $this->_var['arr']['cat_name']; ?>"></div>
                </div>
                <?php if ($this->_var['mode'] != "guessYouLike"): ?>
                <div class="control_item">
                    <div class="control_text">楼层描述：</div>
                    <div class="control_value"><input name="cat_desc" type="text" class="text" size="25" value="<?php echo $this->_var['arr']['cat_desc']; ?>"></div>
                </div>
                <div class="control_item">
                    <div class="control_text">文字显示：</div>
                    <div class="control_value">
                        <select class="select" name="align">
                            <option value="left" <?php if ($this->_var['arr']['align'] == 'left'): ?>checked <?php endif; ?>>居左</option>
                            <option value="center" <?php if ($this->_var['arr']['align'] == 'center'): ?>checked <?php endif; ?>>居中</option>
                            <option value="regiht" <?php if ($this->_var['arr']['align'] == 'regiht'): ?>checked <?php endif; ?>>居右</option>
                        </select>
                    </div>
                </div>              
                 <?php endif; ?>
            </div>
            <?php if ($this->_var['mode'] != "guessYouLike"): ?>
            <div class="control_item">
                <div class="control_text">展示方式：</div>
                <div class="control_value">
                	<div class="itemsLayout line-item3" data-line="row3">
                    	<div class="itemsLayoutShot <?php if ($this->_var['arr']['itemsLayout'] == 'row3'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">一行展示3个商品</div>
                    </div>
                    <div class="itemsLayout line-item4" data-line="row4">
                    	<div class="itemsLayoutShot <?php if ($this->_var['arr']['itemsLayout'] == 'row4'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">一行展示4个商品</div>
                    </div>
                    <div class="itemsLayout line-item5" data-line="row5">
                    	<div class="itemsLayoutShot <?php if ($this->_var['arr']['itemsLayout'] == 'row5'): ?>dtselected<?php endif; ?>"><a href="javascript:void(0);"><span></span></a></div>
                        <div class="dd">一行展示5个商品</div>
                    </div>
                </div>
            </div>
            <input name="itemsLayout" type="hidden" value="<?php echo $this->_var['arr']['itemsLayout']; ?>"/>
            <?php else: ?>
            <div class="control_item">
                <div class="control_text"><em class="red">*</em>模块名称：</div>
                <div class="control_value"><input type="text" value="<?php echo $this->_var['lift']; ?>" class="text" name="lift" autocomplete="off" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请在显示设置填写电梯层标题" /><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
            </div>
            <?php endif; ?>
        </div>    
    </div>
	<input type="hidden" name="search_type" value="<?php echo $this->_var['search_type']; ?>"/>
	<input type="hidden" name="goods_id" value="<?php echo $this->_var['goods_id']; ?>"/>
    <input type="hidden" name="goods_ids" value="<?php echo $this->_var['arr']['goods_ids']; ?>"/>
</div>
<script language="JavaScript">
    ajaxchangedgoods(1);
    function checkd_selected(obj){
		var obj = $(obj);
		var is_selected =$("input[name='is_selected']").is(':checked');
		var length = obj.parents(".floor_info").find(".table_list li.on").length;
		var type = 1;
        if(is_selected == true){
            $(".icon-gou").parents('li').show();
			$(".icon-dsc-plus").parents('li').hide();
			
			if(length < 6){
				$("*[ectype='goods_list']").perfectScrollbar("destroy");
			}
            type = 0;
        }else{
            $(".icon-gou,.icon-dsc-plus").parents('li').show();
			$("*[ectype='goods_list']").perfectScrollbar();
        }
        ajaxchangedgoods(type);
    }
    
    function ajaxchangedgoods(type){
        var cat_id = $("[ectype='goods_cat_dialog']").val();
        var keyword = $("input[name='keyword_brand']").val();
        var goods_ids = $("input[name='goods_ids']").val();
		var search_type = $("input[name='search_type']").val();
		var goods_id = $("input[name='goods_id']").val();
		$("[ectype='goods_list']").html("<i class='icon-spin'><img src='images/visual/load.gif' width='30' height='30'></i>");
		
		function ajax(){
			Ajax.call('get_ajax_content.php?is_ajax=1&act=changedgoods', "cat_id="+cat_id+"&keyword="+keyword+"&goods_ids="+goods_ids+"&type="+type + "&resetRrl=1&search_type=" + search_type + "&goods_id=" + goods_id, function(data){
				$("[ectype='goods_list']").html(data.content);
				
				$("*[ectype='goods_list']").perfectScrollbar("destroy");
				$("*[ectype='goods_list']").perfectScrollbar();
			} , 'POST', 'JSON');
		}
		
		setTimeout(function(){ajax()},300);
    }

	//选中商品
	function selected_goods(obj,goods_id){
		var obj = $(obj);
		var arr = '';
		var goods_ids = $("input[name='goods_ids']").val();
		var good_number = "<?php echo $this->_var['good_number']; ?>";
		var verinumber = true;
		
		if(obj.hasClass("on")){
			obj.removeClass("on");
			obj.html('<i class="iconfont icon-dsc-plus"></i>选择');
			arr = goods_ids.split(',');
			for(var i =0;i<arr.length;i++){
				if(arr[i] == goods_id){
					 arr.splice(i,1);
				}
			}
		}else{
			if(good_number > 0){
				arr = goods_ids.split(',');
				if(arr.length >= good_number){
					alert("此模块只能添加" + good_number + "个商品");
					verinumber = false;
				}
			}
			if(verinumber){
				$(obj).addClass('on');
				$(obj).html('<i class="iconfont icon-gou"></i>已选择');
				if(goods_ids){
					arr = goods_ids + ','+goods_id;
				}else{
					arr = goods_id;
				}
			}
		}
		if(verinumber){
			$("input[name='goods_ids']").val(arr);
		}
	}
	
	$("input[name='is_title']").on("click",function(){
		var val = $(this).val();
		if(val == 1){
			$(this).parents(".control_list").find(".tit_head").show();
		}else{
			$(this).parents(".control_list").find(".tit_head").hide();
		}
	});
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'header'): ?>
<div class="tishi">
	<div class="tishi_info">
	<p class="first">注意：1、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全;</p>
    <p>2、自定义编辑器里面的编辑模板，样式可以写在编辑器里面;</p>
    </div>
</div>
<div class="tab">
	<ul class="clearfix">
    	<li class="current">内容设置</li>
    </ul>
</div>
<div class="modal-body">
	<div class="control_list">
        <div class="control_item">
            <div class="control_text">设置类型：</div>
            <div class="control_value">
            	<label><input type="radio" name="header_type" value="defalt_type" class="checkbox" <?php if ($this->_var['content']['header_type'] != 'custom_type'): ?>checked<?php endif; ?>><span>默认类型</span></label>
                <label><input type="radio" name="header_type" value="custom_type" class="checkbox" <?php if ($this->_var['content']['header_type'] == 'custom_type'): ?>checked<?php endif; ?>><span>自定义类型</span></label>
            </div>
        </div>
        <div class="defalt_type" <?php if ($this->_var['content']['header_type'] != 'defalt_type'): ?>style="display:none;"<?php endif; ?>>
            <div class="control_item">
                <div class="control_text">头部图片：</div>
                <form  action="" id="fileForm" method="post"  enctype="multipart/form-data"  runat="server" >
                    <div class="control_value relative">
                        <a href="javascript:void(0);" class="uploader-button">
                        	<span class="btn-text">选择文件</span>
                        	<div class="file-input-wrapper"><input type="file" name="headerFile" value="上传图片" id="headerFile"  class="file-header-img"></div>
                        </a>
                        <div class="preview-box"><input name="fileimg" type="hidden" value="<?php if ($this->_var['content']['headerbg_img']): ?><?php echo $this->_var['content']['headerbg_img']; ?><?php else: ?>../data/gallery_album/ksh_bg.jpg<?php endif; ?>"/><img id="headerbg_img" src="<?php if ($this->_var['content']['headerbg_img']): ?><?php echo $this->_var['content']['headerbg_img']; ?><?php else: ?>../data/gallery_album/ksh_bg.jpg<?php endif; ?>" height="86"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="custom_type" <?php if ($this->_var['content']['header_type'] == 'defalt_type'): ?>style="display:none;"<?php endif; ?>>
        	<div class="control_item">
                <div class="control_text">自定义内容：</div>
                <div class="control_value over">
                    <?php echo $this->_var['FCKeditor']; ?>
                </div>
            </div>
        </div>
        <div class="control_item">
            <div class="control_text">高度：</div>
            <div class="control_value"><input type="text" name="picHeight" value="<?php if ($this->_var['content']['picHeight']): ?><?php echo $this->_var['content']['picHeight']; ?><?php else: ?>128<?php endif; ?>" class="shop_text" autocomplete="off" /><span>px</span><span>请设置在120-150px这个之间</span></div>
        </div>
	</div>        
</div>
<script type="text/javascript">
    var suffix = "<?php echo $this->_var['content']['suffix']; ?>";
	$.upload_file("input[name='headerFile']","topic.php?act=header_bg&name=headerFile&suffix="+suffix,"#headerbg_img");
	
	$(document).on("click","input[name='header_type']",function(){
		if($(this).val() == "defalt_type"){
			$(".defalt_type").show().siblings(".custom_type").hide();
		}else{
			$(".custom_type").show().siblings(".defalt_type").hide();
		}
	});
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'custom'): ?>
<div class="tishi">
	<div class="tishi_info">
        <p class="first">注意：1、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全；</p>
    </div>
</div>

<div class="modal-body">
	<div class="control_list">
    	<div class="control_item">
            <div class="control_text auto"><em class="red">*</em>模块名称：</div>
            <div class="control_value"><input type="text" value="<?php echo $this->_var['lift']; ?>" class="text" name="lift" autocomplete="off" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请在显示设置填写电梯层标题" /><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
        </div>
        <div class="control_item control_item_quan">
            <div class="control_value"><?php echo $this->_var['FCKeditor']; ?></div>
        </div>
	</div>
</div>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'h-need' || $this->_var['temp'] == 'h-master' || $this->_var['temp'] == 'h-storeRec'): ?>
<!--首页广告一-->
<div class="tishi">
	<div class="tishi_info">
    	<?php if ($this->_var['temp'] == 'h-need'): ?>
        <p class="first">注意：1、图片背景尺寸为232*330；图片尺寸为155*155；打“*”的为必填信息</p>
    	<?php elseif ($this->_var['temp'] == 'h-master'): ?>
        <p class="first">注意：1、图片背景尺寸为232*120；图片尺寸为99*72；打“*”的为必填信息</p>
        <?php elseif ($this->_var['temp'] == 'h-storeRec'): ?>
        <p class="first">注意：1、推荐店铺大图尺寸为290*290；推荐店铺logo图尺寸为114*56；打“*”的为必填信息</p>
        <?php endif; ?>
    </div>
</div>


<form action="" id="<?php echo $this->_var['temp']; ?>Insert" method="post"  enctype="multipart/form-data"  runat="server" >
<div class="control_list">
    <?php if ($this->_var['temp'] == 'h-master' || $this->_var['temp'] == 'h-storeRec'): ?>
    <div class="control_item">
        <div class="control_text"><em class="red">*</em>广告标题：</div>
        <div class="control_value"><input type="text" value="<?php echo $this->_var['masterTitle']; ?>" class="text" name="masterTitle" placeholder="广告标题" autocomplete="off" ectype="required" data-msg="请填写广告标题" /></div>
    </div>   
    <?php endif; ?>
    <div class="control_item">
        <div class="control_text"><em class="red">*</em>模块名称：</div>
        <div class="control_value"><input type="text" value="<?php echo $this->_var['lift']; ?>" class="text" name="lift" autocomplete="off" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请填写电梯层标题" /><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
    </div> 
    <?php if ($this->_var['temp'] == 'h-need'): ?>
    <div class="control_item">
        <div class="control_text">标题颜色：</div>
        <div class="control_value"><input type="text" name="needColor" class="navColor" value="<?php if ($this->_var['needColor']): ?><?php echo $this->_var['needColor']; ?><?php else: ?>#fff<?php endif; ?>"></div>
    </div> 
    <?php endif; ?>
	<div class="control_item">
        <div class="control_text">广告内容：</div>
        <div class="control_value">
            <div class="quick_items">
                <?php if ($this->_var['spec_attr']): ?>
                <?php $_from = $this->_var['spec_attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'arr');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['arr']):
?>
                <div class="item">
                    <div class="title">广告<?php if ($this->_var['key'] == 0): ?>一<?php elseif ($this->_var['key'] == 1): ?>二<?php elseif ($this->_var['key'] == 2): ?>三<?php elseif ($this->_var['key'] == 3): ?>四<?php elseif ($this->_var['key'] == 4): ?>五<?php endif; ?></div>
                    <div class="content">
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="<?php echo $this->_var['arr']['title']; ?>" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="<?php echo $this->_var['arr']['subtitle']; ?>" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
                        <div class="adv_item">
                            <em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number="1"><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺logo<?php else: ?>选择上传背景图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg">
                                    <?php if ($this->_var['arr']['homeAdvBg']): ?>
                                    <a href="<?php echo $this->_var['arr']['homeAdvBg']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['arr']['homeAdvBg']; ?>>')" onmouseout="toolTip()"></i></a>
                                    <?php endif; ?>
                                    <input type="hidden" value="<?php echo $this->_var['arr']['homeAdvBg']; ?>" class="text" name="homeAdvBg[]" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number="1"><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺主图<?php else: ?>选择上传广告图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img">
                                    <?php if ($this->_var['arr']['original_img']): ?>
                                    <a href="<?php echo $this->_var['arr']['original_img']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['arr']['original_img']; ?>>')" onmouseout="toolTip()"></i></a>
                                    <?php endif; ?>
                                    <input type="hidden" value="<?php echo $this->_var['arr']['original_img']; ?>" class="text" name="original_img[]" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="<?php echo $this->_var['arr']['url']; ?>" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php else: ?>
                <div class="item">
                    <div class="title">广告一</div>
                    <div class="content">
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
						<div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺logo<?php else: ?>选择上传背景图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg"><input type="hidden" value="" class="text" name="homeAdvBg[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺主图<?php else: ?>选择上传广告图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img"><input type="hidden" value="" class="text" name="original_img[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">广告二</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
						<div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺logo<?php else: ?>选择上传背景图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg"><input type="hidden" value="" class="text" name="homeAdvBg[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺主图<?php else: ?>选择上传广告图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img"><input type="hidden" value="" class="text" name="original_img[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">广告三</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
						<div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺logo<?php else: ?>选择上传背景图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg"><input type="hidden" value="" class="text" name="homeAdvBg[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺主图<?php else: ?>选择上传广告图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img"><input type="hidden" value="" class="text" name="original_img[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">广告四</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
						<div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺logo<?php else: ?>选择上传背景图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg"><input type="hidden" value="" class="text" name="homeAdvBg[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number = '1'><?php if ($this->_var['temp'] == 'h-storeRec'): ?>选择店铺主图<?php else: ?>选择上传广告图<?php endif; ?></a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img"><input type="hidden" value="" class="text" name="original_img[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <?php if ($this->_var['temp'] != 'h-storeRec'): ?>
                <div class="item">
                    <div class="title">广告五</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="title[]" placeholder="标题" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="subtitle[]" placeholder="次标题" autocomplete="off" ></div>
						<div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_min" ectype="uploadImage" data-title="广告背景图" data-number = '1'>选择上传背景图</a>
                                <div class="imgup_icon" ectype="imgValue" data-name="homeAdvBg"><input type="hidden" value="" class="text" name="homeAdvBg[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item">
                        	<em class="red">*</em>
                            <div class="imgup_div" ectype="imgControl">
                                <a href="javascript:void(0);" class="upload_image upload_image_max" ectype="uploadImage" data-title="广告图" data-number = '1'>选择上传广告图</a>
                                <div class="imgup_icon" ectype="imgValue" data-name="original_img"><input type="hidden" value="" class="text" name="original_img[]" autocomplete="off" ></div>
                            </div>
                        </div>
                        <div class="adv_item"><em class="red">&nbsp;</em><input type="text" value="" class="text" name="url[]" placeholder="链接地址" autocomplete="off" ></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="mode" value="<?php echo $this->_var['temp']; ?>">
</form>
<script>
        <?php if ($this->_var['temp'] == 'h-need'): ?>
    var navColor = $(".navColor").val();
	$(".navColor").spectrum({
		showInitial: true,
		showPalette: true,
		showSelectionPalette: true,
		showInput: true,
		color: navColor,
		showSelectionPalette: true,
		maxPaletteSize: 10,
		preferredFormat: "hex",
		palette: [
			["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
			"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
			["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
			"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
			["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
			"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
			"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
			"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
			"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
			"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
			"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
			"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
			"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
			"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
		]
	});
	$(".sp-choose").click(function(){
		var val = $(this).parents(".sp-picker-container").find(".sp-input").val();
		$(".navColor").val(val);
	});
        <?php endif; ?>
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'h-brand'): ?>
<!--首页品牌-->
<form  action="" id="<?php echo $this->_var['temp']; ?>Insert" method="post"  enctype="multipart/form-data"  runat="server" >
<div class="control_list">
	<div class="control_item">
        <div class="control_text"><em class="red">*</em>模块名称：</div>
        <div class="control_value"><input type="text" value="<?php echo $this->_var['lift']; ?>" class="text" name="lift" autocomplete="off" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请填写电梯层标题" /><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
    </div> 
	<div class="control_item">
        <div class="control_text">品牌广告：</div>
        <div class="control_value" ectype="imgControl">
        	<a href="javascript:void(0);" class="upload_image mb0" ectype="uploadImage" data-title="品牌广告" data-number="1" data-link="1" data-showlink="1">选择上传图片</a>
            <div class="imgup_icon" ectype='imgValue' data-name='barndAdv'>
                <?php $_from = $this->_var['spec_attr']['barndAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <a href="<?php if ($this->_var['item']): ?><?php echo $this->_var['item']; ?><?php else: ?>data/gallery_album/visualDefault/homeIndex_007.jpg<?php endif; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php if ($this->_var['item']): ?><?php echo $this->_var['item']; ?><?php else: ?>data/gallery_album/visualDefault/homeIndex_007.jpg<?php endif; ?>>')" onmouseout="toolTip()"></i></a>
                <input name="barndAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php $_from = $this->_var['spec_attr']['barndAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <input name="barndAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php $_from = $this->_var['spec_attr']['barndAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <input name="barndAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
    </div>
    <div class="control_item">
        <div class="control_text">选择展示品牌：</div>
        <div class="control_value gallery_album" data-act="brand_query" data-inid="brand_list" data-url='dialog.php' ectype='brand_list' >
            <ul class="brand_list">
                <?php $_from = $this->_var['recommend_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['brand']):
?>
                <li ectype='cliclkBrand' data-type="homeBrand" data-brand='<?php echo $this->_var['brand']['brand_id']; ?>'<?php if ($this->_var['brand']['selected'] == 1): ?> class="selected"<?php endif; ?>><a href="JavaScript:void(0);"><img src="<?php echo $this->_var['brand']['brand_logo']; ?>" title="<?php echo $this->_var['brand']['brand_name']; ?>"></a><b></b></li>
                <?php endforeach; else: ?>
                <li class="notic">暂无品牌</li>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <div class="clear"></div>
            <?php echo $this->fetch('library/lib_page.lbi'); ?>
        </div>
    </div>
</div>
<input name='brand_ids' type='hidden' value='<?php echo $this->_var['spec_attr']['brand_ids']; ?>'>
<input type="hidden" name="mode" value="<?php echo $this->_var['temp']; ?>">
</form>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'homeFloor'): ?>
<!--首页楼层-->
<form action="" id="<?php echo $this->_var['mode']; ?>Insert" method="post" enctype="multipart/form-data" runat="server" >
    <div class="tab">
        <ul class="clearfix">
            <li class="current">楼层分类设置</li>
            <li>楼层广告设置</li>
            <?php if ($this->_var['mode'] != 'homeFloorFive'): ?>
            <li>楼层品牌设置</li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="modal-body hfloor">
        <div class="body_info">
            <div class="control_list">
                <div class="control_item">
                    <?php if ($this->_var['hierarchy'] != '2'): ?>
                    <div class="control_item">
                        <div class="control_text"><em class="red">*</em>模块名称：</div>
                        <div class="control_value"><input type="text" value="<?php echo $this->_var['lift']; ?>" class="text" name="lift" autocomplete="off" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请填写电梯层标题" /><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
                    </div>
                    <?php endif; ?>
                    <div class="control_item">
                        <div class="control_text">标题：</div>
                        <div class="control_value"><input type="text" value="<?php echo $this->_var['spec_attr']['floor_title']; ?>" class="text" name="floor_title" autocomplete="off" placeholder="楼层标题"  data-msg="楼层标题" /><div class="notic">楼层标题，不填则默认为选择的楼层分类</div></div>
                    </div>
                    <div class="control_text lh30">楼层分类：</div>
                    <div class="control_value">
                        <div class="imitate_select select_w220" id="cat_id">
                            <div class="cite">请选择</div>
                            <ul>
                                <li><a href="javascript:void(0);" data-value=""><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                <?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                <li<?php if ($this->_var['list']['cat_id'] == $this->_var['spec_attr']['Selected']): ?> class="current"<?php endif; ?>><a href="javascript:void(0);" data-value="<?php echo $this->_var['list']['cat_id']; ?>"><?php echo $this->_var['list']['cat_name']; ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                            <input name="" value="<?php echo $this->_var['spec_attr']['Selected']; ?>" type="hidden" id='cat_id_val'/>
                        </div>
                        <div class="cat_floor">
                            <?php if ($this->_var['spec_attr']['catChild']): ?>
                            <div class="imitate_select select_w220" id="cat_id1">
                                <div class="cite">请选择</div>
                                <ul>
                                    <li><a href="javascript:void(0);" data-value=""><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                    <?php $_from = $this->_var['spec_attr']['catChild']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                    <li <?php if ($this->_var['list']['cat_id'] == $this->_var['spec_attr']['cat_id']): ?> class="current"<?php endif; ?>><a href="javascript:void(0);" data-value="<?php echo $this->_var['list']['cat_id']; ?>"><?php echo $this->_var['list']['cat_name']; ?></a></li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </ul>
                                <input name="" value="<?php echo $this->_var['spec_attr']['cat_id']; ?>" type="hidden" id='cat_id_val1'/>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($this->_var['mode'] == 'homeFloorFour' || $this->_var['mode'] == 'homeFloorFive' || $this->_var['mode'] == 'homeFloorSeven' || $this->_var['mode'] == 'homeFloorSix'): ?>
                        <input name="top_goods" type="hidden" value='<?php echo $this->_var['spec_attr']['top_goods']; ?>'/>
                        <a href="javascript:void(0);" class="hdle" ectype="setupGoods" data-top='1' data-goodsnumber="<?php if ($this->_var['mode'] == 'homeFloorSeven'): ?>6<?php else: ?>12<?php endif; ?>">设置商品</a>
                        <?php endif; ?>
                    </div>
                    <input name="Floorcat_id" type="hidden" value='<?php echo $this->_var['spec_attr']['cat_id']; ?>'/>
                </div>
                <div class="control_item">
                    <div class="control_text lh30">楼层二级分类：</div>
                    <div class="control_value" data-catnumber="<?php if ($this->_var['mode'] == 'homeFloorModule'): ?>2<?php else: ?>6<?php endif; ?>" data-goodsnumber="<?php if ($this->_var['mode'] == 'homeFloorModule'): ?>4<?php else: ?>12<?php endif; ?>">
                        <?php if ($this->_var['spec_attr']['juniorCat']): ?>
                            <?php $_from = $this->_var['spec_attr']['catInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['value']):
        $this->_foreach['name']['iteration']++;
?>
                            <div class="item" ectype="item">
                                <div class="imitate_select select_w220" ectype="iselectErji">
                                    <div class="cite" ectype="tit">请选择</div>
                                    <ul>
                                        <li><a href="javascript:void(0);" data-value="">请选择..</a></li>
                                        <?php $_from = $this->_var['spec_attr']['juniorCat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                        <li<?php if ($this->_var['list']['cat_id'] == $this->_var['value']['cat_id']): ?> class="current"<?php endif; ?>><a href="javascript:void(0);" data-value="<?php echo $this->_var['list']['cat_id']; ?>"><?php echo $this->_var['list']['cat_name']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input name="cateValue[]" type="hidden" value="<?php echo $this->_var['value']['cat_id']; ?>" ectype="cateValue" />
                                </div>
                                <?php if (($this->_foreach['name']['iteration'] <= 1)): ?>
                                <a href="javascript:void(0);" class="hdle" ectype="addCate">增加分类</a>
                                <?php endif; ?>
                                <a href="javascript:void(0);" class="hdle" ectype="setupGoods">
                                    设置商品
                                    <input type="hidden" name="cat_goods[]" value="<?php echo $this->_var['value']['cat_goods']; ?>">
                                </a>
                                <?php if (! ($this->_foreach['name']['iteration'] <= 1)): ?>
                                <a href="javascript:void(0);" class="hdle" ectype="removeCate">删除分类</a>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php else: ?>
                        <div class="item" ectype="item">
                            <div class="imitate_select select_w220" ectype="iselectErji">
                                <div class="cite" ectype="tit">请选择</div>
                                <ul>
                                    <li><a href="javascript:void(0);" data-value="">请选择..</a></li>
                                </ul>
                                <input name="cateValue[]" type="hidden" value="" ectype="cateValue" />
                            </div>
                            <a href="javascript:void(0);" class="hdle" ectype="addCate">增加分类</a>
                            <a href="javascript:void(0);" class="hdle" ectype="setupGoods" style="display:none;">
                                设置商品
                                <input type="hidden" name="cat_goods[]" value="<?php echo $this->_var['value']['cat_goods']; ?>">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control_item">
                    <div class="control_text lh30">设置颜色：</div>
                    <div class="control_value">
                        <div class="color-item color-item1<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-1' || ! $this->_var['spec_attr']['typeColor']): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" value="floor-color-type-1">
                            <i></i>
                        </div>
                        <div class="color-item color-item2<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-2'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-2">
                            <i></i>
                        </div>
                        <div class="color-item color-item3<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-3'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-3">
                            <i></i>
                        </div>
                        <div class="color-item color-item4<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-4'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-4">
                            <i></i>
                        </div>
                        <div class="color-item color-item5<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-5'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-5">
                            <i></i>
                        </div>
                        <div class="color-item color-item6<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-6'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-6">
                            <i></i>
                        </div>
                        <div class="color-item color-item7<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-7'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-7">
                            <i></i>
                        </div>
                        <div class="color-item color-item8<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-8'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-8">
                            <i></i>
                        </div>
                        <div class="color-item color-item9<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-9'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-9">
                            <i></i>
                        </div>
                        <div class="color-item color-item10<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-10'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-10">
                            <i></i>
                        </div>
                        <div class="color-item color-item11<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-11'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-11">
                            <i></i>
                        </div>
                        <div class="color-item color-item12<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-12'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-12">
                            <i></i>
                        </div>
                        <div class="color-item color-item13<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-13'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-13">
                            <i></i>
                        </div>
                        <div class="color-item color-item14<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-14'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-14">
                            <i></i>
                        </div>
                        
                        <div class="color-item color-item15<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-15'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-15">
                            <i></i>
                        </div>
                        <div class="color-item color-item16<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-16'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-16">
                            <i></i>
                        </div>
                        <div class="color-item color-item17<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-17'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-17">
                            <i></i>
                        </div>
                        <div class="color-item color-item18<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-18'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-18">
                            <i></i>
                        </div>
                        
                        <div class="color-item color-item19<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-19'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-19">
                            <i></i>
                        </div>
                        <div class="color-item color-item20<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-20'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-20">
                            <i></i>
                        </div>
                        <div class="color-item color-item21<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-21'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-21">
                            <i></i>
                        </div>
                        <div class="color-item color-item22<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-22'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-22">
                            <i></i>
                        </div>
                        
                        <div class="color-item color-item23<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-23'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-23">
                            <i></i>
                        </div>
                        <div class="color-item color-item24<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-24'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-24">
                            <i></i>
                        </div>
                        <div class="color-item color-item25<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-25'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-25">
                            <i></i>
                        </div>
                        <div class="color-item color-item26<?php if ($this->_var['spec_attr']['typeColor'] == 'floor-color-type-26'): ?> selected<?php endif; ?>" ectype="colorItem">
                            <input type="hidden" name="" value="floor-color-type-26">
                            <i></i>
                        </div>
                        <input type="hidden" name="typeColor" value="<?php if ($this->_var['spec_attr']['typeColor']): ?><?php echo $this->_var['spec_attr']['typeColor']; ?><?php else: ?>floor-color-type-1<?php endif; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="body_info" style="display:none;">
            <div class="control_list">
                <div class="control_item control_item_quan">
                    <div class="control_value">
                        <div class="floormodeItem<?php if ($this->_var['mode'] == 'homeFloorModule'): ?> floormodeModuleItem<?php endif; ?><?php if ($this->_var['spec_attr']['floorMode'] < 2): ?> selected<?php endif; ?>" ectype="floormodeItem">
                        	<div class="img"><img src="images/visual/<?php echo $this->_var['mode']; ?>_01.jpg"></div>
                            <div class="checkbox_item">
                            	<input type="radio" name="floorMode" value="1" data-pattern="<?php echo $this->_var['floor_style']['0']; ?>" class="ui-radio" id="floorMode_1"<?php if ($this->_var['spec_attr']['floorMode'] < 2): ?> checked<?php endif; ?>/>
                            	<label class="ui-radio-label" for="floorMode_1">楼层广告模板一</label>
                            </div>
                            <div ectype="floorModehide" class="hide">
                                <?php if ($this->_var['spec_attr']['floorMode'] == 1): ?>
                                <div ectype="leftBanner">
                                    <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBanner[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php $_from = $this->_var['spec_attr']['leftBannerLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <?php $_from = $this->_var['spec_attr']['leftBannerSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['leftAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['leftAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['rightAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  

                                    <?php $_from = $this->_var['spec_attr']['rightAdvTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvTitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSubtitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSubtitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div ectype="leftBanner">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>   
                        </div>
                        <div class="floormodeItem<?php if ($this->_var['mode'] == 'homeFloorModule'): ?> floormodeModuleItem<?php endif; ?><?php if ($this->_var['spec_attr']['floorMode'] == 2): ?> selected<?php endif; ?>" ectype="floormodeItem">
                        	<div class="img"><img src="images/visual/<?php echo $this->_var['mode']; ?>_02.jpg"></div>
                            <div class="checkbox_item">
                            	<input type="radio" name="floorMode" value="2" data-pattern="<?php echo $this->_var['floor_style']['1']; ?>" class="ui-radio" id="floorMode_2"<?php if ($this->_var['spec_attr']['floorMode'] == 2): ?> checked<?php endif; ?> />
                            	<label class="ui-radio-label" for="floorMode_2">楼层广告模板二</label>
                            </div>
                            <div ectype="floorModehide" class="hide">
                                <?php if ($this->_var['spec_attr']['floorMode'] == 2): ?>
                                <div ectype="leftBanner">
                                    <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBanner[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php $_from = $this->_var['spec_attr']['leftBannerLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <?php $_from = $this->_var['spec_attr']['leftBannerSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['leftAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['leftAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['rightAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  

                                    <?php $_from = $this->_var['spec_attr']['rightAdvTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvTitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSubtitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSubtitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div ectype="leftBanner">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="floormodeItem<?php if ($this->_var['mode'] == 'homeFloorModule'): ?> floormodeModuleItem<?php endif; ?><?php if ($this->_var['spec_attr']['floorMode'] == 3): ?> selected<?php endif; ?>" ectype="floormodeItem">
                        	<div class="img"><img src="images/visual/<?php echo $this->_var['mode']; ?>_03.jpg"></div>
                            <div class="checkbox_item">
                            	<input type="radio" name="floorMode" value="3" data-pattern="<?php echo $this->_var['floor_style']['2']; ?>" class="ui-radio" id="floorMode_3"<?php if ($this->_var['spec_attr']['floorMode'] == 3): ?> checked<?php endif; ?>/>
                            	<label class="ui-radio-label" for="floorMode_3">楼层广告模板三</label>
                            </div>
                            <div ectype="floorModehide" class="hide">
                                <?php if ($this->_var['spec_attr']['floorMode'] == 3): ?>
                                <div ectype="leftBanner">
                                    <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBanner[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php $_from = $this->_var['spec_attr']['leftBannerLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <?php $_from = $this->_var['spec_attr']['leftBannerSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['leftAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['leftAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['rightAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  

                                    <?php $_from = $this->_var['spec_attr']['rightAdvTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvTitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSubtitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSubtitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div ectype="leftBanner">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="floormodeItem<?php if ($this->_var['mode'] == 'homeFloorModule'): ?> floormodeModuleItem<?php endif; ?><?php if ($this->_var['spec_attr']['floorMode'] == 4): ?> selected<?php endif; ?> last" ectype="floormodeItem">
                        	<div class="img"><img src="images/visual/<?php echo $this->_var['mode']; ?>_04.jpg"></div>
                            <div class="checkbox_item">
                            	<input type="radio" name="floorMode" value="4" class="ui-radio" data-pattern="<?php echo $this->_var['floor_style']['3']; ?>" id="floorMode_4"<?php if ($this->_var['spec_attr']['floorMode'] == 4): ?> checked<?php endif; ?>/>
                            	<label class="ui-radio-label" for="floorMode_4">楼层广告模板四</label>
                            </div>
                            <div ectype="floorModehide" class="hide">
                                <?php if ($this->_var['spec_attr']['floorMode'] == 4): ?>
                                <div ectype="leftBanner">
                                    <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBanner[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php $_from = $this->_var['spec_attr']['leftBannerLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <?php $_from = $this->_var['spec_attr']['leftBannerSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['leftAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['leftAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['rightAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  

                                    <?php $_from = $this->_var['spec_attr']['rightAdvTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvTitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSubtitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSubtitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div ectype="leftBanner">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
						<?php if ($this->_var['mode'] == "homeFloorFive" || $this->_var['mode'] == "homeFloorSeven"): ?>
                        <div class="floormodeItem<?php if ($this->_var['spec_attr']['floorMode'] == 5): ?> selected<?php endif; ?>" ectype="floormodeItem">
                            <div class="img"><img src="images/visual/<?php echo $this->_var['mode']; ?>_05.jpg"></div>
                            <div class="checkbox_item">
                            	<input type="radio" name="floorMode" value="5" data-pattern="<?php echo $this->_var['floor_style']['4']; ?>" class="ui-radio" id="floorMode_5"<?php if ($this->_var['spec_attr']['floorMode'] == 5): ?> checked<?php endif; ?>/>
                            	<label class="ui-radio-label" for="floorMode_5">楼层广告模板五</label>
                            </div>
                            <div ectype="floorModehide" class="hide">
                                <?php if ($this->_var['spec_attr']['floorMode'] == 5): ?>
                                <div ectype="leftBanner">
                                    <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBanner[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php $_from = $this->_var['spec_attr']['leftBannerLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <?php $_from = $this->_var['spec_attr']['leftBannerSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftBannerSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['leftAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['leftAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="leftAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdv[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                    <?php $_from = $this->_var['spec_attr']['rightAdvLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvLink[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSort[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  

                                    <?php $_from = $this->_var['spec_attr']['rightAdvTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvTitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   

                                    <?php $_from = $this->_var['spec_attr']['rightAdvSubtitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                    <input name="rightAdvSubtitle[]" type="hidden" value="<?php echo $this->_var['item']; ?>">
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    <div ectype="advimg">
                                        <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                        <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div ectype="leftBanner">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="leftAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <div ectype="rightAdv">
                                    <div ectype="advimg">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
                <div class="control_item control_item_cent" ectype="floorMode">
                    <div class="control_text lh30"><span class="cor cor1"></span>轮播广告图：</div>
                    <div class="control_value lh30" ectype="imgControl">
                        <a href="javascript:void(0);" class="blue fl" ectype="uploadImage" data-uploadimagetype="home" data-title="轮播广告图"  data-number="<?php if ($this->_var['mode'] == 'homeFloorThree'): ?>5<?php else: ?>3<?php endif; ?>">选择上传图片</a>
                        <div class="imgup_icon" ectype="imgValue" data-name="leftBanner">
                            <?php $_from = $this->_var['spec_attr']['leftBanner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                            <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    </div>
                </div>
               	
                <div class="control_item control_item_cent" ectype="floorMode">
                    <div class="control_text lh30"><span class="cor cor2"></span>普通广告图：</div>
                    <div class="control_value lh30" ectype="imgControl">
                        <a href="javascript:void(0);" class="blue fl" ectype="uploadImage" data-uploadimagetype="home" data-title="普通广告图" data-number="2">选择上传图片</a>
                        <div class="imgup_icon" ectype="imgValue" data-name="leftAdv">
                            <?php $_from = $this->_var['spec_attr']['leftAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                            <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    </div>
                </div>
                
                <div class="control_item control_item_cent" ectype="floorMode">
                    <div class="control_text lh30"><span class="cor cor3"></span>标题广告图：</div>
                    <div class="control_value lh30" ectype="imgControl">
                        <a href="javascript:void(0);" class="blue fl" ectype="uploadImage" data-uploadimagetype="home" data-title="标题广告图" <?php if ($this->_var['mode'] != 'homeFloorFour' && $this->_var['mode'] != 'homeFloorSix'): ?>data-titleup="1"<?php endif; ?> data-number="<?php if ($this->_var['mode'] == 'homeFloor'): ?>5<?php elseif ($this->_var['mode'] == 'homeFloorFour' || $this->_var['mode'] == 'homeFloorFive'): ?>3<?php elseif ($this->_var['mode'] == 'homeFloorSix'): ?>2<?php elseif ($this->_var['mode'] == 'homeFloorSeven'): ?>1<?php else: ?>4<?php endif; ?>">选择上传图片</a>
                        <div class="imgup_icon" ectype="imgValue" data-name="rightAdv">
                            <?php $_from = $this->_var['spec_attr']['rightAdv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                            <?php if ($this->_var['item']): ?><a href="<?php echo $this->_var['item']; ?>" class="nyroModal" target="_blank"><i class="iconfont icon-image" onmouseover="toolTip('<img src=<?php echo $this->_var['item']; ?>>')" onmouseout="toolTip()"></i></a><?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    </div>
                </div>    
            </div>        
        </div>
        <div class="body_info" style="display:none;">
            <div class="control_item">
                <div class="checkobx-item">
                    <input type="checkbox" id="selected_brand" name="is_selected" class="ui-checkbox fl" onclick="selected_brands(this)">
                    <label class="ui-label" for="selected_brand">已选择品牌</label>
                </div>
            </div>
            <div class="brand_list mt10" ectype='brand_list' data-bandnumber="<?php if ($this->_var['mode'] == 'homeFloorModule'): ?>5<?php else: ?>10<?php endif; ?>">
            	<div class="notic">请先现在楼层一级分类或者该分类下暂无品牌</div>
            </div>
        </div>
    </div>
    <input type="hidden" name="mode" value="<?php echo $this->_var['mode']; ?>">
    <input name='brand_ids' type='hidden' value='<?php echo $this->_var['spec_attr']['brand_ids']; ?>'>
</form>
<script type="text/javascript">
    var mode = "<?php echo $this->_var['mode']; ?>";
    if(mode != 'homeFloorFive'){
        $(function(){
            var cat_id = $("input[name='Floorcat_id']").val();
            var brand_ids = $("input[name='brand_ids']").val();
            if(cat_id > 0){
                searchFloorBrand(cat_id,brand_ids);
            }
        })
    }
    
    function selected_brands(obj){
        var brand_ids = $("input[name='brand_ids']").val();
        var cat_id = $("input[name='Floorcat_id']").val();
        if(cat_id > 0){
            var is_selected =$("input[name='is_selected']").is(':checked');
            if(is_selected){
                is_selected = 1;
            }else{
                is_selected = 0;
            }
            searchFloorBrand(cat_id,brand_ids,is_selected);
        }
    }
    //select下拉默认值赋值
    $('.imitate_select').each(function(){
		var sel_this = $(this)
		var val = sel_this.children('input[type=hidden]').val();
		sel_this.find('a').each(function(){
			if($(this).attr('data-value') == val){
				sel_this.children('.cite').html($(this).html());
			}
		})
    });
	
    $.divselect("#cat_id","#cat_id_val",function(obj){
        var val = obj.attr("data-value");
        $("input[name='Floorcat_id']").val(val);
        getChildCat(val,1);
    });
	
    $.divselect("#cat_id1","#cat_id_val1",function(obj){
        var val = obj.attr("data-value");
        $("input[name='Floorcat_id']").val(val);
        getChildCat(val);
    });
	
    function getChildCat(cat_id,type){
        Ajax.call('get_ajax_content.php', 'act=getChildCat&cat_id=' + cat_id, function(result){
            if(type == 1){
                $(".cat_floor").html(result.content);
            }
            $("*[ectype='addCate']").parents(".item").find("ul").html(result.contentChild);
            $("*[ectype='addCate']").parents(".item").find(".cite").html("请选择..");
            $("*[ectype='addCate']").parents(".item").find("input[type='hidden']").val("");
            $("*[ectype='addCate']").parents(".item").siblings().remove();
			$("input[name='brand_ids']").val(""); //切换楼层一级分类时 清空已选择过的楼层品牌id
            if(mode != 'homeFloorFive'){
                searchFloorBrand(cat_id);
            }
        }, 'POST', 'JSON');
    }
	
	function searchFloorBrand(cat_id,brand_ids,is_selected){
		Ajax.call('get_ajax_content.php', 'is_ajax=1&act=filter_list&search_type=get_content&FloorBrand=1&cat_id=' + cat_id + "&brand_ids=" + brand_ids + "&is_selected=" + is_selected, function(result){
			$("*[ectype='brand_list']").html(result.FloorBrand);
		   
		   	$("ul.brand_list").hover(function(){
				$("ul.brand_list").perfectScrollbar("destroy");
				$("ul.brand_list").perfectScrollbar();
		   	});
		}, 'POST', 'JSON');
	}
		
	//楼层广告模板选择
	$.divselect("#fm-select","#floorMode",function(obj){
        var val = obj.attr("data-value");
		var nyroModal = obj.parents("*[ectype='iselect']").siblings(".nyroModal");
        
		for(var i = 1; i < 9; i++){
			if(val == i){
				nyroModal.attr("href","images/visual/homeFloor_0" + i + ".jpg");
				nyroModal.find("i").attr("onmouseover","toolTip('<img src=images/visual/homeFloor_0" + i + ".jpg>')");
			}
		}
    });
	
	//判断模板模式选中后图片选择
	$(document).on("click","*[ectype='floormodeItem']",function(){
		var val = $(this).find("input[type='radio']").val(),
			pattern = $(this).find("input[type='radio']").data("pattern"),
			arr = new Array(),
			imgNumberArr = <?php echo $this->_var['imgNumberArr']; ?>;
			
		$(this).addClass("selected").siblings().removeClass("selected");
		$(this).find("input[type='radio']").prop("checked",true);
		
		pattern = pattern.toString();
		
		if(pattern.indexOf(',') > 0){
			arr = pattern.split(',');
		}else{
			arr = pattern;
		}

		$("*[ectype='floorMode']").hide();
		
		for(var i = 0; i<arr.length;i++){
			$("*[ectype='floorMode']").eq((arr[i]-1)).show();
		}
		
		for(var i in imgNumberArr){
			if(i == val){
				$.each(imgNumberArr[i],function(index,value){
					$("[data-name='"+index+"']").siblings("*[ectype='uploadImage']").attr("data-number",value);
				});
			}
		}
		var _this = $(this);
		$("*[ectype='imgValue']").each(function(){
			var name = $(this).data("name");
			var imgHtml = _this.find("[ectype='" + name + "']").find("[ectype='advimg']").html();
			$(this).html(imgHtml);
		});
	});
	
	//默认编辑弹框时模板模式选中
	var radioVal = $("input[name='floorMode']:checked").val();
	$("#floorMode_"+ radioVal).click();
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'vipEdit'): ?>
<!--首页个人信息栏-->
<div class="control_list">
    <div class="control_item">
        <div class="control_text">热门文章：</div>
        <div class="control_value">
            <input type="text" value="<?php echo $this->_var['index_article_cat']; ?>" name="index_article_cat" class="text text_2" placeholder="选择文章分类id，使用英文逗号隔开" autocomplete="off" />
        </div>
    </div>
    <div class="control_item">
        <div class="control_text">快捷入口：</div>
        <div class="control_value">
            <div class="quick_items">
                <?php $_from = $this->_var['quick']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'quick');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['quick']):
?>
                <div class="item">
                    <div class="title">快捷入口<?php echo $this->_var['quick']['zh_cn']; ?></div>
                    <div class="content">
                        <div class="adv_item"><input type="text" class="text" value="<?php echo $this->_var['quick']['quick_name']; ?>" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" class="text" value="<?php echo $this->_var['quick']['quick_url']; ?>" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                        <div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                        	<div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="browse" value="browse" id="radio_<?php echo $this->_var['key']; ?>_browse" <?php if ($this->_var['quick']['style_icon'] == 'browse'): ?>checked<?php endif; ?> />
                                    <label for="radio_<?php echo $this->_var['key']; ?>_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="zan" value="zan" id="radio_<?php echo $this->_var['key']; ?>_zan" <?php if ($this->_var['quick']['style_icon'] == 'zan'): ?>checked<?php endif; ?>/>
                                    <label for="radio_<?php echo $this->_var['key']; ?>_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="order" value="order" id="radio_<?php echo $this->_var['key']; ?>_order" <?php if ($this->_var['quick']['style_icon'] == 'order'): ?>checked<?php endif; ?>/>
                                    <label for="radio_<?php echo $this->_var['key']; ?>_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="password" value="password" id="radio_<?php echo $this->_var['key']; ?>_password" <?php if ($this->_var['quick']['style_icon'] == 'password'): ?>checked<?php endif; ?>/>
                                    <label for="radio_<?php echo $this->_var['key']; ?>_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="share" value="share" id="radio_<?php echo $this->_var['key']; ?>_share" <?php if ($this->_var['quick']['style_icon'] == 'share'): ?>checked<?php endif; ?>/>
                                    <label for="radio_<?php echo $this->_var['key']; ?>_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_<?php echo $this->_var['key']; ?>" class="ui-radio" data-name="settled" value="settled" id="radio_<?php echo $this->_var['key']; ?>_settled" <?php if ($this->_var['quick']['style_icon'] == 'settled'): ?>checked<?php endif; ?>/>
                                    <label for="radio_<?php echo $this->_var['key']; ?>_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                                <input type="hidden" name="style_icon[]" value="<?php echo $this->_var['quick']['style_icon']; ?>">
                        </div>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="item">
                    <div class="title">快捷入口一</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                        	<div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="browse" value="browse" id="radio_1_browse" checked />
                                    <label for="radio_1_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="zan" value="zan" id="radio_1_zan" />
                                    <label for="radio_1_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="order" value="order" id="radio_1_order" />
                                    <label for="radio_1_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="password" value="password" id="radio_1_password" />
                                    <label for="radio_1_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="share" value="share" id="radio_1_share" />
                                    <label for="radio_1_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_1" class="ui-radio" data-name="settled" value="settled" id="radio_1_settled" />
                                    <label for="radio_1_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                                <input type="hidden" name="style_icon[]" value="browse">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">快捷入口二</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                            <div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="browse" value="browse" id="radio_2_browse"/>
                                    <label for="radio_2_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="zan" value="zan" id="radio_2_zan" checked />
                                    <label for="radio_2_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="order" value="order" id="radio_2_order" />
                                    <label for="radio_2_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="password" value="password" id="radio_2_password" />
                                    <label for="radio_2_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="share" value="share" id="radio_2_share" />
                                    <label for="radio_2_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_2" class="ui-radio" data-name="settled" value="settled" id="radio_2_settled" />
                                    <label for="radio_2_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                                <input type="hidden" name="style_icon[]" value="zan">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">快捷入口三</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                            <div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="browse" value="browse" id="radio_3_browse" />
                                    <label for="radio_3_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="zan" value="zan" id="radio_3_zan" />
                                    <label for="radio_3_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="order" value="order" id="radio_3_order" checked />
                                    <label for="radio_3_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="password" value="password" id="radio_3_password" />
                                    <label for="radio_3_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="share" value="share" id="radio_3_share" />
                                    <label for="radio_3_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_3" class="ui-radio" data-name="settled" value="settled" id="radio_3_settled" />
                                    <label for="radio_3_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                            <input type="hidden" name="style_icon[]" value="order">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">快捷入口四</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                            <div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="browse" value="browse" id="radio_4_browse" />
                                    <label for="radio_4_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="zan" value="zan" id="radio_4_zan" />
                                    <label for="radio_4_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="order" value="order" id="radio_4_order" />
                                    <label for="radio_4_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="password" value="password" id="radio_4_password" checked />
                                    <label for="radio_4_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="share" value="share" id="radio_4_share" />
                                    <label for="radio_4_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_4" class="ui-radio" data-name="settled" value="settled" id="radio_4_settled" />
                                    <label for="radio_4_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                            <input type="hidden" name="style_icon[]" value="password">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">快捷入口五</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                            <div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="browse" value="browse" id="radio_5_browse" />
                                    <label for="radio_5_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="zan" value="zan" id="radio_5_zan" />
                                    <label for="radio_5_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="order" value="order" id="radio_5_order" />
                                    <label for="radio_5_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="password" value="password" id="radio_5_password" />
                                    <label for="radio_5_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="share" value="share" id="radio_5_share" checked />
                                    <label for="radio_5_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_5" class="ui-radio" data-name="settled" value="settled" id="radio_5_settled" />
                                    <label for="radio_5_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                            <input type="hidden" name="style_icon[]" value="share">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">快捷入口六</div>
                    <div class="content">
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_name[]" placeholder="快捷入口名称" autocomplete="off" /></div>
                        <div class="adv_item"><input type="text" value="" class="text" name="quick_url[]" placeholder="快捷入口链接" autocomplete="off" ></div>
                        <a href="javascript:void(0);" class="blue" ectype="quickIcon">选择图标</a>
                    	<div class="iconItems" ectype="iconItems">
                        	<i class="trian_icon"></i>
                            <div class="iconItems-warp">
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="browse" value="browse" id="radio_6_browse" />
                                    <label for="radio_6_browse" class="ui-radio-label"><i class="iconfont icon-browse"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="zan" value="zan" id="radio_6_zan" />
                                    <label for="radio_6_zan" class="ui-radio-label"><i class="iconfont icon-zan-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="order" value="order" id="radio_6_order" />
                                    <label for="radio_6_order" class="ui-radio-label"><i class="iconfont icon-order"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="password" value="password" id="radio_6_password" />
                                    <label for="radio_6_password" class="ui-radio-label"><i class="iconfont icon-password-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="share" value="share" id="radio_6_share" />
                                    <label for="radio_6_share" class="ui-radio-label"><i class="iconfont icon-share-alt"></i></label>
                                </div>
                                <div class="iconItem">
                                    <input type="radio" name="style_icon_6" class="ui-radio" data-name="settled" value="settled" id="radio_6_settled" checked />
                                    <label for="radio_6_settled" class="ui-radio-label"><i class="iconfont icon-settled"></i></label>
                                </div>
                            </div>
                            <input type="hidden" name="style_icon[]" value="settled">
                        </div>
                    </div>
                </div>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'nav_mode'): ?>
<div class="tishi">
	<p class="first">注意：1、弹出框鼠标移到头部可以拖动，以防笔记本小屏幕内容展示不全;&nbsp;&nbsp;&nbsp;&nbsp;2、切换是否显示，点击对应的小图标即可完成切换</p>
</div>
<div class="tab">
	<ul class="clearfix">
    	<li class="current">内容设置</li>
    </ul>
</div>
<div class="modal-body">
	<div class="body_info">
    	<div class="ov_list ps_table">
            <form action="" id="navInsert" method="post"  enctype="multipart/form-data"  runat="server" >
                <table class="table" data-table="navtable">
                    <thead>
                        <tr>
                            <th width="25%">分类名称</th>
                            <th width="24%">链接地址</th>
                            <th width="10%" class="center">排序</th>
                            <?php if ($this->_var['topic_type'] != 1): ?>
                            <th width="12%" class="center">是否显示</th>
                            <th width="14%" class="center">是否新窗口</th>
                            <?php endif; ?>
                            <th width="20%" class="center">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_var['navigator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'navigator');if (count($_from)):
    foreach ($_from AS $this->_var['navigator']):
?>
                        <tr>
                            <td><input type="text" <?php if ($this->_var['topic_type'] != 1): ?>onchange = "edit_nav(this.value ,'<?php echo $this->_var['navigator']['id']; ?>','edit_navname_home')"<?php else: ?> name='navname[]'<?php endif; ?> value="<?php echo $this->_var['navigator']['name']; ?>"></td>
                            <td><input type="text" <?php if ($this->_var['topic_type'] != 1): ?>onchange = "edit_nav(this.value ,'<?php echo $this->_var['navigator']['id']; ?>','edit_navurl_home')"<?php else: ?> name='navurl[]'<?php endif; ?> value="<?php echo $this->_var['navigator']['url']; ?>"></td>
                            <td class="center"><input type="text" <?php if ($this->_var['topic_type'] != 1): ?>onchange = "edit_nav(this.value ,'<?php echo $this->_var['navigator']['id']; ?>','edit_navvieworder_home')"<?php else: ?> name='navvieworder[]'<?php endif; ?> class="small" value="<?php echo $this->_var['navigator']['vieworder']; ?>"></td>
                            <?php if ($this->_var['topic_type'] != 1): ?>
                            <td class="center" id="ifshow_<?php echo $this->_var['navigator']['id']; ?>"><img onclick = "edit_nav('<?php echo $this->_var['navigator']['ifshow']; ?>' ,'<?php echo $this->_var['navigator']['id']; ?>','edit_ifshow_home','ifshow')" src="<?php if ($this->_var['navigator']['ifshow'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>"/></td>
                            <td class="center" id="opennew_<?php echo $this->_var['navigator']['id']; ?>"><img onclick = "edit_nav('<?php echo $this->_var['navigator']['opennew']; ?>' ,'<?php echo $this->_var['navigator']['id']; ?>','edit_ifshow_home','opennew')" src="<?php if ($this->_var['navigator']['opennew'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>"/></td>
                            <?php endif; ?>
                            <td class="center"><a href="javascript:void(0);" <?php if ($this->_var['topic_type'] == 1): ?>onclick="remove_topicnav(this)"<?php else: ?>onclick="remove_nav('<?php echo $this->_var['navigator']['id']; ?>')"<?php endif; ?> class="pic_del del">删除</a></td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr class="notic">
                            <td colspan="4">当前没有自定义商品分类，点击下面添加新分类添加</td>
                        </tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
                <input type="hidden" name="mode" value="<?php echo $this->_var['temp']; ?>" />
            </form>
        </div>
        <div class="addCatagory">
            <input type="text" name="custom_catagory" class="text" />
            <a href="javascript:void(0);" class="btn">添加新分类</a>
        </div>
    </div>

</div>
<script type="text/javascript">
	var navColor = $(".navColor").val();
	$(".navColor").spectrum({
		showInitial: true,
		showPalette: true,
		showSelectionPalette: true,
		showInput: true,
		color: navColor,
		showSelectionPalette: true,
		maxPaletteSize: 10,
		preferredFormat: "hex",
		palette: [
			["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
			"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
			["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
			"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
			["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
			"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
			"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
			"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
			"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
			"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
			"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
			"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
			"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
			"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
		]
	});
        function remove_topicnav(obj){
            $(obj).parents('tr').remove();
        }
	$(".sp-choose").click(function(){
		var val = $(this).parents(".sp-picker-container").find(".sp-input").val();
		$(".navColor").val(val);
	});
	function edit_nav(val,id,act,type){
		if(id > 0){
			if(type){
				Ajax.call('get_ajax_content.php?is_ajax=1&act='+act, "val=" +encodeURIComponent(val) + "&id=" + id + "&attr=" + type, edit_ifshowResponse, 'POST', 'JSON');
			}else{
				Ajax.call('get_ajax_content.php?is_ajax=1&act='+act, "val=" +encodeURIComponent(val) + "&id=" + id , edit_navnameResponse, 'POST', 'JSON');
			}
		}else{
			alert("导航不存在");
		}
	}

	function edit_navnameResponse(data){
		if(data.error == 0){
			alert(data.content);
		}
	}
	function edit_ifshowResponse(data){
		var obj = $("#"+data.type + "_" + data.id);
		if(data.error == 0){
			alert(data.content);
		}else{
			if(data.content == 0){
				obj.html(data.content)
			}else{
				obj.html(data.content)
			}
		}
	}
	function remove_nav(id){
		if(id > 0){
			Ajax.call('get_ajax_content.php?is_ajax=1&act=remove_nav_home', "id=" + id , remove_navResponse, 'POST', 'JSON');
		}else{
			alert("导航不存在");
		}
	}

	function remove_navResponse(data){
		if(data.error == 0){
			alert(data.content);
		}
	}
	$(".body_info").on("click",".addCatagory .btn",function(){
		var tbody = $(this).parents(".body_info").find("tbody");
        var topic_type = "<?php echo $this->_var['topic_type']; ?>";
		var nav_name = '';

		if(tbody.find(".notic").length>0){
			tbody.find(".notic").remove();
		}
		nav_name = $("input[name='custom_catagory']").val();
                if(topic_type == 1){
                    var html = '';
                    if(nav_name){
                        html += '<tr><td><input type="text" value="' +nav_name+ '" name="navname[]"></td>';
                        html += '<td><input type="text" value="" name="navurl[]"></td>';
                        html += '<td class="center"><input type="text" class="small" value="" name="navvieworder[]"></td>';
                        html += '<td class="center"><a href="javascript:void(0);" onclick="remove_topicnav(this)" class="pic_del del">删除</a></td></tr>';
                        tbody.append(html)
                    }else{
                        alert("分类名称不能为空");
                    }
                }else{
                    Ajax.call('get_ajax_content.php?is_ajax=1&act=add_nav_home',  "&nav_name=" + nav_name  , function(data){
                            if(data.error == 0){
                                    alert(data.content);
                            }else{
                                    tbody.append(data.content)
                            }
                    }, 'POST', 'JSON');
                }
	});
</script>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'h-promo' || $this->_var['temp'] == 'h-sepmodule'): ?>
<form action="" id="<?php echo $this->_var['temp']; ?>Insert" method="post"  enctype="multipart/form-data"  runat="server" >
    <div class="tab">
        <ul class="clearfix">
            <li class="current">内容设置</li>
            <li>显示设置</li>
        </ul>
    </div>
    <div class="modal-body">
        <div class="body_info floor_info">
        	<?php if ($this->_var['temp'] == 'h-sepmodule'): ?>
            <div class="sepItem">
                <div class="label">活动类型：</div>
                <div class="checkbox_items">
                    <div class="checkbox_item"> 
                        <input name="PromotionType" type="radio" class="ui-radio" value="snatch" ectype='PromotionType' id="PromotionType1"<?php if ($this->_var['spec_attr']['PromotionType'] == 'snatch' || ! $this->_var['spec_attr']['PromotionType']): ?> checked="checked"<?php endif; ?>>
                        <label for="PromotionType1" class="ui-radio-label">夺宝奇兵</label>
                    </div>
                    <div class="checkbox_item"> 
                        <input name="PromotionType" type="radio" class="ui-radio" value="auction" ectype='PromotionType' id="PromotionType2"<?php if ($this->_var['spec_attr']['PromotionType'] == 'auction'): ?> checked="checked"<?php endif; ?>>
                        <label for="PromotionType2" class="ui-radio-label">拍卖活动</label>
                    </div>
                    <div class="checkbox_item"> 
                        <input name="PromotionType" type="radio" class="ui-radio" value="group_buy" ectype='PromotionType' id="PromotionType3"<?php if ($this->_var['spec_attr']['PromotionType'] == 'group_buy'): ?> checked="checked"<?php endif; ?>>
                        <label for="PromotionType3" class="ui-radio-label">团购活动</label>
                    </div>
                    <div class="checkbox_item"> 
                        <input name="PromotionType" type="radio" class="ui-radio" value="exchange" ectype='PromotionType' id="PromotionType4"<?php if ($this->_var['spec_attr']['PromotionType'] == 'exchange'): ?> checked="checked"<?php endif; ?>>
                        <label for="PromotionType4" class="ui-radio-label">积分商城</label>
                    </div>
                    <div class="checkbox_item"> 
                        <input name="PromotionType" type="radio" class="ui-radio" value="presale" ectype='PromotionType' id="PromotionType5"<?php if ($this->_var['spec_attr']['PromotionType'] == 'presale'): ?> checked="checked"<?php endif; ?>>
                        <label for="PromotionType5" class="ui-radio-label">预售活动</label>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="search">
                <div class="select_box mr10">
                    <div class="categorySelect fl">
                        <div class="selection">
                            <input type="text" name="category_name" id="category_name" class="text w250 mr0 valid" value="<?php if ($this->_var['parent_category']): ?><?php echo $this->_var['parent_category']; ?><?php else: ?>顶级分类<?php endif; ?>" autocomplete="off" readonly data-filter="cat_name" />
                            <input type="hidden" name="cat_id" id="category_id" value="<?php echo empty($this->_var['cat_id']) ? '0' : $this->_var['cat_id']; ?>" data-filter="cat_id" />
                        </div>
                        <div class="select-container" style="display:none;">
                            <?php echo $this->fetch('library/filter_category.lbi'); ?>
                        </div>
                    </div>
                </div>
                <div class="search_con mr10"><input width="20" name="keyword_brand" type="text" id="keyword_brand" class="text text_6 mr0"></div>
                <a href="javascript:void(0);" class="btn fl" ectype="changedgoods">确定</a>
                <div class="checkobx-item">
                    <input type="checkbox" name="is_selected" id="is_selected" class="ui-checkbox" onclick="checkd_selected(this)"/>
                    <label class="ui-label" for="is_selected">已选择商品</label>
                </div>
            </div>
            <div class="table_list" ectype='goods_list'>
                <div class="gallery_album" data-act="changedpromotegoods" data-goods='1' data-inid="goods_list" data-url='dialog.php' data-where="type=1">
                    <ul class="ga-goods-ul" id="goods_list">
                        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['gl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gl']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['gl']['iteration']++;
?>
                        <li class="<?php if ($this->_var['goods']['is_selected'] == 1): ?>on<?php endif; ?>">
                            <div class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></div>
                            <div class="name"><?php echo $this->_var['goods']['goods_name']; ?></div>
                            <div class="price"><?php if ($this->_var['spec_attr']['PromotionType'] == 'exchange'): ?><?php echo $this->_var['goods']['exchange_integral']; ?><?php else: ?><?php if ($this->_var['goods']['promote_price'] != ''): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?><?php endif; ?></div>
                            <div class="choose">
                                <a href="javascript:void(0);" class="<?php if ($this->_var['goods']['is_selected'] == 1): ?> on<?php endif; ?>" onclick="selected_goods(this,'<?php echo $this->_var['goods']['goods_id']; ?>')">
                                   <i class="iconfont <?php if ($this->_var['goods']['is_selected'] == 1): ?>icon-gou<?php else: ?>icon-dsc-plus<?php endif; ?>"></i><?php if ($this->_var['goods']['is_selected'] == 1): ?>已选择<?php else: ?>选择<?php endif; ?>
                                </a>
                                <?php if ($this->_var['temp'] == 'h-sepmodule'): ?>
                                <div class="checkbox_item"> 
                                    <input name="recommend" type="radio" class="ui-radio" value="<?php echo $this->_var['goods']['goods_id']; ?>" id="recommend<?php echo $this->_var['goods']['goods_id']; ?>"<?php if ($this->_var['spec_attr']['recommend'] == $this->_var['goods']['goods_id']): ?> checked="checked"<?php endif; ?>>
                                    <label for="recommend<?php echo $this->_var['goods']['goods_id']; ?>" class="ui-radio-label-shou"><i class="iconfont icon-thumb"></i>主推</label>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; else: ?>
                        <li class="notic">请先搜索商品</li>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <div class="clear"></div>
                    <?php echo $this->fetch('library/lib_page.lbi'); ?>
                </div>
            </div>
        </div>
        <div class="body_info floor_info" style="display:none;">
            <div class="control_list">
                <div class="tit_head mb10">
                    <div class="control_item">
                        <div class="control_text"><em class="red">*</em>主推商品背景色：</div>
                        <div class="control_value">
                            <input type="text" name="navColor" class="navColor" value="<?php if ($this->_var['temp'] == 'h-promo'): ?><?php if ($this->_var['spec_attr']['navColor']): ?><?php echo $this->_var['spec_attr']['navColor']; ?><?php else: ?>#ed5f5f<?php endif; ?><?php elseif ($this->_var['temp'] == 'h-sepmodule'): ?><?php if ($this->_var['spec_attr']['navColor']): ?><?php echo $this->_var['spec_attr']['navColor']; ?><?php else: ?>#9893f4<?php endif; ?><?php endif; ?>">
                        </div>
                    </div>
                </div>
                <div class="tit_head mb10">
                     <div class="control_item">
                        <div class="control_text"><em class="red">*</em>主标题：</div>
                        <div class="control_value"><input name="title" type="text" class="text text2" size="25" value="<?php echo $this->_var['spec_attr']['title']; ?>" ectype="required" data-msg="请在显示设置填写主标题"></div>
                    </div>
                </div>
                <div class="tit_head mb10">
                     <div class="control_item">
                        <div class="control_text"><em class="red">*</em>次标题：</div>
                        <div class="control_value"><input name="subtitle" type="text" class="text text2" size="25" value="<?php echo $this->_var['spec_attr']['subtitle']; ?>" ectype="required" data-msg="请在显示设置填写次标题"></div>
                    </div>
                </div>
                <?php if ($this->_var['hierarchy'] != '2'): ?>
                <div class="tit_head mb10">
                    <div class="control_item">
                        <div class="control_text"><em class="red">*</em>模块名称：</div>
                        <div class="control_value"><input name="lift" type="text" class="text text2" size="25" value="<?php echo $this->_var['lift']; ?>" maxlength="2" placeholder="请填写电梯层标题" ectype="required" data-msg="请在显示设置填写电梯层标题"><div class="notic">模块名称是显示首页左侧浮动导航；只能2个中文字符，如：店铺</div></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>    
        </div>
        <input type="hidden" name="goods_ids" value="<?php echo $this->_var['spec_attr']['goods_ids']; ?>"/>
        <input type="hidden" name="hierarchy" value="<?php echo $this->_var['hierarchy']; ?>">
        <input type="hidden" name="mode" value="<?php echo $this->_var['temp']; ?>">
    </div>
</form>
<script language="JavaScript">
    $(function(){
        var PromotionType = "<?php echo $this->_var['spec_attr']['PromotionType']; ?>";
        if(!PromotionType){
            ajaxchangedgoods(1);
        }
    });
     
    function checkd_selected(obj){
		var obj = $(obj);
		var is_selected =$("input[name='is_selected']").is(':checked');
		var length = obj.parents(".floor_info").find(".table_list li.on").length;
		var type = 1;
        if(is_selected == true){
            $(".icon-gou").parents('li').show();
			$(".icon-dsc-plus").parents('li').hide();
			
			if(length < 6){
				$("*[ectype='goods_list']").perfectScrollbar("destroy");
			}
            type = 0;
        }else{
            $(".icon-gou,.icon-dsc-plus").parents('li').show();
			$("*[ectype='goods_list']").perfectScrollbar();
        }
        ajaxchangedgoods(type);
    }
    function ajaxchangedgoods(type){
        var temp = "<?php echo $this->_var['temp']; ?>";
        var where = '';
        if(temp == 'h-sepmodule'){
            var PromotionType = $("input[name='PromotionType']:checked").val();
            var recommend = $("input[name='recommend']:checked").val();
            where = "&PromotionType="+PromotionType + "&recommend=" + recommend;
        }
        var cat_id = $("input[name='cat_id']").val();
        var keyword = $("input[name='keyword_brand']").val();
        var goods_ids = $("input[name='goods_ids']").val();
		
		$("[ectype='goods_list']").html("<i class='icon-spin'><img src='images/visual/load.gif' width='30' height='30'></i>");
       
	    function ajax(){
			Ajax.call('dialog.php?is_ajax=1&act=changedpromotegoods', "cat_id="+cat_id+"&keyword="+keyword+"&goods_ids="+goods_ids+"&type="+type+where, function(data){
				$("[ectype='goods_list']").html(data.content);
				
				$("*[ectype='goods_list']").perfectScrollbar("destroy");
				$("*[ectype='goods_list']").perfectScrollbar();
			} , 'POST', 'JSON');
		}
		
		setTimeout(function(){ajax()},300);
    }

	//选中商品
	function selected_goods(obj,goods_id){
		var obj = $(obj);
		var arr = '';
		var goods_ids = $("input[name='goods_ids']").val();
                var mode = "<?php echo $this->_var['temp']; ?>";
                var verinumber = true;
		if(obj.hasClass("on")){
			obj.removeClass("on");
			obj.html('<i class="iconfont icon-dsc-plus"></i>选择');
			arr = goods_ids.split(',');
			for(var i =0;i<arr.length;i++){
				if(arr[i] == goods_id){
					 arr.splice(i,1);
				}
			}
		}else{
                    if(mode == 'h-sepmodule'){
                        arr = goods_ids.split(',');
                        if(arr.length >= 5){
                            alert("此模块只能添加5个商品");
                            verinumber = false;
                        }
                    }
                    if(verinumber){
                        $(obj).addClass('on');
			$(obj).html('<i class="iconfont icon-gou"></i>已选择');
			if(goods_ids){
					arr = goods_ids + ','+goods_id;
			}else{
					arr = goods_id;
			}
                    }
			
		}
                if(verinumber){
                    $("input[name='goods_ids']").val(arr);
                }
	}
	
	$("input[name='is_title']").on("click",function(){
		var val = $(this).val();
		if(val == 1){
			$(this).parents(".control_list").find(".tit_head").show();
		}else{
			$(this).parents(".control_list").find(".tit_head").hide();
		}
	});
    var navColor = $(".navColor").val();
	$(".navColor").spectrum({
		showInitial: true,
		showPalette: true,
		showSelectionPalette: true,
		showInput: true,
		color: navColor,
		showSelectionPalette: true,
		maxPaletteSize: 10,
		preferredFormat: "hex",
		palette: [
			["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
			"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
			["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
			"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
			["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
			"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
			"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
			"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
			"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
			"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
			"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
			"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
			"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
			"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
		]
	});
	$(".sp-choose").click(function(){
		var val = $(this).parents(".sp-picker-container").find(".sp-input").val();
		$(".navColor").val(val);
	});
</script>
<?php endif; ?>

<script type="text/javascript">
	pbct();

	$(".table_list,.ps_table").perfectScrollbar("destroy");
	$(".table_list,.ps_table").perfectScrollbar();
	
	$(".select-container").hover(function(){
		$(".select-list").perfectScrollbar("destroy");
		$(".select-list").perfectScrollbar();
	});	
	
	$(document).click(function(e){
		//仿select
		if(e.target.className !='cite' && !$(e.target).parents("div").is(".imitate_select")){
			$('.imitate_select ul').hide();
		}
		
		//分类
		if(e.target.id !='category_name' && !$(e.target).parents("div").is(".select-container")){
			$('.categorySelect .select-container').hide();
		}
	});
</script>

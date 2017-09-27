<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">权限-<?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>该页面展示了所有入驻平台的管理员列表。</li>
                    <li>可手动添加管理员并分配权限、查看日志等操作。</li>
                    <li class="li_color">注意：商家权限，已移至商城->商家列表</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--商品分类列表-->
                <div class="common-head">
                    <?php if ($this->_var['action_link']): ?>
                    <div class="fl">
                    	<a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="add" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon-plus"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
                    </div>
                    <?php endif; ?>
                    <div class="refresh<?php if (! $this->_var['action_link']): ?> ml0<?php endif; ?>">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
                    <form action="javascript:searchList()" name="searchForm">
                        <div class="search">
                            <div class="input">
                                <input type="text" name="keywords" class="text nofocus" placeholder="用户名" autocomplete="off" /><input type="submit" value="" class="not_btn" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv">
                        <?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                   <th width="16%"><div class="tDiv"><?php echo $this->_var['lang']['user_name']; ?></div></th>
                                   <th width="18%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                   <th width="18%"><div class="tDiv"><?php echo $this->_var['lang']['email']; ?></div></th>
                                   <th width="12%"><div class="tDiv"><?php echo $this->_var['lang']['join_time']; ?></div></th>
                                   <th width="12%"><div class="tDiv"><?php echo $this->_var['lang']['last_time']; ?></div></th>
                                   <th width="22%"><div class="handle"><?php echo $this->_var['lang']['handler']; ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $_from = $this->_var['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                            	<tr>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['user_name']; ?></div></td>
                                    <td><div class="tDiv"><?php if ($this->_var['list']['ru_id']): ?><font class="red"><?php echo $this->_var['list']['ru_name']; ?></font><?php else: ?><font class="blue3"><?php if ($this->_var['list']['agency_id']): ?><a href="agency.php?act=edit&id=<?php echo $this->_var['list']['agency_id']; ?>"><?php echo $this->_var['list']['agency']['agency_name']; ?></a><?php else: ?>商城管理员<?php endif; ?></font><?php endif; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['email']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['add_time']; ?></div></td>
                                    <td><div class="tDiv"><?php echo empty($this->_var['list']['last_login']) ? 'N/A' : $this->_var['list']['last_login']; ?></div></td>
                                    <td class="handle">
                                        <div class="tDiv a4">
                                            <a href="privilege.php?act=allot&id=<?php echo $this->_var['list']['user_id']; ?>&user=<?php echo $this->_var['list']['user_name']; ?>" title="<?php echo $this->_var['lang']['allot_priv']; ?>" class="btn_region"><i class="icon icon-cog"></i><?php echo $this->_var['lang']['allot_priv']; ?></a>
                                            <a href="admin_logs.php?act=list&id=<?php echo $this->_var['list']['user_id']; ?>" title="<?php echo $this->_var['lang']['view_log']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view_log']; ?></a>
                                            <a href="privilege.php?act=edit&id=<?php echo $this->_var['list']['user_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                            <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['user_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
                                    <td colspan="12">
                                    	<div class="list-page">
                                            <?php echo $this->fetch('library/page.lbi'); ?>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <?php if ($this->_var['full_page']): ?>
                    </div>
                </div>
                <!--商品分类列表end-->
            </div>
            <div class="gj_search hide">
                <div id="searchBarOpen" class="search-gao-list">
                    <i class="icon icon-zoom-in"></i>高级搜索
                </div>
                <div class="search-gao-bar">
                    <div id="searchBarClose" class="handle-btn"><i class="icon icon-zoom-out"></i>收起边栏</div>
                    <div class="title"><h3>高级搜索</h3></div>
                    <form  name="formSearch_senior"  method="get" action="javascript:searchList()">
                        <div class="searchContent">
                            <div class="layout-box">
                                <dl>
                                    <dt>用户名</dt>
                                    <dd><input type="text" class="s-input-txt" name="keywords" value="" autocomplete="off" /></dd>
                                </dl>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['steps_shop_name']; ?></dt>
                                    <dd>
                                        <div id="shop_name_select" class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['s_shop_name']; ?></a></li>
                                               <li><a href="javascript:;" data-value="2"><?php echo $this->_var['lang']['s_qw_shop_name']; ?></a></li>
                                               <li><a href="javascript:;" data-value="3"><?php echo $this->_var['lang']['s_brand_type']; ?></a></li>
                                            </ul>
                                            <input name="store_search" type="hidden" value="0" id="shop_name_val">
                                        </div>
                                    </dd>
                                </dl>
                                <dl style="display:none" id="merchant_box">
                                    <dd>
                                        <div class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['store']['ru_id']; ?>"><?php echo $this->_var['store']['store_name']; ?></a></li>
                                               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                            <input name="merchant_id" type="hidden" value="0" >
                                        </div>
                                    </dd>
                                </dl>
                                <dl id="store_keyword" style="display:none" >
                                    <dd><input type="text" value="" name="store_keyword" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <dl style="display:none" id="store_type">
                                    <dd>
                                        <div class="select_w145 imitate_select">
                                            <div class="cite">请选择</div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['steps_shop_type']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['flagship_store']; ?>"><?php echo $this->_var['lang']['flagship_store']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['exclusive_shop']; ?>"><?php echo $this->_var['lang']['exclusive_shop']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['franchised_store']; ?>"><?php echo $this->_var['lang']['franchised_store']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['shop_store']; ?>"><?php echo $this->_var['lang']['shop_store']; ?></a></li>
                                            </ul>
                                            <input name="store_type" type="hidden" value="0" >
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="bot_btn">
                            <input type="submit" value="提交查询" name="tj_search" class="btn red_btn"><input type="reset" value="重置" name="reset" class="btn btn_reset">
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
<script type="text/javascript">

listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';

<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   
$(".ps-container").perfectScrollbar();

$.divselect("#shop_name_select","#shop_name_val",function(obj){
    var val = obj.attr("data-value");
    get_store_search(val);
});
function get_store_search(val){
        if(val == 1){
                $("#merchant_box").css("display",'');
                $("#store_keyword").css("display",'none');
                $("#store_type").css("display",'none')
        }else if(val == 2){
                $("#merchant_box").css("display",'none');
                $("#store_keyword").css("display",'');
                $("#store_type").css("display",'none')
        }else if(val == 3){
                $("#merchant_box").css("display",'none');
                $("#store_keyword").css("display",'');
                $("#store_type").css("display",'')
        }else{
                 $("#merchant_box").css("display",'none');
                $("#store_keyword").css("display",'none');
                $("#store_type").css("display",'none')
        }
}

  function searchList()
  {
    var frm = $("form[name='formSearch_senior']");
    <?php if ($this->_var['seller']): ?>
    listTable.filter['store_search'] = Utils.trim(frm.find("input[name='store_search']").val());
    listTable.filter['merchant_id'] = Utils.trim(frm.find("input[name='merchant_id']").val());
    listTable.filter['store_keyword'] = Utils.trim(frm.find("input[name='store_keyword']").val());
    listTable.filter['store_type'] = Utils.trim(frm.find("input[name='store_type']").val());
    <?php endif; ?>
		
    listTable.filter['keywords'] = Utils.trim(($("form[name='searchForm']").find("input[name='keywords']").val() != '') ? $("form[name='searchForm']").find("input[name='keywords']").val() :  frm.find("input[name='keywords']").val());
    listTable.filter['page'] = 1;
    listTable.loadList();
  }
$.gjSearch("-240px");  //高级搜索
</script>     
</body>
</html>
<?php endif; ?>

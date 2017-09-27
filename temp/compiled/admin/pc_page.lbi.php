
<div class="pageHome">
    <?php if ($this->_var['home'] == 'home'): ?>
	<div class="topBanner lyrow ui-draggable ui-box-display" data-purebox="banner" data-mode="topBanner" ectype="visualItme" data-diff="0" data-length="1" data-topBanner="1" data-homehtml='topBanner'>
        <div class="top-banner" style="background:#dbe0e4;">
            <div class="module w1200" data-type="range">
                <a href="#"><img width="1200" height="80" src="../data/gallery_album/visualDefault/homeIndex_011.jpg"></a>
                <i class="iconfont icon-cha" ectype="close"></i>
            </div>
        </div>
        <div class="setup_box" data-html="not">
            <div class="barbg"></div>
            <a href="javascript:void(0);" class="move-edit" ectype="model_edit"><i class="iconfont icon-edit1"></i>编辑</a>
            <a href="javascript:void(0);" class="move-remove" ectype="model_delete"><i class="iconfont icon-remove-alt"></i>删除</a>
        </div>
    </div>
    <?php endif; ?>
    <div class="site-nav">
        <div class="w w1200">
            <div class="fl">
                <div class="city-choice">
                    <div class="dsc-choie dsc-cm">
                        <i class="iconfont icon-map-marker"></i>
                        <span class="ui-areamini-text" data-id="1" title="上海">上海</span>
                    </div>
                </div>
                <div class="txt-info" id="ECS_MEMBERZONE">
                    <a href="#" class="link-login red">请登录</a>
                    <a href="#" class="link-regist">免费注册</a>
                </div>
            </div>
            <div class="quick-menu fr">
                <ul class="quick-menu fr">
                    <li><div class="dt"><a href="#">我的订单</a></div></li>
                    <li class="spacer"></li>
                    <li><div class="dt"><a href="#">我的浏览</a></div></li>
                    <li class="spacer"></li>
                    <li><div class="dt"><a href="#">我的收藏</a></div></li>
                    <li class="spacer"></li>
                    <li><div class="dt"><a href="#">客户服务</a></div></li>
                    <li class="spacer"></li>
                    <li class="li_dorpdown" data-ectype="dorpdown"><div class="dt dsc-cm">网站导航</div></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="w w1200">
            <div class="logo">
                <div class="logoImg"><a href="#"><img src="../themes/ecmoban_dsc2017/images/logo.gif"></a></div>
                <div class="logoAdv"><a href="#"><img src="../themes/ecmoban_dsc2017/images/ecsc-join.gif"></a></div>
            </div>
            <div class="dsc-search">
                <div class="form">
                    <input autocomplete="off"  name="keywords" type="text" id="keyword" value="手机" class="search-text">
                    <input type="hidden" name="store_search_cmt" value="0">
                    <button type="submit" class="button button-goods">搜商品</button>
                    <button type="submit" class="button button-store" >搜店铺</button>
                    <ul class="keyword">
                        <li><a href="#">周大福</a></li>
                        <li><a href="#">内衣</a></li>
                        <li><a href="#">Five Plus</a></li>
                        <li><a href="#">手机</a></li>
                    </ul>
                </div>
            </div>
            <div class="shopCart">
                <div class="shopCart-con dsc-cm">
                    <a href="#">
                        <i class="iconfont icon-carts"></i>
                        <span>我的购物车</span>
                        <em class="count cart_num">0</em>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>   
<div class="nav lyrow ui-draggable ui-box-display" data-mode="nav_mode" data-purebox="nav_mode">
	<div class="w w1200 nav_bg" ectype="nav" style="background-color:#fff;">
    	<div class="categorys"><div class="categorys-type"><a href="categoryall.php" target="_blank">全部商品分类</a></div></div>
        <div class="nav-main" id="nav">
        	<ul class="navitems" data-type="range">
            	<li><a href="index.php" class="curr">首页</a></li>
                <?php $_from = $this->_var['navigator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'navigator');if (count($_from)):
    foreach ($_from AS $this->_var['navigator']):
?>
                <li><a href="<?php echo $this->_var['navigator']['url']; ?>" style="text-align:<?php echo $this->_var['attr']['align']; ?>" <?php if ($this->_var['navigator']['opennew'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['navigator']['name']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
        <div class="setup_box" data-html="not">
            <div class="barbg"></div>
            <a href="javascript:void(0);" class="move-edit" ectype="model_edit"><i class="iconfont icon-edit1"></i>编辑</a>
        </div>
    </div>
</div>
<div class="prompt" data-html="not">以上为页头区域</div>
<div class="demo ui-sortable"></div>
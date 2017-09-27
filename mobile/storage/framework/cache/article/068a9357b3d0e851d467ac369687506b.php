<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <title><?php echo $page_title; ?></title>
    <?php echo global_assets('css');?>
    <script type="text/javascript">var ROOT_URL = '/mobile/';</script>
    <?php echo global_assets('js');?>
    <?php if($is_wechat) { ?>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script type="text/javascript">
        // 分享内容
        var shareContent = {
            title: '<?php echo ($share_data['title']); ?>',
            desc: '<?php echo ($share_data['desc']); ?>',
            link: '<?php echo ($share_data['link']); ?>',
            imgUrl: '<?php echo ($share_data['img']); ?>',
            success: function (res) {
                // 用户确认分享后执行的回调函数
                // res {"checkResult":{"onMenuShareTimeline":true},"errMsg":"onMenuShareTimeline:ok"}
                console.log(JSON.stringify(res));
                var msg = res.errMsg;
                var jsApiname = msg.replace(':ok','');
                shareCount(jsApiname,'<?php echo ($share_data['link']); ?>');
            }
        };

        // 分享统计
        function shareCount(jsApiname = '', link = ''){
            $.post('<?php echo url("wechat/jssdk/count");?>', {jsApiname: jsApiname, link:link}, function (res) {
                if(res.status == 200){
                    //
                }
            }, 'json');
        }

        $(function(){
            var url = window.location.href;
            var jsConfig = {
                debug: false,
                jsApiList: [
                    'onMenuShareTimeline',
                    'onMenuShareAppMessage',
                    'onMenuShareQQ',
                    'onMenuShareQZone'
                ]
            };
            $.post('<?php echo url("wechat/jssdk/index");?>', {url: url}, function (res) {
                if(res.status == 200){
                    jsConfig.appId = res.data.appId;
                    jsConfig.timestamp = res.data.timestamp;
                    jsConfig.nonceStr = res.data.nonceStr;
                    jsConfig.signature = res.data.signature;
                    // 配置注入
                    wx.config(jsConfig);
                    // 事件注入
                    wx.ready(function () {
                        wx.onMenuShareTimeline(shareContent);
                        wx.onMenuShareAppMessage(shareContent);
                        wx.onMenuShareQQ(shareContent);
                        wx.onMenuShareWeibo(shareContent);
                        wx.onMenuShareQZone(shareContent);
                    });
                }
            }, 'json');
        })
    </script>
    <?php } ?>
</head>
<body>
<p style="text-align:right; display:none;"><?php echo config('shop.stats_code');?></p>
<div id="loading"><img src="<?php echo elixir('img/loading.gif');?>" /></div>

<div class="con mb-7">
    <!--晒单列表-->
    <section class="com-nav article-list">
        <div class="art-tit-box padding-all">
            <h4 class="com-cont-box art-cont-box"><?php echo ($article['title']); ?></h4>
            <small>
                <time><?php echo ($article['amity_time']); ?></time>
                <span><?php echo ($article['author']); ?></span></small>
        </div>
        <div class=" dis-n-detail padding-all"><?php echo ($article['content']); ?></div>
        <div class="padding-all  b-color-f  m-top06 fx-deta-box">
            <ul class="dis-box com-list-1">
                <li class="box-flex">
                    <div class="yuan oncle-color-1" onclick="dianzan(<?php echo ($article['id']); ?>)">
                        <a href="javascript:;" id="red<?php echo ($article['id']); ?>" <?php if($islike) { ?> class="active" <?php } else { } ?>>
                        <i class="iconfont icon-zan icon-yuan1"></i>
                        <p id="like_num"><?php echo ($article['likenum']); ?></p>
                        <input id="like" type="hidden" name="id" value="<?php echo ($article['id']); ?>"/>
                        <input id="islike" type="hidden" id="<?php echo ($article['id']); ?>" name="islike" value="<?php echo $islike; ?>"/>
                        <input id="isclick" type="hidden" name="isclick" value="0"/>
                        </a>
                    </div>

                </li>
                <li class="box-flex j-show-div">
                    <div class="yuan oncle-color new-color">
                        <i class="iconfont icon-fenxiang"></i>
                        <p>分享</p>
                    </div>
                    <div class="com-icon">
                        <section class="j-show-div j-show-get-val padding-lr">
                            <!--充值方式弹出层-->
                            <div class="show-time-con ts-3 b-color-1 j-filter-show-div">
                                <section class="goods-show-title of-hidden padding-all b-color-f">
                                    <h3 class="fl g-c-title-h3">分享到：</h3>
                                    <i class="iconfont icon-guanbi2 show-div-guanbi fr"></i>
                                </section>
                                <section class="s-g-list-con swiper-scroll">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide select-two">
                                            <ul class="j-get-one padding-all ul-4 pt-1 is-over">
                                                <div class="bdsharebuttonbox" data-tag="share_1">
                                                    <!--<a class="bds_weixin" data-cmd="weixin"></a>-->
                                                    <a class="bds_sqq" data-cmd="sqq"></a>
                                                    <a class="bds_qzone" data-cmd="qzone" href="#"></a>
                                                    <a class="bds_tsina" data-cmd="tsina"></a>
                                                    <a class="bds_pyq user-shop-fx"></a>
                                                </div>
                                                <script>
                                                    window._bd_share_config = {
                                                        common: {
                                                            bdText: '<?php echo ($article['content_fx']); ?>',
                                                            bdDesc: '<?php echo ($article['title']); ?>',
                                                            bdUrl: window.location.href
                                                        },
                                                        share: [{
                                                            "bdSize": 16
                                                        }],
                                                        image: [{
                                                            viewType: 'list',
                                                            viewPos: 'top',
                                                            viewColor: 'black',
                                                            viewSize: '16',
                                                            viewList: ['qzone', 'tsina', 'huaban', 'tqq', 'renren']
                                                        }],
                                                        selectShare: [{
                                                            "bdselectMiniList": ['qzone', 'tqq', 'kaixin001', 'bdxc', 'tqf']
                                                        }]
                                                    }
                                                    with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion=' + ~(-new Date() / 36e5)];
                                                </script>
                                            </ul>
                                        </div>
                                        <div class="swiper-scrollbar"></div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>

                </li>
            </ul>
        </div>
    </section>
    <?php if($article['goods']) { ?>
    <section>
        <div class="dis-box padding-all my-bottom b-color-f my-nav-box m-top06">
            <h3 class="box-flex text-all-span my-u-title-size-1">关联商品</h3>
        </div>
        <?php $n=1;if(is_array($article['goods'])) foreach($article['goods'] as $vo) { ?>
        <ul class="dis-box b-color-f padding-all">
            <li class="write-add-img-box b-color-f">
                <div class="write-add-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo ($vo['goods_thumb']); ?>"></a></div>
            </li>
            <li class="box-flex gl-com">
                <p><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['goods_name']); ?></a></p>
            </li>
            <div class="my-dete-box">
                <span class="t-jiantou fr"></span>
            </div>
        </ul>
        <?php $n++;}unset($n); ?>
    </section>
    <?php } ?>
    <section>

        <!--评论列表-->
        <?php if($article['comment']) { ?>
        <div class="dis-box padding-all my-bottom b-color-f my-nav-box m-top06">
            <h3 class="box-flex text-all-span my-u-title-size-1">评论列表</h3>
        </div>
        <?php $n=1; if(is_array($article['comment'])) foreach($article['comment'] as $key => $cf) { ?>
        <ul class="padding-all b-color-f my-com-max-box">
            <li class="com-img-left">
                <div class="com-left-box"><img src="<?php echo ($cf['user']['user_picture']); ?>"></div>
            </li>
            <li class="com-con-right">
                <ul class="dis-box">
                    <li class="box-flex">
                        <div class="com-adm-box">
                            <h4 id="<?php echo ($cf['comment_id']); ?>"><?php echo ($cf['user_name']); ?></h4>
                            <p><?php echo ($cf['comment_time']); ?></p>
                        </div>
                    </li>
                    <li class="not">
                        <div class="com-data-right  com-list-1">
									<span class="oncle-color" onclick="comment2(<?php echo ($cf['comment_id']); ?>)"><span
                                        class="my-right1"><?php echo ($cf['add_time']); ?></span>
									</span>
                        </div>
                    </li>
                </ul>
                <p class="com-con-m"><?php echo ($cf['content']); ?></p>
                <?php $n=1; if(is_array($cf['child'])) foreach($cf['child'] as $ke => $cs) { ?>
                <?php if($ke <10) { ?>
                <div class="pl-hf-box padding-all">
                    <p><span><?php echo ($cs['user_name']); ?> : </span><?php echo ($cs['content']); ?></p>
                    <div class="x-jiant"></div>
                </div>
                <?php } ?>
                <?php $n++;}unset($n); ?>
                <!--评论回复-->
<!--                 <ul class="comments-reply-box b-color-f">
                    <li>
                        <span>我是回复用户:</span>我是回复用户
                   </li>
                </ul> -->
            </li>
        </ul>
 
        <?php $n++;}unset($n); ?>
        <?php } ?>
    </section>
    <section class="article-comments-btn  b-color-f">
        <a href="<?php echo url('article/index/comments','id'.'='.$article['id']);?>" class="f-05 col-4 text-c padding-all">查看更多</a>
    </section>
</div>
<section class="filter-btn consult-filter-btn">
    <div class="dis-box">
        <div class="box-flex text-all">
            <input class="j-input-text" type="text" name='comment' placeholder="快来发表下评论吧！~" value="">
        </div>
        <button type="button" class="btn-submit">发送</button>
    </div>
</section>
<input type="hidden" name="id" value="<?php echo ($article['id']); ?>"/>
<input type="hidden" name="cid" value=""/>
<div class="mask-filter-div"></div>
<div class="shopping-prompt ts-2">
    <img src="<?php echo elixir('img/fengxiang.png');?>"/>
</div>
<script>
    $(function(){
       // 获取节点
          var block = document.getElementById("ectouch-top");
          var oW,oH;
          // 绑定touchstart事件
          block.addEventListener("touchstart", function(e) {
           var touches = e.touches[0];
           //oW = touches.clientX - block.offsetLeft;
           oH = touches.clientY - block.offsetTop;
           //阻止页面的滑动默认事件
           document.addEventListener("touchmove",defaultEvent,false);
          },false)
         
          block.addEventListener("touchmove", function(e) {
           var touches = e.touches[0];
           //var oLeft = touches.clientX - oW;
           var oTop = touches.clientY - oH;
          //  if(oLeft < 0) {
          //   oLeft = 0;
          //  }else if(oLeft > document.documentElement.clientWidth - block.offsetWidth) {
          //   oLeft = (document.documentElement.clientWidth - block.offsetWidth);
          //  }
          // block.style.left = oLeft + "px";
           block.style.top = oTop + "px";
          var max_top = block.style.top =oTop;
          if(max_top < 30){
             block.style.top = 30 + "px";
          }
          if(max_top > 440){
            block.style.top = 440 + "px";
          }
          },false);
           
          block.addEventListener("touchend",function() {
           document.removeEventListener("touchmove",defaultEvent,false);
          },false);
          function defaultEvent(e) {
           e.preventDefault();
          }
    })
</script>
<nav class="commom-nav dis-box ts-5" id="ectouch-top">
        <div class="left-icon">
            <div class="nav-icon"><i class="iconfont icon-jiantou1"></i>快速导航</div>
            <div class="filter-top filter-top-index" id="scrollUp">
                <i class="iconfont icon-jiantou"></i>
                <span>顶部</span>
            </div>
        </div>
        <div class="right-cont box-flex">
            <ul class="nav-cont">
                <li>
                      <a href="<?php echo url('/');?>">
                        <i class="iconfont icon-home"></i>
                        <p>首页</p>
                      </a>  
                </li>
                <li>
                    <a href="<?php echo url('search/index/index');?>">
                         <i class="iconfont icon-sousuo"></i>
                         <p>搜索</p>
                    </a>  
                </li>
                <li>
                     <a href="<?php echo url('category/index/index');?>">
                         <i class="iconfont icon-caidan"></i>
                         <p>分类</p>
                     </a> 
                </li>
                <li>
                     <a href="<?php echo url('cart/index/index');?>">
                         <i class="iconfont icon-gouwuche"></i>
                         <p>购物车</p>
                      </a> 
                </li>
                <li>
                    <a href="<?php echo url('user/index/index');?>">
                         <i class="iconfont icon-geren"></i>
                         <p>个人中心</p>
                    </a> 
                </li>

<li>
    <a href="<?php echo url('article/index/index');?>">
        <i class="iconfont icon-wenda"></i>
        <p>文章频道</p>
    </a>
</li>
            </ul>
        </div>
    </nav>
    <div class="common-show"></div>
<script>
    //    function init() {
    //        clip = new ZeroClipboard.Client(); //初始化对象
    //        ZeroClipboard.setMoviePath("js/clipboard/ZeroClipboard.swf");设置flash
    //        clip.setHandCursor( true ); //设置手型
    //        clip.addEventListener('mouseDown', function (client) {  //创建监听
    //            copylink(); //设置需要复制的代码
    //        });
    //        clip.glue( 'd_clip_button'); //将flash覆盖至指定ID的DOM上
    //    }
    function copylink() {
        clip.setText(window.location.href);
    }
    $(function ($) {
        //分享弹框
        $(".goods-share-img").click(function () {
            $(".share-bg-box-y").addClass("display-current");
            $(".share-ts-title-y").addClass("display-current");
        });
        $(".share-bg-box-y").click(function () {
            $(".share-bg-box-y").removeClass("display-current");
            $(".share-ts-title-y").removeClass("display-current");
        });

    });
    $('.mb-7').click(function () {
        $(".j-input-text").attr('placeholder', '回复文章:');
        $("input[name='cid']").val('');
    })
    function comment2(cid) {
        c_id = cid;
        event.stopPropagation();
        cname = document.getElementById(cid).innerHTML;
        $(".j-input-text").attr('placeholder', '回复' + cname + ':');
        $("input[name='cid']").val(c_id);
    }

    $('.btn-submit').click(function () {
        $.ajax({
            type: "post",
            url: "<?php echo url('article/index/comment');?>",
            data: {
                content: $("input[name='comment']").val(),
                id: $("input[name='id']").val(),
                cid: $("input[name='cid']").val()
            },
            dataType: "json",
            success: function (data) {
                status(data);
            }
        });
        function status(json) {
            window.location.href = json;
        }

    });


    function dianzan(id) {
        if ($("#red" + id).hasClass("active")) {
            //$("#red" + id).removeClass("active");
        } else {
            $("#red" + id).addClass("active");
        }
        var islike = document.getElementById('islike').value;
        var id = document.getElementById('like').value;
        var isclick = document.getElementById('isclick').value;
        $("#isclick").val(new Date().getTime());
        if (isclick < (new Date().getTime() - 1000)) {
            $.ajax({
                type: "post",
                url: "<?php echo url('article/index/like');?>",
                data: {id: id, islike: islike},
                dataType: "json",
                success: function (data) {
                    $("#like_num").html(data.like_num);
                    $("#islike").val(data.is_like);
                }
            });
        }


    }

    /*店铺信息商品滚动*/
    var swiper = new Swiper('.j-g-s-p-con', {
        scrollbarHide: true,
        slidesPerView: 'auto',
        centeredSlides: false,
        grabCursor: true
    });
</script>

</body>

</html>
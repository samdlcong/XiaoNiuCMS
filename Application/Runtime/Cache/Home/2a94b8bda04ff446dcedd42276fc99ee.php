<?php if (!defined('THINK_PATH')) exit(); $config =D("Basic")->select(); $navs = D('Menu')->getBarMenus(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
  <meta name="description" content="<?php echo ($config["description"]); ?>">
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/" <?php if($result['catid'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catid']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="banner">
          <div class="banner-left">
            <img src="/Public/images/banner.jpg" alt="">
          </div>
          <div class="banner-right">
            <ul>
              <li>
                <img src="/Public/images/img1.jpg" alt="">
              </li>
              <li>
                <img src="/Public/images/img2.jpg" alt="">
              </li>
              <li>
                <img src="/Public/images/img3.jpg" alt="">
              </li>
            </ul>
          </div>
        </div>
        <div class="news-list">
          <?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dt><a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["title"]); ?></a></dt>
            <dd class="news-img">
              <a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="" width="189px" height="189px"></a>
            </dd>
            <dd class="news-intro"><?php echo ($vo["description"]); ?>
            </dd>
            <dd class="news-info">
              <?php echo ($vo["keywords"]); ?> <span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span> 阅读(0)
            </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      <!--网站右侧信息-->
      <div class="col-sm-3 col-md-3">
  <div class="right-title">
    <h3>文章排行</h3>
    <span>TOP ARTICLES</span>
  </div>
  <div class="right-content">
    <ul>
      <li class="num1 curr">
        <a href="">习近平谈气候变化</a>
        <div class="intro">
          中美双方应该不断挖掘合作潜力、培育合作亮点，加快双边投资协定谈判...
        </div>
      </li>
      <li class="num2"><a href="">普京回应俄战机被击落</a></li>
      <li class="num3"><a href="">普京回应俄战机被击落</a</li>
      <li class="num4"><a href="">普京回应俄战机被击落</a></li>
      <li class="num5"><a href="">普京回应俄战机被击落</a></li>
      <li class="num6"><a href="">普京回应俄战机被击落</a></li>
      <li class="num7"><a href="">普京回应俄战机被击落</a></li>
      <li class="num8"><a href="">普京回应俄战机被击落</a></li>
      <li class="num9"><a href="">普京回应俄战机被击落</a></li>
      <li class="num10"><a href="">普京回应俄战机被击落</a></li>
    </ul>
  </div>
  <div class="right-hot">
    <img src="/Public/images/img5.jpg" alt="">
  </div>
  <div class="right-hot">
    <img src="/Public/images/img6.jpg" alt="">
  </div>
</div>
    </div>
  </div>
</section>
</body>
</html>
<style>
  /* header */
  header {
    position: fixed;
    top: 0;
    width: 100%;
    height: 75px;
    z-index: 500;
    transition: 0.2s;
    background: #fff;
    border-bottom: 1px solid #eee;
  }
  header .inner{
    height: 100%;
  }
  header .gnb_item a.active {
    color: var(--brandColor);
  }
  header.on .gnb_mo {
    top: 65px;
    display: block;
  }
  header .group_header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
  }
  header .group_header .logo_box {
    display: flex;
    align-items: center;
  }
  header .group_header .logo_box .link_logo {
    width: 100%;
    height: 100%;
    background-size: contain;
  }
  header .group_header .gnb_list {
    display: flex;
    align-items: center;
    justify-content: start;
    text-align: center;
    transition: 0.2s;
  }
  header .group_header #btn_form {
    height: 42px;
    padding: 0 20px;
    text-align: center;
    font-weight: 600;
    font-size: 16px;
    color: #fff;
    /* border: 1px solid #fff; */
    background: var(--costBtncolor);
    border-radius: 10px;
  }
  header .group_header .gnb_list .gnb_item {
    padding: 0 30px;
    font-weight: 600;
    font-size: 17px;
  }
  header .group_header .gnb_list .gnb_item a{
    position: relative;
    display: block;
    height: auto;
    color: #282828;
  }
  header .group_header .gnb_list .gnb_item a:hover{
    color: var(--brandColor);
  }
  header .group_header .menu_wrap {
    width: 25px;
    height: auto;
    display: none;
    z-index: 0;
  }
  header .group_header .menu_wrap.toggle-btn .btn_open {
    display: none;
  }
  header .group_header .menu_wrap.toggle-btn .btn_close {
    display: block;
  }
  header .group_header .menu_wrap .btn_close,
  header .group_header .menu_wrap .btn_open {
    position: relative;
    width: 100%;
    height: 100%;
  }
  header .group_header .menu_wrap .btn_close {
    display: none;
    width: 30px;
  }

  .gnb_mo {
    display: none;
  }


  @media (max-width: 1023px) {
    header .group_header .gnb_list .gnb_item{
      font-size: 17px;
    }
  }

  @media (max-width: 959px) {
    header .inner .group_header .menu_wrap {
      display: block;
    }
    header .inner .group_header .gnb_list {
      display: none;
    }
    header .group_header #btn_form{
      display: none;
    }
    .gnb_mo {
      position: absolute;
      top: -300px;
      left: 0;
      width: 100%;
      height: auto;
      padding: 20px 40px;
      background: #fff;
      border-bottom: 1px solid #eaeaea;
      transition: top 0.5s;
      z-index: -1;
    }
    .gnb_mo .gnb_list .gnb_item {
      width: 100%;
      padding: 25px 0;
      font-weight: 500;
      font-size: 21px;
      color: #555;
      cursor: pointer;
    }
    .gnb_mo .gnb_list .gnb_item:not(:last-child) {
      border-bottom: 1px solid #ddd;
    }
    .gnb_mo .gnb_list .gnb_item :hover {
      color: var(--brandColor);
    }
    .gnb_mo .gnb_list .gnb_item a {
      width: 100%;
    }
  }


  @media (max-width: 767px) {
    header .group_header .menu_wrap button span {
      width: 100%;
    }
    header .gnb_mo {
      padding: 30px 30px;
    }
  }

  @media (max-width: 586px) {
    header {
      height: 70px;
    }

    header .group_header .menu_wrap {
      width: 20px;
    }
    header .group_header .menu_wrap .btn_close {
      width: 20px;
    }
    header .gnb_mo{
      padding: 10px 30px;
    }
    header.on .gnb_mo {
      top: 58px;
    }
    header .group_header .menu_wrap .btn_close, header .group_header .menu_wrap .btn_open {
      width: 80%;
    }
    .gnb_mo .gnb_list .gnb_item{
      padding: 20px 0;
      font-size: 17px;
    }
    .gnb_mo.on {
      top: 65px;
    }
  }

  @media (max-width: 430px) {
    header .group_header .logo_box {
          width: 160px;
    }
  }

  @media (min-width: 768px) {
    header .group_header #btn_form:hover{
      background: #fff;
      border: 1px solid var(--brandColor);
      color: var(--brandColor);
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
  }
</style>

<div class="notscroll_bg"></div>
<header>
  <div class="inner">
    <div class="group_header">
      <h1 class="logo_box">
        <a href="./" class="link_logo"><img src="./images/logo.png" alt="라이프솔루션"></a>
      </h1>
      <ul class="gnb_list">
        <li class="gnb_item"><a href="./sub.php?menu=1"><?=$titles[0]?></a></li>
        <li class="gnb_item"><a href="./sub.php?menu=2"><?=$titles[1]?></a></li>
      </ul>
      <button id="btn_form">내 보험료 확인하기</button>

      <div class="menu_wrap">
        <button class="btn_open"><img src="./images/hamburger.svg" alt="메뉴"></button>
        <button class="btn_close"><img src="./images/close.svg" alt="닫기"></button>
      </div>
      
    </div>
  </div>

  <div class="gnb_mo">
    <ul class="gnb_list">
      <li class="gnb_item"><a href="./sub.php?menu=1"><?=$titles[0]?></a></li>
      <li class="gnb_item"><a href="./sub.php?menu=2"><?=$titles[1]?></a></li>
      <li class="gnb_item"><a href="./sub.php?menu=3"><?=$titles[2]?></a></li>
    </ul>
  </div>
</header>


<script>
  $('header .group_header a').click(function(){
    $('header .group_header a').removeClass('active');
    $(this).addClass('active');
  });

  $('header .menu_wrap').click(function(){
  if ($('header').hasClass('on')) {
    $('header').removeClass('on');
    $("body").removeClass('fixed');
    $('.notscroll_bg').fadeOut(0);
    $('.menu_wrap').removeClass('toggle-btn');
    
  } else {
    $('header').addClass('on');
    $("body").addClass('fixed');
    $('.notscroll_bg').fadeIn(0);
    $('.menu_wrap').addClass('toggle-btn');
  }
  });

  $(window).resize(function() {
    if ($(window).width() >= 780) {
        $('header').removeClass('on');
        $("body").removeClass('fixed');
        $('.notscroll_bg').fadeOut(0);
        $('.menu_wrap').removeClass('toggle-btn');
    }
  }).resize();

  $('.notscroll_bg').click(function() {
  $('header').removeClass('on');
  $("body").removeClass('fixed');
  $('.notscroll_bg').fadeOut(0);
  $('.menu_wrap').removeClass('toggle-btn');
  });

  $('#btn_form').on('click', function(event) {
      event.preventDefault(); // 기본 동작 방지
      var currentUrl = window.location.href;
      if (currentUrl.includes('sub')) {
        alert('정보를 입력해주세요.');
        $("#customer_name").focus();
      } else {
        window.location.href = "/naver1";
      }
  });

</script>

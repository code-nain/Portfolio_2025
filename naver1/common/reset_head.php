<?php include ("./common/sub_content.php"); ?>

<?php
	$cate = '실비';
	$logo_name = '라이프솔루션';
	$keyword = '실비보험비교사이트';
	
	// sub에 slide menu가 있을때 => title 변환
	if ($_GET['menu']) {
		$sub_title = ' - '.$sub[$sub_page]->title;
		$sub_description = ' '.$sub[$sub_page]->title.' 페이지 입니다.';
	}
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?=$keyword?> <?=$logo_name?><?=$sub_title?></title>
	<meta name="naver-site-verification" content="a3de3a13a6f312ace0d66fea76c530abf2bd9397" />
	<meta name="google-site-verification" content="fz0HsMKgHgPIIk4neudwsh6vBEvXGrlDatiAPheB6do" />
	<meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
	<meta name="description" content="실비보험비교사이트 보험료 계산 및 실비보험비교 가능한 라이프솔루션 입니다.">
	<meta name="author" content="<?=$keyword?> <?=$logo_name?>">
	<meta name="keywords" content="<?=$keyword?>, 보험료 계산, <?=$cate?>보험사이트, <?=$cate?>보험비갱신형, <?=$cate?>보험, <?=$cate?>보험추천, <?=$cate?>보험비교, 보험비교, 손해보험">
	<meta name="author" content="<?=$keyword?> <?=$logo_name?>">

	<meta name="robots" content="all" />
	<meta name="NaverBot" content="all" />
	<meta name="Yeti" content="all" />
	<meta name="googlebot" content="all" />

	<meta name="subject" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="title" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="publisher" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="Other Agent" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="location" content="South Korea" />
	<meta name="distribution" content="global" />
	<meta name="rating" content="general" />

	<meta name="twitter:site" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="twitter:title" content="<?=$keyword?> <?=$logo_name?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$keyword?> 보험료 계산, <?=$logo_name?> 입니다.<?=$sub_description?>" />
	<meta name="twitter:image" content="./images/thumb.png" />
	<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST']?>" />
	
	<meta itemprop="name" content="<?=$keyword?> <?=$logo_name?>" />
	<meta itemprop="description" content="<?=$keyword?> 보험료 계산, <?=$logo_name?> 입니다.<?=$sub_description?>" />
	<meta itemprop="image" content="./images/thumb.png" />

	<meta property="og:locale" content="ko_KR" />
	<meta property="og:site_name" content="<?=$keyword?> <?=$logo_name?>" />
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?=$keyword?> <?=$logo_name?>">
	<meta property="og:description" content="<?=$keyword?> 보험료 계산, <?=$logo_name?> 입니다.<?=$sub_description?>">
	<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST']?>">
	<meta property="og:image" content="./images/thumb.png">
	<meta property="og:locale" content="ko_KR" />
	<meta property="og:site_name" content="<?=$keyword?> <?=$logo_name?>" />

	
	<link rel="canonical" href="https://<?php echo $_SERVER['HTTP_HOST']?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
	<link rel="stylesheet" href="./css/link.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/json3@3.3.2/lib/json3.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</head>
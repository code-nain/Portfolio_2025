<!-- 필수 안내사항 -->
<style>
    .bottom_wrap {width: 100%; padding: 50px 0; background: #3d3d3d; color: #fff;}
    .bottom_wrap .inner {}
    .bottom_wrap h2 {font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;}
    .bottom_wrap h2:before {content:""; margin-right: 14px; height: 50%; border: 2px solid #ffd800;}
    .bottom_wrap ul {padding-left: 15px; line-height: 2rem; font-size: 1.1rem;}

    @media (max-width: 768px) {
        .bottom_wrap h2{
            font-size: 1.3rem;
        }
        .bottom_wrap ul {
            font-size: 1rem;
        }
    }

    @media (max-width: 620px) {
        .inner {
            width: calc(100% - 30px);
        }
        .bottom_wrap ul {
            font-size: 2.6vw;
            font-size: clamp(10px ,2.5vw, 16px);
            padding: 0;
        }
        .bottom_wrap ul {
            line-height: 1.8;
        }
    }
    @media (max-width: 620px) {
    }
    @media (max-width: 500px) {
        .bottom_wrap h2{
            font-size: 1.3rem;
        }
        /* .bottom_wrap ul {
            font-size: 0.9rem;
        } */
    }
</style>

<body>
    <div class="bottom_wrap">
        <div class="inner">
            <h2>필수 안내사항</h2>
            <ul>
                <li>※ 보험계약자가 기존 보험계약을 해지하고 새로운 보험계약을 체결하는 과정에서</li>
                <li>① 질병이력, 연령증가 등으로 가입이 거절되거나 보험료가 인상될 수 있습니다.</li>
                <li>② 가입 상품에 따라 새로운 면책기간 적용 및 보장 제한 등 기타 불이익이 발생할 수 있습니다.</li>
                <li>※ 보험 계약을 체결하기 전에는 상품 설명서 및 약관을 반드시 읽어보시기 바랍니다.</li>
                <li>※ 인스밸리 보험대리점 (대리점등록번호 : 2001048405)</li>
                <li>※ 본 광고는 광고심의기준을 준수하였으며, 유효기간은 심의일로부터 1년입니다.</li>
                <li>※ 인스밸리 준법감시필 제 2407-광고D-0005(2024.07.17~2025.07.16)</li>
            </ul>
        </div>
    </div>
</body>


<!-- footer -->
<style>
        footer {width: 100%; position: relative; z-index: 11; background: #282a29; padding: 10px 0; color : #999; padding: 30px 0; font-size: 0.9rem;}
        footer .inner {position: relative;  text-align: left;}
        footer ul li {padding: 10px 0; line-height: 1.2rem;}
        footer span {cursor: pointer; margin-left: 10px;}

        @media (max-width: 768px) {
        footer .inner {position: relative;  text-align: center;}
        }

</style>
<footer>
    <div class="inner">
    <ul>
        <li>광고대행사 : ㈜쇼엠은/는 페이지 제작 및 광고 대행만을 진행하며, 보험상품 판매에 직접적인 관여를 하지 않습니다.<br>동 상품광고는 관련 법령 및 내부통제기준에 따른 광고 관련 절차를 준수하여 작성되었음을 안내 드립니다.</li>
        <li>사업자등록번호 : 318-87-00348 | 담당자 : 남현석               </li>
        <li>Copyright (c) (주)쇼엠 All rights reserved.<a href="javascript:" class="privacy2" style="color: #999;">&nbsp;&nbsp;&nbsp;개인정보처리방침</a></li>
    </ul>
    </div>
</footer>

<?php 
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileAgents = array('Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone');
    $isMobile = false;
    foreach ($mobileAgents as $agent) {
        if (stripos($userAgent, $agent) !== false) {
        $isMobile = true;
        break;
        }
    }

    if ($isMobile) {
        include './common/privacy_modal_m.php';
        include './common/insu_cost_popup_m.php';
    } else {
        include './common/privacy_modal.php';
        include './common/insu_cost_popup.php';
    };
?>

  <script src="./js/main.js"></script>
  <script src="./js/form.js"></script>


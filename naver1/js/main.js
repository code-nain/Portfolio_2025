
// 버튼 누르면 하단 폼으로 이동
$('.link_form').click(function(event) {
	event.preventDefault();
	$("#customer_name").focus();
});


	// 보험브랜드 이미지 롤링
$(window).on('load', function() {
	setFlowBanner();
})

function setFlowBanner() {
	const $wrap = $('.rolling_area');
	const $list = $('.rolling_area .investor_list');
	let wrapWidth = ''; //$wrap의 가로 크기
	let listWidth = ''; //$list의 가로 크기
	const speed = 92; //1초에 몇픽셀 이동하는지 설정

	//리스트 복제
	let $clone = $list.clone();
	$wrap.append($clone);
	flowBannerAct()

	//반응형 :: 디바이스가 변경 될 때마다 배너 롤링 초기화
	let oldWChk = window.innerWidth > 1279 ? 'pc' : window.innerWidth > 767 ? 'ta' : 'mo';
	$(window).on('resize', function() {
		let newWChk = window.innerWidth > 1279 ? 'pc' : window.innerWidth > 767 ? 'ta' : 'mo';
		if (newWChk != oldWChk) {
			oldWChk = newWChk;
			flowBannerAct();
		}
	});

	//배너 실행 함수
	function flowBannerAct() {
		//배너 롤링 초기화
		if (wrapWidth != '') {
			$wrap.find('.investor_list').css({
				'animation': 'none'
			});
			$wrap.find('.investor_list').slice(2).remove();
		}
		wrapWidth = $wrap.width();
		listWidth = $list.width();

		//무한 반복을 위해 리스트를 복제 후 배너에 추가
		if (listWidth < wrapWidth) {
			const listCount = Math.ceil(wrapWidth * 2 / listWidth);
			for (let i = 2; i < listCount; i++) {
				$clone = $clone.clone();
				$wrap.append($clone);
			}
		}
		$wrap.find('.investor_list').css({
			'animation': `${listWidth / speed}s linear infinite flowRolling`
		});
	}
}


// 보험브랜드 이미지 롤링
// var swiper = new Swiper(".bohumSwiper", {
// 	slidesPerView: 3,
// 	spaceBetween: 30,
// 	loop: true,

// 	autoplay:{
// 		delay: 1500, // 시간 설정
// 		disableOnInteraction: false, // false-스와이프 후 자동 재생
// 	},

// 	breakpoints:{
// 		431: {
// 			slidesPerView: 3,
// 			spaceBetween: 40,
// 		},
// 		587 : {
// 			slidesPerView: 4,
// 			spaceBetween: 40,
// 		},
// 		850 : {
// 			slidesPerView: 5,
// 			spaceBetween: 40,
// 		},
// 		1000 : {
// 			slidesPerView: 6,
// 			spaceBetween: 40,
// 		},
// 		1200 : {
// 			slidesPerView: 7,
// 			spaceBetween: 50,
// 		},
// 	}
// });

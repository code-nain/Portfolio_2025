<style>
/*보험료 산출 텍스트 css*/
	.cost_popup_wrap {
		position: fixed;		
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		width: 500px;
		padding: 50px;
		box-sizing: border-box;
		background: #fff;
		line-height: 50px;
		z-index: 9999999;
		display: none;
	}

	.cost_popup_wrap p {
		font-size: 24px;
		text-align: center;
		margin-bottom: 50px;
	}

	.cust_name_2 {
		font-family: 'Pretendard'; 
		font-size: 24px; 
		text-decoration: underline; 
		text-underline-position: under; 
		font-weight: bold;
	}
	
	.cust_money_2{ 
		font-family: 'Pretendard'; 
		font-size: 24px; 
		text-decoration: underline; 
		text-underline-position: under; 
	}

	#cost_background { 
		width: 100%; 
		height: 100%; 
		background: rgba(0,0,0,0.5); 
		position: fixed;
		left: 0; 
		top:0; 
		z-index: 999999; 
		display: none;
	}

	.cost_btn {
		cursor: pointer;
		background: var(--costBtncolor) ;
		color: #fff;
		font-size: 20px;
		margin: 0 auto;
		width: 194px;
		height: 44px;
		line-height: 46px;
		text-align: center;
		margin-top: 20px;
	}

	.cost_popup_wrap > .close { 
		position: absolute; 
		width: 35px;
		height: 35px;
		top: 12px; 
		right: 15px;
		cursor: pointer; 
	}

	.cost_popup_wrap >.close > div { 
		width: 3px; 
		height: 30px;
		background: #000;
		position: absolute; 
		top: 3px; 
		left: 16px; 
	}

	.cost_popup_wrap > .close > div:nth-child(1) { 
		transform: rotate(45deg); 
	}

	.cost_popup_wrap > .close > div:nth-child(2) {
		transform: rotate(-45deg); 
	}

	.notScroll {
		overflow: hidden;
		width: 100%;
		height: 100vh;
		touch-action:none;
	}

	.cust_name_2{position: relative; left:0; top: 0;}
	.cust_money_2{color: #000;}

	/*아래부터 보험 산출 클릭 시 나오는 모달창에 대한 css*/
	.form-set div span.phone_num{color: #aaa;color: #000;font-weight:bold;width: 150px;font-size: 18px;line-height: 37px;}
	#inputform_2{width: auto;}
	.form-set #cellverify_auth_code{border: none; width: 300px; border-bottom: 1px solid #ddd; height: 41px; box-sizing: border-box;display: block;}
	.form-set .inputform_2_inner{margin: 0; border-bottom: none; display: block;}
	.form-set .not_form_div{margin: 0; border-bottom: none;}
	.form-set .dflex{display: flex; justify-content: center; align-items: center;}
	
	.form-set #input_screen{background-color: #555;}
	.form-set .inputform_2_space{margin-top: 20px; margin-bottom: 40px; border: none; display: block;}
	input#cellverify_auth_code{font-size: 15px;}
	
	.form-set #input_screen, .form-set #send_data, 	.form-set #input_screen, .form-set #send_data_price{height: 41px; width: 85px;border:none; cursor:pointer; background: var(--costBtncolor); color: #fff; font-size: 16px; padding: 5px; box-sizing: border-box; font-family: 'Pretendard'; line-height: 1px;}
	#re_send_date{height: 41px; width: 85px;border:none; cursor:pointer; background: #333; color: #fff; font-size: 16px; padding: 5px; box-sizing: border-box; font-family: 'Pretendard' ;border-bottom: none !important; line-height: 1px; }

	.cost_popup_wrap_title{font-family: 'Pretendard'; font-weight: bold; width: 100%; background: #eee; position: absolute; left: 0; top: 0; padding-left: 30px; box-sizing: border-box; height: 60px; line-height: 61px; font-size: 18px;}

	.phone_num{display: block;}
	.num_check{border: none !important; display: flex; justify-content: space-between;}

	.form-set .phone_num_sub{display: block ; width: 100%; line-height: 1; margin-bottom: 20px; color: #888; font-size: 16px;}
	.form-set #mobile1_num_check{width: 90px; border: 0; border-bottom: 1px solid #ddd;}
	.form-set #mobile2_num_check{width: 210px; border: 0; border-bottom: 1px solid #ddd;}
	.form-set .form-check{color: #222;margin-top: 1px;border: none;border-bottom: 1px solid  #ddd;background: none;font-family:'Pretendard';vertical-align: top;width: 64px;font-weight: bold;outline: none;border-radius: none; padding: 7px -1px; font-size: 14px; height: 40px;}

	#mobile1_num_check{color: #000 !important; font-size: 15px;}
	#mobile2_num_check{color: #000 !important; font-size: 15px;}

</style>

<div id = "cost_background"></div>
<input type="hidden" id="hidden_mobile1" name="hidden_mobile1" value="">
<input type="hidden" id="hidden_mobile2" name="hidden_mobile2" value="">
<div class ="cost_popup_wrap">
	<h2 class="cost_popup_wrap_title">SMS 인증</h2>
	<div id="inputform_2" class="form-set" form action="" target="_self" >
		<h2 class="inputform_2_title" style="text-align: center; font-family: 'Pretendard'; width: 100%; letter-spacing: -1px; font-size: 18px; margin-top: 40px; font-weight: 500; color: #888">고객님의 연락처로 인증번호가 발송되었습니다.</h2>
		<div class="inputform_2_inner">	
			
			<div class="inputform_2_space">
				<span class="phone_num">인증번호 확인</span>
				<span class="phone_num_sub">발송받은 인증번호를 입력해주세요.</span>	
				<div class="num_check">
					<input type="tel" class="form-all form-check" id="cellverify_auth_code" name="cellverify_auth_code" value="" placeholder="예) 5014"  maxlength="4" oninput="this.value=this.value.replace(/[^0-9]/g,'')" />
					
					<?php if ($submit_btn == 1)
						echo('<input type="button" id="send_data_price" value="확인"></input>');
					else
						echo('<input type="button" id="send_data" value="확인"></input>');
						?>
				</div>
			</div>
			<div class="inputform_2_space">
				<span class="phone_num">인증번호 재인증</span>
				<span class="phone_num_sub">10초가 지났는데 인증번호가 도착하지 않으셨나요?</span>
				<div class="num_check">
					<select id="mobile1_num_check" name="mobile1_num_check" class="form-number form-all">
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="016">016</option>
						<option value="017">017</option>
						<option value="018">018</option>
						<option value="019">019</option>
					</select>
					<input type="tel" class="form-number form-all" id="mobile2_num_check" name="mobile2_num_check" maxlength="8" placeholder="'-'를 제외해주세요."  oninput="this.value=this.value.replace(/[^0-9]/g,'')" />
					<input type="button" id="re_send_date"value="재발송">					
				</div>
			</div>
		</div>
	</div>
	<div class="sms_after_modal" style="display: none;">
		<p>
			<span class="cust_name cust_name_2">○○○</span> 님의 <br>
			월 납입보험료는 총 <span class="cust_money cust_money_2">***원</span> 입니다.
		</p> 
		<div class="cost_btn">확인</div>
	</div>
	<div class="close">
		<div></div>
		<div></div>
	</div>
</div>

<script>
	$('.form-check').focus(function(){
		$('.form-check').css('border-bottom', '1px solid var(--costBtncolor)');
	});
	$('.form-check').blur(function(){
		$('.form-check').css('border-bottom', '1px solid #ddd');
		$(this).css('color', '#222');
	});

	$(function(){
		//모달의 X버튼이나 확인버튼 클릭 시
		$('.cost_btn, .cost_popup_wrap > .close').click(function(){
			$('.cost_popup_wrap').fadeOut();
			$("body").removeClass('notScroll');
			$('#cost_background').fadeOut();
			$('.sms_after_modal').fadeOut();

			$("#customer_name").val('');
			$("#customer_birth").val('');
			$("#mobile2").val('');
			$("#cellverify_auth_code").val('');
		});
	});

	// [확인] 버튼을 Enter키로 동작하기
	const mobileValueReinput = document.getElementById('cellverify_auth_code');
	const checkButtonElem = document.querySelector('.cost_popup_wrap .num_check input[type="button"]');
	mobileValueReinput.addEventListener('keydown', pressEnter);
	function pressEnter(e) {
		if (e.keyCode == 13) {
			checkButtonElem.click();
		}
	}

</script>
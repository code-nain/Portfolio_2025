<div class="pri_modal_wrap">
	<div class="pri_modal_inner">
		<div class="agree_close">
			<div></div>
			<div></div>
		</div>
		<h3>개인정보수집 및 이용동의 / 개인정보 제3자 제공 동의</h3>
		<br>
		 <div class="pri_modal_txt">
			<p>
				1. 개인정보 수집 및 이용의 목적
				<br><br>
				㈜인스밸리(이하 '회사')는 회사가 제공하는 해당페이지에서 안내하는 상품 안내, 상품 가입, 비교견적 상담 등의 서비스 제공 및 신규 서비스의 개발 등의 목적으로 최소한으로 개인정보를 수집하고 있습니다.
				<br><br>
				2. 수집하는 개인정보의 범위 및 수집방법
				<br><br>
				 가. 수집하는 개인정보의 범위 <br>
				회사에서는 귀하에게 서비스 제공을 위해서 아래와 같은 개인정보를 수집하고 있습니다.<br>
				- 필수항목 : 성명, 성별, 연락처, 생년월일,  IP Address, 참여일시, 유입경로(참여매체) 등
				<br><br>
				나. 수집방법 <br>
				회사는 귀하가 서비스를 이용하실 때 필수적인 정보를 온라인 상에서 입력 받고 있습니다. 또한 서비스 내에서의 설문조사나 이벤트 행사 시 통계분석이나 경품 제공 등을 위해 선별적으로 개인정보 입력을 요청할 수 있습니다. 
				<br><br>
				3. 만14세미만 아동은 회사가 제공하는 해당페이지 가입 및 서비스를 이용할 수 없습니다.
				<br><br>
				4. 개인정보의 보유 및 이용 기간
				<br><br>
				회사는 이용자의 개인정보를 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기합니다. 단, 서비스가 진행되는 동안 이용할 수 있고 개인정보를 수집 동의일로부터 5년 간 보유 활용할 수 있습니다.
				<br><br>
				5. 동의를 거부할 권리가 있다는 사실과 동의 거부에 따른 불이익 내용 고지
				<br><br>
				이용자는 회사에서 필수로 수집하는 개인정보에 대해 동의를 거부할 권리가 있으며, 필수항	목에 대한 동의 거부 시에는 일부 서비스 이용이 제한됩니다
			</p>
		 </div>
	 <div class="pri_modal_inner1">
		<h3>개인정보 제3자 제공 동의</h3>
	      <div class="pri_modal_txt1">
		   <p>

			1. 개인정보를 제공받는 자<br>
			<br>
			- ㈜인스밸리<br>
			- 위 회사와 모집위탁계약을 체결한 자(설계사,대리점)<br>
			<br><br>
			2. 개인정보를 제공받는 자의 개인정보 이용 목적
			<br><br>
			- 상품/서비스 소개 및 상담, 광고를 통한 개인정보 취급 및 보관, 광고 / 마케팅 업무대행
			<br><br>
			3. 제공하는 개인정보의 목록
			<br><br>
			- 회사가 수집하는 정보 일체
			<br><br>
			4. 개인정보를 제공받는 자의 개인정보 보유 및 이용기간
			<br><br>
			- 수집 및 동의일로부터 5년
			<br><br>
			5. 제3자 제공에 대한 거부의 권리
			<br><br>
			이용자는 개인정보의 제3자 제공에 대하여 거부할 수 있으며 거부시 일부 서비스 이용에 제한을 받을 수 있습니다.
		   </p>
	      </div>
	    </div>
	</div>
</div>

<style>
	.pri_modal_wrap h3 {background:#000; color:yellow; padding:15px; text-align:center;}

	.pri_modal_wrap{ position: fixed; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 99999999999; display: none;}

	.pri_modal_inner{position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);width: 750px; height: 500px; background: #eee; border: 10px solid #ccc; overflow-X:hidden; overflow-y: scroll;}
	.pri_modal_txt p{
		padding: 20px; line-height:1.3rem; 
	}
	.pri_modal_txt1 p{
		padding: 20px; line-height:1.2rem; 
	}
	.agree_close {
		position: sticky;
		width: 30px;
		height: 30px;
		top: 8px;
		left:670px;
		cursor: pointer;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.pri_modal_inner h3 {
		margin-top: -30px;
	}

	.agree_close > div{
		width: 3px;
		height: 30px;
		background: #aaa;
		position: absolute;
	}
	.agree_close div {
	    transform: rotate(45deg);
	}
	.agree_close div:last-child {
	    transform: rotate(-45deg);
	}

	 .touch-none {touch-action:none; height: 100%; min-height: 100%; overflow:hidden;}

</style>

<script>
$('.agree_close').click(function(){
	$('.pri_modal_wrap').hide();
	$('body').removeClass('touch-none');
})
$('.privacy1').click(function(){
	$('.pri_modal_wrap').show();
	$('body').addClass('touch-none');
})

$('.pri_modal_wrap').click(function(){
	$('.pri_modal_wrap').hide();
	$('body').removeClass('touch-none');
})

$('.pri_modal_inner').click(function(e){
	 e.stopPropagation();
})
</script>



<!-- ----------------------------------------------------------------------------------- -->




<div class="pri_modal_wrap2">
	<div class="pri_modal_inner2">
		<div class="agree_close2">
			<div></div>
			<div></div>
		</div>
		<h3>개인정보처리방침</h3>
		<br>
		 <div class="pri_modal_txt2">
			<p>
				1.개인정보의 처리 목적
				<br><br>
				㈜인스밸리(이하 '회사')는 회사가 제공하는 해당페이지에서 안내하는 상품 안내, 상품 가입, 비교견적 상담 등의
				서비스 제공 및 신규 서비스의 개발 등의 목적으로 최소한으로 개인정보를 수집하고 있습니다.
				<br><br>
				2. 수집하는 개인정보의 범위 및 수집방법
				<br><br>
				가. 수집하는 개인정보의 범위<br>
				1) 회사에서는 귀하에게 서비스 제공을 위해서 아래와 같은 개인정보를 수집하고 있습니다.<br>
				- 필수항목 : 성명, 연락처, 생년월일, IP Address, 참여일시, 유입경로(참여매체) 등<br>
				2) 개인정보 제공자는 해당 정보에 대한 동의를 거부할 수 있습니다.
				다만, 이에 대한 동의를 하시지 않을 경우에는 해당페이지 내 서비스
				또는 상품에 대한 안내를 받지 못할 수 있음을 알려드립니다.
				<br><br>
				나. 수집방법<br>
				회사는 귀하가 서비스를 이용하실 때 필수적인 정보를 온라인 상에서 입력 받고 있습니다.<br>
				또한 서비스 내에서의 설문조사나 이벤트 행사 시 통계분석이나 경품 제공 등을 위해
				선별적으로 개인정보 입력을 요청할 수 있습니다.<br>
				<br><br>
				다. 가명정보의 처리<br>
				회사는 수집한 정보 중 가명정보는 통계작성, 과학적 연구, 공익적 기록보존
				등을 위하여 귀하의 동의 없이 처리할 수 있습니다.
				<br><br>
				3. 개인정보의 보유 및 이용기간<br>
				1) 회사가 수집하는 개인정보의 보유 및 처리 기간은 정보주체가
				회사의 정보주체 또는 회원으로써 회사에 제공하는 서비스를
				이용하는 동안 회원 탈퇴를 요청하거나 개인정보의 수집 이용 등에
				대한 동의를 철회할 때까지 보존합니다.<br>
				2) 단, 상법 등 법령의 규정에 의하여 보존할 필요성이 있는 경우에는 예외로 합니다.<br>
				3)회사가 처리하는 개인정보는 수집∙이용 목적으로 명시한 범위 내에서 처리하며,
				개인정보보호법 및 관련 법령에서 정하는 보유기간을 준용하여 이행하고 있습니다.<br>
				4) 회사는 매년 1 회 이상 수집∙이용 목적 및 수집한 개인정보의 항목
				및 이를 제공받은 자와 제공 목적 및 제공한 개인정보의 항목을 통지합니다.
				<br><br>
				4. 개인정보의 파기절차 및 방법
				<br><br>
				가. 파기절차<br>
				회사는 원칙적으로 개인정보의 보유기간이 경과했거나
				처리목적이 달성된 경우에는 지체없이 해당 개인정보를 파기합니다.
				다만, 다른 법률에 따라 보존하여야 하는 경우에는 그러하지 않습니다.
				<br><br>
				나. 파기방법<br>
				- 전자적 파일형태로 저장된 개인정보 : 불가능한 방법으로 영구삭제<br>
				- 전자적 파일형태 외의 기록물, 인쇄물, 서면, 그 밖의 기록매체에 저장된 개인정보 : 파쇄 또는 소각
				<br><br>
				다. 장기미이용고객의 개인정보 파기<br>
				회사는 5년의 기간 동안 서비스를 이용하지 아니하는 이용자의 개인정보를
				즉시 파기하거나 별도로 관리하는 방식으로 처리합니다. 다만, 이용자의
				요청이 있는 경우나 다른 법령에 따라 이용자의 개인정보를 보존해야 하는
				경우에는 그 보존기간이 경과할 때까지 분리하여 별도로 저장∙관리합니다.
				<br><br>
				5. 개인정보의 제3자 제공
				<br><br>
				회사는 수집∙보유하고 있는 개인정보를 이용자의 동의 없이는 제3자에게 제공하지 않으며,
				다음의 경우에 예외적으로 제3자에게 개인정보를 제공할 수 있습니다.
				<br><br>
				- 정보주체로부터 별도의 동의를 받은 경우<br>
				- 법률에 특별한 규정이 있거나 법령상 의무를 준수하기 위하여 불가피한 경우
				<br><br>
				6. 개인정보 처리의 위탁
				<br><br>
				회사는 서비스의 원활한 제공을 위해 개인정보를 다음과 같이 위탁처리하고 있으며,
				관계 법령에 따라 위탁계약 시 개인정보가 안전하게 관리될 수 있도록 필요한 사항을 규정하고 있습니다.<br>
				[위탁대상자(수탁자)]<br>
				&nbsp;&nbsp;- ㈜인스밸리<br>
				&nbsp;&nbsp;- 위 회사와 모집위탁계약을 체결한 자(설계사, 대리점)<br>
				위탁업무 내용 : 광고를 통한 개인정보 취급 및 보관, 광고 / 마케팅 업무대행<br>
				보유 및 이용기간 : 수집 및 동의일로부터 5년
				<br><br>
				7. 개인정보 제공자 및 법정대리인의 권리와 그 행사방법
				<br><br>
				가. 이용자 및 법정대리인은 언제든지 등록되어 있는 자신 혹은 당해
				만 14세 미만 아동의 개인정보를 조회하거나 수정할 수 있으며, 동의철회(가입해지)를 요청할 수도 있습니다.<br><br>

				나. 이용자가 개인정보의 오류에 대한 정정을 요청하신 경우에는
				정정을 완료하기 전까지 당해 개인정보를 이용 또는 제공하지 않습니다.
				또한 잘못된 개인정보를 제3자에게 이미 제공한 경우에는
				정정 처리결과를 제3자에게 지체없이 통지하여 정정이 이루어지도록 하겠습니다.<br><br>

				다. 귀하는 회사가 처리하는 귀하의 개인정보에 대한 열람을 요구할 수 있습니다.
				다만, 다음의 경우에는 그 열람이 제한될 수 있습니다.<br>
				1) 법률에 따라 열람이 금지되거나 제한되는 경우<br>
				2) 다른 사람의 생명∙신체를 해할 우려가 있거나 다른 사람의 재산과 그
				밖의 이익을 부당하게 침해할 우려가 있는 경우<br><br>

				라. 귀하는 언제든지 회사에 대하여 개인정보 수집∙이용∙제공 등의 동의를 철회할 수 있습니다.<br><br>

				8. 인터넷 접속정보파일(cookie)의 운영에 관한 사항<br><br>

				가. 쿠키 등 사용 목적<br>
				이용자의 접속 빈도나 방문 시간 등을 분석,
				이용자의 취향과 관심분야를 파악 및 자취 추적,
				각종 이벤트 참여 정도 및 방문 회수 파악 등을 통한 타겟 마케팅 및 맞춤 서비스 제공
				<br><br>
				나. 쿠키의 설치∙운영 및 그 거부방법<br>
				고객은 쿠키에 대한 선택권이 있습니다.
				웹 브라우저 상단의 "도구> 인터넷 옵션 탭에서 모든 쿠키를 다 받아들이거나,
				쿠키가 설치될 때 통지를 보내도록 하거나, 아니면 모든 쿠키를 거부할 수 있는 선택권을 가질 수 있습니다.
				단, 고객에게서 쿠키설치를 거부하였을 경우 서비스 이용에 불편이 있거나, 서비스 제공에 어려움이 있을 수 있습니다.<br><br>

				9. 개인정보보호를 위한 기술적/관리적 대책<br><br>

				- 회사는 귀하의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 안전성 확보를 위하여
				다음과 같은 기술적/관리적 대책을 강구하고 있습니다.<br>
				- 회사는 백신프로그램을 이용하여 컴퓨터바이러스에 의한 피해를 방지하기 위한 조치를 취하고 있습니다.
				백신프로그램은 주기적으로 업데이트되며 갑작스런 바이러스가 출현할 경우
				백신이 나오는 즉시 이를 제공함으로써 개인정보가 침해되는 것을 방지하고 있습니다.
				<br><br>
				- 해킹 등에 의해 귀하의 개인정보가 유출되는 것을 방지하기 위해,
				외부로부터의 침입을 차단하는 장치를 이용하고 있으며,
				각 서버마다 침입탐지시스템을 설치하여 24시간 침입을 감시하고 있습니다.
				<br><br>
				- 회사는 암호 알고리즘을 이용하여 네트워크상의
				개인정보를 안전하게 전송할 수 있는 보안장치(SSL 또는 SET)를 채택하고 있습니다.
				<br><br>
					- 당사는 회원의 개인정보에 대한 접근 권한을 서비스 제공을 위해
				필요한 최소한의 인원으로 제한하고 있습니다.
				업무 특성상 개인정보를 취급할 수 있는 최소한의 인원에 해당하는 자는 다음과 같습니다.<br>
				참여자를 직접 상대하여 마케팅 업무를 수행하는 자.
				개인정보관리책임자 및 담당자 등 개인정보관리업무를 수행하는 자.
				기타 업무상 개인정보의 취급이 불가피한 자.
				퇴사 또는 부서 이동 등 개인정보취급자가 변경될 경우 즉시 해당 계정을 통한 개인정보 접근 권한을 말소하고 있습니다. 또한 개인정보를 취급하는 직원을 대상으로 정기적인 개인정보보안/관리 교육을 실시하고 있으면 이를 통해 개인정보취급자들이 항상 최상의 보안마인드를 가지도록 합니다.
				개인정보관련 취급자의 업무 인수인계는 보안이 유지된 상태에서 이루어지며, 입사 및 퇴사 이후 개인 정보 사고에 대한 책임을 명확히 하고 있습니다.
				<br><br>
				10. 개인정보관리책임자
				<br><br>
				귀하의 개인정보를 보호하고 관련한 불만을 처리하기 위하여
				회사는 개인정보관리책임자를 두어 귀하의 개인정보를 관리하고 있으며
				개인정보보호와 관련하여 귀하가 의견과 불만을 제기할 수 있는 창구를 개설하고 있습니다.
				귀하의 개인정보와 관련한 문의사항 및 불만사항이 있으시면
				아래의 개인정보관리 책임자에게 연락 주시면 즉시 조치하여 처리 결과를 통보하겠습니다.
				<br><br>
				[개인정보관리책임자]<br>
				이 름 : 남현석<br>
				이메일 : webmaster0312@nate.com<br>
				<br><br>
				11. 고지의 의무<br>
				현 개인정보처리방침의 내용 추가, 삭제 및 수정이 있을 시에는 개정 최소 7일전부터 홈페이지 '공지사항'을 통해 고지할 것입니다.
				다만, 개인정보의 수집 및 활용, 제3자 제공 등과 같이 이용자 권리의 중요한 변경이 있을 경우에는 최소 30일전에 고지합니다.
					<br><br>
				개인정보 처리방침 공고일자 : 2020년 12월 18일<br>
				개인정보 처리방침 시행일자 : 2020년 12월 25일

			</p>
		 </div>
	</div>
</div>

<style>
	.pri_modal_wrap2 h3 {background:#000; color:yellow; padding:15px; text-align:center;}

	.pri_modal_wrap2{ position: fixed; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 99999999999; display: none;}

	.pri_modal_inner2{position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);width: 750px; height: 500px; background: #eee; border: 10px solid #ccc; overflow-X:hidden; overflow-y: scroll;}
	.pri_modal_txt2 p{
		padding: 20px; line-height:1.3rem; 
	}
	.pri_modal_txt22 p{
		padding: 20px; line-height:1.2rem; 
	}
	.agree_close2 {
		position: sticky;
		width: 30px;
		height: 30px;
		top: 8px;
		left:670px;
		cursor: pointer;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.pri_modal_inner2 h3 {
		margin-top: -30px;
	}
	.agree_close2 > div{
		width: 3px;
		height: 30px;
		background: #aaa;
		position: absolute;
	}
	.agree_close2 div {
	    transform: rotate(45deg);
	}
	.agree_close2 div:last-child {
	    transform: rotate(-45deg);
	}

	 .touch-none2 {touch-action:none; height: 100%; min-height: 100%; overflow:hidden;}

	 body > div.pri_modal_wrap > div > div.pri_modal_inner1 > h3 { margin: 0; }

</style>

<script>
	$('.agree_close2').click(function(){
		$('.pri_modal_wrap2').hide();
		$('body').removeClass('touch-none');
	})
	$('.privacy2').click(function(){
		$('.pri_modal_wrap2').show();
		$('body').addClass('touch-none');
	})

	$('.pri_modal_wrap2').click(function(){
		$('.pri_modal_wrap2').hide();
		$('body').removeClass('touch-none');
	})

	$('.pri_modal_inner2').click(function(e){
		e.stopPropagation();
	})
</script>





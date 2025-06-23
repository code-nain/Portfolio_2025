function characterCheck(obj){
	var regExp = /[ \{\}\[\]\/.,;:|\)*~`^\-_+┼<>\%\'\"\\\(\=]/gi;
	if( regExp.test(obj.value) ){
		alert("특수문자는 입력하실수 없습니다.");
		obj.value = obj.value.substring( 0 , obj.value.length - 1 );
	}
}
	
	$("#bohum_send").click(function(e){
		e.preventDefault()

		if( $("#customer_name").val() == "" )
		{
			alert('이름을 입력해 주세요.');
			$("#customer_name").focus();
			return false;
		}

		if( $("#customer_name").val().length > 8 )
		{
			alert('이름을 다시 입력해 주세요.');
			$("#customer_name").focus();
			return false;
		}
		
		if( $("#customer_birth").val() == "" )
		{
			alert('생년월일을 입력해 주세요.');
			$("#customer_birth").focus();
			return false;
		}
		
		if( $("#mobile2").val() == "" )
		{
			alert('전화번호를 다시 입력해 주세요.');
			$("#mobile2").focus();
			return false;
		}

		if( $("#mobile2").val().length < 8 )
		{
			alert('전화번호 8자리를 입력해 주세요.');
			$("#mobile2").focus();
			return false;
		}
		
		var privacy_check = $("#check-box").prop("checked");
		
		if( ! privacy_check ) {
			alert('개인정보수집 및 활용에 동의해 주세요.');
			$("#check-box").focus();
			return false;
		}

		
		// 전화번호 필터링 (8자리 => 앞에 010~019 올 경우 alert / 11자리 => 앞에 010~019올 경우 생략)
			var mobile1 = $("#mobile1").val();
			var mobile2 = $("#mobile2").val();
			var mobile3 = '';
			$("#hidden_mobile1").val(mobile1);
			$("#hidden_mobile2").val(mobile2);

			const isValidPrefix = mobile2.slice(0, 3).match(/^(010|011|016|017|018|019)/);

			if (mobile2.length === 8) {
				if (isValidPrefix) {
					alert('전화번호를 다시 입력해주세요.'); // 8자리일 때 앞에 010~019가 올 경우
					return false;
				}
			} else if (mobile2.length === 11) {
				if (isValidPrefix) { // 11자리일 때 앞에 010~019가 올 경우
					mobile1 = mobile2.slice(0, 3);
					mobile2 = mobile2.slice(3);
					$("#hidden_mobile1").val(mobile1);
					$("#hidden_mobile2").val(mobile2);
				} else {
					alert('전화번호를 다시 입력해주세요.'); // 11자리일 때 앞에 010~019 이외의 값이 올 경우
					return false;
				}
			} else {
				alert('전화번호를 다시 입력해주세요.'); // 전화번호가 9~10자리 일 때
				return false;
			}

		var allData = { "action":"sendAuthCode", "mobile1":mobile1, "mobile2":mobile2, "mobile3":mobile3, customer_name: $("#customer_name").val(), birthday: $("#customer_birth").val(), sex: $('input[name="customer_sex"]:checked').val()};

		$.ajax({ type: 'get', url: '/js/sendpotential.php', dataType: 'json', data: allData });

		$.ajax({
			type:'get',
			url:'/js/cellverify.php',
			dataType: 'json',
			data : allData,
			success:function(json){
				$("body").addClass('notScroll');
				$('#cost_background').fadeIn(0);
				$('.cost_popup_wrap_title').fadeIn(0);
				$('.cost_popup_wrap').fadeIn(500);
				$('#inputform_2').fadeIn(500);
        		$("#cellverify_auth_code").val('');
				$("#mobile2_num_check").val('');
				$("#cellverify_auth_code").focus();

				//hidden_mobile2 = mobile2;
				//$("#mobile2_num_check").val(hidden_mobile2);
				//alert(hidden_mobile2);
				//alert(json.message);
				
				if (json.error!=2)	alert(json.message);
				else	console.log(json.message);
			},
			error: function(jqXHR, status, errorThrown) {
				alert(errorThrown.message);
			}
		});
		
	});


  // ------------------------------------------
  $("#send_data").click(function(e){
			
		if( $("#cellverify_auth_code").val() == "" )
		{
			alert('인증번호를 입력해 주세요.');
			$("#cellverify_auth_code").focus();
			return false;
		}

		e.preventDefault();

		var cellverify_auth_code = document.querySelector('#cellverify_auth_code').value;

		var mobile1 = $("#hidden_mobile1").val();
		var mobile2 = $("#hidden_mobile2").val();
		var allData = { "action":"smsAuthCheck", "mobile1": mobile1, "mobile2": mobile2, "cellverify_auth_code": cellverify_auth_code };

		$.ajax({ type: 'get', url: '/js/sendpotential.php', dataType: 'json', data: allData });

		$.ajax(
		{
			type: "get",
			url: "/js/cellverify.php",
			data: allData,
			success: function(json) {
				var obj_json = JSON.parse(json);
				
				if (obj_json.error == -1) {
					alert('인증번호를 다시 입력해 주세요.');
					$("#cellverify_auth_code").focus();
					$("#cellverify_auth_code").val('');
					return false;
				}
				else {
				
					var mobile2Elem = document.querySelector('#mobile2').value;
					var mobile1 = document.querySelector('#mobile1').value;
					var mobile2 = mobile2Elem.substr(0, 4);
					var mobile3 = mobile2Elem.substr(4, 8);
					var customer_birth = document.querySelector('#customer_birth').value;
					var customer_name = document.querySelector('#customer_name').value;

					var mobile1 = $("#hidden_mobile1").val();
					var mobile2 = $("#hidden_mobile2").val();
					var customer_mobile = mobile1 + mobile2;

					var referer = document.referrer;
					var customer_sex = $('input[name="customer_sex"]:checked').val();

					// 보험료 확인
					var allData = {"customer_name": customer_name, "customer_birth": customer_birth, "mobile1": mobile1, "mobile2": mobile2, "mobile3": '', "customer_sex": customer_sex, "referer": referer};

					$.ajax({
						type:'get',
						url:'/js/wrequest.php',
						data: allData,
						success:function(json){
								alert('신청 완료되었습니다.');
								$('.cost_popup_wrap').fadeOut();
								$("body").removeClass('notScroll');
								$('#cost_background').fadeOut();
								$('.sms_after_modal').fadeOut();
								$("#customer_name, #customer_name__btm").val('');
								$("#customer_birth, #customer_birth__btm").val('');
								$("#mobile2, #mobile2__btm").val('');
								$("#cellverify_auth_code, #cellverify_auth_code__btm").val('');
						},
						error: function(jqXHR, status, errorThrown) {

						}
					});
				}
			}
		});
	});

	
	$("#re_send_date").click(function () {

		if ($("#mobile2_num_check").val().length < 8) {
			alert('전화번호 8자리를 입력해 주세요.');
			$("#mobile2_num_check").focus();
			return false;
		}

		// 전화번호 필터링 (8자리 => 앞에 010~019 올 경우 alert / 11자리 => 앞에 010~019올 경우 생략)
		var mobile1 = $("#mobile1_num_check").val();
		var mobile2 = $("#mobile2_num_check").val();
		var mobile3 = '';
		$("#hidden_mobile1").val(mobile1);
		$("#hidden_mobile2").val(mobile2);

		const isValidPrefix = mobile2.slice(0, 3).match(/^(010|011|016|017|018|019)/);

		if (mobile2.length === 8) {
			if (isValidPrefix) {
				alert('전화번호를 다시 입력해주세요.'); // 8자리일 때 앞에 010~019가 올 경우
				return false;
			}
		} else if (mobile2.length === 11) {
			if (isValidPrefix) { // 11자리일 때 앞에 010~019가 올 경우
				mobile1 = mobile2.slice(0, 3);
				mobile2 = mobile2.slice(3);
				$("#hidden_mobile1").val(mobile1);
				$("#hidden_mobile2").val(mobile2);
			} else {
				alert('전화번호를 다시 입력해주세요.'); // 11자리일 때 앞에 010~019 이외의 값이 올 경우
				return false;
			}
		} else {
			alert('전화번호를 다시 입력해주세요.'); // 전화번호가 9~10자리 일 때
			return false;
		}


		var allData = { "action": "sendAuthCode", "mobile1": mobile1, "mobile2": mobile2, "mobile3": mobile3 };

		$.ajax({
			type: 'get',
			url: '/js/cellverify.php',
			dataType: 'json',
			data: allData,
			success: function (json) {
				alert(json.message.split('$')[0]);
				console.log(json.message);
			},
			error: function (jqXHR, status, errorThrown) {
				alert(errorThrown.message);
			}
		});
	});

$("#bohum_send__btm").click(function() {
	if( $("#customer_name__btm").val() == "" ) {
	alert('이름을 입력해 주세요.');
	$("#customer_name__btm").focus();
	return false;
	}
	
	if( $("#customer_birth__btm").val() == "" ) {
	alert('생년월일을 입력해 주세요.');
	$("#customer_birth__btm").focus();
	return false;
	}
	
	if( $("#mobile2__btm").val() == "" ) {
	alert('전화번호를 입력해 주세요.');
	$("#mobile2__btm").focus();
	return false;
	}

	if( $("#mobile2__btm").val().length < 8 ) {
	alert('전화번호 8자리를 입력해 주세요.');
	$("#mobile2__btm").focus();
	return false;
	}
	
	var privacy_check__btm = $("#check-box__btm").prop("checked");
	if( ! privacy_check__btm ) {
	alert('개인정보취급방침에 동의해 주세요.');
	$("#check-box__btm").focus();
	return false;
	}

	// var customer_sex__btm = $('.sex_box input[name="customer_sex"]:checked')

	// 내가 하단에 집어넣은 값
	const name = $("#pure-form__btm")[0].customer_name__btm.value;
	const sex = $("#pure-form__btm")[0].customer_sex__btm.value;
	const birth = $("#pure-form__btm")[0].customer_birth__btm.value;
	const tel1 = $("#pure-form__btm")[0].mobile1__btm.value;
	const tel2 = $("#pure-form__btm")[0].mobile2__btm.value;

	// 맨 위 폼 input에 내가 하단에 집어넣는 값을 보냄
	$("#pure-form")[0].customer_name.value = name;
	$("#pure-form")[0].customer_sex.value = sex;
	$("#pure-form")[0].customer_birth.value = birth;
	$("#pure-form")[0].mobile1.value = tel1;
	$("#pure-form")[0].mobile2.value = tel2;
	$("#pure-form")[0].agree.checked = true;

	const pureForm = document.querySelector('#pure-form');
	const buttonId = pureForm.querySelector('.btn_submit').id;

	$(`#${buttonId}`).click();
})


// 해상도 변화에 따라 화면 축소하기
// 해상도가 1.25배 이상 증가할 경우 화면 배율을 60%로 축소함
// CSS에서 max-width가 설정되어 있는 경우 여백이 생길 수 있으므로 max-width는 없앨 것
let remove = null;

const updatePixelRatio = () => {
	if (remove != null) {
		remove();
	}
	const mqString = `(resolution: ${window.devicePixelRatio}dppx)`;
	const media = matchMedia(mqString);
	media.addEventListener("change", updatePixelRatio);
	remove = () => {
		media.removeEventListener("change", updatePixelRatio);
	};

	if (window.devicePixelRatio >= 1.25 && screen.width <= 1920 && screen.width >= 680) {
		document.body.style.zoom = '66%';
	} else if (window.devicePixelRatio === 1) {
		document.body.style.zoom = '100%';
	};
}

updatePixelRatio();

// 갤럭시 폴드 및 태블릿PC 대응 (화면 축소)
if (screen.width >= 580 && screen.width < 1024) {
	document.body.style.zoom = '70%';
}


// mobile2의 maxLength를 입력값 앞자리에 따라 유동적으로 조정하기
const mobileElems = [...document.querySelectorAll('input')].filter(it => it.id.match(/^(?!.*hidden).*mobile2.*$/));
mobileElems.forEach(el => {
	el.addEventListener('input', () => {
		const input = el.value;
		if (input.startsWith('01')) {
			el.maxLength = 11;
		} else {
			el.maxLength = 8;
		}
	})
})
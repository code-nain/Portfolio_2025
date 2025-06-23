<!-- main form -->
<?php if (!isset($_GET['menu'])): ?>
    <style>
        /* form ============================================== */
        .sc_form {
            height: auto;
            width: 100%;
            background: #f1f1f1;
        }
        .sc_form form {
            margin: 0 auto;
            position: relative;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-top: 60px;
        }

        .sc_form form ul {
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            gap: 20px 25px;
            flex: 1;
        }
        .sc_form form ul li {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .sc_form form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
        font-size: 1.8vw;
        font-size: clamp(19px, 1.8vw, 21px);
        font-weight: 500;
        min-width: 100px;
        /* color: #fff; */
        }
        .sc_form form ul li input{
        flex: 1;
        }

        .sc_form form ul li input[type=radio] {
        display: none;
        width: 18px;
        height: 18px;
        border-radius: 100%;
        border: 1px solid #bbb;
        margin: 0;
        margin-right: 8px;
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        position: relative;
        cursor: pointer;
        }
        .sc_form form ul li .sex_cover{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        }
        .sc_form form ul li .sex_cover .sex_box label{
        display: inline-block;
        height: 54px;
        width: 54px;
        text-align: center;
        line-height: 54px;
        border-radius: 8px;
        font-size: 1.2rem;
        }
        .sc_form form ul li input[type=radio]:checked + label {
        background: var(--brandColor);
        color: #fff;
        }
        .sc_form form ul li input[type=radio]:not(:checked) + label {
        background: #fff;
        color: #777;
        box-sizing: border-box;
        border: 1px solid #b8b8b8;
        }
        .sc_form form ul li input[type=text], .sc_form form ul li input[type=tel] {
        border: none;
        font-size: 1.3vw;
        font-size: clamp(18px, 2.3vw, 20px);
        padding: 15px 25px;
        outline: none;
        font-family: inherit;
        background: #fff;
        border-radius: 6px;
        width: 100%;
        border: 1px solid #b8b8b8;
        }
        .sc_form form ul li select {
        font-size: 1.3rem;
        padding-left: 26px;
        padding-right: 58px;
        height: 54px;
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        background: #fff url("./images/tell-arrow.png") no-repeat 85% 50%;
        background-size: 10px 8px;
        border: none;
        border-radius: 6px;
        border: 1px solid #b8b8b8;
        }
        .sc_form form ul li .privacy_wrap {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        }
        .sc_form form ul li .privacy_wrap input[type=checkbox] {
        flex: content;
        width: 17px;
        height: 17px;
        margin: 0;
        cursor: pointer;
        accent-color: #bebebe;
        }
        .sc_form form ul li .privacy_wrap button,
        .sc_form form ul li .privacy_wrap label{
        margin: 0;
        padding: 0;
        background: none;
        border: 0;
        font-size: 18px;
        cursor: pointer;
        }

        .btn_submit {
        font-size: 1.4rem;
        font-weight: 600;
        background: var(--brandColor);
        color: #fff;
        padding: 25px 0;
        width: 100%;
        height: 60px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border-radius: 30px;
        box-shadow: rgba(0, 0, 0, 0.1) 8px 8px 0px;
        }
        .btn_submit img{
        width: 30px;
        height: 30px;
        margin-bottom: 5px;
        }

        input:-internal-autofill-selected {
        background: #fff;
        }

    </style>
<?php endif; ?>

<style>
    .form_wrap .form_area{
        background: linear-gradient(-90deg, rgb(0, 142, 225) 0%, rgb(90, 0, 225) 100%);
        padding: 30px 30px 25px 30px;
        border-radius: 20px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    .form_wrap .form_headline_area{
        display: none;
    }
    .form_wrap form {
        margin: 0 auto;
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form_wrap form ul {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px 25px;
        flex: 1;
    }
    .form_wrap form ul li {
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 10px;
    }
    .form_wrap form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
        font-size: 1.8vw;
        font-size: clamp(19px, 1.8vw, 21px);
        font-weight: 500;
        min-width: 100px;
    }
    .form_wrap form ul li input{
        flex: 1;
    }

    .form_wrap form ul li input[type=radio] {
        display: none;
        width: 18px;
        height: 18px;
        border-radius: 100%;
        border: 1px solid #bbb;
        margin: 0;
        margin-right: 8px;
        -webkit-appearance: none;
        -moz-appearance: none;
                appearance: none;
        position: relative;
        cursor: pointer;
    }
    .form_wrap form ul li .sex_cover{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .form_wrap form ul li .sex_cover .sex_box label{
        display: inline-block;
        height: 49px;
        width: 49px;
        text-align: center;
        line-height: 49px;
        border-radius: 8px;
        font-size: 1.2rem;
    }
    .form_wrap form ul li input[type=radio]:checked + label {
        background: #fff;
        color: var(--brandColor);
        box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px, rgba(0, 0, 0, 0.2) 0px 7px 13px -3px, rgba(0, 0, 0, 0.1) 0px -3px 0px inset;
    }
    .form_wrap form ul li input[type=radio]:not(:checked) + label {
        background: #ddd;
        color: #777;
        box-sizing: border-box;
        border: 1px solid #b8b8b8;
    }
    .form_wrap form ul li input[type=text], .form_wrap form ul li input[type=tel] {
        border: none;
        font-size: 18px;
        padding: 12px 15px;
        outline: none;
        font-family: inherit;
        background: #fff;
        border-radius: 6px;
        width: 100%;
        border: 1px solid #b8b8b8;
    }
    .form_wrap form ul li select {
        font-size: 1.1rem;
        padding-left: 22px;
        padding-right: 45px;
        height: 49px;
        -webkit-appearance: none;
        -moz-appearance: none;
                appearance: none;
        background: #fff url("./images/tell-arrow.png") no-repeat 85% 50%;
        background-size: 10px 8px;
        border: none;
        border-radius: 6px;
        border: 1px solid #b8b8b8;
    }
    .form_wrap form ul li .privacy_wrap {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
    }
    .form_wrap form ul li .privacy_wrap input[type=checkbox] {
        flex: content;
        width: 17px;
        height: 17px;
        margin: 0;
        cursor: pointer;
        accent-color: var(--brandColor);
    }
    .form_wrap form ul li .privacy_wrap button,
    .form_wrap form ul li .privacy_wrap label{
        margin: 0;
        padding: 0;
        background: none;
        border: 0;
        font-size: 18px;
        cursor: pointer;
    }

    .form_wrap .btn_submit {
        font-size: 1.3rem;
        font-weight: 600;
        background: #444;
        color: #fff;
        margin: 0 auto;
        width: 350px;
        height: 60px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border-radius: 30px;
    }
    .form_wrap .btn_submit img{
        width: 30px;
        height: 30px;
        margin-bottom: 5px;
    }

    .form_wrap input:-internal-autofill-selected {
        background: #fff;
    }

    .form_wrap__btm .headline_box{
        gap: 5px;
    }
    .form_wrap__btm .sub_headline {
        color: #666;
    }

    @media (max-width: 959px) {
        .form_wrap form ul {
            grid-template-columns: repeat(1, 1fr);
            gap: 15px;
        }
        .form_wrap form ul li {
            justify-content: center;
        }
    }
    @media (max-width: 586px) {
        .form_wrap .form_area {
            padding: 30px 20px 25px 20px;
        }
        .form_wrap form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
            min-width: 75px;
        }
        .form_wrap form ul li input[type=text], .form_wrap form ul li input[type=tel] {
            font-size: 17px;
        }
        .form_wrap form ul li select {
            font-size: 1.1rem;
            padding-left: 15px;
            padding-right: 35px;
        }
        .form_wrap .btn_submit {
            font-size: 1.2rem;
        }
        .form_wrap .btn_submit img {
            width: 25px;
            height: 25px;
        }

        .form_wrap form ul li .privacy_wrap button, .form_wrap form ul li .privacy_wrap label{
            font-size: 16px;
        }

        .form_wrap__btm form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
            min-width: 80px;
        }
        .form_wrap__btm form ul li select{
            font-size: 1.1rem;
            padding-left: 17px;
            padding-right: 38px;
        }
        .form_wrap__btm form ul li input[type=text], .form_wrap__btm form ul li input[type=tel]{
            font-size: 17px;
        }
        .form_wrap__btm .btn_submit {
            font-size: 1.3rem;
        }
        .form_wrap__btm .btn_submit img {
            width: 25px;
            height: 25px;
        }
    }
    @media (max-width: 430px) {
        .form_wrap form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
            font-size: 17px;
            min-width: 60px;
        }
        .form_wrap form ul li input[type=text], .form_wrap form ul li input[type=tel] {
            border: none;
            font-size: 15px;
            padding: 9px 15px;
        }
        .form_wrap form ul li .sex_cover .sex_box label{
            width: 38px;
            height: 38px;
            line-height: 38px;
            font-size: 17px;
        }
        .form_wrap form ul li select{
            height: 38px;
            font-size: 1rem;
            padding-left: 10px;
            padding-right: 24px;
        }
        .form_wrap .btn_submit {
            font-size: 1.1rem;
            max-width: 280px;
            height: 48px;
        }


        .form_wrap__btm form ul li label:not(.privacy_wrap label, .privacy_wrap .show_btn_db, .sex_box label) {
            font-size: 17px;
            min-width: 65px;
        }
        .form_wrap__btm form ul li input[type=text], .form_wrap__btm form ul li input[type=tel]{
            padding: 10px 15px;
            font-size: 16px;
        }
        .form_wrap__btm form ul li .sex_cover .sex_box label {
            height: 41px;
            width: 41px;
            line-height: 41px;
            font-size: 1rem;
        }
        .form_wrap__btm form ul li select {
            font-size: 1rem;
            height: 41px;
        }
        .form_wrap__btm form ul li .privacy_wrap button, .form_wrap__btm form ul li .privacy_wrap label {
            font-size: 16px;
        }
        .form_wrap__btm .btn_submit {
            font-size: 1.2rem;
            height: 50px;
        }
    }

    /* hover */
    @media (min-width: 768px) {
        .form_wrap .btn_submit:hover {
            background: #222;
        }
    }
</style>


<div class="form_wrap" id="form">
    <form action="" method="post" target="_self" name="consult_frm" id="pure-form">
        <ul>
        <li>
            <label for="customer_name">이름</label>
            <input type="text" id="customer_name" name="customer_name" class="form-name" placeholder="예) 홍길동" maxlength="8" onkeyup="characterCheck(this)" onkeydown="characterCheck(this)">
            <div class="sex_cover">
            <div class="sex_box">
                <input type="radio" id="customer_sex_men" name="customer_sex" value="1" checked>
                <label for="customer_sex_men">남</label>
            </div>
            <div class="sex_box">
                <input type="radio" id="customer_sex_girl" name="customer_sex" value="2">
                <label for="customer_sex_girl">여</label>
            </div>
            </div>
        </li>
        <li>
            <label for="customer_birth">생년월일</label>
            <input type="tel" id="customer_birth" name="customer_birth" class="form-birth" placeholder="예) 900530" maxlength="8" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
        </li>
        <li>
            <label for="mobile2">전화번호</label>
            <div class="tel_cover">
            <select id="mobile1" name="mobile1">
                <option value="010">010</option>
                <option value="011">011</option>
                <option value="016">016</option>
                <option value="017">017</option>
                <option value="018">018</option>
                <option value="019">019</option>
            </select>
            </div>
            <input type="tel" id="mobile2" name="mobile2" maxlength="8" placeholder="'-'를 제외해주세요" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
        </li>
        <li>
            <div class="privacy_wrap">
            <input type="checkbox" name="agree" id="check-box" tabindex="0" checked>
            <label for="check-box" class="privacy_label">개인정보수집 및 활용동의</label>
            <button type="button" class="privacy1">[보기]</button>
            </div>
        </li>
        </ul>
        <button type="button" id="bohum_send" class="btn_submit">내 보험료 확인 신청하기<img src="./images/search.svg" alt="보험료확인"></button>
    </form>
</div>

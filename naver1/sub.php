<!DOCTYPE html>
<html lang="ko">
<?php include ("./common/reset_head.php"); ?>
<body>
  <?php include ("./common/header.php"); ?>

  <main class=" sub_all">

    <section class="sc_visual_sub">
      <div class="inner">
        <?php include ("./common/form.php"); ?>
      </div>
    </section>

    <section class="text_page">
      <div class="inner">
      <?php if($menu > 0 && $menu <= count($sub)): ?>

          <?php if ($menu == 1): ?>
            <h3 class="content_headline"><?=$sub[$sub_page]->title?></h3>
            <div class="content_box">
              <strong>실손보험? 실손의료보험?</strong>
              <p class="box">실비보험 = 실손보험 = 실손의료보험</p>
              <p>실손의료보험은 대상자가 질병·상해로 의료기관에 입원 또는 통원하여 치료를 받거나 처방조제를 받은 경우에 본인이 실제로 부담한 의료비를 보상*하는 상품입니다. 즉, 의료비에서 건강보험이 보장하지 않는 ‘급여본인부담금+비급여의료비’를 보장하는 보험입니다. 1999년 9월에 최초로 판매되었으며, 판매시기 및 담보구성에 따라 1세대, 2세대, 3세대, 4세대로 나뉩니다. </p>
              <ul>
                <li>1세대 실손의료보험: 2009년 10월 이전에 판매한 표준화 이전 실손(구실손)</li>
                <li>2세대 실손의료보험: 2009년 10월 ~ 2017년 3월까지 판매(표준화 실손)</li>
                <li>3세대 실손의료보험: 2017년 4월 이후 판매(착한 실손)</li>
                <li>4세대 실손의료보험: 2021년 7월부터 판매</li>
              </ul>
              <span>* 의료비 보상은 「국민건강보험법」에서 정한 요양급여 또는 「의료급여법」에서 정한 의료급여 중 본인부담금 및 「국민건강보험법」 또는 「의료급여법」에 따라 보건복지부장관이 정한 비급여의 합계액에서 약관에서 정한 자기부담을을 제외한 금액을 보상합니다.</span>
              <p>또한, 실손의료보험은 가입 대상자에 따라 크게 3가지 상품으로 구성되어 있습니다.</p>
              <b>대상</b>
              <p>실손의료보험: 누구나</p>
              <p>노후실손의료보험: 고령층, 50세 ~ 최대 75세(손해보험협회 기준) / 최대 80세(생명보험협회 기준)</p>
              <p>유병력자실손의료보험: 치료 이력이 있거나 경증 만성질환을 가진 유병력자</p>
              <strong>급여? 비급여?</strong>
              <b>급여</b>
              <p>급여란 국민건강보험에서 보장하는 진료비 항목으로 국민건강보험공단이 부담하는 부분(공단부담분)과  본인이 부담하는 부분(본임부담분)으로 구성됩니다. 실손의료보험은 통상 급여 본인부담분 가운데 자기부담금(보장대상의료비의 20%)를 차감한 금액을 보험금으로 지급합니다. 단, 통원의료비는 의료기관 급(級)별로 최소 본인부담금(1~2만원)을 함께 적용합니다.</p>
              <b>비급여</b>
              <p>비급여란 국민건강보험에서 급여로 인정되지 않아 개인이 의료비 전액을 부담해야 하는 진료비 항목입니다. 대표적으로 상급병실료 차액, MRI·MRA촬영비, 초으마 등이 비급여에 해당합니다. 실손의료보험은 통상 비급여의료비 가운데 자기부담금(보장대상의료비의 30%)를 차감한 금액을 보험금으로 지급합니다. 단, 통원의료비는 최소 본인부담금(3만원)을 함께 적용합니다.</p>
              <p>실손의료보험은 급여 실손의료비를 보장하는 기본형과 비급여 실손의료비를 보상하는 특별약관으로 구성되어 있습니다. 기본형은 상해급여와 질병급여, 특별약관은 상해비급여와 질병비급여 종목으로 구성되어 있으며, 3대비급여(도수치료·체외충격파치료·증식치료, 주사료, 자기공명영상진단)도 특별약관을 통해 담보됩니다.</p>
              <strong>실손형 보험과 정액형 보험의 차이</strong>
              <p>실손형 보험은 입원 또는 통원치료를 받을 때, 실제로 본인이 지출한 의료비를 보험가입금액 한도 내에서 지급하는 보험이고 정액형은 치료비 금액과 관계없이 보험사고가 발생하면 계약 당시 보상하기로 약정한 금액을 보험금으로 지급하는 보험입니다.</p>
              
              <strong>실손의료보험 비교공시</strong>
              <p>실손의료보험은 생명보험사와 손해보험사 관계없이 어느 곳에서든 가입 가능합니다.</p>
              <p>생명보험협회 공시실: <a href="https://pub.insure.or.kr/compareDis/prodCompare/assurance/list.do?search_prodGroup=024400010008" target="_blank">https://pub.insure.or.kr/compareDis/prodCompare/assurance/list.do?search_prodGroup=024400010008</a></p>
              <p>손해보험협회 공시실: <a href="https://kpub.knia.or.kr/productDisc/lostHealth/lostHealthDisclosure.do" target="_blank">https://kpub.knia.or.kr/productDisc/lostHealth/lostHealthDisclosure.do</a></p>
              <strong>실손의료보험 상품 가입 시 고려해볼 점</strong>
              <p>실손의료보험은 표준화가 되어 내용은 같습니다. 다만, 각 회사 별 위험관리 능력 등에 따라 보험료에 차이가 발생할 수 있으므로 소비자는 보험사 별 보험료, 보험료 인상률 및 손해율 등을 종합적으로 고려하여 자신에게 가장 적합한 상품을 선택하여 가입해야 합니다.<br>다만, 가입 시점에 보험료가 저렴하더라도 손해율*이 높으면 다음 해 보험료가 인상될 수 있다는 사실을 참고 바랍니다.</p>
            </div>

          <?php elseif ($menu == 2): ?>
            <h3 class="content_headline"><?=$sub[$sub_page]->title?></h3>
            <div class="content_box">
              <p>실손의료보험은 가입 대상자에 따라 크게 3가지 상품인 실손의료보험과 노후실손의료보험 그리고 유병력자실손의료보험으로  구성되어 있습니다.</p>
              <b>가입 대상</b>
              <p>실손의료보험: 누구나<br>노후실손의료보험: 고령층, 50세 ~ 최대 75세(손해보험협회 기준) / 최대 80세(생명보험협회 기준)<br>유병력자실손의료보험: 치료 이력이 있거나 경증 만성질환을 가진 유병력자</p>
              <p>** 다음의 내용은 보험사 중 두 곳에서 판매 중인 실손의료보험에 관한 것입니다</p>
              <b>S보험사 실손보험</b>
              <div class="table_reponsive">
                <table border="1">
                  <tr>
                    <th>명칭</th>
                    <th>구분</th>
                    <th>보험기간</th>
                    <th>보험료<br>납입기간</th>
                    <th>가입나이</th>
                    <th>보험료<br>납입주기</th>
                    <th>보장내용<br>변경주기</th>
                  </tr>
                  <tr>
                    <td rowspan="3">급여 실손의료비<br>보장보험</td>
                    <td>최초계약</td>
                    <td rowspan="3">1년</td>
                    <td rowspan="3">전기납</td>
                    <td>0 ~ 60세</td>
                    <td rowspan="3">월납,<br>3개월납,<br> 6개월납,<br> 연납</td>
                    <td rowspan="3">1 ~ 5년</td>
                  </tr>
                  <tr>
                    <td>재계약</td>
                    <td>5 ~ 99세</td>
                  </tr>
                  <tr>
                    <td>갱신계약</td>
                    <td>1 ~ 99세</td>
                  </tr>
                  <tr>
                    <td rowspan="3">노후실손의료비<br>보장보험</td>
                    <td>최초계약</td>
                    <td rowspan="3">1년</td>
                    <td rowspan="3">전기납</td>
                    <td>61 ~ 75세</td>
                    <td rowspan="3">월납,<br>3개월납,<br> 6개월납,<br> 연납</td>
                    <td rowspan="3">1 ~ 3년</td>
                  </tr>
                  <tr>
                    <td>재계약</td>
                    <td>64 ~ 99세</td>
                  </tr>
                  <tr>
                  <td>갱신계약</td>
                  <td>62 ~ 99세</td>
                </tr>
                </table>
              </div>
              <b>N보험사 실손보험</b>
              <div class="table_reponsive">
                <table border="1">
                  <tr>
                    <th>명칭</th>
                    <th>구분</th>
                    <th>보험기간</th>
                    <th>보험료<br>납입기간</th>
                    <th>가입나이</th>
                    <th>재가입나이</th>
                    <th>보험료<br>납입주기</th>
                    <th>보장내용<br>변경주기</th>
                  </tr>
                  <tr>
                    <td rowspan="2">유병력자<br> 실손의료비<br>보험</td>
                    <td>최초계약</td>
                    <td rowspan="2">1년</td>
                    <td rowspan="2">전기납</td>
                    <td>5 ~ 65세</td>
                    <td rowspan="2">8세 ~ <br>(재가입종료나이 - 1)세</td>
                    <td rowspan="2">월납,<br>3개월납,<br> 6개월납,<br> 연납</td>
                    <td rowspan="2">3년</td>
                  </tr>
                  <tr>
                    <td>갱신계약</td>
                    <td>6세 ~ <br>(재가입종료나이 - 1)세</td>
                  </tr>
                  <tr>
                    <td rowspan="2">실손의료비<br>보험</td>
                    <td>최초계약</td>
                    <td rowspan="2">1년</td>
                    <td rowspan="2">전기납</td>
                    <td>0 ~ 65세</td>
                    <td rowspan="2">5세 ~ <br>(재가입종료나이 - 1)세</td>
                    <td rowspan="2">월납,<br>3개월납,<br> 6개월납,<br> 연납</td>
                    <td rowspan="2">5년</td>
                  </tr>
                  <tr>
                    <td>재가입</td>
                    <td>1세 ~ <br>(재가입종료나이 - 1)세</td>
                  </tr>
                </table>
              </div>

              <strong>실손의료보험 상품 가입 시 고려해볼 점</strong>
              <p>실손의료보험은 표준화가 되어 보장내용은 같습니다. 다만, 각 회사 별 위험관리 능력 등에 따라 보험료에 차이가 발생할 수 있으므로 소비자는 보험사 별 보험료, 보험료 인상률 및 손해율 등을 종합적으로 고려하여 자신에게 가장 적합한 상품을 선택하여 가입해야 합니다.</p>
              <p>다만, 가입 시점에 보험료가 저렴하더라도 손해율*이 높으면 다음 해 보험료가 인상될 수 있다는 사실을 참고 바랍니다.<br>* 손해율= 가입자들에게 지급된 보험금(=지급보험금) / 가입자들의 위험보장을 위한 보험료(=위험보험료)</p>
              <strong>실비보험 실비보험 청구기간</strong>
              <p>보험에는 보험금 청구권의 소멸 시효가 있습니다. ​옛날엔 보험금을 청구할 수 있는 기간이 병원을 다녀온 시점으로 부터 2년이였는데, 지금은 3년으로 기간이 더 여유로워졌습니다.</p>
              <p>보험금 청구권 소멸 시효 : 보험금을 청구할 수 있는 유효기간</p>
              <b>청구 가능한 기간 : 의료비를 지출한 날부터 3년 이내</b>
              <div class="table_reponsive">
                <table border="1">
                  <tr>
                    <th>구분</th>
                    <th>구비서류</th>
                    <th>발급처</th>
                  </tr>
                  <tr>
                    <td rowspan="7">실비</td>
                    <td>
                      외래진료<br>
                      * 진단서 (액수가 높을 경우)<br>
                      * 진료비 세부내역서<br>
                      * 진료비 계산영수증<br>
                      * (간단한 비용) 통원진료확인서 ★
                    </td>
                    <td rowspan="3">의료기관</td>
                  </tr>
                  <tr>
                    <td>
                      처방조제<br>
                      * 진단서<br>
                      * 약제비 계산서 영수증
                    </td>
                  </tr>
                  <tr>
                    <td>
                      입원<br>
                      * 진단서<br>
                      * 진료비 세부내역서<br>
                      * 진료비 계산영수증
                    </td>
                  </tr>
                </table>
              </div>
              <p>본인 부담금 외래와 처방 합산 10만원 초과 : 병명 확인 서류 필요 <br>비급여 금액이 5만원 이상인 경우 : 진료비 세부내역서 필요</p>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </section>


  </main>
  <?php include ("./common/footer.php"); ?>
    
  </body>
  </html>
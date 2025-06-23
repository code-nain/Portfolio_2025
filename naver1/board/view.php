<?php 
  require_once("../connect_DB.php");
  require_once("./hits.php");
  
  $seq = $_GET['seq'];
  $sql = query("SELECT * FROM board_silbi WHERE seq = '$seq'");
  $article = $sql -> fetch_assoc();

  if ($_GET['seq']) {
		$sub_title = ' - '.$article['title'];
		$sub_description = ' '.$article['title'].' 페이지 입니다.';
	}
?>
<!DOCTYPE html>
<html lang="ko">
  <?php include ("../common/sub_content.php"); ?>
  <?php include ("../common/reset_head2.php"); ?>
  <body>
<?php include ("../common/header2.php"); ?>
<div class="view_main">

<section class="sc_from">
  <div class="inner">
    <?php include ("../common/form.php"); ?>
  </div>
</section>
<style>
  .sc_from{
    padding: 70px 0;
    background: #f5f5f5;
  }
</style>

<section class="sc_view">
  <div class="inner">
    <h4 class="article_title"><?=$article['title']?><span>조회수 : <?=$article['hits']?></span></h4>
    <div id="article">
      <div class="article_wrap">
        <div class="article_content"><?=$article['content']?></div>
      </div>
      <div class="article_btn_wrap">
        <!-- <a href="./edit.php?seq=<?=$seq?>" class="modify_btn">수정</a> -->
        <a href="javascript:history.back()" class="back_btn"><img src="../images/list.svg" alt="목록">목록</a>
      </div>
    </div>
  </div>
</section>
</div>

  <?php include "../common/footer2.php"; ?>
  
</body>
</html>
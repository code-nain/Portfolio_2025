<style>
    .sc_family{
        width: 100%;
        height: auto;
        padding: 40px 0;
        /* display: none; */
    }
    .sc_family .inner{
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 30px;
    }
    .sc_family .title{
        margin-bottom: 20px;
        font-size: 16px;
        font-weight: 700;
    }
    .sc_family .family_list{
        display: flex;
        gap: 15px 30px;
        flex-wrap: wrap;
    }
    .sc_family .family_list .family_item a{
        font-size: 14px;
    }
</style>

<?php 
  $url = 'https://sub.wkwk.kr/naver_site/family_site_simok.php';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);

  $domains = json_decode($output);
?>
<section class="sc_family">
  <div class="inner">
    <div class="title">[ 패밀리사이트 ]</div>
    <ul class="family_list">
      <?php foreach ($domains as $domain):?>
      <li class="family_item">
        <a href="<?=$domain->host?>" target="_blank"><?=$domain->name?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<script>
  // 패밀리사이트 리스트에서 현재 사이트 삭제하기
  const familySites = document.querySelectorAll('.family_item');
  const currentDomain = window.location.host;

  familySites.forEach(site => {
    const domain = site.children[0].href;
    const isSameDomain = domain.includes(currentDomain);
    if (isSameDomain) site.remove();
  })
</script>
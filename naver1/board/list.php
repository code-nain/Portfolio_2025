<?php
  /**  
   * ### 게시판 모듈 사용 가이드 ###
   * DB에 board_silbi 테이블 만들기 (seq, title, content, hits, reg_date, update_date)
   * 이미지 업로드를 하려면 editor/uploads 폴더에 777 권한 주기 (chmod 777)
   * 게시판 1페이지 당 몇 개의 게시글을 노출할지 정할 수 있음 ($view_number)
   * 하단의 페이지 번호(< 1 2 3 >)를 한 번에 몇 번까지 노출할지 정할 수 있음 ($maximum_pages)
   * 변수는 되도록이면 건드리지 말 것. 건드릴 수 있는 변수는 [*이 부분 직접 설정 가능]이라고 주석 달아놓음
   * 게시판의 번호는 idx, 실제 DB의 번호는 seq를 사용
   * → 따로 사용하는 이유는 중간에 글 하나가 삭제될 경우 (ex. 1-2-3-삭제-5) 삭제된 번호가 게시판 번호에서 비는 것을 방지하기 위함
   * */ 
  
  $users = array();
  $category = $_GET['category'];
  $search = $_GET['search'];
  $sql = query("SELECT * FROM board_silbi ORDER BY seq");

  if ($category === 'title') {
    $sql = query("SELECT * FROM board_silbi WHERE title LIKE '%$search%'");
  }

  else if ($category === 'content') {
    $sql = query("SELECT * FROM board_silbi WHERE content LIKE '%$search%'");
  }

  else if ($category === '') {
    $sql = query("SELECT * FROM board_silbi WHERE title LIKE '%$search%' OR content LIKE '%$search%'");
  }

  $idx = 1;
  while ($row = $sql -> fetch_assoc()) {
    $row['idx'] = $idx++; // 게시판 글번호 (실제 DB의 seq와 다름)
    $users[] = $row;
  }
  
  $view_number = 7; // 한 페이지 당 보이는 게시글 개수 [*이 부분 직접 설정 가능]
  $article_number = sizeof($users); // 게시글 DB의 전체 개수
  $current_page = $_GET['page'] ? $_GET['page'] : 1; // 현재 페이지
  $start_seq = $article_number - ($view_number * ($current_page - 1)); // 출력되는 게시글의 시작 시퀀스
  $end_seq = $start_seq - $view_number < 0 ? 0 : $start_seq - $view_number; // 출력되는 게시글의 마지막 시퀀스
  $total_page = ceil($article_number / $view_number); // 페이지 총 개수
?>

    <div id="search">
      <p class="search_title">검색 키워드</p>
      <form action="" method="GET">
        <input type="hidden" name="menu" value="3">
        <select name="category" id="category">
          <option value="" <?php echo $category === '' ? 'selected' : '' ?>>전체</option>
          <option value="title" <?php echo $category === 'title' ? 'selected' : '' ?>>제목</option>
          <option value="content" <?php echo $category === 'content' ? 'selected' : '' ?>>내용</option>
        </select>
        <input type="text" name="search" placeholder="검색어를 입력하세요" value="<?=$search?>">
        <button class="search"></button>
      </form>
    </div>
    <!-- 게시글 출력 부분 -->
    <table>
      <tr class="list">
        <th width="10%">번호</th>
        <th width="75%">제목</th>
        <th width="15%">조회수</th>
      </tr>
      <?php for ($i = $start_seq - 1; $i >= $end_seq; $i--): ?>
      <tr>
        <td class="seq"><?php echo $users[$i]['idx'] ?></td>
        <td class="title rss"><a href="./board/view.php?seq=<?=$users[$i]['seq']?>"><?php echo $users[$i]['title']; ?></a></td>
        <td class="hits"><?php echo $users[$i]['hits']; ?></td>
      </tr>
      <?php endfor; ?>
    </table>
    <?php if (!empty($search) && empty($users)): ?>
    <p class="empty_notice">검색 결과가 없습니다.</p>
    <?php endif; ?>
    <!-- 페이지네이션 부분 -->
    <div id="pagination">
      <ul id="pagination_inner">
        <?php for ($j = 1; $j <= $total_page; $j++): ?>
        <li><a href="./sub.php?menu=3&page=<?=$j?>" class="<?php echo $current_page == $j ? 'page_on' : ''; ?>"><?=$j?></a></li>
        <?php endfor; ?>
      </ul>
    </div>


<script>
  const paginationEl = document.getElementById('pagination_inner'); // ul 태그에 달아준다.
  const pagesEl = paginationEl.querySelectorAll('li');
  const totalPages = pagesEl.length; // 전체 페이지 개수
  const maximumPages = 10; // 한 화면에 보여지는 최대 페이지 개수 [*이 부분 직접 설정 가능]

  let currentPaginationId = sessionStorage.paginationId ? Number(sessionStorage.paginationId) : 1; // 현재 페이지네이션 ID
  let maxPaginationId = Math.ceil(totalPages / maximumPages); // 최대 페이지네이션 ID

  let endPage = maximumPages * currentPaginationId; // 현재 페이지네이션의 최대 페이지 번호
  let startPage = endPage - maximumPages; // 현재 페이지네이션의 최소 페이지 번호
  
  paginationInit();

  function paginationInit() {
    if (totalPages <= maximumPages) {
      // 전체 페이지 수가 한 화면에 보여지는 최대 페이지 개수보다 적을 때 - 이전/다음 버튼 무력화하기
      const pageBtnEl = document.querySelectorAll('.page_btn');
      pageBtnEl.forEach(btn => {
        btn.style.opacity = '0.3';
        btn.style.cursor = 'auto';
      });
    
    } else {
      for (let i = 0; i < totalPages; i++) {
        if (i >= startPage && i < endPage) {
          pagesEl[i].style.display = 'block';
          continue;
        };
        pagesEl[i].style.display = 'none';
      }
    }

    savePaginationId(); // 현재 페이지네이션 ID를 세션 스토리지에 저장
  }


  function nextPagination() {
    if (currentPaginationId >= maxPaginationId) return;
    currentPaginationId++;

    startPage += maximumPages;
    endPage += maximumPages;

    paginationInit();
  }

  function prevPagination() {
    if (currentPaginationId <= 1) return;
    currentPaginationId--;

    startPage -= maximumPages;
    endPage -= maximumPages;

    paginationInit();
  }

  function savePaginationId() {
    sessionStorage.paginationId = currentPaginationId;
  }

</script>

<?php 
  require_once ('../connect_DB.php');
  $seq = $_GET['seq'];
  $sql = query("SELECT * FROM board_silbi WHERE seq = '$seq'");
  $article = $sql -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>에디터</title>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="stylesheet" href="../css/board.css">
  <style>
    body {max-width: 1200px;}
    button {margin-top: 15px; font-size: 18px;}
    #editor_title {width: 100%; box-sizing: border-box; border: 1px solid #ccc; line-height: 1.2; padding: 10px 15px; margin-bottom: 5px; font-size: 15px; outline: none;}
    .ql-editor {height: calc(100vh - 150px) !important; min-height: 300px;}
  </style>
</head>
<body>
  <input type="text" id="editor_title" maxlength="50" placeholder="제목을 입력해주세요." value="<?=$article['title']?>">
  <div id="editor">
    
  </div>
  <button type="button" id="save_article" onclick="save()">수정하기</button>
  <button type="button" onclick="window.history.back()">수정취소</button>
  <script>
    const quill = new Quill('#editor', {
      theme: 'snow',
      modules: {
        toolbar: {
          container: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{color: []}, {background: []}],
            [{align: []}],
            ['link'],
            ['image'],
          ],
          handlers: {
            image: imageHandler,
          }
        }
      },
    });

    const articleContent = '<?php echo $article['content']; ?>';
    quill.root.innerHTML = articleContent;

    function save() {
      const text = document.querySelector('.ql-editor');
      const images = document.querySelectorAll('img');
      
      images.forEach(img => {
        if (!img.fileName) return;

        const nowDate = formatDateTime();
        const fileType = img.fileName.slice(img.fileName.lastIndexOf('.'));
        const fileName = img.fileName.replace(fileType, '') + `_${nowDate}` + fileType;

        img.srcBackup = img.src;
        img.src = `../editor/uploads/${fileName}`; // 경로가 달라질 경우 수정 필수
        uploadImage(img.file, fileName);
      })

      insertDB();

      images.forEach(img => {
        if (!img.srcBackup) return;
        img.src = img.srcBackup;
      })
    }

    function imageHandler() {
      const input = document.createElement('input');
      input.type = 'file';
      input.accept = 'image/jpeg, image/png';

      input.addEventListener('change', () => {
        const fileName = input.files[0].name; // 첨부한 file의 이름
        const image = document.createElement('img');
        image.src = URL.createObjectURL(input.files[0]);

        const editor = document.getElementsByClassName('ql-editor')[0];
        editor.appendChild(image);

        image.fileName = fileName;
        image.file = input.files[0];
      })

      input.click();
    }

    function uploadImage(file, fileName) {
      const formData = new FormData();
      formData.append('image', file);
      formData.append('fileName', fileName);

      fetch('../editor/upload_image.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        // console.log('이미지가 업로드되었습니다', result);
      })
      .catch(error => {
        // console.error('이미지 업로드 중 오류가 발생했습니다.', error);
      });
    }

    function insertDB() {
      const titleEl = document.getElementById('editor_title');
      const textEl = document.querySelector('.ql-editor');
      const currentSeq = new URLSearchParams(window.location.search).get('seq');

      $.ajax({
        type: "PUT",
        url: "./update_DB.php",
        data: {
          seq: currentSeq,
          title: titleEl.value,
          content: textEl.innerHTML,
        },
        success: function(data) {
          alert('수정이 완료되었습니다.');
          const viewLink = window.location.href.replace('edit.php', 'view.php');
          window.location.href = viewLink;
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }

    function formatDateTime() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const day = String(now.getDate()).padStart(2, '0');
      const hour = String(now.getHours()).padStart(2, '0');
      const minute = String(now.getMinutes()).padStart(2, '0');

      const formattedDateTime = `${year}${month}${day}${hour}${minute}`;

      return formattedDateTime;
    }
  </script>
</body>
</html>
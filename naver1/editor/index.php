<?php 
  $key = array_key_exists('key', $_GET) ? $_GET['key'] : '';

  if($key != '1777'){
    echo('fail');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>에디터</title>
  <link rel="stylesheet" href="./editor.css">
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
  <input type="text" id="editor_title" maxlength="50" placeholder="제목을 입력해주세요.">
  <div id="editor">
    
  </div>
  <button type="button" id="save_article" onclick="save()">저장하기</button>
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

    function save() {
      const text = document.querySelector('.ql-editor');
      const images = document.querySelectorAll('img');
      
      images.forEach(img => {
        const nowDate = formatDateTime();
        const fileType = img.fileName.slice(img.fileName.lastIndexOf('.'));
        const fileName = img.fileName.replace(fileType, '') + `_${nowDate}` + fileType;

        img.srcBackup = img.src;
        img.src = `../editor/uploads/${fileName}`; // 경로가 달라질 경우 수정 필수
        uploadImage(img.file, fileName);
      })

      insertDB();

      images.forEach(img => {
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

      fetch('upload_image.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.text())
      .then(result => {
        console.log('이미지가 업로드되었습니다', result);
      })
      .catch(error => {
        console.error('이미지 업로드 중 오류가 발생했습니다.', error);
      });
    }

    function insertDB() {
      const titleEl = document.getElementById('editor_title');
      const textEl = document.querySelector('.ql-editor');

      $.ajax({
        type: 'POST',
        url: './insert_DB.php',
        data: {
          title: titleEl.value,
          content: textEl.innerHTML,
        },
        success: function(data) {
          alert('저장이 완료되었습니다.');
          window.location.href = '../';
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
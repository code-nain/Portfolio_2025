<?php
  require_once("../connect_DB.php");

  $title = $_POST['title'];
  $content = $_POST['content'];

  $result = query("INSERT INTO `board_silbi` (title, content) VALUES ('{$title}', '{$content}')");
?>
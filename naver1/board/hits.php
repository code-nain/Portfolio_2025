<?php
session_start();

if (!isset($_SESSION['visited_posts'])) {
  $_SESSION['visited_posts'] = array();
}

if (isset($_GET['seq'])) {
  $post_id = $_GET['seq'];
  
  if (!in_array($post_id, $_SESSION['visited_posts'])) {
    increasePostViews($post_id);
    $_SESSION['visited_posts'][] = $post_id;
  }
}

function increasePostViews($post_id) {
  query("UPDATE board_silbi SET hits = hits + 1 WHERE seq = '$post_id'");
}
?>

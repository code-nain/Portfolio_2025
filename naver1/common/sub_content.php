<?php 
  $menu = isset($_GET['menu']) ? intval($_GET['menu']) : 0;
  $sub_page = $menu - 1;
  $sub = [];
  
  // header
  $titles = [
    '실비보험이란',
    '보험 가입 준비',
  ];
  
  for ($i = 0; $i < count($titles); $i++) {
    $sub_obj = new stdClass();
    $sub_obj->title = $titles[$i];
    // $sub_obj->list = $sub_lists[$i];
    $sub[] = $sub_obj;
  }  
?>
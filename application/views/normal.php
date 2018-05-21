<?php 
  include 'template/header.php';
  include 'template/normal_left_sidebar.php';
  $pages =  "normal/".$page.".php";
  include $pages;
  include 'template/footer.php';
 ?>
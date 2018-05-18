<?php 
  include 'template/header.php';
  include 'template/manager_left_sidebar.php';
  $pages ="manager/".$page.".php";
  include $pages;
  include 'template/footer.php';

 ?>
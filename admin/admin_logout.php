<?php
  session_start();
  if ($_SESSION['is_admin_login'] != true) {
	header('location: admin_login.php');
  }
   session_start();
   session_destroy();
   header('location:admin_index.php');
?>
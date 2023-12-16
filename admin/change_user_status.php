<?php
  session_start();
  if ($_SESSION['is_admin_login'] != true) {
	header('location: admin_login.php');
  }
include_once('../db_conf/connection.php');
$id = $_GET['id'];
$status = $_GET['status'];
$user_type=$_GET['user_type'];
$update="UPDATE tbl_user_registration SET status=$status WHERE id=$id";
$update_query=mysqli_query($connection,$update);

if($user_type==0){
    header('location:admin_users.php?user_type=0');
}
else{
header('location:admin_users.php?user_type=1');

}
?>
<?php include_once('./db_conf/connection.php');
$mob_cart_id = $_GET['mob_cart_id'];
$delete = "DELETE FROM tbl_user_cart WHERE id=$mob_cart_id";
$check_delete = mysqli_query($connection, $delete);
if ($check_delete) 
{
    header('location:view_cart.php');
} else 
{
?>
    <script>
        alert("product not delete");
    </script>
<?php
}
?>
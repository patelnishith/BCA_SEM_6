<?php include_once('./db_conf/connection.php');
$mob_orders_id = $_GET['mob_orders_id'];
$delete = "DELETE FROM tbl_orders WHERE id=$mob_orders_id";
$check_delete = mysqli_query($connection, $delete);
if ($check_delete) 
{
    header('location:user_orders.php');
} else 
{
?>
    <script>
        alert("product not delete");
    </script>
<?php
}
?>
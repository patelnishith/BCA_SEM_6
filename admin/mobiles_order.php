<?php
session_start();
if ($_SESSION['is_admin_login'] != true) {
    header('location: admin_login.php');
}
?>

<?php include_once('../db_conf/connection.php') ?>
<?php include_once('admin_header.php') ?>
<?php include_once('admin_aside.php') ?>
<?php
$show_mob = "SELECT tbl_orders.id, tbl_mobiles.product_name,tbl_orders.full_name,tbl_mobiles.price,tbl_mobiles.discount,tbl_orders.type,tbl_orders.mobile_no,tbl_orders.address,tbl_mobiles.available_stock  FROM tbl_orders INNER JOIN tbl_mobiles ON tbl_orders.p_id=tbl_mobiles.id ORDER BY tbl_orders.created_at DESC";
$check_show_mob = mysqli_query($connection, $show_mob);
$count = mysqli_num_rows($check_show_mob);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="view_orders.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">
    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('mobiles_order').classList.add("active");
        }
    </script>
</head>

<body>
    <div class="admin-table">
        <?php
        if ($count > 0) {
        ?>
            <div class="scroll_table">
                <table>
                    <thead>
                        <tr>
                            <th class="text-elipssis-mode w-10">product<br>name</th>
                            <th class="text-elipssis-mode w-10">delivary to</th>
                            <th class="text-elipssis-mode w-10">price</th>
                            <th class="text-elipssis-mode w-10">type</th>
                            <th class="text-elipssis-mode w-10">discount</th>
                            <th class="text-elipssis-mode w-10">phone no</th>
                            <th class="text-elipssis-mode w-20">address</th>
                            <th class="text-elipssis-mode w-10">available<br>stock</th>
                            <th class="text-elipssis-mode w-10">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($response = mysqli_fetch_array($check_show_mob)) {
                        ?>
                            <tr>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['product_name'] ?>"><?php echo $response['product_name'] ?></td>

                                <td class="text-elipssis-mode w-10" title="<?php echo $response['full_name'] ?>"><?php echo $response['full_name'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['price'] ?>"><?php echo $response['price'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['type'] ?>"><?php echo $response['type'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['discount'] ?>"><?php echo $response['discount'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['mobile_no'] ?>"><?php echo $response['mobile_no'] ?></td>
                                <td class="text-elipssis-mode w-20" title="<?php echo $response['address'] ?>"><?php echo $response['address'] ?></td>
                                <?php
                                if ($response['available_stock'] > 0) {
                                ?>
                                    <td class="text-elipssis-mode w-10" title="<?php echo $response['available_stock'] ?>"><?php echo $response['available_stock'] ?></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-elipssis-mode w-10" style="
                                color:red;">stock finished</td>

                                <?php
                                }
                                ?>

                                <td class="text-elipssis-mode w-10">
                                    <a href="delete_orders_mobile.php?id=<?php echo $response['id'] ?>" title="DELETE" class="delete-icon"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        <?php
        } else {
        ?>
            <div class="no_data">
                <img src="../assets/image/empty-animation-staff.gif" alt="">
                <p>oops! no data</p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
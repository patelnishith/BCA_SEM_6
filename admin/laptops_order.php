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
$show_lap = "SELECT tbl_orders.id, tbl_laptops.model_name,tbl_orders.full_name,tbl_laptops.price,tbl_laptops.discount,tbl_orders.type,tbl_orders.mobile_no,tbl_orders.address,tbl_laptops.available_stock FROM tbl_orders INNER JOIN tbl_laptops ON tbl_orders.p_id=tbl_laptops.id ORDER BY tbl_orders.created_at DESC";
$check_show_lap = mysqli_query($connection, $show_lap);
$count=mysqli_num_rows($check_show_lap);
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
            document.getElementById('laptops_order').classList.add("active");
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
                        while ($result = mysqli_fetch_array($check_show_lap)) {
                        ?>
                            <tr>
                                <td class="text-elipssis-mode w-10" title="<?php echo $result['model_name'] ?>"><?php echo $result['model_name'] ?></td>

                                <td class="text-elipssis-mode w-10" title="<?php echo $result['full_name'] ?>"><?php echo $result['full_name'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $result['price'] ?>"><?php echo $result['price'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $result['type'] ?>"><?php echo $result['type'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $result['discount'] ?>"><?php echo $result['discount'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $result['mobile_no'] ?>"><?php echo $result['mobile_no'] ?></td>
                                <td class="text-elipssis-mode w-20" title="<?php echo $result['address'] ?>"><?php echo $result['address'] ?></td>
                                <?php
                                if ($result['available_stock'] > 0) {
                                ?>
                                    <td class="text-elipssis-mode w-10" title="<?php echo $result['available_stock'] ?>"><?php echo $result['available_stock'] ?></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-elipssis-mode w-10" style="
                                color:red;">stock finished</td>

                                <?php
                                }
                                ?>

                                <td class="text-elipssis-mode w-10">
                                    <a href="delete_orders_lap.php?id=<?php echo $result['id'] ?>" title="DELETE" class="delete-icon"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }else{
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
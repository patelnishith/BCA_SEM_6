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
$show = "SELECT tbl_mobiles.id, tbl_user_registration.first_name,tbl_user_registration.last_name,tbl_mobiles.id,tbl_mobiles.product_img,tbl_mobiles.company_name,tbl_mobiles.product_name,tbl_mobiles.price,tbl_mobiles.discount,tbl_mobiles.available_stock,tbl_mobiles.created_at,tbl_mobiles.created_by,tbl_mobiles.updated_at,tbl_mobiles.updated_by FROM tbl_mobiles INNER JOIN tbl_user_registration ON tbl_user_registration.id=tbl_mobiles.created_by";
$check_show = mysqli_query($connection, $show);
$count=mysqli_num_rows($check_show);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="mobile_list.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('mobiles').classList.add("active");
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
                            <th class="text-elipssis-mode w-10">company<br>name</th>
                            <th class="text-elipssis-mode w-10">product<br>name</th>
                            <th class="text-elipssis-mode w-10">price</th>
                            <th class="text-elipssis-mode w-10">discount</th>
                            <th class="text-elipssis-mode w-10">available<br>stock</th>
                            <th class="text-elipssis-mode w-20">created</th>
                            <th class="text-elipssis-mode w-20">updated</th>
                            <th class="text-elipssis-mode w-10">operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($response = mysqli_fetch_array($check_show)) {
                        ?>
                            <tr>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['company_name'] ?>"><?php echo $response['company_name'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['product_name'] ?>"><?php echo $response['product_name'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['price'] ?>"><?php echo $response['price'] ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['discount'] ?>"><?php echo $response['discount'] ?></td>
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
                                <td class="text-elipssis-mode w-20" title="<?php
                                                                            echo $response['first_name'];
                                                                            echo $response['last_name'];
                                                                            echo date('d/m/Y h:i:s', strtotime($response['created_at'])); ?>">
                                    <?php
                                    echo $response['first_name'];
                                    echo $response['last_name'];
                                    ?>
                                    <br>
                                    <?php
                                    echo date('d/m/Y h:i:s', strtotime($response['created_at'])) ?>
                                </td>
                                <td class="text-elipssis-mode w-20" title="<?php
                                                                            echo $response['first_name'];
                                                                            echo $response['last_name'];
                                                                            echo date('d/m/Y h:i:s', strtotime($response['updated_at'])); ?>">
                                    <?php
                                    echo $response['first_name'];
                                    echo $response['last_name'];
                                    ?>
                                    <br>
                                    <?php
                                    echo date('d/m/Y h:i:s', strtotime($response['updated_at'])) ?>
                                </td>
                                <td class="text-elipssis-mode w-10">
                                    <a href="delete_mobile.php?id=<?php echo $response['id'] ?> & p_img=<?php echo $response['product_img']; ?>" title="DELETE" class="delete-icon"><i class="fas fa-trash"></i></a>
                                    <a href="update_mobile.php?id=<?php echo $response['id'] ?>" title="UPDATE" class="update-icon"><i class="fas fa-edit"></i></a>
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
        <a href="add_mobiles.php" id="addmobilebtn" title="Add mobile">
            <i class="fas fa-plus"></i>
        </a>
    </div>

</body>

</html>
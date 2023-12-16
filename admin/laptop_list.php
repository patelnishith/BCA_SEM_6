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
$show = "SELECT tbl_user_registration.first_name,tbl_user_registration.last_name,tbl_laptops.id,tbl_laptops.company_name,tbl_laptops.product_img,tbl_laptops.model_name,tbl_laptops.price,tbl_laptops.discount,tbl_laptops.available_stock,tbl_laptops.created_at,tbl_laptops.created_by,tbl_laptops.updated_at,tbl_laptops.updated_by FROM tbl_laptops INNER JOIN tbl_user_registration ON tbl_user_registration.id=tbl_laptops.created_by";
$check_show = mysqli_query($connection, $show);
$count = mysqli_num_rows($check_show);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="laptop_list.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('laptops').classList.add("active");
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
                        <th class="w-10">company <br> name</th>
                        <th class="w-10">model <br> name</th>
                        <th class="w-10">price</th>
                        <th class="w-10">discount</th>
                        <th class="w-10">available <br>stock</th>
                        <th class="w-20">created</th>
                        <th class="w-20">updated</th>
                        <th class="w-10">operation</th>
                    </thead>
                    <tbody>

                        <?php
                        while ($response = mysqli_fetch_array($check_show)) {
                        ?>
                            <tr>
                                <td class="w-10 text-elipssis-mode" title="<?php echo $response['company_name'] ?>"><?php echo $response['company_name'] ?></td>
                                <td class="w-10 text-elipssis-mode" title="<?php echo $response['model_name'] ?>"><?php echo $response['model_name'] ?></td>
                                <td class="w-10 text-elipssis-mode" title="<?php echo $response['price'] ?>"><?php echo $response['price'] ?></td>
                                <td class="w-10 text-elipssis-mode" title="<?php echo $response['discount'] ?>"><?php echo $response['discount'] ?></td>

                                <?php
                                if ($response['available_stock'] > 0) {
                                ?>
                                    <td class="w-10 text-elipssis-mode" title="<?php echo $response['available_stock'] ?>"><?php echo $response['available_stock'] ?></td>
                                <?php
                                } else {
                                ?>
                                    <td class="w-10 text-elipssis-mode" style="color: red">stock finished</td>
                                <?php
                                }
                                ?>
                                <td class="w-20 text-elipssis-mode" title="<?php echo $response['first_name'];
                                                                            echo $response['last_name'];
                                                                            echo $response['created_at'] ?>"><?php echo $response['first_name'] . ' ';
                                                                                                                echo $response['last_name']; ?><br><?php echo date('d/m/Y h:i:s', strtotime($response['created_at'])) ?></td>
                                <td class="w-20 text-elipssis-mode" title="<?php echo $response['first_name'];
                                                                            echo $response['last_name'];
                                                                            echo $response['updated_at'] ?>"><?php echo $response['first_name'] . ' ';
                                                                                                                echo $response['last_name']; ?><br><?php echo date('d/m/Y h:i:s', strtotime($response['updated_at'])) ?></td>
                                <td class="text-elipssis-mode w-10">
                                    <a href="delete_laptop.php?id=<?php echo $response['id']; ?>" title="DELETE" class="delete-icon"><i class="fas fa-trash"></i></a>
                                    <a href="update_laptop.php?id=<?php echo $response['id']; ?>" title="UPDATE" class="update-icon"><i class="fas fa-edit"></i></a>
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
        <a href="add_laptops.php" id="addlaptopbtn" title="Add laptop">
                    <i class="fas fa-plus"></i>
                </a>
    </div>
</body>

</html>
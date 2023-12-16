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
$user_type = $_GET['user_type'];
$select = " SELECT * FROM tbl_user_registration WHERE is_super_admin=$user_type  ORDER BY created_at DESC ";
$select_query = mysqli_query($connection, $select);
$count = mysqli_num_rows($select_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="admin_users.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">


    <!-- script for active side menu dynamically -->
    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            <?php
            if ($user_type == 0) {
            ?>
                document.getElementById('users').classList.add("active");
            <?php
            } else {
            ?>
                document.getElementById('superusers').classList.add("active");
            <?php
            }
            ?>
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
                            <th class="text-elipssis-mode w-10">first name</th>
                            <th class="text-elipssis-mode w-10">last name</th>
                            <th class="text-elipssis-mode w-15">email</th>
                            <th class="text-elipssis-mode w-10">phone no</th>
                            <th class="text-elipssis-mode w-10">gender</th>
                            <?php
                            if ($user_type == 0) {
                            ?>
                                <th class="text-elipssis-mode w-20">address</th>
                                <th class="text-elipssis-mode w-10">pincode no</th>
                            <?php
                            }
                            ?>
                            <th class="text-elipssis-mode w-10" colspan="2" >operation</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($response = mysqli_fetch_array($select_query)) {
                        ?>
                            <tr>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['first_name']; ?>"><?php echo $response['first_name']; ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['last_name']; ?>"><?php echo $response['last_name']; ?></td>
                                <td class="text-elipssis-mode w-15" title="<?php echo $response['email']; ?>"><?php echo $response['email']; ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['phone_no']; ?>"><?php echo $response['phone_no']; ?></td>
                                <td class="text-elipssis-mode w-10" title="<?php echo $response['gender']; ?>"><?php echo $response['gender'] == 0 ? 'Male' : 'Female' ?></td>
                                <?php
                                if ($user_type == 0) {
                                ?>
                                    <td class="text-elipssis-mode w-20" title="<?php echo $response['address']; ?>"><?php echo $response['address']; ?></td>
                                    <td class="text-elipssis-mode w-10" title="<?php echo $response['pincode_no']; ?>"><?php echo $response['pincode_no']; ?></td>
                                <?php
                                }
                                ?>
                                <td class="text-elipssis-mode" title=""><a href="change_user_status.php?id=<?php echo $response['id']; ?>&status=0&user_type=<?php echo $response['is_super_admin'] ?>" class=" text-active-deactive <?php echo $response['status'] == 0 ? "text-success" : ""; ?>">active</a></td>
                                <td class="text-elipssis-mode" title=""><a href="change_user_status.php?id=<?php echo $response['id']; ?>&status=1&user_type=<?php echo $response['is_super_admin'] ?>" class=" text-active-deactive <?php echo $response['status'] == 1 ? "text-denger" : ""; ?>">deactive</a></td>
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
            <img src="../assets/image/empty-animation-staff.gif" alt="">
            <?php
        }
        ?>
        <!-- super admin registration start -->
        <?php
        if ($user_type == 1) {
        ?>
            <a href="admin_super_user.php" id="superadminbtn" title="Add super admin">
                <i class="fas fa-plus"></i>
            </a>
        <?php
        }
        ?>
        <!-- super admin registration end -->
    </div>

</body>

</html>
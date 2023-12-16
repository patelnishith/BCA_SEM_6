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
$select = "SELECT * FROM tbl_contact ORDER BY created_at DESC";
$select_query = mysqli_query($connection, $select);
$count=mysqli_num_rows($select_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="admin_feedback.css">
    <link rel="stylesheet" href="admin_style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    
    <!-- script for active side menu dynamically -->
    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('feedback').classList.add("active");
        }
    </script>
</head>

<body>
    <div class="admin-table">
      <?php
      if($count>0){
          ?>
             <div class="scroll_table">
            <table>
                <thead>
                    <tr>
                        <th class="w-25 text-elipssis-mode">name</th>
                        <th class="w-20 text-elipssis-mode">email</th>
                        <th class="w-30 text-elipssis-mode">message</th>
                        <th class="w-15 text-elipssis-mode">cur-time</th>
                        <th class="w-10 text-elipssis-mode">operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($response = mysqli_fetch_array($select_query)) {
                    ?>
                        <tr>
                            <td class="w-25 text-elipssis-mode" title="<?php echo $response['name']; ?>"><?php echo $response['name']; ?></td>
                            <td class="w-20 text-elipssis-mode" title="<?php echo $response['email']; ?>"><?php echo $response['email']; ?></td>
                            <td class="w-30 text-elipssis-mode" title="<?php echo $response['message']; ?>"><?php echo $response['message']; ?></td>
                            <td class="w-15 text-elipssis-mode" title="<?php echo date('d/m/Y h:i:s', strtotime($response['created_at'])) ?>"><?php echo date('d/m/Y h:i:s', strtotime($response['created_at'])) ?></td>
                            <td class="w-10 text-elipssis-mode" style="text-align: center;"><a href="admin_delete.php?id=<?php echo $response['id']; ?>" title="delete" class="admin-btn"><i class="fa fa-trash admin-second-btn-delete"></i></a></td>
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
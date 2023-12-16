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
$id = $_GET['id'];
$select = "SELECT * FROM tbl_laptops WHERE id= $id";
$check_show = mysqli_query($connection, $select);
$array_data = mysqli_fetch_array($check_show);
if (isset($_POST['submit'])) {

    $id_update = $_GET['id'];

    $company_name = $_POST['company_name'];
    $model_name = $_POST['model_name'];
    $product_img = $_FILES['product_img'];
    $description = $_POST['description'];
    $processor = $_POST['processor'];
    $display = $_POST['display'];
    $memory_storage = $_POST['memory_storage'];
    $design_battery = $_POST['design_battery'];
    $ports_cd_drive = $_POST['ports_cd_drive'];
    $cooling = $_POST['cooling'];
    $operating_system = $_POST['operating_system'];
    $inside_the_box = $_POST['inside_the_box'];
    $weight = $_POST['weight'];
    $graphics = $_POST['graphics'];
    $warranty = $_POST['warranty'];
    $keyboard = $_POST['keyboard'];
    $audio = $_POST['audio'];
    $camera = $_POST['camera'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $available_stock = $_POST['available_stock'];
    $super_admin_id = $_SESSION['admin_id'];

    $file_name = $product_img['name'];
    $tmp_name = $product_img['tmp_name'];
    if ($tmp_name != "") {
        $devide_image_extension = explode(".", $file_name);
        $check_extension = strtolower(end($devide_image_extension));
        $image_array = array('png', 'jpg', 'jpeg');
        if (in_array($check_extension, $image_array)) {

            $upload_img = "./images/laptops/" . $file_name;
            move_uploaded_file($tmp_name, $upload_img);

            $update = "UPDATE tbl_laptops SET company_name='$company_name',model_name='$model_name',product_img='$file_name',description='$description',processor='$processor',display='$display',memory_storage='$memory_storage',design_battery='$design_battery',ports_cd_drive='$ports_cd_drive',cooling='$cooling',operating_system='$operating_system',inside_the_box='$inside_the_box',weight='$weight',graphics='$graphics',warranty='$warranty',keyboard='$keyboard',audio='$audio',camera='$camera',price='$price',discount='$discount',available_stock='$available_stock',updated_by=$super_admin_id WHERE id=$id_update";
        } else {
?>
            <script>
                alert("image extension not valid");
            </script>
        <?php
            return false;
        }
    } else {
        $update = "UPDATE tbl_laptops SET company_name='$company_name',model_name='$model_name',description='$description',processor='$processor',display='$display',memory_storage='$memory_storage',design_battery='$design_battery',ports_cd_drive='$ports_cd_drive',cooling='$cooling',operating_system='$operating_system',inside_the_box='$inside_the_box',weight='$weight',graphics='$graphics',warranty='$warranty',keyboard='$keyboard',audio='$audio',camera='$camera',price='$price',discount='$discount',available_stock='$available_stock',updated_by='$super_admin_id' WHERE id=$id_update";
    }
    $check_update = mysqli_query($connection, $update);
    if ($check_update) {
        ?>
        <script>
            alert("update done");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("update not done");
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="add_laptops.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <!-- script for active side menu dynamically -->
    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('laptops').classList.add("active");
        }
    </script>
</head>

<body>
    <div class="w-100">
        <form class="w-75" enctype="multipart/form-data" autocomplete="off" method="POST">
            <h2 class="text-capitalize mb-1"><i class="fas fa-laptop pr-2"></i>add laptops</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="company_name">company name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="company_name" placeholder="Company Name..." name="company_name" value="<?php echo $array_data['company_name'] ?>">

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="model_name">model name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="model_name" placeholder="Model Name..." name="model_name" value="<?php echo $array_data['model_name'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="product_img">product img:</label>
                        <input type="file" class="form-control w-100 mt-1 p-2" id="product_img" name="product_img"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="description">description:</label>
                        <input name="description" class="form-control mt-1 p-2" id="description" rows="1" placeholder="Description..." value="<?php echo $array_data['description'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="processor">Processor:</label>
                        <input name="processor" class="form-control mt-1 p-2" id="processor" rows="1" placeholder="Processor..." value="<?php echo $array_data['processor'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="display">Display:</label>
                        <input name="display" class="form-control mt-1 p-2" id="display" rows="1" placeholder="Display..." value="<?php echo $array_data['display'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="memory_storage">Memory and Storage:</label>
                        <input name="memory_storage" class="form-control mt-1 p-2" id="memory_storage" rows="1" placeholder="Memory and Storage..." value="<?php echo $array_data['memory_storage'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="design_battery">Design and Battery:</label>
                        <input name="design_battery" class="form-control mt-1 p-2" id="design_battery" rows="1" placeholder="Design and Battery..." value="<?php echo $array_data['design_battery'] ?>"></input>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="ports_cd_drive">Ports and CD Drive:</label>
                        <input name="ports_cd_drive" class="form-control w-100 mt-1 p-2" id="ports_cd_drive" rows="1" placeholder="Ports and CD Drive..." value="<?php echo $array_data['ports_cd_drive'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="cooling">Cooling:</label>
                        <input name="cooling" id="cooling" rows="1" class="form-control w-100 mt-1 p-2" placeholder="Cooling..." value="<?php echo $array_data['cooling'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="operating_system">Operating System:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="operating_system" placeholder="Operating System..." name="operating_system" value="<?php echo $array_data['operating_system'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="inside_the_box">Inside the box:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="inside_the_box" placeholder="Inside the box..." name="inside_the_box" value="<?php echo $array_data['inside_the_box'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="weight">Weight:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="weight" placeholder="Weight..." name="weight" value="<?php echo $array_data['weight'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="graphics">Graphics:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="graphics" placeholder="Graphics..." name="graphics" value="<?php echo $array_data['graphics'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="warranty">Warranty:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="warranty" placeholder="Warranty..." name="warranty" value="<?php echo $array_data['warranty'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="keyboard">Keyboard:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="keyboard" placeholder="Keyboard..." name="keyboard" value="<?php echo $array_data['keyboard'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="audio">Audio:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="audio" placeholder="Audio..." name="audio" value="<?php echo $array_data['audio'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="camera">Camera:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="camera" placeholder="Camera..." name="camera" value="<?php echo $array_data['camera'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="price">price:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="price" placeholder="Price..." name="price" value="<?php echo $array_data['price'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="discount">discount:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="discount" placeholder="Discount..." name="discount" value="<?php echo $array_data['discount'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="available_stock">available stock:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="available_stock" placeholder="Available Stock..." name="available_stock" value="<?php echo $array_data['available_stock'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="w-50 p-1 mt-1">
                        <button type="submit" class="btn btn-primary py-2" name="submit">Update</button>
                    </div>
                </div>
        </form>
    </div>
</body>

</html>
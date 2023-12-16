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

$select = "SELECT * FROM tbl_mobiles WHERE id=$id";
$check_show = mysqli_query($connection, $select);
$array_data = mysqli_fetch_array($check_show);
if (isset($_POST['submit'])) {

    $id_update = $_GET['id'];

    $company_name = $_POST['company_name'];
    $product_name = $_POST['product_name'];
    $product_img = $_FILES['product_img'];
    $description = $_POST['description'];
    $display = $_POST['display'];
    $memory_storage = $_POST['memory_storage'];
    $battery = $_POST['battery'];
    $os = $_POST['os'];
    $camera = $_POST['camera'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $sim = $_POST['sim'];
    $processor = $_POST['processor'];
    $discount = $_POST['discount'];
    $available_stock = $_POST['available_stock'];
    $inside_the_box = $_POST['inside_the_box'];
    $warranty = $_POST['warranty'];
    $super_admin_id = $_SESSION['admin_id'];

    $file_name = $product_img['name'];
    $tmp_name = $product_img['tmp_name'];
    if ($tmp_name != "") {

        $product_img_extension = explode('.', $file_name);
        $check_extension = strtolower(end($product_img_extension));

        $product_img_array = array('png', 'jpg', 'jpeg');

        if (in_array($check_extension, $product_img_array)) {
            $upload_img = "./images/mobiles/" . $file_name;
            move_uploaded_file($tmp_name, $upload_img);
            $update = "UPDATE tbl_mobiles SET product_img = '$file_name', company_name = '$company_name', product_name = '$product_name', description = '$description', display = '$display', memory_and_storage = '$memory_storage', battery = '$battery', os = '$os', camera = '$camera', price = '$price', sim = '$sim', processor = '$processor', weight = '$weight', discount = '$discount', available_stock = '$available_stock', inside_the_box = '$inside_the_box', warranty = '$warranty', updated_by = '$super_admin_id' WHERE id = $id_update";
        } else {
?>
            <script>
                alert("image extension not valid");
            </script>
        <?php
            return false;
        }
    } else {

        $update = "UPDATE tbl_mobiles SET  company_name = '$company_name', product_name = '$product_name', description = '$description', display = '$display', memory_and_storage = '$memory_storage', battery = '$battery', os = '$os', camera = '$camera', price = '$price', sim = '$sim', processor = '$processor', weight = '$weight', discount = '$discount', available_stock = '$available_stock', inside_the_box = '$inside_the_box', warranty = '$warranty', updated_by = '$super_admin_id' WHERE id = $id_update";
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
    <link rel="stylesheet" href="add_mobiles.css">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <!-- script for active side menu dynamically -->
    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('mobiles').classList.add("active");
        }
    </script>
</head>

<body>
    <div class="w-100">
        <form class="w-75" action="" autocomplete="off" method="POST" enctype="multipart/form-data">
            <h2 class="text-capitalize mb-1"><i class="fas fa-mobile-alt pr-2"></i>add mobiles</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="company_name">company name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="company_name" placeholder="Company Name..." name="company_name" value="<?php echo $array_data['company_name'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="product_name">product name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="product_name" placeholder="Product Name..." name="product_name" value="<?php echo $array_data['product_name'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="product_img">product img:</label>
                        <input type="file" class="form-control w-100 mt-1 pb-2 p-1" id="product_img" name="product_img" value="<?php echo $array_data['product_img'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="description">description:</label>
                        <input name="description" class="form-control mt-1 p-2" id="description" rows="2" placeholder="Description..." value="<?php echo $array_data['description'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1 d-flex flex-column">
                        <label for="display">Display:</label>
                        <input name="display" class="form-control mt-1 p-2" id="display" rows="2" placeholder="Display..." value="<?php echo $array_data['display'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="memory_storage">Memory and Storage:</label>
                        <input name="memory_storage" class="form-control mt-1 p-2" id="memory_storage" rows="2" placeholder="Memory and Storage..." value="<?php echo $array_data['memory_and_storage'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="battery">battery:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="battery" placeholder="Battery..." name="battery" value="<?php echo $array_data['battery'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="os">OS:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="os" placeholder="OS..." name="os" value="<?php echo $array_data['os'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="camera">Camera:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="camera" placeholder="Camera..." name="camera" value="<?php echo $array_data['camera'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="price">price:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="price" placeholder="Price..." name="price" value="<?php echo $array_data['price'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="weight">Weight:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="weight" placeholder="Weight..." name="weight" value="<?php echo $array_data['weight'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="weight">Sim:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="weight" placeholder="Sim..." name="sim" value="<?php echo $array_data['sim'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="weight">Processor:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="weight" placeholder="Processor..." name="processor" value="<?php echo $array_data['processor'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="discount">discount:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="discount" placeholder="Discount..." name="discount" value="<?php echo $array_data['discount'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="available_stock">available stock:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="available_stock" placeholder="Available Stock..." name="available_stock" value="<?php echo $array_data['available_stock'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="inside_the_box">Inside the box:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="inside_the_box" placeholder="Inside the box..." name="inside_the_box" value="<?php echo $array_data['inside_the_box'] ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group p-1">
                        <label for="warranty">Warranty:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="warranty" placeholder="Warranty..." name="warranty" value="<?php echo $array_data['warranty'] ?>">
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
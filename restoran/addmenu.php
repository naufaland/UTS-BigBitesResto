<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $name = $_POST['nama'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $price = $_POST['harga'];

    $q_insert = "INSERT INTO menu(nama, category, image, harga) VALUES('$name', '$category', '$image', '$price')";
    $q_run = mysqli_query($con, $q_insert);
    
    if($q_run){
        header('location: admin.php');
    } else {
        echo "Data Failed";
    }
}
?>

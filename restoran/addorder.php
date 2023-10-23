<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['id']) ){
    $id = $_GET['id'];
    $q_get = "SELECT * FROM menu WHERE id = $id";
    $q_run1 = mysqli_query($con, $q_get);
    while ($row = mysqli_fetch_array($q_run1)) {
        $name = $row['nama'];
        $userId = $_SESSION['id'];
        $image = $row['image'];
        $price = $row['harga'];
    
        $q_insert = "INSERT INTO `order`(nama, user_id, image, harga) VALUES('$name', $userId, '$image', '$price')";
        $q_run = mysqli_query($con, $q_insert);
        
        if($q_run){
            header('location: index.php');
        } else {
            echo "Data Failed";
        }
    }

}
?>

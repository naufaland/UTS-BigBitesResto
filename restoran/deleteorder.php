<?php
include('config.php');

if(isset($_GET['id']) && isset($_GET['nama'])){
	$id = $_GET['id'];
    $nama = $_GET['nama'];
$delete = "DELETE FROM `order` WHERE nama = '$nama' AND user_id = $id LIMIT 1";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:order.php');
}else{
	echo "Do not Delete";
}
}
?>
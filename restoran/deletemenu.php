<?php
include('config.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
$delete = "DELETE FROM menu WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:admin.php');
}else{
	echo "Do not Delete";
}
}
?>
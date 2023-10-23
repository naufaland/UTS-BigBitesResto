<?php
include('config.php');
$id = $_GET['id'];

if(isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $edit_query = "SELECT * FROM menu WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
    }
    else{
        // header('location: admin.php');
        echo "Error1";
    }
}
else{
    // header("location: admin.php");
    echo "Error2";
}
//Data Updating
if(isset($_POST['submit']))
{
    $name = $_POST['nama'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $price = $_POST['harga'];

	$update = "UPDATE menu SET nama='$name', category = '$category', image = '$image', harga = '$price' WHERE id = $id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           echo "<script>
            alert('Success! Data has been successfully updated! $id');
            window.location.href='admin.php';
            </script>";
	}else{
		echo "Data not update";
	}
}




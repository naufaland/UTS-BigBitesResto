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

	$update = "UPDATE menu SET nama='$name', category = '$category', image = '$image', harga = '$price' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='admin.php';
            </script>";
	}else{
		echo "Data not update";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<?php 

$getData = "SELECT * FROM menu WHERE id = $id";
$runData = mysqli_query($con, $getData);
while ($row = mysqli_fetch_array($runData)) {
        $id = $row['id'];
        $nama2 = strtoupper(htmlspecialchars($row['nama'])); 
        $category2 = htmlspecialchars($row['category']); 
        $image2 = htmlspecialchars($row['image']);
        $harga2 = htmlspecialchars($row['harga']);
        echo "
            <div class='form-edit'>
            <form action='editmenu.php?id=$id' method='POST'>
                <div class='form-row'>
                <div class='form-group col-md-6'>
                <label for='nama'>Menu Name</label>
                <input type='text' class='form-control' name='nama' placeholder='What is the menu name?' required>
            </div>
            <div class='form-group col-md-6'>
                <label for='image'>Image</label>
                <input type='text' class='form-control' name='image' required>
            </div>
            <div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='category'>Category</label>
                    <select class='form-control' name='category'>
                        <option>Appetizer</option>
                        <option>Main Course</option>
                        <option>Drink</option>
                        <option>Dessert</option>                
                    </select>
                </div>
            </div>
            <div class='form-group col-md-6'>
                <label for='harga'>Harga</label>
                <input type='text' class='form-control' name='harga' required>
            </div>
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-md-12'>
                        <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            ";
} ?>
</body>
</html>



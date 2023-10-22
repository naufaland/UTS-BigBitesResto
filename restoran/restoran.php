<?php
require 'config.php';
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($con, "SELECT * FROM master_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>
<?php
$tab_menu = '';
$tab_content = '';
$i = 0;
$categories =  array("Dessert", "Appetizer", "Lunch", "Drink");
foreach ($categories as $value)
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$value.'" data-toggle="tab">'.$value.'</a></li>
  ';
  $tab_content .= '
   <div id="'.$value.'" class="tab-pane fade in active">
  ';
 }
 else
 {
  $tab_menu .= '
   <li><a href="#'.$value.'" data-toggle="tab">'.$value.'</a></li>
  ';
  $tab_content .= '
   <div id="'.$value.'" class="tab-pane fade">
  ';
 }
 $product_query = "SELECT * FROM menu WHERE category = '".$value."'";
 $product_result = mysqli_query($con, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-sm-3" style="margin-bottom:36px; margin-right:20px">
  <img src="'.$sub_row["image"].'" style="height: 100px; width:80px;object-fit:cover;"/>
   <div class="text-left">
       <div><b>'.$sub_row["nama"].'</b></div>
   </div>
</div>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BIG BITES RESTAURANT</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container" style="background-color: #FFFFF0;padding: 25px;">
        <h3><i class='bx bx-run'></i><b>Big Bites: The Menu</b></h3>
        <div><a href="logout.php" class="btn btn-primary"><i class='bx bx-exit'></i></a></div>
        <hr>
        <ul class="nav nav-tabs">
   <?php
   echo $tab_menu;
   ?>
   </ul>
</br>
        <div class="tab-content" style="display:flex; flex-direction:row;justify-content:flex-start;">
        <?php
   echo $tab_content;
   ?>
            </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

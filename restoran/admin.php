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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Big Bites Restaurant</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container" style="background-color: #FFFFF0;">
    <div class="image d-flex justify-content-center">
    <img src="../image/logo1.png" alt="ImageDescription" class="logo">
    </div>
        <div class="d-flex justify-content-center">
            <h3><b>Restaurant Menu</b></h3>
        </div>
        <br>
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Add Menu
        </button>
        <a href="logoutadmin.php" class="btn btn-primary"><i class='bx bx-exit'></i></a>
        <hr>
        <?php
        $userid = $_SESSION['id'];
        $getData = "SELECT * FROM menu ";
        $runData = mysqli_query($con, $getData);
        $i = 0;
        ?>
        <table class="table table-bordered table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col">Harga</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($runData)) {
                $sl = ++$i;
                $id = $row['id'];
                $nama = strtoupper(htmlspecialchars($row['nama'])); 
                $category = htmlspecialchars($row['category']); 
                $image = htmlspecialchars($row['image']);
                $harga = $row['harga'];
                ?>
                <tr>
                    <td class='text-center'><?php echo $sl; ?></td>
                    <td class='text-left' style="max-width: 100px;">
                        <div><b><?php echo $nama; ?></b></div>
                        <?php echo $category; ?>
                    </td>
                    
                    <td class='text-center'><img src="<?php echo $image; ?>" style="height: 100px; width:80px;object-fit:cover;"/></td>
                    <td class='text-center'><?php echo $harga; ?></td>
                    <td class='text-center'>
                        <span>
                            <a href='editmenu.php?id=<?php echo $id; ?>' class='btn btn-warning mr-3 editmenu' title='Edit'>
                                <i class='fa fa-pencil-square-o fa-lg'></i>
                            </a>
                        </span>
                    </td>
                    <td class='text-center'>
                        <span>
                            <a href='deletemenu.php?id=<?php echo $id; ?>' class='btn btn-danger deletemenu' title='Delete' onclick="return confirm('Are You Sure?')">
                                <i class='fa fa-trash-o fa-lg' aria-hidden='true'></i>
                            </a>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Add New Menu</h4>
                </div>
                <div class="modal-body">
                    <form action="addmenu.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Menu Name</label>
                                <input type="text" class="form-control" name="nama" placeholder="What is the menu name?" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="text" class="form-control" name="image" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category">
                                        <option>Appetizer</option>
                                        <option>Lunch</option>
                                        <option>Drink</option>
                                        <option>Dessert</option>                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                    </form>
                    <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

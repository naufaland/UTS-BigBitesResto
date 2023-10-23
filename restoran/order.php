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
        <title>ORDERS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container" style="background-color: #FFFFF0;">
        <h3><i class='bx bx-run'></i><b>Ordered Menu</b></h3>
        <br>
        <a href="restoran.php" class="btn btn-primary"><i class='bx bx-exit'></i></a>
        <hr>
        <?php
        $userid = $_SESSION['id'];
        $runData = mysqli_query($con, "SELECT id,nama, harga, COUNT(nama) AS jumlah FROM `order` WHERE user_id = $userid GROUP BY nama");
        $i = 0;
        ?>
        <table class="table table-bordered table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Jumlah</th>
                    <th class="text-center" scope="col">Harga</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <?php
            $total=0;
            while ($row = mysqli_fetch_array($runData)) {
                $sl = ++$i;
                $id = $row['id'];
                $nama = strtoupper(htmlspecialchars($row['nama'])); 
                $harga = $row['harga'];
                $jumlah = $row['jumlah'];
                $total =  $total  + ($row['harga'] * $row['jumlah']);
                ?>
                <tr>
                    <td class='text-center'><?php echo $sl; ?></td>
                    <td class='text-left'>
                        <div><b><?php echo $nama; ?></b></div>
                    </td>
                    
                    <td class='text-center'><?php echo $jumlah; ?></td>
                    <td class='text-center'><?php echo $harga * $jumlah; ?></td>
                    <td class='text-center'>
                        <span>
                            <a href='deleteorder.php?id=<?php echo $userid; ?>&nama=<?php echo $nama; ?>' class='btn btn-danger deletemenu' title='Delete' onclick="return confirm('Are You Sure?')">
                                <i class='fa fa-trash-o fa-lg' aria-hidden='true'></i>
                            </a>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
            <td class='text-center'>Total: Rp.<?php echo $total; ?></td>
            </tr>
        </table>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

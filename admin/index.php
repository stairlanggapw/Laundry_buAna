<?php
    include '../koneksi.php';
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
</head>
<body>
    <div class="container">
        <div class="alert alert-info text-center">
            <h4 style="margin-bottom: 0px">
                <b>selamat datang !</b>di sestem informasi laundry
            </h4>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h4>dashboard</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-user">
                                    </i>
                                    <span class="pull-right">
                                        <?php
                                            $pelanggan = mysqli_query($koneksi,"select * from pelanggan");
                                            echo mysqli_num_rows($pelanggan);
                                        ?>
                                        </span>
                                </h1>
                                jumlah pelanggan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
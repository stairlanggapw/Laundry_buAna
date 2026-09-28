<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laundry</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>
<body style="background: #adabab">
    <ul style="margin: 5px;" class="nav navbar-nav" id="bs-example-navbar-collapse-1">
       <li><a style="text-decoration: none; color: inherit;" href="index.html"><i class="glyphicon glyphicon-back">Back</i></a></li>
    </ul>
    <br><br>
    <center>
        <h2>Sistem Informasi Laundry <br></h2>
    </center>
    <br><br><br><br>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <?php 
                if(isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
                    } else if ($_GET['pesan'] == "logout") {
                        echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
                    } else if ($_GET['pesan'] == "belum_login") {
                        echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
                    }
                }
            ?>
            <form action="login.php" method="POST">
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
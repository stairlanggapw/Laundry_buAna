<?php
    require_once __DIR__ . '/../koneksi.php';
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
                <b>selamat datang !</b>di sistem informasi laundry
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

                    <div class="col-md-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-retweet">
                                    </i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status=0");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>
                                jumlah cucian diproses
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-info-sign">
                                    </i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status=1");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>
                                jumlah cucian dicuci
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-ok-circle">
                                    </i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status=2");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>
                                jumlah cucian selesai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <h4>Riwayat Transaksi Terakhir</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $data = mysqli_query($koneksi, "SELECT pelanggan.*, transaksi.* FROM pelanggan INNER JOIN transaksi ON pelanggan.pelanggan_id = transaksi.pelanggan_id ORDER BY transaksi.transaksi_id DESC LIMIT 10");
                        $no = 1;
                        while ($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                            <td><?php echo $no++ ?></td>
                            <td>INVOICE-<?php echo $d['transaksi_id'];?></td>
                            <td><?php echo $d['transaksi_tanggal'];?></td>
                            <td><?php echo $d['pelanggan_nama'];?></td>
                            <td><?php echo $d['transaksi_berat'];?></td>
                            <td><?php echo $d['transaksi_tgl_selesai'];?></td>
                            <td><?php echo "RP.".number_format($d['transaksi_harga']).",-";?></td>
                            <td>
                                <?php
                                    $st = strtolower(trim($d['transaksi_status']));
                                    if ($st=="0" || $st=="proses"){
                                        echo "<div class='label label-warning'>PROSES</div>";
                                    }elseif ($st=="1" || $st=="dicuci"){
                                        echo "<div class='label label-info'>DICUCI</div>";
                                    }elseif ($st=="2" || $st=="selesai"){
                                        echo "<div class='label label-success'>SELESAI</div>";
                                    }else{
                                        echo "<div class='label label-default'>".htmlspecialchars($d['transaksi_status'])."</div>";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
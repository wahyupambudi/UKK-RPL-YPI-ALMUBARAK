<?php
session_start();
if (!isset($_SESSION["loginpetugas"])) {
    header("Location: ../index.php");
    exit;
}

// PERINTAH UNTUK KONEKSI KE DATABASE
include "../koneksi.php";

if (isset($_SESSION["loginpetugas"])) {
    $dataSession = $_SESSION["username"];
    $result = mysqli_query($con, "SELECT * FROM petugas WHERE username = '$dataSession'");
    $sts = mysqli_fetch_assoc($result);
}

include '../layout/header.php';
include '../layout/navbar.php';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Welcome Dashboard Petugas <b style="color:dodgerblue"><?= $sts["username"] ?> </b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $sql = "SELECT * FROM pembayaran";
                            $hasil = mysqli_query($con, $sql);
                            $num_rows = mysqli_num_rows($hasil);
                            ?>
                            <h3><?= $num_rows ?></h3>
                            <p>Histori Pembayaran</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="history.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $sql = "SELECT * FROM pembayaran";
                            $hasil = mysqli_query($con, $sql);
                            $num_rows = mysqli_num_rows($hasil);
                            ?>
                            <h3><?= $num_rows ?></h3>
                            <p>Data Pembayaran</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="history_pembayaran.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h6 class="card-title">Special title treatment</h6>

                        <p class="card-text">Selamat Datang di Aplikasi Pembayaran SPP, Silahkan Cek Histori Pembayaran</p>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layout/footer.php';
?>
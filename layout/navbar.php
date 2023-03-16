<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">APLIKASI SPP</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        if (isset($_SESSION["loginadmin"])) { ?>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="kelas.php" class="nav-link">Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a href="siswa.php" class="nav-link">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="petugas.php" class="nav-link">Data Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a href="spp.php" class="nav-link">Data SPP</a>
                    </li>
                    <li class="nav-item">
                        <a href="pembayaran.php" class="nav-link">Data Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="history.php" class="nav-link">History Pembayaran</a>
                    </li>
            </div>
        <?php } else if (isset($_SESSION["loginpetugas"])) { ?>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="pembayaran.php" class="nav-link">Data Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="history.php" class="nav-link">History Pembayaran</a>
                    </li>
            </div>
        <?php } else if (isset($_SESSION["loginsiswa"])) { ?>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="history.php" class="nav-link">History Pembayaran</a>
                    </li>
            </div>
        <?php } ?>

        <!-- Logout -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-user"> Logout</i>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
<?php
// PERINTAH UNTUK KONEKSI KE DATABASE
include "../koneksi.php";

session_start();
if (!isset($_SESSION["loginadmin"])) {
    header("Location: ../index.php");
    exit;
}

// UNTUK ADD DATA
//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['add'])) {
    $nisn = input($_POST['nisn']);
    $nis = input($_POST['nis']);
    $nama = input($_POST['nama']);
    $id_kelas = input($_POST['kelas']);
    $alamat = input($_POST['alamat']);
    $no_telp = input($_POST['nohp']);
    $id_spp = input($_POST['id_spp']);

    $query = "INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')";
    $runQuery = mysqli_query($con, $query);

    if ($runQuery) {
        echo "<script>alert('Data Berhasil Di Tambah')</script>";
    } else {
        echo "Pesan Error " . mysqli_error($con);
    }
}

// UNTUK DELETE DATA
if (isset($_GET["delete"])) {
    $id = $_GET['delete'];

    mysqli_query($con, "DELETE FROM siswa WHERE nisn=$id");
    header("Location: siswa.php");
}

// UNTUK EDIT DATA
if (isset($_GET["edit"])) {

    // $id = $_GET["edit"];
    $nisn = $_GET["edit"];
    $nis = input($_POST['nis']);
    $nama = input($_POST['nama']);
    $id_kelas = input($_POST['kelas']);
    $alamat = input($_POST['alamat']);
    $no_telp = input($_POST['nohp']);
    $id_spp = input($_POST['id_spp']);

    $query = "UPDATE siswa SET 
        nis = '$nis',
        nama = '$nama',
        id_kelas = '$id_kelas',
        alamat = '$alamat',
        no_telp= '$no_telp',
        id_spp = '$id_spp'
        WHERE nisn = $nisn ";
    $runQuery = mysqli_query($con, $query);

    if ($runQuery) {
        echo "<script>alert('Data Berhasil Di Update')</script>";
        header("Location: siswa.php");
    } else {
        echo "Pesan Error " . mysqli_error($con);
    }
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
                    <h1 class="m-0"> DATA SISWA </h1>
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
            <div class="col-lg-12">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, possimus! Iusto corporis qui id iure eveniet ipsa corrupti at cupiditate temporibus odit recusandae quas saepe, minus ad asperiores mollitia voluptas.
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Selamat Datang di Halaman Data Siswa untuk melakukan Perubahan Data
                                </h6>
                            </div>
                            <div class="col-6 text-right">
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">No</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>ID KELAS</th>
                                    <th>ALAMAT</th>
                                    <th>NOMOR TELP</th>
                                    <th>ID SPP</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $querySiswa = "SELECT a.nisn, a.nis, a.nama, a.id_kelas, a.alamat, a.no_telp, a.id_spp, b.nama_kelas, b.jurusan FROM siswa a, kelas b WHERE a.id_kelas = b.id_kelas ORDER BY a.nisn ";
                                $dataSiswa = mysqli_query($con, $querySiswa);
                                $no = 0;
                                while ($res = mysqli_fetch_array($dataSiswa)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $res["nisn"] ?></td>
                                        <td><?= $res["nis"] ?></td>
                                        <td><?= $res["nama"] ?></td>
                                        <td><?= $res["nama_kelas"] . " " . $res["jurusan"] ?></td>
                                        <td><?= $res["alamat"] ?></td>
                                        <td><?= $res["no_telp"] ?></td>
                                        <td><?= $res["id_spp"] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $res["nisn"] ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?delete=<?= htmlspecialchars($res["nisn"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Membuat Modal Edit -->
                                    <div class="modal fade" id="modal-edit<?= $res["nisn"] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Siswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form Edit -->
                                                    <form action="siswa.php?edit=<?= $res["nisn"]; ?>" method="POST">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">NISN</label>
                                                                <input type="text" class="form-control" name="nisn" value="<?= $res["nisn"] ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">NIS</label>
                                                                <input type="text" class="form-control" name="nis" value="<?= $res["nis"] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">NAMA</label>
                                                                <input type="text" class="form-control" name="nama" value="<?= $res["nama"] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>KELAS</label>
                                                                <select name="kelas" class="form-control">
                                                                    <?php
                                                                    $queryKelas = "SELECT * FROM kelas";
                                                                    $dataKelas = mysqli_query($con, $queryKelas);
                                                                    while ($result = mysqli_fetch_array($dataKelas)) {
                                                                    ?>
                                                                        <option><?= $result["id_kelas"] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ALAMAT</label>
                                                                <textarea class="form-control" rows="3" name="alamat" placeholder="Masukan Alamat disini ..."><?= $res["alamat"] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">NO.HP</label>
                                                                <input type="number" class="form-control" name="nohp" value="<?= $res["no_telp"] ?>">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label>DATA SPP</label>
                                                                <select name="id_spp" class="form-control">
                                                                    <?php
                                                                    $querySpp = "SELECT * FROM spp";
                                                                    $dataSpp = mysqli_query($con, $querySpp);
                                                                    while ($result = mysqli_fetch_array($dataSpp)) {
                                                                    ?>
                                                                        <option><?= $result["id_spp"] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary" name="edit">Ubah Data</button>
                                                        </div>
                                                    </form>
                                                    <!-- End Edit -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Membuat Modal Tambah -->
                                <div class="modal fade" id="modal-tambah">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Data Siswa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form Edit -->
                                                <form action="" method="POST">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NISN</label>
                                                            <input type="text" class="form-control" name="nisn" placeholder="Masukan NISN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NIS</label>
                                                            <input type="text" class="form-control" name="nis" placeholder="Masukan NIS">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NAMA</label>
                                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>KELAS</label>
                                                            <select name="kelas" class="form-control">
                                                                <?php
                                                                $queryKelas = "SELECT * FROM kelas";
                                                                $dataKelas = mysqli_query($con, $queryKelas);
                                                                while ($res = mysqli_fetch_array($dataKelas)) {
                                                                ?>
                                                                    <option><?= $res["id_kelas"] ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ALAMAT</label>
                                                            <textarea class="form-control" rows="3" name="alamat" placeholder="Masukan Alamat disini ..."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">NO.HP</label>
                                                            <input type="number" class="form-control" name="nohp" placeholder="Masukan Nomor Handphone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>DATA SPP</label>
                                                            <select name="id_spp" class="form-control">
                                                                <?php
                                                                $querySpp = "SELECT * FROM spp";
                                                                $dataSpp = mysqli_query($con, $querySpp);
                                                                while ($res = mysqli_fetch_array($dataSpp)) {
                                                                ?>
                                                                    <option><?= $res["id_spp"] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
                                                    </div>
                                                </form>
                                                <!-- End Edit -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
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
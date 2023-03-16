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
    $id_kelas = input($_POST['id_kelas']);
    $nama_kelas = input($_POST['kls']);
    $jurusan = input($_POST['jrsn']);

    $query = "INSERT INTO kelas (id_kelas, nama_kelas, jurusan) VALUES ('$id_kelas', '$nama_kelas', '$jurusan')";
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

    mysqli_query($con, "DELETE FROM kelas WHERE id_kelas='$id'");
    header("Location: kelas.php");
}

// UNTUK EDIT DATA
if (isset($_GET["edit"])) {

    $id = $_GET["edit"];
    $nama_kelas = input($_POST["nama_kelas"]);
    $jurusan = input($_POST["jurusan"]);

    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas', jurusan = '$jurusan' WHERE id_kelas = '$id' ";
    $runQuery = mysqli_query($con, $query);

    if ($runQuery) {
        echo "<script>alert('Data Berhasil Di Update')</script>";
        header("Location: kelas.php");
    } else {
        echo "Pesan Error " . mysqli_error($con);
    }
}

include '../layout/header.php';
include '../layout/navbar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> DATA SPP</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container">
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
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Selamat Datang di Halaman Data Kelas untuk melakukan Perubahan Data
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
                                        <th>ID SPP</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <?php
                                    $querySpp = "SELECT * FROM spp";
                                    $dataSpp = mysqli_query($con, $querySpp);
                                    $no = 0;
                                    while ($res = mysqli_fetch_array($dataSpp)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $res["id_spp"] ?></td>
                                            <td><?= $res["tahun"] ?></td>
                                            <td>Rp. <?= $res["nominal"] ?></td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $res["id_kelas"] ?>"><i class="fas fa-edit"></i></a>
                                                <a href="?delete=<?= htmlspecialchars($res["id_kelas"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Membuat Modal Edit -->
                                        <div class="modal fade" id="modal-edit<?= $res["id_kelas"] ?>" tabindex="-1">
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
                                                        <form action="kelas.php?edit=<?= $res["id_kelas"]; ?>" method="POST">
                                                            <input type="text" class="form-control" name="id_kelas" value="<?= $res["id_kelas"] ?>" hidden>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nama Kelas</label>
                                                                <select name="nama_kelas" class="form-control">
                                                                    <option>-- Pilih --</option>
                                                                    <option>X</option>
                                                                    <option>XI</option>
                                                                    <option>XII</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Jurusan</label>
                                                                <select name="jurusan" class="form-control">
                                                                    <option>-- Pilih --</option>
                                                                    <option>RPL</option>
                                                                    <option>TKR</option>
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
                                    <h4 class="modal-title">Tambah Data Kelas</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form Edit -->
                                    <form action="" method="POST">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ID Kelas</label>
                                                <select name="id_kelas" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>X-RPL</option>
                                                    <option>XI-RPL</option>
                                                    <option>XII-RPL</option>
                                                    <option>X-TKR</option>
                                                    <option>XI-TKR</option>
                                                    <option>XII-TKR</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Kelas</label>
                                                <select name="kls" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>X</option>
                                                    <option>XI</option>
                                                    <option>XII</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jurusan</label>
                                                <select name="jrsn" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>RPL</option>
                                                    <option>TKR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
                                        </div>
                                    </form>
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
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layout/footer.php';
?>
<?php

session_start();
if (!isset($_SESSION["loginadmin"])) {
    header("Location: ../index.php");
    exit;
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
                    <h1 class="m-0"> DATA PETUGAS </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div>
            </div>
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
                                <h6>Selamat Datang di Halaman Data Pembayaran
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
                                <tr>
                                    <th>USERNAME</th>
                                    <th>PASSWORD</th>
                                    <th>NAMA PETUGAS</th>
                                    <th>LEVEL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1102</td>
                                    <td>Muhammad Ali</td>
                                    <td>RPL</td>
                                    <td>Jl. Minakh Mentekhi</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Membuat Modal Edit -->
                                <div class="modal fade" id="modal-edit">
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
                                                <form>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">USERNAME</label>
                                                            <input type="text" class="form-control" placeholder="Masukan NISN">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">PASSWORD</label>
                                                            <input type="password" class="form-control" placeholder="Masukan NIS">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NAMA PETUGAS</label>
                                                            <input type="text" class="form-control" placeholder="Masukan Nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>LEVEL</label>
                                                            <select name="id_kelas" class="form-control">
                                                                <option>-- Pilih Level --</option>
                                                                <option value="admin">ADMIN</option>
                                                                <option value="petugas">PETUGAS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                    </div>
                                                </form>
                                                <!-- End Edit -->
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Membuat Modal Hapus -->
                                <div class="modal fade" id="modal-hapus">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data Petugas</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin ingin menghapus Data Ini, Pastikan tidak salah Data yang ingin dihapus </p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <form>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">USERNAME</label>
                                                            <input type="username" class="form-control" placeholder="Masukan Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">PASSWORD</label>
                                                            <input type="password" class="form-control" placeholder="Masukan Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NAMA PETUGAS</label>
                                                            <input type="text" class="form-control" placeholder="Masukan Nama Petugas">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>LEVEL</label>
                                                            <select name="id_level" class="form-control">
                                                                <option>-- Pilih Level --</option>
                                                                <option value="admin">ADMIN</option>
                                                                <option value="petugas">PETUGAS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
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
<?php
$con = mysqli_connect("localhost", "root", "", "db_spp");
if (!$con) {
    die("Koneksi Gagal : " . mysqli_connect_error());
};

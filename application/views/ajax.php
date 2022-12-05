<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "projek");

//variabel nim yang dikirimkan form.php
$nim = $_GET['nim'];

//mengambil data
$query = mysqli_query($koneksi, "select * from latihan_autofill where nim='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  @$mahasiswa['nama'],
            'notelp'      =>  @$mahasiswa['notelp'],);

//tampil data
echo json_encode($data);
?>

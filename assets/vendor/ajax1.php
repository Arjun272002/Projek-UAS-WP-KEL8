<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "projek");

//variabel nim yang dikirimkan form.php
$id = $_GET['id'];

//mengambil data
$query = mysqli_query($koneksi, "select * from kategori where id='$id'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'kategori'      =>  @$mahasiswa['kategori'],
            'harga'      =>  @$mahasiswa['harga'],);

//tampil data
echo json_encode($data);
?>

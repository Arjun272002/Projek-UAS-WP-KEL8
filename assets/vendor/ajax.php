<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "projek");

//variabel nim yang dikirimkan form.php
$kategori = $_GET['kategori'];

//mengambil data
$query = mysqli_query($koneksi, "select * from buku where kategori='$kategori'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'harga'      =>  @$mahasiswa['harga'],);

//tampil data
echo json_encode($data);

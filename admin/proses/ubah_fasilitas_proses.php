<?php
 
include "../../includes/koneksi.php";

 
$id = $_POST['id'];
$nama = $_POST['nama'];
$fasilitas = $_POST['fasilitas'];
 
mysqli_query($conn,"UPDATE tb_fasilitas_kamar JOIN tb_kamar ON tb_fasilitas_kamar.id_kamar =
tb_kamar.id_kamar SET nama_kamar='$nama', fasilitas='$fasilitas', where id='$id'");
 
header("location:../index.php");
 
?>
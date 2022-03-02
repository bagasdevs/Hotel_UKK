<?php
 
include "../../includes/koneksi.php";

 
$id = $_POST['id'];
$nama = $_POST['nama'];
$total = $_POST['total'];
 
mysqli_query($conn,"UPDATE tb_kamar SET nama_kamar='$nama', total_kamar='$total' where id_kamar='$id'");
 
header("location:../index.php");
 
?>
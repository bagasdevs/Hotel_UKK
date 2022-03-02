<?php
 
include "../../includes/koneksi.php";


$idfas = $_POST['idfas'];
$fas = $_POST['fas'];
$ket = $_POST['ket'];
 
mysqli_query($conn,"UPDATE tb_fasilitas_umum SET nama_fasilitas='$fas', keterangan='$ket' where id='$idfas'");
 
header("location:../index.php");
 
?>
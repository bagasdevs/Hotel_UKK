<?php 
 include "../../includes/koneksi.php";
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tb_fasilitas_umum where id='$id'");

header("location:../index.php");

?>
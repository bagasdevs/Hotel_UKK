<?php
 
include "../../includes/koneksi.php";
$id = $_POST['ubah'];
$nproses = $_POST['npro'];
$jproses = $_POST['jpro'];

     $sql = "UPDATE tb_kamar SET nama_kamar ='$nproses', jumlah_kamar='$jproses' WHERE (id_kamar='$id')";
     if (($conn->query($sql)==1)) {
          $data = "OK";
          echo $data;
        }
         else 
         {
         $data = "ERROR";
         echo $data;
         }

 ?>
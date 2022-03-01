<?php
 //print_r($_POST);
 include "../../includes/koneksi.php";
$id = $_POST['ids'];
 $nama = $_POST['nama'];
 $jkamar = $_POST['jkamar'];

     $sql = "UPDATE tb_kamar SET nama_kamar ='$nama', jumlah_kamar='$jkamar' WHERE (id_kamar= '$id')";
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
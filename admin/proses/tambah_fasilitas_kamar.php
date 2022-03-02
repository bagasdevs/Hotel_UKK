<?php
 print_r($_POST);
 include "../../includes/koneksi.php"; 
 $idkamar        = $_POST['idkamar'];
 $nama_fasilitas = $_POST['nama_fasilitas'];

  $sql = "INSERT INTO tb_fasilitas_kamar (id_kamar, fasilitas) 
			        VALUES ('$idkamar','$nama_fasilitas')";					
            if($conn->query($sql) == 1)
            {
             $data = "OK";
             echo $data;               
			}
			else
			{
			 $data = "ERROR";
			 echo $data;
			}
?>
<?php 

//  include "../../includes/koneksi.php";
//  $idkamar = $_POST['idkamar'];
//  $nama_fasilitas = $_POST['nama_fasilitas'];
// $rand = rand();
// $ekstensi =  array('png','jpg','jpeg','gif');
// $gambar = $_FILES['gambar']['name'];
// $ukuran = $_FILES['gambar']['size'];
// $ext = pathinfo($gambar, PATHINFO_EXTENSION);
 
// if(!in_array($ext,$ekstensi) ) {
// 	header("location:index.php?alert=gagal_ekstensi");
// }else{
// 	if($ukuran < 1044070){		
// 		$xx = $rand.'_'.$gambar;
// 		move_uploaded_file($_FILES['gambar']['tmp_name'], 'image/'.$rand.'_'.$gambar);
// 		mysqli_query($conn, "INSERT INTO tb_fasilitas_kamar (id_kamar, fasilitas, gambar) VALUES ('$idkamar','$nama_fasilitas','$gambar')");
// 		header("location:index.php?alert=berhasil");
// 	}else{
// 		header("location:index.php?alert=gagak_ukuran");
// 	}
// }
?>
<?php 
session_start();
 
include 'includes/koneksi.php';
 
$user = $_POST['username'];
$pass = md5($_POST['password']);
 
$sql = mysqli_query($conn,"SELECT * FROM user WHERE username='$user' AND password='$pass'");
$cek = mysqli_num_rows($sql);

if($cek > 0){
	$data = mysqli_fetch_assoc($sql);

	if($data['tipe']=="admin"){
		$_SESSION['nama'] =  $data['username'];
		$_SESSION['tipe'] = "admin";
		header("location:admin/index.php");
	}else if($data['tipe']=="resepsionis"){
		$_SESSION['nama'] = $data['username'];
		$_SESSION['tipe'] = "resepsionis";
		header("location:resepsionis/index.php");

	}else{
		header("location:login.php?alert=gagal");
	}	
}else{
	header("location:login.php?alert=gagal");
}
?>
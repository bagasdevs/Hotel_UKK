<?php
		 //Fungsi untuk mencegah inputan karakter yang tidak sesuai
		 function input($data) {
			 $data = trim($data);
			 $data = stripslashes($data);
			 $data = htmlspecialchars($data);
			 return $data;
			}
			//Cek apakah ada kiriman form dari method post
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				session_start();
				
			include('includes/koneksi.php');
			$username = input($_POST["username"]);
			$p = input(md5($_POST["password"]));

			$sql = "select * from user where username='".$username."' and password='".$p."' limit 1";
			$hasil = mysqli_query ($conn,$sql);
			$jumlah = mysqli_num_rows($hasil);

			if ($jumlah>0) {
				$row = mysqli_fetch_assoc($hasil);
				$_SESSION["id"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["tipe"]=$row["tipe"];
		
		
				if ($_SESSION["tipe"]=$row["tipe"]=='admin')
				{
					header("Location:admin/index.php");
				} else if ($_SESSION["tipe"]=$row["tipe"]=='resepsionis')
				{
					header("Location:resepsionis/index.php");
				}
		
				
			}else {
				echo "<div class='alert alert-danger'>
				<strong>Error!</strong> Username dan password salah. 
			  </div>";
			}

		}
	
	?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Hotel Hebat</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/components.css">
	<!-- Start GA -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div
						class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

						<div class="card card-primary">
							<div class="card-header">
								<h4>Hotel Hebat Admin</h4>
							</div>

							<div class="card-body">
								<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="needs-validation"
									novalidate="">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="username"
											tabindex="1" required autofocus>
										<div class="invalid-feedback">
											Username Tidak Boleh Kosong
										</div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
										</div>
										<input id="password" type="password" class="form-control" name="password"
											tabindex="2" required>
										<div class="invalid-feedback">
											Password Tidak Boleh Kosong
										</div>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input"
												tabindex="3" id="remember-me">
											<label class="custom-control-label" for="remember-me">Remember Me</label>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Bagas 2022
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="assets/modules/jquery.min.js"></script>
	<script src="assets/modules/popper.js"></script>
	<script src="assets/modules/tooltip.js"></script>
	<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="assets/modules/moment.min.js"></script>
	<script src="assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>
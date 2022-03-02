<?php
session_start();

if (!isset($_SESSION["username"])) {
	header('Location:../../../../login.php');
	exit;
}

$level=$_SESSION["tipe"];

if ($level!='admin') {
    header('Location:../../../../login.php');
    exit;
}
 $id_user=$_SESSION["id"];
 $username=$_SESSION["username"];

 include "../components/header.php";
?>


<body>
    <?php 
    include "../components/navbar.php";
    include "../components/sidebar.php";
    include "../components/content.php";
    ?>
    </section>
    <?php
	    $id = $_GET['id'];
	    $sql = mysqli_query($conn,"SELECT * FROM tb_kamar where id_kamar='$id'");
	    while($row = mysqli_fetch_array($sql)){
		?>
    <form method="POST" action="ubah_kamar_proses.php">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Kamar</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo $row['id_kamar']; ?>">
                                <label>Nama Kamar</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo $row['nama_kamar']; ?>">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Total Kamar</label>
                                <input type="text" class="form-control" id="total" name="total"
                                    value="<?php echo $row['total_kamar']; ?>">
                            </div>
                        </div>
                        <button type="submit" style="width: 100px;" class="btn btn-primary ml-4 mb-4"
                            value="SIMPAN">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php 
	}
	?>
</body>
<?php
include "../components/script.php";
?>

</html>
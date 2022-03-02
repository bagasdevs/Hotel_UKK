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
	    $sql = mysqli_query($conn,"SELECT * FROM tb_fasilitas_kamar WHERE id='$id'");
	    while($row = mysqli_fetch_array($sql)){
		?>
    <form method="POST" action="ubah_fasilitas_proses.php">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Fasilitas</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo $row['id']; ?>">
                                <label>Tipe Kamar</label>
                                <select class="form-control select2 " id="id" name="id">

                                    <?php
                                    $sql = "SELECT * FROM tb_fasilitas_kamar JOIN tb_kamar ON
                                    tb_fasilitas_kamar.id_kamar = tb_kamar.id_kamar ORDER BY id DESC LIMIT 5";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row["id_kamar"]; ?>">
                                        <?php echo $row["nama_kamar"]; ?> </option>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                                    value="<?php echo $row["fasilitas"]; ?>">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" id="gambar" name="gambar"
                                    value="<?php echo "<img src='image/$row[gambar]' width='70' height='90'  />" ?>">
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
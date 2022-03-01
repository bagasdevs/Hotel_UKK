<?php
session_start();

if (!isset($_SESSION["username"])) {
	header('Location:../login.php');
	exit;
}

$level=$_SESSION["tipe"];

if ($level!='resepsionis') {
    header('Location:../login.php');
    exit;
}

$id_user=$_SESSION["id"];
$username=$_SESSION["username"];

?>

<?php
 include "../includes/koneksi.php";
 include "../components/header.php";
 include('../components/navbar.php');
 include('../components/sidebar_res.php');
 include('../components/content.php');
 ?>

<body>
  <div class="container" id="data_reservasi">
    <div id="data_table">

    </div>
  </div>
  </section>

  <div class="modal fade" id="modal_lihat_reservasi">
    <div class="modal-dialog">
      <div class="modal-content">
        <input type="text" id="idpelanggan" value="3" hidden>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Data Tamu</h4>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div id="pelanngan" class="modal-body">

        </div>


      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_check_reservasi">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reservasi</h4>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-floating mt-2 mb-2">
            <label for="idkamar">Proses</label>
            <select class="form-control select2" id="proses" name="proses">
              <option value="1"> Selesai Checkin </option>
              <option value="0"> Dalam Proses </option>
              <option value="3"> Batal </option>
            </select>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="id_proses">Proses</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <?php 
  include('../components/footer.php');
  ?>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      load_table();

      function load_table() {
        var id = 0;
        $.ajax({
          url: "proses/load_table.php",
          method: "POST",
          data: {
            ids: id
          },
          success: function (data) {
            $("#data_table").html(data).refresh;
          }
        });
      }

      $("#id_proses").click(function () {
        var proses = $("#proses").val();
        var idproses = $("#id_proses").val();

        $.ajax({
          url: "proses/proses_check.php",
          method: "POST",
          data: {
            ids: idproses,
            proses: proses
          },
          success: function (data) {
            if (data == "OK") {
              alert("BERHASIL DIUBAH!");
              window.location.href = "index.php";
            }
            if (data == "ERROR") {
              alert("GAGAL DIUBAH!")
            }
          }
        });
      });

    });
  </script>

  <?php 
include('../components/script.php');
?>
</body>

</html>
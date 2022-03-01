<?php
session_start();

if (!isset($_SESSION["username"])) {
	header('Location:../login.php');
	exit;
}

$level=$_SESSION["tipe"];

if ($level!='admin') {
    header('Location:../login.php');
    exit;
}
 $id_user=$_SESSION["id"];
 $username=$_SESSION["username"];

?>
<?php
 include "../includes/koneksi.php";
  $data_kamar = mysqli_query($conn,"SELECT * FROM tb_kamar");
  $data_user = mysqli_query($conn,"SELECT * FROM user");
  $data_fumum = mysqli_query($conn,"SELECT * FROM tb_fasilitas_umum");
  $data_pelanggan = mysqli_query($conn,"SELECT * FROM tb_pelanggan");

  $jumlah_kamar = mysqli_num_rows($data_kamar);
  $jumlah_user = mysqli_num_rows($data_user);
  $jumlah_fumum = mysqli_num_rows($data_fumum);
  $jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
  include "../components/header.php";
?>

<body>

  <?php 
  include('../components/navbar.php');
  include('../components/sidebar.php');
  include('../components/content.php');
  ?>
  </section>
  <div id="data">

  </div>
  </div>

  <?php 
  include('../components/footer.php');
  ?>

  <!-- SCRIPT JAVASCRIPT -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap5.0.1.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {

      $("#add_fasilitas").click(function () {
        $("#modal_tambah_fasilitas").modal('show');
      });

      $("#add_fasilitas_umum").click(function () {
        $("#modal_tambah_fasilitas_umum").modal('show');
      });

      $("#tombol_kamar").click(function () {
        $('#data').html('');
        load_kamar();
      });

      $("#tombol_fasilitas").click(function () {
        $('#data').html('');
        load_fasilitas_kamar();
      });

      $("#tombol_fasilitas_umum").click(function () {
        $('#data').html('');
        load_fasilitas_umum();
      });

      $("#show_kamar").click(function () {
        $("#lihat_data_kamar").modal("show");
      });

      $("#show_fasilitas").click(function () {
        $("#lihat_data_fasilitas").modal("show");
      });

      $("#show_fasilitas_umum").click(function () {
        $("#lihat_data_fasilitas_umum").modal("show");
      });

      load_kamar();
      if (window.location.href.indexOf('index.php?id=kamar') > -1) {
        load_kamar();
      } else
      if (window.location.href.indexOf('index.php?id=fasilitas_kamar') > -1) {
        load_fasilitas_kamar();
      } else
      if (window.location.href.indexOf('index.php?id=fasilitas_umum') > -1) {
        load_fasilitas_umum();
      }

      function load_kamar() {
        var id = 0;
        $.ajax({
          url: "proses/load_kamar.php",
          method: "POST",
          data: {
            ids: id
          },
          success: function (data) {
            //alert(data);return;
            $("#data").html(data).refresh;
          }
        });
      }

      function load_fasilitas_kamar() {
        var id = 0;
        $.ajax({
          url: "proses/load_fasilitas.php",
          method: "POST",
          data: {
            ids: id
          },
          success: function (data) {
            //alert(data);return;
            $("#data").html(data).refresh;
          }
        });
      }

      function load_fasilitas_umum() {
        var id = 0;
        $.ajax({
          url: "proses/load_fasilitas_umum.php",
          method: "POST",
          data: {
            ids: id
          },
          success: function (data) {
            //alert(data);return;
            $("#data").html(data).refresh;
          }
        });
      }

    });
  </script>
  <?php 
include('../components/script.php');
?>
  <!-- END BODY -->
</body>

</html>
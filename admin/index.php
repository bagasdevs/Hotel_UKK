<?php
 include "../includes/koneksi.php";
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

      /*tombol tambah(+) fasilitas*/
      $("#add_fasilitas").click(function () {
        $("#modal_tambah_fasilitas").modal('show');
      });

      /*tombol tambah(+) fasilitas umum*/
      $("#add_fasilitas_umum").click(function () {
        $("#modal_tambah_fasilitas_umum").modal('show');
      });

      /*Saat klik tombol Menu Kamar*/
      $("#tombol_kamar").click(function () {
        $('#data').html('');
        load_kamar();
      });

      /*Saat klik tombol Menu Fasilitas kamar*/
      $("#tombol_fasilitas").click(function () {
        $('#data').html('');
        load_fasilitas_kamar();
      });

      /*Saat klik tombol Menu Fasilitas Umum*/
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
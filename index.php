<?php
  include "includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>WELCOME - HOTEL HEBAT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="hotel.png" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Hotel Hebat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <h5><a class="nav-link" href="">Home</a></h5>
          </li>
          <li class="nav-item">
            <h5><a class="nav-link" href="#" id="tombol_kamar">Kamar</a></h5>
          </li>
          <li class="nav-item">
            <h5><a class="nav-link" href="#" id="tombol_fasilitas">Fasilitas</a></h5>
          </li>
          <li class="nav-item">
            <h5><a class="nav-link" href="login.php" id="login">Login</a></h5>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <div id="demo_slide" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
      <?php
            $aktif="active";
            $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id ASC LIMIT 3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $nf= $row["nama_fasilitas"];
                $gambar= $row["gambar"];
                $ket = $row["keterangan"];
        ?>
      <div class="carousel-item <?php echo $aktif;?> ">
        <img src="<?php echo $gambar; ?>" alt="Los Angeles" class="d-block" style="width:100%">
        <div class="carousel-caption">
          <h3><?php echo $nf; ?></h3>
          <p><?php echo $ket; ?></p>
        </div>
      </div>

      <?php
            $aktif="";
              }
            } 
        ?>

      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>
  </div>


  <div class="container mt-2">
    <div class="d-flex justify-content-center">
      <div class="row">
        <div class="col-sm form-floating mb-3 mt-4">
          <button type="button" id="tombol_pesan" class="btn btn-outline-primary">Mulai Pesan Sekarang</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-2" id="panel_cek">
    <div class="d-flex justify-content-center">
      <form>
        <div class="row">
          <div class="col-sm form-floating mb-3 mt-3">
            <input type="date" class="form-control" id="masuk" name="masuk">
            <label for="masuk"> Check In</label>
          </div>
          <div class="col-sm form-floating mb-3 mt-3">
            <input type="date" class="form-control" id="keluar" name="keluar">
            <label for="keluar"> Check Out</label>
          </div>
          <div class="col-sm form-floating mb-3 mt-3">
            <input type="number" class="form-control" id="jkamar" name="jkamar">
            <label for="jkamar">Jumlah Kamar</label>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="container mt-4 col-sm-8" id="panel_pemesanan">
    <div class="card d-flex justify-content-center">
      <div class="card-body bg-primary">
        <div class="row bg-primary text-white">
          <h4>Form Pemesanan</h4>
          <p>Silahkan memasukan data pada form ini untuk memulai pemesanan!</p>
        </div>
        <div class="row bg-white">
          <form id="form_pesan">
            <div class="form-floating mb-2 mt-3">
              <input type="text" class="form-control" id="nama" name="nama">
              <label for="nama">Nama Pemesanan</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="email" class="form-control" id="email" name="email">
              <label for="pwd">Email</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="text" class="form-control" id="hp" name="hp">
              <label for="hp">No. Telepon</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <input type="text" class="form-control" id="tamu" name="tamu">
              <label for="tamu">Nama Tamu</label>
            </div>
            <div class="form-floating mt-2 mb-2">
              <select class="form-select mt-3" id="idkamar" name="idkamar">
                <?php
                    $sql = "SELECT * FROM tb_kamar";
                    $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                  ?>
                <option value="<?php echo $row["id_kamar"]; ?>"> <?php echo $row["nama_kamar"]; ?> </option>
                <?php 
                    }
                   }
                  ?>
              </select>
              <label for="idkamar">Tipe Kamar</label>
            </div>
            <div class="mt-3 mb-3">
              <button type="button" id="konfirmasi" class="btn btn-outline-success">Konfirmasi Pemesanan</button>
              <button type="button" id="tombol_batal" class="btn btn-outline-danger">Batal</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="container mt-2" id="panel_fasilitas_kami">
    <h2 class="text-center">FASILITAS KAMI</h2>
    <h5 class="text-center">Hotel Merdeka</h5>
    <div class="container mt-4">
      <div class="card">
        <h5>Kolam Renang</h5>
        <p>The .img-fluid class makes the image scale nicely to the parent element (resize the browser window to see the
          effect):</p>
        <img class="img-fluid" max-width: 100%; height: auto; src="image/satu.jpg" alt="Gambar">
      </div>
    </div>
    <div class="container mt-4">
      <div class="card">
        <h4>Kantin Umum</h4>
        <p>The .img-fluid class makes the image scale nicely to the parent element (resize the browser window to see the
          effect):</p>
        <img class="img-fluid" max-width: 100%; height: auto; src="image/dua.jpg" alt="Gambar">
      </div>
    </div>
  </div>

  <div class="container mt-2 col-sm-7" id="panel_kamar">
    <h2 class="text-center">TIPE KAMAR KAMI</h2>
    <h5 class="text-center">Hotel Merdeka</h5>

    <div class="justify-content-center">
      <div class="card mt-2 mb-4">
        <div class="">
          <h5 class="card-title">Tipe Superior:</h5>
          <ul>
            <li>Kamar berukuran luas 32 m2</li>
            <li>Kamar mandi Shower</li>
            <li>AC</li>
            <li>LED</li>
          </ul>
          <img class="img-fluid" src="image/tiga.jpg" alt="Card image">
        </div>
      </div>
      <div class="card mt-2 mb-4">
        <div class="">
          <h5 class="card-title">Tipe Delux:</h5>
          <ul>
            <li>Kamar berukuran luas 32 m2</li>
            <li>Kamar mandi Shower</li>
            <li>AC</li>
            <li>LED</li>
          </ul>
          <img class="img-fluid" src="image/dua.jpg" alt="Card image">
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-2" id="panel_tentang_kami">
    <div class="d-flex justify-content-center">
      <div class="row">
        <div class="col-sm-12 p-5">
          <h2 class="text-center">TENTANG KAMI</h2>
          <p> <b>Hotel MERDEKA</b> terkenal dengan keramahan kelas dunia, desain hotel yang mengagumkan dan standar
            layanan yang tak tertandingi di Bali dan Jakarta, AYANA adalah resort bintang lima yang pertama di Pantai
            Waecicu, Pulau Flores, hanya dengan satu jam penerbangan dari Pulau Bali yang sangat indah.
            AYANA Komodo Resort, Waecicu Beach memiliki 13 suites dan 192 kamar tamu yang premium. Terinspirasi dengan
            cahaya, kenyamanan dan ruang terbuka, setiap kamar yang kontemporer menawarkan pemandangan laut yang menawan
            dengan jendela besar untuk menikmati cahaya keemasan dari matahari yang terbenam di belakang Pulau Kukusan.

            Berlokasi di salah satu pulau berbukit dan indah dari kepulauan Indonesia, terdapat beragam agama, bahasa
            dan pemandangan yang luar biasa yang berpadu dengan laut berwarna biru kristal dan pantai dengan pasir putih
            yang asli.
          </p>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-5 p-2 bg-secondary text-white text-center">
    <p>@Bagas by UKK RPL 2022</p>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap5.0.1.bundle.min.js"></script>
  <script src="crud_js/pesan.js"></script>

  <script>
    $(document).ready(function () {

      $('#panel_cek').hide();
      $('#panel_fasilitas_kami').hide();
      $('#panel_pemesanan').hide();
      $('#panel_tentang_kami').show();
      $('#panel_kamar').hide();

      $("#tombol_pesan").click(function () {
        $('#panel_tentang_kami').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_cek').show();
        $('#panel_pemesanan').show();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });

      $("#tombol_batal").click(function () {
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').show();
        $('#demo_slide').show();
        $('#panel_kamar').hide();
      });

      $("#tombol_fasilitas").click(function () {
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').show();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });

      $("#tombol_kamar").click(function () {
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').show();
        $('#demo_slide').hide();
      });

    });
  </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
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

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="index.html" class="navbar-brand sidebar-gone-hide">Hotel Hebat</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                    </ul>
                </div>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Options</div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Admin Dashboard</div>
                                <a href="login.php" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Masuk
                                </a>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" id="" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="tombol_kamar" class="nav-link"><i
                                    class="fas fa-bed"></i><span>Kamar</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="tombol_fasilitas" class="nav-link"><i
                                    class="fas fa-hotel"></i><span>Fasilitas</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div id="my-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="image/satu.jpg" alt="">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Title</h5>
                                                <p>Text</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#my-carousel" data-slide="prev"
                                        role="button">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#my-carousel" data-slide="next"
                                        role="button">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <div class="jumbotron">
                    <hr class="my-2">
                    <div class="container mt-2" id="panel_tentang_kami">
                        <div class="d-flex justify-content-center">
                            <div class="row">
                                <div class="col-sm-12 p-5">
                                    <h2 class="text-center">TENTANG KAMI</h2>
                                    <p> <b>Hotel Hebat</b> terkenal dengan keramahan kelas dunia, desain hotel yang
                                        mengagumkan dan standar
                                        layanan yang tak tertandingi di Magelang, Hotel Hebat adalah resort bintang
                                        lima yang pertama di Magelang
                                        Hotel Hebat memiliki 3 Tipe Kamar dan 50 lebih kamar tamu yang premium.
                                        Terinspirasi dengan
                                        cahaya, kenyamanan dan ruang terbuka, setiap kamar yang kontemporer menawarkan
                                        pemandangan laut yang
                                        menawan
                                        dengan jendela besar untuk menikmati cahaya keemasan dari matahari yang
                                        terbenam di belakang Pulau
                                        Kukusan.
                                        Berlokasi di salah satu pulau berbukit dan indah dari kepulauan Indonesia,
                                        terdapat beragam agama, bahasa
                                        dan pemandangan yang luar biasa yang berpadu dengan laut berwarna biru kristal
                                        dan pantai dengan pasir
                                        putih
                                        yang asli.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> UKK RPL <a href="#">Bagas
                        Cahya Pamungkas</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
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
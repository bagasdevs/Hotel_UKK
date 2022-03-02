 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Dashboard</h1>
         </div>
         <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                 <div class="card card-statistic-1">
                     <div class="card-icon bg-primary">
                         <i class="far fa-user"></i>
                     </div>
                     <div class="card-wrap">
                         <div class="card-header">
                             <h4>Total User</h4>
                         </div>
                         <div class="card-body">
                             <?php echo $jumlah_user; ?>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                 <div class="card card-statistic-1">
                     <div class="card-icon bg-danger">
                         <i class="fas fa-hotel"></i>
                     </div>
                     <div class="card-wrap">
                         <div class="card-header">
                             <h4>Fasilitas</h4>
                         </div>
                         <div class="card-body">
                             <?php echo $jumlah_fumum; ?>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                 <div class="card card-statistic-1">
                     <div class="card-icon bg-warning">
                         <i class="fas fa-bed"></i>
                     </div>
                     <div class="card-wrap">
                         <div class="card-header">
                             <h4>Kamar</h4>
                         </div>
                         <div class="card-body">
                             <?php echo $jumlah_kamar; ?>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                 <div class="card card-statistic-1">
                     <div class="card-icon bg-success">
                         <i class="fas fa-newspaper"></i>
                     </div>
                     <div class="card-wrap">
                         <div class="card-header">
                             <h4>Laporan</h4>
                         </div>
                         <div class="card-body">
                             <?php echo $jumlah_pelanggan; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
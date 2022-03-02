<?php
 //print_r($_POST);
 include "../../includes/koneksi.php";
 ?>

<div class="container" id="data_fasilitas_umum">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Fasilitas Umum</h4>
        <div class="card-header-action">
          <button type="button" onclick="add_modal_fasilitas_umum()" class="btn btn-primary"><i class="fas fa-plus"></i>
            Tambah Data</button>
        </div>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="tb_kamar" class="table table-striped mb-0">
            <thead>
              <tr>
                <th>ID Fasilitas</th>
                <th>Nama Fasilitas</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Foto</th>
                <th class="text-center" style="width: 300px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql="SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
              $result= $conn->query($sql);
              if ($result->num_rows > 0 ) {
                while ($row = $result->fetch_assoc())
                {
                  
                ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row["nama_fasilitas"]; ?></td>
                <td class="text-center"><?php echo $row["keterangan"]; ?></td>
                <td style="text-align: center;"><img src="../<?php echo $row["gambar"]; ?>" class="d-block"
                    style="width: 80px; height: 40px">
                </td>
                <td class="text-center">
                  <a href="#" data-id="" class="btn btn-info" onClick="show_modal_fasilitas_umum(this.id)"
                    id="<?php echo $row["id"]; ?>"><i class="fas fa-eye"></i> Lihat</a>
                  <a href="proses/edit_fasilitas_umum.php?id=<?php echo $row['id']; ?>" data-id=""
                    class="btn btn-primary" onClick="check_modal_fasilitas_umum(this.id)"
                    id="<?php echo $row["id"]; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="proses/hapus_fasilitas_umum.php?id=<?php echo $row['id']; ?>" data-id=""
                    class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php
                }
              } 
            ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="modal_tambah_fasilitas_umum">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Fasilitas Umum</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="form_fk" action="POST" enctype="multipart/form-data">
          <div class="mb-3 mt-3 form-floating">
            <label for="nama_fasilitas_umum">Nama Fasilitas</label>
            <input type="text" class="form-control" id="nama_fasilitas_umum" name="nama_fasilitas_umum">
          </div>
          <div class="mb-3 mt-3 form-floating">
            <label for="tipe_fasilitas">Ketrangan Fasilitas</label>
            <textarea class="form-control" rows="9" id="ket" name="ket"></textarea>
          </div>
          <div class="mb-3 mt-3">
            <label for="upload_fasilitas">Pilih Gambar:</label>
            <input type="file" class="form-control" id="upload_fasilitas" name="upload_fasilitas" value="Upload">
          </div>
        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_fasilitas_umum">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="lihat_data_fasilitas_umum">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deskripsi Fasilitas Umum</h4>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div id="tampil_fasilitas_umum" class="modal-body">

      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  function add_modal_fasilitas_umum() {
    $("#modal_tambah_fasilitas_umum").modal('toggle');
  }

  function show_modal_fasilitas_umum(id) {
    $("#lihat_data_fasilitas_umum").modal('toggle');
    $.ajax({
      url: "proses/tampil_fasilitas_umum.php",
      method: "GET",
      data: {
        idp: id
      },
      success: function (data) {
        $("#tampil_fasilitas_umum").html(data).refresh;
      }
    });
  }

  $(function () {
    $("#add_fasilitas_umum").on('click', function () {
      var nama = $("#nama_fasilitas_umum").val();
      var ket = $("#ket").val();
      document.getElementById("form_fk").reset();

      if ((nama == "") || (ket == "")) {
        alert("Terjadi kesalahan. Ada data yang kosong!");
        return;
      }

      $.ajax({
        url: "proses/tambah_fasilitas_umum.php",
        method: "POST",
        data: {
          nama: nama,
          ket: ket,
        },
        success: function (data) {
          if (data == "OK") {
            alert("Data Tersimpan!")
            window.location.href = "index.php?id=fasilitas_umum";
          }
          if (data == "ERROR") {
            alert("Data TIDAK tersimpan!")
          }
        }

      });
    });

  });
</script>
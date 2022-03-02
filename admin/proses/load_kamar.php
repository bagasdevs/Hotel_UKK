<?php
 include "../../includes/koneksi.php";
 ?>

<div class="container" id="data_kamar">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Kamar</h4>
        <div class="card-header-action">
          <button onclick="add_modal_kamar()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="tb_kamar" class="table table-striped mb-0">
            <thead>
              <th>ID Kamar</th>
              <th>Nama Kamar</th>
              <th class="text-center">Total Kamar</th>
              <th class="text-center">Aksi</th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql="SELECT * FROM tb_kamar ORDER BY id_kamar DESC LIMIT 5";
              $result= $conn->query($sql);
              if ($result->num_rows > 0 ) {
                while ($row = $result->fetch_assoc())
                {
                  
                ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row["nama_kamar"]; ?></td>
                <td class="text-center"><?php echo $row["total_kamar"]; ?></td>
                <td class="text-center">
                  <a href="#" data-id="" class="btn btn-info" onClick="show_modal_kamar(this.id)"
                    id="<?php echo $row["id_kamar"]; ?>"><i class="fas fa-eye"></i> Lihat</a>
                  <a href="proses/edit_kamar.php?id=<?php echo $row['id_kamar']; ?>" data-id="" class="btn btn-primary"
                    id="<?php echo $row["id_kamar"]; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="proses/hapus_kamar.php?id=<?php echo $row['id_kamar']; ?>" class="btn btn-danger"
                    id="<?php echo $row["id_kamar"]; ?>"><i class="fas fa-trash"></i> Hapus</a>
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
    <div class="modal fade" id="modal_tambah_kamar">
      <div class="modal-dialog ">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Data Kamar</h4>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="form_k">
              <div class="mb-3 mt-3 form-floating">
                <label for="nama_kamar">Nama Kamar</label>
                <input type="text" class="form-control" id="nama_kamar" name="nama_kamar">
              </div>
              <div class="mb-3 mt-3 form-floating">
                <label for="jml_kamar">Jumlah Kamar</label>
                <input type="number" class="form-control" id="jml_kamar" name="jml_kamar">
              </div>
            </form>

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="add_kamar">Simpan</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_edit_kamar">
      <div class="modal-dialog ">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Data Kamar</h4>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="form_e">
              <input type="hidden" class="form-control" id="idk" name="idk">
              <div class="mb-3 mt-3 form-floating">
                <label for="nproses">Nama Kamar</label>
                <input type="text" class="form-control" id="nproses" name="nproses" value="">
              </div>
              <div class="mb-3 mt-3 form-floating">
                <label for="jproses">Jumlah Kamar</label>
                <input type="number" class="form-control" id="jproses" name="jproses" value="">
              </div>
            </form>

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="edit_kamar">Ubah</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="lihat_data_kamar">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Deskripsi Kamar</h4>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div id="tampil_kamar" class="modal-body">

          </div>


        </div>
      </div>
    </div>
    <?php 
?>
    <script type="text/javascript">
      function add_modal_kamar() {
        $("#modal_tambah_kamar").modal('toggle');
      }

      function edit_modal_kamar() {
        $("#modal_edit_kamar").modal('toggle');
      }


      function show_modal_kamar(id) {
        $("#lihat_data_kamar").modal('toggle');
        $.ajax({
          url: "proses/tampil_kamar.php",
          method: "GET",
          data: {
            idp: id
          },
          success: function (data) {
            $("#tampil_kamar").html(data).refresh;
          }
        });
      }

      $(function () {
        $("#add_kamar").on('click', function () {
          var nama = $("#nama_kamar").val();
          var jkamar = $("#jml_kamar").val();
          document.getElementById("form_k").reset();

          if ((nama == "") || (jkamar == "")) {
            alert("Terjadi kesalahan. Ada data yang kosong!");
            return;
          }

          $.ajax({
            url: "proses/tambah_kamar.php",
            method: "POST",
            data: {
              nama: nama,
              jkamar: jkamar
            },
            success: function (data) {
              if (data == "OK") {
                alert("Data Tersimpan!")
                window.location.href = "index.php?id=kamar";
              }
              if (data == "ERROR") {
                alert("Data TIDAK tersimpan!")
              }
            }

          });
        });

      });

      $("#edit_kamar").click(function () {
        var npro = $("#nproses").val();
        var jpro = $("#jproses").val();
        var edit = $("#edit_kamar").val();

        $.ajax({
          url: "proses/ubah_kamar.php",
          method: "POST",
          data: {
            npro: nproses,
            jpro: jproses,
            ubah: edit
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
    </script>
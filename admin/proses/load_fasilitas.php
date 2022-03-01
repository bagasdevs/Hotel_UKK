<?php
 //print_r($_POST);
 include "../../includes/koneksi.php";
 ?>

<div class="container" id="data_fasilitas">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Data Fasiitas</h4>
        <div class="card-header-action">
          <button onclick="add_modal_fasilitas()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
            Data</button>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <div class="card mt-2 mb-4" style="width:2000px">
          <div class="card-body">
            <table id="tb_kamar" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID Fasilitas</th>
                  <th>Tipe Kamar</th>
                  <th class="text-center">Nama Fasilitas</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql="SELECT * FROM tb_fasilitas_kamar JOIN tb_kamar ON tb_fasilitas_kamar.id_kamar = tb_kamar.id_kamar ORDER BY id DESC LIMIT 5";
                $result= $conn->query($sql);
                if ($result->num_rows > 0 ) {
                while ($row = $result->fetch_assoc())
                {
                  
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row["nama_kamar"]; ?></td>
                  <td class="text-center"><?php echo $row["fasilitas"]; ?></td>
                  <td class="text-center">
                    <a href="#" data-id="" class="btn btn-info" onClick="show_modal_fasilitas_kamar(this.id)"
                      id="<?php echo $row["id"]; ?>"><i class="fas fa-eye"></i> Lihat</a>
                    <a href="#" data-id="" class="btn btn-primary" onClick="check_modal_fasilitas_kamar(this.id)"
                      id="<?php echo $row["id"]; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a href="#" data-id="" class="btn btn-danger" onClick="delete_modal_fasilitas_kamar(this.id)"
                      id="<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i> Hapus</a>
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

  <!------------------------------ Script Awal Modal Tambah Fasilitas ------------------------------ -->
  <div class="modal fade" id="modal_tambah_fasilitas">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Data Fasilitas</h4>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form id="form_fu">
            <div class="mb-3 mt-3 form-floating">
              <label for="idkamar">Tipe Kamar</label>
              <select class="form-control select2 " id="idkamar" name="idkamar">
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

            </div>

            <div class="mb-3 mt-3 form-floating">
              <label for="nama_fasilitas">Nama Fasilitas</label>
              <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas">
            </div>

            <div class="mb-3 mt-3">
              <label for="upload_fasilitas">Pilih Gambar:</label>
              <input type="file" class="form-control" id="upload_fasilitas">
            </div>

          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="add_fasilitas_kamar">Simpan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="lihat_data_fasilitas">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deskripsi Fasilitas</h4>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div id="tampil_fasilitas" class="modal-body">

        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function add_modal_fasilitas() {
      $("#modal_tambah_fasilitas").modal('toggle');
    }

    function show_modal_fasilitas_kamar(id) {
      $("#lihat_data_fasilitas").modal('toggle');
      $.ajax({
        url: "proses/tampil_fasilitas.php",
        method: "GET",
        data: {
          idp: id
        },
        success: function (data) {
          $("#tampil_fasilitas").html(data).refresh;
        }
      });
    }

    $(function () {
      $("#add_fasilitas_kamar").on('click', function () {
        var idkamar = $("#idkamar").val();
        var nama_fasilitas = $("#nama_fasilitas").val();
        document.getElementById("form_fu").reset();

        if ((idkamar == "") || (nama_fasilitas == "")) {
          alert("Terjadi kesalahan. Ada data yang kosong!");
          return;
        }

        $.ajax({
          url: "proses/tambah_fasilitas_kamar.php",
          method: "POST",
          data: {
            idkamar: idkamar,
            nama_fasilitas: nama_fasilitas
          },
          success: function (data) {
            //alert(data);return;
            if (data == "OK") {
              alert("Data Tersimpan!")
              window.location.href = "index.php?id=fasilitas_kamar";
            }
            if (data == "ERROR") {
              alert("Data TIDAK tersimpan!")
            }
          }

        });
      });

    });
  </script>
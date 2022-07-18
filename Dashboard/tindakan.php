<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../Asset/css/base.css">
  <link rel="stylesheet" href="../Asset/css/mobile.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="../Asset/SweetAlert/sweetalert2.min.css">
  <link rel="stylesheet" href="../Asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title>UJIKOM</title>
  <style type="text/css">
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#0C9;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
      }

      .my-float{
        margin-top:22px;
      }
  </style>
</head>

<body style="background:#f9f9f9;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ujian Sertifikasi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="tindakan.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perawat.php">Perawat</a>
        </li>
       
      </ul>
    </div>
  </nav>
  <br>
  <center><h2>Home</h2></center>
  <div class="col-3">
                      <div id="Tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Data tindakan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
             <!-- TAMBAH -->
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="barang">ID Perawat </label>
                                <select class="form-control" id="id_perawat" name="id_perawat">
                                  <option selected disabled>--Pilih  ID Perawat--</option>
                                  <?php
                                    include '../Auth/koneksi.php';
                                    $perawat = mysqli_query($koneksi, "select * from table_perawat");
                                    $i = 1;
                                    
                                    while ($row = mysqli_fetch_array($perawat)) {
                                      echo "<option value='".$row['id_perawat']."'>".$row['id_perawat']."</option>";
                                      $i++;
                                    }
                                    ?>
                                  
                                  
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="barang">Nama Pasien </label>
                                <select class="form-control" id="nama_pasien" name="nama_pasien">
                                  <option selected disabled>--Pilih  Nama Pasien--</option>
                                  <?php
                                    include '../Auth/koneksi.php';
                                    $pasien = mysqli_query($koneksi, "select * from table_pasien");
                                    $i = 1;
                                    
                                    while ($row = mysqli_fetch_array($pasien)) {
                                      echo "<option value='".$row['nama']."'>".$row['nama']."</option>";
                                      $i++;
                                    }
                                    ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="stok">Jam</label>
                                <input type="time" class="form-control" id="jam" required>
                              </div>
                              <div class="form-group">
                                <label for="harga">Diagnosa</label>
                                <input type="text" class="form-control" id="diag" required>
                              </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary btn_simpan">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- TAMPIL -->
                  <table class="table" id="tabel-data">
                    <thead class="" style="background:#007BFF;color:#fff;">
                      <tr>
                        <th scope="col">No_RM</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">TTL</th>
                        <th scope="col">id_Perawat</th>
                        <th scope="col">id_Poliklinik</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">No Registrasi</th>
                        <th scope="col">
                          <center>opsi</center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../Auth/koneksi.php';
                      $tindakan = mysqli_query($koneksi, "select table_pasien.*,table_perawat.id_perawat,table_perawat.id_poliklinik,tabel_tindakan.diagnosa,tabel_tindakan.no_registrasi from tabel_tindakan join table_perawat on table_perawat.id_perawat=tabel_tindakan.id_perawat join table_pasien on table_pasien.nama=tabel_tindakan.nama_pasien");
                      $i = 1;
                      
                      while ($row = mysqli_fetch_array($tindakan)) {
                        echo "<tr class='itemtindakan" . $row['no_registrasi'] . "'>
                          <td>" . $row['No_RM'] . "</td>
                          <td>" . $row['nama'] . "</td>
                          <td>" . $row['alamat'] . "</td>
                          <td>" . $row['jenis_kelamin'] . "</td>
                          <td>" . $row['tempat_lahir'] .", ". $row['tgl_lahir']. "</td>
                          <td>" . $row['id_perawat'] . "</td>
                          <td>" . $row['id_poliklinik'] . "</td>
                          <td>" . $row['diagnosa']."</td>
                          <td>" . $row['no_registrasi']."</td>
                          <td>
                            <center>
                                <button class='btn btn-success btn_view'data-toggle='modal' data-id=".$row['no_registrasi']." data-target='#view'aria-hidden='true' type='button'><i class='fas fa-eye'></i> </button>
                                <button class='btn btn-primary btn_edit'data-toggle='modal' data-id=".$row['no_registrasi']." data-target='#edit'aria-hidden='true' type='button'><i class='fas fa-pen'></i> </button>
                                <button class='btn btn-primary btn_delete' style='background:red;border:none;' data-id=".$row['no_registrasi']."> <i class='fas fa-trash'></i> </button>
                            </center>
                          </td>
                        </tr>";
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <!-- view -->
                    <div id="view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">View Data tindakan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- EDIT -->
                        <div class="modal-body">
                          <div class="form-group">
                                <label for="">ID Perawat </label>
                                <input type="text" class="form-control" id="vid_perawat" readonly>

                              </div>
                              <div class="form-group">
                                <label for="">Nama Pasien </label>
                                <input type="text" class="form-control" id="vnama_pasien" readonly>

                              </div>
                              <div class="form-group">
                                <label for="">Jam</label>
                                <input type="time" class="form-control" id="vjam" readonly>
                              </div>
                              <div class="form-group">
                                <label for="">Diagnosa</label>
                                <input type="text" class="form-control" id="vdiag" readonly>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary btn_update">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end mView -->
                  <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data tindakan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- EDIT -->
                        <div class="modal-body">
                          <div class="form-group">
                                <label for="">ID Perawat </label>
                                <select class="form-control" id="eid_perawat" name="id_perawat">
                                  <option selected disabled>--Pilih Jenis ID Perawat--</option>
                                  <?php
                                    include '../Auth/koneksi.php';
                                    $perawat = mysqli_query($koneksi, "select * from table_perawat");
                                    $i = 1;
                                    
                                    while ($row = mysqli_fetch_array($perawat)) {
                                      echo "<option value='".$row['id_perawat']."'>".$row['id_perawat']."</option>";
                                      $i++;
                                    }
                                    ?>
                                  
                                  
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">Nama Pasien </label>
                                <select class="form-control" id="enama_pasien" name="nama_pasien">
                                  <option selected disabled>--Pilih Jenis Nama Pasien--</option>
                                  <?php
                                    include '../Auth/koneksi.php';
                                    $pasien = mysqli_query($koneksi, "select * from table_pasien");
                                    $i = 1;
                                    
                                    while ($row = mysqli_fetch_array($pasien)) {
                                      echo "<option value='".$row['nama']."'>".$row['nama']."</option>";
                                      $i++;
                                    }
                                    ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">Jam</label>
                                <input type="time" class="form-control" id="ejam" required>
                              </div>
                              <div class="form-group">
                                <label for="">Diagnosa</label>
                                <input type="text" class="form-control" id="ediag" required>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary btn_update">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <a href="#" class="float" data-toggle="modal" data-target="#Tambah"aria-hidden="true">
      <i class="fa fa-plus my-float"></i>
    </a>
  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="../Asset/SweetAlert/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="../Asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script>
    $(document).ready(() => {
      $('#tabel-data').DataTable({"pageLength": 5})
    });

    function Delete_User(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "../Controller/Tindakan_cr.php",
            type: 'post',
            data: {
              id: id,
              tipe: 'delete'
            },
            success: function(data) {
              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
              $('.itemtindakan' + id).fadeOut(1500, function() {
                $(this).remove();
              });
            },
            error: function(data) {
              swalWithBootstrapButtons.fire(
                'Gagal!',
                'Failed to delete your file.',
                'error'
              );
            }
          });
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      });
    }

    $('.btn_delete').on('click', function() {
      id = $(this).data('id');
      Delete_User(id);
    });

    $('.btn_simpan').on('click', function() {
      let id_perawat = $('#id_perawat').val();
      let nama_pasien = $('#nama_pasien').val();
      let jam = $('#jam').val();
      let diagnosa = $('#diag').val();
      if (id_perawat == '' || nama_pasien == '' ) {
        Swal.fire(
          'Warning!',
          'Pastikan Semua Data sudah terisi',
          'warning'
        );
      } else {
        $.ajax({
          url: "../Controller/Tindakan_cr.php",
          type: 'post',
          data: {
            id: null,
            tipe: 'create',
            id_perawat,
            nama_pasien,
            jam,diagnosa
            
          },
          success: function(data) {
            Swal.fire({
              icon: 'success',
              title: 'Your work has been saved',
              showConfirmButton: false,
              timer: 1500
            })
            setTimeout(function() {
              window.location.reload(1);
            }, 1600);
          },
          error: function(data) {
            swalWithBootstrapButtons.fire(
              'Gagal!',
              'Failed to add data',
              'error'
            );
          }
        });
      }
    });

    $('.btn_edit').on('click', function() {
      id = $(this).data('id');
      edit_tindakan(id);
    });

    $('.btn_view').on('click', function() {
      id = $(this).data('id');
      edit_tindakan(id);
      $.ajax({
        url: "../Controller/Tindakan_cr.php",
        type: 'post',
        data: {
          id: id,
          tipe: 'edit'
        },
        success: function(data) {
          var edit = $.parseJSON(data);
          $('#vid_perawat').val(edit[0]['per']);
          $('#vnama_pasien').val(edit[0]['nmp']);
          $('#vjam').val(edit[0]['jam']);
          $('#vdiag').val(edit[0]['diag']);
        },
        error: function(data) {
          swalWithBootstrapButtons.fire(
            'Gagal!',
            'Failed to delete your file.',
            'error'
          );
        }
      });
    });

    $('.btn_update').on('click', function() {
      $.ajax({
        url: "../Controller/Tindakan_cr.php",
        type: 'post',
        data: {
          id: id,
          tipe: 'update',
          per: $('#eid_perawat').val(),
          nmp: $('#enama_pasien').val(),
          jam: $('#ejam').val(),
          diag: $('#ediag').val()
        },
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'Update Success !',
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(function() {
            window.location.reload(1);
          }, 1600);
        },
        error: function(data) {
          swalWithBootstrapButtons.fire(
            'Gagal!',
            'Failed to delete your file.',
            'error'
          );
        }
      });
    });

    function edit_tindakan(id) {
      $.ajax({
        url: "../Controller/Tindakan_cr.php",
        type: 'post',
        data: {
          id: id,
          tipe: 'edit'
        },
        success: function(data) {
          var edit = $.parseJSON(data);
          $('#eid_perawat').val(edit[0]['per']);
          $('#enama_pasien').val(edit[0]['nmp']);
          $('#ejam').val(edit[0]['jam']);
          $('#ediag').val(edit[0]['diag']);
        },
        error: function(data) {
          swalWithBootstrapButtons.fire(
            'Gagal!',
            'Failed to delete your file.',
            'error'
          );
        }
      });
    }
  </script>
</body>

</html>
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
          <a class="nav-link" href="tindakan.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perawat.php">Perawat<span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
    </div>
  </nav>
  <br>
  <center><h2>Perawat</h2></center>
  
  <div class="col-3">
                      <div id="Tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Data perawat</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
             <!-- TAMBAH -->
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="barang">ID Poliklinik </label>
                                <input type="text" class="form-control" id="poli"  required>
                              </div>
                              <div class="form-group">
                                <label for="barang">Nama </label>
                                <input type="text" class="form-control" id="nama"  required>
                              </div>
                              <div class="form-group">
                                <label for="stok">Alamat</label>
                                <input type="text" class="form-control" id="alamat" required>
                              </div>
                              <div class="form-group">
                                <label for="harga">tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl" required>
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
                        <th scope="col">Id Perawat</th>
                        <th scope="col">Id Poliklinik </th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">
                          <center>opsi</center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../Auth/koneksi.php';
                      $perawat = mysqli_query($koneksi, "select * from table_perawat");
                      $i = 1;
                      
                      while ($row = mysqli_fetch_array($perawat)) {
                        echo "<tr class='itemperawat" . $row['id_perawat'] . "'>
                          <td>" . $row['id_perawat'] . "</td>
                          <td>" . $row['id_poliklinik'] . "</td>
                          <td>" . $row['nama'] . "</td>
                          <td>" . $row['alamat'] . "</td>
                          <td>" . $row['tgl_lahir']."</td>
                          <td>
                            <center>
                                <button class='btn btn-primary btn_edit'data-toggle='modal' data-id=".$row['id_perawat']." data-target='#edit'aria-hidden='true' type='button'><i class='fas fa-pen'></i> </button>
                                <button class='btn btn-primary btn_delete' style='background:red;border:none;' data-id=".$row['id_perawat']."> <i class='fas fa-trash'></i> </button>
                            </center>
                          </td>
                        </tr>";
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data perawat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- EDIT -->
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="">ID Poliklinik </label>
                            <input type="text" class="form-control" id="edit_poli"  required>
                          </div>
                          <div class="form-group">
                            <label for="">Nama </label>
                            <input type="text" class="form-control" id="edit_nama"  required>
                          </div>
                          <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" required>
                          </div>
                          <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="edit_tgl" required>
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
            url: "../Controller/Perawat_cr.php",
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
              $('.itemperawat' + id).fadeOut(1500, function() {
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
      let poli = $('#poli').val();
      let nama = $('#nama').val();
      let alamat = $('#alamat').val();
      let tgl = $('#tgl').val();
      if (nama == '' || alamat == '' || poli == ''|| tgl == '') {
        Swal.fire(
          'Warning!',
          'Pastikan Semua Data sudah terisi',
          'warning'
        );
      } else {
        $.ajax({
          url: "../Controller/Perawat_cr.php",
          type: 'post',
          data: {
            id: null,
            tipe: 'create',
            poli,
            nama,
            alamat,tgl
            
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
      edit_perawat(id);
    });

    $('.btn_update').on('click', function() {
      $.ajax({
        url: "../Controller/Perawat_cr.php",
        type: 'post',
        data: {
          id: id,
          tipe: 'update',
          poli: $('#edit_poli').val(),
          nama: $('#edit_nama').val(),
          alamat: $('#edit_alamat').val(),
          tgl: $('#edit_tgl').val()
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

    function edit_perawat(id) {
      $.ajax({
        url: "../Controller/Perawat_cr.php",
        type: 'post',
        data: {
          id: id,
          tipe: 'edit'
        },
        success: function(data) {
          var edit = $.parseJSON(data);
          $('#edit_poli').val(edit[0]['poli']);
          $('#edit_nama').val(edit[0]['nama']);
          $('#edit_alamat').val(edit[0]['alamat']);
          $('#edit_tgl').val(edit[0]['tgl']);
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
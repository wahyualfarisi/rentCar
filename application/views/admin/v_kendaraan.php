<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Daftar Kendaraan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v3</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <div class="container-fluid">
    <div class="card">
            <div class="card-header">
              <div class="row">

                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?= $rowsToyota->num_rows() ?></h3>

                      <p>TOYOTA</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('admin/Kendaraan?merk=TOYOTA') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?= $rowsHonda->num_rows() ?></h3>

                      <p>HONDA</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('admin/Kendaraan?merk=HONDA') ?> " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?= $rowsSuzuki->num_rows() ?></h3>

                      <p>SUZUKI</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('admin/Kendaraan?merk=SUZUKI') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>

              <h4>Sortir PLAT   <i class="fa fa-angle-down right"></i></h4>

              <div class="row">
                <div class="col-md-2">
                  <a href="<?= base_url('admin/Kendaraan')  ?>" type="button" class="btn btn-block btn-outline-danger  " >Semua plat nomor</a>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('admin/Kendaraan?plat=ganjil')  ?> " type="button" class="btn btn-block btn-outline-danger  ">Plat Ganjil</a>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('admin/Kendaraan?plat=genap')  ?> " type="button" class="btn btn-block btn-outline-danger ">Plat Genap</a>
                </div>
              </div>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:10px">No</th>
                  <th style="width:80px">No Polisi</th>
                  <th style="width:80px">Merk</th>
                  <th style="width:80px">Type(s)</th>
                  <th style="width:180px">Status</th>
                  <th style="width:50px" >Foto</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($getAllKendaraan->result() as $key ): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key->nomor_polisi ?></td>
                  <td><?= $key->merk.' '.'('.$key->transmisi.')'; ?></td>
                  <td><?= $key->type ?></td>
                  <td>
                      <?php
                        if($key->status_mobil == 0){
                          echo "Tersedia";
                        }else{
                          echo "Sedang di sewa";
                        }
                       ?>
                  </td>
                  <td>
                    <img src="<?= base_url('assets/users/images/'.$key->foto_mobil) ?>" alt="foto_mobil" width="80px">
                  </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
  </div>



</div>
<!-- /.content-wrapper -->
<script src="<?= base_url().'assets/admin/plugins/jquery/jquery.min.js' ?> "></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });

</script>

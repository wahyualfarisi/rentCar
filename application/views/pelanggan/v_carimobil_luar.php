    <?php
      if($_GET['kategori_sewa'] === 1){
        $kat = 'Dalam Kota';
      }else{
        $kat = 'Luar Kota';
      }

     ?>
    <!--== Page Title Area Start ==-->
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding" style="margin-top: 2%;">
        <div class="container" >
            <h2>LAYANAN SEWA LUAR KOTA</h2>
            <div class="border-form">
                <h6> Pencarian Mobil </h6>
                <div class="row">
                      <div class="col-md-3" >
                            <div class="form-group">
                              <input type="text" class="form-control" aria-label="..." placeholder="jenis sewa" value="<?= $kat ?>" disabled>
                            </div><!-- /input-group -->
                      </div>

                      <div class="col-md-3" >
                        <div class="form-group">
                          <input type="text" class="form-control" aria-label="..." placeholder="jenis sewa" value="<?= $_GET['lokasi_sewa']  ?>" disabled>
                        </div><!-- /input-group -->
                      </div>

                      <div class="col-md-3" >
                        <div class="form-group">
                          <input type="text" class="form-control" aria-label="..." placeholder="jenis sewa" value="<?= formatHariTanggal($_GET['tgl_ambil'])  ?> " disabled>
                        </div><!-- /input-group -->
                      </div>

                      <div class="col-md-3" >
                        <div class="form-group">
                          <input type="text" class="form-control" aria-label="..." placeholder="jenis sewa" value="<?= formatHariTanggal($_GET['tgl_kembali'])  ?> " disabled>
                        </div><!-- /input-group -->
                      </div>
                </div>
                <center>
                    <input type="button" class="btn btn-warning btn-md" name="batal" id="batal" value="Batalkan">
                </center>
          </div>


            <div class="row" style="margin-top: 10px;">
                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap">

                      <!-- Single Sidebar Start -->
                      <div class="single-sidebar">
                          <h3>Filter Pencarian</h3>
                          <div class="sidebar-body">
                              <div class="list-group">
                                  <p>Transmisi :</p>
                                  <?php foreach($transmisi_data->result() as $transmisi): ?>
                                    <div class="list-group-item checkbox">
                                      <label>
                                        <input type="checkbox" class="common_selector transmisi" value="<?= $transmisi->transmisi ?>"> <?= $transmisi->transmisi ?>
                                      </label>
                                    </div>
                                  <?php endforeach; ?>
                              </div>

                              <div class="list-group">
                                <p>Type</p>
                                <?php foreach($type_data->result() as $type):  ?>
                                  <div class="list-group-item checkbox">
                                    <label>
                                      <input type="checkbox" class="common_selector type" value="<?= $type->type ?>"> <?= $type->type ?>
                                    </label>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            </div>
                      </div>
                      <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Daftar Sewa</h3>
                            <div class="sidebar-body">
                            </div>
                        </div>
                        <!-- Single Sidebar End -->




                    </div>
                </div>
                <!-- Sidebar Area End -->

                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <!-- Page Pagination Start -->
                   <div class="page-pagi" id="pagination_link">
                   </div>
                    <!-- Page Pagination End -->

                    <div class="car-list-content m-t-50 filter-data"></div>
                </div>
                <!-- Car List Content End -->

                </div>
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
    <style>
      #loading{
        text-align: center;
        background: url('<?= base_url() ?>assets/loader.gif') no-repeat center;
        height: 150px;
      }
      .page-pagi {
      	margin-top: 50px;
      }

      .page-pagi nav li a {
      	border-color: #ffd000;
      	color: #000;
      	font-weight: 600;
      	-webkit-transition: all 0.4s ease 0s;
      	transition: all 0.4s ease 0s;
      }

      .page-pagi nav ul li.active a {
      	background-color: #ffd000 !important;
      	border-color: #ffd000 !important;
      }

      .page-pagi nav li a:hover {
      	background-color: #ffd000;
      	border-color: #ffd000;
      	color: #fff;
      }
    </style>
<script src="<?= base_url().'assets/users/js/jquery-3.2.1.min.js' ?> "></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript">
    $(document).ready(function() {
      filter_car(1);


      $('#batal').click(function() {
        window.location = "<?= base_url()  ?> ";
      });

      function filter_car(page)
      {
          $('.filter-data').html("<div id='loading'></div>");
          var action     = 'fetch_data';
          var transmisi  = get_filter('transmisi');
          var type       = get_filter('type');

          $.ajax({
            url: "<?= base_url() ?>Home/fetch_car_luarkota/"+page,
            method: "POST",
            dataType: "JSON",
            data: {transmisi:transmisi, type: type},
            success: function(data){
              $('.filter-data').html(data.car_list);
              $('#pagination_link').html("<nav aria-label='Page navigation example'>"+data.pagination_link+"</nav>");
            }
          })
      }

      $(document).on('click', '.pagination li a', function(e) {
        e.preventDefault();
        var page = $(this).data('ci-pagination-page');
        if(!page){
          return false;
        }else{
            filter_car(page);
        }

      })

      $('.common_selector').click(function() {
        filter_car(1);
      })

      function get_filter(class_name)
      {
          var filter = [];
          $('.'+class_name+':checked').each(function() {
            filter.push($(this).val());
          });
          return filter;
      }

      $(document).on('click', '#pilih_mobil', function(e) {
        e.preventDefault();
        var harga_mobil = $('#harga_mobil').val();
        alert(harga_mobil);
      })









    });
</script>

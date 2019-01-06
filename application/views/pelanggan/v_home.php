    <!--== SlideshowBg Area Start ==-->
    <section id="show_pencarian">

    </section>

    <section id="slideslow-bg">
      <div class="container">
              <div class="row">
                  <div class="col-lg-5">
                      <div class="book-a-car">
                          <form id="cari-mobil" method="post">
                              <!--== Pick Up Location ==-->
                              <div class="pickup-location book-item">
                                  <h4>LAYANAN SEWA:</h4>
                                  <select class="custom-select" id="kategori_sewa" name="kategori_sewa">
                                    <option value="0"> select </option>
                                    <?php foreach ($kategorySewa as $key): ?>
                                        <option value="<?= $key->kategori_sewa ?> "><?= $key->jenis_sewa ?></option>

                                    <?php endforeach; ?>
                                  </select>
                              </div>
                              <!--== Pick Up Location ==-->

                              <div class="pickup-location book-item">
                                   <h4>LOKASI</h4>
                                   <select class="custom-select lokasiShow" name="lokasi_sewa" id="lokasi_sewa" >
                                     <option value="0"> select </option>

                                   </select>
                              </div>

                              <!--== Pick Up Date ==-->
                              <div class="pick-up-date book-item">
                                  <h4>TANGGAL AMBIL:</h4>
                                  <input id="startDate2" placeholder="Pick Up Date" name="tgl_ambil"  />

                                  <div class="return-car">
                                      <h4>TANGGAL KEMBALI</h4>
                                      <input id="endDate2" placeholder="Return Date" name="tgl_kembali" disabled >
                                  </div>

                                  <div class="margin-top: 50px">
                                      <div id="bedahari"></div>
                                  </div>

                              </div>


                              <!--== Pick Up Location ==-->


                              <div class="book-button text-center">
                                  <input type="button" id="cari" class="book-now-btn" value="Cari mobil" >
                              </div>

                          </form>
                      </div>
                  </div>

                  <div class="col-lg-7 text-right" style="margin-top: 150px;">
                      <div class="display-table">
                          <div class="display-table-cell">
                              <div class="slider-right-text">
                                  <h1>Madera Transport</h1>
                                  <h1>Booking sekarang juga!</h1>
                                  <p>Pemberlakuan ganjil - genap untuk layanan sewa dalam kota </p>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
    </section>
    <!--== SlideshowBg Area End ==-->

    <!--== About Us Area Start ==-->
    <section id="about-area" class="section-padding">
        <?php $this->load->view('pelanggan/v_tentang_kami') ?>
    </section>
    <!--== About Us Area End ==-->


    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Pilih kendaran mu !</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Pemberlakuan ganjil - genap untuk layanan sewa dalam kota .</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-ur-cars">
                        <div class="row">
                            <div class="col-lg-3">
                                <!-- Choose Filtering Menu Start -->
                                <div class="home2-car-filter">
                                    <a href="#" data-filter="*" class="active">Semua</a>
                                    <a href="#" data-filter=".AVANZA">Avanza</a>
                                    <a href="#" data-filter=".CAYLA">Cayla</a>
                                    <a href="#" data-filter=".AGYA">Agya</a>
                                    <a href="#" data-filter=".BRIO">Brio</a>
                                    <a href="#" data-filter=".MOBILIO">Mobilio</a>
                                    <a href="#" data-filter=".ERTIGA">Ertiga</a>
                                </div>
                                <!-- Choose Filtering Menu End -->
                            </div>

                            <div class="col-lg-9">
                                <!-- Choose Cars Content-wrap -->
                                <div class="row popular-car-gird">

                                  <?php foreach ($getAllCar as $key): ?>
                                    <!-- Single Popular Car Start -->
                                    <div class="col-lg-6 col-md-6 <?= $key->type ?>">
                                        <div class="single-popular-car">
                                            <div class="p-car-thumbnails">
                                                <a class="car-hover" href="<?= base_url().'assets/users/images/'.$key->foto_mobil ?> ">
                                                    <img src="<?= base_url().'assets/users/images/'.$key->foto_mobil ?> " alt="JSOFT">
                                                </a>
                                            </div>

                                            <div class="p-car-content">
                                                <h3>
                                                    <a href="#"><?= $key->type ?> </a>
                                                    <span class="price"><i class="fa fa-tag"></i><?= number_format($key->biaya_luar_kota)?> </span>
                                                    
                                                </h3>

                                                <h5></h5>
                                                <div class="p-car-feature">
                                                    <a href="#"><?= $key->transmisi ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Popular Car End -->
                                    <?php endforeach; ?>

                                </div>
                                <!-- Choose Cars Content-wrap -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->




    <!--== Mobile App Area Start ==-->
    <div id="mobileapp-video-bg"></div>
    <section id="mobile-app-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mobile-app-content">
                        <h2>SAVE 30% WITH THE APP</h2>
                        <p>Easy &amp; Fast - Book a car in 60 seconds</p>
                        <div class="app-btns">
                            <a href="#"><i class="fa fa-android"></i> Android Store</a>
                            <a href="#"><i class="fa fa-apple"></i> Apple Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Mobile App Area End ==-->

    <!--== Articles Area Start ==-->
    <section id="tips-article-area" class="section-padding">
      <?php $this->load->view('pelanggan/v_tips') ?>
    </section>
    <!--== Articles Area End ==-->
    <script src="<?= base_url().'assets/users/js/jquery-3.2.1.min.js' ?> "></script>
    <script type="text/javascript">


      $(document).ready(function() {

        // $('#startDate2').change(function() {
        //   $('#endDate2').val('2019-01-06');
        //   $('#endDate2').attr('disable');
        // })


        $('#kategori_sewa').change(function() {
            $('#lokasi_sewa').prop("disabled", false);
        })

        $('#lokasi_sewa').change(function() {
          $('#startDate2').prop("disabled", false);
        })

        $('#startDate2').change(function(){
          $('#endDate2').prop("disabled", false);
        })

        $('#endDate2').change(function() {
          var oneDay      = 24*60*60*1000;
          var firstDate   = new Date($("#startDate2").val());
          var secondDate  = new Date($("#endDate2").val());
          var diffDays    = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
          var getDay      = firstDate.getDay();

          var bedahari    = diffDays;
          $('#bedahari').html('<b>'+ bedahari + ' hari </b>');

          // if(getDay ===)
        })

        $('#lokasi_sewa').change(function() {
          var lokasi = $(this).val();
            if(lokasi === 'Jakarta Pusat'){
              alert('oke');
            }
        });

        $('#cari').click(function() {
          var kategoriSewa = $('#kategori_sewa').val();
          var lokasiSewa   = $('#lokasi_sewa').val();
          var tgl_ambil    = $('#startDate2').val();
          var tgl_kembali  = $('#endDate2').val();

          if($.trim(kategoriSewa) !== 0 & $.trim(lokasiSewa) !== 0 && $.trim(tgl_ambil) !== '' && $.trim(tgl_kembali) !== '' )
          {
              $.ajax({
                url: "<?= base_url('Home/carimobil') ?>",
                method: "GET",
                data: {kategori_sewa: kategoriSewa, lokasi_sewa: lokasiSewa, tgl_ambil: tgl_ambil, tgl_kembali: tgl_kembali},
                cache: false,
                beforeSend: function(){
                  $('#cari').val('loading ..');
                },
                success: function(data){
                  if(data){
                      window.location = "<?= base_url('Home/carimobil?kategori_sewa=') ?>"+kategoriSewa+"&&lokasi_sewa="+lokasiSewa+"&&tgl_ambil="+tgl_ambil+"&&tgl_kembali="+tgl_kembali;

                  }else{
                    alert('not found');
                  }


                }
              });


          }
          else {
            return false;
          }


        });







      });
    </script>

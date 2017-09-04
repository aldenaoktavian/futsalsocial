<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futsalyuk</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/basscss.min.css">
    <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >
    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/halaman_utama/halaman_utama.css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">

    <link href="http://futsalyuk.com/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="http://futsalyuk.com/assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link  href="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/halamanUtama.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.css">
    
    <style>
      .header-wrapper {
        background-color: #064a4b;
      }

      .header-content .nav > li > a {
        color: #fff;
      }

      .navbar-toggle {
        border: 1px solid #FFF;
      }

      .navbar-toggle .icon-bar {
        background-color: #FFF;
      }

      @media (max-width: 767px) {
        .header-content .nav {
            background-color: #064a4b;
            float: none;
            left: -15px;
            margin-top: 62px;
            padding: 0px;
            position: absolute;
            right: -15px;
            z-index: 99999;
        }
      }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>
    <script>
 
        var placeSearch, autocomplete;
        var componentForm = {
          street_number: 'short_name',
          route: 'long_name',
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          country: 'long_name',
          postal_code: 'short_name'
        };
         
        function initialize() {
         
          autocomplete = new google.maps.places.Autocomplete(
              /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
              { types: ['geocode'] });
         
          google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
          });
        }
         

         
        function fillInAddress() {
         
          var place = autocomplete.getPlace();
         
          // for (var component in componentForm) {
          //   document.getElementById(component).value = '';
          //   document.getElementById(component).disabled = false;
          // }

          var lat = place.geometry.location.lat(),
    			lng = place.geometry.location.lng();
         
         	document.getElementById('lat').value = lat;
    		document.getElementById('lng').value = lng;
         
          // for (var i = 0; i < place.address_components.length; i++) {
          //   var addressType = place.address_components[i].types[0];
          //   if (componentForm[addressType]) {
          //     var val = place.address_components[i][componentForm[addressType]];
          //     document.getElementById(addressType).value = val;
          //   }
          // }
        }
         
        function geolocate() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = new google.maps.LatLng(
                  position.coords.latitude, position.coords.longitude);
              var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
              });
              autocomplete.setBounds(circle.getBounds());
            });
          }
        }
    </script>

</head>
<body onload="initialize()">
    

    <?php include_once("analyticstracking.php") ?>

    <div class="page-wrapper">
    
      <header class="header">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url()?>assets/img/background-biru.png" width="90px" alt="Logo">
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">

                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
                              <li class="">
                                  <a href="<?php echo base_url(); ?>">Beranda </a>
                              </li>

                              <li >
                                  <a href="<?php echo base_url() ?>cara_booking">Cara Booking </a>
                              </li>

                              <li >
                                  <a href="<?php echo base_url() ?>yukpay">YukPay </a>

                              </li>

                              <li >
                                  <a href="#">Fair Play </a>

                              </li>

                              <li >
                                  <a href="#">Mitra Lapangan </a>
                              </li>
                              <li class="">
                                  <a href="#">Member </a>
                                  <ul class="sub-menu">
                                          <li><a href="<?php echo base_url(); ?>member/login">Masuk</a></li>
                                          <li><a href="<?php echo base_url(); ?>member/register">Daftar</a></li>
                                      
                                      <li><a href="index-google-map.html">Mitra</a></li>
                                  </ul>
                              </li>
                          </ul>

                          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>

                        </div><!-- /.header-bottom -->
                    </div><!-- /.header-content -->
                </div><!-- /.header-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-wrapper -->
    </header><!-- /.header -->


    <div class="hero-img relative" style="background-image: url('<?php echo base_url() ?>assets/img/halaman_utama/hero.png')">
      <div class="search-box-wrapper sm-col-7 xs-col-7 md-col-5 lg-col-3 mx-auto ">
        <div class="clearfix">
          <div class="col col-6 btn-book py3">
            Booking
          </div>
          <div class="col col-6 btn-comm py3">
            Community
          </div>
        </div>
        <div class="clearfix">

          <form class="booking" action="<?php echo base_url() ?>cari_lapangan" method="get">

            <div class="col-12 py3 px3 box-form center">
              <div class="hero-image-keyword form-group">
                  <input type="text" class="form-control" id="autocomplete" name="daerah" placeholder="Masukan nama daerah" onFocus="geolocate()">
              </div><!-- /.form-group -->

              <div class="hero-image-location form-group" id="data_1">
                  <input type="text" class="form-control" name="tanggal" data-toggle="datepicker" placeholder="pilih tanggal booking" required>
              </div><!-- /.form-group -->

              <div class="hero-image-category form-group">
                  <select class="form-control m-b" id="jam" name="jam" required>
                      <option value="">Pilih Jam</option>
                      <option value="0800">08.00</option>
                      <option value="0900">09.00</option>
                      <option value="1000">10.00</option>
                      <option value="1100">11.00</option>
                      <option value="1200">12.00</option>
                      <option value="1300">13.00</option>
                      <option value="1400">14.00</option>
                      <option value="1500">15.00</option>
                      <option value="1600">16.00</option>
                      <option value="1700">17.00</option>
                      <option value="1800">18.00</option>
                      <option value="1900">19.00</option>
                      <option value="2000">20.00</option>
                      <option value="2100">21.00</option>
                      <option value="2200">22.00</option>
                      <option value="2300">23.00</option>
                      <option value="0000">00.00</option>
                  </select>
              </div><!-- /.form-group -->
              <div class="hero-image form-group">
                  <div class="form-group col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div>
                          <div id="basic_slider" style="margin-top: 8px;"></div>
                          <br>
                          <div style="margin-top: -16px;text-align: center;color: #fff;"><span id="durasi_value"></span> Jam</div>
                          <input type="hidden" id="nilai_durasi" name="durasi" required>
                      </div>
                  </div>
              </div><!-- /.form-group -->

              <input type="hidden" id="lat" name="lat">
              <input type="hidden" id="lng" name="lng">

              <button type="" class="btn-box">Cari Lapangan</button>
            </div>

          </form>

        </div>
      </div>
    </div>

    <div class="wrapper-feature py3">
      <div class="container">
        
        <div class="clearfix center">
          <div class="col-12 list-feature">
            <div class="inline-block box-feature">
              <img src="<?php echo base_url() ?>assets/img/halaman_utama/win.png" alt="">
            </div>
            <div class="inline-block box-feature">
              <img src="<?php echo base_url() ?>assets/img/halaman_utama/team.png" alt="">
            </div>
            <div class="inline-block box-feature">
              <img src="<?php echo base_url() ?>assets/img/halaman_utama/search.png" alt="">
            </div>
            <div class="inline-block box-feature">
              <img src="<?php echo base_url() ?>assets/img/halaman_utama/goal.png" alt="">
            </div>
            <div class="inline-block box-feature">
              <img src="<?php echo base_url() ?>assets/img/halaman_utama/target.png" alt="">
            </div>
          </div>
        </div>

        <div class="clearfix center mt3">
          <div class="col-12 feature-desc">
            <h3 class="mb0"><b>Booking Lapangan</b></h3>
            <h5>Cari Lapangan Dengan Satu Jari</h5>
            <div class="md-col-6 lg-col-6 sm-col-12 mx-auto">
              <p>Futsalyuk.com memberikan kemudaham, mengehemat waktu, 
              tenaga dan alasan untuk tidak bermain futsal Hanya diujung jari kamu dapat pesan lapangan terbaikmu</p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="wrapper-email py3">
      <div class="container px2 py3">
        <div class="md-col-8 lg-col-8 sm-col-12 mx-auto center">
          <h2 class="mt0 mb0">Masukan Email Anda agar Tetap Terhubung Dengan Kami di Futsaklyuk.com dan Mendapatkan Info Lebih Lanjut</h2>
          <div class="box-form">
            <div class="col lg-col-9 md-col-9 sm-col-12 mt3 px2">
              <div class="hero-image-keyword form-group mb0">
                  <input type="text" class="form-control" type="email" id="email" placeholder="masukan email anda">
              </div><!-- /.form-group -->
            </div>
            <div class="col lg-col-3 md-col-3 sm-col-12 mt3 px2">
              <button onclick="do_register()" class="form-control btn-email">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="wrapper-seo py3" style="background-image: url('<?php echo base_url() ?>assets/img/halaman_utama/bg-seo.png');">
      <div class="container px3 py3">
        <div class="clearfix overflow-hidden">
          <div class="col col-6 px2">
            <h5>Situs Terbaik dan Terpercaya untuk Booking Online Lapangan Futsal</h5>
            <p>FutsalYuk.com merupakan situs pertama yang menyediakan pengalaman terbaik dan terpercaya dalam pencarian informasi lapangan futsal hingga Pemesanan / booking lapangan futsal di berbagai lokasi secara online. Kemudahan dalam mengakses layanan di dalam situs, menjadikan FutsalYuk.com sebagai platform yang paling tepat bagi Anda yang hobi futsal atau pecinta futsal.</p>
          </div>
          <div class="col col-6 px2">
            <h5>Tempat Berkumpulnya Para Hobi Futsal atau Pecinta Futsal</h5>
            <p>Kami mencintai olahraga futsal dan menyadari bahwa masih ada banyak lagi para pecinta futsal di luar sana. Dengan semangat kebersamaan yang kuat, kami mengajak Anda para sesama hobi futsal atau pecinta futsal untuk bergabung ke dalam komunitas futsal “FY Community” di FutsalYuk.com. Melalui komunitas futsal “FY Community,” Anda bisa berinteraksi dan berbagi informasi langsung dengan sesama pecinta futsal.</p>
          </div>
        </div>
        <div class="clearfix overflow-hidden mt2">
          <div class="col col-6 px2">
            <h5>Situs Booking Online Lapangan Futsal dengan Jaringan yang Luas</h5>
            <p>FutsalYuk.com telah memiliki jaringan lapangan futsal yang luas dan tersebar di berbagai lokasi di Indonesia. Situs ini juga memungkinkan bagi pengusaha atau pemilik lapangan futsal untuk memperomosikan lapangan futsal dan menemukan pelanggan bagi lapangan futsal miliknya. Caranya, cukup hanya dengan mendaftarkan lapangan futsal Anda secara gratis di FutsalYuk.com. Hubungi nomor telepon dan email yang telah dicantumkan untuk informasi lebih lanjut.</p>
          </div>
          <div class="col col-6 px2">
            <h5>Cari, Pesan / Booking Lapangan Futsal Nggak Pake Ribet</h5>
            <p>FutsalYuk.com memiliki komitmen kuat untuk menjadi situs terbaik dalam pencarian informasi lapangan futsal hingga pemesanan / booking lapangan futsal. Kami menawarkan solusi bagi Anda yang hobi futsal atau pecinta futsal, serta ingin melakukan olahraga futsal, untuk memesan atau booking lapangan futsal secara online tanpa harus repot mendatangi langsung lapangan futsal yang diinginkan.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="wrapper-footer py3" style="background-image: url('<?php echo base_url() ?>assets/img/halaman_utama/footer-image.png');">
      <img class="icon-hp" src="<?php echo base_url() ?>assets/img/halaman_utama/footer-hp.png" alt="">
    </div> -->
    
    <?php $this->load->view('footer') ?>
  </div>

  <script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/map.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/assets/libraries/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/superlist.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
  <!-- 
  <script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script> -->

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/infobox.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/markerclusterer.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/jquery-google-map.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/owl.carousel.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/assets/js/superlist.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.js"></script>

  <script src="http://futsalyuk.com/assets/js/plugins/rangeslider/rangeslider.min.js"></script>
  <script src="http://futsalyuk.com/assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
  <script src='http://futsalyuk.com/assets/js/wNumb.min.js'></script>

  <script src="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.min.js"></script>

  <script>
    $('[data-toggle="datepicker"]').datepicker({
      autoHide: true,
      format: 'yyyy-mm-dd'
    });

    var basic_slider = document.getElementById('basic_slider');
          var bigValueSpan = document.getElementById('durasi_value');

          noUiSlider.create(basic_slider, {
              start: 1,
              step: 1,
              format: wNumb({
                  decimals: 0
              }),
              range: {
                  'min':  [1],
                  'max':  [5]
              }
          });

          basic_slider.noUiSlider.on('update', function ( values, handle ) {
              bigValueSpan.innerHTML = values[handle];
              nilai_durasi.value = values[handle];
          });

          function f_open_booking () {
              $('.container-booking').removeClass('hidden');
              $('.container-booking').addClass('active');
              $('.container-social').addClass('hidden');

              // banner text
              $('.cont-booking').removeClass('hidden');
              $('.cont-booking').addClass('active');
              $('.cont-social').addClass('hidden');
          }

          function f_open_social () {
              $('.container-social').removeClass('hidden');
              $('.container-social').addClass('active');
              $('.container-booking').addClass('hidden');

              // banner text
              $('.cont-social').removeClass('hidden');
              $('.cont-social').addClass('active');
              $('.cont-booking').addClass('hidden');
          }

          function do_register()
          {
              email = $('#email').val();

              if (email == '') 
                  {
                      swal("Anda harus mengisi data email anda...")
                  }else{
                      swal({
                        title: 'Daftar',
                        text: 'Daftarkan Email anda ?',
                        type: 'info',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                      }, function(){
                        setTimeout(function() {
                          jQuery.ajax({
                              url: '<?php echo base_url()?>prelaunch/insert_mail',
                              type: 'POST',
                              data: {
                                email: email
                              },
                              success: function(data, textStatus, xhr) {
                                  if (data === 'OK') {
                                      swal("Sukses!", "Email anda telah kami simpan, terima kasih", "success");
                                  }    
                              },
                              error: function() {
                                  console.log('eror')
                                }
                          });
                        },2000);
                      });
                      
                  }
          }
  </script>


</body>
</html>
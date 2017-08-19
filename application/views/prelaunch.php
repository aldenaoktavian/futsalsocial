<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Futsalyuk Prelaunch</title>
  <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/prelaunch.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/basscss.min.css">
  <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.css">
    <script src="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</head>
<body>
	<?php include_once("analyticstracking.php") ?>
	<div class="header">
		<div class="col-10 mx-auto">
			<div class="logo inline-block">
				<img src="<?php echo base_url() ?>assets/img/background-putih.png" width="80" alt="">
			</div>
      <div class="h-title inline-block right">
        PRELAUNCH SITE
      </div>
		</div>
	</div>

  <div class="hero-banner col-12">
    <div class="layout">
      <div class="hero-content md-col-5 sm-col-12 mx-auto center">
        <img src="<?php echo base_url() ?>assets/img/background-biru.png" width="120" alt="">
        <h1>PRE LAUNCH FUTSALYUK</h1>
      </div>
    </div>
  </div>

  <div class="content col-10 mx-auto">
    <div class="container-fitur">
      <div class="row">
          <div class="fs-products my3">
              <a class="md-col-3 my3 mx2 center fs-product__container" onclick="show('booking')">
                  <div class="fs-circle">
                      <i class="fs__icon-circle icon--mitratoppers"></i>
                  </div>
                  <p class="fs-text__subheading bold my3">
                      Booking Lapangan
                  </p>
                  <center><img src="<?php echo base_url() ?>assets/img/prelaunching/booking.png" width="200" alt=""></center>
                  <p class="fs-text__paragraph m0">
                      Booking Lapangan dengan Satu Jari
                  </p>
                  <p class="mt3 fs-text__detail bold">
                      Lihat Detail
                  </p>
              </a>

              <a class="md-col-3 my3 mx2 center fs-product__container" onclick="show('chalenge')">
                  <div class="fs-circle">
                      <i class="fs__icon-circle icon--mitratoppers"></i>
                  </div>
                  <p class="fs-text__subheading bold my3">
                      Cari Lawan Terkuatmu
                  </p>
                  <center><img src="<?php echo base_url() ?>assets/img/prelaunching/chalenge.png" width="230" alt=""></center>
                  <p class="fs-text__paragraph m0">
                      Kirim undangan untuk bertanding ke Lawan mu
                  </p>
                  <p class="mt3 fs-text__detail bold">
                      Lihat Detail
                  </p>
              </a>

              <a class="md-col-3 my3 mx2 center fs-product__container" onclick="show('report')">
                  <div class="fs-circle">
                      <i class="fs__icon-circle icon--mitratoppers"></i>
                  </div>
                  <p class="fs-text__subheading bold my3">
                      Goal Report
                  </p>
                  <center><img src="<?php echo base_url() ?>assets/img/prelaunching/report.png" width="230" alt=""></center>
                  <p class="fs-text__paragraph m0">
                      Laporkan Hasil Pertandingan mu
                  </p>
                  <p class="mt3 fs-text__detail bold">
                      Lihat Detail
                  </p>
              </a>

              <a class="md-col-3 my3 mx2 center fs-product__container" onclick="show('team')">
                  <div class="fs-circle">
                      <i class="fs__icon-circle icon--mitratoppers"></i>
                  </div>
                  <p class="fs-text__subheading bold my3">
                      Best Team
                  </p>
                  <center><img src="<?php echo base_url() ?>assets/img/prelaunching/team.png" width="230" alt=""></center>
                  <p class="fs-text__paragraph m0">
                      Table Rangking Team Terbaik
                  </p>
                  <p class="mt3 fs-text__detail bold">
                      Lihat Detail
                  </p>
              </a>
          </div>
      </div>
    </div>
  
    <!-- Section Detail Product -->
    <section class="section-product_detail">
        <div class="container-detail">
            <div id="booking" class="row fs-detail__hidden" id="mitra-toppers">
                <div class="md-col-12 sm-col-12 mx-auto fs-detail__container relative clearfix">
                    <div class="col md-col-4">
                      <img src="<?php echo base_url() ?>assets/img/prelaunching/booking.png" width="300" alt="">
                    </div>
                    <div class="col md-col-8">
                        <h1 class="fs-text__headline">Booking Lapangan</h1>
                        <p class="mt2 mb3 left fs-text__paragraph">
                            Futsalyuk.com memberikan kemudaham, mengehemat waktu, tenaga dan alasan untuk tidak bermain futsal Hanya diujung jari kamu dapat pesan lapangan terbaikmu
                        </p>
                    </div>
                </div>
            </div>

            <div id="chalenge" class="row fs-detail__hidden" id="mitra-toppers">
                <div class="md-col-12 sm-col-12 mx-auto fs-detail__container relative clearfix">
                    <div class="col md-col-4">
                      <img src="<?php echo base_url() ?>assets/img/prelaunching/chalenge.png" width="300" alt="">
                    </div>
                    <div class="col md-col-8">
                        <h1 class="fs-text__headline">Chalenge</h1>
                        <p class="mt2 mb3 left fs-text__paragraph">
                            Tinggal buktikan kepada lawan terkuat kamu
untuk bisa mengalahkanya dengan undangan
bertanding.

                        </p>
                    </div>
                </div>
            </div>

            <div id="report" class="row fs-detail__hidden" id="mitra-toppers">
                <div class="md-col-12 sm-col-12 mx-auto fs-detail__container relative clearfix">
                    <div class="col md-col-4">
                      <img src="<?php echo base_url() ?>assets/img/prelaunching/report.png" width="300" alt="">
                    </div>
                    <div class="col md-col-8">
                        <h1 class="fs-text__headline">Goal Report</h1>
                        <p class="mt2 mb3 left fs-text__paragraph">
                            Tunjukan sportifitasmu agar menang tanpa merendahkan dan
kalah tidak diremehkan.
Laporkan hasil pertaandinganmu 24 jam setelah pertandingan.

                        </p>
                    </div>
                </div>
            </div>
            
            <div id="team" class="row fs-detail__hidden" id="mitra-toppers">
                <div class="md-col-12 sm-col-12 mx-auto fs-detail__container relative clearfix">
                    <div class="col md-col-4">
                      <img src="<?php echo base_url() ?>assets/img/prelaunching/team.png" width="300" alt="">
                    </div>
                    <div class="col md-col-8">
                        <h1 class="fs-text__headline">Table Team Rank</h1>
                        <p class="mt2 mb3 left fs-text__paragraph">
                            Tabel akan berbicara siapa yang terbaik, apakah team kamu?
Silahkan buktikan, kumpulkan sebanyak mungkin kemenagan dan
dapatkan point.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Section Detail Product -->

  </div>

  <div class="email overflow-hidden">
    <div class="col-8 mx-auto">
      <div class="col-12 center">
        <h3 class="mail-title">Masukan Email Anda agar Tetap Terhubung Dengan Kami di Futsaklyuk.com dan Mendapatkan Info Lebih Lanjut</h3>
      </div>
      <div class="col-8 mx-auto overflow-hidden">
        <div class="col col-8 px2">
          <input type="email" id="email" class="form-control" placeholder="masukan email anda">
        </div>
        <div class="col col-4 px2">
          <button onclick="do_register()" class="form-control">Send</button>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-wrapper">
    <footer class="footer col-12">
      <div class="footer-top">
          <div class="container">
              <div class="row">
                  <div class="col-sm-4">
                      <h2>About Futsalyuk.com</h2>

                      <p>Mempermudah kamu dan tim kamu dalam bermain futsal 
  pelajari lebih lanjut disini.</p>
                  </div><!-- /.col-* -->

                  <div class="col-sm-4">
                      <h2>Contact Information</h2>

                      <p>
                          Jakarta, Indonesia<br>
                          +1-123-456-789, <a href="#">admin@futsalyuk.com</a>
                      </p>
                  </div><!-- /.col-* -->

                  <div class="col-sm-4">
                      <h2>Stay Connected</h2>

                      <ul class="social-links nav nav-pills">
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                          <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                      </ul><!-- /.header-nav-social -->
                  </div><!-- /.col-* -->
              </div><!-- /.row -->
          </div><!-- /.container -->
      </div><!-- /.footer-top -->

      <div class="footer-bottom">
          <div class="container">
              <div class="footer-bottom-left">
                  &copy; 2017 All rights reserved. Created by <a href="#">futsalyuk.com</a>.
              </div><!-- /.footer-bottom-left -->

             
          </div><!-- /.container -->
      </div>
    </footer><!-- /.footer -->
  </div>

  <script>
    $('.fs-products').slick({
        slidesToShow: 4,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow: $(".fs-slick--prev"),
        nextArrow: $(".fs-slick--next"),
        responsive: [
        {
            breakpoint: 832,
            settings: {
                dots: true,
                arrows: false,
                slidesToShow: 1
            }
        },
        {
            breakpoint: 640,
            settings: {
                dots: true,
                arrows: false,
                slidesToShow: 1
            }
        }
        ]
    });

    function show(vars) {

        if (vars === 'booking') {
            $('#'+vars).addClass('fs-detail__active');
            $('#'+vars).removeClass('fs-detail__hidden');
            $('#chalenge,#report,#team').addClass('fs-detail__hidden');
        }
        else if (vars === 'chalenge') {
            $('#'+vars).addClass('fs-detail__active');
            $('#'+vars).removeClass('fs-detail__hidden');
            $('#report,#booking,#team').addClass('fs-detail__hidden');
        }
        else if (vars === 'report') {
            $('#'+vars).addClass('fs-detail__active');
            $('#'+vars).removeClass('fs-detail__hidden');
            $('#chalenge,#booking,#team').addClass('fs-detail__hidden');
        }
        else if (vars === 'team') {
            $('#'+vars).addClass('fs-detail__active');
            $('#'+vars).removeClass('fs-detail__hidden');
            $('#report,#booking,#chalenge').addClass('fs-detail__hidden');
        }

        $("html, body").animate({ scrollTop: $(".section-product_detail").offset().top - 300 }, 300);
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
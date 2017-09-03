<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
    $name = $this->session->userdata('username');
    $picture = $this->session->userdata('picture');
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo PARENT_BASE_URL?>assets/img/favicon/favicon.png">

    <link href="<?php echo PARENT_BASE_URL; ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="<?php echo PARENT_BASE_URL; ?>assets/css/basscss.min.css" rel="stylesheet" type="text/css">

    <link  href="<?php echo PARENT_BASE_URL; ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <title>Booking Lapangan Futsal Online Gampang di futsalyuk.com</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>

    <style>
        .post-image img {
            width: 100px;
        }
        .martop-10 {
            margin-top : 10rem;
        }

        @media (max-width: 1199px) {
            .post-image {
                text-align:center;
            }
        }

        @media (max-width: 1199px) {
            .post-content {
                text-align:center;
            }
        }

        .hero-image-form-wrapper {
        	position: unset;
		    left: unset;
		    bottom: unset;
		    right: unset;
        }

        .social {
        	background: #c6af5c !important;
        }

        .btn-login-social {
        	background: #009f8b !important;
        }

        .main-inner {
        	padding: 35px 0px;
        }
        
    </style>
</head>

<body>

<?php //include_once("analyticstracking.php") ?>

<div class="page-wrapper">

    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                
                    <div class="col-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 center">
                            <h1>Futsalyuk Community</h1>
                        </div>
                        
                        <div style="height: 120px;"></div>

                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="post animated bounceInLeft">
                                <div class="post-image">
                                    <img src="<?php echo PARENT_BASE_URL; ?>assets/img/cara-booking/cari-lapangan.png" alt="">
                                </div><!-- /.post-image -->

                                <div class="post-content">
                                    <h2>Satu account untuk dua aplikasi</h2>
                                    <p>saat anda telah login pada booking lapangan, anda dapat menggunakan untuk masuk ke Futsal Yuk Community</p>
                                </div><!-- /.post-content -->
                            </div><!-- /.post -->

                            <div class="post animated fadeInRight">
                                <div class="post-image">
                                    <img src="<?php echo PARENT_BASE_URL; ?>assets/img/cara-booking/login.png" alt="">
                                </div><!-- /.post-image -->

                                <div class="post-content">
                                    <h2>Temukan lawan terbaik anda</h2>
                                    <p>Futsal Yuk Community menghadirkan fitur undangan bertanding, bahkan dengan team yang belum anda kenal</p>
                                </div><!-- /.post-content -->
                            </div><!-- /.post -->

                            <div class="post animated fadeInDown">
                                <div class="post-image">
                                    <img src="<?php echo PARENT_BASE_URL; ?>assets/img/cara-booking/ok.png" alt="">
                                </div><!-- /.post-image -->

                                <div class="post-content">
                                    <h2>Update Score</h2>
                                    <p>Akan ada fitur untuk update score setelah bertanding, untuk menjunjung sportifitas dalam olahraga</p>
                                </div><!-- /.post-content -->
                            </div><!-- /.post -->

                            <div class="post animated bounceInLeft">
                                <div class="post-image">
                                    <img src="<?php echo PARENT_BASE_URL; ?>assets/img/cara-booking/pay.png" alt="">
                                </div><!-- /.post-image -->

                                <div class="post-content">
                                    <h2>Papan Prestasi</h2>
                                    <p>Setiap goal report dari pertandingan yang diselenggarakan melalui futsalyuk akan diakumulasikan menjadi persentase yang menentukan team anda adalah team terbaik</p>
                                </div><!-- /.post-content -->
                            </div><!-- /.post -->
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                        	<div class="hero-image-form-wrapper">
		                        <div id="login" class="container-social">
		                            <form class="social" action="<?php echo base_url().'login'; ?>" method="post">
		                                <h3 style="text-align:center;color:#fff;"> Login ke Futsal Community</h3>
		                                <div class="hero-image-keyword form-group">
		                                    <input type="text" class="form-control" id="user" name="user" placeholder="Masukan username anda">
		                                </div><!-- /.form-group -->

		                                <div class="hero-image-location form-group" id="data_1">
		                                    <input type="password" class="form-control" id="pass" name="pass"  placeholder="Masukan password anda " required>
		                                </div><!-- /.form-group -->
		                                <button type="submit" class="btn btn-primary btn-block btn-login-social">Login</button>
		                                <p style="text-align:center;margin-top:10px;"> Belum punya akun? <a href="<?php echo base_url().'register'; ?>">Daftar disini</a></p>
		                            </form>
		                        </div>
					        </div><!-- /.hero-image-form-wrapper -->
                        </div>
                    </div>

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

    <?php //$this->load->view('footer') ?>

</div><!-- /.page-wrapper -->

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/js/map.js" type="text/javascript"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!-- 
<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script> -->

<script type="text/javascript" src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/jquery-google-map/infobox.js"></script>
<script type="text/javascript" src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/jquery-google-map/jquery-google-map.js"></script>

<script type="text/javascript" src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/owl.carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/js/superlist.js" type="text/javascript"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/assets/datepicker/datepicker.js"></script>

<script src="<?php echo PARENT_BASE_URL; ?>assets/js/plugins/rangeslider/rangeslider.min.js"></script>
<script src="<?php echo PARENT_BASE_URL; ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src='<?php echo PARENT_BASE_URL; ?>assets/js/wNumb.min.js'></script>

<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>

</body>
</html>

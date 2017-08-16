<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

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

    <link href="<?php echo base_url(); ?>assets/css/basscss.min.css" rel="stylesheet" type="text/css">

    <link  href="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <title>Boooking Lapangan Futsal Online Gampang di futsalyuk.com</title>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>

    <style>
        .post-image img {
            width: 100px;
        }
        .martop-10 {
            margin-top : 10rem;
        }
        .marbot-10 {
            margin-bottom : 10rem;
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

        .box-icon {
             border: none;
             border-radius: none; 
             color: none; 
             float: left; 
             font-size: 34px; 
             height: 72px; 
             line-height: 70px; 
             margin: 0px 20px 0px 0px; 
             text-align: center; 
             width: 72px;   
        }

         .box-icon  img {
             width: 50px;
         }
         
         .background-black-light {
            background-color: #99d8b7;
            color: #fff;
         }
        
    </style>
</head>


<body>

<div class="page-wrapper">
<?php include_once("analyticstracking.php") ?>    

<?php $this->load->view('header') ?>

<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                
                    <div class="col-12">
                        <div class="md-col-8 sm-col-12 xs-col-12 mx-auto center">
                            <h1>Cara Booking Lapangan</h1>
                        </div>
                        
                        <div class="md-col-8 sm-col-12 xs-col-12 mx-auto martop-10 marbot-10">
                            <h1>Content Goes Here...</h1>
                        </div>
                    </div>

                </div><!-- /.content -->

                 <div class="block background-black-light fullwidth">
                    <div class="row">
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="<?php echo base_url(); ?>assets/img/yukpay/yukpay.png" alt="">
                        </div><!-- /.box-icon -->

                        <div class="box-content">
                            <h2>YukPay</h2>
                            <p>Simpan uang anda,
                                cukup lima puluh
                                ribu rupiah anda
                                dapat melakukan
                                booking lapangan
                                mana saja</p>
                        </div><!-- /.box-content -->
                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="<?php echo base_url(); ?>assets/img/yukpay/tarik.png" alt="">
                        </div><!-- /.box-icon -->

                        <div class="box-content">
                            <h2>Tarik Tunai</h2>
                            <p>Anda dapat Tarik tunai
                                kapanpun dan dimanapun
                                tanpa ada potongan</p>
                        </div><!-- /.box-content -->
                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="<?php echo base_url(); ?>assets/img/yukpay/potongan.png" alt="">
                        </div><!-- /.box-icon -->

                        <div class="box-content">
                            <h2>Tanpa Potongan</h2>
                            <p>Tanpa potongan, selama
                                anda menyelesaikan
                                pesanan anda</p>
                        </div><!-- /.box-content -->
                    </div>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.row -->

            </div><!-- /.block -->


            </div><!-- /.container -->


        </div><!-- /.main-inner -->
    </div><!-- /.main -->
    


<?php $this->load->view('footer') ?>

</div><!-- /.page-wrapper -->

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
</script>
</body>
</html>

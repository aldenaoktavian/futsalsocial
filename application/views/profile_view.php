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

    <link  href="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">

    <title>Booking Lapangan Futsal Online Gampang di futsalyuk.com</title>

    <style>
      .overlay {
        position: absolute;
        width: 100%;
        height: 0%;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.5);
        overflow: hidden;
        transition: .5s ease;
      }

      .saldo:hover .overlay {
        height: 100%;
      }

      .text {
        white-space: nowrap; 
        color: white;
        font-size: 20px;
        position: absolute;
        overflow: hidden;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
      }

      .text ul li {
        list-style: none;
      }

      .item {
        border: solid 2px #fff;
        margin-bottom: 3px;
        padding: 5px;
        text-align: center;
        font-weight: 200;
      }

      .item:hover {
        background: #c6af5c;
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
  

<?php $this->load->view('header') ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-lg-3">
          <div class="sidebar">
            <div class="widget">
              <div class="saldo" style="width: 100%;background: #fff;padding:30px;position: relative;cursor: pointer;">
                <h1><b>Saldo:</b> 50.000</h1>
                <div class="overlay">
                  <div class="text">
                    <ul>
                      <li>
                        <div class="item">Isi Saldo</div>
                      </li>
                      <li>
                        <div class="item">Petunjuk Isi Saldo</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- /.widget -->

<?php 
    $username = $this->session->userdata('username');
    $id_user = $this->session->userdata('id_user');
    $email = $this->session->userdata('email');
    $fullname = $this->session->userdata('full_name');
    $picture = $this->session->userdata('picture');
 ?>
                            <div class="widget">

    <ul class="menu-advanced">
        <li class="active"><a href="#"><i class="fa fa-user"></i> Edit Profile</a></li>
        <li><a href="#"><i class="fa fa-key"></i> Password</a></li>
        <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    <h2><?php echo ucwords($fullname); ?></h2>
</div><!-- /.page-title -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Informasi Profil

        <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
    </h3>

    <div class="row">
        <div class="form-group col-sm-6">
            <label>Full Name</label>
            <input type="text" name='fullname' class="form-control" value="<?php echo $fullname; ?>">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>E-mail</label>
            <input type="text" name='email' class="form-control" value="<?php echo $email; ?>">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>Username</label>
            <input type="text" name='username' class="form-control" value="<?php echo $username; ?>">
        </div><!-- /.form-group -->
    </div><!-- /.row -->
</div>

<div class="background-white p20 mb30">
    <h3 class="page-title">
        5 Booking Terbaru
    </h3>
    <div>
      <table class="invoice-table table">
        <thead>
          <tr>
              <th>#ID</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Durasi</th>
              <th>Lapangan</th>
              <th>Tipe</th>
              <th>Kode Booking</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <tr>
              <td>1</td>
              <td>02-08-2017</td>
              <td>14.00 WIB</td>
              <td>2 Jam</td>
              <td>Raya Futsal</td>
              <td>Premium</td>
              <td>b7KKi1</td>
              <td>Sukses</td>
          </tr>
        </tbody>
      </table>
    </div>
    
</div><!-- /.background-white -->

                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
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

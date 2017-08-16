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

    <meta name="title" content="Booking Lapangan online dan Social Media untuk pencinta futsal">
    <meta name="referrer" content="unsafe-url">
    <meta name="description" content="Mencari Lapangan futsal yang bisa di booking online? males booking secara langsung? bosan dengan kemacetan jakarta ? kini booking lapangan jauh lebih mudah di futsalyuk.com selain itu kamu juga bisa menggunakan futsalyuk social untuk berinteraksi dengan tim futsal lain dan bisa menunjukan skil tim kamu, ayo buruan join futsalyuk.com">
    <meta name="keywords" content="Mencari Lapangan futsal yang bisa di booking online? males booking secara langsung? bosan dengan kemacetan jakarta ? kini booking lapangan jauh lebih mudah di futsalyuk.com selain itu kamu juga bisa menggunakan futsalyuk social untuk berinteraksi dengan tim futsal lain dan bisa menunjukan skil tim kamu, ayo buruan join futsalyuk.com" />
    <meta name="revisit-after" content="7 Days" />
    <meta name="robots" content="index,follow" />
    <meta name="theme-color" content="#000000">
    <meta property="og:title" content="Booking Lapangan online dan Social Media untuk pencinta futsal">
    <meta property="og:url" content="http://www.futsalyuk.com/">
    <meta property="og:image" content="http://futsalyuk.com/assets/img/logo-normal.png">
    <meta content='website' property='og:type'/>
    <meta property="og:description" content="Mencari Lapangan futsal yang bisa di booking online? males booking secara langsung? bosan dengan kemacetan jakarta ? kini booking lapangan jauh lebih mudah di futsalyuk.com selain itu kamu juga bisa menggunakan futsalyuk social untuk berinteraksi dengan tim futsal lain dan bisa menunjukan skil tim kamu, ayo buruan join futsalyuk.com">
    <meta name="twitter:description" content="Mencari Lapangan futsal yang bisa di booking online? males booking secara langsung? bosan dengan kemacetan jakarta ? kini booking lapangan jauh lebih mudah di futsalyuk.com selain itu kamu juga bisa menggunakan futsalyuk social untuk berinteraksi dengan tim futsal lain dan bisa menunjukan skil tim kamu, ayo buruan join futsalyuk.com">
    <meta name="twitter:image:src" content="http://futsalyuk.com/assets/img/logo-normal.png">
    <meta content='Mencari Lapangan futsal yang bisa di booking online? males booking secara langsung? bosan dengan kemacetan jakarta ? kini booking lapangan jauh lebih mudah di futsalyuk.com selain itu kamu juga bisa menggunakan futsalyuk social untuk berinteraksi dengan tim futsal lain dan bisa menunjukan skil tim kamu, ayo buruan join futsalyuk.com' name='google-site-verification'/>

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

    <title>Booking Lapangan Futsal Online Gampang di futsalyuk.com</title>
    
    <style>
        .partner {
            padding: 20px;
        }

        a .community-logo {
            padding-left: 10px;
            padding-right: 10px;
            height: 100px;
            background-color: #f4f4f4;
            background-size: cover;
            line-height: 100px;
            font-size: 20px;
        }

        a .booking-logo {
            padding-left: 10px;
            padding-right: 10px;
            height: 100px;
            background-color: #f4f4f4;
            background-size: cover;
            line-height: 100px;
            font-size: 20px;
        }

        .hero-image-inner:after {
            background-color: rgba(0, 0, 0, 0);
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
                        <img src="<?php echo base_url()?>assets/img/background-putih.png" width="90px" alt="Logo">
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
            <?php if ($name == '') { ?>
                <li><a href="<?php echo base_url(); ?>member/login">Masuk</a></li>
                <li><a href="<?php echo base_url(); ?>member/register">Daftar</a></li>
            <?php } else { ?>
                <li><a href="<?php echo base_url() ?>member/profile">Lihat Profil</a></li>
            <?php } ?>
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




    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-150">
    <div class="hero-image">
    <div class="hero-image-inner" style="background-image: url('<?php echo base_url()?>assets/img/landing/hero-image.jpg');">
        <div class="hero-image-content">
            <div class="container cont-booking">
                <h2>Futsalyuk Booking</h2>
                
                <div class="benefits">
                    <div class="headline">Pilihan lapangan terbanyak</div>
                    <div class="sub">Lapangan terbaikmu ada disini</div>
                </div>
                <div class="benefits">
                    <div class="headline">Peringatan harga</div>
                    <div class="sub">Informasi dan promosi sewa lapangan serta promo-promo menarik langsung anda dapatkan secara realtime</div>
                </div>
                <div class="benefits">
                    <div class="headline">Satu account untuk dua aplikasi</div>
                    <div class="sub">saat anda telah login pada booking lapangan, anda dapat menggunakan untuk masuk ke Futsal Yuk Community</div>
                </div>
            </div><!-- /.container -->

            <div class="container cont-social hidden">
                <h2>Futsalyuk Community</h2>
                
                <div class="benefits">
                    <div class="headline">Satu account untuk dua aplikasi</div>
                    <div class="sub">saat anda telah login pada booking lapangan, anda dapat menggunakan untuk masuk ke Futsal Yuk Community
</div>
                </div>
                <div class="benefits">
                    <div class="headline">Temukan lawan terbaik anda</div>
                    <div class="sub">Futsal Yuk Community menghadirkan fitur undangan bertanding, bahkan dengan team yang belum anda kenal</div>
                </div>
                <div class="benefits">
                    <div class="headline">Update Score</div>
                    <div class="sub">Akan ada fitur untuk update score setelah bertanding, untuk menjunjung sportifitas dalam olahraga</div>
                </div>
                <div class="benefits">
                    <div class="headline">Papan Prestasi</div>
                    <div class="sub">Setiap goal report dari pertandingan yang diselenggarakan melalui futsalyuk akan diakumulasikan menjadi persentase yang menentukan team anda adalah team terbaik</div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.hero-image-content -->

        <div class="hero-image-form-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-lg-4 col-lg-offset-7">
                		<div onclick="f_open_booking()" class="btn btn-primary btn-lg" style="z-index: 1;min-width: 40%;">Booking</div>
                        <div onclick="f_open_social()" class="btn btn-secondary btn-lg" style="z-index: 1;min-width: 40%;">Community</div>
                        
                        <div class="container-booking">
                            <form class="booking" action="<?php echo base_url() ?>cari_lapangan" method="get">

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
                                <button type="submit" class="btn btn-primary btn-block">Cari Lapangan</button>
                            </form>
                        </div>
                        <div class="container-social hidden">
                            <form class="social" action="<?php echo base_url().'social/login'; ?>" method="post">
                                <h3 style="text-align:center;color:#fff;"> Login ke Futsal Community</h3>
                                <div class="hero-image-keyword form-group">
                                    <input type="text" class="form-control" id="user" name="user" placeholder="Masukan email anda">
                                </div><!-- /.form-group -->

                                <div class="hero-image-location form-group" id="data_1">
                                    <input type="password" class="form-control" id="pass" name="pass"  placeholder="Masukan password anda " required>
                                </div><!-- /.form-group -->
                                <button type="submit" class="btn btn-primary btn-block btn-login-social">Login</button>
                                <p style="text-align:center;margin-top:10px;"> belum punya akun? <a href="<?php echo base_url() ?>member/register">daftar disini</a></p>
                            </form>
                        </div>
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.hero-image-form-wrapper -->
    </div><!-- /.hero-image-inner -->
</div><!-- /.hero-image -->

</div>

<div class="container">
    <div class="block background-white fullwidth pt0 pb0">
        <div class="partner">
            <!-- <a href="#">
                <img src="http://via.placeholder.com/186x50" alt="">
            </a>

            <a href="#">
                <img src="http://via.placeholder.com/186x50" alt="">
            </a> -->
            <div class="row center">
                <div class="col col-lg-6 col-sm-12">
                    <a href=""><div class="community-logo">Community</div></a>
                </div>
                <div class="col col-lg-6 col-sm-12">
                    <a href=""><div class="booking-logo">Booking</div></a>
                </div>
            </div>
        </div><!-- /.partners -->

    </div>

    <div class="page-header">
    <h1>Mitra Lapangan Futsal Kami</h1>
    <p>Berikut adalah beberapa 10 lapangan futsal populer yang dibooking melalui futsalyuk booking.</p>
</div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">
        

        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/yes_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Yes Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Jakarta</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/raya_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Raya Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Jakarta</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/default.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Star Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Surabaya</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/indo_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Indo Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Jakarta</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/raya_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Italian Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Jakarta</div>
                        
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/indo_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Best Futsal</a></h2>
                            

                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Medan</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/yes_futsal.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Retro Futsal</a></h2>
                            
                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Padang</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
            

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo base_url(); ?>assets/img/lapangan/default.jpg">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html">Wine Futsal</a></h2>

                            <div class="card-simple-actions">
                                <a href="#" class="fa fa-bookmark-o"></a>
                                <a href="listing-detail.html" class="fa fa-search"></a>
                                <a href="#" class="fa fa-heart-o"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label">Bogor</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
        
    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->
    

    <div class="block background-white fullwidth mt80">
        <div class="row">
            <div class="col-sm-12">
                <div class="posts">
    

    <div class="post">
        <div class="post-image">
            <img src="<?php echo base_url(); ?>assets/img/lapangan/yes_futsal.jpg" alt="">
            <a class="read-more" href="blog-detail-right-sidebar.html">View</a>
        </div><!-- /.post-image -->

        <div class="post-content">
            <div class="post-label">Promo</div><!-- /.post-label -->
            <div class="post-date">07/12/2017</div><!-- /.post-date -->
            <h2>Cash Back Saldo Yes Futsal</h2>
            <p>Oh, all right, I am. But if anything happens to me, tell them I died robbing some old man. Calculon is gonna kill us and it's a...</p>
        </div><!-- /.post-content -->
    </div><!-- /.post -->

    

    <div class="post">
        <div class="post-image">
            <img src="<?php echo base_url(); ?>assets/img/lapangan/raya_futsal.jpg" alt="">
            <a class="read-more" href="blog-detail-right-sidebar.html">View</a>
        </div><!-- /.post-image -->

        <div class="post-content">
            <div class="post-label">Promo</div><!-- /.post-label -->
            <div class="post-date">06/18/2017</div><!-- /.post-date -->
            <h2>Diskon 10% Raya Futsal</h2>
            <p>For one beautiful night I knew what it was like to be a grandmother. Subjugated, yet honored. Then throw her in the laundry roo...</p>
        </div><!-- /.post-content -->
    </div><!-- /.post -->

    

    <div class="post">
        <div class="post-image">
            <img src="<?php echo base_url(); ?>assets/img/lapangan/indo_futsal.jpg" alt="">
            <a class="read-more" href="blog-detail-right-sidebar.html">View</a>
        </div><!-- /.post-image -->

        <div class="post-content">
            <div class="post-label">Promo</div><!-- /.post-label -->
            <div class="post-date">05/26/2017</div><!-- /.post-date -->
            <h2>Gratis 10x Main Indo Futsal</h2>
            <p>Check it out, y'all. Everyone who was invited is here. Well, thanks to the Internet, I'm now bored with. Is there a place on th...</p>
        </div><!-- /.post-content -->
    </div><!-- /.post -->
</div><!-- /.posts -->

            </div><!-- /.col-* -->

        </div><!-- /.row -->
    </div><!-- /.block -->

    <div class="block background-black-light fullwidth">
        <div class="row">
    <div class="col-sm-4">
        <div class="box">
            <div class="box-icon">
                <i class="fa fa-life-ring"></i>
            </div><!-- /.box-icon -->

            <div class="box-content">
                <h2>E-mail Support</h2>
                <p>We are always here to answer all your questions. Feel free to contact us.</p>

                <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
            </div><!-- /.box-content -->
        </div>
    </div><!-- /.col-sm-4 -->

    <div class="col-sm-4">
        <div class="box">
            <div class="box-icon">
                <i class="fa fa-flask"></i>
            </div><!-- /.box-icon -->

            <div class="box-content">
                <h2>Always Improving</h2>
                <p>Our dedicated team of developers are implementing awesome features.</p>

                <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
            </div><!-- /.box-content -->
        </div>
    </div><!-- /.col-sm-4 -->

    <div class="col-sm-4">
        <div class="box">
            <div class="box-icon">
                <i class="fa fa-thumbs-o-up"></i>
            </div><!-- /.box-icon -->

            <div class="box-content">
                <h2>Best Quality</h2>
                <p>We list only verifiend places and events to provide best content.</p>

                <a href="#">Read More <i class="fa fa-chevron-right"></i></a>
            </div><!-- /.box-content -->
        </div>
    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->

    </div><!-- /.block -->

    <div class="block background-secondary fullwidth mt80 mb-80 pt60 pb60">
        <div class="row">
    <div class="col-sm-12">
        <div class="contact-info-wrapper">
            <h2>Anda mempunyai pertanyaan?</h2>

            <div class="contact-info">
                <span class="contact-info-item">
                    <i class="fa fa-at"></i>
                    <span>admin@futsalyuk.com</span>
                </span><!-- /.contact-info-item -->

                <span class="contact-info-item">
                    <i class="fa fa-phone"></i>
                    <span>+123-456-789</span>
                </span><!-- /.contact-info-item -->
            </div><!-- /.contact-info-->
        </div><!-- /.contact-info-wrapper -->
    </div><!-- /.col-* -->
</div><!-- /.row -->

    </div>
</div><!-- /.container -->

            </div><!-- /.content -->
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
</script>
</body>
</html>

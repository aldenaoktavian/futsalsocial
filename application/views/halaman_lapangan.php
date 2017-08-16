<!DOCTYPE html>
<html ng-app="halaman_lapangan">


<!-- Mirrored from preview.byaviators.com/template/superlist/listing-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2017 17:06:07 GMT -->
<head>
    <?php $this->load->view('helmet') ?>
    <title>Lapangan murah dan berkualitas di <?php echo $kota; ?>, <?php echo $nama; ?> - Futsalyuk.com</title>
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link href="<?php echo base_url(); ?>assets/css/halamanLapangan.css" rel="stylesheet" type="text/css" >
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
         

         
        // function fillInAddress() {
         
        //   var place = autocomplete.getPlace();
         
        //   for (var component in componentForm) {
        //     document.getElementById(component).value = '';
        //     document.getElementById(component).disabled = false;
        //   }
         
         
        //   for (var i = 0; i < place.address_components.length; i++) {
        //     var addressType = place.address_components[i].types[0];
        //     if (componentForm[addressType]) {
        //       var val = place.address_components[i][componentForm[addressType]];
        //       document.getElementById(addressType).value = val;
        //     }
        //   }
        // }
         
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

    <style>
        span.stars, span.stars span {
            display: block;
            background: url('<?php echo base_url() ?>assets/img/stars.png') 0 -16px repeat-x;
            width: 80px;
            height: 16px;
        }

        span.stars span {
            background-position: 0 0;
        }

        span.stars2, span.stars2 span {
            display: block;
            background: url('<?php echo base_url() ?>assets/img/stars2.png') 0 -16px repeat-x;
            width: 80px;
            height: 16px;
        }

        span.stars2 span {
            background-position: 0 0;
        }

        .box {
            width: 100px;
            height: 100px;
            background: red;
            margin-left: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .card-row-image {
            width: 150px;
        }
    </style>
</head>


<body class="">

<?php include_once("analyticstracking.php") ?>

<div class="page-wrapper">
    
    <?php $this->load->view('header') ?>




    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-80 mb80">
    <div class="detail-banner" style="background: url('<?php echo base_url().$picture?>') no-repeat center;background-size: cover;">
    <div class="container">
        <div class="detail-banner-left">
            <div class="detail-banner-info">
                <div class="detail-verified">Verified</div>
            </div><!-- /.detail-banner-info -->

            <h2 class="detail-title">
                <?php echo $nama; ?>
            </h2>

            <div class="detail-banner-address">
                <i class="fa fa-map-o"></i> <?php echo $alamat; ?>
            </div><!-- /.detail-banner-address -->
            <div>
                <p style="color: white;"><?php echo $deskripsi; ?></p>
            </div>
            <div class="detail-banner-rating">
                <?php echo $rating; $jml_rating = strlen($rating); 
                    if ($jml_rating == 1) {
                ?>
                    <?php for ($i=0; $i < $rating; $i++) { ?>
                        <i class="fa fa-star"></i>
                        <!-- <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i> -->
                    <?php } ?>
                    <?php }else{ 
                        $pertama = substr($rating, 0 , 1);
                        $kedua = substr($rating, 2 , 1);
                    ?>
                        <?php for ($i=0; $i < $pertama; $i++) { ?>
                            <i class="fa fa-star"></i>
                            <!-- <i class="fa fa-star-half-o"></i> -->
                        <?php } ?>
                            <i class="fa fa-star-half-o"></i>
                    <?php } ?>
            </div><!-- /.detail-banner-rating -->

            <div class="detail-banner-btn bookmark">
                <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmarked">Bookmark</span>
            </div><!-- /.detail-claim -->

            <div class="detail-banner-btn heart">
                <i class="fa fa-heart-o"></i> <span data-toggle="I Love It">Give Heart</span>
            </div><!-- /.detail-claim -->

        </div><!-- /.detail-banner-left -->
    </div><!-- /.container -->
</div><!-- /.detail-banner -->

</div>

<!-- data user -->
<input type="hidden" id="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

<!-- container id lapangan -->

<div class="container">
    <input type="hidden" id="id_lapangan" value="<?php echo $id; ?>">
    <div class="row detail-content">
    <div class="col-sm-7">
        <div class="detail-gallery">
            <div class="detail-gallery-preview">
                <?php foreach ($photo_single->result() as $rows) {?>
                    <a href="<?php echo base_url().$rows->picture; ?>">
                        <img src="<?php echo base_url().$rows->picture; ?>">
                    </a>
                <?php } ?>
            </div>

        
            <ul class="detail-gallery-index">
                <?php if ($photo->num_rows() > 0) { ?>
                    <?php foreach ($photo->result() as $row) {?>
                        <li class="detail-gallery-list-item active">
                            <a data-target="<?php echo base_url().$row->picture; ?>">
                                <img src="<?php echo base_url().$row->picture; ?>" alt="...">
                            </a>
                        </li>
                    <?php } ?>
                <?php }else{ ?>
                    <li class="detail-gallery-list-item active">
                        <p style="text-align: center;">Belum ada foto yang tersedia...</p>
                    </li>
                <?php } ?>
            </ul>

        

        </div><!-- /.detail-gallery -->

    </div>

    <div class="col-sm-5">
        <div class="background-white p20">
            <div class="detail-overview-hearts">
                <i class="fa fa-heart"></i> <strong><?php echo $love_lapangan; ?> </strong>Orang menyukai lapangan ini
            </div>
            <div class="detail-overview-rating">
                <i class="fa fa-star"></i> <strong><?php echo $rating; ?> / 5 </strong>dari <a href="#reviews"><?php echo $jumlah_review; ?> reviews</a>
            </div>

            <div class="detail-actions row">
                <div class="col-sm-4">
                    <a href="#tipe_lapangan"><div class="btn btn-primary btn-book"><i class="fa fa-shopping-cart"></i> Lapangan</div></a>
                </div><!-- /.col-sm-4 -->
                <div class="col-sm-4">
                    <div class="btn btn-secondary btn-share"><i class="fa fa-share-square-o"></i> Share
                        <!-- <div class="share-wrapper">
                            <ul class="share">
                                <li><i class="fa fa-facebook"></i> Facebook</li>
                                <li><i class="fa fa-twitter"></i> Twitter</li>
                                <li><i class="fa fa-google-plus"></i> Google+</li>
                                <li><i class="fa fa-pinterest"></i> Pinterest</li>
                                <li><i class="fa fa-chain"></i> Link</li>
                            </ul>
                        </div> -->
                    </div>
                </div><!-- /.col-sm-4 -->
                <div class="col-sm-4">
                    <a href="#tulis_review"><div class="btn btn-secondary btn-claim"><i class="fa fa-hand-peace-o"></i> Tulis Review</div></a>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.detail-actions -->
        </div>
        
        <h2>Fasilitas</h2>

        <div class="background-white p20">
            <ul class="detail-amenities">
                <li class="yes">WiFi</li>
                <li class="yes">Parkir</li>
                <li class="yes">Kantin</li>
                <li class="yes">Kamar Mandi</li>
            </ul>
        </div><!-- /.detail-amenities -->
    </div>
    
    <div class="col-sm-12">
    <!-- list tipe lapangan -->
    <h2 id="tipe_lapangan">List Tipe Pilihan Lapangan</h2>
    <div class="p20" >
        <div class="cards-row">
        <?php if ($data_tipe_lapangan->num_rows() > 0) { $idx = 0; ?>
            <?php foreach ($data_tipe_lapangan->result() as $row) { $idx++; ?>
                <div class="card-row">
                    <div class="card-row-inner">
                        <div class="card-row-image" style="background: url('<?php echo base_url().$row->picture ?>')center no-repeat;background-size: cover;">
                            <div class="card-row-label"><a href="listing-detail.html"><?php echo $row->nama_tipe; ?></a></div><!-- /.card-row-label -->
                            
                                <div class="card-row-price"><?php echo $row->tarif; ?> / jam</div><!-- -->
                            
                        </div><!-- /.card-row-image -->

                            <div class="card-row-properties">
                                <dl>
                                    
                                        <dd>Harga</dd><dt> <?php echo $row->tarif; ?> / jam</dt>
                                        <dd>Luas Lapangan</dd><dt> 30 * 30 m</dt>
                                </dl>
                                <button class="btn btn-primary btn-block" type="submit" onclick="choose_lapangan('<?php echo $row->id_lapangan; ?>')"><i class="fa fa-hand-pointer-o"></i>Booking</button>
                                <h5 class="font-center detail_toggle mt30" onclick="show_detail(<?php echo $idx; ?>)">Lihat Detail Lapangan <i class="fa fa-chevron-down"></i></h5>
                            </div><!-- /.card-row-properties -->
                        </div><!-- /.card-row-inner -->
                        <div class="card-row detail_tipe p20" id="detail_tipe<?php echo $idx; ?>">
                            <hr>
                            <h3>Detail Lapangan</h3>
                        </div>
                    </div><!-- /.card-row -->
                    <?php } ?>
                <?php }else{ ?>
                        <p style="text-align: center;">Belum ada lapangan yang tersedia...</p>
                <?php } ?>
        </div><!-- /.cards-row -->
    </div>
    
    <!-- end list tipe -->
    </div>

    <div class="col-sm-7">

        <h2>Alamat</h2>
        <div class="background-white p20">

            <!-- Nav tabs -->
            <ul id="listing-detail-location" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#simple-map-panel" aria-controls="simple-map-panel" role="tab" data-toggle="tab">
                        <i class="fa fa-map"></i>Map
                    </a>
                </li>
                <li role="presentation">
                    <a href="#street-view-panel" aria-controls="street-view-panel" role="tab" data-toggle="tab">
                        <i class="fa fa-street-view"></i>Street View
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="simple-map-panel">
                    <div class="detail-map">
                        <div class="map-position">
                            <div id="listing-detail-map"
                                 data-transparent-marker-image="assets/img/transparent-marker-image.png"
                                 data-styles='[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]'
                                 data-zoom="15"
                                 data-latitude="<?php echo $lat; ?>"
                                 data-longitude="<?php echo $long; ?>"
                                 data-icon="fa fa-futbol-o">
                            </div><!-- /#map-property -->
                        </div><!-- /.map-property -->
                    </div><!-- /.detail-map -->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="street-view-panel">
                    <div id="listing-detail-street-view"
                            data-latitude="<?php echo $lat; ?>"
                            data-longitude="<?php echo $long; ?>"
                            data-heading="225"
                            data-pitch="0"
                            data-zoom="1">
                    </div>
                </div>
            </div>
        </div>


        <h2 id="reviews">Semua Reviews</h2>
        
        <div class="reviews" ng-controller="review_lapangan">
    <div class="review" ng-repeat="reviews in reviews">

        <div class="review-image">
            <img src="<?php echo base_url() ?>{{ reviews.picture }}" alt="">
        </div><!-- /.review-image -->

        <div class="review-inner">
            <div class="review-title">
                <h2>{{ reviews.fullname }}</h2>
                
                <span class="report">
                    <span class="separator">&#8226;</span><i class="fa fa-flag" title="Report" data-toggle="tooltip" data-placement="top"></i>
                </span>

                <div class="review-overall-rating">
                    <span class="overall-rating-title">Total Score:</span>
                    <span class="stars">{{reviews.rating_sum}}</span>
                    
                    
                </div><!-- /.review-rating -->
            </div><!-- /.review-title -->

            <div class="review-content-wrapper">
                <div class="review-content">
                    <div class="review-pros">
                        <p>{{ reviews.kelebihan }}</p>
                    </div><!-- /.pros -->
                    <div class="review-cons">
                        <p>{{ reviews.kekurangan }}</p>
                    </div><!-- /.cons -->
                </div><!-- /.review-content -->

                <div class="review-rating">
                    <dl>
                        <dt>Lapangan</dt>
                        <dd>
                            <span class="stars2">{{reviews.rate_1}}</span>
                        </dd>
                        <dt>Penjaga</dt>
                        <dd>
                            <span class="stars2">{{reviews.rate_2}}</span>
                        </dd>
                        <dt>Keamanan</dt>
                        <dd>
                            <span class="stars2">{{reviews.rate_3}}</span>
                        </dd>
                        <dt>Fasilitas</dt>
                        <dd>
                            <span class="stars2">{{reviews.rate_4}}</span>
                        </dd>
                    </dl>
                </div><!-- /.review-rating -->
            </div><!-- /.review-content-wrapper -->

        </div><!-- /.review-inner -->
    </div><!-- /.review -->

</div><!-- /.reviews -->

    </div><!-- /.col-sm-7 -->

    <div class="col-sm-5">
        
    <h2>Lapangan Terdekat Lainya</h2>

        <div class="background-white">
            <div class="near-lapangan">
                <div class="box" style="background: url('<?php echo base_url() ?>assets/img/lapangan/indo_futsal.jpg') center no-repeat;background-size: cover;position: relative;">
                    <div style="position:absolute;width: 100%;height: 100%;background: rgba(0,0,0,0.7);overflow: hidden;transition: .5s ease;"></div>
                </div>
                <div class="box" style="background: url('<?php echo base_url() ?>assets/img/lapangan/raya_futsal.jpg') center no-repeat;background-size: cover;">
                </div>
                <div class="box" style="background: url('<?php echo base_url() ?>assets/img/lapangan/yes_futsal.jpg') center no-repeat;background-size: cover;">
                </div>
                <div class="box" style="background: url('<?php echo base_url() ?>assets/img/lapangan/default.jpg') center no-repeat;background-size: cover;">
                </div>
            </div>
        </div><!-- /.detail-amenities -->


        <div class="widget">
    <h2 class="widgettitle">Jam Buka</h2>

    <div class="p20 background-white">
        <div class="working-hours">
            <div class="day clearfix">
                <span class="name">Senin</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Selasa</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Rabu</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Kamis</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Jumat</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Sabtu</span><span class="hours">07:00 AM - 02:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Minggu</span><span class="hours">07:00 AM - 02:00 PM</span>
            </div><!-- /.day -->
        </div>
    </div>
</div><!-- /.widget -->

        <div class="detail-payments">
            <h3>Menerima Pembayaran</h3>
            
            <ul>
                <li><a href="#"><i class="fa fa-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-stripe"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
            </ul>
        </div>
    </div><!-- /.col-sm-5 -->

    <div class="col-sm-12" id="tulis_review">
        <h2>Tulis Review</h2>

        <form class="background-white p20 add-review" action="">
            <div class="row">
                <div class="form-group input-rating col-sm-3">

                    <div class="rating-title">Lapangan</div>

                    <input type="radio" value="1" name="food" id="rating-food-1" onclick="rate_food(this.value)">
                    <label for="rating-food-1"></label>
                    <input type="radio" value="2" name="food" id="rating-food-2" onclick="rate_food(this.value)">
                    <label for="rating-food-2"></label>
                    <input type="radio" value="3" name="food" id="rating-food-3" onclick="rate_food(this.value)">
                    <label for="rating-food-3"></label>
                    <input type="radio" value="4" name="food" id="rating-food-4" onclick="rate_food(this.value)">
                    <label for="rating-food-4"></label>
                    <input type="radio" value="5" name="food" id="rating-food-5" onclick="rate_food(this.value)">
                    <label for="rating-food-5"></label>
                    <input type="hidden" id="review_food">

                </div><!-- /.col-sm-3 -->
                <div class="form-group input-rating col-sm-3">

                    <div class="rating-title">Penjaga</div>

                    <input type="radio" value="1" name="staff" id="rating-staff-1" onclick="rate_penjaga(this.value)">
                    <label for="rating-staff-1"></label>
                    <input type="radio" value="2" name="staff" id="rating-staff-2" onclick="rate_penjaga(this.value)">
                    <label for="rating-staff-2"></label>
                    <input type="radio" value="3" name="staff" id="rating-staff-3" onclick="rate_penjaga(this.value)">
                    <label for="rating-staff-3"></label>
                    <input type="radio" value="4" name="staff" id="rating-staff-4" onclick="rate_penjaga(this.value)">
                    <label for="rating-staff-4"></label>
                    <input type="radio" value="5" name="staff" id="rating-staff-5" onclick="rate_penjaga(this.value)">
                    <label for="rating-staff-5"></label>
                    <input type="hidden" id="review_penjaga">

                </div><!-- /.col-sm-3 -->
                <div class="form-group input-rating col-sm-3">

                    <div class="rating-title">Keamanan</div>

                    <input type="radio" value="1" name="value" id="rating-value-1" onclick="rate_keamanan(this.value)">
                    <label for="rating-value-1"></label>
                    <input type="radio" value="2" name="value" id="rating-value-2" onclick="rate_keamanan(this.value)">
                    <label for="rating-value-2"></label>
                    <input type="radio" value="3" name="value" id="rating-value-3" onclick="rate_keamanan(this.value)">
                    <label for="rating-value-3"></label>
                    <input type="radio" value="4" name="value" id="rating-value-4" onclick="rate_keamanan(this.value)">
                    <label for="rating-value-4"></label>
                    <input type="radio" value="5" name="value" id="rating-value-5" onclick="rate_keamanan(this.value)">
                    <label for="rating-value-5"></label>
                    <input type="hidden" id="review_keamanan">

                </div><!-- /.col-sm-3 -->
                <div class="form-group input-rating col-sm-3">

                    <div class="rating-title">Fasilitas</div>

                    <input type="radio" value="1" name="atmosphere" id="rating-atmosphere-1" onclick="rate_fasilitas(this.value)">
                    <label for="rating-atmosphere-1"></label>
                    <input type="radio" value="2" name="atmosphere" id="rating-atmosphere-2" onclick="rate_fasilitas(this.value)">
                    <label for="rating-atmosphere-2"></label>
                    <input type="radio" value="3" name="atmosphere" id="rating-atmosphere-3" onclick="rate_fasilitas(this.value)">
                    <label for="rating-atmosphere-3"></label>
                    <input type="radio" value="4" name="atmosphere" id="rating-atmosphere-4" onclick="rate_fasilitas(this.value)">
                    <label for="rating-atmosphere-4"></label>
                    <input type="radio" value="5" name="atmosphere" id="rating-atmosphere-5" onclick="rate_fasilitas(this.value)">
                    <label for="rating-atmosphere-5"></label>

                    <input type="hidden" id="review_fasilitas">

                </div><!-- /.col-sm-3 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="">Kelebihan</label>
                    <textarea class="form-control" rows="5" id="review_kelebihan"></textarea>
                </div><!-- /.col-sm-6 -->
                <div class="form-group col-sm-6">
                    <label for="">Kekurangan</label>
                    <textarea class="form-control" rows="5" id="review_kekurangan"></textarea>
                </div><!-- /.col-sm-6 -->

                <div class="col-sm-8">
                    <p>harus diisi <span class="required">*</span></p>
                </div><!-- /.col-sm-8 -->
                <div class="col-sm-4">
                    <button class="btn btn-primary btn-block" id="send_review_btn" type="submit" onclick="send_review()"><i class="fa fa-star"></i>Submit Review</button>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.col-* -->
</div><!-- /.row -->

</div><!-- /.container -->

            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

        <?php $this->load->view('footer') ?>

</div><!-- /.page-wrapper -->

<script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/map.js" type="text/javascript"></script>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script>
    var app=angular.module('halaman_lapangan',[]);

    app.controller('review_lapangan',function($scope,$http){

        var data = $.param({
            id_lapangan: $('#id_lapangan').val(),
        });
        
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('<?php echo base_url()?>lapangan/review_lapangan', data, config)
        .success(function (data, status, headers, config) {
            $scope.reviews = data.review_lapangan;
            // render_rate();
        })
        .error(function (data, status, header, config) {
            $scope.ResponseDetails = "Data: " + data +
                "<hr />status: " + status +
                "<hr />headers: " + header +
                "<hr />config: " + config;
        });

        $scope.getNumber = function(num) {
            return new Array(num);   
        }


    });

</script>


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
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>

        $(window).load(function() {
            $('span.stars').stars();
            $('span.stars2').stars2();

            id_user = $('#id_user').val();

            if (id_user == '') {
                $('#send_review_btn').prop('disabled', true);
                $("#send_review_btn").html('Anda Harus Login sebelum Komen');
            }
        });

        $.fn.stars = function() {
            return $(this).each(function() {
                $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
            });
        }
        $.fn.stars2 = function() {
            return $(this).each(function() {
                $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
            });
        }       
        
        function show_detail(id) {
            $('#detail_tipe'+id).toggle();
        }

        function choose_lapangan(id) {
            let id_lapangan = id;
            window.location.href = '<?php echo base_url()?>c_booking/proceed_review';
            // jQuery.ajax({
            //   url: '<?php echo base_url()?>c_booking/proceed_review',
            //   type: 'POST',
            //   data: {
                  
            //   },
            //   dataType : 'json',
            //   success: function(data, textStatus, xhr) {
            //     console.log(data);
            //   }
            // });

        }

        function render_rate()
        {
            $('span.stars').stars();
            $('span.stars2').stars2();
        }

        function rate_food(val)
        {
            $('#review_food').val(val);
        }

        function rate_penjaga(val)
        {
            $('#review_penjaga').val(val);
        }

        function rate_keamanan(val)
        {
            $('#review_keamanan').val(val);
        }

        function rate_fasilitas(val)
        {
            $('#review_fasilitas').val(val);
        }

        function send_review()
        {

            review_food = $('#review_food').val();
            review_penjaga = $('#review_penjaga').val();
            review_keamanan = $('#review_keamanan').val();
            review_fasilitas = $('#review_fasilitas').val();
            review_kelebihan = $('#review_kelebihan').val();
            review_kekurangan = $('#review_kekurangan').val();
            id_lapangan = $('#id_lapangan').val();
            id_user = $('#id_user').val();

            // alert(review_food);
            // alert(review_penjaga);
            // alert(review_keamanan);
            // alert(review_fasilitas);
            // alert(review_kelebihan);
            // alert(review_kekurangan);
            jQuery.ajax({
              url: '<?php echo base_url()?>lapangan/send_review',
              type: 'POST',
              data: {
                  food: review_food, penjaga:review_penjaga, keamanan:review_keamanan, fasilitas:review_fasilitas , kelebihan:review_kelebihan, kekurangan:review_kekurangan, id_lapangan : id_lapangan
              },
              dataType : 'json',
              success: function(data, textStatus, xhr) {
                console.log(data);
              }
            });
        }

        $('.near-lapangan').slick({
          centerMode: true,
          centerPadding: '20px',
          slidesToShow: 3,
          arrows: false,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            }
          ]
        });
</script>

</body>

</html>

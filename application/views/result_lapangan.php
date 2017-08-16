<!DOCTYPE html>
<html ng-app="result_lapangan">


<!-- Mirrored from preview.byaviators.com/template/superlist/listing-row.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2017 17:07:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Futsalyuk - Cari lapangan futsal murah di <?php echo $daerah; ?></title>
	<meta name="title" content="futsalyuk.com - cari lapangan futsal murah, nyaman dan berkualitas di <?php echo $daerah; ?>">
    <meta name="description" content="cari lapangan futsal murah, nyaman dan berkualitas di <?php echo $daerah; ?>">
    <meta name="keywords" content="lapangan futsal murah di <?php echo $daerah; ?>, lapangan futsal online di <?php echo $daerah; ?>, booking lapangan futsal online murah di <?php echo $daerah; ?>, pertandingan futsal di <?php echo $daerah; ?>">
    <meta name="robots" content="index,follow">
    
    <link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >


    <link href="http://futsalyuk.com/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="http://futsalyuk.com/assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link  href="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">

    <title>Superlist - Directory Template</title>

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
</head>


<body class="">
<?php include_once("analyticstracking.php") ?>

<div class="page-wrapper">
    
    <?php $this->load->view('header') ?>




    <div class="main" ng-controller="daftar_lapangan">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    
    <div class="document-title" style="background : url('<?php echo base_url()?>assets/img/header2.jpg') center no-repeat;background-size: cover;background-attachment: fixed;">
        <h1>Booking Menjadi Cepat dan Gampang!</h1>

        <!-- <ul class="breadcrumb">
            <li><a href="#">Superlist</a></li>
            <li><a href="#">Listing</a></li>
        </ul> -->
    </div><!-- /.document-title -->

	<input type="hidden" name="daerah" id="daerah" value="<?php echo $daerah; ?>">
	<input type="hidden" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>">
	<input type="hidden" name="jam" id="jam" value="<?php echo $jam; ?>">
	<input type="hidden" name="durasi" id="durasi" value="<?php echo $durasi; ?>">
	<input type="hidden" name="lat" id="lat" value="<?php echo $lat; ?>">
	<input type="hidden" name="lng" id="lng" value="<?php echo $lng; ?>">

                    <form class="filter" method="post" action="http://preview.byaviators.com/template/superlist/listing-row.html?">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <input type="text" placeholder="Keyword" class="form-control">
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->

        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <select class="form-control" title="Select Location">
                    <option>Bronx</option>
                    <option>Brooklyn</option>
                    <option>Manhattan</option>
                    <option>Staten Island</option>
                    <option>Queens</option>
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->

        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <select class="form-control" title="Select Category">
                    <option value="">Automotive</option>
                    <option value="">Jobs</option>
                    <option value="">Nightlife</option>
                    <option value="">Services</option>
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->

    <hr>

    <div class="row">
        <div class="col-sm-8">
            <div class="filter-actions">
                <a href="#"><i class="fa fa-close"></i> Reset Filter</a>
                <a href="#"><i class="fa fa-save"></i> Save Search</a>
            </div><!-- /.filter-actions -->
        </div><!-- /.col-* -->

        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Redefine Search Result</button>
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</form>


<h2 class="page-title">
    {{ total_pencarian }} hasil pencarian

    <form method="get" action="http://preview.byaviators.com/template/superlist/listing-row.html?" class="filter-sort">
        <div class="form-group">
            <select title="Sort by">
                <option name="price">Price</option>
                <option name="rating">Rating</option>
                <option name="title">Title</option>
            </select>
        </div><!-- /.form-group -->
                
        <div class="form-group">
            <select title="Order">
                <option name="ASC">Asc</option>
                <option name="DESC">Desc</option>
            </select>
        </div><!-- /.form-group -->
    </form>
</h2><!-- /.page-title -->

<div class="cards-row">
        <div class="card-row" ng-repeat="lapangan in lapangan">
            <div class="card-row-inner">
                <div class="card-row-image" style="background: url('<?php echo base_url() ?>{{ lapangan.picture }}')center no-repeat;background-size: cover;">
                    <div class="card-row-label"><a href="listing-detail.html">Vacation</a></div><!-- /.card-row-label -->
                    
                        <div class="card-row-price">{{ lapangan.harga_mulai }} / jam</div><!-- -->
                    
                </div><!-- /.card-row-image -->

                <div class="card-row-body">
                    <h2 class="card-row-title"><a href="<?php echo base_url() ?>lapangan/show/{{ lapangan.nama }}/{{ lapangan.id }}/{{ tanggal }}/{{ jam }}/{{ durasi }}/{{ lapangan.rating }}">{{ lapangan.nama }}</a></h2>
                    <div class="card-row-content"><p>{{ lapangan.deskripsi }}</p></div><!-- /.card-row-content -->
                </div><!-- /.card-row-body -->

                <div class="card-row-properties">
                    <dl>
                        
                            <dd>Harga mulai</dd><dt> {{ lapangan.harga_mulai }} / jam</dt>
                        
                        
                            <dd>Location</dd><dt>{{ lapangan.daerah }}</dt>
                        

                        <dd>Rating</dd>
                        <dt>
                            <div class="card-row-rating">
                            	{{ lapangan.rating }}
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            	
                            </div><!-- /.card-row-rating -->
                        </dt>
                    </dl>
                </div><!-- /.card-row-properties -->
            </div><!-- /.card-row-inner -->
        </div><!-- /.card-row -->
    
</div><!-- /.cards-row -->


<div class="pager">
    <ul>
        <li ><a href="#">Prev</a></li>
        <li class="active"><a href="#">1</a></li>
        <li ><a>2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div><!-- /.pagination -->


                </div><!-- /.content -->
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

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>

<script src="<?php echo base_url(); ?>assets/assets/js/superlist.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.js"></script>

<script src="http://futsalyuk.com/assets/js/plugins/rangeslider/rangeslider.min.js"></script>
<script src="http://futsalyuk.com/assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src='http://futsalyuk.com/assets/js/wNumb.min.js'></script>
<script>
	var app=angular.module('result_lapangan',[]);

	app.controller('daftar_lapangan',function($scope,$http){

		var data = $.param({
            daerah: $('#daerah').val(),
            tanggal: $('#tanggal').val(),
            jam: $('#jam').val(),
            durasi: $('#durasi').val(),
            lat: $('#lat').val(),
            lng: $('#lng').val()
        });
    	
    	$scope.total_pencarian = 0;
		$scope.tanggal = $('#tanggal').val();
		$scope.jam =$('#jam').val();
		$scope.durasi = $('#durasi').val();
		
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('<?php echo base_url()?>Cari_lapangan/show_lapangan', data, config)
        .success(function (data, status, headers, config) {
            $scope.lapangan = data.lapangan;
            $scope.total_pencarian = $scope.lapangan.length
        })
        .error(function (data, status, header, config) {
            $scope.ResponseDetails = "Data: " + data +
                "<hr />status: " + status +
                "<hr />headers: " + header +
                "<hr />config: " + config;
        });

     //    $http.get("<?php echo base_url()?>Cari_lapangan/show_lapangan").success(function(result){
	    //  $scope.lapangan=result.lapangan;
	    // });

	});

</script>
<script>
	 $('[data-toggle="datepicker"]').datepicker({
	 	autoHide: true,
	 	format: 'yyyy-mm-dd'
	 });

	 var basic_slider = document.getElementById('basic_slider');
        var bigValueSpan = document.getElementById('durasi_value');

        // noUiSlider.create(basic_slider, {
        //     start: 1,
        //     step: 1,
        //     format: wNumb({
        //         decimals: 0
        //     }),
        //     range: {
        //         'min':  [1],
        //         'max':  [5]
        //     }
        // });

        // basic_slider.noUiSlider.on('update', function ( values, handle ) {
        //     bigValueSpan.innerHTML = values[handle];
        //     nilai_durasi.value = values[handle];
        // });
        function round(value, precision) {
		    var multiplier = Math.pow(10, precision || 0);
		    return Math.round(value * multiplier) / multiplier;
		}
  
	
</script>


</body>

<!-- Mirrored from preview.byaviators.com/template/superlist/listing-row.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2017 17:07:55 GMT -->
</html>

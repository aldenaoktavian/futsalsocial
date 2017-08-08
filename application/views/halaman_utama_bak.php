<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>gofutsal</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/js/plugins/rangeslider/rangeslider.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">


	<style>
		.logo{
			text-align: center;
            color: #f4f4f4;
		}

        .footer{
            color: #f4f4f4;
        }
		.loginColumns{
			padding: 50px 20px 20px 20px;
		}
	</style>
</head>

<body class="gray-bg" style="background: url(<?php echo base_url(); ?>assets/img/futsal.jpg)center no-repeat;background-size: cover;">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
				<!-- <div class="logo">
            		<h2>gofutsal!</h2>
            		<p>booking</p>
            	</div> -->

                <div class="ibox-content" style="background: rgba(255, 253, 255, 0.9);">
                    <center><img src="<?php echo base_url()."assets/img/Design.png"; ?>" style="width: 150px;"></center>
                    <center><div class="logo" style="color: #666;">Booking</div></center>
                    <form class="m-t" role="form" action="<?php echo base_url(); ?>c_booking/search_lapangan" id="send_form" method="POST">
                        <div class="form-group">
                        	<label for="email">Daerah</label>
                            <input type="text" name="txt_daerah" class="form-control" placeholder="masukan nama daerah" required>
                        </div>
                        <div class="form-group" id="data_1">
                        	<label class="font-normal">Tanggal</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="txt_tanggal" placeholder="pilih tanggal booking" required>
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="email">Jam</label>
                            <!-- <input type="text" name="txt_jam" class="form-control" placeholder="masukan jam booking" required=""> -->
                            <select class="form-control m-b" name="txt_jam">
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
                        </div>
                        <div class="form-group">
                        	<label for="email">Durasi</label>
                            <div id="basic_slider"></div>
                            <br>
            				<div><span id="durasi_value"></span> Jam</div>
            				<input type="hidden" id="nilai_durasi" name="txt_durasi" required>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Cari Lapangan</button>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
				<!-- <div class="logo">
            		<h2>gofutsal!</h2>
            		<p>social</p>
            	</div> -->

                <div class="ibox-content" style="background: rgba(255, 253, 255, 0.9);">
                    <center><img src="<?php echo base_url()."assets/img/Design.png"; ?>" style="width: 150px;"></center>
                    <center><div class="logo" style="color: #666;">Social</div></center>
                    <br>
                    <div class="spacer" style="height: 5px;"></div>
                    <form class="m-t" role="form" action="">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6" style="color: #f4f4f4;">
                Copyright gofutsal!
            </div>
            <div class="col-md-6 text-right">
               <small style="color: #f4f4f4;">© 2017</small>
            </div>
        </div>
    </div>




	<!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <!-- range slider -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/rangeslider/rangeslider.min.js"></script>

    <script src='<?php echo base_url(); ?>assets/js/wNumb.min.js'></script>

    <script>
    	$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
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

        // $('#send_form').submit(function() {
        //     jam = $( "input[name*='txt_jam']" ).val();

        //     return false; 
        // });

    </script>
</body>

</html>

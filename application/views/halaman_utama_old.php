<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>futsalyuk.com - cari lapangan futsal murah, nyaman dan berkualitas</title>
    <meta charset="utf-8" />
    <meta name="title" content="futsalyuk.com - cari lapangan futsal murah, nyaman dan berkualitas">
    <meta name="description" content="cari lapangan futsal murah, nyaman dan berkualitas">
    <meta name="keywords" content="lapangan futsal murah, lapangan futsal online, booking lapangan futsal online murah, pertandingan futsal">
    <meta name="robots" content="index,follow">
    <link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

<body class="gray-bg">

   <!-- #region Jssor Slider Begin -->
    <script src="<?php echo base_url(); ?>assets/js/slider/jssor.slider-23.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 300,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
    <style>
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */

        #jssor_1 > div > div > div.jssorb05{
            bottom: 200px !important;
        }

        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('<?php echo base_url(); ?>assets/js/slider/img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        .jssora22l.jssora22lds      (disabled)
        .jssora22r.jssora22rds      (disabled)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('<?php echo base_url(); ?>assets/js/slider/img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
        .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
        .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }


    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/js/slider/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>assets/js/slider/img/promo2.jpg"" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>assets/js/slider/img/promo.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->

    <div class="login-container" style="width: 80%;height: 350px;position: absolute;z-index: 100;top: 300px;left: 10%;">
        
        <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-calendar-o"></i> Booking</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-futbol-o"></i>Social</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <form action="<?php echo base_url() ?>cari_lapangan" method="get">
                                        <div class="cari-lapangan col col-lg-12" style="height: 250px;width: 100%;">
                                            <h3>Cari Lapangan </h3>
                                            <hr>
                                            <div class="row" style="margin-bottom: 30px;"></div>
                                            <div class="row">
                                                <div class="col col-lg-5">
                                                    <input type="text" id="pencarian" name="daerah" class="form-control" placeholder="masukan nama daerah" required>
                                                    <div id="searchList" class="searchlist"></div> 
                                                </div>

                                                <div class="col col-lg-2">
                                                    <div class="form-group" id="data_1">
                                                        
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tanggal" placeholder="pilih tanggal booking" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col col-lg-2">
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
                                                </div>

                                                <div class="col col-lg-3">
                                                    <div id="basic_slider" style="margin-top: 8px;"></div>
                                                    <br>
                                                    <div style="margin-top: -16px;text-align: center;"><span id="durasi_value"></span> Jam</div>
                                                    <input type="hidden" id="nilai_durasi" name="durasi" required>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <center>
                                                    <input type="submit" class="btn btn-success" value="Booking Lapangan">
                                                </center>
                                            </div>
                                            <div class="row" style="margin-top: 8px">
                                                <center>
                                                    <a href="#" style="font-size: 12px;">butuh bantuan?</a>
                                                </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="cari-lapangan" style="background: #e3ecec;height: 250px;width: 100%;"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

    
            </div>
        </div>



    


	<!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
    <!-- Custom and plugin javascript -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        $(document).ready(function(){  
          // $('#pencarian').keyup(function(){  
          //      var query = $(this).val();  
          //      if(query != '')  
          //      {  
          //           $.ajax({  
          //                url:"<?php echo base_url() ?>cari_lapangan/autocomplete_pencarian",  
          //                method:"POST",  
          //                data:{query:query},  
          //                success:function(data)  
          //                {  
          //                     $('#searchList').fadeIn();  
          //                     $('#searchList').html(data);  
          //                }  
          //           });  
          //      }  
          // });  
          // $(document).on('click', 'li', function(){  
          //      $('#pencarian').val($(this).text());  
          //      $('#searchList').fadeOut();  
          // });

                // $("#pencarian").autocomplete({
                //     minLength:2,
                //     source:'<?php echo base_url() ?>cari_lapangan/autocomplete_pencarian',
                //     select:function(event, ui){
                //         $('#nama-produk').html(ui.item.nama);
                //     }
                // });  
                $("#pencarian").autocomplete( {
                    source: function( request, response ) {
                        $.ajax({
                            url: "<?php echo base_url() ?>cari_lapangan/autocomplete_pencarian",
                            data: {term: request.term},
                            dataType: "json",
                            beforeSend : function(){
                               showloader = false;
                            },
                            success: function( data ) {
                                
                                response( $.map( data.myData, function( item ) {
                                    return {
                                        label: item.title,
                                        value: item.value
                                    }
                                }));
                            }
                        });
                    }
                    
        });
    });  
    </script>

</body>

</html>

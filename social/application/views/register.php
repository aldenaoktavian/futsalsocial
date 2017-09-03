<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo PARENT_BASE_URL?>assets/img/favicon/favicon.png">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link  href="<?php echo base_url(); ?>assets/css/jquery.steps.css" rel="stylesheet">
    <link  href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo PARENT_BASE_URL; ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <title>Booking Lapangan Futsal Online Gampang di futsalyuk.com</title>

    <style type="text/css">
        .number {
            all: unset;
        }

        .main-inner {
            padding: 35px 0px;
        }

        .required {
            color: #555555;
        }

        .form-file {
            padding-bottom: 35px !important;
        }
    </style>

    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox">
                                        <h2>
                                            Daftar Futsal Community
                                        </h2>

                                        <form id="form_register" method="POST" class="wizard-big" enctype="multipart/form-data">
                                            <div class="error_msg hidden" style="height: 20px;"></div>

                                            <span id="error_msg" class="error_msg hidden" style="color:red;font-weight:bold;margin-left: 2.5%;"></span>

                                            <h1>Account</h1>
                                            <fieldset>
                                                <h2>Account Information</h2>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Username <span class="span-required">*</span></label>
                                                            <input id="username" name="username" type="text" class="form-control required" onblur="cek_available_data(this.id, 'username');">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email <span class="span-required">*</span></label>
                                                            <input id="email" name="email" type="text" class="form-control required email" onblur="cek_available_data(this.id, 'email');">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Password <span class="span-required">*</span></label>
                                                            <input id="password" name="password" type="password" class="form-control required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password <span class="span-required">*</span></label>
                                                            <input id="confirm" name="confirm" type="password" class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input id="register_booking" name="register_booking" type="checkbox" class="hidden"> <label for="register_booking">Daftar Futsal Booking ( <a href="">apa itu futsal booking?</a> )</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h1>Profile</h1>
                                            <fieldset>
                                                <h2>Profile Information</h2>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>First name <span class="span-required">*</span></label>
                                                            <input id="firstname" name="firstname" type="text" class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Last name <span class="span-required">*</span></label>
                                                            <input id="lastname" name="lastname" type="text" class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 hidden">
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <div id="locationField">
                                                                <input type="text" class="form-control" placeholder="Masukkan Nama Daerah" id="member_location" name="member_location" onFocus="geolocate()" />
                                                            </div>
                                                            <input type="hidden" id="lat">
                                                            <input type="hidden" id="long">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h1>Images</h1>
                                            <fieldset>
                                                <h2>Profile Images</h2>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Profile Image</label>
                                                            <input type="file" class="form-control form-file" id="member_image" name="member_image">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Profile Banner</label>
                                                            <input type="file" class="form-control form-file" id="member_banner" name="member_banner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h1>Finish</h1>
                                            <fieldset>
                                                <h2>Syarat dan Ketentuan</h2>
                                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required hidden"> <label for="acceptTerms">Saya setuju dengan <a href="">syarat dan ketentuan</a> yang berlaku</label>
                                            </fieldset>
                                        </form>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

    <?php //$this->load->view('footer') ?>

</div><!-- /.page-wrapper -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.steps.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custom-register.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $("#wizard").steps();
        $("#form_register").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            lang: 'id',
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });

        $('.actions ul li a[href="#finish"]').click(function(){
            register_social();
        })
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>
<script type="text/javascript">
var placeSearch, autocomplete;
 
function initialize() {
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('member_location')),
      { types: ['geocode'] });
 
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
 
function fillInAddress() {
 
  var place = autocomplete.getPlace().geometry.location;
 
  $('#long').val(place.lng());
  $('#lat').val(place.lat());
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

</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('helmet') ?>

    <title>Futsalyuk - Register</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.css">
    <script src="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.min.js"></script>
</head>


<body class="">

<?php include_once("analyticstracking.php") ?>

<div class="page-wrapper">
    
    <?php $this->load->view('header') ?>




    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    


                    <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="page-title">
            <h1>Register</h1>
        </div><!-- /.page-title -->
        <form>
            <div class="form-group">
                <label for="login-form-email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="login-form-first-name">Full name</label>
                <input type="text" class="form-control" name="full_name" id="fullname">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="login-form-last-name">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="login-form-password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div><!-- /.form-group -->

            <div class="btn btn-primary pull-right" onclick="do_register()">Register</div>
        </form>
    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->

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

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/infobox.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/jquery-google-map/jquery-google-map.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

<script src="<?php echo base_url(); ?>assets/assets/js/superlist.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.js"></script>

</body>

<script>
    function do_register()
    {
        email = $('#email').val();
        fullname = $('#fullname').val();
        username = $('#username').val();
        password = $('#password').val();

        if (email == '' || fullname=='' || username == '' || password=='') 
            {
                swal("Anda harus mengisi data diri anda...")
            }else{
                swal({
                  title: 'Daftar',
                  text: 'Dengan mendaftar anda harus tunduk dengan persyaratan dari futsalyuk.com ?',
                  type: 'info',
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                }, function(){
                  setTimeout(function() {
                    jQuery.ajax({
                        url: '<?php echo base_url()?>member/do_register',
                        type: 'POST',
                        data: {
                          email: email, fullname:fullname, username:username, password:password
                        },
                        success: function(data, textStatus, xhr) {
                            if (data === 'success') {
                                swal("Pendaftaran Sukses!", "Anda telah berhasil Melakukan Pendaftaran, kami akan mengirim link verifikasi ke email anda, jika tidak ada di kotak masuk anda silahkan cek di kotak spam", "success");
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

</html>

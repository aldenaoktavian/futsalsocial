<!-- <!doctype html>
<title>Site Maintenance</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>We&rsquo;ll be back soon!</h1>
    <div>
        <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
        <p>&mdash; The Team</p>
    </div>
</article> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Futsalyuk Comming Soon | Booking Lapangan dan Komunitas Futsal Online Terbesar Hanya di futsalyuk.com</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/basscss.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
    <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.css">
    <script src="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        html,body {
            height:100%;
            font: 20px Helvetica, sans-serif; color: #333;
        }

        .container {
            width: 100%;
            height:100%;
            background-size: cover;
        }
        
        .content {
            margin-top: 150px;
        }

        .plang img {
            width: 350px;
        }

        @media (max-width: 320px) {
            .plang img {
                width: 200px;
            }

            .copy p {
                font-size: 12px;
                line-height: 13px;
            }

            .copy {
                margin-top: -20px;
            }
        } 

        @media (max-width: 720px) {
            .plang img {
                width: 230px;
            }

            .copy p {
                font-size: 12px;
                line-height: 13px;
            }

            .copy {
                margin-top: -20px;
            }
        } 

        .copy {
            color: #FFF;
        }
        
        .email input {
            border-radius: 15px;
        }

        .email button {
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="container overflow-hidden" style="background: url('<?php echo base_url() ?>assets/img/maintenance/background.png') top no-repeat;">
        <div class="content">
            <div class="plang center">
                <img src="<?php echo base_url() ?>assets/img/maintenance/plang.png" alt="">
            </div>
            <div class="copy center relative mt3">
                <h2 class="mb1" style="color:#fff;">Penasaran ?</h2>
                <div class="sm-col-10 md-col-6 lg-col-6 col-10 mx-auto">
                    <p>Silahkan masukan email kamu dan jadilah yang pertama menikmati setiap kemudahan dari platform dunia futsal tanpa batas!</p>
                </div>
                <div class="email overflow-hidden mt1">
                    <div class="md-col-8 sm-col-12 mx-auto">
                        <div class="md-col-9 sm-col-12 mx-auto overflow-hidden">
                            <div class="col col-12 md-col-8 sm-col-12 mt1 px1">
                            <input type="email" id="email" class="form-control" placeholder="masukan email anda">
                            </div>
                            <div class="col col-12 md-col-3 sm-col-12 mt1 px1">
                            <button onclick="do_register()" class="form-control">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function do_register()
        {
            email = $('#email').val();

            if (email == '') 
                {
                    swal("Anda harus mengisi data email anda...")
                }else{
                    swal({
                    title: 'Daftar',
                    text: 'Daftarkan Email anda ?',
                    type: 'info',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    }, function(){
                    setTimeout(function() {
                        jQuery.ajax({
                            url: '<?php echo base_url()?>prelaunch/insert_mail',
                            type: 'POST',
                            data: {
                            email: email
                            },
                            success: function(data, textStatus, xhr) {
                                if (data === 'OK') {
                                    swal("Sukses!", "Email anda telah kami simpan, terima kasih", "success");
                                    $('#email').val('');
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
</body>
</html>
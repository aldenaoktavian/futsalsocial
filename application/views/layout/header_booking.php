<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon32.png" sizes="32x32">
    <title><?php echo $judul; ?></title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/slick/slick-theme.css" rel="stylesheet">

        <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>


    <!-- Peity -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>
        
    <script src="<?php echo base_url(); ?>assets/js/plugins/slick/slick.min.js"></script>


    <script type="text/javascript">
            
        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
</head>

<body class="top-navigation" style="margin-top: 51px;">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a href="<?php echo base_url(); ?>" class="navbar-brand" style="background: #ffffff;">
                    <img src="<?php echo base_url()."assets/img/Design.png"; ?>" style="width: 70px;margin-top: -8px;">
                </a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-top-links navbar-right">
                    <?php 
                        if ($this->session->userdata('id_user') == '') {
                     ?>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-in"></i> Masuk
                            </a>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-file-text-o"></i> Daftar
                            </a>
                        </li>
                    <?php }else{ ?>
                        <li>
                            <a href="<?php echo base_url().'c_login/logout'; ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        </div>


        
        
        <div class="content">
           <?php $this->load->view($content); ?>            
        </div>




        <div class="footer">
            <div>
                <strong>Copyright</strong> gofutsal &copy; 2017
            </div>
        </div>

        </div>
        </div>



    

</body>

</html>

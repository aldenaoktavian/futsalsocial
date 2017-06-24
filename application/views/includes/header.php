<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<!-- Start CSS Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<!--link href="<?php echo base_url(); ?>assets/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-reboot.min.css" rel="stylesheet"-->
	<!-- End CSS Bootstrap -->

	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript">
        base_url = '<?php echo base_url(); ?>';
    </script>
</head>
<body>
    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <h1><a class="navbar-brand" href="<?php echo base_url(); ?>">Futsal Yuk</a></h1>         
        </div>
        <div class="border-bottom">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men">
                <ul class=" nav_1">
                    <li class="dropdown at-drop">
                      <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe" style="vertical-align: middle;"></i> <span class="number"><?php echo $count_notif_updates; ?></span></a>
                      <ul class="dropdown-menu menu1 " role="menu">
                        <?php 
                            foreach($notif_updates as $notif){ 
                                if($notif['notif_show'] == 1){
                        ?>
                            <li>
                                <a href="<?php echo $notif['notif_url'].'/'.md5($notif['notif_id']) ?>">
                                    <div class="user-new" style="width:100px;">
                                        <p><?php echo $notif['notif_detail']; ?>...</p>
                                        <span><?php echo $notif['notif_time']; ?></span>
                                    </div>
                                    <div class="user-new-left">
                                        <?php echo $notif['notif_icon']; ?>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a>
                            </li>
                        <?php } else{ ?>
                            <li>
                                <a href="#detail-notif" class="popup-detail-notif" data-url="<?php echo $notif['notif_url'].'/'.md5($notif['notif_id']) ?>">
                                    <div class="user-new" style="width:100px;">
                                        <p><?php echo $notif['notif_detail']; ?>...</p>
                                        <span><?php echo $notif['notif_time']; ?></span>
                                    </div>
                                    <div class="user-new-left">
                                        <?php echo $notif['notif_icon']; ?>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a>
                            </li>
                        <?php } } ?>
                        <li><a href="<?php echo base_url().'notif/all'; ?>" class="view">Lihat Semua Notifikasi</a></li>
                      </ul>
                    </li>
                    <img class="img-circle" src="<?php echo base_url(); ?>uploadfiles/member-images/<?php echo $member_image?>" style="width: 35px;">
                    <a href="<?php echo base_url().'member/profile/'.md5($this->session->login['id']); ?>" class="dropdown-at dropdown-at-menu"><span class=" name-caret">Profile</span></a>
                    <a href="<?php echo base_url(); ?>" class="dropdown-at dropdown-at-menu"><span class=" name-caret">Home</span></a>
                    <li class="dropdown" style="margin-right: 25px;">
                      <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Setting<i class="caret"></i></span></a>
                      <ul class="dropdown-menu" role="menu" style="left: -6em;">
                        <li><a href="<?php echo base_url().'member/editprofile' ?>" title="Edit Profil"><i class="fa fa-user"></i>Edit Profile</a></li>
                        <li><a href="<?php echo base_url().'member/ubahpassword'; ?>" title="Ubah Password"><i class="fa fa-lock"></i>Ubah Password</a></li>
                        <li><a href="<?php echo base_url().'login/logout'; ?>" title="Logout"><i class="fa fa-cog"></i>Logout</a></li>
                      </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix" style=""></div>
        </div>
    </nav>
    <div id="detail-notif" class="main-content zoom-anim-dialog mfp-hide popup-content" style="width: 70%;/*min-height: 370px;*/"></div>
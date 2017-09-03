<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
	<title><?php echo $title; ?></title>
	<!-- Start CSS Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
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

    <link id="bsdp-css" href="<?php echo base_url(); ?>assets/plugin/datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
    <script type="text/javascript">
        base_url = '<?php echo base_url(); ?>';
        port_socket = 3500;
        var url = $(location).attr('href');
        var url_parts = url.split("/");
    </script>
</head>
<body>
    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <h1><a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/img/background-biru.png'; ?>" width="65px"></a></h1>         
        </div>
        <div class="border-bottom">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men">
                <ul class=" nav_1">
                    <li class="dropdown at-drop">
                      <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe" style="vertical-align: middle;"></i> <span class="number" id="count_unread_message"><?php echo $count_notif_updates; ?></span></a>
                      <ul class="dropdown-menu menu1 " role="menu" id="dropdown-notif">
                        <?php 
                            foreach($notif_updates as $notif){ 
                        ?>
                            <li>
                                <a href="<?php echo $notif['notif_url'] ?>">
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
                        <?php }  ?>
                        <li><a href="<?php echo base_url().'notif/all'; ?>" class="view">Lihat Semua Notifikasi</a></li>
                      </ul>
                    </li>
                    <li class="dropdown at-drop">
                      <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-comments" style="vertical-align: middle;"></i> <span class="number" id="unread_all_messages"><?php echo $unread_all_messages; ?></span></a>
                      <ul class="dropdown-menu menu1 all_messages" role="menu" id="dropdown-notif">
                        <?php 
                            foreach($header_message_list as $msg){ 
                        ?>
                            <li>
                                <a href="<?php echo base_url()."social/message/".md5($msg['member_chat_id']); ?>">
                                    <div class="user-new" style="width:100px;">
                                        <p><?php echo $msg['member_name'].$msg['unread_message']; ?></p>
                                        <span><?php echo $msg['detail_chat']; ?></span>
                                    </div>
                                    <div class="user-new-left">
                                        <span><?php echo $msg['chat_time']; ?></span><br/>
                                        <?php echo $notif['notif_icon']; ?>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a>
                            </li>
                        <?php }  ?>
                        <li><a href="<?php echo base_url().'social/messages/all'; ?>" class="view">Lihat Semua Pesan</a></li>
                      </ul>
                    </li>
                    <img class="img-circle" src="<?php echo base_url(); ?>uploadfiles/member-images/<?php echo $member_image?>" style="width: 35px;height: 35px;">
                    <a href="<?php echo base_url().'member/profile/'.md5($this->session->login['id']); ?>" class="dropdown-at dropdown-at-menu"><span class=" name-caret">Profile</span></a>
                    <a href="<?php echo base_url(); ?>" class="dropdown-at dropdown-at-menu"><span class=" name-caret">Home</span></a>
                    <li class="dropdown" style="margin-right: 25px;">
                      <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Setting<i class="caret"></i></span></a>
                      <ul class="dropdown-menu" role="menu" style="left: -6em;">
                        <li><a href="<?php echo base_url().'member/editprofile/'.md5($this->session->login['id']); ?>" title="Edit Profil"><i class="fa fa-user"></i>Edit Profile</a></li>
                        <li><a href="<?php echo base_url().'member/ubahpassword/'.md5($this->session->login['id']); ?>" title="Ubah Password"><i class="fa fa-lock"></i>Ubah Password</a></li>
                        <li><a href="<?php echo base_url().'login/logout'; ?>" title="Logout"><i class="fa fa-cog"></i>Logout</a></li>
                      </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix" style=""></div>
        </div>
    </nav>
    <div id="detail-notif" class="main-content zoom-anim-dialog mfp-hide popup-content" style="width: 70%;/*min-height: 370px;*/"></div>
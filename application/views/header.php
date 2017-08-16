<?php 
    $name = $this->session->userdata('username');
    $picture = $this->session->userdata('picture');
 ?>

<header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url()?>assets/img/background-putih.png" width="90px" alt="Logo">
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-top">
                        
                        <ul class="header-nav-secondary nav nav-pills">
                            <?php if ($name == '') { ?>
                                <li><a href="<?php echo base_url() ?>member/login">Login</a></li>
                                <li><a href="<?php echo base_url() ?>member/register">Register</a></li>
                        <?php } else {?>
                                <!-- <li>Selamat datang, <b><?php echo $name; ?></b></li> -->
                                <div class="header-nav-user">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Selamat datang, 
                                            <span class="header-nav-user-name" style="color: green;"><?php echo $name; ?></span> <i class="fa fa-chevron-down"></i>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="<?php echo base_url() ?>member/profile">Lihat Profil</a></li>
                                            <li><a href="change-password.html">Ganti Password</a></li>
                                            <li><a href="listing-submit.html">Keluar</a></li>
                                            <li>
                                                <div style="width: 100%;background: #78AE62;padding: 20px;color:#f4f4f4;"><b>Saldo</b> Rp.50.000</div>
                                            </li>
                                        </ul>
                                    </div><!-- /.dropdown -->
                                </div><!-- /.header-nav-user -->
                        <?php } ?>
                            
                        </ul>
                    </div><!-- /.header-top -->

                    <div class="header-bottom">
                        <!-- <div class="header-action"> -->
                            <!-- <a href="listing-submit.html" class="header-action-inner" title="Add Listing" data-toggle="tooltip" data-placement="bottom"> -->
                                <!-- <i class="fa fa-plus"></i> -->
                            <!-- </a>/.header-action-inner -->
                        <!-- </div>/.header-action -->

                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
    <li >
        <a href="<?php echo base_url() ?>">Beranda </a>
    </li>

    <li class="">
        <a href="<?php echo base_url() ?>cara_booking">Cara Booking </a>
    </li>

    <li>
        <a href="<?php echo base_url() ?>yukpay">YukPay </a>
    </li>

    <li >
        <a href="#">Fair Play</a>
    </li>

    <li >
        <a href="#">Mitra Lapangan </a>
    </li>

</ul>

<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->
<div class="navbar-left navbar-header" style="background-color: white;">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	</button>
</div>
<div class="navbar-left" style="float: right !important;width: 100%;">
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse collapse">
	        <ul class="nav" id="side-menu">
	            <li>
	                <a href="<?php echo base_url(); ?>team/profile" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Tentang Team</span> </a>
	            </li>
				<li>
	                <a href="<?php echo base_url(); ?>team/statistic" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Statistik Team</span> </a>
	            </li>
	            <li>
	                <a href="<?php echo base_url(); ?>team/history" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">History Pertandingan</span> </a>
	            </li>
	            <li>
	                <a href="<?php echo base_url().'team/mychallenge/'.$url_team_id; ?>" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">My Challenge</span> </a>
	            </li>
	            <?php if($this->session->login['is_team_admin'] == 1){ ?>
	            <li>
	                <a href="<?php echo base_url().'team/setting/'.$url_team_id; ?>" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Setting Team</span> </a>
	            </li>
	            <?php } ?>
	        </ul>
    	</div>
	</div>
</div>
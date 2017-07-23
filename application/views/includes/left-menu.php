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
	                <a href="<?php echo base_url(); ?>social/timeline" class="hvr-bounce-to-right <?php echo ($this->uri->segment(2) == 'timeline' ? 'active' : ''); ?>"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Timeline <b style="color: #2880b5;" class="hidden" id="count_new_post"></b></span> </a>
	            </li>
				<li>
	                <a href="<?php echo base_url(); ?>team/challengelist" class="hvr-bounce-to-right <?php echo ($this->uri->segment(2) == 'challengelist' ? 'active' : ''); ?>"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Team</span> </a>
	            </li>
	            <?php if($this->session->login['team_id']){ ?>
	            <li>
	                <a href="#team-auth" class="hvr-bounce-to-right popup-team-auth"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">My Team</span> </a>
	            </li>
	            <?php } else{ ?>
	            <li>
	                <a href="<?php echo base_url(); ?>team/newteam" class="hvr-bounce-to-right <?php echo ($this->uri->segment(2) == 'newteam' ? 'active' : ''); ?>"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">My Team</span> </a>
	            </li>
	            <?php } ?>
	            <li>
	                <a href="<?php echo base_url(); ?>challenge/newchallenge" class="hvr-bounce-to-right <?php echo ($this->uri->segment(2) == 'newchallenge' ? 'active' : ''); ?>"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Challenge</span> </a>
	            </li>
	            <li>
	                <a href="layout.html" class="hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Booking</span> </a>
	            </li>
	        </ul>
    	</div>
	</div>
</div>
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

	<div class="navbar-default sidebar" style="margin-top: 20px;">
		<h5 class="upcoming_challenge_title">Upcoming Challenge</h5>
		<div class="<?php echo (count($up_challenge) == 1 ? 'upcoming_challenge' : 'upcoming_challenge upcoming_challenge_slider'); ?>">
		<?php foreach ($up_challenge as $list_challenge) { ?>
            <div class="sngl_team" data-id="<?php echo md5($list_challenge['challenge_id']); ?>">                 
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                	<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['inviter_team_id']); ?>">
						<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['inviter_team_image']; ?>" title="<?php echo $list_challenge['inviter_team_name']; ?>">
					</a>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nopadding">VS</div>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                	<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['rival_team_id']); ?>">
						<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['rival_team_image']; ?>" title="<?php echo $list_challenge['rival_team_name']; ?>">
					</a>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 challengelist-history-table"><?php echo $list_challenge['challenge_date']." ".$list_challenge['challenge_time']; ?></div>
            </div>
        <?php } ?>
        <?php if(count($up_challenge) == 1){ ?>
        	<div class="clearfix"></div>
        <?php } ?>
        </div> 
	</div>
</div>
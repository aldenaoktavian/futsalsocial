<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-banner.php'); ?>
<style type="text/css">
	.challenge-item {
		margin-bottom: 15px;
	}
</style>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-team.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start list of challenge -->
		<?php foreach($history_challenge as $list_challenge){ ?>
		<div class="bg-post post-item challenge-item">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 challenge-img">
				<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['inviter_team_image']; ?>">
				<div class="clearfix"> </div>
				<h5><?php echo $list_challenge['inviter_team_name']; ?></h5>
				<div class="score-item">
					<?php echo $list_challenge['inviter_score']; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 challenge-det">
				<h4>VS</h4>
				<hr/>
				<p>
					<?php echo 'Tanggal '.$list_challenge['challenge_date'].
    						'<br/> Jam '.$list_challenge['challenge_time'].
    						'<br/> di '.$list_challenge['nama_lapangan'].
    						'<br/> '.$list_challenge['daerah'].', '.$list_challenge['kota']; 
    				?>
				</p>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 challenge-img">
				<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['rival_team_image']; ?>">
				<div class="clearfix"> </div>
				<h5><?php echo $list_challenge['rival_team_name']; ?></h5>
				<div class="score-item">
					<?php echo $list_challenge['rival_score']; ?>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
		<!-- end list of challenge -->
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
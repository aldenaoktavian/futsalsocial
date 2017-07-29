<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<style type="text/css">
	.bg-post {
		padding-top: 35px;
	}
	.post-item img {
		float: none;
	}
</style>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start list of challenge -->
		<?php foreach($upcoming_challenge as $list_challenge){ ?>
		<div class="bg-post post-item" id="<?php echo md5($list_challenge['challenge_id']); ?>">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 challenge-img">
				<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['inviter_team_id']); ?>">
					<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['inviter_team_image']; ?>">
				</a>
				<div class="clearfix"> </div>
				<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['inviter_team_id']); ?>" class="url-color">
					<h5><?php echo $list_challenge['inviter_team_name']; ?></h5>
				</a>
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
				<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['rival_team_id']); ?>">
					<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/team-images/'.$list_challenge['rival_team_image']; ?>">
				</a>
				<div class="clearfix"> </div>
				<a href="<?php echo base_url().'team/profile/'.md5($list_challenge['rival_team_id']); ?>" class="url-color">
					<h5><?php echo $list_challenge['rival_team_name']; ?></h5>
				</a>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="clearfix"> </div>
			<div id="<?php echo md5($list_challenge['challenge_id']); ?>_history" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;"></div>
			<div class="clearfix"> </div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 challenge-comment">
				<hr/>
				<a href="#<?php echo md5($list_challenge['challenge_id']); ?>_history" onclick="load_history_upteam('<?php echo md5($list_challenge['challenge_id']); ?>', '<?php echo md5($list_challenge['inviter_team_id']); ?>', '<?php echo md5($list_challenge['rival_team_id']); ?>')">History Pertandingan</a>
				<a href="#comment-content" class="popup-with-move-anim-challenge" data-id="<?php echo md5($list_challenge['challenge_id']); ?>"><button type="button" class="btn btn-inverse">Comment</button></a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
		<!-- end list of challenge -->
	</div>
</div>
<div id="comment-content" class="main-content zoom-anim-dialog mfp-hide"></div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<form action="<?php echo base_url().'team/newteam/'; ?>" method="POST" enctype="multipart/form-data">
			<br/>
			<h3>Buat Tim Baru</h3>
			<br/>
			<?php if(isset($message)){ ?>
				<span style="color:red;"><?php echo $message; ?></span><br/><br/>
			<?php } ?>
			Nama Team
			<input class="form-control" type="text" name="team_name" id="team_name" /><br/>
			Deskripsi Team
			<textarea class="form-control" name="team_desc" id="team_desc" style="height: 200px;resize: none;"></textarea><br/>
			Team Image
			<input type="file" id="team_image" name="team_image"><br/>
			Team Banner
			<input type="file" id="team_banner" name="team_banner"><br/>
			Password
			<input class="form-control" type="password" name="pass" id="pass" placeholder="Password" /><br/>
			Konfirmasi Password
			<input class="form-control" type="password" name="confirm_pass" id="confirm_pass" placeholder="Konfirmasi Password" /><br/>
			<button type="submit" class="btn btn-primary" style="float: right;">Buat Team</button>
			<div class="clearfix"> </div>
		</form>
	</div>
</div>
<div id="comment-content" class="main-content zoom-anim-dialog mfp-hide"></div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
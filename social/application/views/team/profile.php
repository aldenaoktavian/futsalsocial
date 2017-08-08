<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-banner.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-team.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start team description -->
		<div class="bg-post post-item profile-desc">
			<h4 class="text-center">Deskripsi Team</h4><br/>
			<p>
				<?php echo $team_description; ?>
			</p>
			<?php if(isset($this->session->team_pass) && $this->session->team_pass == 1){ ?>
				<hr/>
				<a href="#edit-desc" class="popup-edit-desc" data-id="<?php echo $team_id; ?>"><button type="button" class="btn btn-inverse">Edit</button></a>
			<?php } ?>
			<div class="clearfix"> </div>
		</div>
		<!-- end team description -->

		<!-- start team members -->
		<div class="bg-post post-item profile-members">
			<h4 class="text-center">Anggota</h4><br/>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
			<?php 
				foreach($team_members as $list_member){ 
					$member_image = ($list_member['member_image'] ? $list_member['member_image'] : 'no-img-profil.png');
			?>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>" title="<?php echo $list_member['member_name']; ?>">
				</div>
			<?php } ?>
			</div>
			<?php if(isset($this->session->team_pass) && $this->session->team_pass == 1){ ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr/>
				<a href="#add-member" class="popup-add-member" data-id="<?php echo $team_id; ?>"><button type="button" class="btn btn-inverse">Tambah Anggota</button></a>
			</div>
			<?php } ?>
			<div class="clearfix"> </div>
		</div>
		<!-- end team members -->
	</div>
</div>
<div id="edit-desc" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<div id="add-member" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
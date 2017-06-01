<? include(APPPATH.'views/includes/header.php'); ?>
<? include(APPPATH.'views/includes/team-banner.php'); ?>
<div class="container-fluid main-content nomargin">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<? include(APPPATH.'views/includes/left-menu-team.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start team description -->
		<div class="bg-post post-item profile-desc">
			<h4 class="text-center">Deskripsi Team</h4><br/>
			<p>
				halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo halo 
			</p>
			<hr/>
			<a href="#edit-desc" class="popup-edit-desc"><button type="button" class="btn btn-inverse">Edit</button></a>
			<div class="clearfix"> </div>
		</div>
		<!-- end team description -->

		<!-- start team members -->
		<div class="bg-post post-item profile-members">
			<h4 class="text-center">Anggota</h4><br/>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
					<img src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr/>
				<a href="#add-member" class="popup-add-member"><button type="button" class="btn btn-inverse">Tambah Anggota</button></a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- end team members -->
	</div>
</div>
<div id="edit-desc" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<div id="add-member" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<? include(APPPATH.'views/includes/footer.php'); ?>
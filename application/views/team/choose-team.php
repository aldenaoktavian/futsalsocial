<? include(APPPATH.'views/includes/header.php'); ?>
<? include(APPPATH.'views/includes/team-challenge.php'); ?>
<div class="container-fluid main-content nomargin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		<div class="challenge-step">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item active">
				Pilih Tim
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12" style="margin-top: 8px;">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item">
				Tanggal & Lapangan
			</div>
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="clearfix"> </div>
		</div>

		<!-- start column -->
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-post challenge-item">
			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
				<img class="img-circle" src="<?=base_url()?>uploadfiles/member-images/profil.jpg">
				<h4>Team Coba</h4>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs challenge-vs">VS</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
				<div class="img-circle pilih-tim">+</div>
				<!--h4>Team Coba</h4-->
				<a href="#list-team" class="popup-list-team"><button type="button" class="btn btn-primary">Pilih Tim</button>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
			<div class="clearfix"> </div>
			<hr/><br/>
			<a href="<?=base_url()?>challenge/pilihtanggal"><button type="button" class="btn btn-default">Next</button>
		</div>
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<!-- end column -->
	</div>
</div>
<div id="list-team" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<? include(APPPATH.'views/includes/footer.php'); ?>
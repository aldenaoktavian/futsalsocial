<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-challenge.php'); ?>
<div class="container-fluid main-content nomargin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		<div class="challenge-step">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item active" id="first-step">
				Pilih Tim
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12" style="margin-top: 8px;">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item" id="second-step">
				Tanggal & Lapangan
			</div>
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="clearfix"> </div>
		</div>

		<!-- start column -->
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-post challenge-item" id="challenge-content">
			<div id="detail-challenge"></div>
			<hr/><br/>
			<button type="button" class="btn btn-default hidden" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtim')" id="back">Back</button>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtanggal')" id="next">Next</button>
		</div>
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<!-- end column -->
	</div>
</div>
<script type="text/javascript">
$( document ).ready(function(){
	$('#detail-challenge').load("<?php echo base_url().'challenge/pilihtim'; ?>");
});
function reload_detail_challenge(url){
	$('#detail-challenge').load(url);
}
$('#back').click(function(){
	$('#first-step').addClass('active');
	$('#second-step').removeClass('active');
	$('#challenge-content').addClass('challenge-item');
});
$('#next').click(function(){
	$('#first-step').removeClass('active');
	$('#challenge-content').removeClass('challenge-item');
	$('#second-step').addClass('active');
	$('#back').removeClass('hidden');
});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
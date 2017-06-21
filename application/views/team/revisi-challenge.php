<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/revisi-challenge.php'); ?>
<div class="container-fluid main-content nomargin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		<!-- start column -->
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-post challenge-item" id="challenge-content">
			<div style="margin-bottom:50px;">
			    <?php echo $notes_challenge['detail_revisi']; ?>
			</div>
			<div class="clearfix"> </div>
    		<hr/><br/>
    		<button type="button" class="btn btn-default" id="cancel_challenge" >Batalkan Pertandingan</button>
    		<button type="button" class="btn btn-default" >Ganti Jadwal</button>
		</div>
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="clearfix"> </div>
		<!-- end column -->
	</div>
</div>
<script type="text/javascript">
    window.location.href = base_url + 'team/change_schedule';
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
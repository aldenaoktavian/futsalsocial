<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/revisi-challenge.php'); ?>
<?php $sess_newchallenge = $this->session->newchallenge; ?>
<div class="container-fluid main-content nomargin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

		<!-- start column -->
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-post challenge-item" id="challenge-content">
			<?php if($detail_challenge['status_challenge'] == 3){ ?>
				<form action="<?php echo base_url().'challenge/change_schedule/'.$challenge_id; ?>" method="POST">
				<span style="color:red;"><?php echo (isset($message) ? $message : ''); ?></span><br/>
				<br/>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Tanggal Pertandingan</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
						<input id='datepicker' name="challenge_date" type='text' class="form-control" placeholder="Pilih Tanggal" value="<?php echo (isset($sess_newchallenge['search_date']) ? $sess_newchallenge['search_date'] : date('d M Y', strtotime($detail_challenge['challenge_date']))); ?>" />
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Mulai Pertandingan</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
						<select id="search-time" name="start_time" class="form-control">
							<?php for($i=0; $i<=24; $i++){ ?>
							<option value="<?php echo date('H:i', strtotime($i.':00:00')); ?>" <?php echo ((isset($sess_newchallenge['search_time']) && $sess_newchallenge['search_time'] == date('H:i', strtotime($i.':00:00'))) || ($detail_challenge['challenge_time'] == date('H:i', strtotime($i.':00:00'))) ? 'selected' : ''); ?>><?php echo date('H:i', strtotime($i.':00:00')) ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-default" style="margin-bottom: 20px;" id="get-list-area">Ubah Jadwal</button>
				</div>
				<div class="clearfix"> </div>
				</form>
			<?php } else{ ?>
				<span>Maaf, sepertinya challenge tidak sedang dalam  proses perubahan oleh tim Anda.</span><br/><br/><br/>
			<?php } ?>
		</div>
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="clearfix"> </div>
		<!-- end column -->
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
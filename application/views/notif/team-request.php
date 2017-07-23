<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12" style="padding-top: 20px;">
		<h4 style="text-align: center;">Undangan Tim</h4><br/>
		<hr/>
		<div class="text-center">
			<?php if($detail_status == 0){ ?>
				<br/>
				<p>
						<br/>
					<?php 
						if($detail_notif['team_request_status'] == 0){
						echo $detail_notif['notif_detail']; 
					?>
						<a href="<?php echo base_url().'team/profile/'.md5($detail_notif['team_id']) ?>">Lihat profil <?php echo $detail_notif['team_name']; ?></a>
						<br/>
						Apakah Anda ingin bergabung?
						<br/><br/>
						<button type="button" class="btn btn-default request-process" data-request="<?php echo md5($detail_notif['team_request_id']); ?>" data-status="1">Ya</button>
						<button type="button" class="btn btn-default request-process" data-request="<?php echo md5($detail_notif['team_request_id']); ?>" data-status="2">Tidak</button>
					<?php
						} else if($detail_notif['team_request_status'] == 1){
					?>
						Anda telah bergabung dengan "<?php echo $detail_notif['team_name']; ?>".<br/>
						<a href="<?php echo base_url().'team/profile/'.md5($detail_notif['team_id']) ?>">Lihat profil <?php echo $detail_notif['team_name']; ?></a>
					<?php
						} else{
					?>
						Anda menolak undangan permintaan bergabung dari "<?php echo $detail_notif['team_name']; ?>".<br/>
						<a href="<?php echo base_url().'team/profile/'.md5($detail_notif['team_id']) ?>">Lihat profil <?php echo $detail_notif['team_name']; ?></a>
					<?php
						}
					?>
				</p>
			<?php } else{ ?>
				<br/>
				<p>
						<br/>
					<?php 
						if($detail_notif['team_request_status'] == 1){
					?>
						<?php echo $detail_notif['member_name']; ?> telah bergabung dengan "<?php echo $detail_notif['team_name']; ?>".
					<?php
						} else{
					?>
						<?php echo $detail_notif['member_name']; ?> menolak undangan permintaan bergabung dari "<?php echo $detail_notif['team_name']; ?>".
					<?php
						}
					?>
				</p>
			<?php } ?>
		</div>
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
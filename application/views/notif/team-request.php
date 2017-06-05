<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
<script type="text/javascript">
/* start request process */
$('.request-process').click(function(){
	var team_request_id = $(this).attr('data-request');
	var team_request_status = $(this).attr('data-status');
	$.post(base_url + "team/add_member_process",
	{
	  team_request_id: team_request_id,
	  team_request_status: team_request_status
	},
	function(data,status){
		window.location.href = base_url + data;
	});
});
/* end request process */
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
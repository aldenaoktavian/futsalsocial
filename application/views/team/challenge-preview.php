<?php
	$inviter_team_image = ($inviter_team['team_image'] ? $inviter_team['team_image'] : 'no-img-profil.png');
	if(isset($rival_team)){
		$rival_team_image = ($rival_team['team_image'] ? $rival_team['team_image'] : 'no-img-profil.png');
	}
?>
<?php $sess_newchallenge = $this->session->newchallenge; ?>
			<div style="height: 50px;"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
				<img class="img-circle" src
				="<?php echo base_url().'uploadfiles/team-images/'.$inviter_team_image; ?>">
				<h5><?php echo $inviter_team['team_name']; ?></h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<br/>
				<span class="challenge-vs">VS</span><br/><br/>
				<p>
					<?php echo 'Tanggal '.$challenge_date.
								'<br/> Jam '.$challenge_time.
								'<br/> di '.$lapangan['nama_lapangan'].
								'<br/> '.$lapangan['daerah'].', '.$lapangan['kota']; 
					?>
				</p>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
				<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$rival_team_image; ?>">
				<h5><?php echo $rival_team['team_name']; ?></h5>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
			<div class="clearfix"> </div>
			<div style="height: 80px;"></div>
			<hr/><br/>
			<?php if(isset($sess_newchallenge['challenge_id'])){ ?>
				<button type="button" class="btn btn-default" onclick="window.location.href = '<?php echo base_url().'challenge/change_schedule/'.md5($sess_newchallenge['challenge_id']); ?>'" id="next">Back</button>
				<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/update_challenge')" id="next">Update Challenge</button>
			<?php } else{ ?>
				<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtanggal')" id="next">Back</button>
				<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/create_challenge')" id="next">Finish</button>
			<?php } ?>
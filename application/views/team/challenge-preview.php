<?php
	$inviter_team_image = ($inviter_team['team_image'] ? $inviter_team['team_image'] : 'no-img-profil.png');
	if(isset($rival_team)){
		$rival_team_image = ($rival_team['team_image'] ? $rival_team['team_image'] : 'no-img-profil.png');
	}
?>
			<div style="height: 50px;"></div>
			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
				<img class="img-circle" src
				="<?php echo base_url().'uploadfiles/team-images/'.$inviter_team_image; ?>">
				<h4><?php echo $inviter_team['team_name']; ?></h4>
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
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
				<?php if(isset($rival_team)){ ?>
					<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$rival_team_image; ?>">
					<h4><?php echo $rival_team['team_name']; ?></h4><br/>
				<?php } else{ ?>
					<div class="img-circle pilih-tim">+</div>
				<?php } ?>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
			<div class="clearfix"> </div>
			<div style="height: 80px;"></div>
			<hr/><br/>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtanggal')" id="next">Back</button>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/create_challenge')" id="next">Finish</button>
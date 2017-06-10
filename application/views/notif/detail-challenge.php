<div id="area-challenge">
    <div style="height: 50px;"></div>
    <?php if($status_challenge == 0){ ?>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<img class="img-circle" src
    		="<?php echo base_url().'uploadfiles/team-images/'.$inviter_team_image; ?>" style="width: 100%;max-width: 100px;margin-bottom: 15px;"><br/>
    		<h4><?php echo $inviter_team_name; ?></h4>
    	</div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<br/>
    		<span class="challenge-vs">VS</span><br/><br/>
    		<p>
    			<?php echo 'Tanggal '.$challenge_date.
    						'<br/> Jam '.$challenge_time.
    						'<br/> di '.$nama_lapangan.
    						'<br/> '.$lapangan_daerah.', '.$lapangan_kota; 
    			?>
    		</p>
    	</div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$rival_team_image; ?>" style="width: 100%;max-width: 100px;margin-bottom: 15px;"><br/>
    		<h4><?php echo $rival_team_name; ?></h4>
    	</div>
    	<div class="clearfix"> </div>
    	<div style="height: 80px;"></div>
    	<hr/><br/>
    	<div class="text-center">
    		<button type="button" class="btn btn-default" id="tolak">Tolak</button>
    		<button type="button" class="btn btn-default" id="revisi">Minta Revisi</button>
    		<button type="button" class="btn btn-default" id="setuju">Setuju</button>
    	</div>
    <?php } else{ ?>
        <p class="text-center"><?php echo $message; ?></p>
    <?php } ?>
</div>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
<script type="text/javascript">
	$('#revisi').click(function(){
		var challenge_id = '<?php echo $challenge_id; ?>';
		var rival_team_id = '<?php echo $rival_team_id; ?>';
		$.post(base_url + "challenge/revisi",
		{
		  challenge_id: challenge_id,
		  rival_team_id: rival_team_id
		},
		function(data,status){
			$('#area-challenge').html(data);
		});
	});
	$('#tolak').click(function(){
		var challenge_id = '<?php echo $challenge_id; ?>';
		var rival_team_id = '<?php echo $rival_team_id; ?>';
		$.post(base_url + "challenge/decline",
		{
		  challenge_id: challenge_id,
		  rival_team_id: rival_team_id
		},
		function(data,status){
			$('#area-challenge').html(data);
		});
	});
    $('#setuju').click(function(){
        var challenge_id = '<?php echo $challenge_id; ?>';
        var rival_team_id = '<?php echo $rival_team_id; ?>';
        $.post(base_url + "challenge/accept",
        {
          challenge_id: challenge_id,
          rival_team_id: rival_team_id
        },
        function(data,status){
            $('#area-challenge').html(data);
        });
    });
</script>
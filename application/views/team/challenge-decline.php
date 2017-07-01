<style type="text/css">
span{
	font-size: 14px;
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h4>Tolak Challenge</h4><br/>
	<hr/>
	<div id="area-decline" class="text-center" style="margin-top:15px;">
	    <span id="message" style="color:red;"></span><br/>
		<span>Silahkan memasukkan password team Anda, agar kami tahu Anda benar berhak untuk melakukan tindakan ini</span><br/>
		<input type="password" class="form-control" id="pass_team" placeholder="Masukkan Kata Sandi Tim Anda . . ." style="max-width:500px;margin: auto;"><br/>
		<button type="button" class="btn btn-default" id="tolak_challenge">Tolak Challenge</button>
	</div>
</div>
<script type="text/javascript">
    $('#tolak_challenge').click(function(){
		var pass_team = $('#pass_team').val();
		$.post(base_url + "challenge/decline_save",
		{
		  challenge_id: '<?php echo $challenge_id; ?>',
		  team_id: '<?php echo $team_id; ?>',
		  pass_team: pass_team
		},
		function(data,status){
			data = $.parseJSON(data);
			if(data.status == 1){
				emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
			    $('#area-decline').html(data.message);
			} else{
			    $('#message').html(data.message);
			}
		});
	});
</script>
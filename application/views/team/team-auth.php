<style type="text/css">
span{
	font-size: 14px;
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h4>Go To My Team Page</h4><br/>
	<hr/>
	<div id="area-team-auth" class="text-center">
	    <span id="message" style="color:red;"></span><br/>
		<span>
			Anda akan diarahkan ke halaman Team Anda<br/>
			ini memerlukan Anda untuk memasukkan kata sandi tim Anda<br/>
			untuk menjaga keamanan data tim Anda, Terimakasih.
		</span><br/><br/>
		<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$data_team['team_image']; ?>" style="width: 100%; max-width: 100px;"><br/><br/>
		<input type="password" class="form-control" id="pass_team" placeholder="Masukkan Kata Sandi Tim Anda . . ." style="max-width:300px;margin: auto;"><br/>
		<button type="button" class="btn btn-default" id="masuk_team">Masuk</button>
	</div>
</div>
<script type="text/javascript">
    $('#masuk_team').click(function(){
		var pass_team = $('#pass_team').val();
		$.post(base_url + "team/myteam",
		{
		  pass_team: pass_team
		},
		function(data,status){
			console.log(data);
			data = $.parseJSON(data);
			if(data.status == 0){
			    $('#message').html(data.message);
			} else{
				window.location.href = base_url + data.url_redirect;
			}
		});
	});
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
<style type="text/css">
span{
	font-size: 14px;
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h4>Revisi Challenge</h4><br/>
	<hr/>
	<div id="area-revisi" class="text-center" style="margin-top:15px;">
	    <span id="message" style="color:red;"></span><br/>
		<span>Anda akan meminta revisi terhadap challenge ini</span><br/>
		<textarea class="form-control" id="pesan_revisi" placeholder="Masukkan Pesan Anda . . ." style="max-width:500px;margin: auto;resize: none;"></textarea><br/>
		<span>dan silahkan memasukkan password team Anda, agar kami tahu Anda benar berhak untuk melakukan tindakan ini</span><br/>
		<input type="password" class="form-control" id="pass_team" placeholder="Masukkan Kata Sandi Tim Anda . . ." style="max-width:500px;margin: auto;"><br/>
		<button type="button" class="btn btn-default" id="kirim_revisi">Kirim Revisi</button>
	</div>
</div>
<script type="text/javascript">
    $('#kirim_revisi').click(function(){
		var pesan_revisi = $('#pesan_revisi').val();
		var pass_team = $('#pass_team').val();
		$.post(base_url + "challenge/revisi_save",
		{
		  challenge_id: '<?php echo $challenge_id; ?>',
		  team_id: '<?php echo $team_id; ?>',
		  pesan_revisi: pesan_revisi,
		  pass_team: pass_team
		},
		function(data,status){
			data = $.parseJSON(data);
			if(data.status == 1){
				emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
			    $('#area-revisi').html(data.message);
			} else{
			    $('#message').html(data.message);
			}
		});
	});
</script>
<?php
	unset($_SESSION['new_notif_updates_count']);
	unset($_SESSION['data_socket']);
?>
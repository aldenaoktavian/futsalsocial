<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Pilih Tim Lawan</h3>
	<hr/>
	<form action="<?php echo base_url(); ?>team/save_edit_desc">
		<br/>
		<input class="form-control" type="text" name="search_team" id="search_team" value="" placeholder="Cari . . ." /><br/>

		<!-- start list member terdaftar -->
		<?php
			foreach($list_other_team as $list_team){
				$team_image = ($list_team['team_image'] ? $list_team['team_image'] : 'no-img-profil.png');
		?>
		<div class="bg-post member-item">
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<img class="img-circle hidden-xs" src="<?php echo base_url().'uploadfiles/team-images/'.$team_image; ?>">
				<span><?php echo $list_team['team_name']; ?></span>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
				<button type="button" class="btn btn-primary add-team" data-id="<?php echo md5($list_team['team_id']); ?>">Tambah</button>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php
			}
		?>
		<!-- end list member terdaftar -->

		<!--Deskripsi Team
		<textarea class="form-control" name="team_desc" id="team_desc" style="height: 200px;resize: none;"></textarea><br/>
		<button type="submit" class="btn btn-primary" style="float: right;">Update</button>-->
		<div class="clearfix"> </div>
	</form>
</div>
<script type="text/javascript">
/* start add rival team */
$('.add-team').click(function(){
	var rival_team_id = $(this).attr('data-id');
	$.post(base_url + "challenge/add_rival_team",
	{
	  rival_team_id: rival_team_id
	},
	function(data,status){
		$('.mfp-close').trigger('click');
	});
});

$('.mfp-close').click(function(){
	reload_detail_challenge("<?php echo base_url().'challenge/pilihtim'; ?>");
});
/* end add rival team */
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
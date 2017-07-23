<style type="text/css">
	.btn {
		margin-right: 5px;
	}
	.bg-post {
		padding: 5px;
	}
</style>
<div id="list_team" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Pilih Tim Lawan</h3>
	<hr/>
	<br/>
	<input class="form-control" type="text" name="search_team" id="search_team" value="" placeholder="Cari . . ." /><br/>

	<div id="list-rival-team">
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
				<button type="button" class="btn btn-primary add-team" onclick="add_team(this)" data-id="<?php echo md5($list_team['team_id']); ?>">Tambah</button>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php
			}
		?>
		<!-- end list member terdaftar -->
		<?php echo $pagination; ?>
	</div>

	<div class="clearfix"> </div>
</div>
<script type="text/javascript">
/* start add rival team */
function add_team(e){
    var rival_team_id = $(e).attr('data-id');
	$.post(base_url + "challenge/add_rival_team",
	{
	  rival_team_id: rival_team_id
	},
	function(data,status){
		$('.mfp-close').trigger('click');
	});
}

$('.mfp-close').click(function(){
	reload_detail_challenge("<?php echo base_url().'challenge/pilihtim'; ?>");
});
/* end add rival team */

/* start search member */
$('#search_team').on('keydown', function(e){
	if(e.which == 13){
		var search_keyword = $(this).val();
		$.post(base_url + "challenge/list_team",
		{
		  search_keyword: search_keyword
		},
		function(data,status){
			$('#list-rival-team').html(data);
		});
	}
});
/* end search member */
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
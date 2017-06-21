<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Tambah Anggota</h3>
	<hr/>
	<br/>
	<input class="form-control" type="text" name="search_member" id="search_member" value="" placeholder="Cari . . ." /><br/>

	<!-- start list member terdaftar -->
	<div id="list-member-no-team">
	<?php
		foreach($member_no_team as $list_member){
			$member_image = ($list_member['member_image'] ? $list_member['member_image'] : 'no-img-profil.png');
	?>
		<div class="bg-post member-item">
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<img class="img-circle hidden-xs" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>">
				<span><?php echo $list_member['member_name']; ?></span>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
				<button type="button" class="btn btn-primary add-member-team" onclick="add_member_team(this)" data-id="<?php echo md5($list_member['member_id']); ?>" data-team="<?php echo $team_id; ?>">Tambah</button>
			</div>
			<div class="clearfix"> </div>
		</div>
	<?php
		}
	?>
	</div>
	<!-- end list member terdaftar -->

	<div class="clearfix"> </div>
</div>
<script type="text/javascript">
/* start add new team member */
function add_member_team(e){
    var team_id = $(e).attr('data-team');
	var member_id = $(e).attr('data-id');
	$.post(base_url + "team/add_member_save",
	{
	  team_id: team_id,
	  member_id: member_id
	},
	function(data,status){
		window.location.href = base_url + data;
	});
}
/* end add new team member */

/* start search member */
$('#search_member').on('keydown', function(e){
	if(e.which == 13){
		var team_id = '<?php echo $team_id; ?>';
		var search_keyword = $(this).val();
		$.post(base_url + "team/add_member",
		{
		  team_id: team_id,
		  search_keyword: search_keyword
		},
		function(data,status){
			$('#list-member-no-team').html(data);
		});
	}
});
/* end search member */
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
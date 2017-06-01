<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Edit Deskripsi Team</h3>
	<hr/>
	<form action="<?=base_url()?>team/save_edit_desc">
		<br/>
		Nama Team
		<input class="form-control" type="text" name="team_name" id="team_name" value="" /><br/>
		Deskripsi Team
		<textarea class="form-control" name="team_desc" id="team_desc" style="height: 200px;resize: none;"></textarea><br/>
		<button type="submit" class="btn btn-primary" style="float: right;">Update</button>
		<div class="clearfix"> </div>
	</form>
</div>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
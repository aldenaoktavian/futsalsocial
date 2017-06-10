<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Comment</h3>
	<hr/>
	<div id="comment-list">
		<?php 
			foreach($challenge_comment as $data){ 
			$member_image = ($data['member_image'] ? $data['member_image'] : 'no-img-profil.png');
		?>
		<div class="post-item" style="margin-top: 15px;">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
				<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>">
			</div>
			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
				<h4><?php echo $data['member_name']; ?></h4>
				<hr/>
				<p>
					<?php echo $data['comment_description']; ?>
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
		<div id="new_member_challenge_comment"></div>
	</div>
	<div class="write-comment">
		<textarea class="form-control" name="new_challenge_comment" id="new_challenge_comment" placeholder="Write a comment . . ."></textarea>
		<input type="hidden">
	</div>
</div>
<script type="text/javascript">
$('#new_challenge_comment').on('keydown', function(e){
	if(!e.shiftKey && e.which == 13){
		$.post(base_url + "team/add_new_comment",
		{
		  new_challenge_comment: $(this).val(),
		  challenge_id: '<?php echo $challenge_id; ?>'
		},
		function(data,status){
			if(status == 'success'){
				$("#new_member_challenge_comment").append(data); 
				$('#new_challenge_comment').val('');
			}
		});
	}
});
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
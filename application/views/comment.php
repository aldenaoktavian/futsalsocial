<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 for-comment">
	<h3>Comment</h3>
	<hr/>
	<div id="comment-list">
		<?php 
			foreach($post_comment as $data){ 
			$member_image = ($data['member_image'] ? $data['member_image'] : 'no-img-profil.png');
		?>
		<div class="post-item" style="margin-top: 15px;">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
				<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>">
			</div>
			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
				<a href="<?php echo base_url().'member/profile/'.md5($data['member_id']); ?>" class="url-color"><h4><?php echo $data['member_name']; ?></h4></a>
				<span class="long-time" title="<?php echo $data['comment_created']; ?>"><?php echo $data['long_time']; ?></span>
				<hr/>
				<p>
					<?php echo $data['comment_description']; ?>
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
		<div id="new_member_post_comment"></div>
	</div>
	<div class="write-comment">
		<textarea class="form-control" onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="new_post_comment" id="new_post_comment" placeholder="Write a comment . . ."></textarea>
		<input type="hidden">
	</div>
</div>
<script type="text/javascript">
$('#new_post_comment').on('keydown', function(e){
	if(!e.shiftKey && e.which == 13){
		$.post(base_url + "social/add_new_comment",
		{
		  new_post_comment: $(this).val(),
		  post_id: '<?php echo $post_id; ?>'
		},
		function(data,status){
			data = $.parseJSON(data);
			if(data.status == 1){
				emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
				document.getElementById('new_post_comment').style.height = "inherit";
				document.getElementById('comment-content').style.height = "inherit";
				$("#new_member_post_comment").append(data.data_html); 
				$('#new_post_comment').val('');
			}
		});
	}
});

function textAreaAdjust(o) {
  o.style.height = "1px";
  document.getElementById('comment-content').style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
  document.getElementById('comment-content').style.height = (document.getElementById('comment-content').scrollHeight)+"px";
}
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
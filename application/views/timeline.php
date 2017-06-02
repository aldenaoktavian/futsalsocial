<? include('includes/header.php'); ?>
<? include('includes/team-rank.php'); ?>
<div class="container-fluid main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<? include('includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start write post -->
		<form id="write-member-post">
			<div class="bg-post write-post">
				<textarea class="form-control" name="new_post" id="new_post" placeholder="Write your post here . . ."></textarea>
				<button type="button" class="btn btn-primary" id="write-member-post-btn">Post</button>
				<div class="clearfix"> </div>
			</div>
		</form>
		<!-- end write post -->

		<!-- start list of post -->
		<div id="new_member_post"></div>
		<?php 
			foreach($all_post as $data){ 
			$member_image = ($data['member_image'] ? $data['member_image'] : 'no-img-profil.png');
		?>
			<div class="bg-post post-item">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
					<img class="img-circle post-img" src="<?=base_url()?>uploadfiles/member-images/<?=$member_image?>">
				</div>
				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
					<h4><?=$data['member_name']?></h4>
					<hr/>
					<p>
						<?=$data['post_description']?>
					</p>
					<a href="#comment-content" class="popup-with-move-anim" data-id="<?=md5($data['post_id'])?>"><button type="button" class="btn btn-inverse">Comment</button></a>
				</div>
				<div class="clearfix"> </div>
			</div>
		<?php } ?>
		<!-- end list of post -->
	</div>
</div>
<div id="comment-content" class="main-content zoom-anim-dialog mfp-hide"></div>
<? include('includes/footer.php'); ?>
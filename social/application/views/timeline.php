<?php include('includes/header.php'); ?>
<?php include('includes/team-rank.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include('includes/left-menu.php'); ?>
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
		<div id="member_post">
			<?php
				foreach($all_post as $data){ 
				$member_image = ($data['member_image'] && file_exists(base_url().'uploadfiles/member-images/'.$data['member_image']) ? base_url().'uploadfiles/member-images/'.$data['member_image'] : base_url().'uploadfiles/member-images/no-img-profil.png');
			?>
				<div class="bg-post post-item">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
						<img class="img-circle post-img" src="<?php echo $member_image; ?>">
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<a href="<?php echo base_url().'member/profile/'.md5($data['member_id']); ?>" class="url-color"><h4><?php echo $data['member_name']; ?></h4></a>
						<span class="long-time" title="<?php echo $data['post_created']; ?>"><?php echo $data['long_time']; ?></span>
						<hr/>
						<p>
							<?php echo $data['post_description']; ?>
						</p>
						<a href="#comment-content" class="popup-with-move-anim" data-id="<?php echo md5($data['post_id']); ?>"><button type="button" class="btn btn-inverse">Comment</button></a>
					</div>
					<div class="clearfix"> </div>
				</div>
			<?php } ?>
		</div>
		<!-- end list of post -->
	</div>
</div>
<div id="comment-content" class="main-content zoom-anim-dialog mfp-hide"></div>
<?php include('includes/footer.php'); ?>
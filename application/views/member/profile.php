<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/member-banner.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-member.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<?php
			foreach($member_post_list as $data){ 
			$member_image = ($data['member_image'] ? $data['member_image'] : 'no-img-profil.png');
		?>
			<div class="bg-post post-item">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
					<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>">
				</div>
				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
					<a href="<?php echo base_url().'member/profile/'.$this->uri->segment(3); ?>" class="url-color"><h4><?php echo $data['member_name']; ?></h4></a>
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
</div>
<div id="comment-content" class="main-content zoom-anim-dialog mfp-hide"></div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
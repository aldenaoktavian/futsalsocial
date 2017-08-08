		<?php
			foreach($new_all_post as $data){ 
			$member_image = ($data['member_image'] ? $data['member_image'] : 'no-img-profil.png');
		?>
			<div class="bg-post post-item">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nopadding">
					<img class="img-circle post-img" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>">
				</div>
				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 nopadding">
					<a href="<?php echo base_url().'member/profile/'.md5($data['member_id']); ?>" class="url-color"><h4><?php echo $data['member_name']; ?></h4></a>
					<hr/>
					<p>
						<?php echo $data['post_description']; ?>
					</p>
					<a href="#comment-content" class="popup-with-move-anim" data-id="<?php echo md5($data['post_id']); ?>"><button type="button" class="btn btn-inverse">Comment</button></a>
				</div>
				<div class="clearfix"> </div>
			</div>
		<?php } ?>
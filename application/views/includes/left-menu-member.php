<div class="bg-post" style="padding: 20px;">
	Nama:<br/>
	<?php echo $member_name; ?><br/><br/>
	Bergabung dengan tim:<br/>
	<?php echo $team_name; ?>
</div>
<br/>
<div class="bg-post" style="padding: 20px;">
	<h5 style="margin-bottom: 10px;font-weight: bold;">Teman ( <?php echo count($member_friend_list); ?> )</h5>
	<hr/>
	<div class="container-fluid" style="padding: 10px 0px;">
		<?php 
		foreach($member_friend_list as $list){ 
		$member_image = ($list['member_image'] ? $list['member_image'] : 'no-banner.jpg');
		?>
			<div class="col-md-3" style="padding: 0px 5px;">
				<a href="<?php echo base_url().'member/profile/'.md5($list['member_id']); ?>"><img src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>" width="100%" /></a>
			</div>
		<?php } ?>
	</div>
</div>
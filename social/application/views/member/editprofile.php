<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/member-banner.php'); ?>
<div class="container main-content nomargin">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-member.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<form action="<?php echo base_url().'member/editprofile'; ?>" method="POST">
			<br/>
			<?php if(isset($message)){ ?>
				<span style="color:red;"><?php echo $message; ?></span><br/><br/>
			<?php } ?>
			Name
			<input class="form-control" type="text" name="member_name" id="member_name" placeholder="Name" value="<?php echo $data_member['member_name'] ?>" /><br/>
			Username
			<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php echo $data_member['username'] ?>" /><br/>
			Email
			<input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo $data_member['email'] ?>" /><br/>
			<button type="submit" class="btn btn-primary" style="float: right;">Update</button>
			<div class="clearfix"> </div>
		</form>
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/member-banner.php'); ?>
<div class="container main-content nomargin">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-member.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<form action="<?php echo base_url().'member/ubahpassword'; ?>" method="POST">
			<br/>
			<?php if(isset($message)){ ?>
				<span style="color:red;"><?php echo $message; ?></span><br/><br/>
			<?php } ?>
			Password Lama
			<input class="form-control" type="password" name="old_pass" id="old_pass" placeholder="Password Lama" /><br/>
			Password Baru
			<input class="form-control" type="password" name="new_pass" id="new_pass" placeholder="Password Baru" /><br/>
			Konfirmasi Password Baru
			<input class="form-control" type="password" name="confirm_new_pass" id="confirm_new_pass" placeholder="Konfirmasi Password Baru" /><br/>
			<button type="submit" class="btn btn-primary" style="float: right;">Update</button>
			<div class="clearfix"> </div>
		</form>
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
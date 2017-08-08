<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-banner.php'); ?>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-team.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<!-- start top column -->
		<div class="bg-post statistic-data">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center statistic-item">
				<div class="item-number">
					<span><?php echo $statistic['all_challenge']; ?></span>
				</div>
				<h4>Jumlah Pertandingan</h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center statistic-item">
				<div class="item-number">
					<span><?php echo $statistic['win_challenge']; ?></span>
				</div>
				<h4>Jumlah Menang</h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center statistic-item">
				<div class="item-number">
					<span><?php echo $statistic['lose_challenge']; ?></span>
				</div>
				<h4>Jumlah Kalah</h4>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- end top column -->

		<!-- start top column -->
		<div class="bg-post statistic-data">
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center statistic-item">
				<div class="item-number">
					<span><?php echo $statistic['team_rangking']; ?></span>
				</div>
				<h4>Rangking</h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center statistic-item">
				<div class="item-number">
					<span><?php echo $statistic['team_point']; ?></span>
				</div>
				<h4>Point</h4>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"></div>
			<div class="clearfix"> </div>
		</div>
		<!-- end top column -->
	</div>
</div>
<?php include(APPPATH.'views/includes/footer.php'); ?>
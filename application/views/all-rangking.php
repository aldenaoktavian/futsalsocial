<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<style type="text/css">
	.team_rank {
		text-align: center;
		padding: 0px 5px;
		min-height: 190px;
		margin: 0px 10px;
	}
	.team_item {
		background-color: #fff;
		padding: 10px;
		min-height: 168px;
	    border-radius: 3px;
	    border: solid 1px #e0e0e0;
	    margin: 0px 3px;
	}
	.team_item img {
		width: 60px;
	}
	.team_item h2 {
		margin: 10px;
	}
</style>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top: 20px;">
		<input class="form-control" type="text" name="search" id="search" value="<?php echo $search_keyword; ?>" style="width: 40%;float: right;margin-bottom: 20px;" placeholder="Cari . . ." /><br/>
		<div class="clearfix"></div>
		<div id="team_rangking" style="width: 100%;">
		<?php 
			foreach($all_rangking as $data){ 
		?>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 team_rank nopadding">   
		        <a href="<?php echo base_url().'team/profile/'.md5($data['team_id']); ?>" class="url-color">
		        	<div class="team_item">                  
			            <img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$data['team_image']; ?>" alt="">
			            <h2><?php echo $data['rangking']; ?></h2>
			            <h5><?php echo $data['team_name']; ?></h5>
			        </div>
		        </a>
	        </div>
	    <?php } ?>
    	</div>
    	<div class="clearfix"></div>
    	<?php echo $pagination; ?>
	</div>
</div>
<script type="text/javascript">
	$('#search').on('keydown', function(e){
		if(e.which == 13){
			var search_keyword = $(this).val();
			load_pagination(search_keyword, base_url + 'social/all_rangking/0/');
		}
	});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<style type="text/css">
	.team_rank {
		text-align: center;
		padding: 0px 5px;
	}
	.team_item {
		background-color: #e3e3e3;
		padding: 10px;
		min-height: 168px;
	}
	.team_item img {
		width: 60px;
	}
	.team_item h2 {
		margin: 10px;
	}
</style>
<div class="container-fluid main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" style="padding-top: 20px;">
		<div id="team_rangking" style="width: 100%;">
		<?php 
			$rangking = $limit + 1;
			foreach($all_rangking as $data){ 
		?>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 team_rank">   
		        <a href="<?php echo base_url().'team/profile/'.md5($data['team_id']); ?>" class="url-color">
		        	<div class="team_item">                  
			            <img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$data['team_image']; ?>" alt="">  
			            <h2><?php echo $rangking; ?></h2>
			            <h5><?php echo $data['team_name']; ?></h5>
			        </div>
		        </a>
	        </div>
	    <?php $rangking++; } ?>
    	</div>
    	<div class="clearfix"></div>
    	<div id="pagination" class="<?php echo ($pages == 1 ? 'hidden' : ''); ?>" style="margin-bottom: 20px; margin-top: 20px;">
            <button type="button" class="btn btn-default"><<</button>
            <?php 
                for($numb=1; $numb<=$pages; $numb++){ 
                    $curr_page = 0 + ($currentPage / $offset);
            ?>
                <button type="button" onclick="load_page('<?php echo base_url().'social/all_rangking/'.$numb.'/'; ?>')" class="btn btn-<?php echo ($numb-1 == (int)$curr_page ? 'reverse' : 'default'); ?> btn-page"><?php echo $numb; ?></button>
            <?php } ?>
            <button type="button" class="btn btn-default">>></button>
        </div>
	</div>
</div>
<script type="text/javascript">
	function load_page(url){
		window.location.href = url;
	}
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
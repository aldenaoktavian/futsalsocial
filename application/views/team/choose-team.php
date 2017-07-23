<?php
	$inviter_team_image = ($inviter_team['team_image'] ? $inviter_team['team_image'] : 'no-img-profil.png');
	if(isset($rival_team)){
		$rival_team_image = ($rival_team['team_image'] ? $rival_team['team_image'] : 'no-img-profil.png');
	}
?>
			<div style="height: 50px;"></div>
			<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
				<img class="img-circle" src
				="<?php echo base_url().'uploadfiles/team-images/'.$inviter_team_image; ?>">
				<h5><?php echo $inviter_team['team_name']; ?></h5>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs challenge-vs">VS</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
				<?php if(isset($rival_team)){ ?>
					<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$rival_team_image; ?>">
					<h5><?php echo $rival_team['team_name']; ?></h5><br/>
				<?php } else{ ?>
					<div class="img-circle pilih-tim">+</div>
				<?php } ?>
				<!--h4>Team Coba</h4-->
				<a href="#list-team" class="popup-list-team"><button type="button" class="btn btn-primary">Pilih Tim</button></a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"></div>
			<div class="clearfix"> </div>
			<div style="height: 80px;"></div>
			<hr/><br/>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtanggal')" id="next" <?php echo (isset($rival_team) ? '' : 'disabled'); ?>>Next</button>
<script type="text/javascript">
$(document).ready(function(){
	$('#first-step').addClass('active');
	$('#second-step').removeClass('active');
})
/* start pop up list team */
$('.popup-list-team').click(function(){
	$.post(base_url + "challenge/list_team",
	{
	  id: '1'
	},
	function(data,status){
		if(status == 'success'){
			$("#list-team").empty().html(data); 
		}
	});
})
$('.popup-list-team').magnificPopup({
  type: 'inline',

  fixedContentPos: false,
  fixedBgPos: true,
  alignTop: true,

  overflowY: 'auto',

  closeBtnInside: true,
  preloader: false,
  
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-slide-bottom'
});
/* end pop up list team */
</script>
<div id="list-team" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-banner.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
<style type="text/css">
	.bg-post {
		padding-top: 35px;
	}
	.post-item img {
		float: none;
	}
</style>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu-team.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12" id="all_challenge">
	</div>
	<div style="text-align: center;">
		<img id="loader" class="hidden" src="<?php echo base_url().'assets/img/loader.gif'; ?>">
	</div>
<div id="input-score" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<script type="text/javascript">
$(document).ready(function() {
	last_part = url_parts[url_parts.length-1];

	$.get( base_url + "team/load_mychallenge/" + last_part, function( data ) {
		console.log(data);
		$( "#all_challenge" ).append(data);
	});

	var total_page = <?php echo $total_page; ?>;
	var page = 5;
	$(window).scroll(function() {
		if($(window).scrollTop() > $(document).height() - 750) {
			if(page < total_page){
				$('#loader').removeClass('hidden');
				setTimeout(function(){
					$.get( base_url + "team/load_mychallenge/" + last_part + "/"+page, function( data ) {
						$( "#all_challenge" ).append(data);
					});
					$('#loader').addClass('hidden');

						page = page+5;
				}, 3000);
			}
		}
	});
});

/*var app = angular.module('myApp', []);
app.controller('MyCtrl', function($scope, $http) {
    $http.get("http://localhost/futsalsocial/team/load_mychallenge/c4ca4238a0b923820dcc509a6f75849b").then(function(response) {
        $scope.all_challenge = response.data;
    });

    $scope.tes = function(){
    	alert('hai');
    }
});*/


</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
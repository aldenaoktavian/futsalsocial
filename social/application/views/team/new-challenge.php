<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-challenge.php'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>
<script type="text/javascript">
var placeSearch, autocomplete;
 
function initialize() {
 
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('search-area')),
      { types: ['geocode'] });
 
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
 
function fillInAddress() {
 
  var place = autocomplete.getPlace().geometry.location;
 
  $('#lng').val(place.lng());
  $('#lat').val(place.lat());
}
 
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>
<div class="container main-content">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		<div class="challenge-step">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item active" id="first-step">
				Pilih Tim
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12" style="margin-top: 8px;">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs12 step-item" id="second-step">
				Tanggal & Lapangan
			</div>
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="clearfix"> </div>
		</div>

		<!-- start column -->
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs"></div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 bg-post challenge-item" id="challenge-content">
			<div id="detail-challenge"></div>
		</div>
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs"></div>
		<!-- end column -->
	</div>
</div>
<script type="text/javascript">
$( document ).ready(function(){
	$('#detail-challenge').load("<?php echo base_url().'challenge/pilihtim'; ?>");
});
function reload_detail_challenge(url){
	$('#detail-challenge').load(url);
}
$('#back').click(function(){
	$('#challenge-content').addClass('challenge-item');
});
$('#next').click(function(){
	$('#challenge-content').removeClass('challenge-item');
});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
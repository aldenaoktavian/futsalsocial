<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-challenge.php'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>
<script type="text/javascript">
var placeSearch, autocomplete;
/*var componentForm = {
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_2: 'short_name',
  country: 'long_name'
};*/
 
function initialize() {
 
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('search-area')),
      { types: ['geocode'] });
 
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
 
 
/*function fillInAddress() {
 
  var place = autocomplete.getPlace();
 
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }
 
 
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    console.log(addressType);
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}*/
 
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
<div class="container-fluid main-content nomargin">
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
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-post challenge-item" id="challenge-content">
			<div id="detail-challenge"></div>
		</div>
		<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
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
	$('#first-step').addClass('active');
	$('#second-step').removeClass('active');
	$('#challenge-content').addClass('challenge-item');
});
$('#next').click(function(){
	$('#first-step').removeClass('active');
	$('#challenge-content').removeClass('challenge-item');
	$('#second-step').addClass('active');
	$('#back').removeClass('hidden');
});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
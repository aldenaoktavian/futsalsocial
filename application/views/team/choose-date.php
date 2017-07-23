<?php $sess_newchallenge = $this->session->newchallenge; ?>
<style type="text/css">
	.form-control {
		font-size: 12px;
	}
	.nomargin {
		padding: 0px 3px;
	}
</style>
<script type="text/javascript">
	$('#datepicker').datepicker({
	    format: 'mm/dd/yyyy',
	    startDate: 'd'
	});
</script>
<link href="<?php echo base_url(); ?>assets/css/nouislider.min.css" rel="stylesheet">

			<br/>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nomargin">
				<div id="locationField">
					<input type="text" class="form-control" placeholder="Masukkan Nama Daerah" id="search-area" onFocus="geolocate()" value="<?php echo (isset($sess_newchallenge['search_area']) ? $sess_newchallenge['search_area'] : ''); ?>" />
                </div>
                <input type="hidden" id="lng" value="<?php echo (isset($sess_newchallenge['search_lng']) ? $sess_newchallenge['search_lng'] : ''); ?>" readonly>
                <input type="hidden" id="lat" value="<?php echo (isset($sess_newchallenge['search_lat']) ? $sess_newchallenge['search_lat'] : ''); ?>" readonly>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nomargin">
				<input id='datepicker' type='text' class="form-control" placeholder="Pilih Tanggal" value="<?php echo (isset($sess_newchallenge['search_date']) ? $sess_newchallenge['search_date'] : ''); ?>" />
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nomargin">
				<select id="search-time" class="form-control">
					<?php for($i=0; $i<=24; $i++){ ?>
					<option value="<?php echo date('H:i', strtotime($i.':00:00')); ?>" <?php echo (isset($sess_newchallenge['search_time']) && $sess_newchallenge['search_time'] == date('H:i', strtotime($i.':00:00')) ? 'selected' : ''); ?>><?php echo date('H:i', strtotime($i.':00:00')) ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nomargin" style="padding-top: 7px;padding-left: 20px;">
				<div id="slider-range" class="noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;"></div>
				<span id="slider-range-value">1</span><span> Jam</span>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" class="btn btn-default" style="margin-bottom: 20px;" id="get-list-area">Cari Lapangan</button>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr/>
				<div id="list-lapangan" style="padding-top: 15px;padding-bottom: 15px;"></div>
			</div>
			<div class="clearfix"> </div>
			<hr/><br/>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtim')" id="back">Back</button>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/preview')" id="next" <?php echo (isset($sess_newchallenge['id_tipe']) ? '' : 'disabled'); ?>>Next</button>

<script src="<?php echo base_url(); ?>assets/js/nouislider.min.js"></script>
<script src='<?php echo base_url(); ?>assets/js/wNumb.min.js'></script>
<script type="text/javascript">
var rangeSlider = document.getElementById('slider-range');

noUiSlider.create(rangeSlider, {
	start: <?php echo (isset($sess_newchallenge['search_hour']) ? $sess_newchallenge['search_hour'] : 1); ?>,
	step: 1,
	format: wNumb({
		decimals: 0
	}),
	range: {
	  'min': [ 1 ],
	  'max': [ 5 ]
	}
});

var rangeSliderValueElement = document.getElementById('slider-range-value');

rangeSlider.noUiSlider.on('update', function( values, handle ) {
rangeSliderValueElement.innerHTML = values[handle];
});

$('#get-list-area').click(function(){
	var search_area = $('#search-area').val();
	var search_date = $('#datepicker').val();
	var search_time = $('#search-time').val();
	var search_hour = $('#slider-range-value').html();
	if(search_area != '' && search_date != ''){
		$.post(base_url + "challenge/search_lapangan",
		{
		  search_area: search_area,
		  search_lng: $('#lng').val(),
		  search_lat: $('#lat').val(),
		  search_date: search_date,
		  search_time: search_time,
		  search_hour: search_hour
		},
		function(data,status){
			$('#list-lapangan').html(data);
		});
	} else{
		alert('Pilih daerah dan tanggal terlebih dahulu');
	}
});

$( document ).ready(function(){
	$('#first-step').removeClass('active');
	$('#second-step').addClass('active');
	initialize();
    var search_area = $('#search-area').val();
	var search_date = $('#datepicker').val();
	var search_time = $('#search-time').val();
	var search_hour = $('#slider-range-value').html();
	if(search_area != '' && search_date != ''){
		$.post(base_url + "challenge/search_lapangan",
		{
		  search_area: search_area,
		  search_lng: $('#lng').val(),
		  search_lat: $('#lat').val(),
		  search_date: search_date,
		  search_time: search_time,
		  search_hour: search_hour
		},
		function(data,status){
			$('#list-lapangan').html(data);
		});
	} else{
		$('#list-lapangan').html('Tentukan lokasi, tanggal, jam mulai dan lama pertandingan terlebih dahulu.');
	}
});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
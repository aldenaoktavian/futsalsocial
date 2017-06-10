<link href="<?php echo base_url(); ?>assets/css/nouislider.min.css" rel="stylesheet">
			<br/>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nomargin">
				<input type="text" class="form-control" placeholder="Pilih Daerah" id="search-area" />
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nomargin">
				<input id='datetimepicker' type='text' class="form-control" placeholder="Pilih Tanggal dan Waktu" />
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nomargin" style="padding-top: 7px;">
				<div id="slider-range" class="noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;"></div>
				<span id="slider-range-value">1</span><span> Jam</span>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" class="btn btn-default" style="margin-bottom: 20px;" id="get-list-area">Cari Lapangan</button>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr/>
				<div id="list-lapangan" style="padding-top: 15px;"></div>
			</div>
			<div class="clearfix"> </div>
			<hr/><br/>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/pilihtim')" id="back">Back</button>
			<button type="button" class="btn btn-default" onclick="reload_detail_challenge('<?php echo base_url(); ?>challenge/preview')" id="next">Next</button>
<div id="list-team" class="main-content zoom-anim-dialog mfp-hide popup-content"></div>
<script src="<?php echo base_url(); ?>assets/js/nouislider.min.js"></script>
<script src='<?php echo base_url(); ?>assets/js/wNumb.min.js'></script>
<script type="text/javascript">
var rangeSlider = document.getElementById('slider-range');

noUiSlider.create(rangeSlider, {
	start: 0,
	step: 1,
	format: wNumb({
		decimals: 0
	}),
	range: {
	  'min': [  1 ],
	  'max': [ 5 ]
	}
});

var rangeSliderValueElement = document.getElementById('slider-range-value');

rangeSlider.noUiSlider.on('update', function( values, handle ) {
rangeSliderValueElement.innerHTML = values[handle];
});

$( function() {
    var availableTags = [
      <?php 
      	foreach($search_area as $list_search){
      		echo '"'.$list_search['value_search'].'",';
      	}
      ?>
    ];
    $( "#search-area" ).autocomplete({
      source: availableTags
    });
} );

$('#get-list-area').click(function(){
	var search_area = $('#search-area').val();
	var search_date = $('#datetimepicker').val();
	var search_hour = $('#slider-range-value').html();
	if(search_area != '' && search_date != ''){
		$.post(base_url + "challenge/search_lapangan",
		{
		  search_area: search_area,
		  search_date: search_date,
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
	$('#list-lapangan').load("<?php echo base_url().'challenge/search_lapangan'; ?>");
});
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
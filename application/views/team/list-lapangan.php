				<?php foreach($result_search_lap AS $list_lapangan){ ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lapangan-item <?php echo (isset($this->session->newchallenge['id_tipe']) && md5($list_lapangan['id_tipe']) == $this->session->newchallenge['id_tipe'] ? 'active' : ''); ?>" id="<?php echo md5($list_lapangan['id_tipe']); ?>">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<img src="<?php echo base_url().'uploadfiles/lapangan.jpg' ?>" />
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-left">
							<h4><?php echo $list_lapangan['nama_lapangan']; ?></h4>
							<h5>Tipe: <?php echo $list_lapangan['nama_tipe']; ?></h5>
							<p><?php echo $list_lapangan['lapangan_deskripsi']; ?></p>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-left lap-price">
							<h4>Rp. <?php echo number_format($list_lapangan['tarif']); ?></h4>
							<button type="button" class="btn btn-default choose-lap" data-id="<?php echo md5($list_lapangan['id_tipe']); ?>" style="width: 100px;">Pilih</button>
						</div>
					</div>
				<?php } ?>
				<?php echo $pagination; ?>
				<script type="text/javascript">
					$('.choose-lap').click(function(){
						var item_id = $(this).attr('data-id');
						var search_area = $('#search-area').val();
                    	var search_date = $('#datepicker').val();
                    	var search_time = $('#search-time').val();
                    	var search_hour = $('#slider-range-value').html();
						$.post(base_url + "challenge/add_lapangan",
						{
						  id_tipe: item_id,
						  search_area: search_area,
						  search_lng: $('#lng').val(),
						  search_lat: $('#lat').val(),
                		  search_date: search_date,
                		  search_time: search_time,
                		  search_hour: search_hour
						},
						function(data,status){
							$("#next").prop('disabled', false);
							$('.lapangan-item').removeClass('active');
							$('#' + item_id).addClass('active');
						});
					});
				</script>
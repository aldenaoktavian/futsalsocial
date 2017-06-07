				<?php foreach($result_search_lap AS $list_lapangan){ ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lapangan-item">
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
							<button type="button" class="btn btn-default" style="width: 100px;">Pilih</button>
						</div>
					</div>
				<?php } ?>
<div class="container-fluid" style="width: 80%;">
		<div class="row">
                <div class="col-md-9">

                    <div class="ibox animated fadeInLeftBig">
                        <div class="ibox-title">
                            <h5>Rincian pesanan</h5>
                        </div>
                        <div class="ibox-content">

						<form action="<?php echo base_url().'c_booking/metode_pembayaran'; ?>" method="POST">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>
		                                    <?php  foreach ($data_tipe_lapangan as $key => $value) { ?>
		                                    <input type="hidden" name="txt_id_tipe" value="<?php echo $value['id_tipe']; ?>">
											<input type="hidden" name="txt_tanggal" value="<?php echo $tanggal; ?>">
											<input type="hidden" name="txt_jam" value="<?php echo $jam; ?>">
											<input type="hidden" name="txt_total" value="<?php echo $value['tarif']; ?>">

		                                    <tr>
		                                        <td width="90">
		                                            <div class="cart-product-imitation" style="background: url(<?php echo base_url().$value['picture']; ?>) center no-repeat;background-size: cover;">
		                                            </div>
		                                        </td>
		                                        <td class="desc">
		                                        	<h2><?php echo ucfirst($value['nama']); ?></h2>
		                                            <h3 class="text-navy">
		                                            
		                                                <?php echo ucfirst($value['nama_tipe']); ?>
		                                           	</h3>
 
		                                            <p class="small">
		                                                It is a long established fact that a reader will be distracted by the readable
		                                                content of a page when looking at its layout. The point of using Lorem Ipsum is
		                                            </p>
		                                            <dl class="small m-b-none">
		                                            	<table>
		                                                	<tr>
		                                                		<td><dt>Lokasi</dt></td>
		                                                		<td><dd><?php echo $value['daerah']; ?></dd></td>
		                                                	</tr>
		                                                	<tr>
		                                                		<td><dt>Tanggal</dt></td>
		                                                		<td><dd><?php echo $tanggal; ?></dd></td>
		                                                	</tr>
		                                                	<tr>
		                                                		<td><dt>Jam</dt></td>
		                                                		<td><dd><?php echo substr_replace($jam, ':', 2, 0).' wib'; ?></dd></td>
		                                                	</tr>
		                                                </table>
		                                            </dl>

		                                        </td>
		                                        <td>
		                                            <h4>
		                                                 <?php echo 'Rp.'.number_format($value['tarif']); ?>
		                                            </h4>
		                                        </td>
		                                    </tr>
		                                <?php } ?>
                                    </tbody>
                                </table>
                            </div>
						

                        </div>
                        
                        <div class="ibox-content">

                            <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Lanjutkan Pemesanan</button>
                            <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Kembali</button>

                        </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Total Pesanan</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                Rp. <?php echo number_format($value['tarif']); ?> 
                            </h2>

                            <hr/>
                            <span class="text-muted small">
                                *For United States, France and Germany applicable sales tax will be applied
                            </span>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">



                            <h3><i class="fa fa-phone"></i> +62 82216173617</h3>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>


                        </div>
                    </div>

                </div>
            </div>
</div>
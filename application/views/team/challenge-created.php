			<div style="height: 50px;"></div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<?php echo $message; ?><br/><br/>
				<a href="<?php echo base_url().'social/timeline'; ?>"><button type="button" class="btn btn-default" id="next">Kembali ke Timeline</button></a>
			</div>
			<div class="clearfix"> </div>
			<div style="height: 80px;"></div>
			<script type="text/javascript">
				$(document).ready(function(){
					var data_notif = <?php echo $data_notif; ?>;
					var data_count_notif = <?php echo $data_count_notif; ?>;
					emit_new_notif(data_notif, data_count_notif);
				});
			</script>
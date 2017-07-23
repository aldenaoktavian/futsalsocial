<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
	<h4><?php echo $popup_title; ?></h4>
	<hr/>
	<div>
		<br/>
		<span id="message"></span>
		<div id="detail">
		<?php 
			echo (isset($friend_request_text) ? $friend_request_text."<br/><br/>" : "").$friend_request; 
		?>
		</div>
	</div>
</div>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>
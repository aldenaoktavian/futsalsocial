<div id="team-auth" class="main-content zoom-anim-dialog mfp-hide popup-content" style="width: 50%;min-height: 430px;"></div>
</body>
<!--script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script-->
<script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/appear.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/showHide.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	emit_new_notif();
});

var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );

socket.on( 'new_notif', function( data ) {
	var active_user_id = <?php echo $this->session->login['id']; ?>;

	if(data.new_member_id == active_user_id){
		$( "#count_unread_message" ).html( data.new_notif_updates_count );
		$( "#dropdown-notif" ).load( base_url + 'notif/load_unread_notif/' + data.new_member_id );
		toastr.info('<a href="' + data.new_notif_url + '" target="_blank" style="text-decoration: underline;">' + data.new_notif_detail + '</a>', '', {timeOut: 500000, positionClass : 'toast-bottom-right'});
	}
});

socket.on( 'new_notif_updates_count', function( data ) {
	var active_user_id = <?php echo $this->session->login['id']; ?>;

	if(data.new_count_member_id == active_user_id){
		$( "#count_unread_message" ).html( data.new_count );
		$( "#dropdown-notif" ).load( base_url + 'notif/load_unread_notif/' + active_user_id );
	}
});

socket.on( 'new_count_all_post', function( data ) {
	toastr.clear();
	var user_count_post = data.new_count_all_post - <?php echo $this->session->post_member_count; ?>;
	var active_user_id = <?php echo $this->session->login['id']; ?>;

	if(data.user_new_post != active_user_id){
		toastr.success('<a href="#" onclick="load_timeline()" style="text-decoration:underline;">' + user_count_post + ' post terbaru</a>', '', {timeOut: 500000, positionClass : 'toast-top-center'});
	}
});

function emit_new_notif(data_notif='', data_count_notif=''){
	var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );

	var data = <?php echo (isset($_SESSION['data_socket']) ? $_SESSION['data_socket'] : 0); ?>;

	if(data_notif != ''){
		data = data_notif;
	}

	if(data != 0){
		for (var i = 0, len = data.length; i < len; i++) {
			socket.emit('new_notif', { 
					new_notif_updates_count: data[i]['new_notif_updates_count'],
					new_notif_detail: data[i]['notif_detail'],
					new_notif_url: data[i]['notif_url'],
					new_member_id: data[i]['member_id']
			    });
		}
	}

	var new_notif_updates_count = <?php echo (isset($_SESSION['new_notif_updates_count']) ? $_SESSION['new_notif_updates_count'] : 0); ?>;

	if(data_count_notif != ''){
		new_notif_updates_count = data_count_notif;
	}

	if(new_notif_updates_count != 0){
		socket.emit('new_notif_updates_count', { 
				new_count: new_notif_updates_count.jml,
				new_count_member_id: new_notif_updates_count.member_id
		  });
	}
};

function load_timeline(){
	window.location.href = base_url + 'social/timeline';
};
</script>
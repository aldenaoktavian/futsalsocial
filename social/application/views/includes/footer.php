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
		$('#count_new_post').html('(' + user_count_post + ')');
		$('#count_new_post').removeClass('hidden');
		toastr.success('<a href="#" onclick="load_timeline()" style="text-decoration:underline;">' + user_count_post + ' post terbaru</a>', '', {timeOut: 500000, positionClass : 'toast-top-center'});
	}
});

socket.on( 'reload_chat_message', function( data ) {
	var check_url = url_parts[url_parts.length-2] + "/" + url_parts[url_parts.length-1];
	var active_user_id = <?php echo $this->session->login['id']; ?>;

	if(check_url == "message/" + data.member_chat_id && active_user_id == data.partner_id){
		load_chat_message(data.member_chat_id);
	} else if(check_url != "message/" + data.member_chat_id && active_user_id == data.partner_id){
		toastr.info('<a href="message/' + data.member_chat_id + '" target="_blank" style="text-decoration: underline;">' + '</a>', '', {timeOut: 500000, positionClass : 'toast-bottom-right'});
	}
});

socket.on( 'new_count_unread_messages', function( data ) {
	var active_user_id = <?php echo $this->session->login['id']; ?>;

	if(data.member_id != active_user_id){
		if(data.new_unread_messages == 0){
			$( "#msg_" + data.member_chat_id ).html( "" );
		} else{
			$( "#msg_" + data.member_chat_id ).html( "(" + data.new_unread_messages + ")" );
		}
		$( "#unread_all_messages" ).html( data.new_unread_all_messages );
	}
});

function load_timeline(){
	window.location.href = base_url + 'social/timeline';
};
</script>
<?php $this->session->unset_userdata('chat'); ?>
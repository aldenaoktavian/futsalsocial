<?php include(APPPATH.'views/includes/header.php'); ?>
<div class="container main-content messages">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 bg-post">
		<input class="form-control" type="text" name="search_team" id="search_team" value="" placeholder="Cari . . ." /><br/>
		 <?php 
		 	foreach($message_list as $msg){ 
		 	$member_image = ($msg['member_image'] ? $msg['member_image'] : 'no-img-profil.png');
		 ?>
			<div class="member_message" onclick="load_chat('<?php echo md5($msg['member_chat_id']); ?>')">
				<div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 nopadding">
					<img class="img-circle" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>" style="width: 100%;max-width: 50px;">
				</div>
				<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 nopadding">
					<h5 class="title"><?php echo $msg['member_name']; ?></h5>
					<h5 id="msg_<?php echo md5($msg['member_chat_id']); ?>"><?php echo $msg['unread_message']; ?></h5>
					<div class="clearfix"></div>
					<p><?php echo $msg['detail_chat']; ?></p>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 nopadding">
					<span><?php echo $msg['chat_time']; ?></span>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 bg-post" style="margin-left: 10px;max-width: 843px;height: 100%;max-height: 520px;">
		<?php if($this->uri->segment(3) == "all"){ ?>
			<h5 style="text-align: center;">Pilih salah satu pesan untuk melihat detailnya.</h5>
		<?php } else{ ?>
		<div id="profile_partner" style="height: 60px;">
			<img class="img-circle" src="<?php echo base_url().'uploadfiles/member-images/'.$partner_detail['member_image']; ?>" style="width: 100%;max-width: 50px;float: left;margin-right: 10px;">
			<h4><?php echo $partner_detail['member_name']; ?></h4>
			<span style="float: left;"><?php echo $last_login; ?></span>
		</div>
		<div id="chat-list" style="height: 383px;overflow-y: scroll;">
			
		</div>
		<div class="write-message">
			<textarea class="form-control" onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="new_chat" id="new_chat" placeholder="Tulis pesan disini . . ."></textarea>
			<input type="hidden">
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	last_part = url_parts[url_parts.length-1];
	load_chat_message(last_part);
});

$('#new_chat').on('keydown', function(e){
	last_part = url_parts[url_parts.length-1];
	if(!e.shiftKey && e.which == 13){
		$.post(base_url + "social/add_new_chat",
		{
		  new_chat: $(this).val(),
		  member_chat_id: last_part
		},
		function(data,status){
			data = $.parseJSON(data);
			if(data.status == 1){
				//emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
				var member_id = <?php echo $partner_detail['member_id']; ?>;
				if($.isArray(member_id)){
					if($.isArray(member_id)){
						for (var i = 0; i < member_id.length; i++) {
							emit_member_chat(last_part, member_id[i]['member_id']);
						}
					}
				} else{
					emit_member_chat(last_part, <?php echo $partner_detail['member_id']; ?>);
				}
				load_chat_message(last_part);
				$('#new_chat').val('');
			}
		});
	}
});

function load_chat(member_chat_id){
	window.location = base_url + "social/message/" + member_chat_id;
}

/*function textAreaAdjust(o) {
  o.style.height = "1px";
  document.getElementById('comment-content').style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
  document.getElementById('comment-content').style.height = (document.getElementById('comment-content').scrollHeight)+"px";
}*/
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>
$(document).ready(function() {
	/* start pop up post comment */
	$('.popup-with-move-anim').on('click', function(event){
		document.getElementById('comment-content').style.height = "inherit";
		var post_id = $(this).attr('data-id');
		$.post(base_url + "social/comment",
		{
		  post_id: post_id
		},
		function(data,status){
			if(status == 'success'){
				$("#comment-content").empty().html(data); 
			}
		});
	})
	$('.popup-with-move-anim').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up post comment */

	/* start pop up challenge comment */
	$('.popup-with-move-anim-challenge').click(function(){
		document.getElementById('comment-content').style.height = "inherit";
		var challenge_id = $(this).attr('data-id');
		$.post(base_url + "team/challengecomment",
		{
		  challenge_id: challenge_id
		},
		function(data,status){
			if(status == 'success'){
				$("#comment-content").empty().html(data); 
			}
		});
	})
	$('.popup-with-move-anim-challenge').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up challenge comment */

	/* start pop up edit description team */
	$('.popup-edit-desc').click(function(){
		var team_id = $(this).attr('data-id');
		$.post(base_url + "team/edit_description",
		{
		  team_id: team_id
		},
		function(data,status){
			if(status == 'success'){
				$("#edit-desc").empty().html(data); 
			}
		});
	})
	$('.popup-edit-desc').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up edit description team */

	/* start pop up add member team */
	$('.popup-add-member').click(function(){
		var team_id = $(this).attr('data-id');
		$.post(base_url + "team/add_member",
		{
		  team_id: team_id
		},
		function(data,status){
			if(status == 'success'){
				$("#add-member").empty().html(data); 
			}
		});
	})
	$('.popup-add-member').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up add member team */

	/* start save new post */
	$('#write-member-post-btn').click(function(){
		$.post(base_url + "social/add_new_post",
		{
		  new_post: $('#new_post').val()
		},
		function(data,status){
			data = $.parseJSON(data);
			if(status == 'success'){
				var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );
				socket.emit('new_count_all_post', { 
						new_count_all_post: data.count_all_post,
						user_new_post: data.user_new_post,
						new_post_member_count: data.new_post_member_count
				    });
				$('#member_post').load(base_url + 'social/load_post');
				$('#new_post').val('');
			}
		});
	});
	/* end save new post */

	/* start pop up detail notif */
	$('.popup-detail-notif').click(function(){
		var notif_id = $(this).attr('data-id');
		$.post($(this).attr('data-url'),
		{
		  notif_id: notif_id
		},
		function(data,status){
			if(status == 'success'){
				$("#detail-notif").empty().html(data); 
			}
		});
	})
	$('.popup-detail-notif').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up detail notif */

	/* start pop up team auth */
	$('.popup-team-auth').click(function(){
		$('#team-auth').load(base_url + "team/myteam");
	})
	$('.popup-team-auth').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up team auth */

	/* start pop up challenge input score */
	$('.popup-input-score').click(function(){
		var challenge_id = $(this).attr('data-id');
		$.post(base_url + "challenge/input_score",
		{
		  challenge_id: challenge_id
		},
		function(data,status){
			if(status == 'success'){
				$("#input-score").empty().html(data); 
			}
		});
	})
	$('.popup-input-score').magnificPopup({
	  type: 'inline',

	  fixedContentPos: false,
	  fixedBgPos: true,
	  alignTop: true,

	  overflowY: 'auto',

	  closeBtnInside: true,
	  preloader: false,
	  
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
	/* end pop up challenge input score */

	/* start request process */
	$('.request-process').click(function(){
		var team_request_id = $(this).attr('data-request');
		var team_request_status = $(this).attr('data-status');
		$.post(base_url + "team/add_member_process",
		{
		  team_request_id: team_request_id,
		  team_request_status: team_request_status
		},
		function(data,status){
			window.location.href = base_url + data;
		});
	});
	/* end request process */
});

function load_page_other_team(numb){
	var url = $('#pagination').attr('data-url');
	var search_keyword = $('#search_team').val();
	if(search_keyword != ''){
		$.post(url + numb,
		{
		  search_keyword: search_keyword
		},
		function(data,status){
			$('#list-rival-team').html(data);
		});
	} else{
		$('#list-team').load(url + numb);
	}
}

function load_pagination(numb, new_url=''){
	var url = $('#pagination').attr('data-url');
	var search_keyword = $('#search').val();

	if(new_url != ''){
		url = new_url;
	}

	if(search_keyword != ''){
		numb = numb + '/' + search_keyword;
	}

	window.location = url + numb;
}

function load_page_search_lap(numb){
	var url = $('#pagination').attr('data-url');
	var item_id = $(this).attr('data-id');
	var search_area = $('#search-area').val();
	var search_date = $('#datepicker').val();
	var search_time = $('#search-time').val();
	var search_hour = $('#slider-range-value').html();
	$.post(url + numb ,
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
		$('#list-lapangan').html(data);
	});
}

function add_friend(member_added)
{
	$.post(base_url + "member/add_friend/",
	{
	  member_id: member_added
	},
	function(data,status){
		data = $.parseJSON(data);
		if(data.status == 1){
			emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
			$('#btn-add-friend').html("Permintaan Pertemanan Sudah Dikirim");
		}
	});
}

function emit_new_notif(data_notif='', data_count_notif=''){
	var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );

	if(data_notif != ''){
		for (var i = 0, len = data_notif.length; i < len; i++) {
			socket.emit('new_notif', { 
					new_notif_updates_count: data_notif[i]['new_notif_updates_count'],
					new_notif_detail: data_notif[i]['notif_detail'],
					new_notif_url: data_notif[i]['notif_url'],
					new_member_id: data_notif[i]['member_id']
			    });
		}
	}

	if(data_count_notif != ''){
		socket.emit('new_notif_updates_count', { 
				new_count: data_count_notif.jml,
				new_count_member_id: data_count_notif.member_id
		  });
	}
};

function emit_member_chat(member_chat_id, partner_id){
	var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );

	socket.emit('reload_chat_message', { 
			member_chat_id: member_chat_id,
			partner_id: partner_id
	  });
};

function emit_unread_messages(data){
	var socket = io.connect( 'http://'+window.location.hostname+':'+port_socket );

	socket.emit('new_count_unread_messages', { 
			member_id: data.member_id,
			member_chat_id: data.member_chat_id,
			new_unread_messages: data.new_unread_messages,
			new_unread_all_messages: data.new_unread_all_messages
	  });
};

/* start pop up friend_request */
$('.popup-friend-request').on('click', function(event){
	last_part = url_parts[url_parts.length-1];
	$.post(base_url + "member/open_friend_request",
	{
	  member_id: last_part
	},
	function(data,status){
		if(status == 'success'){
			$("#friend_request").empty().html(data); 
		}
	});
})
$('.popup-friend-request').magnificPopup({
  type: 'inline',

  fixedContentPos: false,
  fixedBgPos: true,
  alignTop: true,

  overflowY: 'auto',

  closeBtnInside: true,
  preloader: false,
  
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-slide-bottom'
});
/* end pop up friend_request */

function cancel_friend_request()
{
	last_part = url_parts[url_parts.length-1];
	$.post(base_url + "member/cancel_friend_request",
	{
	  member_id: last_part
	},
	function(data,status){
		data = $.parseJSON(data);
		if(data.status == 1){
			$("#detail").empty();
			$("#message").empty().html(data.message); 
			location.reload();
		} else{
			$("#message").empty().html(data.message); 
		}
	});
}

function accept_friend_request()
{
	last_part = url_parts[url_parts.length-1];
	$.post(base_url + "member/accept_friend_request",
	{
	  member_id: last_part
	},
	function(data,status){
		data = $.parseJSON(data);
		if(data.status == 1){
			emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
			$("#detail").empty();
			$("#message").empty().html(data.message); 
			location.reload();
		} else{
			$("#message").empty().html(data.message); 
		}
	});
}

function delete_friend_request()
{
	last_part = url_parts[url_parts.length-1];
	$.post(base_url + "member/delete_friend_request",
	{
	  member_id: last_part
	},
	function(data,status){
		data = $.parseJSON(data);
		if(data.status == 1){
			$("#detail").empty();
			$("#message").empty().html(data.message); 
			location.reload();
		} else{
			$("#message").empty().html(data.message); 
		}
	});
}

function load_history_upteam(challenge_id, inviter_team_id, rival_team_id)
{
	if($("#" + challenge_id + "_history").is(":empty")){
		$.post(base_url + "team/challengelist_history",
		{
		  inviter_team_id: inviter_team_id,
		  rival_team_id: rival_team_id
		},
		function(data,status){
			$("#" + challenge_id + "_history").empty().html(data);
		});
	} else{
		if($("#" + challenge_id + "_history").hasClass("hidden")){
			$("#" + challenge_id + "_history").removeClass("hidden");
		} else{
			$("#" + challenge_id + "_history").addClass("hidden");
		}
	}
}

$(".profile-image").mouseenter(function(){
	$(".profile-image .profile-image-bottom").fadeTo( "slow", 1 );
});

$(".profile-image").mouseleave(function(){
	$(".profile-image .profile-image-bottom").fadeTo( "slow", 0 );
});

$("#member_cover").mouseenter(function(){
	$(".pbs").addClass("profile-banner-style");
	$("#update_text").fadeTo( "slow", 1 );
	$(".profile-banner-style").fadeTo( "slow", 1 );
});

$("#member_cover").mouseleave(function(){
	$(".update_cover").fadeTo( "slow", 1 );
	$(".profile-banner-style").fadeTo( "slow", 0 );
});

$("#team_cover").mouseenter(function(){
	$(".pbs").addClass("profile-banner-style");
	$("#update_text").fadeTo( "slow", 1 );
	$(".profile-banner-style").fadeTo( "slow", 1 );
});

$("#team_cover").mouseleave(function(){
	$(".update_cover").fadeTo( "slow", 1 );
	$(".profile-banner-style").fadeTo( "slow", 0 );
});

$(".upcoming_challenge .sngl_team").click(function(){
	var challenge_id = $(this).attr('data-id');
	window.location = base_url + "team/challengelist/#" + challenge_id;
});

function load_chat_message(member_chat_id)
{
	$.get( base_url + "social/load_chat_message/" + member_chat_id, function( data ) {
		data = $.parseJSON(data);

		$("#chat-list").html(data.chat_message_html);
		if(data.member_chat_id != ''){
			emit_unread_messages(data);
		}
	});
}

function register_social()
{
	$("#register").removeClass("hidden");
	$("#login").addClass("hidden");
}
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
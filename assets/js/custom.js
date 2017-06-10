$(document).ready(function() {
	/* start pop up post comment */
	$('.popup-with-move-anim').on('click', function(event){
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

	/* start pop up list team */
	$('#write-member-post-btn').click(function(){
		$.post(base_url + "social/add_new_post",
		{
		  new_post: $('#new_post').val()
		},
		function(data,status){
			if(status == 'success'){
				$('#new_member_post').append(data);
				$('#new_post').val('');
			}
		});
	});
	/* end pop up list team */

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
})
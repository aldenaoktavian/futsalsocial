$(document).ready(function() {
	/* start pop up post comment */
	$('.popup-with-move-anim').click(function(){
		$.post(base_url + "social/comment",
		{
		  id: '1'
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
		$.post(base_url + "team/challengecomment",
		{
		  id: '1'
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
		$.post(base_url + "team/edit_description",
		{
		  id: '1'
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
		$.post(base_url + "team/add_member",
		{
		  id: '1'
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
	$('.popup-list-team').click(function(){
		$.post(base_url + "challenge/list_team",
		{
		  id: '1'
		},
		function(data,status){
			if(status == 'success'){
				$("#list-team").empty().html(data); 
			}
		});
	})
	$('.popup-list-team').magnificPopup({
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
	/* end pop up list team */
})
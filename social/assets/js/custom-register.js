function cek_available_data(id, text){
	$.post(base_url + "register/cek_available_data",
	{
	  field: id,
	  value: $("#" + id).val(),
	  text: text
	},
	function(data,status){
		$(data).insertBefore("#" + id);
	});
}

function register_social(){
	/*$.post(base_url + "register", $("#form_register").serialize(),
	function(data,status){
		$(".error_msg").html(data);
		$(".error_msg").removeClass("hidden");
	});*/
}
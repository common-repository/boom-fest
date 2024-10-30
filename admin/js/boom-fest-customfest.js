$=jQuery
$(document).ready(function(){
	if($("#festival").val()){
		var hasFest = $('#festival').find(":selected").val();
		$('.' + hasFest).show();
	}

	$('#festival').change(function(e){
		e.preventDefault();

		var festival=$('#festival').val();
		$('.fest-anime').hide();
		$('.fest-decor').hide();
		$('.fest-font').hide();
		$('.' + $(this).val()).show();
		
		$.ajax({
			type:'POST',
			url: bf_ajax_object.admin_ajax_url,
			data:{
				action:'bf_customfest',
				festival:festival,
			},
			success:function(response){
				$("#celebration_type").val("");
				$('#celebration_type').prop('disabled', false);
				$("#decoration_image").val("");
				$('#decoration_image').prop('disabled', false);
				$("#font_style").val("");
				$('#font_style').prop('disabled', false);

				$('strong').text(response);
				$('.bf-alert').css("display","block");
				function bf_hide(){
					$('.bf-alert').css("display","none");
				}
				setTimeout(bf_hide, 10000);
			}
		})
	})
})
  
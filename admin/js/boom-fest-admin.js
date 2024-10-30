$=jQuery
$(document).ready(function(){
	$('#bf-festive-new-year').submit(function(e){
		e.preventDefault();
		var celebration_type=$('#celebration_type').val();
		var decoration_image=$('#decoration_image').val();
		var font_style=$('#font_style').val();
		var pages = $('#pages').val();
		
		$.ajax({
			type:'POST',
			url: ajax_url.admin_url,
			data:{
				action:'bf_admin_action',
				celebration_type:celebration_type,
				decoration_image:decoration_image,
				font_style:font_style,
				pages:pages
			},
			success:function(response){
				console.log(response);
				$('strong').text(response);
				$('.bf-alert').css("display","block");
				function bf_hide(){
					$('.bf-alert').css("display","none");
				}
				setTimeout(bf_hide, 5000);
			}
		})
	})
})

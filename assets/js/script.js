function lightBox(carpeta,modulo,coordenadas){
	$("#lightbox").remove();
	if ($('#lightbox').length > 0) {
		$.ajax({
			url: carpeta+'/'+modulo+'?co='+coordenadas,
			success: function(data) {
				$('#content').html(data);
				$('#lightbox').show();
			}
		});
	}
	else {
		$.ajax({
			url: carpeta+'/'+modulo+'?co='+coordenadas,
			success: function(data) {
				var lightbox = 
					'<div id="lightbox">' +
						'<div id="content">' + 
							'<a id="fancybox-close" onclick="cerrarLightBox();"></a>'+
							data +
						'</div>' +	
					'</div>';
					
				$('body').append(lightbox);
				
				var divAncho = $("#content").width();
				var divAlto = $("#content").height();

				$("#content").css("margin-left",-1*(divAncho/2));
				$("#content").css("margin-top",-1*(divAlto/2));
			}
		});
	}
}
function cerrarLightBox(){
	$("#lightbox").hide();
}
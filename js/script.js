if (varjs=='en') {
	alertEn();
}else{
	alertEs();
}
	function alertEn(){
    $('.espanol').html("<p>This information is only available in Spanish</p>");
    $('.ingles').html("<p></p>");
  }
  function alertEs(){
    $('.ingles').html("<p>Esta información solo está disponible en Inglés</p>");
    $('.espanol').html("<p></p>");
  }
	function mostrarInstitucion(ins){
		$('.institucion').val($('option:first').val());
			$('.anio, .insti , .institucion').css('display','none');
				$('#institucion'+ins.value).stop().delay(200).fadeIn();
	}
	function mostrarAnio(an1){
		$('.anio , .insti').val($('option:first').val());
	      $('.anio , .insti ').css('display','none');
				$('#anio'+an1.value).stop().delay(200).fadeIn();
		}
	function mostrarPdf(pdf){
		$('.insti').css('display','none');	
					$('#insti'+pdf.value).stop().delay(300).fadeIn();
		}

$(document).on('ready',function() {

	pantalla();
	function pantalla(){
	  pant = $(window).width();
	  // console.info( 'la pantalla mide ' + pant + 'px' );
	  if(pant < 993){
	  	$('.fondo').css("height",'auto');
        $('.separador').css("text-align",'center');
	  }
	  else{
	  	$('.fondo').css("height",'240');
		$('.separador').css("text-align",'left');	 	
	  }
	  if (pant < 769) {
	  	$('.lista-redes').css('marginLeft','-30px');
	  }else{
	  	$('.lista-redes').css('marginLeft','-12px');
	  }
	  if(pant < 380){
	  	$('.credenciales p').css("font-size",'12px');
	  }
	  else{
	  	$('.credenciales p').css("font-size",'14px');	 	
	  }
	}

$(window).resize(
  	function(){
  		pantalla();
  	})
});


//  Parte de menu mobile mov-header
$( document ).ready(function() {
	console.log("funcion al cargar")
	var a =0;
	$('.menu-mobile').on('click',function(){
		if(a == 0){
			a = 1;
			$('.menu-container').css({'transform':'translateX(-67%)'});
		    $('.menu-container').css({"transition":'0.2s'});
		} else {
			a = 0;
			$('.menu-container').css({'transform':'translateX(0%)'});
			$('.menu-container').css({"transition":'0.1s'});

	}
	})

});

// 
    
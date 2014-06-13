/* Slideshow in JavaScript */
/* Christian Dauerer */

$(document).ready(function() { 	// Wenn document bereit ist, 
var slide=$('#show div');		// wird Variable erstellt, die auf den Div-Container verweist indem die Bilder gespeichert sind
	slide.fadeOut(10);			

fade(slide.first());			// Verweis auf erstes Bild

function fade ($ele) {
	$ele.fadeIn(300).delay(5000).fadeOut(300, function(){
		var $next = $(this).next();		// nächstes Bild
		fade($next.length>0 ? $next : $(this).parent().children().first());  // Sozusagen die Schleife. Wenn alle Bilder gezeigt wurden, gehe zum ersten
	});
};

});




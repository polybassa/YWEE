$(document).ready(function() {
var slide=$('#show div');
	slide.fadeOut(10);

fade(slide.first());

function fade ($ele) {
	$ele.fadeIn(300).delay(5000).fadeOut(300, function(){
		var $next = $(this).next();
		fade($next.length>0 ? $next : $(this).parent().children().first());
	});
};

});




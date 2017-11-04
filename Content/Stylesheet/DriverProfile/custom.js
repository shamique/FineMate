$(document).ready(function(){
	$('ul#notification > li > ul').hide('slow');
	$('.trigger-after').hide();
	
	$('.trigger-before').on('click', function(){
		$('ul#notification > li > ul').show('slow');
		$('.trigger-after').show();
		$('.trigger-before').hide();
	});
	$('.trigger-after').on('click', function(){
		$('ul#notification > li > ul').hide('slow');
		$('.trigger-after').hide();
		$('.trigger-before').show();
	});
	$('.dashboard-block').delay(3000).addClass('show-dashboard-block');
});
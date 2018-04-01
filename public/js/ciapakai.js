$(document).ready(function(){

	if ($('.breadcrumb').length == 1) {
		$('.breadcrumb').find('li').last().find('a').css({
			'text-decoration' :'none',
			'color' :'#777',
			'text-weight' :'bold'
		});
	}




});
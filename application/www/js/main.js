'use strict';


$('#liens').on('mouseover', function() {
	$('.nav--list').removeClass('hide');
});

$('.nav--list').on('mouseout', function() {
	$('.nav--list').addClass('hide');
});

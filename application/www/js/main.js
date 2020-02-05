'use strict';


$('#user--connect').on('mouseover', function() {
	$('.under-nav-list').removeClass('hide');
	$('.nav--list').addClass('hide');
	//ajouter classe hide sur l'autre div
});

$('.under-nav-list').on('mouseout', function() {
	$('.under-nav-list').addClass('hide');
});


$('.liens').on('mouseover', function() {
	$('.bar--link').removeClass('hide');
	$('.under-nav-list').addClass('hide');
});

$('.bar--link').on('mouseout', function() {
	$('.bar--link').addClass('hide');
});

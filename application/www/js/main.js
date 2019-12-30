'use strict';
console.log('coucou')

$('#user--connect').on('mouseover', function() {

  console.log('test')
	$('.under-nav-list').removeClass('hide');

});


$('.under-nav-list').on('mouseout', function() {
	$('.under-nav-list').addClass('hide');

});

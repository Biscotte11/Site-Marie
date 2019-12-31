'use strict';
// console.log('coucou')


$('#user--connect').on('mouseover', function() {
  // console.log('test')
	$('.under-nav-list').removeClass('hide');
});

$('#liens').on('mouseover', function() {
	$('.nav--list').removeClass('hide');
});


// $('.nav--list').on('mouseout', function() {
// 	$('.nav--list').addClass('hide');
// });

$('.under-nav-list').on('mouseout', function() {
	$('.under-nav-list').addClass('hide');
});


// $('#user--connect').hover(function(){
//     // add a class to Element B
//     $('.title--M').addClass('opacityClass');
// },function(){
//     // on supprime la classe lorsqu'on sort du rollHover
//     $('.title--M').removeClass('opacityClass');
// });

$(document).ready(function(){
  $('.your-class').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: $('.prec'),
    nextArrow: $('.next')
  });
});

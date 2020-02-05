$(document).ready(function(){
  $('.your-class').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: $('.prec'),
    nextArrow: $('.next'),
    responsive: [
      {
        breakpoint: 427,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});

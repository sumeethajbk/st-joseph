jQuery(document).ready(function () {

  /* Default Slider */
  var $status = jQuery('.counter-info');
  var $slickElement = jQuery('.def-slider');

  $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.html('<span class="current_slide">' + i + '</span> / <span class="total_slides"> ' + slick.slideCount + '</span>');
  });

  jQuery('.def-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
      breakpoint: 768,
      settings: {
        dots: true,
      }
    }, ]
  });


  /* Stories Slider */
  jQuery('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    variableWidth: true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    speed: 1500,    
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
      breakpoint: 1024,
      settings: {
      fade:true,
      }
    },
                {
      breakpoint: 768,
      settings: {
        dots: true,
        arrows: true,
        variableWidth: false,
      }
    },]
  });



  jQuery('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1500,
    arrows: true,
    asNavFor: '.slider-nav',
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
      }
    }, ]
  });

 
  /* End of Stories Slider */

  /* Patient Stories */
  if (jQuery(window).width() <= 767) {
    jQuery('.ps-lists').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
      variableWidth: true,
      draggable: true,
      touchThreshold: 200,
      swipeToSlide: true,
      adaptiveHeight: true,
      prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
      nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    });
  }


  /* Donors */
  jQuery('.meet-donors-wrap').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    variableWidth: true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    speed: 1000,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1000,
  });

    
    /* Timeline Slider */
  jQuery('.timeline-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    focusOnSelect: true,
    variableWidth: true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    speed: 1000,  
      infinite: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
      breakpoint: 1024,
      settings: {
      fade:true,
      }
    },
                {
      breakpoint: 768,
      settings: {
        dots: true,
        arrows: true,
        variableWidth: false,
      }
    },]
  });

});

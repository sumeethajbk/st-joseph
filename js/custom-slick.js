jQuery(document).ready(function () {


  /* Default Slider */
  var $status = jQuery('.counter-info');
  var $slickElement = jQuery('.def-slider');

  $slickElement.on('init reInit afterChange setPosition', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.html('<span class="current_slide">' + i + '</span> / <span class="total_slides"> ' + slick.slideCount + '</span>');

    if (slick.slideCount <= 1) {
      $status.remove();
    }
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
    infinite: false,
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          fade: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          dots: true,
          arrows: true,
          variableWidth: false,
        }
      },
    ]
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
    infinite: false,
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


  var $slider = jQuery('.meet-donors-wrap');
  var $sliderLength = $slider.find('.our-donor-thumb').length;
  if (jQuery(window).width() >= 768) {
    if ($sliderLength >= 5) {
      $slider.slick({
        slidesToShow: 3,
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
    }
  } else {
    $slider.slick({
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

  }


  /*
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
    infinite: false,
    autoplay: true,
    autoplaySpeed: 1000,
  });
*/

  /* Timeline Slider */
  jQuery('.timeline-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.timeline-for',
    dots: false,
    arrows: true,
    focusOnSelect: true,
    variableWidth: true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    speed: 1000,
    cssEase: "linear",
    centerMode: true,
    centerPadding: 0,
    prevArrow: '<span class="slick-arrow prev-arrow fa-sharp fa-light fa-arrow-left-long flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-sharp fa-light fa-arrow-right-long flex flex-center"></span>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          centerMode: false,
        }
      },

    ]
  });


  jQuery('.timeline-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1500,
    arrows: false,
    asNavFor: '.timeline-slider',
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    fade: true,
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

  jQuery(document).on('init setPosition', '.slick-slider', function (event, slick) {
    var $slickSlider = jQuery(this);
    var $slickDots = $slickSlider.find('.slick-dots');
    console.log('etst')
    var $parent = $slickSlider.parent(); // Assuming you want to add/remove the class on the parent of the slider

    if (slick.slideCount <= 1) {
      $slickDots.remove();
      $parent.addClass('single-slide');
    } else {
      $parent.removeClass('single-slide');
    }
  });


});

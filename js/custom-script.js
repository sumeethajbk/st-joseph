jQuery(document).ready(function () {

  /* Fixed Header */
  jQuery(window).on("scroll", function () {
    var scroll = jQuery(this).scrollTop();
    if (scroll >= 2) {
      jQuery(".main_header").addClass("fixed-header");
    } else {
      jQuery(".main_header").removeClass("fixed-header");
    }
  });


  /* Menu */
  if (jQuery(window).width() >= 1024) {
    jQuery("ul.main_menu ul.sub-menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(this).parent().siblings('li').find("a").removeClass("active");
      jQuery(this).siblings("ul").slideToggle();
      jQuery(this).parent().siblings('li').find("ul.sub-menu").slideUp();
    });
  }

  /* Menu */

  if (jQuery(window).width() <= 1023) {
    jQuery(".toggle_button").on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery(".main_header").toggleClass("menu-open");
      jQuery("html").toggleClass("no-scroll");
    });
    jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");
      jQuery(this).parent().siblings().find('ul.sub-menu').slideUp();
      jQuery(this).next('ul.sub-menu').slideToggle();
      jQuery(this).parent().siblings().toggleClass('sib');
    });
    jQuery("ul.main_menu ul > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery('ul.main_menu ul > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");
      jQuery(this).parent().siblings().find('ul.sub-menu').slideUp();
      jQuery(this).siblings('ul.main_menu ul > li > ul.sub-menu').slideToggle();
    });
  }


  // New edit
  jQuery(".accordion-item .accordion-heading").on("click", function (e) {
    e.preventDefault();
    if (jQuery(this).closest(".accordion-item").hasClass("active")) {
      jQuery(".accordion-item").removeClass("active");
    } else {
      jQuery(".accordion-item").removeClass("active");
      jQuery(this).closest(".accordion-item").addClass("active");
    }
    var jQuerycontent = jQuery(this).next();
    jQuerycontent.slideToggle(300);
    jQuery(".accordion-item .content").not(jQuerycontent).slideUp("slow");
  });


  jQuery('select').selectBox({
    keepInViewport: false,
    menuSpeed: 'slow',
    mobile: true,
  });


  /* Bottom Video Slide*/
  jQuery('.play-btn').on('click', function (e) {
    e.preventDefault();
    jQuery('body').addClass('pull_bottom');
    jQuery('.overlay_main_sec').addClass('active');
  });
  jQuery('.pop_connect_close').on('click', function () {
    jQuery('body').removeClass('pull_bottom');
    jQuery('.overlay_main_sec').removeClass('active');
  });


  // Event delegation for opening the popup
  jQuery('body').on('click', '.trigger-popup', function (e) {
    e.preventDefault();
    var popupId = jQuery(this).data('popup-id');
    jQuery('body').addClass('pull_bottom');
    jQuery('#' + popupId).addClass('active');
  });

  // Close the popup when the close button is clicked
  jQuery('body').on('click', '.pop_connect_close', function () {
    var popupId = jQuery(this).data('popup-id');
    jQuery('body').removeClass('pull_bottom');
    jQuery('#' + popupId).removeClass('active');
  });


 


  /* Header Toggle */
  jQuery('.rolling-btn').on('click', function () {
    jQuery(this).toggleClass('active');
  });


  /* Bios Toggle */
  jQuery(".bios-toggle").on("click", function (e) {
    e.preventDefault();
    if (jQuery(this).closest(".gt-bios-grid").hasClass("active")) {
      jQuery(".gt-bios-grid").removeClass("active");
    } else {
      jQuery(".gt-bios-grid").removeClass("active");
      jQuery(this).closest(".gt-bios-grid").addClass("active");
    }
    var jQuerycontent = jQuery(this).next();
    jQuerycontent.slideToggle(300);
  });

  /* Donor Listing */
  const labels = document.querySelectorAll(".donor-item__label");
  const tabs = document.querySelectorAll(".donor-tab");

  function toggleShow() {
    const target = this;
    const item = target.classList.contains("donor-tab")
      ? target
      : target.parentElement;
    const group = item.dataset.actabGroup;
    const id = item.dataset.actabId;

    tabs.forEach(function (tab) {
      if (tab.dataset.actabGroup === group) {
        if (tab.dataset.actabId === id) {
          tab.classList.add("accordion-active");
        } else {
          tab.classList.remove("accordion-active");
        }
      }
    });

    labels.forEach(function (label) {
      const tabItem = label.parentElement;

      if (tabItem.dataset.actabGroup === group) {
        if (tabItem.dataset.actabId === id) {
          tabItem.classList.add("accordion-active");
        } else {
          tabItem.classList.remove("accordion-active");
        }
      }
    });
  }

  labels.forEach(function (label) {
    label.addEventListener("click", toggleShow);
  });

  tabs.forEach(function (tab) {
    tab.addEventListener("click", toggleShow);
  });

});

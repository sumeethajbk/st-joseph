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
    
    /* Tabs */
    jQuery( "#tabs" ).tabs();


  /* Menu */
  if (jQuery(window).width() <= 1023) {
    jQuery('.toggle_button').on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery(".main_header").toggleClass("menu-open");
    });

    jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");
      jQuery(this).siblings('ul.sub-menu').slideToggle('900');
      var topParent = jQuery(this).parents('ul.main_menu > li').attr('id');
      var topChildParent = jQuery(this).parent('li').attr('id');
      jQuery('ul.main_menu ul.sub-menu').each(function () {
        if (jQuery(this).parents('ul.main_menu > li').attr('id') !== topParent) {
          jQuery(this).slideUp('700');
        } else {
          if (jQuery(this).find('li.menu-item-has-children').length) {
            getChild(jQuery(this).find('li.menu-item-has-children'), topChildParent);
          }
        }
      });
    });

    function getChild(obj, topChildParent) {
      obj.each(function () {
        if (jQuery(this).attr('id') !== topChildParent) {
          jQuery(this).find('ul.sub-menu').slideUp('700');
        }
      });
    }
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
  jQuery('.video-thumbnail .play-btn').on('click', function (e) {
    e.preventDefault();
    jQuery('body').addClass('pull_bottom');
    jQuery('.overlay_main_sec').addClass('active');
  });
  jQuery('.pop_connect_close').on('click', function () {
    jQuery('body').removeClass('pull_bottom');
    jQuery('.overlay_main_sec').removeClass('active');
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

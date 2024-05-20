jQuery(document).ready(function () {
const ui_text = jQuery(".ui-tab-txt");
const ui_icon = jQuery(".ui-tab-icon");
    jQuery(".ui-tab-btn").on("click", function (event) {
        event.preventDefault();
        jQuery(this).toggleClass("active");
        jQuery(this).siblings(".browse-all").slideToggle("slow");
    });
    if (jQuery(window).width() <=767) { 
    jQuery("ul.browse-all li a").on("click", function(e){
        e.preventDefault();
        jQuery(".ui-tab-btn").removeClass("active");
        let tab_text  = jQuery(this).text();
        ui_text.html(tab_text);
        let tab_icon = jQuery(this).find(".normal-icon").html();
        console.log(tab_icon)
        ui_icon.html(tab_icon);
        jQuery("ul.browse-all").slideUp("slow");

    }); }
});
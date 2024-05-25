<?php get_header(); ?>

<?php
$common_desktop_image = get_field('common_banner_desktop_image');
$common_mobile_image = get_field('common_banner_mobile_image');
$common_color_picker = get_field('common_banner_background_color');
$common_text_color = get_field('common_banner_text_color');
$common_heading_text_color = get_field('common_banner_heading_text_color');
$common_button_color = get_field('common_banner_button_color');
$common_button_text_color = get_field('common_banner_button_text_color');
$common_sub_heading_one = get_field('common_banner_sub_heading_one');
$common_sub_heading_two = get_field('common_banner_sub_heading_two');
$common_heading = get_field('common_banner_heading');
$common_button_text = get_field('common_banner_button_text');
$common_button_link = get_field('common_banner_button_link');
?>

<section class="default-banner-section pos-relative">
    <?php if ($common_mobile_image ||  $common_desktop_image) {
        $common_mobile_image = $common_mobile_image ? $common_mobile_image : $common_desktop_image;
        $common_desktop_image = $common_desktop_image ? $common_desktop_image : $common_mobile_image; ?>

        <div class="banner-bg object-fit">
            <picture>
                <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 1024px)">
                <source srcset="<?php echo $common_mobile_image['url']; ?>" media="(min-width: 768px)">
                <img src="<?php echo $common_mobile_image['url']; ?>" alt="<?php echo $common_mobile_image['alt']; ?>" title="<?php echo $common_mobile_image['title']; ?>" />
            </picture>
            </picture>
        </div>
    <?php } ?>
    <div class="container">
        <div class="default-banner-main flex flex-vcenter" style="background:<?php echo $common_color_picker; ?>;">
            <div class="default-banner-text">
                <div class="default-banner-bg pos-absolute">&nbsp;</div>
                <?php if (!empty($common_sub_heading_one)) { ?>
                    <span class="optional-text" style="color: <?php echo $common_text_color; ?>"><?php echo $common_sub_heading_one; ?></span>
                <?php } ?>
                <?php if (!empty($common_sub_heading_two)) { ?>
                    <h1 style="color: <?php echo $common_text_color; ?>"><?php echo $common_sub_heading_two; ?></h1>
                <?php } ?>
                <?php if (!empty($common_heading)) { ?>
                    <h1 style="color: <?php echo $common_text_color; ?>"><?php echo $common_heading; ?></h1>
                <?php } ?>
                <?php if (!empty($common_button_text) && !empty($common_button_link)) { ?>
                    <div class="btn-wrap"><a href="<?php echo $common_button_link; ?>" class="button btn-white" style=" background:<?php echo $common_button_color; ?>; color: <?php echo $common_button_text_color; ?>"><?php echo $common_button_text; ?></a> </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
$short_introduction_sub_heading = get_field('default_page_short_introduction_sub_heading');
$short_introduction_heading = get_field('default_page_short_introduction_heading');
$short_introduction_description = get_field('default_page_short_introduction_description');
$short_introduction_features = get_field('default_page_short_introduction_features');
?>
<section class="short-intro-section pos-relative">
    <div class="short-intro-bg pos-absolute" style="background: var(--white)"></div>
    <div class="container">
        <div class="short-intro-wrap">
            <div class="short-intro-main flex">
                <?php if ($short_introduction_sub_heading) { ?>
                    <div class="short-intro-lt"> <span class="optional-text"><?php echo $short_introduction_sub_heading; ?></span>
                    <?php }
                if ($short_introduction_heading) { ?>
                        <h2><?php echo $short_introduction_heading; ?></h2>
                    <?php } ?>
                    </div>
                    <?php if ($short_introduction_description) { ?>
                        <div class="short-intro-rt">
                            <?php echo $short_introduction_description; ?>
                        </div>
                    <?php } ?>
            </div>
            <div class="short-intro-row icon-type flex">
                <?php if ($short_introduction_features) { ?>
                    <?php $colors = ['purple', 'teal', 'green', 'lilac']; ?>
                    <?php $index = 0; ?>
                    <?php foreach ($short_introduction_features as $item) {
                        $icon_or_svg = $item['default_short_introduction_icon_or_svg'];
                        $icon = $item['default_short_introduction_icon'];
                        $svg = $item['default_short_introduction_svg'];
                        $description = $item['default_short_introduction_repeater_description'];
                        $link = $item['default_short_introduction_repeater_link'];
                        $link_text = $item['default_short_introduction_repeater_link_text']; ?>
                        <?php $color_class = $colors[$index % count($colors)]; ?>
                        <div class="short-intro-list <?php echo $color_class; ?>">
                            <div class="short-intro-icon">
                                <?php if ($icon_or_svg == 'icon') { ?>
                                    <?php if ($icon) { ?>
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?> ?>">
                                    <?php } ?>
                                <?php } elseif ($icon_or_svg == 'svg') { ?>
                                    <?php if ($svg) { ?>
                                        <?php echo $svg; ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <?php if ($description) { ?>
                                <?php echo $description; ?>
                            <?php }
                            if ($link && $link_text) { ?>
                                <a href="<?php echo  $link; ?>" class="readmore"><?php echo  $link_text; ?></a>
                            <?php } ?>
                        </div>
                        <?php $index++; ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<?php
$default_page_repeater_section = get_field('default_page_repeater_section');
if ($default_page_repeater_section) { ?>
    <section class="repeaters-module">
        <div class="repeater-bg pos-absolute">&nbsp;</div>
        <div class="container">
            <div class="repeaters-main flex pos-relative">
                <?php
                foreach ($default_page_repeater_section as $repeater) {
                    $repeater_image = $repeater['default_page_repeater_section_image'];
                    $repeater_video_type = $repeater['default_page_repeater_section_video_type'];
                    $repeater_youtube_id = $repeater['default_page_repeater_section_youtube_id'];
                    $repeater_vimeo_id = $repeater['default_page_repeater_section_vimeo_id'];
                    $repeater_heading = $repeater['default_page_repeater_section_heading'];
                    $repeater_description = $repeater['default_page_repeater_section_description'];
                    $repeater_button_text = $repeater['default_page_repeater_section_button_text'];
                    $repeater_button_link = $repeater['default_page_repeater_section_button_link'];
                    $repeater_message = $repeater['default_page_repeater_section_message'];
                ?>
                    <div class="repeaters-loop">
                        <div class="repeaters-grid flex">
                            <?php if (!empty($repeater_image)) { ?>
                                <div class="repeaters-lt">
                                    <div class="repeaters-thumb pos-relative">
                                        <figure class="object-fit"><img src="<?php echo $repeater_image['url']; ?>" alt="<?php echo $repeater_image['alt']; ?>" title="<?php echo $repeater_image['title']; ?>" /></figure>
                                        <?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
                                            <div class="play-btn-main flex flex-center">
                                                <a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
                                                    <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
                                                </a>
                                            </div>
                                        <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                                            <div class="play-btn-main flex flex-center">
                                                <a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
                                                    <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="repeaters-rt">
                                <div class="repeaters-rt-inner">
                                    <?php if (!empty($repeater_heading)) { ?>
                                        <div class="h3"><?php echo $repeater_heading; ?></div>
                                    <?php } ?>
                                    <?php if (!empty($repeater_description)) { ?>
                                        <?php echo $repeater_description; ?>
                                    <?php } ?>
                                    <?php if (!empty($repeater_button_text) && !empty($repeater_button_link)) { ?>
                                        <a href="<?php echo $repeater_button_link; ?>" class="button"><?php echo $repeater_button_text; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($repeater_message)) { ?>
                            <div class="repeaters-full-txt flex">
                                <h2><?php echo $repeater_message; ?></h2>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php
$default_statistics_heading = get_field('default_page_statistics_heading');
$default_statistics_description = get_field('default_page_statistics_message');
$default_statistics_button_text = get_field('default_page_statistics_button_text');
$default_statistics_button_link = get_field('default_page_statistics_button_link');
$default_statistics_repeater = get_field('default_page_statistics');

$stats_list_classes = array('teal', 'purple', 'mauve', 'lilac');
?>

<section class="stats-module">
    <div class="container">
        <div class="stats-wrap">
            <?php if ($default_statistics_heading) {  ?>
                <h2><?php echo $default_statistics_heading; ?></h2>
            <?php } ?>
            <?php if ($default_statistics_description) {  ?>
                <div class="bottom-frame">
                    <div class="frame-lt">
                        <?php echo $default_statistics_description; ?>
                    </div>
                    <div class="frame-mid">
                        <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
                    </div>
                    <div class="frame-rt">
                        <?php if ($default_statistics_button_link && $default_statistics_button_text) {  ?>
                            <a href="<?php echo $default_statistics_button_link; ?>" class="button"><?php echo $default_statistics_button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($default_statistics_repeater) {  ?>
                <div class="stats-row stats-type flex">
                    <?php $index = 0; ?>
                    <?php foreach ($default_statistics_repeater as $statistics) { ?>
                        <?php
                        $default_statistics_before_text = $statistics['default_page_statistics_before_text'];
                        $default_statistics_number = $statistics['default_page_statistics_number'];
                        $default_statistics_after_text = $statistics['default_page_statistics_after_text'];
                        $default_statistics_repeater_description = $statistics['default_page_statistics_description'];
                        $default_statistics_repeater_link_text = $statistics['default_page_statistics_link_text'];
                        $default_statistics_repeater_link = $statistics['default_page_statistics_link'];
                        ?>
                        <?php if ($default_statistics_number) {  ?>
                            <?php $current_class = $stats_list_classes[$index % count($stats_list_classes)]; ?>
                            <div class="stats-list <?php echo $current_class; ?>">
                                <div class="line pos-absolute">&nbsp;</div>
                                <span class="big"><?php if ($default_statistics_before_text) {
                                                        echo $default_statistics_before_text;
                                                    }
                                                    if ($default_statistics_number) {
                                                        echo $default_statistics_number;
                                                    }
                                                    if ($default_statistics_after_text) {
                                                        echo $default_statistics_after_text;
                                                    } ?></span>
                                <div class="stats-cnt">
                                    <?php if ($default_statistics_repeater_description) {  ?>
                                        <?php echo $default_statistics_repeater_description; ?>
                                    <?php } ?>
                                    <?php if ($default_statistics_repeater_link_text && $default_statistics_repeater_link) {  ?>
                                        <a href="<?php echo $default_statistics_repeater_link; ?>" class="readmore"><?php echo $default_statistics_repeater_link_text; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $index++; ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
$donate_now_cta_color_picker = get_field('default_page_donate_now_background_color');
$donate_now_cta_text_color = get_field('default_page_donate_now_text_color');
$donate_now_cta_button_color = get_field('default_page_donate_now_button_color');
$donate_now_cta_button_text_color = get_field('default_page_donate_now_button_text_color');
$donate_now_image = get_field('default_page_donate_now_image');
$donate_now_sub_heading = get_field('default_page_donate_now_sub_heading');
$donate_now_heading = get_field('default_page_donate_now_heading');
$donate_now_description = get_field('default_page_donate_now_description');
$donate_now_button_text = get_field('default_page_donate_now_button_text');
$donate_now_button_link = get_field('default_page_donate_now_button_link');
$donate_now_link_text = get_field('default_page_donate_now_link_text');
$donate_now_link = get_field('default_page_donate_now_link');
?>

<?php if ($donate_now_image || $donate_now_sub_heading || $donate_now_heading || $donate_now_description || ($donate_now_button_text && $donate_now_button_link) || ($donate_now_link_text && $donate_now_link)) { ?>
    <section class="cta-module donate-cta">
        <div class="cta-overlay pos-absolute"></div>
        <div class="container">
            <div class="cta-main greenbg flex" style="background:<?php echo $donate_now_cta_color_picker; ?>;">
                <div class="cta-main-text">
                    <div class="cta-txt">
                        <?php if ($donate_now_sub_heading) { ?>
                            <span class="optional-text" style="color: <?php echo $donate_now_cta_text_color; ?>"><?php echo $donate_now_sub_heading; ?></span>
                        <?php } ?>
                        <?php if ($donate_now_heading) { ?>
                            <div class="h3" style="color: <?php echo $donate_now_cta_text_color; ?>"><?php echo $donate_now_heading; ?></div>
                        <?php } ?>
                        <?php if ($donate_now_description) { ?>
                            <?php echo $donate_now_description; ?>
                        <?php } ?>
                        <div class="cta-btns flex flex-vcenter">
                            <?php if ($donate_now_button_text && $donate_now_button_link) { ?>
                                <a href="<?php echo $donate_now_button_link; ?>" class="button btn-white" style=" background:<?php echo $donate_now_cta_button_color; ?>; color: <?php echo $donate_now_cta_button_text_color; ?>"><?php echo $donate_now_button_text; ?></a>
                            <?php } ?>
                            <?php if ($donate_now_link_text && $donate_now_link) { ?>
                                <a href="<?php echo $donate_now_link; ?>" class="readmore" style="color: <?php echo $donate_now_cta_button_text_color; ?>"><?php echo $donate_now_link_text; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if ($donate_now_image) { ?>
                    <div class="cta-image">
                        <div class="cta-thumb">
                            <figure class="object-fit"><img src="<?php echo $donate_now_image['url']; ?>" alt="<?php echo $donate_now_image['alt']; ?>" title="<?php echo $donate_now_image['title']; ?>" /></figure>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php
$stories_heading = get_field('default_page_donor_stories_heading');
$stories_repeater = get_field('default_page_donor_stories_repeater');
?>

<?php if ($stories_heading || ($stories_repeater && have_rows($stories_repeater))) { ?>
    <section class="stories-slider">
        <div class="bg"></div>
        <div class="container">
            <?php if ($stories_heading) { ?>
                <h2><?php echo $stories_heading; ?></h2>
            <?php } ?>
            <div class="stories-slider-wrap">
                <div class="slider slider-nav">
                    <?php if ($stories_repeater) { ?>
                        <?php foreach ($stories_repeater as $stories) {
                            $stories_repeater_heading = $stories['default_page_donor_stories_repeater_heading'];
                            $stories_description = $stories['default_page_donor_stories_description'];
                        ?>
                            <div class="stories-thumb">
                                <div class="stories-thumb-nav">
                                    <?php if ($stories_repeater_heading) { ?>
                                        <div class="h6"><?php echo $stories_repeater_heading; ?></div>
                                    <?php } ?>
                                    <?php if ($stories_description) { ?>
                                        <?php echo $stories_description; ?>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class="slider slider-for">
                    <?php foreach ($stories_repeater as $stories) {
                        $stories_image = $stories['default_page_donor_stories_image'];
                        $stories_repeater_heading = $stories['default_page_donor_stories_repeater_heading'];
                        $repeater_video_type = $stories['default_page_donor_stories_repeater_video_type'];
                        $repeater_youtube_id = $stories['default_page_donor_stories_repeater_youtube_id'];
                        $repeater_vimeo_id = $stories['default_page_donor_stories_repeater_vimeo_id'];
                    ?>
                        <div class="stories-slide">
                            <?php if ($stories_image) { ?>
                                <figure class="object-fit">
                                    <img src="<?php echo $stories_image['url']; ?>" alt="<?php echo $stories_image['alt']; ?>" title="<?php echo $stories_image['title']; ?>" />
                                </figure>
                            <?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
                                <div class="play-btn-main flex flex-center">
                                    <a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
                                        <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                                        <span class="play-btn-txt"> <?php echo $stories_repeater_heading; ?> Promise</span>
                                    </a>
                                </div>
                            <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                                <div class="play-btn-main flex flex-center">
                                    <a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
                                        <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                                        <span class="play-btn-txt"> <?php echo $stories_repeater_heading; ?> Promise</span>
                                    </a>
                                </div>
                            <?php } } ?>
                        </div>
                    <?php } } ?>
                </div>

            </div>
        </div>
    </section>
<?php } ?>



<?php
$default_page_meet_our_donors_heading = get_field('default_page_meet_our_donors_heading');
$default_page_meet_our_donors_description = get_field('default_page_meet_our_donors_description');
$default_page_meet_our_donors_button_text = get_field('default_page_meet_our_donors_button_text');
$default_page_meet_our_donors_button_link = get_field('default_page_meet_our_donors_button_link');
$default_page_meet_our_donors_repeater = get_field('default_page_meet_our_donors_repeater');
?>

<section class="meet-our-donors">
    <div class="meet-donors-bg pos-absolute">&nbsp;</div>
    <div class="container">
        <div class="meet-donors-main">
            <?php if ($default_page_meet_our_donors_heading) { ?>
                <h2><?php echo $default_page_meet_our_donors_heading; ?></h2>
            <?php } ?>
            <div class="bottom-frame">
                <?php if ($default_page_meet_our_donors_description) { ?>
                    <div class="frame-lt">
                        <?php echo $default_page_meet_our_donors_description; ?>
                    </div>
                    <div class="frame-mid">
                        <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
                    </div>
                <?php } ?>
                <div class="frame-rt">
                    <?php if ($default_page_meet_our_donors_button_link && $default_page_meet_our_donors_button_text) { ?>
                        <a href="<?php echo $default_page_meet_our_donors_button_link; ?>" class="button"><?php echo $default_page_meet_our_donors_button_text; ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php if ($default_page_meet_our_donors_repeater) { ?>
                <div class="meet-donors-wrap">
                    <?php foreach ($default_page_meet_our_donors_repeater as $donor) {
                        $default_page_meet_our_donors_add_donor = $donor['default_page_meet_our_donors_add_donor'];
                        if ($default_page_meet_our_donors_add_donor) { ?>
                            <div class="our-donor-thumb">
                                <figure class="object-fit"> <img src="<?php echo $default_page_meet_our_donors_add_donor['url']; ?>" alt="<?php echo $home_meet_our_donors_add_donor['alt']; ?>" title="<?php echo $home_meet_our_donors_add_donor['title']; ?>" /></figure>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php $testimonials_heading = get_field('default_page_testimonials_heading');
$selected_testimonials = get_field('default_post_select_testimonials');
$colors = ['var(--elevated)', 'var(--elevateddark)', 'var(--lilictint)', 'var(--lilicdark)', 'var(--goldtint)', 'var(--gold)'];
$index = 0; ?>

<section class="gratitude-wall">
    <div class="container">
        <div class="heading">
            <?php if ($testimonials_heading) { ?>
                <div class="heading-lt">
                    <h2><?php echo  $testimonials_heading; ?></h2>
                </div>
            <?php } ?>
            <div class="heading-rt hide-in-mobile">
                <div class="heading-btn"> <a href="/our-thanks/" class="button outline-btn-white">View all thanks</a> </div>
            </div>
        </div>
        <div class="masonry-main">
            <?php if ($selected_testimonials) { ?>
                <?php foreach ($selected_testimonials as $testimonial) {
                    $color_class = $colors[$index % count($colors)]; ?>
                    <div class="masonry-block">
                        <div class="masonry-bg pos-absolute" style="background: <?php echo $color_class; ?>;"></div>
                        <?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
                        <div class="gratitude-by">
                            <div class="grat-line">&nbsp;</div>
                            <span class="gratitude-name"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
                            <span class="gratitude-pos"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
                        </div>
                    </div>
                    <?php $index++; ?>
                <?php } ?>
            <?php } else {
            ?>
                <?php
                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 6
                );
                $testimonials_query = new WP_Query($args);
                if ($testimonials_query->have_posts()) {
                    while ($testimonials_query->have_posts()) {
                        $testimonials_query->the_post();
                        $color_class = $colors[$index % count($colors)]; ?>
                        <div class="masonry-block">
                            <div class="masonry-bg pos-absolute" style="background: <?php echo $color_class; ?>;"></div>
                            <?php echo get_field('testimonial_post_review'); ?>
                            <div class="gratitude-by">
                                <div class="grat-line">&nbsp;</div>
                                <span class="gratitude-name"><?php echo get_field('testimonial_post_name'); ?></span>
                                <span class="gratitude-pos"><?php echo get_field('testimonial_post_position_title_or_credential'); ?></span>
                            </div>
                        </div>
                        <?php $index++; ?>
                <?php }
                    wp_reset_postdata();
                }
                ?>
            <?php } ?>
        </div>
   
    <div class="hide-in-desktop hide-in-tab heading-btn btn-full"> <a href="#" class="button outline-btn-white">View all thanks</a> </div>
    </div> </div>
</section>


<?php
$cta_image = get_field('default_page_cta_image');
$cta_color_picker = get_field('default_page_cta_background_color');
$cta_text_color = get_field('default_page_cta_text_color');
$cta_button_color = get_field('default_page_cta_button_color');
$cta_button_text_color = get_field('default_page_cta_button_text_color');
$cta_sub_heading = get_field('default_page_cta_sub_heading');
$cta_heading = get_field('default_page_cta_heading');
$cta_description = get_field('default_paget_cta_description');
$cta_button_text = get_field('default_page_cta_button_text');
$cta_button_link = get_field('default_page_cta_button_link');
$cta_link_text = get_field('default_page_cta_link_text');
$cta_link = get_field('default_page_cta_link');
?>
<?php if ($cta_image || $cta_sub_heading || $cta_heading || $cta_description || ($cta_button_text && $cta_button_link) || ($cta_link_text && $cta_link)) { ?>

    <section class="cta-module donate-cta">
        <div class="cta-overlay pos-absolute"></div>
        <div class="container">
            <div class="cta-main flex" style="background:<?php echo $cta_color_picker; ?>;">
                <div class="cta-main-text">
                    <?php if ($cta_sub_heading) { ?>
                        <div class="cta-txt"> <span class="optional-text" style="color: <?php echo $cta_text_color; ?>"><?php echo $cta_sub_heading; ?></span>
                        <?php }
                    if ($cta_heading) { ?>
                            <div class="h3" style="color: <?php echo $cta_text_color; ?>"><?php echo $cta_heading; ?></div>
                        <?php }
                    if ($cta_description) { ?>
                            <?php echo $cta_description; ?>
                        <?php }
                    if (($cta_button_text && $cta_button_link) || ($cta_link_text && $cta_link)) { ?>
                            <div class="cta-btns flex flex-vcenter">
                                <?php if ($cta_button_text && $cta_button_link) { ?>
                                    <a href="<?php echo $cta_button_link; ?>" class="button btn-white" style=" background:<?php echo $cta_button_color; ?>; color: <?php echo $cta_button_text_color; ?>"><?php echo $cta_button_text; ?></a>
                                <?php }
                                if ($cta_link_text && $cta_link) { ?>
                                    <a href="<?php echo $cta_link; ?>" class="readmore" style="color: <?php echo $cta_text_color; ?>"><?php echo $cta_link_text; ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        </div>
                </div>
                <?php if ($cta_image) { ?>
                    <div class="cta-image">
                        <div class="cta-thumb">
                            <figure class="object-fit"> <img src="<?php echo $cta_image['url']; ?>" alt="<?php echo $cta_image['alt']; ?>" title="<?php echo $cta_image['title']; ?>" /> </figure>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>




<?php
$pointed_message_heading = get_field('default_page_pointed_message_heading');
$pointed_message_features = get_field('default_page_pointed_message_features');
$pointed_message_message = get_field('default_page_pointed_message_message');
$pointed_message_button_text = get_field('default_page_pointed_message_button_text');
$pointed_message_button_link = get_field('default_page_pointed_message_button_link');
?>

<section class="subhead-module">
    <div class="container">
        <?php if (!empty($pointed_message_heading)) { ?>
            <h2><?php echo $pointed_message_heading; ?></h2>
        <?php } ?>

        <div class="bg pos-absolute"></div>

        <?php if ($pointed_message_features) { ?>
            <div class="subhead-wrap flex">
                <?php foreach ($pointed_message_features as $feature) { ?>
                    <?php
                    $feature_image = $feature['default_page_pointed_message_feature_image'];
                    $feature_sub_heading = $feature['default_page_pointed_message_feature_sub_heading'];
                    $feature_heading = $feature['default_page_pointed_message_feature_heading'];
                    $feature_description = $feature['default_page_pointed_message_feature_description'];
                    $feature_link_text = $feature['default_page_pointed_message_feature_link_text'];
                    $feature_link = $feature['default_page_pointed_message_feature_link'];
                    ?>
                    <div class="subhead-grid">
                        <?php if (!empty($feature_image)) { ?>
                            <div class="subhead-thumb pos-relative">
                                <figure class="object-fit">
                                    <a href="#"><img src="<?php echo $feature_image['url']; ?>" alt="<?php echo $feature_image['alt']; ?>" title="<?php echo $feature_image['title']; ?>" /></a>
                                </figure>
                            </div>
                        <?php } ?>
                        <?php if (!empty($feature_sub_heading)) { ?>
                            <span class="optional-text"><?php echo $feature_sub_heading; ?></span>
                        <?php } ?>
                        <?php if (!empty($feature_heading)) { ?>
                            <div class="h3"><a href="#"><?php echo $feature_heading; ?></a></div>
                        <?php } ?>
                        <?php if (!empty($feature_description)) { ?>
                            <?php echo $feature_description; ?>
                        <?php } ?>
                        <?php if (!empty($feature_link_text) && !empty($feature_link)) { ?>
                            <a href="<?php echo $feature_link; ?>" class="readmore"><?php echo $feature_link_text; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="bottom-frame">
            <div class="frame-lt">
                <?php if (!empty($pointed_message_message)) { ?>
                    <?php echo $pointed_message_message; ?>
                <?php } ?>
            </div>
            <div class="frame-mid">
                <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
            </div>
            <?php if (!empty($pointed_message_button_text) && !empty($pointed_message_button_link)) { ?>
                <div class="frame-rt"><a href="<?php echo $pointed_message_button_link; ?>" class="button"><?php echo $pointed_message_button_text; ?></a> </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
$volunteer_image = get_field('default_page_volunteer_image');
$volunteer_color_picker = get_field('default_page_volunteer_background_color');
$volunteer_text_color = get_field('default_page_volunteer_text_color');
$volunteer_button_color = get_field('default_page_volunteer_button_color');
$volunteer_button_text_color = get_field('default_page_volunteer_button_text_color');
$volunteer_sub_heading = get_field('default_page_volunteer_sub_heading');
$volunteer_heading = get_field('default_page_volunteer_heading');
$volunteer_description = get_field('default_page_volunteer_description');
$volunteer_button_text = get_field('default_page_volunteer_button_text');
$volunteer_button_link = get_field('default_page_volunteer_button_link');
$volunteer_link_text = get_field('default_page_volunteer_link_text');
$volunteer_link = get_field('default_page_volunteer_link');
?>

<?php if (!empty($volunteer_image) || !empty($volunteer_sub_heading) || !empty($volunteer_heading) || !empty($volunteer_description) || (!empty($volunteer_button_text) && !empty($volunteer_button_link)) || (!empty($volunteer_link_text) && !empty($volunteer_link))) { ?>
    <section class="cta-module volunteer-cta">
        <div class="cta-overlay pos-absolute"></div>
        <div class="container">
            <div class="cta-main flex" style="background:<?php echo $volunteer_color_picker; ?>;">
                <div class="cta-main-text">
                    <div class="cta-txt">
                        <?php if (!empty($volunteer_sub_heading)) { ?>
                            <span class="optional-text" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_sub_heading; ?></span>
                        <?php } ?>
                        <?php if (!empty($volunteer_heading)) { ?>
                            <div class="h3" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_heading; ?></div>
                        <?php } ?>
                        <?php if (!empty($volunteer_description)) { ?>
                            <?php echo $volunteer_description; ?>
                        <?php } ?>
                        <div class="cta-btns flex flex-vcenter">
                            <?php if (!empty($volunteer_button_text) && !empty($volunteer_button_link)) { ?>
                                <a href="<?php echo $volunteer_button_link; ?>" class="button btn-white" style=" background:<?php echo $volunteer_button_color; ?>; color: <?php echo $volunteer_button_text_color; ?>"><?php echo $volunteer_button_text; ?></a>
                            <?php } ?>
                            <?php if (!empty($volunteer_link_text) && !empty($volunteer_link)) { ?>
                                <a href="<?php echo $volunteer_link; ?>" class="readmore" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_link_text; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if (!empty($volunteer_image)) { ?>
                    <div class="cta-image">
                        <div class="cta-thumb">
                            <figure class="object-fit">
                                <img src="<?php echo $volunteer_image['url']; ?>" alt="<?php echo $volunteer_image['alt']; ?>" title="<?php echo $volunteer_image['title']; ?>" />
                            </figure>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_the_content()) { ?>
    <section class="general-default-container">
        <div class="container">
            <div class="general-default-inner">
                <div class="container-sm">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php  } ?>


<script>
    /* Tabs */
    jQuery("#tabs").tabs();
</script>

<?php get_footer(); ?>
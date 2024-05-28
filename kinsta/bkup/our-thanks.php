<?php
/*
Template Name: Our Thanks Page Template
*/
get_header();
?>


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
$video_or_static_image = get_field('common_banner_static_image_or_video');
$home_banner_video_type = get_field('common_banner_video_type');
$home_banner_youtube_id = get_field('common_banner_yotube_id');
$home_banner_vimeo_id = get_field('common_banner_vimeo_id');
$banner_fallback_desktop_image = get_field('common_banner_fallback_desktop_image');
$banner_fallback_mobile_image = get_field('common_banner_fallback_mobile_image');

if (empty($common_desktop_image) && empty($common_mobile_image)) {
  $no_banner_img = 'no-banner-img';
} else {
  $no_banner_img = '';
} ?>


<section class="split-banner-section pos-relative  <?php echo  $no_banner_img; ?>">
  <div class="container">
    <div class="split-banner-main flex" style="background:<?php echo $common_color_picker; ?>;">
      <div class="split-banner-text">
        <div class="split-txt-inner">
          <div class="split-banner-bg pos-absolute" style="color: <?php echo $common_text_color; ?>">&nbsp;</div>
          <?php if ($common_sub_heading_one || $common_sub_heading_two) { ?>
            <div class="banner-cat">
              <ul>
                <?php if ($common_sub_heading_one) { ?>
                  <li style="color: <?php echo $common_text_color; ?>"><?php echo $common_sub_heading_one; ?></li>
                <?php } ?>
                <?php if ($common_sub_heading_two) { ?>
                  <li style="color: <?php echo $common_text_color; ?>"><?php echo $common_sub_heading_two; ?></li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>
          <?php if ($common_heading) { ?>
            <h1 style="color: <?php echo $common_heading_text_color; ?>"><?php echo $common_heading; ?></h1>
          <?php } else { ?>
            <h1 style="color: <?php echo $common_heading_text_color; ?>"><?php echo get_the_title(); ?></h1>
          <?php } ?>
          <?php if ($common_button_text && $common_button_link) { ?>
            <div class="btn-wrap"><a href="<?php echo $common_button_link; ?>" class="button btn-white" style=" background:<?php echo $common_button_color; ?>; color: <?php echo $common_button_text_color; ?>"><?php echo $common_button_text; ?></a></div>
          <?php } ?>
        </div>
      </div>
      <?php if ($video_or_static_image == 'static_image') {
        if ($common_mobile_image ||  $common_desktop_image) {
          $common_mobile_image = $common_mobile_image ? $common_mobile_image : $common_desktop_image;
          $common_desktop_image = $common_desktop_image ? $common_desktop_image : $common_mobile_image; ?>

          <div class="split-banner-thumb">
            <div class="contact-img">
              <picture class="object-fit">
                <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 1024px)">
                <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 768px)">
                <img src="<?php echo $common_mobile_image['url']; ?>" alt="<?php echo $common_mobile_image['alt']; ?>" title="<?php echo $common_mobile_image['title']; ?>" />
              </picture>
            </div>
          </div>
        <?php }
      } else {
        if ($video_or_static_image === 'video') {
          $background_image_url = isset($banner_fallback_desktop_image['url']) ? $banner_fallback_desktop_image['url'] : '';
          $background_mobile_image_url = isset($banner_fallback_mobile_image['url']) ? $banner_fallback_mobile_image['url'] : '';
          $mobile_image_alt = isset($banner_fallback_mobile_image['alt']) ? $banner_fallback_mobile_image['alt'] : '';

          if (empty($background_mobile_image_url) || !$background_mobile_image_url) {
            $background_mobile_image_url = $background_image_url;
            if (empty($mobile_image_alt) || !$mobile_image_alt) {
              $mobile_image_alt = isset($banner_fallback_desktop_image['alt']) ? $banner_fallback_desktop_image['alt'] : '';
            }
          }
        ?>
          <div class="poster-bg background-bg">
            <picture class="banner-thumb object-fit">
              <?php if ($background_image_url) { ?>
                <source srcset="<?php echo $background_image_url; ?>" media="(min-width: 768px)">
                <img loading="eager" class="poster-img" src="<?php echo $background_mobile_image_url; ?>" alt="<?php echo $mobile_image_alt; ?>">
              <?php } ?>
            </picture>
          </div>

          <?php if ($home_banner_video_type === 'vimeo' && $home_banner_vimeo_id) { ?>
            <div class="banner-bg background-bg home-banner-iframe" data-ytbg-fade-in="true" data-youtube="https://vimeo.com/<?php echo $home_banner_vimeo_id; ?>"> </div>
          <?php } elseif ($home_banner_video_type === 'youtube' && $home_banner_youtube_id) { ?>
            <div class="banner-bg background-bg home-banner-iframe" data-ytbg-fade-in="true" data-youtube="https://www.youtube.com/watch?v=<?php echo $home_banner_youtube_id; ?>"> </div>
          <?php } ?>
      <?php }
      } ?>
    </div>
  </div>
</section>

<?php
$stories_heading = get_field('our_thanks_donor_stories_heading');
$stories_repeater = get_field('our_thanks_donor_stories_repeater');
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
              $stories_repeater_heading = $stories['our_thanks_donor_stories_repeater_heading'];
              $stories_description = $stories['our_thanks_donor_stories_description'];
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
              $stories_image = $stories['our_thanks_donor_stories_image'];
              $stories_repeater_heading = $stories['our_thanks_donor_stories_repeater_heading'];
              $repeater_video_type = $stories['our_thanks_donor_stories_video_type'];
              $repeater_youtube_id = $stories['our_thanks_donor_stories_repeater_youtube_id'];
              $repeater_vimeo_id = $stories['our_thanks_donor_stories_repeater_vimeo_id'];
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
                      <span class="play-btn-txt"> <?php echo $stories_repeater_heading; ?></span>
                    </a>
                  </div>
                <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                  <div class="play-btn-main flex flex-center">
                    <a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
                      <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                      <span class="play-btn-txt"> <?php echo $stories_repeater_heading; ?></span>
                    </a>
                  </div>
              <?php }
              } ?>
            </div>
          <?php } ?>
        <?php } ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php
$short_introduction_sub_heading = get_field('our_thanks_short_introduction_sub_heading');
$short_introduction_heading = get_field('our_thanks_short_introduction_heading');
$short_introduction_description = get_field('our_thanks_short_introduction_description');
$short_introduction_features = get_field('our_thanks_short_introduction_features');

if (empty($short_introduction_sub_heading) && empty($short_introduction_heading)) {
  $no_head = 'no-head';
} else {
  $no_head = '';
}

if ($short_introduction_sub_heading  || $short_introduction_heading || $short_introduction_description  || $short_introduction_features) {
?>
  <section class="short-intro-section pos-relative <?php echo $no_head; ?>">
    <div class="short-intro-bg pos-absolute" style="background: var(--elevated)"></div>
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
              $icon_or_svg = $item['our_thanks_short_introduction_icon_or_svg'];
              $icon = $item['our_thanks_short_introduction_icon'];
              $svg = $item['our_thanks_short_introduction_svg'];
              $description = $item['our_thanks_short_introduction_repeater_description'];
              $link = $item['our_thanks_short_introduction_repeater_link'];
              $link_text = $item['our_thanks_short_introduction_repeater_link_text']; ?>
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
<?php } ?>

<?php $testimonials_heading = get_field('our_thanks_testimonials_heading');
$selected_testimonials = get_field('our_thanks_select_testimonials');
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
        <div class="heading-btn"> <a href="#" class="button outline-btn-white">View all thanks</a> </div>
        <!-- end of heading btn -->
      </div>
    </div>
    <!-- end of heading -->
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
      <?php } else { // If no testimonials are selected, display first 6 posts from testimonial CPT 
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
                <span class="gratitude-pos"><?php echo get_field('testimonial_position_title_or_credential'); ?></span>
              </div>
            </div>
            <?php $index++; ?>
        <?php }
          wp_reset_postdata();
        }
        ?>
      <?php } ?>
    </div>
    <!-- end of masonry block -->
  </div>
  <!-- end of masonry main -->
  <div class="hide-in-desktop hide-in-tab heading-btn btn-full"> <a href="#" class="button outline-btn-white">View all thanks</a> </div>
  </div>
</section>


<?php
$message_of_thanks_image = get_field('our_thanks_message_of_thanks_image');
$message_of_thanks_message = get_field('our_thanks_message_of_thanks_message');
$message_of_thanks_form_id = get_field('our_thanks_message_of_thanks_form_id');
?>


<section class="testimonial-form">
  <div class="container">
    <div class="testimpnial-form-inner flex">
      <div class="testimonial-lt">
        <div class="message">
          <?php if ($message_of_thanks_message) { ?>
            <div class="bubble"><?php echo $message_of_thanks_message; ?></div>
          <?php } ?>
          <!-- end of bubble -->
          <?php if ($message_of_thanks_image) { ?>
            <div class="bubble-img">
              <figure class="object-fit"> <img src="<?php echo $message_of_thanks_image['url']; ?>" alt="<?php echo $message_of_thanks_image['alt']; ?>" title="<?php echo $message_of_thanks_image['title']; ?>" /></figure>
            </div>
          <?php } ?>
          <!-- end of bubble -->
        </div>
        <!-- end of message -->
      </div>
      <!-- end of testimonial lt-->
      <div class="testimonial-rt">
        <div class="default_form_dark">
          <?php if ($message_of_thanks_form_id) { ?>
            <?php echo do_shortcode($message_of_thanks_form_id); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of testimonial form -->



<?php
$our_thanks_select_testimonials_one = get_field('our_thanks_select_testimonials_one');
$colors = ['var(--elevated)', 'var(--elevateddark)', 'var(--lilictint)', 'var(--lilicdark)', 'var(--goldtint)', 'var(--gold)'];
$index = 0; ?>

<section class="gratitude-wall rep-grat">
  <div class="container">
    <div class="masonry-main">
      <?php if ($our_thanks_select_testimonials_one) { ?>
        <?php foreach ($our_thanks_select_testimonials_one as $testimonial_one) {
          $color_class = $colors[$index % count($colors)]; ?>
          <div class="masonry-block">
            <div class="masonry-bg pos-absolute" style="background: <?php echo $color_class; ?>;"></div>
            <?php echo get_field('testimonial_post_review', $testimonial_one->ID); ?>
            <div class="gratitude-by">
              <div class="grat-line">&nbsp;</div>
              <!--end of grat line--> <span class="gratitude-name"><?php echo get_field('testimonial_post_name', $testimonial_one->ID); ?></span><!-- end of gratitude name -->
              <span class="gratitude-pos"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial_one->ID); ?></span><!-- end of gratitude name -->
            </div>
            <!-- end of gratitude by -->
          </div>
          <?php $index++; ?>
        <?php } ?>
        <?php } else {
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
              <?php echo get_field('testimonial_post_review', $testimonial_one->ID); ?>
              <div class="gratitude-by">
                <div class="grat-line">&nbsp;</div>
                <!--end of grat line--> <span class="gratitude-name"><?php echo get_field('testimonial_post_name', $testimonial_one->ID); ?></span><!-- end of gratitude name -->
                <span class="gratitude-pos"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial_one->ID); ?></span><!-- end of gratitude name -->
              </div>
              <!-- end of gratitude by -->
            </div>
            <?php $index++; ?>
        <?php }
          wp_reset_postdata();
        }
        ?>
      <?php } ?>
      <div class="hide-in-desktop hide-in-tab heading-btn btn-full"> <a href="#" class="button outline-btn-white">View all thanks</a> </div>
    </div>
</section>

<?php
$cta_image = get_field('our_thanks_cta_image');
$cta_color_picker = get_field('our_thanks_cta_background_color');
$cta_text_color = get_field('our_thanks_cta_text_color');
$cta_button_color = get_field('our_thanks_cta_button_color');
$cta_button_text_color = get_field('our_thanks_cta_button_text_color');
$cta_sub_heading = get_field('our_thanks_cta_sub_heading');
$cta_heading = get_field('our_thanks_cta_heading');
$cta_description = get_field('our_thanks_cta_description');
$cta_button_text = get_field('our_thanks_cta_button_text');
$cta_button_link = get_field('our_thanks_cta_button_link');
$cta_link_text = get_field('our_thanks_cta_link_text');
$cta_link = get_field('our_thanks_cta_link');
?>
<?php if ($cta_image || $cta_sub_heading || $cta_heading || $cta_description || ($cta_button_text && $cta_button_link) || ($cta_link_text && $cta_link)) { ?>

  <section class="cta-module">
    <div class="cta-overlay pos-absolute"></div>
    <!-- end of cta overlay -->
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
<!-- end of cta module -->

<?php
$thanking_donors_heading = get_field('our_thanks_thanking_donors_heading');
$thanking_donors_note_one = get_field('our_thanks_thanking_donors_note_one');
$thanking_donors_note_two = get_field('our_thanks_thanking_donors_note_two');
$thanking_donors_group_repeater = get_field('our_thanks_thanking_donors_group_repeater');
?>

<section class="donor-listing">
  <div class="container">
    <div class="donor-listing-main">
      <?php if ($thanking_donors_heading) { ?>
        <h3><?php echo $thanking_donors_heading; ?></h3>
      <?php } ?>
      <div class="donor-accordion">
        <ul class="donor-tabs">
          <?php if ($thanking_donors_group_repeater) {
            $tab_index = 0;
            foreach ($thanking_donors_group_repeater as $group) {
              $our_thanks_thanking_donors_group_name = $group['our_thanks_thanking_donors_group_name'];
              if ($our_thanks_thanking_donors_group_name) { ?>
                <li class="donor-tab<?php if ($tab_index === 0) echo ' accordion-active'; ?>" data-actab-group="0" data-actab-id="<?php echo $tab_index; ?>"><?php echo $our_thanks_thanking_donors_group_name; ?></li>
            <?php }
              $tab_index++;
            } ?>
        </ul>
        <div class="donor-content">
          <?php
            $tab_index = 0;
            foreach ($thanking_donors_group_repeater as $group) {
              $our_thanks_thanking_donors_group_name = $group['our_thanks_thanking_donors_group_name'];
              $our_thanks_thanking_donors_names_repeater = $group['our_thanks_thanking_donors_names_repeater'];
              $our_thanks_thanking_donors_message = $group['our_thanks_thanking_donors_message'];
          ?>
            <article class="donor-item<?php if ($tab_index === 0) echo ' accordion-active'; ?>" data-actab-group="0" data-actab-id="<?php echo $tab_index; ?>">
              <div class="donor-item__label"><?php echo $our_thanks_thanking_donors_group_name; ?></div>
              <div class="donor-item__container">
                <ul>
                  <?php if ($our_thanks_thanking_donors_names_repeater) {
                    foreach ($our_thanks_thanking_donors_names_repeater as $donors_names) {
                      $our_thanks_thanking_donors_name = $donors_names['our_thanks_thanking_donors_name'];
                      $our_thanks_thanking_donors_link = $donors_names['our_thanks_thanking_donors_link'];
                      $our_thanks_thanking_donors_special_campaign = $donors_names['our_thanks_thanking_donors_special_campaign'];
                      if (!empty($our_thanks_thanking_donors_link)) { ?>

                        <li <?php if ($our_thanks_thanking_donors_special_campaign == 'star') echo 'class="star"'; ?>>
                          <a href="<?php echo $our_thanks_thanking_donors_link; ?>">
                            <?php echo $our_thanks_thanking_donors_name; ?>
                          </a>
                        </li>

                      <?php } else { ?>
                        <li <?php if ($our_thanks_thanking_donors_special_campaign == 'star') echo 'class="star"'; ?>>

                          <?php echo $our_thanks_thanking_donors_name; ?>

                        </li>
                  <?php }
                    }
                  } ?>
                </ul>
              </div>
              <?php if ($our_thanks_thanking_donors_message) { ?>
                <div class="donor-item__container">
                  <?php echo $our_thanks_thanking_donors_message; ?>
                </div>
              <?php } ?>
            </article>
          <?php
              $tab_index++;
            } ?>
          <div class="donor-info pos-relative">
            <ul>
              <?php if ($thanking_donors_note_one) { ?>
                <li class="star"><?php echo $thanking_donors_note_one; ?></li>
              <?php }
              if ($thanking_donors_note_two) { ?>
                <li class="wills"><?php echo $thanking_donors_note_two; ?></li>
              <?php } ?>
            </ul>
          </div><!-- end of donor info -->
        </div>
      <?php } ?>
      </div>
    </div>
</section>

<!-- end of donor listing -->

<?php get_footer();

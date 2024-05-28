<?php
/*
Template Name: Why Give Page Template
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
}?>

<section class="default-banner-section pos-relative <?php echo  $no_banner_img; ?>">

  <?php  if ($video_or_static_image == 'static_image') {

  if ($common_mobile_image ||  $common_desktop_image) {
    $common_mobile_image = $common_mobile_image ? $common_mobile_image : $common_desktop_image;
    $common_desktop_image = $common_desktop_image ? $common_desktop_image : $common_mobile_image; ?>
    <div class="banner-bg object-fit">
      <picture>
        <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 1024px)">
        <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 768px)">
        <img src="<?php echo $common_mobile_image['url']; ?>" alt="<?php echo $common_mobile_image['alt']; ?>" title="<?php echo $common_mobile_image['title']; ?>" />
      </picture>
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
  <div class="container">
    <div class="default-banner-main flex flex-vcenter" >
      <div class="default-banner-text">
        <div class="default-banner-bg pos-absolute" style="background:<?php echo $common_color_picker; ?>;">&nbsp;</div>
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
        <?php   }
          ?>
        <?php if ($common_button_text && $common_button_link) { ?>
          <div class="btn-wrap"><a href="<?php echo $common_button_link; ?>" class="button btn-white" style=" background:<?php echo $common_button_color; ?>; color: <?php echo $common_button_text_color; ?>"><?php echo $common_button_text; ?></a></div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php
$pressures_heading = get_field('why_give_current_pressures_heading');
$pressures_description = get_field('why_give_current_pressures_description');
$group_name_repeater = get_field('why_give_current_pressures_group_name_repeater');
$west_end_message = get_field('why_give_west_end_message');
$west_end_button_text = get_field('why_give_west_end_button_text');
$west_end_button_link = get_field('why_give_west_end_button_link');

$color_classes = array(
  'teal',
  'purple',
  'mauve',
  'lilac'
);
if ($pressures_heading || $pressures_description || $group_name_repeater || $west_end_message || ($west_end_button_text && $west_end_button_link)) { ?>

  <section class="stats-module stats-filter">
    <div class="container">
      <div class="stats-wrap">
        <?php if ($pressures_heading || $pressures_description) { ?>
          <div class="stats-intro-main flex">
            <?php if ($pressures_heading) { ?>
              <div class="stats-intro-lt">
                <h2><?php echo $pressures_heading; ?></h2>
              </div>
            <?php } ?>
            <?php if ($pressures_description) { ?>
              <div class="stats-intro-rt">
                <?php echo $pressures_description; ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        <div id="tabs">
          <ul>
            <?php if ($group_name_repeater) {
              $i = 1; ?>
              <?php foreach ($group_name_repeater as $group_name_item) { ?>
                <?php
                $group_name = $group_name_item['why_give_current_pressures_group_name'];
                $font_awesome_text = $group_name_item['why_give_current_pressures_group_name_font_awesome_text'];
                ?>
                <?php if ($group_name || $font_awesome_text) { ?>
                  <li><a href="#tabs-<?php echo $i; ?>"><?php echo $group_name; ?><span class="icon-wrap"><span class="normal-icon"><i class="fa-light <?php echo $font_awesome_text; ?>"></i></span><span class="hover-icon"><i class="fa-sharp fa-light fa-arrow-right"></i></span></span></a></li>
              <?php }
                $i++;
              } ?>
            <?php } ?>
          </ul>
          <?php if ($group_name_repeater) { ?>
            <?php
            $j = 1;
            foreach ($group_name_repeater as $group_name_item) { ?>
              <?php
              $statistics = $group_name_item['why_give_current_pressures_statistics'];
              ?>
              <section id="tabs-<?php echo $j; ?>">
                <div class="stats-row stats-type flex" data-counter-main="counter-main">
                  <?php if ($statistics) { ?>
                    <?php foreach ($statistics as $index => $statistic) { ?>
                      <?php
                      $color_class = $color_classes[$index % count($color_classes)];
                      $before_text = $statistic['why_give_current_pressures_statistics_before_text'];
                      $number = $statistic['why_give_current_pressures_statistics_number'];
                      $after_text = $statistic['why_give_current_pressures_statistics_after_text'];
                      $description = $statistic['why_give_current_pressures_statistics_description'];
                      ?>
                      <div class="stats-list <?php echo $color_class; ?>">
                        <div class="line pos-absolute">&nbsp;</div>
                        <span class="number">
                        <span class="big" data-duration="2500"  data-count-to="<?php  echo $number; ?>" ><?php if ($before_text) {
                                            echo $before_text;
                                          }
                                          if ($number) {
                                            echo $number;
                                          }
                                          ?></span><?php if ($after_text) {
                                            echo $after_text;
                                          } ?></span>
                        <?php if ($description) { ?>
                          <div class="stats-cnt">
                            <?php echo $description; ?>
                          </div>
                        <?php } ?>
                      </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </section>
            <?php $j++;
            } ?>
          <?php } ?>
        </div>
        <?php if ($west_end_message || ($west_end_button_text && $west_end_button_link)) { ?>
          <div class="bottom-frame">
            <?php if ($west_end_message) { ?>
              <div class="frame-lt">
                <?php echo $west_end_message; ?>
              </div>
            <?php } ?>
            <div class="frame-mid">
              <div class="animated-arrow"><span class="the-arrow right"><span class="shaft"></span></span></div>
            </div>
            <?php if ($west_end_button_text && $west_end_button_link) { ?>
              <div class="frame-rt"><a href="<?php echo $west_end_button_link; ?>" class="button"><?php echo $west_end_button_text; ?></a></div>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>



<?php
$stories_heading = get_field('why_give_patient_and_staff_stories_heading');
$select_patient_and_staff_stories = get_field('why_give_select_patient_and_staff_stories');


$default_stories = array();
if (empty($select_patient_and_staff_stories)) {
  $default_stories_query = new WP_Query(array(
    'post_type' => 'story',
    'posts_per_page' => 4,
  ));

  if ($default_stories_query->have_posts()) {
    while ($default_stories_query->have_posts()) {
      $default_stories_query->the_post();
      $default_stories[] = array(
        'image' => get_field('stories_image'),
        'short_introduction' => get_field('stories_short_introduction'),
        'permalink' => get_permalink(),
        'category' => get_the_terms(get_the_ID(), 'stories_category'),
        'title' => get_the_title(),
      );
    }
    wp_reset_postdata();
  }
}
?>

<section class="patient-staff-stories white-dots">
  <div class="ps-bg pos-absolute">&nbsp;</div>
  <div class="container">
    <div class="patient-staff-main flex">
      <div class="heading">
        <div class="heading-lt">
          <?php if (!empty($stories_heading)) { ?>
            <h2><?php echo $stories_heading; ?></h2>
          <?php } ?>
        </div>
        <div class="heading-rt hide-in-mobile">
          <div class="heading-btn"><a href="/your-impact/" class="button">View All</a></div>
        </div>
      </div>
      <div class="ps-lists flex">
        <?php if (!empty($select_patient_and_staff_stories)) { ?>
          <?php foreach ($select_patient_and_staff_stories as $story) { ?>
            <div class="ps-grid">
            <?php if (!empty($story_image)) { ?>
              <div class="ps-thumb">
              <a href="<?php echo $story['permalink']; ?>">
                <?php $story_image = get_field('stories_image', $story->ID); ?>
                  <figure class="object-fit"><img src="<?php echo $story_image['url']; ?>" alt="<?php echo $story_image['alt']; ?>" title="<?php echo $story_image['title']; ?>" />
                </figure>
                </a>
              </div>
              <?php } ?>
              <div class="ps-cnt">
                <div class="category flex">
                <?php $categories = get_the_terms($story->ID, 'stories_category'); ?>
                  <?php if (!empty($categories) && !is_wp_error($categories)) { ?>
                    <?php foreach ($categories as $term) { ?>
                      <span class="tag"><?php echo $term->name; ?></span>
                    <?php } ?>
                  <?php } ?>
                </div>
                
                  <p><a href="<?php echo get_permalink($story->ID); ?>"><?php echo get_the_title($story->ID); ?> </a></p>
               
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <?php foreach ($default_stories as $story) { ?>
            <div class="ps-grid">
            <?php if (!empty($story['image'])) { ?>
              <div class="ps-thumb">
              <a href="<?php echo $story['permalink']; ?>">
                  <figure class="object-fit"><img src="<?php echo $story['image']['url']; ?>" alt="<?php echo $story['image']['alt']; ?>" title="<?php echo $story['image']['title']; ?>" />
                </figure>
                </a>
              </div>
              <?php } ?>
              <div class="ps-cnt">
                <?php if (!empty($story['title'])) { ?>
                  <div class="category flex"> <?php if (!empty($story['category']) && !is_wp_error($story['category'])) { ?>
                    <?php foreach ($story['category'] as $term) { ?>
                      <?php if (is_object($term)) { ?>
                        <span class="tag"><?php echo $term->name; ?></span>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php } ?>
                
                  <p><a href="<?php echo $story['permalink']; ?>"><?php echo $story['title']; ?></a></p>
                
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="hide-in-desktop hide-in-tab heading-btn btn-full">
        <a href="/your-impact/" class="button">View All</a>
      </div>
    </div>
  </div>
</section>

<?php
$cta_image = get_field('why_give_cta_image');
$cta_color_picker = get_field('why_give_cta_background_color');
$cta_text_color = get_field('why_give_cta_text_color');
$cta_button_color = get_field('why_give_cta_button_color');
$cta_button_text_color = get_field('why_give_cta_button_text_color');
$cta_sub_heading = get_field('why_give_cta_sub_heading');
$cta_heading = get_field('why_give_cta_heading');
$cta_description = get_field('why_give_cta_description');
$cta_button_text = get_field('why_give_cta_button_text');
$cta_button_link = get_field('why_give_cta_button_link');
$cta_link_text = get_field('why_give_cta_link_text');
$cta_link = get_field('why_give_cta_link');
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
                  <a href="<?php echo $cta_button_link; ?>" class="button btn-white" style="background:<?php echo $cta_button_color; ?>; color: <?php echo $cta_button_text_color; ?>"><?php echo $cta_button_text; ?></a>
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
$why_give_testimonials_display = get_field('why_give_testimonials_display');
$why_give_testimonials_heading = get_field('why_give_testimonials_heading');
$why_give_select_testimonials = get_field('why_give_select_testimonials');
$colors = ['var(--elevated)', 'var(--elevateddark)', 'var(--lilictint)', 'var(--lilicdark)', 'var(--goldtint)', 'var(--gold)'];
$index = 0; 

if ($why_give_testimonials_display === 'yes') { ?>
<section class="gratitude-wall">
  <div class="container">
    <div class="heading">
      <?php if ($why_give_testimonials_heading) { ?>
        <div class="heading-lt">
          <h2><?php echo  $why_give_testimonials_heading; ?></h2>
        </div>
      <?php } ?>
      <div class="heading-rt hide-in-mobile">
        <div class="heading-btn"> <a href="/our-thanks/" class="button outline-btn-white">View all thanks</a> </div>
      </div>
    </div>
    <div class="masonry-main">
      <?php if ($why_give_select_testimonials) { ?>
        <?php foreach ($why_give_select_testimonials as $testimonial) {
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
  <div class="hide-in-desktop hide-in-tab heading-btn btn-full"> <a href="/our-thanks/" class="button outline-btn-white">View all thanks</a> </div>
  </div> </div>
</section>
<?php } ?>

<?php
$why_give_repeater_section = get_field('why_give_repeater_section');
if ($why_give_repeater_section) { ?>
  <section class="repeaters-module">
    <div class="repeater-bg pos-absolute">&nbsp;</div>
    <div class="container">
      <div class="repeaters-main flex pos-relative">
        <?php
        foreach ($why_give_repeater_section as $repeater) {
          $repeater_image = $repeater['why_give_repeater_section_image'];
          $repeater_video_type = $repeater['why_give_repeater_section_video_type'];
          $repeater_youtube_id = $repeater['why_give_repeater_section_youtube_id'];
          $repeater_vimeo_id = $repeater['why_give_repeater_section_vimeo_id'];
          $repeater_heading = $repeater['why_give_repeater_section_heading'];
          $repeater_description = $repeater['why_give_repeater_section_description'];
          $repeater_button_text = $repeater['why_give_repeater_section_button_text'];
          $repeater_button_link = $repeater['why_give_repeater_section_button_link'];
          $repeater_message = $repeater['why_give_repeater_section_message'];
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
$why_give_meet_our_donors_heading = get_field('why_give_meet_our_donors_heading');
$why_give_meet_our_donors_description = get_field('why_give_meet_our_donors_description');
$why_give_meet_our_donors_button_text = get_field('why_give_meet_our_donors_button_text');
$why_give_meet_our_donors_button_link = get_field('why_give_meet_our_donors_button_link');
$why_give_meet_our_donors_repeater = get_field('why_give_meet_our_donors_repeater');
?>
<section class="meet-our-donors">
  <div class="meet-donors-bg pos-absolute">&nbsp;</div>
  <div class="container">
    <div class="meet-donors-main">
      <?php if ($why_give_meet_our_donors_heading) { ?>
        <h2><?php echo $why_give_meet_our_donors_heading; ?></h2>
      <?php } ?>
      
        <div class="bottom-frame">
        <?php if ($why_give_meet_our_donors_description) { ?>
          <div class="frame-lt">
            <?php echo $why_give_meet_our_donors_description; ?>
          </div>
          <div class="frame-mid">
            <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
          </div>
          <?php } ?>
          <div class="frame-rt">
            <?php if ($why_give_meet_our_donors_button_link && $why_give_meet_our_donors_button_text) { ?>
              <a href="<?php echo $why_give_meet_our_donors_button_link; ?>" class="button"><?php echo $why_give_meet_our_donors_button_text; ?></a>
            <?php } ?>
          </div>
        </div>
      
      <?php if ($why_give_meet_our_donors_repeater) { ?>
        <div class="meet-donors-wrap">
          <?php foreach ($why_give_meet_our_donors_repeater as $donor) {
            $why_give_meet_our_donors_add_donor = $donor['why_give_meet_our_donors_add_donor'];
            if ($why_give_meet_our_donors_add_donor) { ?>
              <div class="our-donor-thumb">
                <figure class="object-fit"> <img src="<?php echo $why_give_meet_our_donors_add_donor['url']; ?>" alt="<?php echo $home_meet_our_donors_add_donor['alt']; ?>" title="<?php echo $home_meet_our_donors_add_donor['title']; ?>" /></figure>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


<?php
$volunteer_image = get_field('why_give_become_a_volunteer_image');
$volunteer_color_picker = get_field('why_give_become_a_volunteer_background_color');
$volunteer_text_color = get_field('why_give_become_a_volunteer_text_color');
$volunteer_button_color = get_field('why_give_become_a_volunteer_button_color');
$volunteer_button_text_color = get_field('why_give_become_a_volunteer_button_text_color');
$volunteer_sub_heading = get_field('why_give_become_a_volunteer_sub_heading');
$volunteer_heading = get_field('why_give_become_a_volunteer_heading');
$volunteer_description = get_field('why_give_become_a_volunteer_description');
$volunteer_button_text = get_field('why_give_become_a_volunteer_button_text');
$volunteer_button_link = get_field('why_give_become_a_volunteer_button_link');
$volunteer_link_text = get_field('why_give_become_a_volunteer_link_text');
$volunteer_link = get_field('why_give_become_a_volunteer_link');
?>
<?php if ($volunteer_image || $volunteer_sub_heading || $volunteer_heading || $volunteer_description || ($volunteer_button_text && $volunteer_button_link) || ($volunteer_link_text && $volunteer_link)) { ?>

  <section class="cta-module volunteer-cta">
    <div class="cta-overlay pos-absolute"></div>
    <div class="container">
      <div class="cta-main flex" style="background:<?php echo $volunteer_color_picker; ?>;">
        <div class="cta-main-text">
          <?php if ($volunteer_sub_heading) { ?>
            <div class="cta-txt"> <span class="optional-text" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_sub_heading; ?></span>
            <?php }
          if ($volunteer_heading) { ?>
              <div class="h3" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_heading; ?></div>
            <?php }
          if ($volunteer_description) { ?>
              <?php echo $volunteer_description; ?>
            <?php }
          if (($volunteer_button_text && $volunteer_button_link) || ($volunteer_link_text && $volunteer_link)) { ?>
              <div class="cta-btns flex flex-vcenter">
                <?php if ($volunteer_button_text && $volunteer_button_link) { ?>
                  <a href="<?php echo $volunteer_button_link; ?>" class="button btn-white" style=" background:<?php echo $volunteer_button_color; ?>; color: <?php echo $volunteer_button_text_color; ?>"><?php echo $volunteer_button_text; ?></a>
                <?php }
                if ($volunteer_link_text && $volunteer_link) { ?>
                  <a href="<?php echo $volunteer_link; ?>" class="readmore" style="color: <?php echo $volunteer_text_color; ?>"><?php echo $volunteer_link_text; ?></a>
                <?php } ?>
              </div>
            <?php } ?>
            </div>
        </div>
        <?php if ($volunteer_image) { ?>
          <div class="cta-image">
            <div class="cta-thumb">
              <figure class="object-fit"> <img src="<?php echo $volunteer_image['url']; ?>" alt="<?php echo $volunteer_image['alt']; ?>" title="<?php echo $volunteer_image['title']; ?>" /> </figure>
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

<?php get_footer(); ?>

<script>
  /* Tabs */
  jQuery("#tabs").tabs();
</script>
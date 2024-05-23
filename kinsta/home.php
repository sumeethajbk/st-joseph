<?php
/*
Template Name: Home Page Template
*/
get_header(); ?>

<?php
$home_banner_desktop_image = get_field('home_banner_desktop_image');
$home_banner_mobile_image = get_field('home_banner_mobile_image');
$home_banner_sub_heading = get_field('home_banner_sub_heading');
$home_banner_heading = get_field('home_banner_heading');
$home_banner_button_text = get_field('home_banner_button_text');
$home_banner_button_link = get_field('home_banner_button_link');
$home_banner_link = get_field('home_banner_link');
$home_banner_link_text = get_field('home_banner_link_text');

if ($home_banner_desktop_image || $home_banner_mobile_image ||  $home_banner_sub_heading ||  $home_banner_heading || $home_banner_button_text ||  $home_banner_button_link ||  $home_banner_link_text || $home_banner_link) { ?>

  <section class="default-banner-section pos-relative">
    <?php if ($home_banner_mobile_image ||  $home_banner_desktop_image) {
      $home_banner_mobile_image = $home_banner_mobile_image ? $home_banner_mobile_image : $home_banner_desktop_image;
      $home_banner_desktop_image = $home_banner_desktop_image ? $home_banner_desktop_image : $home_banner_mobile_image; ?>
      <div class="banner-bg object-fit">
        <picture class="object-fit">
          <source srcset="<?php echo $home_banner_desktop_image['url']; ?>" media="(min-width: 1024px)">
          <source srcset="<?php echo $home_banner_mobile_image['url']; ?>" media="(min-width: 768px)">
          <img src="<?php echo $home_banner_mobile_image['url']; ?>" alt="<?php echo $home_banner_mobile_image['alt']; ?>" title="<?php echo $home_banner_mobile_image['title']; ?>" />
        </picture>
      </div>
    <?php } ?>
    <div class="container">
      <div class="default-banner-main flex flex-vcenter">
        <div class="default-banner-text">
          <div class="default-banner-bg pos-absolute">&nbsp;</div>
          <?php if (!empty($home_banner_sub_heading)) { ?>
            <span class="optional-text"><?php echo $home_banner_sub_heading; ?></span>
          <?php } ?>
          <?php if (!empty($home_banner_heading)) { ?>
            <h1><?php echo $home_banner_heading; ?></h1>
          <?php } else { ?>
            <h1><?php echo get_the_title(); ?></h1>
          <?php } ?>

          <div class="btn-wrap">
            <?php if (!empty($home_banner_button_text) && !empty($home_banner_button_link)) { ?>
              <a href="<?php echo $home_banner_button_link; ?>" class="button"><?php echo $home_banner_button_text; ?></a>
            <?php } ?>
            <?php if (!empty($home_banner_link) && !empty($home_banner_link_text)) { ?>
              <a href="<?php echo $home_banner_link; ?>" class="readmore"><?php echo $home_banner_link_text; ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
?>
<?php
$home_statistics_heading = get_field('home_statistics_heading');
$home_statistics_description = get_field('home_statistics_description');
$home_statistics_button_text = get_field('home_statistics_button_text');
$home_statistics_button_link = get_field('home_statistics_button_link');
$home_statistics_repeater = get_field('home_statistics_repeater');

$stats_list_classes = array('teal', 'purple', 'mauve', 'lilac');
?>

<section class="stats-module">
  <div class="container">
    <div class="stats-wrap">
      <?php if ($home_statistics_heading) {  ?>
        <h2><?php echo $home_statistics_heading; ?></h2>
      <?php } ?>
      <?php if ($home_statistics_description || ($home_statistics_button_link && $home_statistics_button_text)) {  ?>
        <div class="bottom-frame">
          <?php if ($home_statistics_description) { ?>
            <div class="frame-lt">
              <?php echo $home_statistics_description; ?>
            </div>
            <div class="frame-mid">
              <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
            </div>
          <?php } ?>
          <div class="frame-rt">
            <?php if ($home_statistics_button_link && $home_statistics_button_text) {  ?>
              <a href="<?php echo $home_statistics_button_link; ?>" class="button"><?php echo $home_statistics_button_text; ?></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <?php if ($home_statistics_repeater) {  ?>
        <div class="stats-row stats-type flex">
          <?php $index = 0; ?>
          <?php foreach ($home_statistics_repeater as $statistics) { ?>
            <?php
            $home_statistics_number = $statistics['home_statistics_number'];
            $home_statistics_after_text = $statistics['home_statistics_after_text'];
            $home_statistics_repeater_description = $statistics['home_statistics_repeater_description'];
            $home_statistics_repeater_link_text = $statistics['home_statistics_repeater_link_text'];
            $home_statistics_repeater_link = $statistics['home_statistics_repeater_link'];
            ?>
            <?php if ($home_statistics_number) {  ?>
              <?php $current_class = $stats_list_classes[$index % count($stats_list_classes)]; ?>
              <div class="stats-list <?php echo $current_class; ?>">
                <div class="line pos-absolute">&nbsp;</div>
                <span class="big"><?php
                                  if ($home_statistics_number) {
                                    echo $home_statistics_number;
                                  }
                                  if ($home_statistics_after_text) {
                                    echo $home_statistics_after_text;
                                  } ?></span>
                <div class="stats-cnt">
                  <?php if ($home_statistics_repeater_description) {  ?>
                    <?php echo $home_statistics_repeater_description; ?>
                  <?php } ?>
                  <?php if ($home_statistics_repeater_link_text && $home_statistics_repeater_link) {  ?>
                    <a href="<?php echo $home_statistics_repeater_link; ?>" class="readmore"><?php echo $home_statistics_repeater_link_text; ?></a>
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
$home_donor_stories_heading = get_field('home_donor_stories_heading');
$home_donor_stories_repeater = get_field('home_donor_stories_repeater'); 
?>

<?php if ($home_donor_stories_heading || ($home_donor_stories_repeater && have_rows($home_donor_stories_repeater))) { ?>
<section class="stories-slider">
  <div class="bg"></div>
  <div class="container">
    <?php if ($home_donor_stories_heading) { ?>
      <h2><?php echo $home_donor_stories_heading; ?></h2>
    <?php } ?>
    <div class="stories-slider-wrap">
      <div class="slider slider-nav">
        <?php if ($home_donor_stories_repeater ) { ?>
          <?php foreach ($home_donor_stories_repeater as $stories) { 
            $home_donor_stories_repeater_heading = $stories['home_donor_stories_repeater_heading'];
            $home_donor_stories_description = $stories['home_donor_stories_description'];
            ?>
            <div class="stories-thumb">
              <div class="stories-thumb-nav">
                <?php if ($home_donor_stories_repeater_heading) { ?>
                  <div class="h6"><?php echo $home_donor_stories_repeater_heading; ?></div>
                <?php } ?>
                <?php if ($home_donor_stories_description) { ?>
                  <?php echo $home_donor_stories_description; ?>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
      </div>
      <div class="slider slider-for">
          <?php foreach ($home_donor_stories_repeater as $stories) { 
            $home_donor_stories_image = $stories['home_donor_stories_image'];
            $home_donor_stories_repeater_heading = $stories['home_donor_stories_repeater_heading']; 
            $repeater_video_type = $stories['home_donor_stories_image_video_type'];
            $repeater_youtube_id = $stories['home_donor_stories_repeater_youtube_id'];
            $repeater_vimeo_id = $stories['home_donor_stories_repeater_vimeo_id'];
            ?>
            <div class="stories-slide">
              <?php if ($home_donor_stories_image) { ?>
                <figure class="object-fit"> <img src="<?php echo $home_donor_stories_image['url']; ?>" alt="<?php echo $home_donor_stories_image['alt']; ?>" title="<?php echo $home_donor_stories_image['title']; ?>"/></figure>
            
              <?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
                                <div class="play-btn-main flex flex-center">
                                    <a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
                                        <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                                        <span class="play-btn-txt"> <?php echo $home_donor_stories_repeater_heading; ?> Promise</span>
                                    </a>
                                </div>
                            <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                                <div class="play-btn-main flex flex-center">
                                    <a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
                                        <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                                        <span class="play-btn-txt"> <?php echo $home_donor_stories_repeater_heading; ?> Promise</span>
                                        </a>
                                </div>
                            <?php } } ?>
                        </div>
                    <?php } }?>
                </div>

            </div>
        </div>
    </section>
<?php } ?>


<?php
$home_meet_our_donors_heading = get_field('home_meet_our_donors_heading');
$home_meet_our_donors_description = get_field('home_meet_our_donors_description');
$home_meet_our_donors_button_text = get_field('home_meet_our_donors_button_text');
$home_meet_our_donors_button_link = get_field('home_meet_our_donors_button_link');
$home_meet_our_donors_repeater = get_field('home_meet_our_donors_repeater');

if ($home_meet_our_donors_heading || $home_meet_our_donors_description || ($home_meet_our_donors_button_text && $home_meet_our_donors_button_link) || ($home_meet_our_donors_repeater && have_rows($home_meet_our_donors_repeater ))) {
  ?>

<section class="meet-our-donors">
  <div class="meet-donors-bg pos-absolute">&nbsp;</div>
  <div class="container">
    <div class="meet-donors-main">
      <?php if ($home_meet_our_donors_heading) { ?>
        <h2><?php echo $home_meet_our_donors_heading; ?></h2>
      <?php } ?>
      <?php if ($home_meet_our_donors_description || ($home_meet_our_donors_button_link && $home_meet_our_donors_button_text)) { ?>
        <div class="bottom-frame">
          <?php if ($home_meet_our_donors_description) { ?>
            <div class="frame-lt">
              <?php echo $home_meet_our_donors_description; ?>
            </div>
            <div class="frame-mid">
              <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
            </div>
          <?php } ?>
          <div class="frame-rt">
            <?php if ($home_meet_our_donors_button_link && $home_meet_our_donors_button_text) { ?>
              <a href="<?php echo $home_meet_our_donors_button_link; ?>" class="button"><?php echo $home_meet_our_donors_button_text; ?></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <?php if ($home_meet_our_donors_repeater) { ?>
        <div class="meet-donors-wrap">
          <?php foreach ($home_meet_our_donors_repeater as $donor) {
            $home_meet_our_donors_add_donor = $donor['home_meet_our_donors_add_donor'];
            if ($home_meet_our_donors_add_donor) { ?>
              <div class="our-donor-thumb">
                <figure class="object-fit"> <img src="<?php echo $home_meet_our_donors_add_donor['url']; ?>" alt="<?php echo $home_meet_our_donors_add_donor['alt']; ?>" title="<?php echo $home_meet_our_donors_add_donor['title']; ?>" /></figure>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>

<?php $home_testimonials_heading = get_field('home_testimonials_heading');
$home_select_testimonials = get_field('home_select_testimonials');
$colors = ['var(--elevated)', 'var(--elevateddark)', 'var(--lilictint)', 'var(--lilicdark)', 'var(--goldtint)', 'var(--gold)'];
$index = 0; ?>

<section class="gratitude-wall">
  <div class="container">
    <div class="heading">
      <?php if ($home_testimonials_heading) { ?>
        <div class="heading-lt">
          <h2><?php echo  $home_testimonials_heading; ?></h2>
        </div>
      <?php } ?>
      <div class="heading-rt hide-in-mobile">
        <div class="heading-btn"> <a href="/our-thanks/" class="button outline-btn-white">View all thanks</a> </div>
      </div>
    </div>
    <div class="masonry-main">
      <?php if ($home_select_testimonials) { ?>
        <?php foreach ($home_select_testimonials as $testimonial) {
          $color_class = $colors[$index % count($colors)];
          $review = get_field('testimonial_post_review', $testimonial->ID);
          $name = get_field('testimonial_post_name', $testimonial->ID);
          $position = get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?>
          <?php if ($review || $name || $position) { ?>
            <div class="masonry-block">
              <div class="masonry-bg pos-absolute" style="background: <?php echo $color_class; ?>;"></div>
              <?php if ($review) { ?>
                <?php echo $review; ?>
              <?php }
              if ($name || $position) { ?>
                <div class="gratitude-by">
                  <?php if ($name) { ?>
                    <div class="grat-line">&nbsp;</div>
                    <span class="gratitude-name"><?php echo $name; ?></span>
                  <?php } ?>
                  <?php if ($position) { ?>
                    <span class="gratitude-pos"><?php echo $position; ?></span>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
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
            $color_class = $colors[$index % count($colors)];
            $review = get_field('testimonial_post_review');
            $name = get_field('testimonial_post_name');
            $position = get_field('testimonial_post_position_title_or_credential'); ?>
            <?php if ($review || $name || $position) { ?>
              <div class="masonry-block">
                <div class="masonry-bg pos-absolute" style="background: <?php echo $color_class; ?>;"></div>
                <?php if ($review) { ?>
                  <?php echo $review; ?>
                <?php }
                if ($name || $position) { ?>
                  <div class="gratitude-by">
                    <?php if ($name) { ?>
                      <div class="grat-line">&nbsp;</div>
                      <span class="gratitude-name"><?php echo $name; ?></span>
                    <?php } ?>
                    <?php if ($position) { ?>
                      <span class="gratitude-pos"><?php echo $position; ?></span>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
            <?php $index++; ?>
        <?php }
          wp_reset_postdata();
        }
        ?>
      <?php } ?>
    </div>
      <div class="hide-in-desktop hide-in-tab heading-btn btn-full"> <a href="/our-thanks/" class="button outline-btn-white">View all thanks</a> </div>
  </div>
  
  </div>
</section>

<?php
$cta_image = get_field('home_cta_sub_image');
$cta_color_picker = get_field('home_cta_background_color');
$cta_text_color = get_field('home_cta_text_color');
$cta_button_color = get_field('home_cta_button_color');
$cta_button_text_color = get_field('home_cta_button_text_color');
$cta_sub_heading = get_field('home_cta_sub_heading');
$cta_heading = get_field('home_cta_heading');
$cta_description = get_field('home_cta_description');
$cta_button_text = get_field('home_cta_button_text');
$cta_button_link = get_field('home_cta_button_link');
$cta_link_text = get_field('home_cta_link_text');
$cta_link = get_field('home_cta_link');
?>
<?php if ($cta_image || $cta_sub_heading || $cta_heading || $cta_description || ($cta_button_text && $cta_button_link) || ($cta_link_text && $cta_link)) { ?>

  <section class="cta-module">
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
$home_history_heading = get_field('home_history_heading');
$home_history_description = get_field('home_history_description');
$home_history_button_text = get_field('home_history_button_text');
$home_history_button_link = get_field('home_history_button_link');
$home_history_repeater = get_field('home_history_repeater');

if ($home_history_heading || $home_history_description || ($home_history_button_text && $home_history_button_link) || ($home_history_repeater && have_rows($home_history_repeater))) {
  ?>

<section class="home-our-story pos-relative">
  <div class="home-story-bg pos-absolute">&nbsp;</div>
  <div class="container">
    <div class="home-story-wrap">
      <?php if ($home_history_heading) { ?>
        <h2><?php echo $home_history_heading; ?></h2>
      <?php } ?>
      <div class="bottom-frame">
      <?php if ($home_history_description) { ?>
      <div class="frame-lt">
            <?php echo $home_history_description; ?>
        </div>
        <div class="frame-mid">
          <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
        </div>
        <?php } ?>
        <div class="frame-rt">
          <?php if ($home_history_button_text && $home_history_button_link) { ?>
            <a href="<?php echo $home_history_button_link; ?>" class="button"><?php echo $home_history_button_text; ?></a>
          <?php } ?>
        </div>
      </div>
      <?php if ($home_history_repeater && have_rows('home_history_repeater')) { ?>
        <div class="home-story-main">
          <?php foreach ($home_history_repeater as $history) { ?>
            <?php
            $home_history_repeater_image = $history['home_history_repeater_image'];
            $home_history_repeater_heading = $history['home_history_repeater_heading'];
            $home_history_repeater_description = $history['home_history_repeater_description'];
            $home_history_repeater_link_text = $history['home_history_repeater_link_text'];
            $home_history_repeater_link = $history['home_history_repeater_link'];
            ?>
            <div class="home-story-grid">
              <div class="home-story-grid-inner flex">
                <?php if ($home_history_repeater_heading || $home_history_repeater_description || $home_history_repeater_link_text) { ?>
                  <div class="home-story-cnt">
                    <?php if ($home_history_repeater_heading) { ?>
                      <div class="h4"> <?php echo $home_history_repeater_heading; ?></div>
                    <?php } ?>
                    <?php if ($home_history_repeater_description) { ?>
                      <?php echo $home_history_repeater_description; ?>
                    <?php } ?>
                    <?php if ($home_history_repeater_link_text && $home_history_repeater_link) { ?>
                      <a href="<?php echo $home_history_repeater_link; ?>" class="readmore"><?php echo $home_history_repeater_link_text; ?></a>
                    <?php } ?>
                  </div>
                <?php } ?>
                <?php if ($home_history_repeater_image) { ?>
                  <div class="home-story-thumb pos-relative">
                    <figure class="object-fit"> <img src="<?php echo $home_history_repeater_image['url']; ?>" alt="<?php echo $home_history_repeater_image['alt']; ?>" title="<?php echo $home_history_repeater_image['title']; ?>" /></figure>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>

<?php
$stories_heading = get_field('home_patient_and_staff_stories_heading');
$select_patient_and_staff_stories = get_field('select_patient_and_staff_stories');

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
        'title' => get_the_title(),
      );
    }
    wp_reset_postdata();
  }
}
?>

<section class="patient-staff-stories">
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
              <div class="ps-thumb">
                <?php $story_image = get_field('stories_image', $story->ID); ?>
                <?php if (!empty($story_image)) { ?>
                  <figure class="object-fit"><img src="<?php echo $story_image['url']; ?>" alt="<?php echo $story_image['alt']; ?>" title="<?php echo $story_image['title']; ?>" /></figure>
                <?php } ?>
              </div>
              <div class="ps-cnt">
                <div class="category flex">
                  <span class="tag"><?php echo get_the_title($story->ID); ?></span>
                </div>
                <?php $story_introduction = get_field('stories_short_introduction', $story->ID); ?>
                <?php if (!empty($story_introduction)) { ?>
                  <?php echo $story_introduction; ?>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <?php foreach ($default_stories as $story) { ?>
            <div class="ps-grid">
              <div class="ps-thumb">
                <?php if (!empty($story['image'])) { ?>
                  <figure class="object-fit"><img src="<?php echo $story['image']['url']; ?>" alt="<?php echo $story['image']['alt']; ?>" title="<?php echo $story['image']['title']; ?>" /></figure>
                <?php } ?>
              </div>
              <div class="ps-cnt">
                <?php if (!empty($story['title'])) { ?>
                  <div class="category flex"> <span class="tag"> <?php echo $story['title']; ?></span> </div>
                <?php } ?>
                <?php if (!empty($story['short_introduction'])) { ?>
                  <?php echo $story['short_introduction']; ?>
                <?php } ?>
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



<?php get_footer(); ?>
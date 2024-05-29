<?php
/*
Template Name: Campaign Page Template
*/
get_header();
?>

<?php
$password_protected_page = get_field('password_protected_page');
$password_protected_page_password = get_field('password_protected_page_password');
if(isset($_POST['submit'])){
  $posted_psw = $_POST['campaign_pwd_protect'];
}

$common_desktop_image = get_field('common_banner_desktop_image');
$common_mobile_image = get_field('common_banner_mobile_image');
$common_color_picker = get_field('common_banner_background_color');
$common_text_color = get_field('common_banner_text_color');
$common_button_color = get_field('common_banner_button_color');
$common_button_text_color = get_field('common_banner_button_text_color');
$common_sub_heading = get_field('common_banner_sub_heading');
$common_description = get_field('common_banner_description');
$common_heading = get_field('common_banner_heading');
$common_button_text = get_field('common_banner_cta_button_text');
$common_button_link = get_field('common_banner_cta_button_link');
$secondary_button_text = get_field('common_banner_secondary_link_text');
$secondary_button_link = get_field('common_banner_secondary_link');
?>

<?php if($password_protected_page=='yes'){ ?>
<?php if($posted_psw!=$password_protected_page_password){ ?>
<section class="overlay_main_sec campaign-popup mfp-hide" id="loginpopup">
  <div class="overlay_center flex flex-center">
    <div class="overlay-main"> <span class="login_pop_connect_close" onClick="LoginclosePopup();"><i class="fa-sharp fa-light fa-xmark"></i></span>
      <div class="overlay-wrap">
        <div class="login-pop">
          <h5>Campaign Login</h5>
          <p>Opacity thumbnail rotate strikethrough font inspect connection ellipse bol.</p>
          <div class="frm_forms">
            <form name="" id="psw_protect_form" class="psw_protect_form" action="" method="post">
              <div class="frm_form_fields ">
                <fieldset>
                  <div class="frm_fields_container">
                    <div class="frm_form_field form-field frm_full">
                      <label for="" id="" class="frm_primary_label">Your Password</label>
                      <input type="password" id="campaign_pwd_protect" name="campaign_pwd_protect" value="" placeholder="Password" aria-required="true">
                      <?php if(isset($_POST['submit']) && $posted_psw != $password_protected_page_password){ ?>
                        <span class="passwd_err">Invalid Password.</span>
                      <?php } ?>
                    </div>
                    <div class="frm-wrapper">
                      <div class="frm_submit">
                        <button class="frm_button_submit frm_final_submit button btn-dark" type="submit" name="submit">Log in to the campaign</button>
                      </div>
                      <p class="lost_password"><a href="#password-popup" class="forgot-password-request">Forgot your password?</a></p>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
          <span class="poplink"><a href="#campagin-access-popup" class="open-campaign-request readmore trigger-popup">Request Access</a></span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php if($posted_psw!=$password_protected_page_password){ ?>
<section class="overlay_main_sec campaign-popup mfp-hide" id="campagin-access-popup">
  <div class="overlay_center flex flex-center">
    <div class="overlay-main"> <span class="pop_connect_close close_request_popup"><i class="fa-sharp fa-light fa-xmark"></i></span>
      <div class="overlay-wrap">
          <div class="request-pop">
          <h5>Request<br>
            Campaign Access</h5>
          <p>Opacity thumbnail rotate strikethrough font inspect connection ellipse bol.</p>
          <div class="frm_forms">
            <form method="get" id="signupForm" action="<?php echo get_permalink(253); ?>">
              <div class="frm_form_fields ">
                <fieldset>
                  <div class="frm_fields_container">
                    <div class="frm_form_field form-field frm_full">
                      <label for="" id="" class="frm_primary_label">Your Email Address</label>
                      <input type="text" id="campaign_email" name="campaign_email" value="" placeholder="Enter your email address" aria-required="true">
                      <input type="hidden" id="campaign_page" name="campaign_page" value="<?php echo $post->ID; ?>">
                    </div>
                    <div class="frm-wrapper">
                      <div class="frm_submit">
                        <button class="button btn-dark" type="submit">Request Access</button>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
          <span class="poplink"><a href="#loginpopup" class="open-campaign-request-login readmore back">Back to login</a></span> </div>
      </div>
    </div>
  </div>
  <!-- end of overlay center --> 
</section>
<?php } ?>

<?php if($posted_psw!=$password_protected_page_password){ ?>
<section class="overlay_main_sec campaign-popup mfp-hide" id="password-popup">
  <div class="overlay_center flex flex-center">
    <div class="overlay-main"> <span class="pop_connect_close close_request_popup"><i class="fa-sharp fa-light fa-xmark"></i></span>
      <div class="overlay-wrap">
          <div class="request-pop">
          <h5>Request password</h5>
          <p>Opacity thumbnail rotate strikethrough font inspect connection ellipse bol.</p>
          <div class="frm_forms">
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 7 ) ); ?>
          </div>
          <span class="poplink"><a href="#loginpopup" class="open-campaign-request-login readmore back">Back to login</a></span> </div>
      </div>
    </div>
  </div>
  <!-- end of overlay center --> 
</section>
<?php } ?>

<?php if($posted_psw == $password_protected_page_password){ ?>
<section class="default-banner-section pos-relative">
  <?php if ($common_mobile_image || $common_desktop_image) {
    $common_mobile_image = $common_mobile_image ?: $common_desktop_image;
    $common_desktop_image = $common_desktop_image ?: $common_mobile_image; ?>
    <div class="banner-bg object-fit">
      <picture class="object-fit">
        <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 1024px)">
        <source srcset="<?php echo $common_desktop_image['url']; ?>" media="(min-width: 768px)">
        <img src="<?php echo $common_mobile_image['url']; ?>" alt="<?php echo $common_mobile_image['alt']; ?>" title="<?php echo $common_mobile_image['title']; ?>" />
      </picture>
    </div>
  <?php } ?>
  <div class="container">
    <div class="default-banner-main flex flex-vcenter" style="background:<?php echo $common_color_picker; ?>;">
      <div class="default-banner-text">
        <div class="default-banner-bg pos-absolute">&nbsp;</div>
        <?php if ($common_sub_heading) { ?>
          <h1 style="color: <?php echo $common_text_color; ?>"><?php echo $common_sub_heading; ?></h1>
        <?php } ?>
        <?php if ($common_heading) { ?>
          <figure class="object-fit">
            <img src="<?php echo $common_heading['url']; ?>" alt="<?php echo $common_heading['alt']; ?>" title="<?php echo $common_heading['title']; ?>" />
          </figure>
        <?php } ?>
        <?php if ($common_description) { ?>
          <p style="color: <?php echo $common_text_color; ?>"><?php echo $common_description; ?></p>
        <?php } ?>
        <?php if (($common_button_text && $common_button_link) || ($secondary_button_text && $secondary_button_link)) { ?>
          <div class="btn-wrap">
            <?php if ($common_button_text && $common_button_link) { ?>
              <a href="<?php echo $common_button_link; ?>" class="button" style="background:<?php echo $common_button_color; ?>; color: <?php echo $common_button_text_color; ?>"><?php echo $common_button_text; ?></a>
            <?php } ?>
            <?php if ($secondary_button_text && $secondary_button_link) { ?>
              <a href="<?php echo $secondary_button_link; ?>" class="trans-btn button" style="background:<?php echo $common_button_color; ?>; color: <?php echo $common_button_text_color; ?>"><?php echo $secondary_button_text; ?></a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php
$short_introduction_sub_heading = get_field('campaign_page_short_introduction_sub_heading');
$short_introduction_heading = get_field('campaign_page_short_introduction_heading');
$short_introduction_description = get_field('campaign_page_short_introduction_description');
$short_introduction_features = get_field('campaign_page_short_introduction_features');
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
      <div class="short-intro-row icon-type flex row-of-six">
        <?php if ($short_introduction_features) { ?>
          <?php $colors = ['purple', 'teal', 'green', 'lilac', 'mauve']; ?>
          <?php $index = 0; ?>
          <?php foreach ($short_introduction_features as $item) {
            $icon_or_svg = $item['campaign_short_introduction_icon_or_svg'];
            $icon = $item['campaign_short_introduction_icon'];
            $svg = $item['campaign_short_introduction_svg'];
            $description = $item['campaign_short_introduction_repeater_description'];
            $link = $item['campaign_short_introduction_repeater_link'];
            $link_text = $item['campaign_short_introduction_repeater_link_text']; ?>
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
$sub_heading = get_field('campaign_optional_cta_sub_heading');
$heading = get_field('campaign_optional_cta_heading');
$description = get_field('campaign_optional_cta_description');
$button_text = get_field('campaign_optional_cta_button_text');
$button_link = get_field('campaign_optional_cta_button_link');
$video_type = get_field('campaign_optional_cta_video_type');
$video_image = get_field('campaign_optional_cta_video_image');
$vimeoid = get_field('campaign_optional_cta_vimeoid');
$youtubeid = get_field('campaign_optional_cta_youtubeid');
$related_stories = get_field('relationship_field_name'); 
?>

<section class="video-features pos-relative">
  <div class="bg"></div>
  <div class="video-feature-wrap">
    <div class="container">
      <div class="video-top flex">
        <div class="video-top-lt">
          <?php if ($sub_heading) { ?>
            <span class="optional-text"><?php echo $sub_heading; ?></span>
          <?php } ?>

          <?php if ($heading) { ?>
            <div class="h3"><?php echo $heading; ?></div>
          <?php } ?>

          <?php if ($description) { ?>
            <p><?php echo $description; ?></p>
          <?php } ?>

          <?php if ($button_text && $button_link) { ?>
            <a href="<?php echo $button_link; ?>" class="button btn-white"><?php echo $button_text; ?></a>
          <?php } ?>
        </div>
        <div class="video-top-rt">
          <div class="video-thumbnail pos-relative">
            <?php if ($video_image) { ?>
              <figure class="object-fit">
                <img src="<?php echo $video_image['url']; ?>" alt="Video Features Thumb" title="Video Features Thumb" />
              </figure>
            <?php } ?>

            <div class="play-btn-main flex flex-center">
              <?php if ($video_type === 'vimeo' && $vimeoid) { ?>
                <a class="play-btn flex popup-youtube flex-center" href="https://player.vimeo.com/video/<?php echo $vimeoid; ?>" tabindex="0">
                  <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
                </a>
              <?php } elseif ($video_type === 'youtube' && $youtubeid) { ?>
                <a class="play-btn flex  popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $youtubeid; ?>" tabindex="0">
                  <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($related_stories) { ?>
    <div class="video-grid-wrap">
      <div class="bg"></div>
      <div class="container">
        <div class="video-btm flex">
          <?php foreach ($related_stories as $post) {
            setup_postdata($post);
            $image = get_field('stories_image');
            $short_intro = get_field('stories_short_introduction'); ?>
            <div class="vf-grid">
              <?php if ($image) { ?>
                <div class="vf-thumb">
                  <figure class="object-fit">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                  </figure>
                </div>
              <?php } ?>
              <?php if ($short_intro) { ?>
                <div class="vf-cnt">
                  <p><?php echo $short_intro; ?></p>
                  <a href="<?php the_permalink(); ?>" class="readmore">Learn More</a>
                </div>
              <?php } ?>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <?php } else {
    $args = array(
      'post_type' => 'story',
      'posts_per_page' => 4,
    );
    $latest_stories = new WP_Query($args);
    if ($latest_stories->have_posts()) { ?>
      <div class="video-grid-wrap">
        <div class="bg"></div>
        <div class="container">
          <div class="video-btm flex">
            <?php while ($latest_stories->have_posts()) {
              $latest_stories->the_post();
              $image = get_field('stories_image');
              $short_intro = get_field('stories_short_introduction'); ?>
              <div class="vf-grid">
                <?php if ($image) { ?>
                  <div class="vf-thumb">
                    <figure class="object-fit">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                    </figure>
                  </div>
                <?php } ?>
                <?php if ($short_intro) { ?>
                  <div class="vf-cnt">
                    <p><?php echo $short_intro; ?></p>
                    <a href="<?php the_permalink(); ?>" class="readmore">Learn More</a>
                  </div>
                <?php } ?>
              </div>
            <?php }
            wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
  <?php }
  } ?>
</section>

<?php
$campaign_repeater_section = get_field('campaign_repeater_section');
if ($campaign_repeater_section) { ?>
  <section class="repeaters-module">
    <div class="repeater-bg pos-absolute">&nbsp;</div>
    <div class="container">
      <div class="repeaters-main flex pos-relative">
        <?php
        foreach ($campaign_repeater_section as $repeater) {
          $repeater_image = $repeater['campaign_repeater_section_image'];
          $repeater_video_type = $repeater['campaign_repeater_section_video_type'];
          $repeater_youtube_id = $repeater['campaign_repeater_section_youtube_id'];
          $repeater_vimeo_id = $repeater['campaign_repeater_section_vimeo_id'];
          $repeater_heading = $repeater['campaign_repeater_section_heading'];
          $repeater_description = $repeater['campaign_repeater_section_description'];
          $repeater_button_text = $repeater['campaign_repeater_section_button_text'];
          $repeater_button_link = $repeater['campaign_repeater_section_button_link'];
          $repeater_message = $repeater['campaign_repeater_section_message'];
        ?>
          <div class="repeaters-loop">
            <div class="repeaters-grid flex">
              <?php if (!empty($repeater_image)) { ?>
                <div class="repeaters-lt">
                  <div class="repeaters-thumb pos-relative">
                    <figure class="object-fit"><img src="<?php echo $repeater_image['url']; ?>" alt="<?php echo $repeater_image['alt']; ?>" title="<?php echo $repeater_image['title']; ?>" /></figure>
                    <?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
                      <div class="play-btn-main flex flex-center">
                        <a class="play-btn flex  popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
                          <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
                        </a>
                      </div>
                    <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                      <div class="play-btn-main flex flex-center">
                        <a class="play-btn flex  popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
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


<?php if (get_the_content()) { ?>
  <section class="general-default-container">
    <div class="container">
      <div class="general-default-inner">
        <div class="container-sm">
          <?php the_Content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php
$optional_cta_one_desktop_image = get_field('campaign_optional_cta_one_desktop_image');
$optional_cta_one_mobile_image = get_field('campaign_optional_cta_one_mobile_image');
$optional_cta_one_heading = get_field('campaign_optional_cta_one_heading');
$optional_cta_one_description = get_field('campaign_optional_cta_one_description');
$optional_cta_one_button_text = get_field('campaign_optional_cta_one_button_text');
$optional_cta_one_button_link = get_field('campaign_optional_cta_one_button_link');
$optional_cta_one_link_text = get_field('campaign_optional_cta_one_link_text');
$optional_cta_one_link = get_field('campaign_optional_cta_one_link');
$optional_cta_one_background_color = get_field('campaign_optional_cta_one_background_color');
$optional_cta_one_text_color = get_field('campaign_optional_cta_one_text_color');
$optional_cta_one_button_color = get_field('campaign_optional_cta_one_button_color');
$optional_cta_one_button_text_color = get_field('campaign_optional_cta_one_button_text_color');
?>

<section class="fluid-cta-module fluid-width pos-relative">
  <div class="fluid-cta-main">
    <?php if ($optional_cta_one_mobile_image ||  $optional_cta_one_desktop_image) {
      $optional_cta_one_mobile_image = $optional_cta_one_mobile_image ? $optional_cta_one_mobile_image : $optional_cta_one_desktop_image;
      $optional_cta_one_desktop_image = $optional_cta_one_desktop_image ? $optional_cta_one_desktop_image : $optional_cta_one_mobile_image; ?>
      <div class="fluid-cta-thumb">
        <picture class="object-fit">
          <source srcset="<?php echo $optional_cta_one_desktop_image['url']; ?>" media="(min-width: 1024px)">
          <source srcset="<?php echo $optional_cta_one_desktop_image['url']; ?>" media="(min-width: 768px)">
          <img src="<?php echo $optional_cta_one_mobile_image['url']; ?>" alt="CTA Thumb" title="CTA Thumb" />
        </picture>
        <div class="ripple">
          <div class="pulse1">&nbsp;</div>
          <div class="pulse2">&nbsp;</div>
        </div>
      </div>
    <?php } ?>
    <div class="fluid-cta-txt">
      <div class="fluid-cta-inner-txt pos-relative">
        <div class="bg pos-absolute" style="background:<?php echo $optional_cta_one_background_color; ?>;"></div>
        <?php if ($optional_cta_one_heading) { ?>
          <span class="optional-text" style="color: <?php echo $optional_cta_one_text_color; ?>"><?php echo $optional_cta_one_heading; ?></span>
        <?php } ?>
        <?php if ($optional_cta_one_description) { ?>
          <h3><?php echo $optional_cta_one_description; ?></h3>
        <?php } ?>
        <div class="fluid-cta-btns">
          <?php if ($optional_cta_one_button_text && $optional_cta_one_button_link) { ?>
            <a href="<?php echo $optional_cta_one_button_link; ?>" class="button btn-white" style=" background:<?php echo $optional_cta_one_button_color; ?>; color: <?php echo $optional_cta_one_button_text_color; ?>"><?php echo $optional_cta_one_button_text; ?></a>
          <?php } ?>
          <?php if ($optional_cta_one_link_text && $optional_cta_one_link) { ?>
            <a href="<?php echo $optional_cta_one_link; ?>" class="readmore" style="color: <?php echo $optional_cta_one_text_color; ?>"><?php echo $optional_cta_one_link_text; ?></a>
          <?php } ?>
        </div>
      </div>
      <div class="ripple">
        <div class="pulse1">&nbsp;</div>
        <div class="pulse2">&nbsp;</div>
      </div>
    </div>
  </div>
</section>

<?php
$campaign_statistics_heading = get_field('campaign_statistics_heading');
$campaign_statistics_description = get_field('campaign_statistics_message');
$campaign_statistics_button_text = get_field('campaign_statistics_button_text');
$campaign_statistics_button_link = get_field('campaign_statistics_button_link');
$campaign_statistics_repeater = get_field('campaign_statistics');

$stats_list_classes = array('teal', 'purple', 'mauve', 'lilac');
?>

<section class="stats-module">
  <div class="bg pos-absolute"></div>
  <div class="container">
    <div class="stats-wrap">
      <?php if ($campaign_statistics_heading) {  ?>
        <h2><?php echo $campaign_statistics_heading; ?></h2>
      <?php } ?>
      <?php if ($campaign_statistics_description || ($campaign_statistics_button_link && $campaign_statistics_button_text)) {  ?>
        <div class="bottom-frame">
          <?php if ($campaign_statistics_description) { ?>
            <div class="frame-lt">
              <?php echo $campaign_statistics_description; ?>
            </div>
            <div class="frame-mid">
              <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
            </div>
          <?php } ?>
          <div class="frame-rt">
            <?php if ($campaign_statistics_button_link && $campaign_statistics_button_text) {  ?>
              <a href="<?php echo $campaign_statistics_button_link; ?>" class="button"><?php echo $campaign_statistics_button_text; ?></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <?php if ($campaign_statistics_repeater) {  ?>
        <div class="stats-row stats-type flex" data-counter-main="counter-main">
          <?php $index = 0; ?>
          <?php foreach ($campaign_statistics_repeater as $statistics) { ?>
            <?php
             $campaign_statistics_number_or_image  = $statistics['campaign_statistics_number_or_image'];
             $campaign_statistics_image  = $statistics['campaign_statistics_image'];
             $campaign_statistics_svg  = $statistics['campaign_statistics_svg'];
            $campaign_statistics_number = $statistics['campaign_statistics_number'];
            $campaign_statistics_after_text = $statistics['campaign_statistics_after_text'];
            $campaign_statistics_repeater_description = $statistics['campaign_statistics_description'];
            $campaign_statistics_repeater_link_text = $statistics['campaign_statistics_link_text'];
            $campaign_statistics_repeater_link = $statistics['campaign_statistics_link'];
            ?>
              <?php $current_class = $stats_list_classes[$index % count($stats_list_classes)]; ?>
              <div class="stats-list <?php echo $current_class; ?>">
                <div class="line pos-absolute">&nbsp;</div>
                <?php  if ($campaign_statistics_number_or_image == 'image' && $campaign_statistics_image) { ?>
                            <figure class="object-fit">
                                <img src="<?php echo $campaign_statistics_image['url']; ?>" alt="<?php echo $home_statistics_image['alt']; ?>" />
                            </figure>
                        <?php   }  elseif ($campaign_statistics_number_or_image == 'svg' && $campaign_statistics_svg) {
                            echo $campaign_statistics_svg;
                                }  elseif ($campaign_statistics_number_or_image == 'number' && $campaign_statistics_number) { ?>
                        <span class="number">
                                    <span class="big" data-duration="2500" data-count-to="<?php echo $campaign_statistics_number; ?> "><?php                                                                                       
                                    
                                echo $campaign_statistics_number; ?>
                                </span>
                                <?php if ($campaign_statistics_after_text) {
                                 echo $campaign_statistics_after_text;
                                }
                            } ?> </span>
                <div class="stats-cnt">
                  <?php if ($campaign_statistics_repeater_description) {  ?>
                    <?php echo $campaign_statistics_repeater_description; ?>
                  <?php } ?>
                  <?php if ($campaign_statistics_repeater_link_text && $campaign_statistics_repeater_link) {  ?>
                    <a href="<?php echo $campaign_statistics_repeater_link; ?>" class="readmore"><?php echo $campaign_statistics_repeater_link_text; ?></a>
                  <?php } ?>
                </div>
              </div>
              <?php $index++; ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php
$cta_image = get_field('campaign_donate_now_image');
$cta_color_picker = get_field('campaign_donate_now_background_color');
$cta_text_color = get_field('campaign_donate_now_text_color');
$cta_button_color = get_field('campaign_donate_now_button_color');
$cta_button_text_color = get_field('campaign_donate_now_button_text_color');
$cta_sub_heading = get_field('campaign_donate_now_sub_heading');
$cta_heading = get_field('campaign_donate_now_heading');
$cta_description = get_field('campaign_donate_now_description');
$cta_button_text = get_field('campaign_donate_now_button_text');
$cta_button_link = get_field('campaign_donate_now_button_link');
$cta_link_text = get_field('campaign_donate_now_link_text');
$cta_link = get_field('campaign_donate_now_link');
?>
<?php if ($cta_image || $cta_sub_heading || $cta_heading || $cta_description || ($cta_button_text && $cta_button_link) || ($cta_link_text && $cta_link)) { ?>

  <section class="cta-module  donate-cta">
    <div class="cta-overlay pos-absolute"></div>
    <div class="container">
      <div class="cta-main  purplebg flex" style="background:<?php echo $cta_color_picker; ?>;">
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
$campaign_donor_stories_heading = get_field('campaign_donor_stories_heading');
$campaign_donor_stories_repeater = get_field('campaign_donor_stories_repeater');
?>

<?php if ($campaign_donor_stories_heading || ($campaign_donor_stories_repeater && have_rows($campaign_donor_stories_repeater))) { ?>
  <section class="stories-slider teal white-dots">
    <div class="bg"></div>
    <div class="container">
      <?php if ($campaign_donor_stories_heading) { ?>
        <h2><?php echo $campaign_donor_stories_heading; ?></h2>
      <?php } ?>
      <div class="stories-slider-wrap">
        <div class="slider slider-nav">
          <?php if ($campaign_donor_stories_repeater) { ?>
            <?php foreach ($campaign_donor_stories_repeater as $stories) {
              $campaign_donor_stories_repeater_heading = $stories['campaign_donor_stories_repeater_heading'];
              $campaign_donor_stories_description = $stories['campaign_donor_stories_description'];
            ?>
              <div class="stories-thumb">
                <div class="stories-thumb-nav">
                  <?php if ($campaign_donor_stories_repeater_heading) { ?>
                    <div class="h6"><?php echo $campaign_donor_stories_repeater_heading; ?></div>
                  <?php } ?>
                  <?php if ($campaign_donor_stories_description) { ?>
                    <?php echo $campaign_donor_stories_description; ?>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
        </div>
        <div class="slider slider-for">
          <?php foreach ($campaign_donor_stories_repeater as $stories) {
              $campaign_donor_stories_image = $stories['campaign_donor_stories_image'];
              $campaign_donor_stories_repeater_heading = $stories['campaign_donor_stories_repeater_heading'];
              $repeater_video_type = $stories['campaign_donor_stories_image_video_type'];
              $repeater_youtube_id = $stories['campaign_donor_stories_repeater_youtube_id'];
              $repeater_vimeo_id = $stories['campaign_donor_stories_repeater_vimeo_id'];
          ?>
            <div class="stories-slide">
              <?php if ($campaign_donor_stories_image) { ?>
                <figure class="object-fit"> <img src="<?php echo $campaign_donor_stories_image['url']; ?>" alt="<?php echo $campaign_donor_stories_image['alt']; ?>" title="<?php echo $campaign_donor_stories_image['title']; ?>" /></figure>

                <?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
                  <div class="play-btn-main flex flex-center">
                    <a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
                      <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                      <span class="play-btn-txt"> <?php echo $campaign_donor_stories_repeater_heading; ?> Promise</span>
                    </a>
                  </div>
                <?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
                  <div class="play-btn-main flex flex-center">
                    <a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
                      <span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"> </i> </span>
                      <span class="play-btn-txt"> <?php echo $campaign_donor_stories_repeater_heading; ?> Promise</span>
                    </a>
                  </div>
              <?php }
              } ?>
            </div>
        <?php }
          } ?>
        </div>

      </div>
    </div>
  </section>
<?php } ?>

<?php
$team_heading = get_field('campaign_team_heading');
$team_details = get_field('campaign_team_details');
$team_description = get_field('campaign_team_description');
$team_button_text = get_field('campaign_team_button_text');
$team_button_link = get_field('campaign_team_button_link');
?>
<section class="group-team-bios">
  <div class="container">
    <?php if ($team_heading) { ?>
      <h3><?php echo $team_heading; ?></h3>
    <?php } ?>
    <div class="gt-bios-wrap flex">
      <?php if ($team_details) {
        foreach ($team_details as $details) {
          $team_profile_image = $details['campaign_team_profile_image'];
          $team_name = $details['campaign_team_name'];
          $team_position_or_job = $details['campaign_team_position_or_job'];
          $team_optional_secondary_title = $details['campaign_team_optional_secondary_title'];
          $team_email = $details['campaign_team_email'];
          $team_number = $details['campaign_team_number'];
          $team_repeater_description = $details['campaign_team_repeater_description'];
      ?>

          <?php if ($team_profile_image || $team_name || $team_position_or_job || $team_optional_secondary_title || $team_email || $team_number || $team_description) { ?>
            <div class="gt-bios-grid">
              <figure class="object-fit">
                <?php if ($team_profile_image) { ?>
                  <img src="<?php echo $team_profile_image['url']; ?>" alt="Team Member Thumbnail" title="Team Member Thumbnail" />
                <?php } ?>
              </figure>
              <div class="gt-bios-overlay">
                <div class="gt-bios-header">
                  <?php if ($team_name) { ?>
                    <div class="h5"><?php echo $team_name; ?></div>
                  <?php } ?>
                  <?php if ($team_position_or_job) { ?>
                    <span class="gt-bios-pos"><?php echo $team_position_or_job; ?></span>
                  <?php } ?>
                  <div class="bios-toggle pos-absolute">
                    <div class="toggle-inner"> <span class="fa-sharp fa-light fa-arrow-up-long"></span></div>
                  </div>
                </div>
                <div class="gt-bios-desc">
                  <?php if ($team_optional_secondary_title) { ?>
                    <span class="gt-bios-pos"><?php echo $team_optional_secondary_title; ?></span>
                  <?php } ?>
                  <ul class="gt-bios-links flex">
                    <?php if ($team_email) { ?>
                      <li><a href="mailto:<?php echo $team_email; ?>"><i class="fa-regular fa-at"></i><?php echo $team_email; ?></a></li>
                    <?php } ?>
                    <?php if ($team_number) { ?>
                      <li><a href="tel:<?php echo $team_number; ?>"><i class="fa-regular fa-phone"></i><?php echo $team_number; ?></a></li>
                    <?php } ?>
                  </ul>
                  <?php if ($team_repeater_description) { ?>
                    <?php echo $team_repeater_description; ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
      <?php }
      }
      ?>
    </div>
    <?php if ($team_description ||  ($team_button_text && $team_button_link)) { ?>
      <div class="bottom-frame">
        <?php if ($team_description) { ?>
          <div class="frame-lt">
            <?php echo $team_description; ?>
          </div>
        <?php }  ?>
        <div class="frame-mid">
          <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
        </div>
        <?php if ($team_button_text && $team_button_link) { ?>
          <div class="frame-rt"><a href=" <?php echo $team_button_link; ?>" class="button"> <?php echo $team_button_text; ?></a> </div>
        <?php }  ?>
      </div>
    <?php }  ?>
  </div>
</section>


<?php $why_give_testimonials_heading = get_field('campaign_testimonials_heading');
$why_give_select_testimonials = get_field('campaign_post_select_testimonials');
$colors = [' var(--optionaltxt)', 'var(--elevatedblue)', 'var(--lilac)', 'var(--purplelight)', 'var(--yellow)', 'var(--goldlight)'];
$index = 0; ?>

<section class="gratitude-wall">
  <div class="bg pos-absolute"></div>
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

<?php
$campaign_meet_our_donors_heading = get_field('campaign_meet_our_donors_heading');
$campaign_meet_our_donors_description = get_field('campaign_meet_our_donors_description');
$campaign_meet_our_donors_button_text = get_field('campaign_meet_our_donors_button_text');
$campaign_meet_our_donors_button_link = get_field('campaign_meet_our_donors_button_link');
$campaign_meet_our_donors_repeater = get_field('campaign_meet_our_donors_repeater');

if ($campaign_meet_our_donors_heading || $campaign_meet_our_donors_description || ($campaign_meet_our_donors_button_text && $campaign_meet_our_donors_button_link) || ($campaign_meet_our_donors_repeater && have_rows($campaign_meet_our_donors_repeater))) {
?>

  <section class="meet-our-donors">
    <div class="meet-donors-bg pos-absolute">&nbsp;</div>
    <div class="container">
      <div class="meet-donors-main">
        <?php if ($campaign_meet_our_donors_heading) { ?>
          <h2><?php echo $campaign_meet_our_donors_heading; ?></h2>
        <?php } ?>
        <?php if ($campaign_meet_our_donors_description || ($campaign_meet_our_donors_button_link && $campaign_meet_our_donors_button_text)) { ?>
          <div class="bottom-frame">
            <?php if ($campaign_meet_our_donors_description) { ?>
              <div class="frame-lt">
                <?php echo $campaign_meet_our_donors_description; ?>
              </div>
              <div class="frame-mid">
                <div class="animated-arrow"> <span class="the-arrow right"> <span class="shaft"></span> </span></div>
              </div>
            <?php } ?>
            <div class="frame-rt">
              <?php if ($campaign_meet_our_donors_button_link && $campaign_meet_our_donors_button_text) { ?>
                <a href="<?php echo $campaign_meet_our_donors_button_link; ?>" class="button"><?php echo $campaign_meet_our_donors_button_text; ?></a>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        <?php if ($campaign_meet_our_donors_repeater) { ?>
          <div class="meet-donors-wrap">
            <?php foreach ($campaign_meet_our_donors_repeater as $donor) {
              $campaign_meet_our_donors_add_donor = $donor['campaign_meet_our_donors_add_donor'];
              if ($campaign_meet_our_donors_add_donor) { ?>
                <div class="our-donor-thumb">
                  <figure class="object-fit"> <img src="<?php echo $campaign_meet_our_donors_add_donor['url']; ?>" alt="<?php echo $campaign_meet_our_donors_add_donor['alt']; ?>" title="<?php echo $campaign_meet_our_donors_add_donor['title']; ?>" /></figure>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>

<?php
$pointed_message_heading = get_field('campaign_pointed_message_heading');
$pointed_message_features = get_field('campaign_pointed_message_features');
$pointed_message_message = get_field('campaign_pointed_message_message');
$pointed_message_button_text = get_field('campaign_pointed_message_button_text');
$pointed_message_button_link = get_field('campaign_pointed_message_button_link');
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
          $feature_image = $feature['campaign_pointed_message_feature_image'];
          $feature_sub_heading = $feature['campaign_pointed_message_feature_sub_heading'];
          $feature_heading = $feature['campaign_pointed_message_feature_heading'];
          $feature_description = $feature['campaign_pointed_message_feature_description'];
          $feature_link_text = $feature['campaign_pointed_message_feature_link_text'];
          $feature_link = $feature['campaign_pointed_message_feature_link'];
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
<?php } ?>

<?php } ?>

<?php get_footer();

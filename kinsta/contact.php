<?php
/*
Template Name: Contact Page Template
*/
get_header();
?>



<?php
$contact_banner_desktop_image = get_field('contact_banner_desktop_image');
$contact_banner_mobile_image = get_field('contact_banner_mobile_image');
$contact_banner_sub_heading = get_field('contact_banner_sub_heading');
$contact_banner_heading = get_field('contact_banner_heading');
$contact_banner_number = get_field('contact_banner_number');
$contact_banner_email = get_field('contact_banner_email');
$contact_banner_direction_text = get_field('contact_banner_direction_text');
$contact_banner_direction_link = get_field('contact_banner_direction_link');
if(empty($contact_banner_desktop_image) && empty($contact_banner_mobile_image)){
  $no_banner_img = 'no-banner-img'; } else {  $no_banner_img = ''; }
?>

<section class="split-banner-section pos-relative">
  <div class="container">
    <div class="split-banner-main flex <?php echo $no_banner_img; ?>">
      <div class="split-banner-text">
        <div class="split-banner-bg pos-absolute">&nbsp;</div>
        <?php if ($contact_banner_sub_heading) { ?>
          <span class="optional-text"><?php echo $contact_banner_sub_heading; ?></span>
        <?php } ?>
        <?php if ($contact_banner_heading) { ?>
    <h1><?php echo $contact_banner_heading; ?></h1>
<?php } else { ?>
    <h1><?php echo get_the_title(); ?></h1>
<?php } ?>
        <hr class="small">
        <ul class="contact-links flex">
          <?php if ($contact_banner_number) { ?>
            <li><a href="tel:<?php echo $contact_banner_number; ?>"><i class="fa-regular fa-phone"></i><?php echo $contact_banner_number; ?></a></li>
          <?php } ?>
          <?php if ($contact_banner_email) { ?>
            <li><a href="mailto:<?php echo $contact_banner_email; ?>"><i class="fa-regular fa-at"></i><?php echo $contact_banner_email; ?></a></li>
          <?php } ?>
          <?php if ($contact_banner_direction_text && $contact_banner_direction_link) { ?>
            <li><a href="<?php echo $contact_banner_direction_link; ?>" target="_blank"><i class="fa-regular fa-location-dot"></i><?php echo $contact_banner_direction_text; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <!--end of contact banner text -->
      <div class="split-banner-thumb">
        <?php if ($contact_banner_mobile_image ||  $contact_banner_desktop_image) {
          $contact_banner_mobile_image = $contact_banner_mobile_image ? $contact_banner_mobile_image : $contact_banner_desktop_image;
          $contact_banner_desktop_image = $contact_banner_desktop_image ? $contact_banner_desktop_image : $contact_banner_mobile_image; ?>
          <div class="contact-img">
            <picture class="object-fit">
              <source srcset="<?php echo $contact_banner_desktop_image['url']; ?>" media="(min-width: 1024px)">
              <source srcset="<?php echo $contact_banner_desktop_image['url']; ?>" media="(min-width: 768px)">
              <img src="<?php echo $contact_banner_mobile_image['url']; ?>" alt="<?php echo $contact_banner_mobile_image['alt']; ?>" title="<?php echo $contact_banner_mobile_image['title']; ?>" />
            </picture>
          </div>
        <?php } ?>
        <!-- end of contact img -->
      </div>
      <!--end of contact banner thumb -->
    </div>
  </div>
</section>

<?php
$cta_heading = get_field('contact_short_cta_heading');
$cta_description = get_field('contact_short_cta_description');
$cta_button_text = get_field('contact_short_cta_button_text');
$cta_button_link = get_field('contact_short_cta_button_link');
?>
<!-- end of contact banner section -->
<section class="featured-initiative">
  <div class="container">
    <div class="featured-int flex">
      <div class="featured-line">&nbsp;</div><!--end of quote line-->
      <div class="featured-int-lt">
        <?php if ($cta_heading) { ?>
          <div class="h5"><?php echo $cta_heading; ?></div>
        <?php } ?>
        <?php if ($cta_description) { ?>
          <?php echo $cta_description; ?>
        <?php } ?>
      </div>
      <!-- end of featured int lt-->
      <div class="featured-int-rt">
        <?php if ($cta_button_text && $cta_button_link) { ?>
          <a href="<?php echo $cta_button_link; ?>" class="button trans-btn"><?php echo $cta_button_text; ?></a>
        <?php } ?>
      </div>
    </div>
    <!-- end of featured int -->
  </div>
</section>

<?php
$donations_heading = get_field('contact_making_donations_heading');
$donations_description = get_field('contact_making_donations_description');
$donation_image = get_field('contact_making_donation_image');
?>
<!-- end of featured initiative -->
<section class="contact-container">
  <div class="container">
    <div class="contact-inner flex">
      <div class="contact-lt">
        <div class="making-donations">
          <?php if ($donations_heading) { ?>
            <div class="h5"><?php echo $donations_heading; ?></div>
          <?php }
		  if( have_rows('donation_guidance') ):
			$i=1;  while ( have_rows('donation_guidance') ) : the_row();
			$donate_guide_heading         = get_sub_field('donate_guide_heading');
			$donate_guide_description  = get_sub_field('donate_guide_description');
			if(!empty($donate_guide_heading  && $donate_guide_description)){?>
			<div class="donation-block">
				<?php if(!empty($donate_guide_heading )){?>
				<div class="h6"><?php echo $donate_guide_heading; ?></div>
				<?php } if(!empty($donate_guide_description )){
					echo $donate_guide_description;
				}
				
				?>
		  	</div>
		  <?php } endwhile;
		endif;
         ?>
          <!--end of donation block -->
          <?php $footer_social_media = get_field('footer_social_media', 'option');
                if ($footer_social_media) {?>
                  	<div class="cnt-sm">
                      	<ul>
                        <?php foreach ($footer_social_media as $social_item) {
                                  $font_awesome = $social_item['footer_social_media_fontawesome_icon'];
                                  $link = $social_item['footer_social_media_fontawesome_link'];
                                  if (($font_awesome) &&  ($link)) { ?>
                                    <li><a href="<?php echo $link; ?>" class="flex flex-center" target="_blank" rel="noopener"><i class="fa-brands <?php echo $font_awesome; ?>"></i></a></li>
                                  <?php }
                        }
						 ?>
                      </ul>
            	   </div>
          <?php } ?>
          <!-- end of cnt sm -->
        </div>
        <!-- end of making donations -->
        <?php if ($donation_image) { ?>
          <div class="contact-img">
            <figure class="object-fit"> <img src="<?php echo $donation_image['url']; ?>" alt="<?php echo $donation_image['alt']; ?>" title="<?php echo $donation_image['alt']; ?>" /></figure>
          </div>
        <?php } ?>
        <!-- end of contact img -->


      </div>
      <!-- end of contact lt -->

      <?php $team_heading = get_field('contact_connect_team_heading');
      $team_repeater = get_field('contact_connect_team_repeater'); ?>



      <div class="contact-rt">
        <?php if ($team_heading) { ?>
          <h4> <?php echo $team_heading; ?></h4>
        <?php } ?>
        <div class="accordion-module">
          <div class="accordion-main">
            <?php if ($team_repeater) {
              foreach ($team_repeater as $team) {
                $repeater_heading = $team['contact_connect_team_repeater_heading'];
                $repeater_members = $team['contact_connect_team_repeater_members'];
                $repeater_content = $team['contact_connect_team_repeater_content'];
            ?>
                <div class="accordion">
                  <?php if ($repeater_heading || $repeater_members) {
                    if ($repeater_heading) {  ?>
                      <div class="accordion-item"> <a href="#" class="accordion-heading"><span class="title"> <?php echo $repeater_heading; ?></span> </a>
                      <?php } ?>
                      <div class="content">
                       
                        <?php if ($repeater_members) { ?>
                          <div class="members-wrap flex">
                            <?php foreach ($repeater_members as $member) {
                              $profile_image = $member['contact_connect_team_repeater_profile_image'];
                              $name = $member['contact_connect_team_repeater_name'];
							  $lastname = $member['contact_connect_team_repeater_last_name'];
                              $position_or_job = $member['contact_connect_team_repeater_position_or_job'];
                              $number = $member['contact_connect_team_repeater_number'];
                              $email = $member['contact_connect_team_repeater_email'];
                            ?>
                              <div class="members-grid">
                                <?php if ($profile_image) { ?>
                                  <div class="members-thumb">
                                    <figure class="object-fit"> <img src="<?php echo $profile_image['url']; ?>" alt="<?php echo $profile_image['alt']; ?>" title="<?php echo $profile_image['alt']; ?>" /></figure>
                                  </div>
                                <?php } ?>
                                <div class="members-cnt">
									<?php if(!empty($name || $lastname)) {?>
										<div class="h6">
											<?php if ($name) { ?>
												<?php echo $name; ?>
											<?php } if($lastname){
												echo $lastname;
											} ?>
										</div>

									<?php }
                                  if ($position_or_job) { ?>
                                    <span class="mem-position"><?php echo $position_or_job; ?></span>
                                  <?php } ?>
                                  <ul class="mem-links flex">
                                    <?php if ($number) { ?>
                                      <li><a href="tel:<?php echo $number; ?>"><i class="fa-regular fa-phone"></i><?php echo $number; ?></a></li>
                                    <?php }
                                    if ($email) { ?>
                                      	<li><a href="mailto:<?php echo $email; ?>">
									  		<i class="fa-regular fa-at"></i>
											 email
									  		<?php echo $name; ?></a>
										</li>
                                    <?php } ?>
                                  </ul>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        <?php  } if ($repeater_content) { ?>
                          <?php echo $repeater_content; ?>
                        <?php } ?>

                      </div>

                      </div>
                </div>

                <?php }
                }
              } ?>
          </div>
             </div>
          <?php if ($donation_image) { ?>
            <div class="contact-img">
              <figure class="object-fit"> <img src="<?php echo $donation_image['url']; ?>" alt="<?php echo $donation_image['alt']; ?>" title="<?php echo $donation_image['alt']; ?>" /></figure>
            </div>
          <?php } ?>
       
      </div>
    </div>
</section>

<?php get_footer();

<?php get_header(); ?>
	<?php get_template_part( 'partials/page', 'header' ); ?>
	<section class="bg-y">
		<div class="container">
			<div class="donate-bar">
				<p>100% of your donation goes to helping people suffering from cancer.</p>
				<a href="#" class="btn btn-blue btn-lg">Donate Now</a>
			</div>
		</div>
	</section>
	<section class="bg-w">
		<div class="container">
			<div class="howwehwelp">
				<h2 class="txt-k text-center">How We Help</h2>
				<ul id="howwehelp-nav" class="howwehelp-nav">
					<li class="txt-r r active" data-item="desc-1">
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_homesofhope.svg">
						<p>Homes of Hope</p>
					</li>
					<li class="txt-p p" data-item="desc-2">
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_strengthkeepers.svg">
						<p>Strength Keepers</p>
					</li>
					<li class="txt-g g" data-item="desc-3">
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_supportgroups.svg">
						<p>Support Groups</p>
					</li>
					<li class="txt-y y" data-item="desc-4">
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_communityevents.svg">
						<p>Community Events</p>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<section class="bg-ow">
		<div class="container">
			<div id="howwehelp-desc" class="howwehelp-desc">
				<div id="desc-1" class="active">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_homesofhope.svg">
						<figcaption class="txt-r">Homes of Hope</figcaption>
					</figure>
					<div class="content">
						<p>Adipsy's Homes of Hope provides a time of rest from the difficulties that come with battling cancer. It is a getaway for, not only the individual suffering from cancer, but for their family. This time will allow them to relax, rejuvenate, and restore their relationships and health. Time is the only thing we will never get back, so what we do with it matters most.</p>
						<a href="#" class="btn btn-red">Get More Info</a>
					</div>
				</div>
				<div id="desc-2" style="display:none;">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_strengthkeepers.svg">
						<figcaption class="txt-p">Strength Keepers</figcaption>
					</figure>
					<div class="content">
						<p>Adipsy’s Strength Keepers provide food to hospitals and homes throughout the community every week. Whether it's providing pastries during treatment or groceries for families. The help provided by Strength Keepers allows families affected by cancer to focus on being together.</p>
						<a href="#" class="btn btn-purple">Get More Info</a>
					</div>
				</div>
				<div id="desc-3" style="display:none;">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_supportgroups.svg">
						<figcaption class="txt-g">Support Groups</figcaption>
					</figure>
					<div class="content">
						<p>Adipsy provides support groups for people suffering from cancer. These groups meet every month in the Hampton Roads area. For more information on the different support groups please contact us at info@adipsy.org</p>
						<a href="#" class="btn btn-green">Get More Info</a>
					</div>
				</div>
				<div id="desc-4" style="display:none;">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_communityevents.svg">
						<figcaption class="txt-y">Community Events</figcaption>
					</figure>
					<div class="content">
						<p>Adipsy believes each person who is battling cancer should be able to get out of their everyday environment and have fun with the community. This is an opportunity for family and friends to enjoy time away from the hospital and to create memories that will last a lifetime.</p>
						<a href="#" class="btn btn-yellow">Get More Info</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-y">
		<div class="container">
			<div class="get-involved-title">
				<h2 class="txt-k text-center">How you can get involved!</h2>
			</div>
		</div>
	</section>
	<section class="bg-w">
		<div class="container">
			<div class="get-involved">
				<a href="#" class="get-involved-block" style="background-image:url(<?php echo get_template_directory_uri(); ?>/library/img/journey.jpg);">
					<div class="overlay bg-b"></div>
					<h3>How we got started on an amazing journey!</h3>
					<p href="#">Get Informed <img src="<?php echo get_template_directory_uri(); ?>/library/img/arrow-right.svg"></p>
				</a>
				<a href="#" class="get-involved-block" style="background-image:url(<?php echo get_template_directory_uri(); ?>/library/img/donate.jpg);">
					<div class="overlay bg-g"></div>
					<h3>Donate monthly or a one-time amount.</h3>
					<p href="#">Donate Now <img src="<?php echo get_template_directory_uri(); ?>/library/img/arrow-right.svg"></p>
				</a>
				<a href="#" class="get-involved-block" style="background-image:url(<?php echo get_template_directory_uri(); ?>/library/img/volunteer.jpg);">
					<div class="overlay bg-r"></div>
					<h3>Become a volunteer in our community.</h3>
					<p>Apply Now <img src="<?php echo get_template_directory_uri(); ?>/library/img/arrow-right.svg"></p>
				</a>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>



	<section class="bg-blue section-event">
		<div class="container">
			<div class="row event-row">
				<?php if( have_rows('featured_items') ): ?>
					<?php while ( have_rows('featured_items') ) : the_row(); ?>
						<?php if(get_sub_field('date')):
										$date = get_sub_field('date');
										$date = new DateTime($date);
									endif;
									$linktype = get_sub_field('link_type');
									$btnlink = "";
									$btnpagelink = get_sub_field('pagelink');
					        $btncustomlink = get_sub_field('customlink');
						      $btndoclink = get_sub_field('documentlink');
					        $btnnewtab = (get_sub_field('new_tab')=="yes") ? "_blank" : "_self" ;
					        switch($linktype):
					          case "pagelink" : $btnlink = $btnpagelink; break;
					          case "customlink" : $btnlink = $btncustomlink; break;
					          case "documentlink" : $btnlink = $btndoclink; break;
					        endswitch;
						?>
						<div class="event-block-container">
							<div class="event-block">
								<?php if ($linktype != "false"): echo '<a href="'.$btnlink.'" target="'.$btnnewtab.'">'; endif; ?>
								<div class="etop" <?php if(get_sub_field('image')): echo 'style="background-image:url('.get_sub_field('image').');"'; endif; ?>>
									<?php if(get_sub_field('date')): ?>
									<div class="emon">
										<?php echo $date->format('M'); ?>
									</div>
									<div class="eday">
										<?php echo $date->format('d'); ?>
									</div>
									<?php endif; ?>
								</div>
								<div class="ebottom">
									<div class="edefine">
										<?php the_sub_field('content'); ?>
									</div>
									<?php
									// <!-- <a href="#" class="btn ebutton">
									// 	View More
									// </a> -->
									?>
								</div>
								<?php if ($linktype != "false"): echo '</a>'; endif; ?>
							</div>
						</div>
				    <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<section class="bg-blue section-quote">
		<div class="container">
				<div class="single-quote">
					<div class="the-quote"><?php the_field('twitter_quote'); ?></div>
					<a href="<?php the_field('twitter_user_url'); ?>" class="the-attrib" target="_blank"><i class="fa fa-twitter"></i> <?php the_field('twitter_user'); ?></a>
				</div>
		</div>
	</section>
	<section class="bg-blue section-viewblog hide">
		<div class="container">
			<a class="btn btn-white-hollow" href="#">View Blog</a>
		</div>
	</section>
	<?php if( have_rows('corporate_donors_home', 'option') ): ?>
		<section class="bg-blue academic-track text-centerjustify">
			<div class="container">
				<div class="row">
						<h2>Thank You To Our Corporate Donors</h2>
						<?php while ( have_rows('corporate_donors_home', 'option') ) : the_row(); ?>
							<div class="col-sm-6 col-md-15 text-center" style="margin-top:30px;margin-bottom:50px;">
								<a href="<?php the_sub_field('link'); ?>" target="_blank">
									<img src="<?php the_sub_field('image'); ?>" style="width:100%;max-width:170px;">
								</a>
							</div>
						<?php endwhile; ?>
						<a href="<?php bloginfo('url'); ?>/donors/" class="btn btn-link-white">View full list of donors</a>
				</div>
			</div>
		</section>

	<?php endif; ?>
<?php get_footer(); ?>

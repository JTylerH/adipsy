<?php /* Template Name: Temporary - Academics Home Page Layout */

get_header(); ?>

<?php get_template_part( 'partials/page', 'header' ); ?>

			<main id="content" class="hero-sections">

				<?php get_template_part( 'partials/menu', 'academics' ); ?>

				<section class="basic-content bg-blue academic-track">
					 <div class="container">
						 <h1>Professional Development Electives</h1>
						 <p>Wave Leadership College professional development electives equip students to lead in a pastoral role, in digital media and the arts, or in management.  Each concentration includes 12 credit hours of classes with highly credentialed professors in the top of their field, utilizing the latest technology and research.</p>
						 <div class="track-container">
							 <div class="track">
								  <img src="<?php echo get_template_directory_uri(); ?>/library/img/academics_pastoral_track.jpg">
								 	<p>Pastoral</p>
							 </div>
							 <div class="track">
								  <img src="<?php echo get_template_directory_uri(); ?>/library/img/academics_management_track.jpg">
								 	<p>Church Management</p>
							 </div>
							 <div class="track">
								  <img src="<?php echo get_template_directory_uri(); ?>/library/img/academics_media_track.jpg">
								 	<p>Media Production</p>
							 </div>
						 </div>
						 <a href="#" class="btn btn-orange">Apply Now</a>
					 </div>
				</section>
				<section class="basic-content bg-white leap">
					 <div class="container">
						 <h1 class="tag">LEAP Departments</h1>
						 <p>Leadership Experience And Practicum (LEAP) is what makes the Wave Leadership College experience unique. Under the direction of the WLC LEAP Director, you will gain practical experience in a variety of ministry departments throughout one of our Wave Church locations or in your own local Hampton Roads church!  For the period of your enrollment, you will have the opportunity to train in a different department each semester. Additionally, you will attend a weekly class to learn and discuss habits and attitudes that develop great leaders.</p>
						 <div class="leap-dept-container">
							 <div class="leap-dept">
								 <img src="<?php echo get_template_directory_uri(); ?>/library/img/pastoral.png">
								 <p>Pastoral</p>
								</div>
							 <div class="leap-dept">
								 <img src="<?php echo get_template_directory_uri(); ?>/library/img/creative.png">
								 <p>Creative</p>
								</div>
							 <div class="leap-dept">
								 <img src="<?php echo get_template_directory_uri(); ?>/library/img/admin.png">
								 <p>Administrative</p>
								</div>
							 <div class="leap-dept">
								 <img src="<?php echo get_template_directory_uri(); ?>/library/img/outreach.png">
								 <p>Outreach</p>
								</div>
						 </div>
					 </div>
				</section>
				<section class="basic-content section-rmi">
					<div class="container">
						<h2>Request More Info</h2>
						<p>We’re excited to connect with you and share about the many opportunities available to Wave Leadership College students.</p>
					</div>
					<div class="container">
						<?php echo do_shortcode('[contact-form-7 id="131"]'); ?>
					</div>
				</section>
			</main>

<?php get_footer(); ?>

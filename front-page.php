<?php
	$btnrep = "";
	$btncount = 0;
	get_header(); ?>
	<?php get_template_part( 'partials/page', 'header' ); ?>
	<section class="bg-y">
		<div class="container">
			<div class="donate-bar">
				<p>100% of your donation goes to helping people suffering from cancer.</p>
				<a href="<?php bloginfo('url'); ?>/donate" class="btn btn-blue btn-lg">Donate Now</a>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/custom', 'howwehelp' ); ?>
	<?php get_template_part( 'partials/custom', 'getinvolved' ); ?>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>
	<?php get_template_part( 'partials/custom', 'sponsors' ); ?>
<?php get_footer(); ?>

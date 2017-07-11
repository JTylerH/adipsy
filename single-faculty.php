<?php get_header(); ?>
	<header class="bg-offwhite" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
		<div class="faculty-img"><img src="<?php the_field('photo') ?>"></div>
		<h1><?php the_title(); ?></h1>
		<ul>
			<?php if(get_field('title')): ?>
				<li><?php the_field('title') ?></li>
			<?php endif; ?>
			<li><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></li>
			<?php if(get_field('linkedin_url')): ?>
			<li><a href="<?php the_field('linkedin_url') ?>" target="_blank" class="social">LinkedIn</a></li>
			<?php endif; ?>
		</ul>
	</header>
	<section class="faculty-member-info bg-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="accolades">
						<h3>Degrees &amp; Accolades</h3>
						<?php
						if( have_rows('accolades') ):
							echo '<ul>';
								while ( have_rows('accolades') ) : the_row();

										echo '<li>'.get_sub_field('list').'</li>';

								endwhile;
							echo '</ul>';
						endif;?>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="classes">
						<h3>Teaches</h3>
						<?php
						if( have_rows('classes') ):
							echo '<ul>';
								while ( have_rows('classes') ) : the_row();

										echo '<li>'.get_sub_field('class').'</li>';

								endwhile;
							echo '</ul>';
						endif;?>
					</div>
				</div>
			</div>
			<div class="row hide">
				<div class="col-xs-12">
					<h3>Biography</h3>
					<p>...<br>coming soon<br>...</p>
				</div>
			</div>
		</div>

	</section>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>

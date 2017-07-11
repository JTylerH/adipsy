<?php /* Template Name: Placeholder */

get_header(); ?>
				<header class="bg-blueshade0 valign-center ch" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
						<h1>The Page is Sleeping!</h1>
						<p><?php the_title(); ?> page is being updated. Check back soon.</p>
						<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>" class="btn btn-white-hollow">Go Back to Previous Page</a>
				</header>
				<?php get_template_part( 'partials/menu', 'about' ); ?>
				<?php get_template_part( 'partials/menu', 'academics' ); ?>
				<?php get_template_part( 'partials/menu', 'financial' ); ?>
<?php get_footer(); ?>

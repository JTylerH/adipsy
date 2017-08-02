<?php get_header(); $pid = get_option( 'page_for_posts' ); ?>
<header class="bg-w valign-center ch txt-k" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
	<div class="container">
    <h1><?php single_cat_title(''); ?></h1>
	</div>
</header>
<section class="bg-w blogpage" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
				<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p class="byline entry-meta vcard hide">
        <?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
							/* the time the post was published */
							'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
							/* the author of the post */
							'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
				); ?>
				</p>
				<?php the_excerpt(); ?>
				<?php printf( '<div class="footer-category">' . get_the_category_list(', ') . '</div>' ); ?>
				<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
			</article>
		<?php endwhile; ?>

				<?php bones_page_navi(); ?>

		<?php else : ?>

				<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
					</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
					</section>
					<footer class="article-footer">
							<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
					</footer>
				</article>

		<?php endif; ?>
	</div>
</section>
<?php get_template_part( 'partials/custom', 'getinvolved' ); ?>
<?php
// check if the flexible content field has rows of data
if( have_rows('flex_section',$pid) ):

     // loop through the rows of data
    while ( have_rows('flex_section',$pid) ) : the_row();

        switch ( get_row_layout() ):

        case 'hero_section': get_template_part( 'partials/section', 'hero' ); break;
        case 'basic_section': get_template_part( 'partials/section', 'basic' ); break;
        case 'content_with_dropdown': get_template_part( 'partials/section', 'basic-withdropdown' ); break;
        case 'basic_section_double': get_template_part( 'partials/section', 'basic-double' ); break;
        case 'contact_form_section': get_template_part( 'partials/section', 'form' ); break;
        case 'heading_with_bars': get_template_part( 'partials/section', 'headingwithbars' ); break;
        case 'accordion_section': get_template_part( 'partials/section', 'accordion' ); break;
        case 'hero_portait_section': get_template_part( 'partials/section', 'portraithero' ); break;
        case 'degree_course_section': get_template_part( 'partials/section', 'degreecourse' ); break;
        case 'custom_php': get_template_part( 'partials/custom', get_sub_field('template_part') ); break;
        default: //do nothing

        endswitch;

    endwhile;

else :

    // no layouts found

endif;

?>
<?php get_footer(); ?>

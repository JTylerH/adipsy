<?php get_header(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
		<header class="article-header entry-header bg-w valign-center ch txt-k" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
			<div class="container">
		    <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
			</div>
		</header>

		<section class="bg-w entry-content cf" itemprop="articleBody">
			<div class="container">
			<?php
				// the content (pretty self explanatory huh)
				the_content();

				/*
				 * Link Pages is used in case you have posts that are set to break into
				 * multiple pages. You can remove this if you don't plan on doing that.
				 *
				 * Also, breaking content up into multiple pages is a horrible experience,
				 * so don't do it. While there are SOME edge cases where this is useful, it's
				 * mostly used for people to get more ad views. It's up to you but if you want
				 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
				 *
				 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
				 *
				*/
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
			</div>
		</section> <?php // end article section ?>

		<section class="bg-w article-footer">
			<div class="container">
				<?php printf( '<div class="footer-category">' . get_the_category_list(', ') . '</div>' ); ?>
				<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
			</div>
		</section> <?php // end article footer ?>

		<?php //comments_template(); ?>

	</article> <?php // end article ?>

<?php get_footer(); ?>

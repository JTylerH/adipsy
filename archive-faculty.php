<?php get_header(); ?>
	<header class="bg-blue valign-top ch" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
		<h1>Faculty</h1>
	</header>
	<?php get_template_part( 'partials/menu', 'academics' ); ?>
	<section class="faculty-members bg-black">
		<div class="container">
			<?php
			$args = array( 'post_type' => 'faculty', 'order' => 'ASC', 'orderby' => 'post_title_last_word', 'posts_per_page' => -1, );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				if(!get_field('hide')):
				  echo '<a class="faculty-member" href="'.get_permalink().'">'.
					'<img src="'.get_field('photo').'">'.
					'<div class="info">'.
					'<div class="name"><span>'.get_the_title();
					if(get_field('suffix')):
						echo ', '.get_field('suffix');
					endif;
					echo '</span></div>';
					if( have_rows('classes') ):
					 	echo '<ul class="classes">';
					    while ( have_rows('classes') ) : the_row();

					        echo '<li>'.get_sub_field('class').'</li>';
									break;
					    endwhile;
						echo '</ul>';
					endif;
				  echo '</div>';
					// echo '<div class="expander"><span></span></div>';
					echo '</a>';
				endif;
			endwhile;
			?>
			<div class="col-xs-12">
				<a href="<?php bloginfo('url') ?>/about/administration" class="btn btn-white-hollow">View Administration</a>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>

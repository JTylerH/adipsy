<?php get_header(); ?>
	<header class="bg-blue valign-top ch" role="banner" itemscope="" itemtype="http://schema.org/WPHeader">
		<h1>Administration</h1>
	</header>
	<?php get_template_part( 'partials/menu', 'about' ); ?>
	<section class="admin-members bg-white">
		<div class="container">
			<?php
			if( have_rows('admin_members','option') ):
				while ( have_rows('admin_members','option') ) : the_row();
					$post_object = get_sub_field('admin_member');
					$post = $post_object;
					setup_postdata( $post );
			?>
			<?php
			  echo '<a class="admin-member" href="'.get_permalink().'">'.
				'<img src="'.get_field('admin_photo').'">'.
				'<div class="info">'.
				'<div class="name"><span>'.get_the_title();
				if(get_field('admin_suffix')):
					echo ', '.get_field('admin_suffix');
				endif;
				echo '</span></div>'.
				'<div class="title">'.get_field('title').'</div>';
				// if( have_rows('accolades') ):
				// 	echo '<ul class="accolades">';
				// 		while ( have_rows('accolades') ) : the_row();
				//
				// 				echo '<li>'.get_sub_field('list').'</li>';
				//
				// 		endwhile;
				// 	echo '</ul>';
				// endif;
				echo '</div></a>';
			?>
			<?php
				wp_reset_postdata();
			  endwhile;
				endif;
			?>
			<div class="col-xs-12">
				<a href="https://wavecollege.com/academics/faculty/" class="btn btn-black-hollow">View Faculty</a>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>

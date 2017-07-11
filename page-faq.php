<?php get_header(); ?>
				<?php get_template_part( 'partials/page', 'header' ); ?>
				<?php get_template_part( 'partials/menu', 'about' ); ?>
				<section class="flex-basic bg-white flex-faq">
					<div class="container">
						<?php if( have_rows('faq_list', 'option') ):?>
							<div class="accordion-box">
							<?php $counter = 0;
						    while ( have_rows('faq_list', 'option') ) : the_row(); ?>

								<?php if($counter > 0): ?>
									<?php if(get_sub_field('use_as_section')): ?>
									</div></div><div class="accordion-box">
									<?php endif; ?>
								<?php endif; ?>

								<?php if(get_sub_field('use_as_section')): ?>
						        	<div class="accordion-header"><h3><?php the_sub_field('question'); ?></h3></div>
											<div class="accordion-content"><div class="divide"></div>
									<?php else : ?>
							        <div class="accordion-question"><?php the_sub_field('question'); ?></div>
							        <div class="accordion-answer"><?php the_sub_field('answers'); ?></div>
									<?php endif; ?>
						    <?php $counter++; endwhile; ?>
								</div>
						<?php endif; ?>
					</div>
				</section>
				<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>

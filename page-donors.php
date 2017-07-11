<?php get_header(); ?>
				<?php get_template_part( 'partials/page', 'header' ); ?>
				<?php if( have_rows('corporate_donors', 'option') ): ?>
					<section class="bg-white academic-track text-center" style="padding-bottom:100px;">
						<div class="container">
							<div class="row">
								<?php while ( have_rows('corporate_donors', 'option') ) : the_row(); ?>
										<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center" style="margin-top:30px;margin-bottom:30px;">
											<a href="<?php the_sub_field('link'); ?>" target="_blank">
												<img src="<?php the_sub_field('image'); ?>" style="width:100%;max-width:170px;">
											</a>
										</div>
									<?php endwhile; ?>
							</div>
							<div class="row">
								<div class="col-xs-12" style="margin-top:30px;">
									<a href="mailto:info@wavecollege.com" class="btn btn-orange">Become a Sponsor</a>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>
<?php get_footer(); ?>

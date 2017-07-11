<section class="basic-content section-administration" style="background:#fff;color:#252526;">
	<div class="container">
		<?php if( have_rows('faculty', 'option') ): ?>
			<?php while( have_rows('faculty', 'option') ): the_row(); ?>
				<div class="faculty-member col-sm-4">
					<img src="<?php the_sub_field('staff_picture'); ?>" style="width:100%;" >
					<p><?php the_sub_field('full_name'); ?></p>
					<p><?php the_sub_field('title'); ?></p>
					<?php if( have_rows('accolades') ): ?>
						<ul>
						<?php while( have_rows('accolades') ): the_row(); ?>
							<li><?php the_sub_field('description'); ?></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
<section class="section-button-faculty-more text-center">
  <button id="showFaculty" class="btn btn-primary">Faculty</button>
</section>
<section id="section-faculty" class="section-faculty" style="display:none;">
  <div class="container">
  	<p class="text-center">Show Faculty Here</p>
  </div>
</section>

<script>
jQuery(document).ready(function($) {
	$('button#showFaculty').click(function(){
		$('section#section-faculty').slideDown();
	});
});
</script>

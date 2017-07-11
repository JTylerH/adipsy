<section class="flex-basic bg-white section-degree-plan">
  <div class="container">
    <div class="plan-headers"><?php the_sub_field("degree_studies_header"); ?></div>
  </div>
  <div class="container narrow">
    <div class="plan-core">
      <div class="row">
        <div class="col-sm-6">
          <?php the_sub_field("degree_studies_column_1"); ?>
        </div>
        <div class="col-sm-6">
          <?php the_sub_field("degree_studies_column_2"); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="flex-basic bg-white section-degree-plan">
  <div class="container">
    <div class="plan-headers"><?php the_sub_field("degree_general_header"); ?></div>
  </div>
  <div class="container narrow">
    <div class="plan-core">
      <div class="row">
        <div class="col-sm-6">
          <?php the_sub_field("degree_general_column_1"); ?>
        </div>
        <div class="col-sm-6">
          <?php the_sub_field("degree_general_column_2"); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="flex-basic bg-white section-degree-plan">
  <div class="container">
    <div class="plan-headers"><?php the_sub_field("degree_electives_header"); ?></div>
  </div>
  <div class="container">
    <div class="plan-electives">
      <div class="row three-cols">
        <div class="col-sm-4">
          <p class="col-head"><a href="<?php the_sub_field("degree_electives_col1_header_url"); ?>"><?php the_sub_field("degree_electives_col1_header"); ?></a></p>
          <?php the_sub_field("degree_electives_column_1"); ?>
        </div>
        <div class="col-sm-4">
          <p class="col-head"><a href="<?php the_sub_field("degree_electives_col2_header_url"); ?>"><?php the_sub_field("degree_electives_col2_header"); ?></a></p>
          <?php the_sub_field("degree_electives_column_2"); ?>
        </div>
        <div class="col-sm-4">
          <p class="col-head"><a href="<?php the_sub_field("degree_electives_col3_header_url"); ?>"><?php the_sub_field("degree_electives_col3_header"); ?></a></p>
          <?php the_sub_field("degree_electives_column_3"); ?>
        </div>
        <div class="col-sm-12"><p class="postscript"><?php the_sub_field("degree_electives_post_script"); ?></p></div>
      </div>
    </div>
  </div>
</section>
<section class="flex-basic bg-white section-degree-plan text-centerjustify">
  <div class="container">
    <div class="plan-headers"><?php the_sub_field("degree_leap_header"); ?></div>
  </div>
  <div class="container narrow">
    <div class="plan-leap">
      <div class="row">
        <div class="col-sm-12">
          <?php the_sub_field("degree_leap_content"); ?>
          <a href="<?php the_sub_field("degree_leap_button_url"); ?>" class="bt btn-link"><?php the_sub_field("degree_leap_button_text"); ?></a>
          <p class="course-schedule-btn"><a href="<?php the_sub_field("degree_course_schedule_pdf"); ?>" class="btn btn-orange btn-lg"><?php the_sub_field("degree_course_schedule_btn_text"); ?></a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="flex-basic bg-offwhite text-centerjustify">
  <div class="container">
      <h2><?php the_sub_field("degree_course_sequences_header"); ?></h2>
      <p><?php the_sub_field("degree_course_sequences_content"); ?></p>
      <div class="content-buttons row">
        <div class="col-md-6">
          <a href="<?php the_sub_field("full_time_pdf"); ?>" target="_blank" class="btn btn-black-hollow btn-lg btn-block"><?php the_sub_field("full_time_text"); ?></a>
        </div>
        <div class="col-md-6">
          <a href="<?php the_sub_field("part_time_pdf"); ?>" target="_blank" class="btn btn-black-hollow btn-lg btn-block"><?php the_sub_field("part_time_text"); ?></a>
        </div>
      </div>
  </div>
</section>

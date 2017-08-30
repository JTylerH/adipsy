<section class="bg-w">
  <div class="container">
    <div class="howwehwelp">
      <h2 class="txt-k text-center">How We Help</h2>
      <ul id="howwehelp-nav" class="howwehelp-nav">
        <li class="txt-r r active" data-item="desc-1">
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_homesofhope.svg">
          <p>Homes of Hope</p>
        </li>
        <!-- <li class="txt-p p" data-item="desc-2">
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_strengthkeepers.svg">
          <p>Strength Keepers</p>
        </li> -->
        <li class="txt-g g" data-item="desc-3">
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_supportgroups.svg">
          <p>Support Groups</p>
        </li>
        <li class="txt-p p" data-item="desc-4">
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_communityevents.svg">
          <p>Community Events</p>
        </li>
      </ul>
    </div>
  </div>
</section>
<section class="bg-ow">
  <div class="container">
    <div id="howwehelp-desc" class="howwehelp-desc">
      <div id="desc-1" class="active">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_homesofhope.svg">
          <figcaption class="txt-r">Homes of Hope</figcaption>
        </figure>
        <div class="content">
          <p><?php the_field('homes_of_hope_desc'); ?></p>
          <?php
            if( have_rows('homes_of_hope_button_repeater') ):
            $btncount = 0;
            $btnrep = "";
            while ( have_rows('homes_of_hope_button_repeater') ) : the_row();
              if (get_sub_field('button_show')):
                $btncount++;
                $btntext = get_sub_field('button_text');
                $btnstyle = get_sub_field('button_style');
                $btnpagelink = get_sub_field('button_pagelink');
                $btncustomlink = get_sub_field('button_customlink');
                $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
                $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
                $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
              endif;
            endwhile; ?>
            <div class="button-repeater has-<?php echo $btncount ?>-buttons">
              <?php echo $btnrep; ?>
            </div>
            <?php
          endif;
          ?>
        </div>
      </div>
      <!-- <div id="desc-2" style="display:none;">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_strengthkeepers.svg">
          <figcaption class="txt-p">Strength Keepers</figcaption>
        </figure>
        <div class="content">
          <p><?php the_field('strength_keepers_desc'); ?></p>
          <?php
            if( have_rows('strength_keepers_button_repeater') ):
            $btncount = 0;
            $btnrep = "";
            while ( have_rows('strength_keepers_button_repeater') ) : the_row();
              if (get_sub_field('button_show')):
                $btncount++;
                $btntext = get_sub_field('button_text');
                $btnstyle = get_sub_field('button_style');
                $btnpagelink = get_sub_field('button_pagelink');
                $btncustomlink = get_sub_field('button_customlink');
                $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
                $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
                $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
              endif;
            endwhile; ?>
            <div class="button-repeater has-<?php echo $btncount ?>-buttons">
              <?php echo $btnrep; ?>
            </div>
            <?php
          endif;
          ?>
        </div>
      </div> -->
      <div id="desc-3" style="display:none;">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_supportgroups.svg">
          <figcaption class="txt-g">Support Groups</figcaption>
        </figure>
        <div class="content">
          <p><?php the_field('support_groups_desc'); ?></p>
          <?php
            if( have_rows('support_groups_button_repeater') ):
            $btncount = 0;
            $btnrep = "";
            while ( have_rows('support_groups_button_repeater') ) : the_row();
              if (get_sub_field('button_show')):
                $btncount++;
                $btntext = get_sub_field('button_text');
                $btnstyle = get_sub_field('button_style');
                $btnpagelink = get_sub_field('button_pagelink');
                $btncustomlink = get_sub_field('button_customlink');
                $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
                $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
                $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
              endif;
            endwhile; ?>
            <div class="button-repeater has-<?php echo $btncount ?>-buttons">
              <?php echo $btnrep; ?>
            </div>
            <?php
          endif;
          ?>
        </div>
      </div>
      <div id="desc-4" style="display:none;">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/library/img/icon_communityevents.svg">
          <figcaption class="txt-p">Community Events</figcaption>
        </figure>
        <div class="content">
          <p><?php the_field('community_events_desc'); ?></p>
          <?php
            if( have_rows('community_events_button_repeater') ):
            $btncount = 0;
            $btnrep = "";
            while ( have_rows('community_events_button_repeater') ) : the_row();
              if (get_sub_field('button_show')):
                $btncount++;
                $btntext = get_sub_field('button_text');
                $btnstyle = get_sub_field('button_style');
                $btnpagelink = get_sub_field('button_pagelink');
                $btncustomlink = get_sub_field('button_customlink');
                $btnnewtab = (get_sub_field('button_newtab')=="yes") ? "_blank" : "_self" ;
                $btnlink = (get_sub_field('button_linktype')=="true") ? $btnpagelink : $btncustomlink;
                $btnrep = $btnrep.'<a href="'.$btnlink.'" class="btn '.$btnstyle.'" target="'.$btnnewtab.'">'.$btntext.'</a>';
              endif;
            endwhile; ?>
            <div class="button-repeater has-<?php echo $btncount ?>-buttons">
              <?php echo $btnrep; ?>
            </div>
            <?php
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

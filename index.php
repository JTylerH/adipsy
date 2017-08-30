<?php get_header(); query_posts('cat=-7');
$pid = get_option( 'page_for_posts' );
$btnrep = "";
$btncount = 0;
$valign = (get_field('valign',$pid)=='center') ? "valign-center" : "valign-top";
$headerh = (get_field('header_height',$pid)) ? get_field('header_height',$pid) : "ch";
$bgimage = "";
$herotag = "";
$bgclass = "";
$bgtype = get_field('background_type',$pid);
$videourl = "";
$textcolor = get_field('hero_header_color',$pid);
$overlaypercentage = get_field('overlay_percentage',$pid)/100;
switch ( $bgtype ):
  case 'color' :
    $herotag = 'class="bg-'.get_field('background_color',$pid).' '.$valign.' '.$headerh.' '.$textcolor.'"';
  break;
  case 'image' :
    $herotag = 'class="'.$valign.' '.$headerh.' '.$textcolor.'" style="background-image:url('.get_field('background_image',$pid).');"';
  break;
  case 'video' :
    $phimg = get_field('background_video_placeholder_image');
    $herotag = 'class="fullscreen '.$valign.' wh '.$textcolor.'" style="background-image:url('.$phimg.')"';
    $videourl = get_field('background_video',$pid);
  break;
  case 'false' :
  default :
    $herotag = 'class="bg-w '.$valign.' '.$headerh.' '.$textcolor.'"';
  break;
endswitch;

echo '<header '.$herotag.'role="banner" itemscope itemtype="http://schema.org/WPHeader">';

?>
<div class="container">
    <?php if (get_field('hero_header', $pid)): ?><h1><?php the_field('hero_header',$pid); ?></h1><?php endif; ?>
    <?php if (get_field('hero_sub_header',$pid)): ?><p><?php the_field('hero_sub_header',$pid); ?></p><?php endif; ?>
    <?php if (get_field('show_button',$pid)):
        $herobtntext = get_field('hero_button_text',$pid);
        $herobtnstyle = get_field('hero_button_style',$pid);
        $herobtnlinktype = get_field('hero_button_linktype',$pid);
        $herobtnpagelink = get_field('hero_button_pagelink',$pid);
        $herobtncustomlink = get_field('hero_button_customlink',$pid);
        $herobtnnewtab = (get_field('hero_button_newtab',$pid)=='yes') ? "_blank" : "_self" ;
        $herobtnlink = ($herobtnlinktype) ? $herobtnpagelink : $herobtncustomlink;
        $herobtn = '<a href="'.$herobtnlink.'" class="btn '.$herobtnstyle.'" target="'.$herobtnnewtab.'">'.$herobtntext.'</a>';
        echo '<div class="header-action">'.$herobtn.'</div>';
      endif;
        if ($bgtype=='video'):
          echo '<div class="bg-video"><div class="overlay" style="background-color:rgba(0,0,0,'.$overlaypercentage.')"></div><video id="bgvideo" autoplay loop preload="auto" muted webkit-playsinline playsinline><source src="'.$videourl.'"></video></div>';
        endif;
    ?>
    <?php if( have_rows('hero_button_repeater',$pid) ):
      $btncount = 0;
      while ( have_rows('hero_button_repeater',$pid) ) : the_row();
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
    <?php endif; ?>
  </div>
</header>
<section id="theposts" class="bg-ow category-bar-section">
	<div class="container">
		<ul class="category-bar">
			<?php wp_list_categories( array(
				'orderby' => 'name',
				'title_li' => '',
				'show_count' => 0,
				'exclude' => array( 7 )
			) ); ?>
		</ul>
	</div>
</section>
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

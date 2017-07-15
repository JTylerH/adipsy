<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

  // add_filter('acf/format_value/type=wysiwyg','eae_encode_emails');

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( '1920px Wide', 1920 );
add_image_size( 'Mini (50x50)', 50 );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/

function bones_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

function font_icons() {
  wp_enqueue_style('fontAwesome','//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'font_icons');

/* Admin Styles */
/*===========================================*/

function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/library/css/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


if (!current_user_can('edit_posts')) {
  add_filter('show_admin_bar', '__return_false');
}


/* Advanced Custom Fields */
/*===========================================*/
acf_add_options_page(array(
 'page_title' 	=> 'Sponsors',
 'menu_title'	=> 'Sponsors',
 'menu_slug' 	=> 'sponsors-settings',
 'icon_url'     => 'dashicons-groups',
 'position'     => '29',
 'capability'	=> 'edit_posts',
));
acf_add_options_page(array(
 'page_title' 	=> 'General',
 'menu_title'	=> 'General',
 'menu_slug' 	=> 'general-theme-settings',
 'icon_url'     => 'dashicons-admin-generic',
 'position'     => '30',
 'capability'	=> 'edit_posts',
));



// acf_add_options_page(array(
//  'page_title' 	=> 'Frequently Asked Questions',
//  'menu_title'	=> 'FAQ',
//  'menu_slug' 	=> 'faq-settings',
//  'icon_url'     => 'dashicons-admin-comments',
//  'position'     => '27',
//  'capability'	=> 'edit_posts',
// ));

// acf_add_options_page(array(
//  'page_title' 	=> 'Administration Page',
//  'menu_title'	=> 'Edit Administration',
//  'menu_slug' 	=> 'administration',
//  'position'     => '0',
//  'parent_slug'  => 'edit.php?post_type=faculty',
//  'capability'	=> 'edit_posts',
//  'redirect'		=> false
// ));



add_action( 'admin_bar_menu', 'admin_bar_edit', 20 );

function admin_bar_edit( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
  $args3 = array(
		'id'    => 'host',
		'title' => 'HostHub',
		'href'  => 'https://hosthub.io'
    // 'parent' => 'top-menu'
	);
	$wp_admin_bar->add_node( $args3 );
  if ( is_admin() ):
  $args4 = array(
    'id'    => 'cpanel',
		'title' => 'Control Panel',
		'href'  => 'https://hosthub.io:2083',
    'parent' => 'host'
	);
	$wp_admin_bar->add_node( $args4 );
  endif;
  $args5 = array(
		'id'    => 'supportemail',
		'title' => 'Support via Email',
		'href'  => 'mailto:j.tyler.hall@icloud.com',
    'parent' => 'host'
	);
	$wp_admin_bar->add_node( $args5 );
	$args = array(
		'id'    => 'help',
		'title' => 'Need Help?',
		'href'  => '#',
    'parent' => 'top-secondary'
	);
	$wp_admin_bar->add_node( $args );
  $args2 = array(
		'id'    => 'email',
		'title' => 'Email the Developer',
		'href'  => 'mailto:j.tyler.hall@icloud.com',
    'parent' => 'help'
	);
	$wp_admin_bar->add_node( $args2 );
}

add_action( 'admin_menu', 'my_remove_admin_menus' );
add_action('init', 'remove_comment_support', 100);
add_action('init', 'remove_editor_support', 101);
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function my_remove_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
}
function remove_comment_support() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
}
function remove_editor_support() {
  remove_post_type_support( 'page', 'editor' );
}
function mytheme_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('customize');
}



// function iweb_modest_youtube_player( $html, $url, $args ) {
// 	return str_replace( '?feature=oembed', '?background=1', $html );
// }
// add_filter( 'oembed_result', 'iweb_modest_youtube_player', 10, 3 );


//Register Custom Post Types
add_action('init', 'register_custom_posts_staff');

function register_custom_posts_staff() {
    $members_labels = array(
        'name'               => 'Staff Directory',
        'singular_name'      => 'Staff Member',
        'menu_name'          => 'Staff Directory',
        'add_new'            => 'Add New Member',
        'all_items'          => 'View Directory',
        'edit_item'          => 'Edit Member',
        'view_item'          => 'View Member',
        'view_items'          => 'View Faculty Page',
        'add_new_item'       => 'Add New Member',
        'search_items'       => 'Search Members',
        'not_found'          => 'No members found',
        'not_found_in_trash' => 'No members found in Trash'

    );
    $members_args = array(
        'labels'             => $members_labels,
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => 'academics/faculty',
        'supports'           => array( 'title', 'revisions' ),
        'menu_icon'          => 'dashicons-admin-users',
        'hierarchical' => true
    );
    register_post_type('faculty', $members_args);

}

add_action('init', 'register_custom_posts_documents');

function register_custom_posts_documents() {
    $doc_labels = array(
        'name'               => 'Documents',
        'singular_name'      => 'Document',
        'menu_name'          => 'Documents',
        'add_new'            => 'Add New Document',
        'all_items'          => 'View All Documents',
        'edit_item'          => 'Edit Document',
        'view_item'          => 'View Document',
        'view_items'         => 'View Document Archive',
        'add_new_item'       => 'Add New Document',
        'search_items'       => 'Search Documents',
        'not_found'          => 'No documents found',
        'not_found_in_trash' => 'No documents found in Trash'
    );
    $doc_args = array(
        'labels'             => $doc_labels,
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => 'documents',
        'supports'           => array( 'title', 'revisions' ),
        'menu_icon'          => 'dashicons-media-document'
    );
    register_post_type('documents', $doc_args);

}

add_filter('manage_edit-documents_columns', 'doc_columns');
function doc_columns($columns) {
    $columns['fileurl'] = 'File URL';
    return $columns;
}
add_action('manage_posts_custom_column',  'show_doc_columns');
function show_doc_columns($name) {
    global $post;
    switch ($name) :
        case 'fileurl':
            $views = get_field('file_url',$post->ID);
            echo $views;
    endswitch;
}

// add_action('init', 'register_custom_posts_courses');
//
// function register_custom_posts_courses() {
//     $courses_labels = array(
//         'name'               => 'Courses',
//         'singular_name'      => 'Course',
//         'menu_name'          => 'Courses',
//         'add_new'            => 'Add New Course',
//         'all_items'          => 'View Courses',
//         'edit_item'          => 'Edit Course',
//         'view_item'          => 'View Course',
//         'view_items'         => 'View Courses Page',
//         'add_new_item'       => 'Add New Course',
//         'search_items'       => 'Search Courses',
//         'not_found'          => 'No courses found',
//         'not_found_in_trash' => 'No courses found in Trash'
//     );
//     $courses_args = array(
//         'labels'             => $courses_labels,
//         'public'             => true,
//         'capability_type'    => 'post',
//         'has_archive'        => true,
//         'supports'           => array( 'title', 'editor', 'revisions' ),
//         'menu_icon'          => 'dashicons-book'
//     );
//     register_post_type('courses', $courses_args);
// }

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/library/img/logo.png);
            padding-bottom: 30px;
            width: 100%;
            background-size:contain;
        }
        .login form{
          box-shadow:none;
        }
        .login{
          background:#9B6FC6;
        }
        .login #backtoblog a, .login #nav a{
          color:#fff!important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// function my_acf_admin_head() {
//  ?->
// 	<script type="text/javascript">
// 	(function($){
//
// 		$(document).ready(function(){
//
//             $( ".-collapse" ).each(function( index ) {
//               $( this ).click();
//             });
//
//         });
//
// 	})(jQuery);
// 	</script>
//  <?php
// }
//
// add_action('acf/input/admin_head', 'my_acf_admin_head');

// add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
// {
//     if( 'post_title_last_word' === $q->get( 'orderby' ) && $get_order =  $q->get( 'order' ) )
//     {
//         if( in_array( strtoupper( $get_order ), ['ASC', 'DESC'] ) )
//         {
//             global $wpdb;
//             $orderby = " SUBSTRING_INDEX( {$wpdb->posts}.post_title, ' ', -1 ) " . $get_order;
//         }
//     }
//     return $orderby;
// }, PHP_INT_MAX, 2 );

//#################################################
//##  ▓▓▓▓▓▓ ▓▓▓▓▓▓ ▓▓▓▓▓  ▓▓▓▓▓▓ ▓▓▓▓▓  ▓▓▓▓▓▓  ##
//##  ▓▓       ▓▓   ▓▓  ▓▓   ▓▓   ▓▓  ▓▓ ▓▓      ##
//##  ▓▓▓▓▓▓   ▓▓   ▓▓▓▓     ▓▓   ▓▓▓▓▓  ▓▓▓▓    ##
//##      ▓▓   ▓▓   ▓▓ ▓▓    ▓▓   ▓▓     ▓▓      ##
//##  ▓▓▓▓▓▓   ▓▓   ▓▓  ▓▓ ▓▓▓▓▓▓ ▓▓     ▓▓▓▓▓▓  ##
//#################################################

//Create User from Donation Form
// automatically logs the user in after they’ve registered
add_action("gform_user_registered", "autologin", 10, 4);
function autologin($user_id, $config, $entry, $password) {
        wp_set_auth_cookie($user_id, false, '');
}
// save Stripe customer ID to user meta data
add_action( 'gform_stripe_customer_after_create', 'save_stripe_customer_id' );
function save_stripe_customer_id( $customer ) {
    if ( is_user_logged_in () ) {
        update_user_meta( get_current_user_id(), '_stripe_customer_id', $customer->id );
    }
}


//UPDATE BILLING
// get the user’s Stripe ID
add_filter( 'gform_stripe_customer_id', 'get_stripe_customer_id' );
function get_stripe_customer_id( $customer_id ) {
    if ( is_user_logged_in () ) {
        $customer_id = get_user_meta( get_current_user_id(), '_stripe_customer_id', true );
    }
    return $customer_id;
}
// configure it so that our “Update Credit Card” feed only changes their credit card info… it doesn’t actually charge them
add_filter( 'gform_stripe_charge_authorization_only', 'stripe_charge_authorization_only', 10, 2 );
function stripe_charge_authorization_only( $authorization_only, $feed ) {
    $feed_name  = rgars( $feed, 'meta/feedName' );
    if ( $feed_name == 'Update Credit Card' ) {
        return true;
    }
    return $authorization_only;
}

//########################################################
//##      ▓▓ ▓▓▓▓▓▓ ▓▓▓▓▓▓ ▓▓▓▓▓  ▓▓▓▓▓▓ ▓▓▓▓▓  ▓▓▓▓▓▓  ##
//##     ▓▓  ▓▓       ▓▓   ▓▓  ▓▓   ▓▓   ▓▓  ▓▓ ▓▓      ##
//##    ▓▓   ▓▓▓▓▓▓   ▓▓   ▓▓▓▓     ▓▓   ▓▓▓▓▓  ▓▓▓▓    ##
//##   ▓▓        ▓▓   ▓▓   ▓▓ ▓▓    ▓▓   ▓▓     ▓▓      ##
//##  ▓▓     ▓▓▓▓▓▓   ▓▓   ▓▓  ▓▓ ▓▓▓▓▓▓ ▓▓     ▓▓▓▓▓▓  ##
//########################################################





/* DON'T DELETE THIS CLOSING TAG */ ?>

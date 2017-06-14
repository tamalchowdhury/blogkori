<?php

if ( ! function_exists( 'blogkori_setup' ) ) :
function blogkori_setup() {
    load_theme_textdomain('blogkori', get_template_directory() . '/languages');
    
    // Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );
    
    // Title tag support
    add_theme_support( "title-tag" );

    // HTML5 Support
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Custom background
    add_theme_support( "custom-background" );
    
    // Adding the header

    $blogkori_defaults = array(
        'default-image'          => '',
        'flex-width'             => true,
        'width'                  => 864,
        'flex-height'            => true,
        'height'                 => 200,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => false,
        'default-text-color'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );

    add_theme_support( 'custom-header', $blogkori_defaults );
    
    // Register the navigation menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'blogkori' )
    ) );

    //Post thumbnails need this in functions.php
    add_theme_support('post-thumbnails');
    add_image_size( 'blogkori-category-thumb', 300, 300 );
    
    
}
endif;
add_action('after_setup_theme', 'blogkori_setup');


// Add scripts
function blogkori_scripts() {
    
    // Load bootstrap stylesheet
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );
    // Load theme stylesheet
    wp_enqueue_style( 'blogkori-style', get_stylesheet_uri());
    
    // Load bootstrap javascript
    wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.2', true );
    // Load jquery    
    wp_enqueue_script('jquery');
    
    // Comment reply script
    if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
    
}
add_action( 'wp_enqueue_scripts', 'blogkori_scripts' );


// Adding page navigation

$blogkori_pg_defaults = array(
	'before'           => '<p>' . __( 'Pages:', 'blogkori' ),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Next page', 'blogkori' ),
	'previouspagelink' => __( 'Previous page', 'blogkori' ),
	'pagelink'         => '%',
	'eco'             => 1
);



// Default Content Width

if ( ! isset( $content_width ) ) $content_width = 640;

// Theme options page
require_once ( get_template_directory() . '/theme-options.php' );

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function blogkori_add_menuclass( $blogkori_ulclass ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $blogkori_ulclass, 1 );
}
add_filter( 'wp_page_menu', 'blogkori_add_menuclass' );

// Registering The Sidebar
function blogkori_sidebar() {
    register_sidebar( array(
        'name' => __( 'Right Sidebar', 'blogkori' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'blogkori' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ) );
}
add_action( 'widgets_init', 'blogkori_sidebar' );

// Custom comment callback

function blogkori_comments_callback( $blogkori_comment, $blogkori_args, $blogkori_depth ) {
    $GLOBALS['comment'] = $blogkori_comment;
 
    ?>
    <li <?php comment_class('media'); ?> id="li-comment-<?php comment_ID(); ?>">
            
            <div class="single-comment">
				<div class="avatar alignright">
					<?php echo get_avatar( $blogkori_comment, 60 ); ?>
				</div>
                <p class="comment-name media-heading">
                <?php if(get_comment_author_url() !== '') {?>
                <a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a>
                <?php } else { comment_author(); } ?>
                </p>
                <p class="comment-meta"><?php comment_date(); ?></p>
                <div class="comment-body"><?php comment_text(); ?></div>
                <small class="comment-reply">
                    <?php comment_reply_link( array_merge( $blogkori_args, array( 'reply_text' => __( 'Reply', 'blogkori' ), 'depth' => $blogkori_depth, 'max_depth' => $blogkori_args['max_depth'] ) ) ); ?>
                </small>
            </div>
    <?php
}

// Add scripts to wp_head()
function google_analytics_script() { 
                            $options = get_option('blogkori_theme_options');
                            echo $options['googanalytics'];

 }
add_action( 'wp_head', 'google_analytics_script' );



if (is_admin() && isset($_GET['activated'])){

    wp_redirect(admin_url("themes.php?page=theme_options"));
}
<?php
/**
 * jm-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jm-theme
 */

if ( ! function_exists( 'jm_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jm_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jm-theme, use a find and replace
	 * to change 'jm-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jm-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'jm-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jm_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'jm_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jm_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jm_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'jm_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jm_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jm-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jm-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jm_theme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function jm_theme_scripts() {
	wp_enqueue_style( 'jm-theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jm-theme-jquery', get_template_directory_uri() . '/js/jquery.min.js');

	wp_enqueue_script( 'jm-theme-ias', get_template_directory_uri() . '/js/jquery-ias.min.js');

	wp_enqueue_script( 'jm-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    

	wp_enqueue_script( 'jm-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jm_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Option
 */
$themename = "jm-theme";
$shortname = "jm";


$options = array (
  
array( "name" => $themename." Options",
    "type" => "title"),
  
 
array( "name" => "General",
    "type" => "section"),
array( "type" => "open"),
  
// array( "name" => "Colour Scheme",
//     "desc" => "Select the colour scheme for the theme",
//     "id" => $shortname."_color_scheme",
//     "type" => "select",
//     "options" => array("blue", "red", "green"),
//     "std" => "blue"),

array( "name" => "h1",
   "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_schemeh1",
    "type" => "text",
    "std" => ""),

array( "name" => "h2",
   "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_schemeh2",
    "type" => "text",
    "std" => ""),

array( "name" => "h3",
   "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_schemeh3",
    "type" => "text",
    "std" => ""),
array( "name" => "a",
   "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_schemeha",
    "type" => "text",
    "std" => ""),
array( "name" => "p",
   "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_schemep",
    "type" => "text",
    "std" => ""),
     
array( "name" => "Logo URL",
    "desc" => "Enter the link to your logo image",
    "id" => $shortname."_logo",
    "type" => "text",
    "std" => ""),
     
     
array( "name" => "Custom CSS",
    "desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
    "id" => $shortname."_custom_css",
    "type" => "textarea",
    "std" => ""),        
     

     
 
array( "type" => "close"),
array( "name" => "Footer",
    "type" => "section"),
array( "type" => "open"),
     
array( "name" => "Footer copyright text",
    "desc" => "Enter text used in the right side of the footer. It can be HTML",
    "id" => $shortname."_footer_text",
    "type" => "text",
    "std" => ""),
     
array( "name" => "Google Analytics Code",
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
    "id" => $shortname."_ga_code",
    "type" => "textarea",
    "std" => ""),    
     
array( "name" => "Custom Favicon",
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
    "id" => $shortname."_favicon",
    "type" => "text",
    "std" => get_bloginfo('url') ."/favicon.ico"),   
     

  
array( "type" => "close")
  
);

function mytheme_add_admin() {
  
global $themename, $shortname, $options;
  
if ( $_GET['page'] == basename(__FILE__) ) {
  
    if ( 'save' == $_REQUEST['action'] ) {
  
        foreach ($options as $value) {
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
  
foreach ($options as $value) {
    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
  
    header("Location: admin.php?page=functions.php&saved=true");
die;
  
} 
else if( 'reset' == $_REQUEST['action'] ) {
  
    foreach ($options as $value) {
        delete_option( $value['id'] ); }
  
    header("Location: admin.php?page=functions.php&reset=true");
die;
  
}
}
  
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}
 
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
}

function mytheme_admin() {
  
global $themename, $shortname, $options;
$i=0;
  
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
  
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
  
<div class="rm_opts">
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {
  
case "open":
?>
  
<?php break;
  
case "close":
?>
  
</div>
</div>
<br />
 
  
<?php break;
  
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>
 
  
<?php break;
  
case 'text':
?>
 
<div class="rm_input rm_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
<?php
break;
  
case 'textarea':
?>
 
<div class="rm_input rm_textarea">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
   
<?php
break;
  
case 'select':
?>
 
<div class="rm_input rm_select">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
  
case "checkbox":
?>
 
<div class="rm_input rm_checkbox">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
 
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;

case "section":
 
$i++;
 
?>
 
<div class="rm_section">
<div class="rm_title"><h3><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">
 
  
<?php break;
  
}
}
?>
  
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div> 
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');


// Page Rating Meta Box 

add_action( 'add_meta_boxes', 'so_custom_meta_box' );

function so_custom_meta_box($post){
    add_meta_box('so_meta_box', 'Ratings', 'custom_element_grid_class_meta_box', 'page', 'normal' , 'high');
}

add_action('save_post', 'so_save_metabox');

function so_save_metabox(){ 
    global $post;
    if(isset($_POST["custom_element_grid_class"])){
         //UPDATE: 
        $meta_element_class = $_POST['custom_element_grid_class'];
        //END OF UPDATE

        update_post_meta($post->ID, 'custom_element_grid_class_meta_box', $meta_element_class);
        //print_r($_POST);
    }
}

function custom_element_grid_class_meta_box($post){
    $meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true); //true ensures you get just one value instead of an array
    ?>   
    <label>Give ratings to page :  </label>

    <select name="custom_element_grid_class" id="custom_element_grid_class">
      <option value="1" <?php selected( $meta_element_class, '1' ); ?>>1</option>
      <option value="2" <?php selected( $meta_element_class, '2' ); ?>>2</option>
      <option value="3" <?php selected( $meta_element_class, '3' ); ?>>3</option>
      <option value="4" <?php selected( $meta_element_class, '4' ); ?>>4</option>
      <option value="5" <?php selected( $meta_element_class, '5' ); ?>>5</option>
    </select>
    <?php

}

// ajax load


function register_ajaxLoop_script() {
    wp_register_script(
      'ajaxLoop',
       get_stylesheet_directory_uri() . '/js/ajaxLoop.js',
       array('jquery')
    );
    wp_enqueue_script('ajaxLoop');
}
add_action('wp_enqueue_scripts', 'register_ajaxLoop_script');
?>

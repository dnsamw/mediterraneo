<?php

/**
 * Theme functions
 * 
 * @package Mediterraneo
 */

use MEDITERRANEO_THEME\Inc\MEDITERRANEO_THEME;

//CONSTACES
if (!defined('MEDITERRANEO_DIR_PATH')) {
    define('MEDITERRANEO_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('MEDITERRANEO_DIR_URI')) {
    define('MEDITERRANEO_DIR_URI', untrailingslashit(get_template_directory_uri()));
}


require_once MEDITERRANEO_DIR_PATH . '/inc/helpers/autoloader.php';

function mediterraneo_get_theme_instance()
{
    MEDITERRANEO_THEME::get_instance();
}

mediterraneo_get_theme_instance();

function mediterraneo_enqueue_scripts()
{
}

add_action('wp_enqueue_scripts', 'mediterraneo_enqueue_scripts');


function dnsam_theme_support()
{
    //adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'dnsam_theme_support');

// TODO : Migrate this to nav template part, this should come from there.
function dnsam_menus()
{
    $locations = array(
        'primary' => "Desktop Top Menu",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'dnsam_menus');


// Enqueue Uploader JS
add_action('admin_enqueue_scripts', 'dnsam_register_uploader_js');
function dnsam_register_uploader_js()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    // custom uploader JS
    wp_enqueue_script(
        'mishaupload',
        get_template_directory_uri() . '/assets/js/uploader.js',
        array('jquery', 'jquery-ui-core', 'jquery-ui-widget'),
        '1.0.1'
    );
}

// Admin CSS
add_action('admin_enqueue_scripts', 'dnsam_register_admin_css');
function dnsam_register_admin_css()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('dnsam_swiper_styles', get_template_directory_uri() . '/assets/css/admin.css', array(), $version, 'all');
}



//THEME OPTIONS

//Add theme options to side menu

function dnsam_custom_options()
{
?>
    <div>
        <h1>Theme Options Panel</h1>
        <span>
            <?php settings_errors(); ?>
        </span>

        <div>
            <form action="options.php" method="post">
                <?php
                settings_fields("section");
                do_settings_sections("theme-options");
                submit_button();
                ?>
            </form>
        </div>
    </div>
<?php

}

function dnsam_theme_options()
{
    add_menu_page(
        "theme-options", //page title
        "Theme Options", //menu title
        "manage_options", // capability
        "theme-options", //menu slug
        "dnsam_custom_options", // callback function
        get_template_directory_uri() . "/assets/images/icon.png", //icon
        25 //position
    );
}

add_action("admin_menu", "dnsam_theme_options");

//Register theme options pannel

function dnsam_custom_theme_options()
{
    // echo "Custom Theme OptionXXs";

}

function dnsam_theme_options_setting()
{
    add_settings_section("section", "Main Slider Settings", null, "theme-options");
    //facebook
    add_settings_field(
        "slider_image",
        "Image",
        "dnsam_upload_image",
        "theme-options",
        "section"
    );

    // register_setting("section_main_slider", "slider_image");


    add_settings_section("section", "Socialmedia Settings", null, "theme-options");

    //facebook
    add_settings_field(
        "fb_page",
        "FB URL",
        "dnsam_add_fb_page",
        "theme-options",
        "section"
    );

    //instagram
    add_settings_field(
        "ig_page",
        "IG URL",
        "dnsam_add_ig_page",
        "theme-options",
        "section"
    );

    //tiktok
    add_settings_field(
        "tiktok_page",
        "TikTok URL",
        "dnsam_add_tiktok_page",
        "theme-options",
        "section"
    );

    //Add setting to area
    register_setting("section", "fb_page");
    register_setting("section", "ig_page");
    register_setting("section", "tiktok_page");
    register_setting("section", "slider_imgs");
}

add_action("admin_init", "dnsam_theme_options_setting");

function dnsam_upload_image()
{
?>
    <h2>Main Slider Images</h2>
    <ul class="misha-gallery">
        <?php
        $image_ids = ($image_ids = get_option('slider_imgs')) ? $image_ids : array();

        $array = (explode(",", $image_ids));

        // Defining a callback function for custom filter
        function myFilter($var)
        {
            return ($var !== NULL && $var !== FALSE && $var !== "");
        }

        // Filtering the array
        $result_img_ids_array = array_filter($array, "myFilter");

        foreach ($result_img_ids_array as $i => &$id) {
            $url = wp_get_attachment_image_url($id, array(80, 80));
            if ($url) {
        ?>
                <li data-id="<?php echo $id ?>">
                    <span style="background-image:url('<?php echo $url ?>')"></span>
                    <a href="#" class="misha-gallery-remove">&times;</a>
                </li>
        <?php
            } else {
                unset($image_ids[$i]);
            }
        }
        ?>
    </ul>
    <input type="hidden" id="slider_imgs" name="slider_imgs" value="<?php echo join(',', $result_img_ids_array) ?>" />
    <a href="#" class="button misha-upload-button">Add Images</a>
<?php

}


function dnsam_add_fb_page()
{
?>
    <input type="text" name="fb_page" value="<?php echo get_option("fb_page") ?>" id="fb_page">
<?php
}

function dnsam_add_ig_page()
{
?>
    <input type="text" name="ig_page" value="<?php echo get_option("ig_page") ?>" id="ig_page">
<?php
}

function dnsam_add_tiktok_page()
{
?>
    <input type="text" name="tiktok_page" value="<?php echo get_option("tiktok_page") ?>" id="tiktok_page">
<?php
}




/* Custom Post Type Start */
function create_posttype()
{
    register_post_type(
        'fooditem',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Food Items'),
                'singular_name' => __('Food Item')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'fooditem'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
    /* Custom Post Type End */
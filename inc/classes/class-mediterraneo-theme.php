<?php

/**
 * Bootstrap (add all the basic functions not bootstrap css) the theme
 * 
 * @package Mediterraneo
 */

namespace MEDITERRANEO_THEME\Inc;

use MEDITERRANEO_THEME\Inc\Traits\Singleton;

class MEDITERRANEO_THEME
{
    use Singleton;

    protected function __construct()
    {
        //load classes.
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ]);

        add_theme_support('custom-background', [
            'default-color' => '#f6f4ff',
            'default-image' => '',
        ]);

        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', [
            'search-from',
            'comment-from',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ]);

        add_editor_style();

        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1024;
        }
    }

    public function register_styles()
    {
        //register style css
        wp_register_style(
            'style-css', //handle
            get_stylesheet_uri(), //stylesheet path
            ['swiper-css'], //dependency array
            filemtime(MEDITERRANEO_DIR_PATH . '/style.css'), //dynamic version number based on modify time
            'all' // screen sizes
        );

        //register bootstrap css
        wp_register_style(
            'swiper-css', //handle
            MEDITERRANEO_DIR_URI . '/assets/css/swiper-bundle.min.css', //stylesheet path
            [], //dependency array
            '8.1.6',
            'all' // screen sizes
        );

        // //register bootstrap css
        // wp_register_style(
        //     'bootstrap-css', //handle
        //     MEDITERRANEO_DIR_URI . '/assets/css/bootstrap.min.css', //stylesheet path
        //     [], //dependency array
        //     '4.5.3', //dynamic version number based on modify time
        //     'all' // screen sizes
        // );

        //enqueue css
        wp_enqueue_style('style-css');
        //wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts()
    {
        //register main script
        wp_register_script(
            'script-js', //handle
            MEDITERRANEO_DIR_URI . '/assets/js/script.js', //path
            ['swiper-js'],
            filemtime(MEDITERRANEO_DIR_PATH . '/assets/js/script.js'), //dynamic ver number
            true // include in footer
        );

        // //register popper JS
        // wp_register_script(
        //     'popper-js', //handle
        //     MEDITERRANEO_DIR_URI . '/assets/js/popper.min.js', //path
        //     ['swiper-js'],
        //     '2.11.6 ', // ver number
        //     true // include in footer
        // );

        // //register bootstrap JS
        // wp_register_script(
        //     'bootstrap-js', //handle
        //     MEDITERRANEO_DIR_URI . '/assets/js/bootstrap.min.js', //path
        //     ['jquery', 'popper-js', 'swiper-js'],
        //     '4.5.3', //dynamic ver number
        //     true // include in footer
        // );

        //register Swiper JS
        wp_register_script(
            'swiper-js', //handle
            MEDITERRANEO_DIR_URI . '/assets/js/swiper-bundle.min.js', //path
            [],
            '',
            true // include in footer
        );

        //enqueue scripts
        // wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('script-js');
        //wp_enqueue_script('popper-js');
        wp_enqueue_script('swiper-js');
    }
}

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
}

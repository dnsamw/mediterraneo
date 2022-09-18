<?php

/**
 * Theme header
 * 
 * @package Mediterraneo
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('mediterraneo-body'); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        #for backward compatability
        wp_body_open();
    }
    ?>
    <!-- Navigation / Burger Menu -->
    <section class="header">

        <?php get_template_part('template-parts/header/nav'); ?>

        <nav class="navbar">
            <div class="brand-title">
                <h2><?php echo get_bloginfo('name');  ?> </h2>
                <?php
                if (function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id);
                }
                ?>
                <a href="/"><img src="<?php echo $logo[0] ?>" alt=""></a>
            </div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        // 'items_wrap' => ''
                    )
                );
                ?>
            </div>
        </nav>
    </section>
<?php

/**
 * Navigation Template Part
 * 
 * @package Mediterraneo
 */
$menu_class = \MEDITERRANEO_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('mediterraneo-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);

// echo '<pre>';
// print_r($header_menus);
// wp_die();

?>

<section class="header">
    <nav class="navbar">
        <div class="brand-title">
            <h2><?php echo get_bloginfo('name');  ?> </h2>
            <?php
            if (function_exists('the_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            }
            ?>
            <a href="/"><img src="<?php echo $logo[0] ?>" alt="Logo"></a>

        </div>

        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <div class="navbar-links">
            <?php
            if (!empty($header_menus) && is_array($header_menus)) {
            ?>
                <ul class="navbar-nav mr-auto">
                    <?php
                    foreach ($header_menus as $menu_item) {
                        if (!$menu_item->menu_item_parent) {

                            $child_menu_items   = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                            $has_children       = !empty($child_menu_items) && is_array($child_menu_items);
                            $has_sub_menu_class = !empty($has_children) ? 'has-submenu' : '';
                            $link_target        = !empty($menu_item->target) && '_blank' === $menu_item->target ? '_blank' : '_self';

                            // Note_: Similar to $menu_item->target, there are other keys available in the $menu_item, such as classes. You can more key values if you need.

                            if (!$has_children) {
                    ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($menu_item->title); ?>">
                                        <?php echo esc_html($menu_item->title); ?>
                                    </a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($menu_item->title); ?>">>
                                        <?php echo esc_html($menu_item->title); ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                        foreach ($child_menu_items as $child_menu_item) {
                                            $link_target = !empty($child_menu_item->target) && '_blank' === $child_menu_item->target ? '_blank' : '_self';
                                        ?>
                                            <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($child_menu_item->title); ?>">>
                                                <?php echo esc_html($child_menu_item->title); ?>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                    <?php
                        }
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
            <?php //get_search_form(); 
            ?>
        </div>
        </div>

</section>
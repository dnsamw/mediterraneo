<?php

/**
 * Enquie theme assets
 * 
 * @package Mediterraneo
 */

namespace MEDITERRANEO_THEME\Inc;

use MEDITERRANEO_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        //load classes.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
    }
}

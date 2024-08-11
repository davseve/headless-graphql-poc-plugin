<?php
/**
 * Plugin Name: Elementor Headless
 * Description: Headless support for Elementor
 * Version: 1.0.0
 * Author: Elementor
 * Author URI: https://elementor.com
 * Text Domain: elementor-headless
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Headless {
    public function __construct() {
        add_action('init', [$this, 'init']);
    }

    public function init()
    {
        $this->register_checklist_step_post_type();
    }

    public function register_checklist_step_post_type()
    {
         return register_post_type('checklist_step', [
                'public' => true,
                'label' => 'Checklist Step',
                'show_in_graphql' => true,
                'graphql_single_name' => 'ChecklistStep',
                'graphql_plural_name' => 'ChecklistSteps',
            ]);
    }
}

function elementor_headless() {
    global $elementor_headless;

    // Instantiate only once.
    if ( ! isset( $elementor_headless ) ) {
        $elementor_headless = new Elementor_Headless();
    }
    return $elementor_headless;
}

// Instantiate.
elementor_headless();

<?php

/**
 * Plugin Name:       WP Analysis
 * Plugin URI:        https://mharif.com/wp-analysis
 * Description:       This plugin gives you the complete information on your website's data
 * Version:           1.10.2
 * Author:            mhArif
 * Author URI:        https://mharif.com/
 * License:           GPL v2 or later
 * Text Domain:       wpanalysis
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}
/**
 * define the constant path here
 */
define('WPAN_VERSION', '1.10.2');
define('WPAN_INC', plugin_dir_path(__FILE__) . 'includes/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-analysis-activator.php
 */
function wpan_activate_analysis()
{
    require_once WPAN_INC . "class-wp-analysis-activator.php";
    Analysis_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-analysis-deactivator.php
 */
function wpan_deactivate_analysis()
{
    require_once WPAN_INC . "class-wp-analysis-deactivator.php";
    Analysis_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'wpan_activate_analysis');
register_deactivation_hook(__FILE__, 'wpan_deactivate_analysis');

require_once WPAN_INC . "class-wp-analysis-main.php";
/**
 * The code that runs begins of plugins
 * execution start 
 */
function run_wpan_analysis()
{
    $plugin = new Analysis_Main();
    $plugin->run();
}
run_wpan_analysis();

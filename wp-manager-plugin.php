<?php
/**
 * Plugin Name: WP Manager Core
 * Plugin URI: https://github.com/mrdarrengriffin/wp-manager-plugin
 * Description: A plugin to provide further core information to WP Manager via the WP REST API
 * Version: 1.0.0
 * Requires at least: 6
 * Tested up to: 6.4.2
 * Requires PHP: 7
 * Author: Darren Griffin
 * Author URI: https://github.com/mrdarrengriffin
 **/

namespace WP_Manager\Core;

if(!defined('ABSPATH')) {
    exit;
}

require 'src/class-api-routes.php';
require 'src/class-helpers.php';

require 'src/abstracts/class-abstract-api-controller.php';

new API_Routes();
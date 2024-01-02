<?php
/**
 * Plugin Name: WP Manager
 * Plugin URI: https://github.com/mrdarrengriffin/wp-manager-plugin
 * Description: A plugin to provide further REST API routes for WP Manager
 * Version: 0.0.1
 * License: GPL v2 or later
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
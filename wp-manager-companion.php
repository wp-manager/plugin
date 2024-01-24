<?php
/**
 * Plugin Name: Companion for WP Manager
 * Plugin URI: https://github.com/wp-manager/plugin
 * Description: A companion plugin to provide further REST API functionality for WP Manager
 * Version: 0.0.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6
 * Tested up to: 6.4.2
 * Requires PHP: 7
 * Author: Darren Griffin
 * Author URI: https://github.com/mrdarrengriffin
 **/

namespace WPM\Core;

if(!defined('ABSPATH')) {
    exit;
}

require 'src/abstracts/class-abstract-api-controller.php';

require 'src/class-helpers.php';
require 'src/class-api-routes.php';


new API_Routes();
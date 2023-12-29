<?php
namespace WP_Manager\Core;

class API_Routes {

    private $routes_dir = 'rest-api';

    private $enabled_routes = [
       'WP_Core'
    ];

    public function __construct() {
        $this->load_api_routes();
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    private function load_api_routes() {
        $routes_path = plugin_dir_path(__FILE__) . $this->routes_dir;

        $routes = glob($routes_path . '/api-*.php');

        foreach ($routes as $route) {
            require_once $route;
        }
    }

    public function register_routes() {
        foreach ($this->enabled_routes as $route) {

            // Check to see if the class exists before trying to register the route
            if (!class_exists('WP_Manager\\Core\\API\\' . $route)) {
                continue;
            }

            // Instantiate the class
            $class = 'WP_Manager\\Core\\API\\' . $route;
            $api = new $class();

            $api->register_routes();
        }
    }
}
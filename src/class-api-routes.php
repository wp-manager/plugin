<?php
namespace WP_Manager\Core;

class API_Routes {

    private $routes_dir = 'rest-api';

    /**
     * List of routes to enable
     * File name must be sluggified version of class name without the prefix (class-{name}.php)
     * E.g. WPM_Core_Version => class-wpm-core-version.php
     */
    private $enabled_routes = [
       'WPM_Core_Version'
    ];

    public function __construct() {
        $this->load_api_routes();
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    /**
     * Load the API routes enabled in the $enabled_routes array
     */
    private function load_api_routes() {
        foreach ($this->enabled_routes as $route) {
            $slugified_class = Helpers::slugify_class_name($route);

            if(!$slugified_class){
                continue;
            }

            $file_name = sprintf('class-%s.php', $slugified_class);
            $file_path = plugin_dir_path(__FILE__) . $this->routes_dir . '/' . $file_name;

            if(!file_exists($file_path)){
                error_log(sprintf('WP Manager: Class %s does not exist', $route));
                continue;
            }

            require_once $file_path;
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
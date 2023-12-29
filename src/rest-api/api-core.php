<?php

namespace WP_Manager\Core\API;

require_once ABSPATH . 'wp-admin/includes/update.php';

class WP_Core extends API_Controller {

    public $resource = 'wp-core';

    public function register_routes() {
        register_rest_route($this->namespace, '/' . $this->resource, [
            'methods' => 'GET',
            'callback' => [$this, 'get_wp_core_version'],
            'permission_callback' => [\WP_Manager\Core\Helpers::class, 'permission_callback_admin']
        ]);
    }

    public function get_wp_core_version() {
        global $wp_version;
        $core_updates = get_core_updates();

        $new_version = false;

        // if new update version is newer than current version
        if (isset($core_updates[0]) && version_compare($core_updates[0]->current, $wp_version, '>')) {
            $new_version = $core_updates[0]->current;
        }

        return [
            'current' => $wp_version,
            'available' => $new_version
        ];
    }
}
<?php

namespace WP_Manager\Core;

class Helpers{

    /**
     * Check if the current user is an admin on the site
     * 
     * @return bool
     */
    public static function permission_callback_admin(){
        return current_user_can('manage_options');
    }
}
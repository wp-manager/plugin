<?php

namespace WP_Manager\Core;

class Helpers{

    /**
     * Check if the current user is an admin on the site
     * 
     * @return bool
     */
    public static function admin_permission_callback(){
        return current_user_can('manage_options');
    }

    public static function slugify_class_name($name){
        if(!$name){
            return false;
        }

        return str_replace([' ','_'],'-',strtolower($name));
    }
}
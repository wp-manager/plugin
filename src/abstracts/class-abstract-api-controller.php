<?php

namespace WPM\Core\Rest;

abstract class API_Controller {

    public $namespace = 'wp-manager/v1';
    public $resource;

    abstract public function register_routes();
}
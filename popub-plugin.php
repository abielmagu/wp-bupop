<?php

/**
 * @package Popub Plugin
 * 
 * @version 0.1
*/

/*
Plugin Name: Popub Plugin
Plugin URI: http://wordpress.org/plugins/popub-plugin/
Description: Developing a plugin for wordpress.
Author: Popub-plugin
Version: 0.1
Author URI: https://popub-plugin.com/
License: GPLv2 or later
Text domain: popub-plugin
*/

/* 
Licence about privacy content
*/

require_once 'popub-loader.php';

$popub = new Inc\Popub;
$popub->register();
$popub->action();
$popub->notify();

register_activation_hook( __FILE__ , [$popub, 'activate']);
register_deactivation_hook( __FILE__ , [$popub, 'deactivate']);
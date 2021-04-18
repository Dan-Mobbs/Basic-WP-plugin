<?php

/*
 Plugin Name:       Youtube Subs
 Plugin URI:        https://example.com/plugins/the-basics/
 Description:       It's a test dan, life is a test :D 
 Version:           1.2
 Requires at least: 2
 Requires PHP:      7.2
 Author:            Jimmy Jimson
 Author URI:        nowwhere
 */

// Exit if accessed directly - Security!!
if(!defined('ABSPATH')){
    exit;
}

//Loads scripts
require_once(plugin_dir_path(__FILE__). '/includes/youtubesubs-scripts.php');

//Load the Class
require_once(plugin_dir_path(__FILE__). '/includes/youtubesubs-class.php');


//Register Widget
function register_youtubesubs() {
    register_widget('dsm_youtube_Widget');
}

//Hook in function
add_action('widgets_init', 'register_youtubesubs');
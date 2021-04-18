<?php

//Add scripts 
function dsm_add_scripts() {
    
    //Add main CSS
    wp_enqueue_style('dsm-main-style', plugins_url(). '/youtube-subs/css/style.css');

    //Add main JS
    wp_enqueue_script('dsm-main-script', plugins_url(). '/youtube-subs/js/main.js');
    
    //Add Google Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');

}

add_action('wp_enqueue_scripts', 'dsm_add_scripts');
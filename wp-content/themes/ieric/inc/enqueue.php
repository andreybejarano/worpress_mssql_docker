<?php 

/**
 * Add the required scripts and style sheets.
 *
 * @return void
 */
function ieric_scripts() {

    
    wp_enqueue_style('ieric-font', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap', [], null);
    wp_enqueue_style('ieric-style', THEME_DIST.'/css/app.min.css', [], null);
    wp_enqueue_script('ieric-js', THEME_DIST.'/js/app.min.js', [], '31092019', true);
}

add_action('wp_enqueue_scripts', 'ieric_scripts');


?>
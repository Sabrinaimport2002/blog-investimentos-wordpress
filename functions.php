<?php
function theme_enqueue_styles()
{
    // CSS geral do tema
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Google Material Icons
    wp_enqueue_style('google-material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

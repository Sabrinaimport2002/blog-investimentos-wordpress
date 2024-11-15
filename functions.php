<?php
function theme_enqueue_styles()
{
    // CSS geral do tema
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    //CSS adicionais
    wp_enqueue_style(
        'index',
        get_template_directory_uri() . '/css/index.css'
    );

    // Google Material Icons
    wp_enqueue_style('google-material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


//Custom Post Type para Investimentos
function create_investment_cpt()
{
    register_post_type('investimentos', array(
        'labels' => array(
            'name' => 'Investimentos',
            'singular_name' => 'Investimento'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-chart-line',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'create_investment_cpt');

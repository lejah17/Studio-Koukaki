<?php
// enregistre les styles et scripts du thème enfant
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');

function theme_enqueue_styles_and_scripts() {
    // charge le CSS du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // charge le style.css généré du thème enfant
    // CSS compilé depuis SCSS avec LiveSass
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(), 
        array('parent-style')
    );

    // charge le fichier compilé
    wp_enqueue_style(
        'child-main-custom',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        array('child-style') 
    );

    // charge SwiperJS (CSS & JS)
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
    );

    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    // charger le script d'animations JS
    wp_enqueue_script(
        'foce-animations',
        get_stylesheet_directory_uri() . '/assets/js/animations.js',
        array('swiper-js'),
        null,
        true
    );
}


// Get customizer options form parent theme
if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value; // prevent update to child theme mods
    }, 10, 2);
    
    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}
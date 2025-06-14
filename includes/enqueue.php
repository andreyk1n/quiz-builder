<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('qb-style', plugin_dir_url(__DIR__) . 'assets/css/style.css');
    wp_enqueue_script('qb-script', plugin_dir_url(__DIR__) . 'assets/js/script.js', ['jquery'], null, true);
});

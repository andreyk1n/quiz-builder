<?php
function qb_enqueue_assets() {
    wp_enqueue_style('qb-style', plugin_dir_url(__FILE__) . '../assets/css/style.css');
    wp_enqueue_script('qb-script', plugin_dir_url(__FILE__) . '../assets/js/script.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'qb_enqueue_assets');
?>

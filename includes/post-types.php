<?php
add_action('init', function () {
    register_post_type('qb_quiz', [
        'labels' => [
            'name' => 'Квізи',
            'singular_name' => 'Квіз'
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-welcome-learn-more'
    ]);
});
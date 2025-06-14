<?php
function qb_register_quiz_post_type() {
    register_post_type('quiz', [
        'labels' => [
            'name' => 'Квізи',
            'singular_name' => 'Квіз',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'quizzes'],
        'menu_position' => 5,
        'supports' => ['title'],
    ]);
}
add_action('init', 'qb_register_quiz_post_type');
?>

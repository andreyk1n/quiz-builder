<?php
function qb_add_quiz_meta_box() {
    add_meta_box('quiz_questions', 'Запитання квізу', 'qb_render_quiz_meta_box', 'quiz', 'normal', 'high');
}
add_action('add_meta_boxes', 'qb_add_quiz_meta_box');

function qb_render_quiz_meta_box($post) {
    $questions = get_post_meta($post->ID, '_quiz_questions', true);
    echo '<div id="quiz-questions-wrapper">';
    echo '</div><button type="button" id="add-question">Додати питання</button>';
    wp_nonce_field('qb_save_quiz_meta', 'qb_quiz_nonce');
}

function qb_save_quiz_meta_box($post_id) {
    if (!isset($_POST['qb_quiz_nonce']) || !wp_verify_nonce($_POST['qb_quiz_nonce'], 'qb_save_quiz_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['quiz_data'])) {
        update_post_meta($post_id, '_quiz_questions', sanitize_text_field($_POST['quiz_data']));
    }
}
add_action('save_post', 'qb_save_quiz_meta_box');
?>

<?php
function qb_quiz_shortcode($atts) {
    $atts = shortcode_atts(['id' => 0], $atts, 'quiz');
    ob_start();
    include plugin_dir_path(__FILE__) . '../templates/quiz-template.php';
    return ob_get_clean();
}
add_shortcode('quiz', 'qb_quiz_shortcode');
?>

<?php
add_shortcode('qb-quiz', function ($atts) {
    if (!isset($atts['id'])) return '';

    $quiz = get_post($atts['id']);
    $questions = get_post_meta($quiz->ID, '_qb_data', true);

    ob_start();
    echo '<div class="qb-quiz" data-quiz-id="'.esc_attr($quiz->ID).'">';
    echo '<h2>'.esc_html($quiz->post_title).'</h2>';
    echo '<div class="qb-question-wrap" data-index="0">';

    foreach ($questions as $index => $q) {
        echo '<div class="qb-question" data-question="'.$index.'" style="'.($index === 0 ? '' : 'display:none;').'">';
        echo '<p>'.esc_html($q['question']).'</p>';
        foreach ($q['answers'] as $i => $ans) {
            echo '<button class="qb-answer" data-correct="'.($q['correct'] == $i ? '1' : '0').'">'.esc_html($ans).'</button>';
        }
        echo '</div>';
    }

    echo '</div><div class="qb-result" style="display:none"></div></div>';
    return ob_get_clean();
});
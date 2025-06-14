<?php
$quiz_id = (int) $atts['id'];
$questions = get_post_meta($quiz_id, '_quiz_questions', true);
$questions = json_decode($questions, true);
?>
<div class="qb-quiz">
    <?php foreach ($questions as $index => $q): ?>
        <div class="qb-question">
            <p><strong><?= esc_html($q['question']) ?></strong></p>
            <?php foreach ($q['answers'] as $a): ?>
                <label>
                    <input type="radio" name="question_<?= $index ?>" value="<?= esc_attr($a) ?>">
                    <?= esc_html($a) ?>
                </label><br>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <button class="qb-submit">Перевірити</button>
</div>

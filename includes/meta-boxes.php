<?php
add_action('add_meta_boxes', function () {
    add_meta_box('qb_questions_box', 'Питання до квізу', 'qb_render_meta_box', 'qb_quiz', 'normal', 'default');
});

function qb_render_meta_box($post) {
    $data = get_post_meta($post->ID, '_qb_data', true);
    wp_nonce_field('qb_save_meta', 'qb_nonce');

    echo '<div id="qb-questions">';
    if (!empty($data)) {
        foreach ($data as $index => $question) {
            echo '<div class="qb-question">';
            echo '<input type="text" name="qb_data['.$index.'][question]" value="'.esc_attr($question['question']).'" placeholder="Питання" />';
            foreach ($question['answers'] as $i => $ans) {
                $checked = ($question['correct'] == $i) ? 'checked' : '';
                echo '<div><input type="text" name="qb_data['.$index.'][answers][]" value="'.esc_attr($ans).'" />';
                echo '<label><input type="radio" name="qb_data['.$index.'][correct]" value="'.$i.'" '.$checked.'> Правильна</label></div>';
            }
            echo '<hr/></div>';
        }
    }
    echo '</div>';
    echo '<button type="button" id="qb-add-question">+ Додати питання</button>';

    echo '<script>
    document.getElementById("qb-add-question").addEventListener("click", function() {
        const container = document.getElementById("qb-questions");
        const index = container.children.length;
        const html = `
        <div class="qb-question">
            <input type="text" name="qb_data[${index}][question]" placeholder="Питання" />
            <div><input type="text" name="qb_data[${index}][answers][]" />
                <label><input type="radio" name="qb_data[${index}][correct]" value="0"> Правильна</label>
            </div>
            <div><input type="text" name="qb_data[${index}][answers][]" />
                <label><input type="radio" name="qb_data[${index}][correct]" value="1"> Правильна</label>
            </div>
            <hr/>
        </div>`;
        container.insertAdjacentHTML("beforeend", html);
    });
    </script>';
}

add_action('save_post', function ($post_id) {
    if (!isset($_POST['qb_nonce']) || !wp_verify_nonce($_POST['qb_nonce'], 'qb_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['qb_data'])) {
        update_post_meta($post_id, '_qb_data', $_POST['qb_data']);
    }
});

add_action('edit_form_after_title', function ($post) {
    if ($post->post_type !== 'qb_quiz') return;

    echo '<div style="background: #f1f1f1; border-left: 4px solid #0073aa; padding: 12px; margin: 15px 0;">';
    echo '<strong>Шорткод для вставки цього квізу:</strong><br>';
    echo '<code style="font-size: 16px;">[qb-quiz id="' . esc_attr($post->ID) . '"]</code>';
    echo '</div>';
});
<?php
/**
 * Plugin Name: Quiz Builder
 * Description: Створення квізів з шорткодом.
 * Version: 1.0
 */

define('QB_PATH', plugin_dir_path(__FILE__));

require_once QB_PATH . 'includes/post-types.php';
require_once QB_PATH . 'includes/meta-boxes.php';
require_once QB_PATH . 'includes/shortcodes.php';
require_once QB_PATH . 'includes/enqueue.php';
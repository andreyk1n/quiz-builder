<?php
/*
Plugin Name: Quiz Builder
Description: Плагін для створення квізів з виведенням через шорткод.
Version: 1.0
Author: Ваше ім’я
*/

define('QB_PATH', plugin_dir_path(__FILE__));

require QB_PATH . 'includes/post-types.php';
require QB_PATH . 'includes/meta-boxes.php';
require QB_PATH . 'includes/shortcodes.php';
require QB_PATH . 'includes/enqueue.php';
?>

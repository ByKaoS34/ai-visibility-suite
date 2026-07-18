<?php
/*
Plugin Name: AI Visibility Suite
Plugin URI: https://github.com/ByKaoS34/ai-visibility-suite
Description: AI arama motorları ve yapay zeka botları için llms.txt yönetimi sağlayan SEO eklentisi.
Version: 1.0.0
Author: ByKaoS34
Author URI: https://github.com/ByKaoS34
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

define('AVS_PATH', plugin_dir_path(__FILE__));

require_once AVS_PATH . 'includes/class-llms.php';

require_once AVS_PATH . 'includes/class-content.php';

require_once AVS_PATH . 'includes/class-generator.php';

require_once AVS_PATH . 'admin/class-admin.php';

require_once AVS_PATH . 'admin/class-settings.php';

new AVS_Settings();

function avs_activate() {
    AVS_LLMS::create_llms_file();
}

register_activation_hook(__FILE__, 'avs_activate');

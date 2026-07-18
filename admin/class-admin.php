<?php

if (!defined('ABSPATH')) {
    exit;
}

class AVS_Admin {

    public function __construct() {

        add_action(
            'admin_menu',
            array($this, 'add_menu')
        );

    }


    public function add_menu() {

        add_menu_page(
            'AI Visibility Suite',
            'AI Visibility',
            'manage_options',
            'ai-visibility-suite',
            '__return_null',
            'dashicons-search',
            80
        );

    }


    public function settings_page() {

        ?>

        <div class="wrap">

            <h1>AI Visibility Suite</h1>

            <p>
            Bu eklenti sitenizin yapay zeka arama motorları
            tarafından daha iyi anlaşılması için llms.txt dosyası oluşturur.
            </p>

            <h2>llms.txt Durumu</h2>

            <p>
            Dosya adresi:
            <br>
            <strong>
            <?php echo home_url('/llms.txt'); ?>
            </strong>
            </p>

        </div>

        <?php

    }

}

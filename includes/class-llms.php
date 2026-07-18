<?php

if (!defined('ABSPATH')) {
    exit;
}

class AVS_LLMS {

    public static function create_llms_file() {

        $content = "# AI Visibility Suite\n\n";
        $content .= "Site: " . get_bloginfo('name') . "\n\n";
        $content .= "Description: " . get_bloginfo('description') . "\n\n";
        $content .= "Content:\n";
        $content .= "- Articles\n";
        $content .= "- Services\n";
        $content .= "- Guides\n";

        file_put_contents(
            ABSPATH . 'llms.txt',
            $content
        );
    }

}

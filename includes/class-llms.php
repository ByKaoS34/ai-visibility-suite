<?php

if (!defined('ABSPATH')) {
    exit;
}

class AVS_LLMS {


    public static function create_llms_file() {


        $content = "# " . get_option('avs_site_name', get_bloginfo('name')) . "\n\n";


        $content .= "## About\n";

        $content .= get_option(
            'avs_description',
            get_bloginfo('description')
        );

        $content .= "\n\n";


        $phone = get_option('avs_phone');

        if ($phone) {

            $content .= "## Contact\n";
            $content .= "Phone: " . $phone . "\n\n";

        }


        $whatsapp = get_option('avs_whatsapp');

        if ($whatsapp) {

            $content .= "WhatsApp: " . $whatsapp . "\n\n";

        }


        $keywords = get_option('avs_keywords');

        if ($keywords) {

            $content .= "## Keywords\n";
            $content .= $keywords . "\n\n";

        }


        $content .= "## Content\n\n";


        $posts = get_posts(array(
            'numberposts' => 20,
            'post_status' => 'publish'
        ));


        foreach ($posts as $post) {

            $content .= "- " . get_the_title($post->ID) . "\n";

        }


        file_put_contents(
            ABSPATH . 'llms.txt',
            $content
        );

    }


}

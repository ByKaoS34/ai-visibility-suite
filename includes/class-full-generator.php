<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_Full_Generator {


    public function generate(){


        $content = "";


        $content .= "# Full AI Content Export\n\n";


        $posts = get_posts(array(

            'numberposts'=>50,

            'post_status'=>'publish'

        ));



        foreach($posts as $post){


            $content .= "## ";

            $content .= get_the_title($post->ID);

            $content .= "\n\n";


            $content .= "URL: ";

            $content .= get_permalink($post->ID);

            $content .= "\n\n";


            $content .= wp_strip_all_tags(
                wp_trim_words(
                    $post->post_content,
                    80
                )
            );


            $content .= "\n\n---\n\n";


        }



        return $content;


    }


}

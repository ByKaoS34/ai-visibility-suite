<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_Generator {


    public function generate(){


        $content = "";


        $content .= "# " . get_option(
            'avs_site_name',
            get_bloginfo('name')
        );

        $content .= "\n\n";


        // Site Information

        $content .= "## Site Information\n\n";


        $site_type = get_option('avs_site_type');


        if($site_type){

            $content .= "Site Type: ";
            $content .= $site_type;
            $content .= "\n\n";

        }



        $main_topic = get_option('avs_main_topic');


        if($main_topic){

            $content .= "Main Topic: ";
            $content .= $main_topic;
            $content .= "\n\n";

        }



        // About

        $content .= "## About\n\n";


        $content .= get_option(
            'avs_description',
            get_bloginfo('description')
        );


        $content .= "\n\n";




        // Keywords


        $keywords = get_option('avs_keywords');


        if($keywords){


            $content .= "## Keywords\n\n";

            $content .= $keywords;

            $content .= "\n\n";


        }




        // Categories


        $content .= "## Categories\n\n";


        $categories = get_categories(array(
            'hide_empty'=>true
        ));



        foreach($categories as $category){


            $content .= "### ";

            $content .= $category->name;

            $content .= "\n\n";



            $posts = get_posts(array(

                'category'=>$category->term_id,

                'numberposts'=>10,

                'post_status'=>'publish'

            ));



            foreach($posts as $post){


                $content .= "- ";

                $content .= get_the_title(
                    $post->ID
                );

                $content .= "\n";


            }


            $content .= "\n";


        }





        // Pages


        $content .= "## Pages\n\n";


        $pages = get_pages();



        foreach($pages as $page){


            $content .= "- ";

            $content .= $page->post_title;

            $content .= "\n";


        }



        return $content;


    }


}

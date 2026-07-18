<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_Generator {


    public function generate(){


        $content = "";



        /*
        Site Başlığı
        */


        $content .= "# " . get_option(
            'avs_site_name',
            get_bloginfo('name')
        );

        $content .= "\n\n";



        /*
        Site Information
        */


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



        /*
        About
        */


        $content .= "## About\n\n";


        $content .= get_option(
            'avs_description',
            get_bloginfo('description')
        );


        $content .= "\n\n";




        /*
        Keywords
        */


        $keywords = get_option('avs_keywords');


        if($keywords){


            $content .= "## Keywords\n\n";

            $content .= $keywords;

            $content .= "\n\n";

        }





        /*
        Content Types
        */


        $content .= "## Content\n\n";



        $content_manager = new AVS_Content();



        $post_types = $content_manager->get_post_types();




       foreach($post_types as $type){


    if($type == 'ourservices'){

        continue;

    }



    $content .= "### " . ucfirst($type) . "\n\n";


    $items = $content_manager->get_items($type);



            foreach($items as $item){


                $content .= "- ";

                $content .= get_the_title(
                    $item->ID
                );

                $content .= "\n";


            }



            $content .= "\n";

        }




        return $content;



    }



}

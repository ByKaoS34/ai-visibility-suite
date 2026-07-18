<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_LLMS {


    public function __construct() {


        add_action(
            'init',
            array($this,'generate')
        );


        add_action(
            'save_post',
            array($this,'generate')
        );


    }



    public function generate(){


        global $wp_filesystem;


        if(empty($wp_filesystem)){


            require_once ABSPATH . '/wp-admin/includes/file.php';


            WP_Filesystem();


        }




        // llms.txt


        if(class_exists('AVS_Generator')){


            $generator = new AVS_Generator();


            $content = $generator->generate();



            $wp_filesystem->put_contents(

                ABSPATH . 'llms.txt',

                $content,

                FS_CHMOD_FILE

            );


        }





        // llms-full.txt


        if(class_exists('AVS_Full_Generator')){


            $full_generator = new AVS_Full_Generator();


            $full_content = $full_generator->generate();



            $wp_filesystem->put_contents(

                ABSPATH . 'llms-full.txt',

                $full_content,

                FS_CHMOD_FILE

            );


        }



    }


}

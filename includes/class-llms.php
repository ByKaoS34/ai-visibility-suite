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



        // llms.txt


        if(class_exists('AVS_Generator')){


            $generator = new AVS_Generator();


            $content = $generator->generate();



            file_put_contents(

                ABSPATH . 'llms.txt',

                $content

            );


        }




        // llms-full.txt


        if(class_exists('AVS_Full_Generator')){


            $full_generator = new AVS_Full_Generator();



            $full_content = $full_generator->generate();



            file_put_contents(

                ABSPATH . 'llms-full.txt',

                $full_content

            );


        }


    }



}

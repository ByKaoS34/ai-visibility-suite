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


        if(!class_exists('AVS_Generator')){

            return;

        }



        $generator = new AVS_Generator();



        $content = $generator->generate();



        file_put_contents(

            ABSPATH . 'llms.txt',

            $content

        );


    }


}

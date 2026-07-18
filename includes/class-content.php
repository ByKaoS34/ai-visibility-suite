<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_Content {


    public function get_post_types(){


        return get_post_types(
            array(
                'public'=>true
            ),
            'names'
        );


    }



    public function get_items($type){


        return get_posts(array(

            'post_type'=>$type,

            'numberposts'=>20,

            'post_status'=>'publish'

        ));


    }


}

<?php

if (!defined('ABSPATH')) {
    exit;
}


class AVS_Services {


    public function get_services(){


        return get_posts(array(

            'post_type'=>'ourservices',

            'numberposts'=>50,

            'post_status'=>'publish'

        ));


    }



}

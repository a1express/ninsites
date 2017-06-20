<?php

class BodyClass {
    public static function Init($classes) {

        var_dump($classes); die();

        return $classes . ' ' . str_replace( array( 'http://', 'https://', '.com', 'www.' ), '', get_bloginfo('siteurl') ) . '-site';
    }
}

add_filter('body_class', [ 'BodyClass', 'Init' ]);

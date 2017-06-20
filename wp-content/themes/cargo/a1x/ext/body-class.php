<?php

class BodyClass {
    public static function Init($classes) {
        $classes[] = str_replace( array( 'http://', 'https://', '.com', 'www.' ), '', get_bloginfo('siteurl') ) . '-site';

        return $classes;
    }
}

add_filter('body_class', [ 'BodyClass', 'Init' ]);

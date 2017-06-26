<?php

class BodyClass {
    public static function Init($classes) {
        $page = get_queried_object();

        // Class for iframe pages layout
        if ( strpos( $page->post_content, '<iframe' ) !== false && strpos( $page->post_content, '.e-courier.com/' ) !== false )
            $classes[] = 'page-layout-iframe';

        // Site specific class
        $classes[] = str_replace( array( 'http://', 'https://', '.com', 'www.' ), '', get_bloginfo('siteurl') ) . '-site';

        return $classes;
    }
}

add_filter('body_class', [ 'BodyClass', 'Init' ]);

<?php

class BodyClass {
    public static function Init($classes) {
        $page = get_queried_object();

        // Class for iframe pages layout
        if ( strpos( $page->post_content, '<iframe' ) !== false && strpos( $page->post_content, '.e-courier.com/' ) !== false )
            $classes[] = 'page-layout-iframe';

        // Class for tracking pages layout
        if ( strpos( $page->post_content, '<form' ) !== false && strpos( $page->post_content, '.e-courier.com/' ) !== false && strpos( $page->post_content, 'Wizard_tracking.asp' ) !== false )
            $classes[] = 'page-layout-tracking';

        // Class for login pages layout
        if ( strpos( $page->post_content, '<iframe' ) !== false && strpos( $page->post_content, '.e-courier.com/' ) !== false && strpos( $page->post_content, 'home/index.asp' ) !== false )
            $classes[] = 'page-layout-login';

        // Site specific class
        $classes[] = str_replace( array( 'http://', 'https://', '.com', 'www.', 'dev.', ':800' ), '', get_bloginfo('siteurl') ) . '-site';

        return $classes;
    }
}

add_filter('body_class', [ 'BodyClass', 'Init' ]);

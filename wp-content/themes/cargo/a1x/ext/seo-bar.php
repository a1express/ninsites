<?php

class SeoBar {
    const DEFAULT_MESSAGE = 'National Courier Service | Same Day Delivery Management Specialist';
    const META_KEY = 'seo_bar_contents';

    public static function GetMessage($postId) {
        $meta = get_post_meta( $postId, self::META_KEY );
        $value = isset($meta[0]) ? $meta[0] : self::DEFAULT_MESSAGE;

        return $value;
    }

    public static function DefineMetaBox() {
        add_meta_box( 'seo_bar_meta_box', 'Seo Bar', ['SeoBar', 'DefineMetaBoxCallback'], 'page', 'side', 'high' );
    }

    public static function DefineMetaBoxCallback($post) {
        printf('<textarea name="seo_bar_contents" style="width: %s; height: 100px;">%s</textarea>', '100%', self::GetMessage($post->ID));
    }

    public static function SavePostCallback($postId) {
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        if ( !current_user_can('edit_post', $postId) )
            return;

        $contents = isset($_POST['seo_bar_contents']) ? trim($_POST['seo_bar_contents']) : '';
        update_post_meta($postId, self::META_KEY, $contents);
    }
}

add_action( 'add_meta_boxes', ['SeoBar', 'DefineMetaBox'] );
add_action( 'save_post', ['SeoBar', 'SavePostCallback'] );

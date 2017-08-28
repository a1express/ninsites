<?php

class QuickQuote
{
    public static function Init($content)
    {
        $pageId = get_queried_object_id();

        if  (
                ( ( DomainManager::IsManhattanCourierServiceDomain() || DomainManager::IsLocalhostDomain() ) && ( $pageId == 76 || $pageId == 1765 ) )
                || ( DomainManager::IsProficientLogisticDomain() && ( $pageId == 2399 || $pageId == 2344 ) )
                || ( DomainManager::IsExpressWayCourierDomain() && ( $pageId == 1682 || $pageId == 1711 ) )
		        || ( DomainManager::IsASAPCourierDomain() && ( $pageId == 1683 || $pageId == 1711 || $pageId == 1936 || $pageId == 1940) )
		        || ( DomainManager::IsDEVCourierDomain() && ( $pageId == 1683 || $pageId == 1711 ) )
                || ( DomainManager::IsMMCourierDomain() && ( $pageId == 1684 || $pageId == 1698 ) )
                || ( DomainManager::IsNYCourierDomain() && ( $pageId == 1684 || $pageId == 1698 ) )
            )
        {
            ob_start();
            get_template_part( "a1x/templates/quick-quote" );
            $quickquote = ob_get_clean();

            $quickquote = str_replace( '<div class="qq-holder gutter">', '<div class="qq-holder in-page gutter">', $quickquote );

            $target = '<div class="slided mediumSliderHeight';

            return str_replace($target, $quickquote . $target, $content );
        }

        return $content;
    }

    public static function OnNyHomepageBottom($content)
    {
        if ( is_front_page() && DomainManager::IsNYCourierDomain() )
        {
            ob_start();

            $GLOBALS['qq_redirect_url'] = home_url('/quick-quote');
            get_template_part( 'a1x/templates/quick-quote-form' );

            $quickquote = ob_get_clean();
            $quickquote = '<div class="qq-holder on-home">' . $quickquote . '</div>';

            $target = '<h2><span class="headline">Use our Quick Quote Tool</span></h2>';

            return str_replace($target, $target . $quickquote, $content);
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'QuickQuote', 'Init' ], 100000 );
add_filter( 'the_content', [ 'QuickQuote', 'OnNyHomepageBottom' ], 100001 );

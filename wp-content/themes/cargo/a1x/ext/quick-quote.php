<?php

class QuickQuote {
    public static function Init($content) {
        $pageId = get_queried_object_id();

        if  (
                ( ( DomainManager::IsManhattanCourierServiceDomain() || DomainManager::IsLocalhostDomain() ) && ( $pageId == 76 || $pageId == 1765 ) )
                || ( DomainManager::IsProficientLogisticDomain() && ( $pageId == 2399 || $pageId == 2344 ) )
                || ( DomainManager::IsExpressWayCourierDomain() && ( $pageId == 1682 || $pageId == 1711 ) )
		|| ( DomainManager::IsASAPCourierDomain() && ( $pageId == 1683 || $pageId == 1711 ) )
		|| ( DomainManager::IsDEVCourierDomain() && ( $pageId == 1683 || $pageId == 1711 ) )
            )
        {
            ob_start();
            get_template_part( "a1x/templates/quick-quote" );
            $quickquote = ob_get_clean();

            $target = '<div class="slided mediumSliderHeight';

            return str_replace($target, $quickquote . $target, $content );
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'QuickQuote', 'Init' ], 100000 );

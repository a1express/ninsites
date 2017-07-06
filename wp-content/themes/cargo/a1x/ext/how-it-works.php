<?php

class HowItWorks {
    public static function Init($content) {
        ob_start();
        get_template_part( "a1x/templates/how-it-works" );
        $howItWorks = ob_get_clean();

        $target1 = home_url('/wp-content/uploads/2015/09/howitworks3.png');
        $target2 = home_url('/wp-content/uploads/2015/09/howitworks4.png');
        $target3 = home_url('/wp-content/uploads/2017/07/howitworks4.png');

        $target1 = sprintf( '<img src="%s" alt="%s">', $target1, $target1 );
        $target2 = sprintf( '<img src="%s" alt="%s">', $target2, $target2 );
        $target3 = sprintf( '<img src="%s" alt="%s">', $target3, $target3 );

        return str_replace(array(
                $target1,
                $target2,
                $target3
            ),
            $howItWorks,
            $content
        );
    }
}

add_filter( 'the_content', [ 'HowItWorks', 'Init' ], 100000 );

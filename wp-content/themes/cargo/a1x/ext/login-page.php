<?php

class LoginPage {
    public static function ConnectFormToIframe($content) {
        $body = '<form action="__action_url__" method="post" class="btLightSkin btQuoteBooking login-form" onsubmit="jQuery(this).addClass(\'hidden\'); jQuery(\'iframe\').addClass(\'visible\'); jQuery(\'#btPreloader\').removeClass(\'removePreloader\').addClass(\'forceShowing\');" target="login-browser">
                    <div class="btQuoteItem btQuoteItemFullWidth">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="btQuoteItem btQuoteItemFullWidth">
                        <label>Password</label>
                        <input type="password" class="form-control" name="Password" />
                    </div>
                    <input name="Type" value="1" type="hidden" />
                    <button class="btBtn btnFilled btContactSubmit">Submit</button>
                </form>';

        if ( strpos( $content, '<iframe' ) !== false && strpos( $content, '.e-courier.com/' ) !== false && strpos( $content, '/home/index.asp' ) !== false )
        {
            $action = substr( $content, strpos( $content, '<iframe ' ) );
            $action = substr( $action, strpos( $action, 'src="' ) + 5 );
            $action = substr( $action, 0, strpos( $action, '"' ) );
            $action = str_replace( 'index.asp', 'wizard_oe2.asp?UserGUID=', $action );

            $body = str_replace( '__action_url__', $action, $body );

            $content = str_replace( 'src="' . $action . '"', '', $content );
            $content = str_replace('<table width="500" align="center">', $body . '<table width="500" align="center">', $content);
            $content = str_replace('<iframe ', '<iframe name="login-browser" onload="jQuery(\'#btPreloader\').addClass(\'removePreloader\').removeClass(\'forceShowing\');" ', $content);
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'LoginPage', 'ConnectFormToIframe' ], 100000 );

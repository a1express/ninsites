<?php

class LoginPage {
    public static function ConnectFormToIframe($content) {

        $body = '<form class="btLightSkin btQuoteBooking" style="opacity: 1;">
                    <div class="btQuoteItem btQuoteItemFullWidth">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="btQuoteItem btQuoteItemFullWidth">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" />
                    </div>
                    <button class="btBtn btnFilled btContactSubmit">Submit</button>
                </form>';

        if ( strpos( $content, '<form' ) !== false && strpos( $content, '.e-courier.com/' ) !== false && strpos( $content, '/home/index.asp' ) !== false )
        {
            $content = str_replace('<table width="500" align="center">', $body . '<table width="500" align="center">', $content);
            $content = $content . $body;
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'LoginPage', 'ConnectFormToIframe' ], 100000 );

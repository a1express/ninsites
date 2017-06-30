<?php

class Solve360 {
    public static function ConnectAirFreight() {
        if ( isset( $_POST['action'] ) && $_POST['action'] == 'bt_cc' )
        {
            $url = 'http://www.webicise.com/Solve360/Manhattan/Calculator/Solve360ContactSave.php';

            if (DomainManager::IsProficientLogisticDomain())
                $url = 'http://www.webicise.com/Solve360/Proficient/Calculator/Solve360ContactSave.php';
            else if (DomainManager::IsExpressWayCourierDomain())
                $url = 'http://www.webicise.com/Solve360/Expressway/Calculator/Solve360ContactSave.php';

            $data = array(
                'company' => '',
                'firstname' => '',
                'lastname' => '',
                'businessemail' => '',
                'businessphonedirect' => '',
                'message' => ''
            );
            $params = '?';

            foreach ( $_POST as $key => $value )
            {
                if ( $key == 'email' )
                    $data['businessemail'] = $value;
                else if ( $key == 'phone' )
                    $data['businessphonedirect'] = $value;
                else if ( $key == 'address' )
                    $data['company'] = $value;
                else if ( $key == 'message' )
                    $data['message'] = $value;
                else if ( $key == 'name' )
                {
                    $namePieces = explode(' ', str_replace('  ', '', trim($value)));

                    $data['firstname'] = isset($namePieces[0]) ? $namePieces[0] : '';
                    $data['lastname'] = isset($namePieces[1]) ? $namePieces[1] : '';
                }
            }

            foreach ($data as $key => $value)
            {
                $params = $params . $key . '=' . urlencode(trim($value)) . '&';
            }
            $params = trim($params, '&');

            self::Call( $url, $params );
        }
    }

    public static function Call($url, $params) {
        $solve360Url = $url . $params;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $solve360Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $r = curl_exec($ch);
        curl_close($ch);

        return $r;
    }

    public static function ExtendMessageBody($content) {
        $js = '<script type="text/javascript">
                    if ( window.location.pathname == "/services/routes/" )
                    {
                        (function($) {
                            $(".btContactSubmit").on("click", function(){
                                var textarea = $("textarea");
                                var initialValue = textarea.val();
                                
                                var str = "Pre-Schduled Form: Radius: ";
                                str = str + $(".btQuoteSliderValue").eq(0).text();
                                str = str + ", ParcelNumber: ";
                                str = str + $(".btQuoteSliderValue").eq(1).text();
                                str = str + ", ParcelType: ";
                                str = str + $(".ddlabel").eq(0).text();
                                str = str + ", Before8: ";
                                str = str + ($(".btQuoteSwitch").hasClass("on") ? "yes" : "no");
                                str = str + ", Message: " + initialValue;

                                textarea.val( str );
                                
                                setTimeout(function(){
                                    textarea.val( initialValue );
                                }, 200);
                            });
                        })( jQuery );
                    }
                </script>';

        $target = '<button type="submit" class="btContactSubmit">Submit</button>';

        if ( strpos( $content, $target ) !== false )
        {
            $content = str_replace( $target, $target . $js, $content );
        }

        return $content;
    }
}

add_action( 'init', [ 'Solve360', 'ConnectAirFreight' ], 100000 );
add_filter( 'the_content', [ 'Solve360', 'ExtendMessageBody' ], 100000 );

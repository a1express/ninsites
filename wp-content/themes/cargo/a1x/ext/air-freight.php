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
                'businessphonedirect' => ''
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
                else if ( $key == 'name' )
                {
                    $data['firstname'] = $value;
                    $data['lastname'] = $value;
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
}

add_action( 'init', [ 'Solve360', 'ConnectAirFreight' ], 100000 );

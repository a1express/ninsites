<?php

$ch = curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$params = array(
    'FromAddress2' => '555 11th St NW',
    'FromZIP2' => '20004',
    'ToAddress2' => '4445 Willard Ave',
    'ToZIP2' => '20815',
    'fweight' => '2',
    'fpieces' => '2',
    'jumpMenu3' => '1',
    'jumpMenu2' => '0',
    'jumpMenu33' => '1',
    'jumpMenu22' => '0',
    'EmailAddress' => '',
    'external' => '1',
    'TAG' => 'Case'
);

$params = $_POST;

print_r($params);
die();

curl_setopt($ch, CURLOPT_URL, "http://washingtonexpress.com/services/quote.asp");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));

$result = curl_exec($ch);
echo $result;

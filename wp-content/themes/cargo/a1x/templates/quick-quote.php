<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD_YJPIOkLsYI2cDhnVwdMI1l6uHuvdd1k"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

<script type="text/javascript">
    var defaultOrigin = new google.maps.LatLng(
        <?php
            echo DomainManager::GetVariable(
                '40.7590402,-74.0394423',
                '38.0057006,-84.4519174',
                '41.3885469,-73.4999866',
                '26.1103601,-80.1733113',
                '40.7590402,-74.0394423',
                '39.261032,-76.676993',
                '40.7590402,-74.0394423'
            );
        ?>
    );

    (function($) {
        $(document).ready(function(){
            $("#qq-holder").each(function(){
                var qq = $(this);
                var picker = $("#datepicker").datepicker();
                var form = qq.find("form");

                form.on("submit", function(e) {
                    var form = $(this);
                    var origin = form.find('#input-origin');
                    var destination = form.find('#input-destination');

                    if ( $.trim( origin.val() ) == '' )
                    {
                        alert('Please enter the origin ZIP');
                        return false;
                    }

                    if ( $.trim( destination.val() ) == '' )
                    {
                        alert('Please enter the destination ZIP');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=pieces]').val() ) == '' || isNaN( $.trim( form.find('input[name=pieces]').val() ) ) )
                    {
                        alert('Please enter the pieces #');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=weight]').val() ) == '' || isNaN( $.trim( form.find('input[name=weight]').val() ) ) )
                    {
                        alert('Please enter the weight');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=date]').val() ) == '' )
                    {
                        alert('Please select the date');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=track2]').val() ) == '' )
                    {
                        alert('Please enter the time');
                        return false;
                    }

                    $('#btPreloader').removeClass("removePreloader").addClass("forceShowing");
                });
            });

            function completequickquote() {
                var today=new Date();
                var day = today.getDate();
                var month = today.getMonth()+1;
                var year = today.getFullYear();
                var minutes = today.getMinutes();
                var hours = today.getHours();
                var pm = false;

                if (hours>11) {
                    pm=true;
                }
                if (minutes<10) {
                    minutes = "0" + minutes;
                }
                if (hours>12) {
                    hours = hours-12;
                }
                if (hours<10) {
                    hours = "0" + hours;
                }
                if (hours<1) {
                    hours = "12";
                }

                if ( pm )
                {
                    $('#jumpMenu').val('PM').siblings('.trigger').text('PM');
                }

                document.quickquote.track2.value = hours + ":" + minutes;
                document.quickquote.datepicker.value = month + "/" + day + "/" + year;
            }

            completequickquote();

            var directionsDisplay;
            var directionsService = new google.maps.DirectionsService();
            var geocoder, map, originPin, destinationPin;

            window.drawOriginPin = function(address)
            {
                if ( address == '' )
                {
                    address = defaultOrigin.toString().replace("(", "").replace(")", "");
                }

                if (typeof originPin != 'undefined')
                {
                    originPin.setMap(null);
                }

                geocoder.geocode( { 'address': address }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        map.setCenter(results[0].geometry.location);
                        originPin = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            animation: google.maps.Animation.DROP
                        });
                    }
                    else
                    {
                        console.log("(origin) Geocode was not successful for the following reason: " + status);
                    }
                });
            }

            window.drawDestinationPin = function(address)
            {
                if ( address == '' )
                {
                    return;
                }

                if (typeof destinationPin != 'undefined')
                {
                    destinationPin.setMap(null);
                }

                geocoder.geocode( { 'address': address }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        map.setCenter(results[0].geometry.location);
                        destinationPin = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            animation: google.maps.Animation.DROP
                        });
                    }
                    else
                    {
                        console.log("(destination) Geocode was not successful for the following reason: " + status);
                    }
                });
            }

            function initialize()
            {
                directionsDisplay = new google.maps.DirectionsRenderer();
                geocoder = new google.maps.Geocoder();

                var myOptions = {
                    zoom:11,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: defaultOrigin
                }
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                directionsDisplay.setMap(map);

                $('#input-origin').each(function(){
                    var originInput = $(this);
                    drawOriginPin(originInput.val());
                    calcRoute();
                });

                $('#input-destination').blur(function(){
                    var destinationInput = $(this);
                    drawDestinationPin(destinationInput.val());
                    calcRoute();
                });
            }

            function calcRoute()
            {
                var start = $('#input-origin').val();
                var end = $('#input-destination').val();

                var request = {
                    origin:start,
                    destination:end,
                    travelMode: google.maps.TravelMode.DRIVING
                };

                directionsService.route(request, function(result, status)
                {
                    if (status == google.maps.DirectionsStatus.OK)
                    {
                        directionsDisplay.setDirections(result);
                    }
                });
            }

            initialize();
            calcRoute();
        });
    })( jQuery );
</script>

<div id="qq-holder" class="gutter">
    <div class="port">
        <?php
        $origin = isset($_POST['origin']) && trim($_POST['origin']) != '' ? $_POST['origin'] : 30301;
        $destination = isset($_POST['destination']) && trim($_POST['destination']) != '' ? $_POST['destination'] : 30303;
        $pieces = isset($_POST['pieces']) && trim($_POST['pieces']) != '' ? $_POST['pieces'] : 1;
        $weight = isset($_POST['weight']) && trim($_POST['weight']) != '' ? $_POST['weight'] : 1;
        $vehicle = isset($_POST['jumpMenu2']) && trim($_POST['jumpMenu2']) != '' ? $_POST['jumpMenu2'] : 1;
        $date = isset($_POST['date']) && trim($_POST['date']) != '' ? $_POST['date'] : '';
        $time = isset($_POST['track2']) && trim($_POST['track2']) != '' ? $_POST['track2'] : '';
        $ampm = isset($_POST['jumpMenu']) && trim($_POST['jumpMenu']) != '' ? $_POST['jumpMenu'] : '';
        $email = isset($_POST['email']) && trim($_POST['email']) != '' ? $_POST['email'] : '';
        $foptin = 'no';

        if ( $email != '' )
        {
            $params = "?origin=" . $origin . "&destination=" . $destination . "&pieces=" . $pieces . "&weight=" . $weight . "&date=" . $date . "&track2=" . $time . "&jumpMenu=" . $ampm . "&email=" . $email . "&jumpMenu2=" . $vehicle . "&optin=" . $foptin;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: ' . $email . "\r\n";

            if ( DomainManager::IsManhattanCourierServiceDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Manhattan/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = "<HTML><head></head><body><table width=800>";
                $mailBody .= "<tr><td valign=top><img src='https://www.manhattancourierservice.com/wp-content/themes/cargo/img/Manhattan_Courier_Logo.png' alt='manhattancourierservice.com'></td></tr>";
                $mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='https://www.manhattancourierservice.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://www.manhattancourierservice.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='https://www.manhattancourierservice.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><a href='https://www.manhattancourierservice.com/new-account/' title='Order Now'><img src='https://www.manhattancourierservice.com/wp-content/themes/cargo/img/Manhattan_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
                $mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at manhattancourierservice.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code MCS100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
                $mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Manhattan Courier Service | (800) 469-0929 | 153 West 27th St | New York, NY | 10001</font></td valign=right><td></td></tr></table></td></tr>";
                $mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20Manhattan%20QuickQuotes>click here</a></td></tr>";
                $mailBody .= "</td></tr></table></body></html>";

                $headers .= 'From: Manhattan Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ManhattanCourierService QuickQuote", $mailBody, $headers);
            }
            else if ( DomainManager::IsProficientLogisticDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Proficient/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = "<HTML><head></head><body><table width=800>";
                $mailBody .= "<tr><td valign=top><img src='https://www.proficientlogistic.com/wp-content/themes/cargo/img/Proficient_Logistic_Logo.png' alt='proficientlogistic.com'></td></tr>";
                $mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='https://www.proficientlogistic.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://www.proficientlogistic.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='https://www.proficientlogistic.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><a href='https://www.proficientlogistic.com/new-account/' title='Order Now'><img src='https://www.proficientlogistic.com/wp-content/themes/cargo/img/Proficient_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
                $mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at proficientlogistic.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code PL100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
                $mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Proficient Logistic| (859) 300-3880 | 351 United Court | Lexington KY | 40509 </font></td valign=right><td></td></tr></table></td></tr>";
                $mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20Proficient%20QuickQuotes>click here</a></td></tr>";
                $mailBody .= "</td></tr></table></body></html>";

                $headers .= 'From: Proficient Logistic <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ProficientLogistic QuickQuote", $mailBody, $headers);
            }
            else if ( DomainManager::IsExpressWayCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Expressway/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = "<HTML><head></head><body><table width=800>";
                $mailBody .= "<tr><td valign=top><img src='http://www.expresswaycourier.com/wp-content/themes/cargo/img/Expressway_Logo.png' alt='expresswaycourier.com'></td></tr>";
                $mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='http://expresswaycourier.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://expresswaycourier.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='http://expresswaycourier.com/about-us/' title='About us'>ABOUT US</a> | <a href='http://expresswaycourier.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><a href='https://expresswaycourier.com/new-account/' title='Order Now'><img src='http://www.expresswaycourier.com/wp-content/themes/cargo/img/Expressway_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
                $mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at expresswaycourier.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code EW100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
                $mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Expressway Courier Service | (800) 955-1755 | 36 Mill Plain Road, Suite 407 | Danbury, CT| 06811</font></td valign=right><td></td></tr></table></td></tr>";
                $mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20Expressway%20QuickQuotes>click here</a></td></tr>";
                $mailBody .= "</td></tr></table></body></html>";

                $headers .= 'From: Expressway Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ExpresswayCourierService QuickQuote", $mailBody, $headers);
            }

 else if ( DomainManager::IsASAPCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/ASAP/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = "<HTML><head></head><body><table width=800>";
                $mailBody .= "<tr><td valign=top><img src='https://asapcourierfl.com/wp-content/themes/cargo/img/asap_Logo.png' alt='asapcourierfl.com'></td></tr>";
                $mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='https://asapcourierfl.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://asapcourierfl.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='https://asapcourierfl.com/company/' title='About us'>ABOUT US</a> | <a href='https://asapcourierfl.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><a href='https://asapcourierfl.com/new-account/' title='Order Now'><img src='https://asapcourierfl.com/wp-content/themes/cargo/img/asap_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
                $mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at asapcourierfl.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code AC100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
                $mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>ASAP Courier Service | (800) 446-7477 | 941 SW 21st Terrace | Fort Lauderdale, FL| 33312</font></td valign=right><td></td></tr></table></td></tr>";
                $mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20ASAP%20QuickQuotes>click here</a></td></tr>";
                $mailBody .= "</td></tr></table></body></html>";

                $headers .= 'From: ASAP Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ASAPCourierService QuickQuote", $mailBody, $headers);
            }

else if ( DomainManager::IsMMCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/MM/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = "<HTML><head></head><body><table width=800>";
                $mailBody .= "<tr><td valign=top><img src='http://marylandmessenger.com/wp-content/themes/cargo/img/mm_header.png' alt='marylandmessenger.com'></td></tr>";
                $mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='http://marylandmessenger.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='http://marylandmessenger.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='http://marylandmessenger.com/company/' title='About us'>ABOUT US</a> | <a href='http://marylandmessenger.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
                $mailBody .= "<tr align=center><td valign=top><a href='http://marylandmessenger.com/new-account/' title='Order Now'><img src='http://marylandmessenger.com/wp-content/themes/cargo/img/MM_Middle.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
                $mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at marylandmessenger.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code MM100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
                $mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Maryland Messenger | (800) 624-7665 | 3922 Vero Road Suite J | Baltimore, Maryland | 21227</font></td valign=right><td></td></tr></table></td></tr>";
                $mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20MM%20QuickQuotes>click here</a></td></tr>";
                $mailBody .= "</td></tr></table></body></html>";

                $headers .= 'From: Maryland Messenger Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "MMCourierService QuickQuote", $mailBody, $headers);
            }

        }
        ?>

        <div class="boldRow">
            <div class="rowItemContent">
                <div class="rowItem col-md-12">
                    <?php
                    function parseTime($time)
                    {
                        $pieces = explode(" ", $time);
                        $pieces[1] = $pieces[1][0] . $pieces[1][1] . ":" . $pieces[1][2] . $pieces[1][3];

                        return $pieces[0] . " " . $pieces[1];
                    }

                    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
                    {
                        $xml_post_string = sprintf('<SOAP:Envelope xmlns:SOAP="https://schemas.xmlsoap.org/soap/envelope/">
														<SOAP:Body>
															<m:Login xmlns:m="https://www.e-courier.com/software/schema/public/" UserName="%s" Password="%s" HttpReferer
							="/courier/quickquote.asp" LoginMode="Public" WebSite="%s"/>
														</SOAP:Body>
													</SOAP:Envelope>
													',
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_USERNAME,
                                DomainManager::QQ_PROF_USERNAME,
                                DomainManager::QQ_EXPR_USERNAME,
                                DomainManager::QQ_ASAP_USERNAME,
                                DomainManager::QQ_DEV_USERNAME,
				DomainManager::QQ_MM_USERNAME,
				DomainManager::QQ_MANH_USERNAME
                            ),
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_PASSWORD,
                                DomainManager::QQ_PROF_PASSWORD,
                                DomainManager::QQ_EXPR_PASSWORD,
                                DomainManager::QQ_ASAP_PASSWORD,
                                DomainManager::QQ_DEV_PASSWORD,
                                DomainManager::QQ_MM_PASSWORD,
				DomainManager::QQ_MANH_PASSWORD
                            ),
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_WEBSITE,
                                DomainManager::QQ_PROF_WEBSITE,
                                DomainManager::QQ_EXPR_WEBSITE,
                                DomainManager::QQ_ASAP_WEBSITE,
                                DomainManager::QQ_DEV_WEBSITE,
                                DomainManager::QQ_MM_WEBSITE,
				DomainManager::QQ_MANH_WEBSITE
                            )
                        );

                        function CallSoap($xml_post_string)
                        {
                            $soapUrl = "https://a1express.e-courier.com/a1express/software/xml/xml.asp";
                            $headers = array(
                                "Content-type: text/xml;charset=\"utf-8\"",
                                "Accept: text/xml",
                                "Cache-Control: no-cache",
                                "Pragma: no-cache",
                                "Content-length: ".strlen($xml_post_string),
                            );

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_URL, $soapUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                            $response = curl_exec($ch);
                            curl_close($ch);

                            $response = str_replace(":", "", $response);
                            $parser = simplexml_load_string($response);

                            return $parser;
                        }

                        $parser = CallSoap($xml_post_string);
                        $guidAttr = $parser->SOAPBody->mLoginResponse[0]->attributes();
                        $guid = isset($guidAttr->UserGUID) ? $guidAttr->UserGUID->__toString() : '';

                        $xml_post_string = sprintf('<SOAP:Envelope xmlns:SOAP="https://schemas.xmlsoap.org/soap/envelope/">
																<SOAP:Body UserGUID="%s">
																	<m:QuoteOrder xmlns:m="https://www.e-courier.com/schemas/" WebSite="%s">
																		<m:Order Weight="%s" Pieces="%s" VehicleTypeID="%s" CustomerCode="%s">
																			<Stops>
																				<Stop Sequence="1" Zip="%s" ScheduledDateTime ="%s %s %s"/>
																				<Stop Sequence="2" Zip="%s"/>
																			</Stops>
																		</m:Order>
																	</m:QuoteOrder>
																</SOAP:Body >
															</SOAP:Envelope>',
                            $guid,
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_WEBSITE,
                                DomainManager::QQ_PROF_WEBSITE,
                                DomainManager::QQ_EXPR_WEBSITE,
                                DomainManager::QQ_ASAP_WEBSITE,
                                DomainManager::QQ_DEV_WEBSITE,
                                DomainManager::QQ_MM_WEBSITE,
				DomainManager::QQ_MANH_WEBSITE
                            ),
                            $weight,
                            $pieces,
                            $vehicle,
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_CUSTOMER,
                                DomainManager::QQ_PROF_CUSTOMER,
                                DomainManager::QQ_EXPR_CUSTOMER,
                                DomainManager::QQ_ASAP_CUSTOMER,
                                DomainManager::QQ_DEV_CUSTOMER,
                                DomainManager::QQ_MM_CUSTOMER,
				DomainManager::QQ_MANH_CUSTOMER
                            ),
                            $origin,
                            $date,
                            $time,
                            $ampm,
                            $destination
                        );

                        $parser = CallSoap($xml_post_string);
                        $orders = isset($parser->SOAPBody->mQuoteOrderResponse->Order) ? $parser->SOAPBody->mQuoteOrderResponse->Order : array();
                    }
                    ?>

                    <?php if ( isset($orders) ): ?>
                        <?php if ( count( $orders ) == 0 ): ?>
                            <div class="no-results-box">
                                <p>Service is not available via the web for the criteria you have entered. If you have questions, please call our office at (800) 469-0929.</p>
                                <p>
                                    <strong>Potential Problems</strong><br/>
                                    <strong>Origin Zip Code</strong><br/>
                                    No QuickQuote service available from origin zip code. We provide service for over 100 of the largest Metropolitan Areas throughout the US.
                                </p>
                                <p>
                                    <strong>Time of Service</strong><br/>
                                    We currently do not accept internet orders with Evening ready times (between 6:30 PM to 7:30 AM) and Weekends (Saturday and Sundays).
                                    <strong>Orders may be placed after hours with ready times Monday-Friday 7:30 AM to 6:00 PM.</strong>
                                    Orders with after hour ready times may be placed with our office over the phone during regular business hours.
                                </p>
                            </div>
                        <?php else: ?>
                            <table class="qq-results">
                                <tr>
                                    <th>Description</th>
                                    <th>ReadyDateTime</th>
                                    <th>DueDateTime</th>
                                    <th>AmountCharged</th>
                                </tr>

                                <?php foreach( $orders as $order ): ?>
                                    <?php $orderAttrs = $order->attributes(); ?>
                                    <tr>
                                        <td>
                                            <div class="mobile-label">Description</div>
                                            <?php echo $orderAttrs->Description->__toString(); ?></td>
                                        <td>
                                            <div class="mobile-label">ReadyDateTime</div>
                                            <?php echo parseTime($orderAttrs->ReadyDateTime->__toString()); ?>
                                        </td>
                                        <td>
                                            <div class="mobile-label">DueDateTime</div>
                                            <?php echo parseTime($orderAttrs->DueDateTime->__toString()); ?>
                                        </td>
                                        <td>
                                            <div class="mobile-label">AmountCharged</div>
                                            <?php echo $orderAttrs->AmountCharged->__toString(); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <div class="box-options first expanded">
                                <div class="wrap clearfix">
                                    <article class="standard">
                                        <div class="is-popular"></div>
                                        <section>
                                            <div class="ribbon">
                                                <h3>STANDARD</h3>
                                                <div class="info-tooltip">
                                                    <div class="label">Is this right for me?</div>
                                                    <div class="tooltip-holder">
                                                        <div class="tooltip">
                                                            <p>When you want it delivered today, just not right away, choose our Standard service and Save!</p>
                                                            <p></p><ul><li>$0.10/lb over 10 lbs</li>
                                                                <li>$1.50 Safety Fee</li>
                                                                <li>75 Seconds Added to Due Time for Every Mile over 20 Miles</li>
                                                                <li>Quote Based on Zip to Zip. Actual Prices will vary based on actual delivery addresses.</li>
                                                                <li>After Hours (7PM-7AM) Add 25%</li>
                                                                <li>Monday-Friday. All Day Weekends</li></ul><p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>SIMPLY...</h4>
                                            <?php $price = 'N/A'; ?>
                                            <?php if ( isset($orders[0]) && $orders[0]->attributes()->Service->__toString() == 'Standard' ): ?>
                                                <?php $price = $orders[0]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[1]) && $orders[1]->attributes()->Service->__toString() == 'Standard' ): ?>
                                                <?php $price = $orders[1]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[2]) && $orders[2]->attributes()->Service->__toString() == 'Standard' ): ?>
                                                <?php $price = $orders[2]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <div class="price"><span class="price-show"><?php echo $price; ?></span></div>
                                            <p>
                                                Door to Door in about 5 Hrs
                                                <br>
                                                <font size="5">25% Less</font>
                                                <br>
                                                <br>&nbsp;
                                            </p>
                                            <a href="#" class="btn">Order Now</a>
                                            <div class="bottom-note">No Account Required. Order Now!</div>
                                        </section>
                                    </article>
                                    <article class="express">
                                        <div class="is-popular">

                                        </div>
                                        <section>
                                            <div class="ribbon">
                                                <h3>EXPRESS</h3>
                                                <div class="info-tooltip">
                                                    <div class="label">Is this right for me?</div>
                                                    <div class="tooltip-holder">
                                                        <div class="tooltip">
                                                            <p>Need it delivered a little faster? Express service makes it happen!</p>
                                                            <p></p><ul><li>$0.10/lb over 10 lbs</li>
                                                                <li>$1.50 Safety Fee</li>
                                                                <li>75 Seconds Added to Due Time for Every Mile over 20 Miles</li>
                                                                <li>Quote Based on Zip to Zip. Actual Prices will vary based on actual delivery addresses.</li>
                                                                <li>After Hours (7PM-7AM) Add 25%</li>
                                                                <li>Monday-Friday. All Day Weekends</li></ul><p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>DELIVERED...</h4>
                                            <?php $price = 'N/A'; ?>
                                            <?php if ( isset($orders[0]) && $orders[0]->attributes()->Service->__toString() == 'Express' ): ?>
                                                <?php $price = $orders[0]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[1]) && $orders[1]->attributes()->Service->__toString() == 'Express' ): ?>
                                                <?php $price = $orders[1]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[2]) && $orders[2]->attributes()->Service->__toString() == 'Express' ): ?>
                                                <?php $price = $orders[2]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <div class="price"><span class="price-show"><?php echo $price; ?></span></div>
                                            <p>
                                                Door to Door in about 2.5 to 3 Hrs
                                                <br>
                                                <font class="not-nationwide" size="5">$1.75/Mile</font>
                                                <font class="only only-nationwide" size="5">$2.00/Mile</font>
                                                <br>
                                                ($8.00 minimum)
                                                <br>&nbsp;
                                            </p>
                                            <a href="#" class="btn">Order Now</a>
                                            <div class="bottom-note">No Account Required. Order Now!</div>
                                        </section>
                                        <footer>
                                            <div class="inside">
                                                $0.10/lb over 10 lbs<br>
                                                $1.50 Safety Fee<br>
                                                75 Seconds Added to Due Time for Every Mile over 20 Miles<br>
                                                Quote Based on Zip to Zip. Actual Prices will vary based on actual delivery addresses.<br>
                                                After Hours (7PM-7AM) Add 25%<br>
                                                Monday-Friday. All Day Weekends
                                            </div>
                                        </footer>
                                    </article>
                                    <article class="prime">
                                        <div class="is-popular">
                                            <div class="popular">Most Popular</div>
                                        </div>
                                        <section>
                                            <div class="ribbon">
                                                <h3>PRIME</h3>
                                                <div class="info-tooltip">
                                                    <div class="label">Is this right for me?</div>
                                                    <div class="tooltip-holder">
                                                        <div class="tooltip">
                                                            <p>When you need it delivered as quickly as possible, our Prime service gives your parcel out highest priority.</p>
                                                            <p></p><ul><li>$0.10/lb over 10 lbs</li>
                                                                <li>$1.50 Safety Fee</li>
                                                                <li>75 Seconds Added to Due Time for Every Mile over 20 Miles</li>
                                                                <li>Quote Based on Zip to Zip. Actual Prices will vary based on actual delivery addresses.</li>
                                                                <li>After Hours (7PM-7AM) Add 25%</li>
                                                                <li>Monday-Friday. All Day Weekends</li></ul><p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>TODAY!</h4>
                                            <?php $price = 'N/A'; ?>
                                            <?php if ( isset($orders[0]) && $orders[0]->attributes()->Service->__toString() == 'Prime' ): ?>
                                                <?php $price = $orders[0]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[1]) && $orders[1]->attributes()->Service->__toString() == 'Prime' ): ?>
                                                <?php $price = $orders[1]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <?php if ( isset($orders[2]) && $orders[2]->attributes()->Service->__toString() == 'Prime' ): ?>
                                                <?php $price = $orders[2]->attributes()->AmountCharged->__toString(); ?>
                                            <?php endif; ?>
                                            <div class="price"><span class="price-show"><?php echo $price; ?></span></div>
                                            <p>
                                                1 Hour Faster than EXPRESS
                                                <br>
                                                <font size="5">Only 35% more</font>
                                                <br>
                                                <br>&nbsp;
                                            </p>
                                            <a href="#" class="btn">Order Now</a>
                                            <div class="bottom-note">No Account Required. Order Now!</div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="boldRow">
            <div class="rowItemContent">
                <div class="rowItem col-md-6">
                    <h3>GET AN INSTANT COURIER QUOTE</h3>
                    <form method="post" name="quickquote" action="">
                        <div class="formfield mention">
                            <label>* Required fields</label>
                        </div>
                        <div class="formfield">
                            <div class="rows2">
                                <label>*Origin ZIP</label>
                                <input class="text" name="origin" value="<?php echo isset($_POST['origin']) ? trim($_POST['origin']) : ( isset($_GET['origin']) ? trim($_GET['origin']) : '' ); ?>" id="input-origin" type="text" />
                            </div>
                            <div class="rows2">
                                <label>*Destination ZIP</label>
                                <input class="text" name="destination" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : ''; ?>" id="input-destination" type="text" />
                            </div>
                        </div>
                        <div class="formfield">
                            <div class="rows2">
                                <label>*No. of  pieces</label>
                                <input class="text" name="pieces" value="1" type="text" />
                            </div>
                            <div class="rows2">
                                <label>*Weight (LBS)</label>
                                <input class="text" name="weight" value="1" type="text" />
                            </div>
                        </div>
                        <div class="formfield">
                            <div class="rows3">
                                <label>*Ready Date</label>
                                <input type="text" id="datepicker" name="date" />
                            </div>
                            <div class="rows3">
                                <div class="hasDatepicker2"></div>

                                <label>*Ready Time</label>
                                <input class="text short" id="track2" name="track2" value="" type="text" />
                            </div>
                            <div class="rows3">
                                <label>&nbsp;</label>
                                <select class="body short" name="jumpMenu" id="jumpMenu">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="formfield">
                            <div class="rows2">
                                <label>E-mail Address</label>
                                <input class="text" name="email" value="" type="text" />
                            </div>
                            <div class="rows2">
                                <label>Vehicle/Service Type</label>
                                <select name="jumpMenu2" id="jumpMenu2">
                                    <option value="1" <?php echo $vehicle == '1' ? 'selected="selected"': ''; ?>>Any Vehicle</option>
                                    <option value="4" <?php echo $vehicle == '4' ? 'selected="selected"': ''; ?>>Car</option>
                                    <option value="7" <?php echo $vehicle == '7' ? 'selected="selected"': ''; ?>>Sm Cov P/U/Mini Van</option>
                                    <option value="15" <?php echo $vehicle == '15' ? 'selected="selected"': ''; ?>>Cargo Van</option>
                                    <option value="30" <?php echo $vehicle == '30' ? 'selected="selected"': ''; ?>>24ft Strt Truck</option>
                                    <option value="3" <?php echo $vehicle == '3' ? 'selected="selected"': ''; ?>>Bike (Limited)</option>
                                </select>
                            </div>
                        </div>

                        <div class="submit-buttons">
                            <button class="submit-button1">Get Quote</button>
                            <button class="submit-button" onclick="location.href='/ship-now/'" type="button">Ship Now</button>
                            <button class="submit-button" onclick="location.href='/new-account/'" type="button">Create an Account</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="rowItem col-md-6">
                <div class="rowItemContent">
                    <div id="map_canvas" style="width: 100%; height:380px; border: 0px none;"></div>
                </div>
            </div>
        </div>

    </div>
</div>

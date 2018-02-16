<?php $hasResults = false; ?>

<div class="qq-holder gutter">
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

        $isSpam = false;
        $isSpam2 = false;

        if ( !empty($_POST) )
        {
        	if ( 	trim($_POST['origin']) == '30301' &&
        			trim($_POST['destination']) == '30303' &&
        			trim($_POST['weight']) == '1' &&
        			trim($_POST['pieces']) == '1' &&
        			trim($_POST['jumpMenu2']) == '4' &&
        			DomainManager::IsNYCourierDomain()
    			)
        	{
        		$isSpam = true;
        	}
        	else if ( $email == 'manny@vfsfreight.com' || $email == 'mannyvasquez@ca.rr.com'  ) {
        		$isSpam = true;
        		$isSpam2 = true;
        	}
        }

        if ( $email != '' && !$isSpam )
        {
            $params = "?origin=" . $origin . "&destination=" . $destination . "&pieces=" . $pieces . "&weight=" . $weight . "&date=" . $date . "&track2=" . $time . "&jumpMenu=" . $ampm . "&email=" . $email . "&jumpMenu2=" . $vehicle . "&optin=" . $foptin;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: ' . $email . "\r\n";

            if ( DomainManager::IsManhattanCourierServiceDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Manhattan/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="https://www.manhattancourierservice.com/" style="text-decoration:none;" title="Manhattan Courier">
						<br>
						<img src="https://a1express.com/email/manhattan_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="Manhattan Courier" alt="Manhattan Courier">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="https://www.manhattancourierservice.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="https://www.manhattancourierservice.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="https://www.manhattancourierservice.com/company/" style="text-decoration:none; color: black;" title="About Us">
										About Us
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="https://www.manhattancourierservice.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="https://www.manhattancourierservice.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="https://www.manhattancourierservice.com/new-account/">
											<img alt="Get $5 off" src="https://a1express.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="https://www.manhattancourierservice.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="https://a1express.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="https://www.manhattancourierservice.com/services/warehousing/">
									 		<img alt="Warehousing" src="https://a1express.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="https://www.manhattancourierservice.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="https://a1express.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="https://www.manhattancourierservice.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="https://a1express.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at manhattancourierservice.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code MC100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20Manhattan%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">Manhattan Courier Service | (800) 469-0929 | 3153 West 27th St. | New York, NY | 10001</font></td>
</tr>
		
		
	</tbody>
</table>

';

                $headers .= 'From: Manhattan Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ManhattanCourierService QuickQuote", $mailBody, $headers);
            }
            else if ( DomainManager::IsProficientLogisticDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Proficient/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="https://www.lexingtonlogistics.com/" style="text-decoration:none;" title="Lexington Logistics">
						<br>
						<img src="https://www.lexingtonlogistics.com/email/proficient_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="Lexington Logistics" alt="Proficient Logistic">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="https://www.lexingtonlogistics.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="https://www.lexingtonlogistics.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="https://www.lexingtonlogistics.com/new-account/" style="text-decoration:none; color: black;" title="New Account">
										New Account
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="https://www.lexingtonlogistics.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="https://www.lexingtonlogistics.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="https://www.lexingtonlogistics.com/new-account/">
											<img alt="Get $5 off" src="https://www.lexingtonlogistics.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="https://www.lexingtonlogistics.com/services/rush-courier-on-demand/">
									 		<img alt="Rush Courier & On Demand" src="https://www.lexingtonlogistics.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="https://www.lexingtonlogistics.com/services/warehousing/">
									 		<img alt="Warehousing" src="https://www.lexingtonlogistics.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="https://www.lexingtonlogistics.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="https://www.lexingtonlogistics.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="https://www.lexingtonlogistics.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="https://www.lexingtonlogistics.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at lexingtonlogistics.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code PC100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20Lexington%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">Lexington Logistics | (859) 300-3880 | 351 United Court 
| Lexington KY | 40509</font></td>
</tr>
		
		
	</tbody>
</table>

';

                $headers .= 'From: Lexington Logistics <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "LexingtonLogistics QuickQuote", $mailBody, $headers);
            }
            else if ( DomainManager::IsExpressWayCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/Expressway/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="https://expresswaycourier.com/" style="text-decoration:none;" title="ExpressWay Courier">
						<br>
						<img src="https://expresswaycourier.com/email/expressway_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="ExpressWay Courier" alt="ExpressWay Courier">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="https://expresswaycourier.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="https://expresswaycourier.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="https://expresswaycourier.com/about-us/" style="text-decoration:none; color: black;" title="About Us">
										About Us
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="https://expresswaycourier.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="https://expresswaycourier.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="https://expresswaycourier.com/new-account/">
											<img alt="Get $5 off" src="https://expresswaycourier.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="https://expresswaycourier.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="https://expresswaycourier.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="https://expresswaycourier.com/services/warehousing/">
									 		<img alt="Warehousing" src="https://expresswaycourier.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="https://expresswaycourier.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="https://expresswaycourier.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="https://expresswaycourier.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="https://expresswaycourier.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at expresswaycourier.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code EW100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20Express%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">ExpressWay Courier Service | (800) 955-1755 | 36 Mill Plain Road, Suite 407 | Danbury, CT | 06811</font></td>
</tr>		
		
	</tbody>
</table>

';

                $headers .= 'From: Expressway Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ExpresswayCourierService QuickQuote", $mailBody, $headers);
            }

            else if ( DomainManager::IsASAPCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/ASAP/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
                    <HTML><head><title>Save Time & Gas with $5 off</title></head>
                    <body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td width="700" align="center" valign="top">
                                <table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">
                                            <a href="https://asapcourierfl.com/" style="text-decoration:none;" title="ASAP Courier">
                                            <br>
                                            <img src="https://asapcourierfl.com/email/ASAP_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="ASAP Courier" alt="ASAP Courier">
                                            </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="700" height="15"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
                                                <tbody>
                                                    <tr>
                                                            <td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
                                                            <a href="https://asapcourierfl.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
                                                            Quick Quotes
                                                            </a>
                                                            </td>
                                                            <td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
                                                            <a href="https://asapcourierfl.com/services/" style="text-decoration:none; color: black;" title="Services">
                                                            Services
                                                            </a>
                                                            </td>
                                                            <td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
                                                            <a href="https://asapcourierfl.com/company/" style="text-decoration:none; color: black;" title="About Us">
                                                            About Us
                                                            </a>
                                                            </td>
                                                            <td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
                                                            <a href="https://asapcourierfl.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
                                                            Ship Now
                                                            </a>
                                                            </td>
                                                            <td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
                                                            <a href="https://asapcourierfl.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
                                                            Contact Us
                                                            </a>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td cellpadding="0" cellspacing="0" colspan="2">
                                                            <a title="Get $5 off" href="https://asapcourierfl.com/new-account/">
                                                                <img alt="Get $5 off" src="https://asapcourierfl.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td cellpadding="0" cellspacing="0" >
                                                            <a title="Rush Courier & On Demand" href="https://asapcourierfl.com/services/on-demand/">
                                                                <img alt="Rush Courier & On Demand" src="https://asapcourierfl.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
                                                            </a>
                                                        </td>
                                                        <td cellpadding="0" cellspacing="0"  >
                                                            <a title="Warehousing" href="https://asapcourierfl.com/services/warehousing/">
                                                                <img alt="Warehousing" src="https://asapcourierfl.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td cellpadding="0" cellspacing="0" >
                                                            <a title="Last Mile Home Delivery" href="https://asapcourierfl.com/services/last-mile-home-delivery/">
                                                                <img alt="Last Mile Home Delivery" src="https://asapcourierfl.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
                                                            </a>
                                                        </td>
                                                        <td cellpadding="0" cellspacing="0"  >
                                                            <a title="PRESCHEDULED ROUTED DELIVERY" href="https://asapcourierfl.com/services/routes/">
                                                                <img alt="PRESCHEDULED ROUTED DELIVERY" src="https://asapcourierfl.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
                                                            </a>
                                                        </td>
                                                    </tr>
                    
                                                </table>
                                            </td>
                                        </tr>
                                        
                                            <td width="233">
                                            
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
                                <p>You recently requested a same day courier service quote at asapcourierfl.com. Place an order for your
                    1st courier delivery within the next 7 days and get $5 off with the coupon code AC100X.</p>
                    
                    <p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
                    deducted from the order before final charges. * Offer Expires in 30 days</p>
                    
                                </td>
                            </tr>
                    <tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20ASAP%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
                    <td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">ASAP Courier Service | (800) 446-7477 | 941 SW 21st Terrace | Fort Lauderdale, FL | 33312</font></td>
                    </tr>
                          
                            
                        </tbody>
                    </table>
                ';

                $headers .= 'From: ASAP Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "ASAPCourierService QuickQuote", $mailBody, $headers);
            }

		else if ( DomainManager::IsSdSglCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/SDSG/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="http://sdsgl.com//" style="text-decoration:none;" title="SDS Global">
						<br>
						<img src="http://sdsgl.com/email/sdsg_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="SDS Global" alt="SDS Global">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="http://sdsgl.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="http://sdsgl.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="http://sdsgl.com/company/" style="text-decoration:none; color: black;" title="About Us">
										About Us
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="http://sdsgl.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="http://sdsgl.com/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="http://sdsgl.com/new-account/">
											<img alt="Get $5 off" src="http://sdsgl.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="http://sdsgl.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="http://sdsgl.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="http://sdsgl.com/services/warehousing/">
									 		<img alt="Warehousing" src="http://sdsgl.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="http://sdsgl.com/services/on-demand/">
									 		<img alt="Last Mile Home Delivery" src="http://sdsgl.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Value Added Services" href="http://sdsgl.com/services/value-added-services/">
									 		<img alt="Value Added Services" src="http://sdsgl.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at sdsgl.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code SDSG100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20SDSG%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">SDS Global | 718.784.5586 | 337-18 57th Street | Woodside, NY |11377</font></td>
</tr>		
		
	</tbody>
</table>

';

                $headers .= 'From: SDS Global Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "SDSGlobal QuickQuote", $mailBody, $headers);
            }

            else if ( DomainManager::IsMMCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/MM/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="https://www.marylandmessenger.com/" style="text-decoration:none;" title="Maryland Messenger">
						<br>
						<img src="https://www.marylandmessenger.com/email/maryland_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="Maryland Messenger" alt="Maryland Messenger">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="https://www.marylandmessenger.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="https://www.marylandmessenger.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="https://www.marylandmessenger.com/new-account/" style="text-decoration:none; color: black;" title="New Account">
										New Account
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="https://www.marylandmessenger.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="https://www.marylandmessenger.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="https://www.marylandmessenger.com/new-account/">
											<img alt="Get $5 off" src="https://www.marylandmessenger.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="https://www.marylandmessenger.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="https://www.marylandmessenger.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="https://www.marylandmessenger.com/services/warehousing/">
									 		<img alt="Warehousing" src="https://www.marylandmessenger.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="https://www.marylandmessenger.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="https://www.marylandmessenger.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="https://www.marylandmessenger.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="https://www.marylandmessenger.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at marylandmessenger.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code MM100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20Maryland%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">Maryland Messenger | (410) 837-5550  | 3922 Vero Road, Suite D |Baltimore, MD | 21227</font></td>
</tr>
		
		
	</tbody>
</table>

';

                $headers .= 'From: Maryland Messenger Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "MMCourierService QuickQuote", $mailBody, $headers);
            }
            else if ( DomainManager::IsNYCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/NYC/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="http://newyorkcourierservice.com/" style="text-decoration:none;" title="New York Courier Service">
						<br>
						<img src="http://newyorkcourierservice.com/email/nyc_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="New York Courier Service" alt="New York Courier Service">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="http://newyorkcourierservice.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="http://newyorkcourierservice.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="http://newyorkcourierservice.com/new-account/" style="text-decoration:none; color: black;" title="New Account">
										New Account
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="http://newyorkcourierservice.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="http://newyorkcourierservice.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="http://newyorkcourierservice.com/new-account/">
											<img alt="Get $5 off" src="http://newyorkcourierservice.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="http://newyorkcourierservice.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="http://newyorkcourierservice.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="http://newyorkcourierservice.com/services/warehousing/">
									 		<img alt="Warehousing" src="http://newyorkcourierservice.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="http://newyorkcourierservice.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="http://newyorkcourierservice.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="http://newyorkcourierservice.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="http://newyorkcourierservice.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at newyorkcourierservice. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code NYC100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20NYC%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">Need It Now Courier | (800) 469-0929  | 37-18 57th St | Flushing NY |11377</font></td>
</tr>
		
		
	</tbody>
</table>


';

                $headers .= 'From: NYC Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "NYCCourierService QuickQuote", $mailBody, $headers);
            }

            else if ( DomainManager::IsSOSCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/SOS/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="http://soslogisticsus.com/" style="text-decoration:none;" title="SOS Logistics">
						<br>
						<img src="http://soslogisticsus.com/email/sos_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="SOS Logistics" alt="SOS Logistics">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="http://soslogisticsus.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="http://soslogisticsus.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="http://soslogisticsus.com/new-account/" style="text-decoration:none; color: black;" title="New Account">
										New Account
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="http://soslogisticsus.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="http://soslogisticsus.com/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="http://soslogisticsus.com/new-account/">
											<img alt="Get $5 off" src="http://soslogisticsus.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="http://soslogisticsus.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="http://soslogisticsus.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="http://soslogisticsus.com/services/warehousing/">
									 		<img alt="Warehousing" src="http://soslogisticsus.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="http://soslogisticsus.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="http://soslogisticsus.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="http://soslogisticsus.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="http://soslogisticsus.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at soslogisticsus.com. Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code SOS100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20SOS%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">SOS Logistics | (800) 507-7137   | 99 Jericho Tpke | Jericho NY | 11753</font></td>
</tr>
		
		
	</tbody>
</table>

';

                $headers .= 'From: SOS Logistics <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "SOSCourierService QuickQuote", $mailBody, $headers);
            }

 		else if ( DomainManager::IsNinCourierDomain() )
            {
                Solve360::Call("http://www.webicise.com/Solve360/NIN/QuickQuote/Solve360ContactSave.php", $params);

                $mailBody = '
<HTML><head><title>Save Time & Gas with $5 off</title></head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><table width="700" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr>
			<td width="700" align="center" valign="top">
			<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<a href="http://nindelivers.com/" style="text-decoration:none;" title="New York Courier Service">
						<br>
						<img src="http://newyorkcourierservice.com/email/nyc_banner.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;" width="700" height="70" title="New York Courier Service" alt="New York Courier Service">
						</a>
						</td>
					</tr>
					<tr>
						<td width="700" height="15"></td>
					</tr>
					<tr>
						<td>
						<table style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;" height="32" width="700">
							<tbody>
								<tr>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 14px;" width="90">
										<a href="http://nindelivers.com/quick-quote/" style="text-decoration:none; color: black;" title="Quick Quotes">
										Quick Quotes
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="90">
										<a href="http://newyorkcourierservice.com/services/" style="text-decoration:none; color: black;" title="Services">
										Services
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 0;" width="100">
										<a href="http://nindelivers.com/new-account/" style="text-decoration:none; color: black;" title="New Account">
										New Account
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding-top: 3px;" width="70">
										<a href="http://newyorkcourierservice.com/ship-now/" style="text-decoration:none; color: black;" title="Ship Now">
										Ship Now
										</a>
										</td>
										<td style="text-transform: uppercase;font-family: Helvetica;font-size: 12px;padding: 3px 0 0 18px;" width="90">
										<a href="http://nindelivers.com/company/contact/" style="text-decoration:none; color: black;" title="Contact Us">
										Contact Us
										</a>
										</td>
									</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<table style="margin-left: 0px;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td cellpadding="0" cellspacing="0" colspan="2">
										<a title="Get $5 off" href="http://nindelivers.com/new-account/">
											<img alt="Get $5 off" src="http://newyorkcourierservice.com/email/5off.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
										</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Rush Courier & On Demand" href="http://nindelivers.com/services/on-demand/">
									 		<img alt="Rush Courier & On Demand" src="http://newyorkcourierservice.com/email/rush.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="Warehousing" href="http://nindelivers.com/services/warehousing/">
									 		<img alt="Warehousing" src="http://newyorkcourierservice.com/email/warehousing.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>
								<tr>
									<td cellpadding="0" cellspacing="0" >
								 		<a title="Last Mile Home Delivery" href="http://nindelivers.com/services/last-mile-home-delivery/">
									 		<img alt="Last Mile Home Delivery" src="http://newyorkcourierservice.com/email/lastmile.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
									<td cellpadding="0" cellspacing="0"  >
								 		<a title="PRESCHEDULED ROUTED DELIVERY" href="http://nindelivers.com/services/routes/">
									 		<img alt="PRESCHEDULED ROUTED DELIVERY" src="http://newyorkcourierservice.com/email/prescheduled.png" style="color: rgb(0,0,0); text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;"/>
								 		</a>
									</td>
								</tr>

							</table>
						</td>
					</tr>
					
						<td width="233">
						
			</td>
		</tr>
		<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">
			<p>You recently requested a same day courier service quote at nindelivers.com Place an order for your
1st courier delivery within the next 7 days and get $5 off with the coupon code NIN100X.</p>

<p>If you place an order online; place the code in the reference field on the order form and $5.00 will be
deducted from the order before final charges. * Offer Expires in 30 days</p>

			</td>
		</tr>
<tr>
			<td style="text-align: center;font-family: Helvetica;font-size:11px;padding-top: 28px;">If you would like to unsubscribe and stop receiving these emails <a href="mailto:lisa@a1express.com?subject=unsubscribe%20to%20NIN%20Quick%20Quotes" style="color:rgb(17,85,204);">click here</a></td>
		</tr> 
<tr><td height="10"></td></tr> 
		<tr>
<td align="center" bgcolor="#fe0000"><font color="#FFFFFF" face="Arial" size="2">Need It Now Courier | (800) 469-0929  | 37-18 57th St | Flushing NY |11377</font></td>
</tr>
		
		
	</tbody>
</table>


';

                $headers .= 'From: NIN Courier Service <lisa@a1express.com>' . "\r\n";

                $r = mail($email, "NINCourierService QuickQuote", $mailBody, $headers);
            }

        }

        ?>

        <div class="boldRow">
            <div class="rowItemContent">
                <div class="rowItem col-md-12">
                    <?php
                    if ( !function_exists('parseTime') )
                    {
                    	function parseTime($time)
	                    {
	                        $pieces = explode(" ", $time);
	                        $pieces[1] = $pieces[1][0] . $pieces[1][1] . ":" . $pieces[1][2] . $pieces[1][3];

	                        return $pieces[0] . " " . $pieces[1];
	                    }
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
                                DomainManager::QQ_DEV2_USERNAME,
                                DomainManager::QQ_MM_USERNAME,
                                DomainManager::QQ_NY_USERNAME,
                                DomainManager::QQ_SD_USERNAME,
                                DomainManager::QQ_SOS_USERNAME,
				DomainManager::QQ_NIN_USERNAME,
				DomainManager::QQ_MANH_USERNAME
                            ),
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_PASSWORD,
                                DomainManager::QQ_PROF_PASSWORD,
                                DomainManager::QQ_EXPR_PASSWORD,
                                DomainManager::QQ_ASAP_PASSWORD,
                                DomainManager::QQ_DEV_PASSWORD,
                                DomainManager::QQ_DEV2_PASSWORD,
                                DomainManager::QQ_MM_PASSWORD,
                                DomainManager::QQ_NY_PASSWORD,
                                DomainManager::QQ_SD_PASSWORD,
                                DomainManager::QQ_SOS_PASSWORD,
				DomainManager::QQ_NIN_PASSWORD,
				DomainManager::QQ_MANH_PASSWORD
                            ),
                            DomainManager::GetVariable(
                                DomainManager::QQ_MANH_WEBSITE,
                                DomainManager::QQ_PROF_WEBSITE,
                                DomainManager::QQ_EXPR_WEBSITE,
                                DomainManager::QQ_ASAP_WEBSITE,
                                DomainManager::QQ_DEV_WEBSITE,
                                DomainManager::QQ_DEV2_WEBSITE,
                                DomainManager::QQ_MM_WEBSITE,
                                DomainManager::QQ_NY_WEBSITE,
                                DomainManager::QQ_SD_WEBSITE,
                                DomainManager::QQ_SOS_WEBSITE,
				DomainManager::QQ_NIN_WEBSITE,
				DomainManager::QQ_MANH_WEBSITE
                            )
                        );

                        if ( !function_exists('CallSoap') )
                        {
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
                                DomainManager::QQ_DEV2_WEBSITE,
                                DomainManager::QQ_MM_WEBSITE,
                                DomainManager::QQ_NY_WEBSITE,
                                DomainManager::QQ_SD_WEBSITE,
                                DomainManager::QQ_SOS_WEBSITE,
				DomainManager::QQ_NIN_WEBSITE,
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
                                DomainManager::QQ_DEV2_CUSTOMER,
                                DomainManager::QQ_MM_CUSTOMER,
                                DomainManager::QQ_NY_CUSTOMER,
                                DomainManager::QQ_SD_CUSTOMER,
                                DomainManager::QQ_SOS_CUSTOMER,
				DomainManager::QQ_NIN_CUSTOMER,
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

                        $hasResults = true;
                        $GLOBALS['has_results'] = true;
                    }
                    ?>

                    <?php if ( isset($orders) && !$isSpam2 ): ?>
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

        <?php if ($hasResults && isset($orders) && count( $orders ) > 0): ?>
            <div class="submit-buttons" style="margin-bottom: 20px;">
                <button class="submit-button" onclick="location.href='/ship-now/'" type="button">Ship Now</button>
                <button class="submit-button" onclick="location.href='/new-account/'" type="button">Create an Account</button>
            </div>
        <?php endif; ?>

        <div class="boldRow">
            <div class="rowItemContent">
                <div class="rowItem col-md-6">
                    <h3>GET AN INSTANT COURIER QUOTE</h3>
                    <?php get_template_part( 'a1x/templates/quick-quote-form' ); ?>
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

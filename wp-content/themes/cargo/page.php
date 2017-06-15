<?php get_header(); ?>

<!--<br/><br/><br/><br/><br/>-->
<?php //get_template_part( "a1x/templates/how-it-works" ); die(); ?>

<?php if ( get_queried_object_id() == DomainManager::GetVariable(1943, 2410, 1716, 1943) ): ?>
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD_YJPIOkLsYI2cDhnVwdMI1l6uHuvdd1k"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

	<style type="text/css">
		#qq-holder { padding: 50px 0px 200px; }
		#qq-holder form .formfield { margin-bottom: 30px; }
		#qq-holder form .formfield:after {
  			content: "";
  			display: table;
  			clear: both;
		}
		#qq-holder form .formfield .rows2 {
			float: left;
			width: 48%;
		}
		#qq-holder form .formfield .rows2:last-child { float: right; }
		#qq-holder form .formfield .rows3 {
			float: left;
			margin-right: 2%;
			width: 32%;
		}
		#qq-holder form .formfield .rows3:last-child { margin-right: 0px; }
		#qq-holder form .submit-button {  
			border: 0px none;
			-webkit-appearance: none;
			text-transform: uppercase;
			font-weight: 700;
			padding: 15px 20px;
			cursor: pointer;
			color: #fff;
			background: #272bf7;
			border-radius: 2px;
			border: 1px solid transparent;
			transition: all 300ms linear;
		}
		#qq-holder form .submit-button:hover {
			color: #272bf7;
			background: #fff;
			border: 1px solid #aaa;
			box-shadow: 0px 0px 5px #ccc;
		}

		.box-options {
			background: #fff;
			-webkit-transition: all 300ms ease-in-out;
			-o-transition: all 300ms ease-in-out;
			-moz-transition: all 300ms ease-in-out;
			transition: all 300ms ease-in-out;
			text-align: center;
			display: none !important;
		}
		.box-options.visible { overflow: visible; }
		.box-options .only { display: none; }
		.box-options.nationwide .not-nationwide { display: none; }
		.box-options.nationwide .only-nationwide { display: inline; }
		.box-options .is-popular {
			height: 40px;
			line-height: 32px;
			font-size: 20px;
			text-transform: uppercase;
			font-weight: bold;
			padding-left: 5px;
			margin: 0px auto;
			width: 195px;
		}
		.box-options .is-popular .popular {
			color: #fff;
			background: #049f87;
			padding-bottom: 8px;
		}
		.box-options a.btn {
			display: block;
			background: orange;
			padding: 10px;
			margin-bottom: 5px;
			border-radius: 5px;
			line-height: 18px;
			font-weight: bold;
			font-size: 16px;
			text-decoration: none;
			color: #fff;
		}
		.box-options .price {
			font-size: 32px;
			margin-bottom: 10px;
		}
		.box-options .price small { font-size: 12px; }
		.box-options .bottom-note {
			margin-bottom: 15px;
			color: #999;
			font-size: 12px;
		}
		.box-options .wrap { 
			overflow: visible; 
			display: inline-block;
			padding: 0px 0px 40px;
		}
		.box-options article {
			color: #333;
			float: left;
			text-align: center;
			box-shadow: 0px 0px 2px #fff;
			width: 264px;
			font-size: 12px;
			padding-top: 10px;
			-webkit-box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    box-sizing: border-box;
			margin-bottom: 40px;
		}		
		.box-options article.visible { overflow: visible; }
		.box-options article .info-tooltip {
			position: relative;
			cursor: pointer;
		}
		.box-options article .info-tooltip .label {
			color: #fff;
			text-align: center;
			text-decoration: underline;
		}
		.box-options article .info-tooltip .tooltip-holder {
			position: absolute;
			padding-bottom: 30px;
			display: none;
			left: -20px;
			right: -20px;
			bottom: 0px;
		}
		.box-options article .info-tooltip:hover .tooltip-holder { display: block; }
		.box-options article .info-tooltip .tooltip {
			color: #fff;
			padding: 15px;
			text-align: left;
			background: rgba(0,0,0,0.9);
			border-radius: 5px 10px;
			line-height: 1.2;
		}
		.box-options article .info-tooltip .tooltip p { margin: 5px; }
		.box-options article .info-tooltip .tooltip strong { 
			font-weight: bold; 
			color: orange;
		}
		.box-options .box-arrow { 
			border-color: #333;
			color: #333;
			margin-top: 15px; 
		}
		.box-options article section { 
			background: #fff;
			border: 1px solid #e7e7e7;
			border-radius: 10px;
			padding: 0px 30px 30px; 	
		}
		.box-options article .ribbon {	
			background: url(/wp-content/themes/cargo/img/badges.png) -200px top no-repeat;
			margin-top: -10px;
			padding-top: 20px;
			margin-bottom: 20px;
			box-sizing: content-box;
			height: 84px;
		}
		.box-options article:nth-child(2) .ribbon { background-position: -200px -220px; }
		.box-options article:nth-child(3) .ribbon { background-position: -200px -330px; }
		.box-options article h3 {
			font-size: 26px;
			color: #fff;
			line-height: 28px;
			margin: 0px 0px 5px;
		}
		.box-options article h4 {
			font-size: 18px;
			margin: 0px 0px 15px;
			font-weight: bold;
		}
		.box-options article figure {
			margin: 0px 0px 20px;
			height: 200px;
			border-radius: 10px;
			overflow: hidden;
			line-height: 200px;
			text-align: center;
			background: #fff;
		}
		.box-options article figure img {
			max-width: 100%;
			vertical-align: middle;
			max-height: 100%;
		}
		.box-options article footer {
			background: #ccc;
			max-height: 0px;
			overflow: hidden;
			font-size: 11px;
			color: #333;
			-webkit-transition: all 300ms ease-in-out;
			-o-transition: all 300ms ease-in-out;
			-moz-transition: all 300ms ease-in-out;
			transition: all 300ms ease-in-out;
		}
		.box-options article footer .inside { padding: 20px 30px; }
		.box-options article footer.expanded { max-height: 400px; }
		.box-options .note {

			color: #000;
			clear: both;
			margin: 0px auto;
			font-size: 16px;
			line-height: 1.4;
			text-align: center;
			width: 600px;
		}
		.box-options .note a { color: #000; }
	</style>

	<script type="text/javascript">
		var atlanta = new google.maps.LatLng(40.7590402,-74.0394423);

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
						address = atlanta.toString().replace("(", "").replace(")", "");
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
						center: atlanta
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
						$solve360Url = "http://www.webicise.com/Solve360/Manhattan/QuickQuote/Solve360ContactSave.php" . $params;

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $solve360Url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_exec($ch);
						curl_close($ch);

						$mailBody = "<HTML><head></head><body><table width=800>";
						$mailBody .= "<tr><td valign=top><img src='https://www.manhattancourierservice.com/wp-content/themes/cargo/img/Manhattan_Courier_Logo.png' alt='manhattancourierservice.com'></td></tr>";
						$mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='https://www.manhattancourierservice.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://www.manhattancourierservice.com/new-account/' title='Order Now'>ORDER NOW</a> | <a href='hhttps://www.manhattancourierservice.com' title='About us'>ABOUT US</a> | <a href='https://www.manhattancourierservice.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
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
						$solve360Url = "http://www.webicise.com/Solve360/Proficient/QuickQuote/Solve360ContactSave.php" . $params;

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $solve360Url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_exec($ch);
						curl_close($ch);

						$mailBody = "<HTML><head></head><body><table width=800>";
						$mailBody .= "<tr><td valign=top><img src='https://www.proficientlogistic.com/wp-content/themes/cargo/img/Proficient_Logistic_Logo.png' alt='proficientlogistic.com'></td></tr>";
						$mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='https://www.proficientlogistic.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='https://www.proficientlogistic.com/order-form/' title='Order Now'>ORDER NOW</a> | <a href='https://www.proficientlogistic.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
						$mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
						$mailBody .= "<tr align=center><td valign=top><a href='https://www.proficientlogistic.com/order-form/' title='Order Now'><img src='https://www.proficientlogistic.com/wp-content/themes/cargo/img/Proficient_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
						$mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at proficientlogistic.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code PL100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
						$mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Proficient Logistic| (859) 300-3880 | 351 United Court | Lexington KY | 40509 </font></td valign=right><td></td></tr></table></td></tr>";
						$mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20Proficient%20QuickQuotes>click here</a></td></tr>";
						$mailBody .= "</td></tr></table></body></html>";

						$headers .= 'From: Proficient Logistic <lisa@a1express.com>' . "\r\n";

						$r = mail($email, "ProficientLogistic QuickQuote", $mailBody, $headers);
					}
					else if ( DomainManager::IsExpressWayCourierDomain() )
					{
						$solve360Url = "http://www.webicise.com/Solve360/ExpressWay/QuickQuote/Solve360ContactSave.php" . $params;

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $solve360Url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_exec($ch);
						curl_close($ch);

						$mailBody = "<HTML><head></head><body><table width=800>";
						$mailBody .= "<tr><td valign=top><img src='http://www.expresswaycourier.com/wp-content/themes/cargo/img/Expressway_Logo.png' alt='expresswaycourier.com'></td></tr>";
						$mailBody .= "<tr><td><table width='100%'><tr align=center><td valign=top><a href='http://expresswaycourier.com/quick-quote/' title='Quick Quote'>QUICK QUOTE</a> | <a href='http://expresswaycourier.com/order-now/' title='Order Now'>ORDER NOW</a> | <a href='http://expresswaycourier.com/about-us/' title='About us'>ABOUT US</a> | <a href='http://expresswaycourier.com/services/' title='Services'>SERVICES</a></td></tr></table></td></tr>";
						$mailBody .= "<tr align=center><td valign=top><font color=#50A21E size=8>Save Time & Gas</font></td></tr>";
						$mailBody .= "<tr align=center><td valign=top><a href='http://expresswaycourier.com/order-now/' title='Order Now'><img src='http://www.expresswaycourier.com/wp-content/themes/cargo/img/Expressway_Special.png' border=0 alt='Order Now and get $5.00 off'></a></td></tr>";
						$mailBody .= "<tr align=center><td><font color=#50A21E>You recently requested a same day courier service quote at expresswaycourier.com.  Place an order for your<br>1st courier delivery within the next 7 days and get $5 off with the coupon code EW100X.<br><br>If you place an order online; place the code in the reference field on the order form and $5.00 will be<br>deducted from the order before final charges.</font></td></tr>";
						$mailBody .= "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Expressway Courier Service | (800) 955-1755 | 36 Mill Plain Road, Suite 407 | Danbury, CT| 06811</font></td valign=right><td></td></tr></table></td></tr>";
						$mailBody .= "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:lisa@a1express.com?subject=Unsubscribe%20to%20Expressway%20QuickQuotes>click here</a></td></tr>";
						$mailBody .= "</td></tr></table></body></html>";

						$headers .= 'From: Expressway Courier Service <lisa@a1express.com>' . "\r\n";

						$r = mail($email, "ExpresswayCourierService QuickQuote", $mailBody, $headers);
					}
				}
			?>

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
					   		<button class="submit-button">Get Quote</button>
                                                        <button class="submit-button" onclick="location.href='/new-account/'" type="button">Ship Now</button>
					  	</form>
				  	</div>	
			  	</div>	

			  	<div class="rowItem col-md-6">
			  		<div class="rowItemContent">
						<div id="map_canvas" style="width: 100%; height:380px; border: 0px none;"></div>
			  		</div>
			  	</div>
		  	</div>

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
								$xml_post_string = '<SOAP:Envelope xmlns:SOAP="https://schemas.xmlsoap.org/soap/envelope/">
														<SOAP:Body>
															<m:Login xmlns:m="https://www.e-courier.com/software/schema/public/" UserName="remote" Password="remotequote" HttpReferer
							="/courier/quickquote.asp" LoginMode="Public" WebSite="a1express"/>
														</SOAP:Body>
													</SOAP:Envelope>
													';

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
																	<m:QuoteOrder xmlns:m="https://www.e-courier.com/schemas/" WebSite="a1express">
																		<m:Order Weight="%s" Pieces="%s" VehicleTypeID="%s" CustomerCode="A1XQUOTE">
																			<Stops>
																				<Stop Sequence="1" Zip="%s" ScheduledDateTime ="%s %s %s"/>
																				<Stop Sequence="2" Zip="%s"/>
																			</Stops>
																		</m:Order>
																	</m:QuoteOrder>
																</SOAP:Body >
															</SOAP:Envelope>', $guid, $weight, $pieces, $vehicle, $origin, $date, $time, $ampm, $destination);

								$parser = CallSoap($xml_post_string);
								$orders = isset($parser->SOAPBody->mQuoteOrderResponse->Order) ? $parser->SOAPBody->mQuoteOrderResponse->Order : array();
							}		
						?>

						<?php if ( isset($orders) ): ?>
							<br/><br/>

							<?php if ( count( $orders ) == 0 ): ?>
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
							<?php else: ?>
								<table>
									<tr>
										<th>Service</th>
										<th>Description</th>
										<th>ReadyDateTime</th>
										<th>DueDateTime</th>
										<th>AmountCharged</th>
									</tr>

									<?php foreach( $orders as $order ): ?>
										<?php $orderAttrs = $order->attributes(); ?>
										<tr>
											<td><?php echo $orderAttrs->Service->__toString(); ?></td>
											<td><?php echo $orderAttrs->Description->__toString(); ?></td>
											<td><?php echo parseTime($orderAttrs->ReadyDateTime->__toString()); ?></td>
											<td><?php echo parseTime($orderAttrs->DueDateTime->__toString()); ?></td>
											<td><?php echo $orderAttrs->AmountCharged->__toString(); ?></td>
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
			
	  	</div>	
	</div>
<?php endif; ?>

<?php

the_post();

the_content();

if ( comments_open() || get_comments_number() ) {
	echo '<section class="boldSection btComments gutter topSpaced bottomSpaced">';
		echo '<div class="port">';
			echo '<div class="boldCell">';
				echo '<div class="boldRow">';
					echo '<div class="rowItem col-md-12 col-ms-12  btTextLeft animate-fadein animate">';
						comments_template();
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>';
}

get_footer(); 
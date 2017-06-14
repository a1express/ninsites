<?php

get_header();

?>

<?php if ( get_queried_object_id() == 1943 ): ?>
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
			$vehicle = isset($_POST['jumpMenu2']) && trim($_POST['jumpMenu2']) != '' ? $_POST['jumpMenu2'] : 1;

			?>

			<div class="boldRow">
				<div class="rowItemContent">
					<div class="rowItem col-md-6">
			    		<h3>GET AN INSTANT COURIER QUOTE IN ANY CITY</h3>
					   	<form method="post" name="quickquote" action="">
							<div class="formfield mention">
					            <label>* Required fields</label>
					        </div>
					        <div class="formfield">
					            <div class="rows2">
					                <label>*Origin ZIP</label>
					                <input class="text" name="origin" value="<?php echo isset($_POST['origin']) ? $_POST['origin'] : ''; ?>" id="input-origin" type="text" />
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
					                <input type="text" id="datepicker" />
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
							        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
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
								$guid = isset($parser->SOAPBody->mLoginResponse[0]->attributes()->UserGUID) ? $parser->SOAPBody->mLoginResponse[0]->attributes()->UserGUID->__toString() : '';

								$xml_post_string = sprintf('<SOAP:Envelope xmlns:SOAP="https://schemas.xmlsoap.org/soap/envelope/">
																<SOAP:Body UserGUID="%s">
																	<m:QuoteOrder xmlns:m="https://www.e-courier.com/schemas/" WebSite="a1express">
																		<m:Order Weight="1" Pieces="1" VehicleTypeID="%s" CustomerCode="15558">
																			<Stops>
																				<Stop Sequence="1" Zip="%s" ScheduledDateTime ="06/05/2017 09:41 AM"/>
																				<Stop Sequence="2" Zip="%s"/>
																			</Stops>
																		</m:Order>
																	</m:QuoteOrder>
																</SOAP:Body >
															</SOAP:Envelope>', $guid, $vehicle, $origin, $destination);

								$parser = CallSoap($xml_post_string);
								$orders = isset($parser->SOAPBody->mQuoteOrderResponse->Order) ? $parser->SOAPBody->mQuoteOrderResponse->Order : array();
							}		
						?>

						<?php if ( isset($orders) ): ?>
							<br/><br/>
							<table>
								<tr>
									<th>Service</th>
									<th>Description</th>
									<th>ReadyDateTime</th>
									<th>DueDateTime</th>
									<th>AmountCharged</th>
								</tr>
								<?php if ( isset($orders[0]) ): ?>
									<tr>
										<td><?php echo $orders[0]->attributes()->Service->__toString(); ?></td>
										<td><?php echo $orders[0]->attributes()->Description->__toString(); ?></td>
										<td><?php echo parseTime($orders[0]->attributes()->ReadyDateTime->__toString()); ?></td>
										<td><?php echo parseTime($orders[0]->attributes()->DueDateTime->__toString()); ?></td>
										<td><?php echo $orders[0]->attributes()->AmountCharged->__toString(); ?></td>
									</tr>
								<?php endif; ?>	
								<?php if ( isset($orders[1]) ): ?>
									<tr>
										<td><?php echo $orders[1]->attributes()->Service->__toString(); ?></td>
										<td><?php echo $orders[1]->attributes()->Description->__toString(); ?></td>
										<td><?php echo parseTime($orders[1]->attributes()->ReadyDateTime->__toString()); ?></td>
										<td><?php echo parseTime($orders[1]->attributes()->DueDateTime->__toString()); ?></td>
										<td><?php echo $orders[1]->attributes()->AmountCharged->__toString(); ?></td>
									</tr>
								<?php endif; ?>	
								<?php if ( isset($orders[2]) ): ?>
									<tr>
										<td><?php echo $orders[2]->attributes()->Service->__toString(); ?></td>
										<td><?php echo $orders[2]->attributes()->Description->__toString(); ?></td>
										<td><?php echo parseTime($orders[2]->attributes()->ReadyDateTime->__toString()); ?></td>
										<td><?php echo parseTime($orders[2]->attributes()->DueDateTime->__toString()); ?></td>
										<td><?php echo $orders[2]->attributes()->AmountCharged->__toString(); ?></td>
									</tr>
								<?php endif; ?>	
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
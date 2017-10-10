<?php /* Template name: WEX Quick Quote */ ?>

<?php get_header(); ?>

<?php $hasResults = false; ?>


<script type="text/javascript">

	(function($) {
		$(document).ready(function(){
			$.ajax({
				'url': '<?php echo get_template_directory_uri(); ?>/quote.asp',
				'type': 'POST',
				'data': {
					'FromAddress2': '555 11th St NW',
					'FromZIP2': '20004',
					'ToAddress2': '4445 Willard Ave',
					'ToZIP2': '20815',
					'fweight': '2',
					'fpieces': '2',
					'jumpMenu3': '1',
					'jumpMenu2': '0',
					'jumpMenu33': '1',
					'jumpMenu22': '0',
					'EmailAddress': '',
					'external': '1',
					'TAG': 'Case'
				}
			});

		});
	})( jQuery );
</script>

<div class="qq-holder gutter">
	<div class="port">
		<?php
		$origin = isset($_POST['origin']) && trim($_POST['origin']) != '' ? $_POST['origin'] : 30301;

		$destination = isset($_POST['destination']) && trim($_POST['destination']) != '' ? $_POST['destination'] : 30303;

		$pieces = isset($_POST['pieces']) && trim($_POST['pieces']) != '' ? $_POST['pieces'] : 1;
		$weight = isset($_POST['weight']) && trim($_POST['weight']) != '' ? $_POST['weight'] : 1;

		$vehicle = isset($_POST['jumpMenu2']) && trim($_POST['jumpMenu2']) != '' ? $_POST['jumpMenu2'] : 1;

		$email = isset($_POST['email']) && trim($_POST['email']) != '' ? $_POST['email'] : '';

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

					<?php global $qq_redirect_url, $qq_scripts_loaded, $has_results; ?>

					<?php if (!$qq_scripts_loaded): ?>
						<?php $GLOBALS['qq_scripts_loaded'] = true; ?>
						<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD_YJPIOkLsYI2cDhnVwdMI1l6uHuvdd1k"></script>
						<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
						<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/quick-quote.js"></script>
						<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

						<script type="text/javascript">
							var defaultOrigin = new google.maps.LatLng(39.0581388,-76.8999811);
						</script>
					<?php endif; ?>

					<form method="post" name="quickquote" action="<?php echo isset($qq_redirect_url) && !is_null($qq_redirect_url) ? $qq_redirect_url : ''; ?>">
						<div class="formfield mention">
							<label>* Required fields</label>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*From (Street Address)</label>
								<input class="text input-origin" name="origin" value="<?php echo isset($_POST['origin']) ? trim($_POST['origin']) : ( isset($_GET['origin']) ? trim($_GET['origin']) : '' ); ?>" type="text" />
							</div>
							<div class="rows2">
								<label>*From (Zip)</label>
								<input class="text input-destination" name="destination" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : ''; ?>" type="text" />
							</div>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*To (Street Address)</label>
								<input class="text input-origin" name="origin" value="<?php echo isset($_POST['origin']) ? trim($_POST['origin']) : ( isset($_GET['origin']) ? trim($_GET['origin']) : '' ); ?>" type="text" />
							</div>
							<div class="rows2">
								<label>*To (Zip)</label>
								<input class="text input-destination" name="destination" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : ''; ?>" type="text" />
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
							<div class="rows2">
								<label>Vehicle/Service Type</label>
								<select name="jumpMenu2" class="jumpMenu2">
									<option value="1" <?php echo isset($vehicle) && $vehicle == '1' ? 'selected="selected"': ''; ?>>Any Vehicle</option>
									<option value="4" <?php echo isset($vehicle) && $vehicle == '4' ? 'selected="selected"': ''; ?>>Car</option>
									<option value="7" <?php echo isset($vehicle) && $vehicle == '7' ? 'selected="selected"': ''; ?>>Sm Cov P/U/Mini Van</option>
									<option value="15" <?php echo isset($vehicle) && $vehicle == '15' ? 'selected="selected"': ''; ?>>Cargo Van</option>
									<option value="30" <?php echo isset($vehicle) && $vehicle == '30' ? 'selected="selected"': ''; ?>>24ft Strt Truck</option>
									<option value="3" <?php echo isset($vehicle) && $vehicle == '3' ? 'selected="selected"': ''; ?>>Bike (Limited)</option>
								</select>
							</div>
							<div class="rows2">
								<label>Vehicle/Service Type</label>
								<select name="jumpMenu2" class="jumpMenu2">
									<option value="1" <?php echo isset($vehicle) && $vehicle == '1' ? 'selected="selected"': ''; ?>>Any Vehicle</option>
									<option value="4" <?php echo isset($vehicle) && $vehicle == '4' ? 'selected="selected"': ''; ?>>Car</option>
									<option value="7" <?php echo isset($vehicle) && $vehicle == '7' ? 'selected="selected"': ''; ?>>Sm Cov P/U/Mini Van</option>
									<option value="15" <?php echo isset($vehicle) && $vehicle == '15' ? 'selected="selected"': ''; ?>>Cargo Van</option>
									<option value="30" <?php echo isset($vehicle) && $vehicle == '30' ? 'selected="selected"': ''; ?>>24ft Strt Truck</option>
									<option value="3" <?php echo isset($vehicle) && $vehicle == '3' ? 'selected="selected"': ''; ?>>Bike (Limited)</option>
								</select>
							</div>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>E-mail Address</label>
								<input class="text" name="email" value="" type="text" />
							</div>
							<div class="rows2"></div>
						</div>

						<div class="submit-buttons">
							<button class="submit-button1">Get Quote</button>
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

<?php get_footer(); ?>

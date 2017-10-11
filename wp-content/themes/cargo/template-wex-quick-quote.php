<?php /* Template name: WEX Quick Quote */ ?>

<?php get_header(); ?>

<?php $hasResults = false; ?>

<?php /*
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
 */ ?>

<div class="qq-holder gutter">
	<div class="port">
		<div class="boldRow">
			<div class="rowItemContent">
				<div class="rowItem col-md-12">
					<?php
						if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
						{
							$ch = curl_init();
							curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//							$params = array(
//								'FromAddress2' => '555 11th St NW',
//								'FromZIP2' => '20004',
//								'ToAddress2' => '4445 Willard Ave',
//								'ToZIP2' => '20815',
//								'fweight' => '2',
//								'fpieces' => '2',
//								'jumpMenu3' => '1',
//								'jumpMenu2' => '0',
//								'jumpMenu33' => '1',
//								'jumpMenu22' => '0',
//								'EmailAddress' => '',
//								'external' => '1',
//								'TAG' => 'Case'
//							);

							$params = $_POST;

//							print_r($params);
//							die();

							curl_setopt($ch, CURLOPT_URL, "http://washingtonexpress.com/services/quote.asp");
							curl_setopt($ch,CURLOPT_POST, true);
							curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));

							$result = curl_exec($ch);

							$result = substr($result, strpos($result, '<h3>Your Price Quote'));
							$result = substr($result, 0, strpos($result, '<p><a href="prices.asp">Get Another Quote</a></p>'));

							echo $result;

							$hasResults = true;
						}
					?>
				</div>
			</div>
		</div>

		<?php if ($hasResults): ?>
			<style type="text/css">
				.row { display: block; }
			</style>

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
						<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/quick-quote.js?t=<?php echo time(); ?>"></script>
						<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

						<script type="text/javascript">
							var defaultOrigin = new google.maps.LatLng(39.0581388,-76.8999811);
						</script>
					<?php endif; ?>

					<form method="post" name="quickquote" class="wex" action="<?php echo isset($qq_redirect_url) && !is_null($qq_redirect_url) ? $qq_redirect_url : ''; ?>">
						<div class="formfield mention">
							<label>* Required fields</label>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*From (Street Address)</label>
								<input class="text input-origin" name="FromAddress2" value="<?php echo isset($_POST['FromAddress2']) ? trim($_POST['FromAddress2']) : ( isset($_GET['FromAddress2']) ? trim($_GET['FromAddress2']) : '' ); ?>" type="text" />
							</div>
							<div class="rows2">
								<label>*From (Zip)</label>
								<input class="text input-destination" name="FromZIP2" value="<?php echo isset($_POST['FromZIP2']) ? $_POST['FromZIP2'] : ''; ?>" type="text" />
							</div>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*To (Street Address)</label>
								<input class="text input-origin" name="ToAddress2" value="<?php echo isset($_POST['ToAddress2']) ? trim($_POST['ToAddress2']) : ( isset($_GET['ToAddress2']) ? trim($_GET['ToAddress2']) : '' ); ?>" type="text" />
							</div>
							<div class="rows2">
								<label>*To (Zip)</label>
								<input class="text input-destination" name="ToZIP2" value="<?php echo isset($_POST['ToZIP2']) ? $_POST['ToZIP2'] : ''; ?>" type="text" />
							</div>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*No. of  pieces</label>
								<input class="text" name="fpieces" value="1" type="text" />
							</div>
							<div class="rows2">
								<label>*Weight (LBS)</label>
								<input class="text" name="fweight" value="1" type="text" />
							</div>
						</div>
						<div class="formfield">
							<div class="rows2">
								<label>*Package Type</label>
								<select name="jumpMenu3" onchange="$('input[name=jumpMenu2]').val( $('select[name=jumpMenu3]').val() );">
									<option value="1" <?php echo isset($jumpMenu3) && $jumpMenu3 == '1' ? 'selected="selected"' : ''; ?>>Envelope</option>
									<option value="2" <?php echo isset($jumpMenu3) && $jumpMenu3 == '2' ? 'selected="selected"' : ''; ?>>Mailbag/Tub</option>
									<option value="3" <?php echo isset($jumpMenu3) && $jumpMenu3 == '3' ? 'selected="selected"' : ''; ?>>Roll</option>
									<option value="4" <?php echo isset($jumpMenu3) && $jumpMenu3 == '4' ? 'selected="selected"' : ''; ?>>Transfile box</option>
									<option value="5" <?php echo isset($jumpMenu3) && $jumpMenu3 == '5' ? 'selected="selected"' : ''; ?>>Trunk</option>
									<option value="6" <?php echo isset($jumpMenu3) && $jumpMenu3 == '6' ? 'selected="selected"' : ''; ?>>Xerox box</option>
									<option value="7" <?php echo isset($jumpMenu3) && $jumpMenu3 == '7' ? 'selected="selected"' : ''; ?>>Large Package</option>
									<option value="8" <?php echo isset($jumpMenu3) && $jumpMenu3 == '8' ? 'selected="selected"' : ''; ?>>Book</option>
								</select>
							</div>
							<div class="rows2">
								<label>*Vehicle Type</label>
								<select name="jumpMenu33" onchange="$('input[name=jumpMenu22]').val( $('select[name=jumpMenu33]').val() );">
									<option value="1" <?php echo isset($jumpMenu3) && $jumpMenu3 == '1' ? 'selected="selected"': ''; ?>>Bike</option>
									<option value="2" <?php echo isset($jumpMenu3) && $jumpMenu3 == '2' ? 'selected="selected"': ''; ?>>Car</option>
									<option value="3" <?php echo isset($jumpMenu3) && $jumpMenu3 == '3' ? 'selected="selected"': ''; ?>>Van</option>
									<option value="4" <?php echo isset($jumpMenu3) && $jumpMenu3 == '4' ? 'selected="selected"': ''; ?>>Truck</option>
								</select>
							</div>
						</div>

						<input type="hidden" name="jumpMenu2" value="1" />
						<input type="hidden" name="jumpMenu22" value="1" />

						<div class="formfield">
							<div class="rows2">
								<label>E-mail Address</label>
								<input class="text" name="EmailAddress" value="" type="text" />
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

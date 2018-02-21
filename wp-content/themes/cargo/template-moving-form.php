<?php /* Template Name: Moving Form */ ?>

<?php get_header(); ?>

<section class="boldSection topSpaced bottomSpaced gutter inherit">
	<div class="port">
		<div class="boldCell">
			<div class="boldCellInner">
				<?php
					$us_states = array(
						'AL' => "Alabama",
						'AK' => "Alaska",
						'AZ' => "Arizona",
						'AR' => "Arkansas",
						'CA' => "California",
						'CO' => "Colorado",
						'CT' => "Connecticut",
						'DE' => "Delaware",
						'DC' => "District Of Columbia",
						'FL' => "Florida",
						'GA' => "Georgia",
						'HI' => "Hawaii",
						'ID' => "Idaho",
						'IL' => "Illinois",
						'IN' => "Indiana",
						'IA' => "Iowa",
						'KS' => "Kansas",
						'KY' => "Kentucky",
						'LA' => "Louisiana",
						'ME' => "Maine",
						'MD' => "Maryland",
						'MA' => "Massachusetts",
						'MI' => "Michigan",
						'MN' => "Minnesota",
						'MS' => "Mississippi",
						'MO' => "Missouri",
						'MT' => "Montana",
						'NE' => "Nebraska",
						'NV' => "Nevada",
						'NH' => "New Hampshire",
						'NJ' => "New Jersey",
						'NM' => "New Mexico",
						'NY' => "New York",
						'NC' => "North Carolina",
						'ND' => "North Dakota",
						'OH' => "Ohio",
						'OK' => "Oklahoma",
						'OR' => "Oregon",
						'PA' => "Pennsylvania",
						'RI' => "Rhode Island",
						'SC' => "South Carolina",
						'SD' => "South Dakota",
						'TN' => "Tennessee",
						'TX' => "Texas",
						'UT' => "Utah",
						'VT' => "Vermont",
						'VA' => "Virginia",
						'WA' => "Washington",
						'WV' => "West Virginia",
						'WI' => "Wisconsin",
						'WY' => "Wyoming"
					);

					$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
					$last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
					$email = isset($_POST['email']) ? trim($_POST['email']) : '';
					$company_name = isset($_POST['company_name']) ? trim($_POST['company_name']) : '';
					$phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';

					$origin_street = isset($_POST['origin_street']) ? trim($_POST['origin_street']) : '';
					$origin_city = isset($_POST['origin_city']) ? trim($_POST['origin_city']) : '';
					$origin_state = isset($_POST['origin_state']) ? trim($_POST['origin_state']) : '';
					$origin_zip = isset($_POST['origin_zip']) ? trim($_POST['origin_zip']) : '';

					$destination_street = isset($_POST['destination_street']) ? trim($_POST['destination_street']) : '';
					$destination_city = isset($_POST['destination_city']) ? trim($_POST['destination_city']) : '';
					$destination_state = isset($_POST['destination_state']) ? trim($_POST['destination_state']) : '';
					$destination_zip = isset($_POST['destination_zip']) ? trim($_POST['destination_zip']) : '';

					$employees = isset($_POST['employees']) ? trim($_POST['employees']) : '';
					$description = isset($_POST['description']) ? trim($_POST['description']) : '';

					$post = !empty($_POST);
					$error = $post && filter_var($email, FILTER_VALIDATE_EMAIL) === false;
					$success = false;

					if ( $post && !$error )
					{
						$to = "info@washingtonexpress.com";
						$subject = "Move Estimator message";
						$txt = "First Name: " . $first_name . "\n";
						$txt .= "Last Name: " . $last_name . "\n";
						$txt .= "Company Name: " . $company_name . "\n";
						$txt .= "Email: " . $email . "\n";
						$txt .= "Phone Number: " . $phone_number . "\n";

						$txt .= "Origin Street: " . $origin_street . "\n";
						$txt .= "Origin City: " . $origin_city . "\n";
						$txt .= "Origin State: " . $origin_state . "\n";
						$txt .= "Origin Zip: " . $origin_zip . "\n";

						$txt .= "Destination Street: " . $destination_street . "\n";
						$txt .= "Destination City: " . $destination_city . "\n";
						$txt .= "Destination State: " . $destination_state . "\n";
						$txt .= "Destination Zip: " . $destination_zip . "\n";

						$txt .= "Employees: " . $employees . "\n";
						$txt .= "Description: " . $description . "\n";

						$headers = "From: noreply@washingtonexpress.com";

						$success = mail($to, $subject, $txt, $headers);
					}
				?>

				<div id="main" class="single about">
					<h3>Move Estimator</h3>

					<?php if ($success): ?>
						<h4>Thank you for your inquiry. One of our freight and move coordinators will be in touch with you shortly. For immediate attention, please contact us at 301-210-0991.</h4>
					<?php else: ?>

						<h4>Fill out the form below to get a free quote</h4>
						<p>We can assist with:</p>
						<ul>
							<li>Office moves including furniture, art, IT equipment, etc</li>
							<li>Convention and conference material moves</li>
							<li>Internal office moving</li>
							<li>Trial site materials</li>
							<li>Garbage hauling and recycling</li>
							<li>You name it, we will move it!</li>
						</ul>

						<form action="" class="go-form" method="post" novalidate="novalidate">
							<?php if ($error): ?>
								<p class="error">Please enter a valid email address.</p>
							<?php endif; ?>

							<span>&nbsp;</span>
							<h4>Move Estimator</h4>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>First Name*</label>
										<input type="text" name="first_name" class="full-width" value="<?php echo $first_name; ?>" />
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Last Name*</label>
										<input type="text" name="last_name" class="full-width" value="<?php echo $last_name; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Company Name*</label>
										<input type="text" name="company_name" class="full-width" value="<?php echo $company_name; ?>" />
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Phone Number</label>
										<input type="tel" name="phone_number" class="full-width" value="<?php echo $phone_number; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Email*</label>
										<input type="email" name="email" class="full-width" value="<?php echo $email; ?>" />
									</div>
								</div>
								<div class="general-column"></div>
							</div>

							<h4>Tell us about your move</h4>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Move Date*</label>
										<input type="text" id="date" name="move_date" class="full-width" value="<?php echo $move_date; ?>" />
									</div>
								</div>
								<div class="general-column"></div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Moving From Street Address</label>
										<input type="text" name="origin_street" class="full-width" value="<?php echo $origin_street; ?>" />
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Moving From City</label>
										<input type="text" name="origin_city" class="full-width" value="<?php echo $origin_city; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Moving From State</label>
										<select name="origin_state" class="full-width no-fancy">
											<?php foreach($us_states as $us_state): ?>
												<option value="<?php echo $us_state; ?>"><?php echo $us_state; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Moving From Zip Code</label>
										<input type="text" name="origin_zip" class="full-width" value="<?php echo $origin_zip; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Moving To Street Address</label>
										<input type="text" name="destination_street" class="full-width" value="<?php echo $destination_street; ?>" />
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Moving To City</label>
										<input type="text" name="destination_city" class="full-width" value="<?php echo $destination_city; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Moving To State/Region</label>
										<select name="destination_state" class="full-width no-fancy">
											<?php foreach($us_states as $us_state): ?>
												<option value="<?php echo $us_state; ?>"><?php echo $us_state; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Moving To Postal Code</label>
										<input type="text" name="destination_zip" class="full-width" value="<?php echo $destination_zip; ?>" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Number of Employees Being Moved</label>
										<input type="text" name="employees" class="full-width" value="<?php echo $employees; ?>" />
									</div>
								</div>
								<div class="general-column">
									<div class="formfield">
										<label>Photos of Items Being Moved (if available)</label>
										<input type="file" class="full-width" />
									</div>
								</div>
							</div>

							<div class="general-layout">
								<div class="general-column">
									<div class="formfield">
										<label>Description of Items Being Moved*</label>
										<textarea name="description" class="full-width"><?php echo $description; ?></textarea>
									</div>
								</div>
								<div class="general-column"></div>
							</div>

							<div class="submit">
								<button>Submit</button>
							</div>
						</form>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

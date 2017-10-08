<?php /* Template Name: Premerger Filing Tips */ ?>

<?php get_header(); ?>

<section class="boldSection topSpaced bottomSpaced gutter inherit">
	<div class="port">
		<div class="boldCell">
			<div class="boldCellInner">

				<?php
					$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
					$last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
					$email = isset($_POST['email']) ? trim($_POST['email']) : '';
					$company_name = isset($_POST['company_name']) ? trim($_POST['company_name']) : '';
					$job_title = isset($_POST['job_title']) ? trim($_POST['job_title']) : '';
					$filling_frequency = isset($_POST['filling_frequency']) ? trim($_POST['filling_frequency']) : '';

					$post = !empty($_POST);
					$error = $post && filter_var($email, FILTER_VALIDATE_EMAIL) === false;
					$success = false;

					if ( $post && !$error )
					{
						$to = "info@washingtonexpress.com";
						$subject = "Premerger filing tip message";
						$txt = "First Name: " . $first_name . "\n";
						$txt .= "Last Name: " . $last_name . "\n";
						$txt .= "Company Name: " . $company_name . "\n";
						$txt .= "Email: " . $email . "\n";
						$txt .= "Job Title: " . $job_title . "\n";
						$txt .= "Filling Frequency: " . $filling_frequency . "\n";
						$headers = "From: noreply@washingtonexpress.com";

						$success = mail($to, $subject, $txt, $headers);
					}
				?>

				<div class="general-layout">
					<div class="general-column">
						<h3>Download our free Premerger filing tip sheet</h3>
						<br/><br/>
						<figure>
							<a href="http://cdn2.hubspot.net/hubfs/1637747/Pre-Merger_filing_tips.pdf?__hssc=157008996.1.1501235536800&__hstc=157008996.48a628dc96fffac3905f7394b245d790.1498659579922.1501159301902.1501235536800.11&__hsfp=3718830781&hsCtaTracking=04014398-edac-4678-a2b8-2b0588785422%7C9e6607e1-2258-4f1b-a731-ec64c05c8bdc" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/a1x/img/pre-merger_filing_thumnail.jpg" alt="Premerger filing tip sheet" />
							</a>
						</figure>
					</div>
					<div class="general-column">
						<?php if ($success): ?>
							<h3 style="margin: 30px 0px 20px; font-size: 20px; border: 0;">Thank you, please click on the document image to the left to access our filing tips sheet</h3>
						<?php else: ?>

							<h3>Why use our tip sheet?</h3>
							<h3 style="margin: 30px 0px 20px; font-size: 20px; border: 0;">You're busy and your time is valuable. Here's how our tip sheet can help you:</h3>
							<ul>
								<li>Package and label your filings as we recommend to reduce the liklihood of clerical errors when filing.</li>
								<li>
									Prepare the proper information to provide our representatives when placing your order to ensure sufficient
									information is conveyed to the courier and dispatcher.
								</li>
								<li>Find additional resources directly from the FTC regarding filing instructions.</li>
							</ul>

							<form action="" class="go-form" method="post" novalidate="novalidate">
								<?php if ($error): ?>
									<p>Please enter a valid email address.</p>
								<?php endif; ?>

								<div class="formfield">
									<label>First Name*</label>
									<input type="text" name="first_name" value="<?php echo $first_name; ?>" />
								</div>
								<div class="formfield">
									<label>Last Name*</label>
									<input type="text" name="last_name" value="<?php echo $last_name; ?>" />
								</div>
								<div class="formfield">
									<label>Email*</label>
									<input type="email" name="email" value="<?php echo $email; ?>" />
								</div>
								<div class="formfield">
									<label>Company Name*</label>
									<input type="text" name="company_name" value="<?php echo $company_name; ?>" />
								</div>
								<div class="formfield">
									<label>Job Title</label>
									<input type="text" name="job_title" value="<?php echo $job_title; ?>" />
								</div>
								<div class="formfield">
									<label>Filing Frequency*</label>
									<select name="filling_frequency">
										<option value="">Please Select -</option>
										<option value="Less than once a month">Less than once a month</option>
										<option value="Once a week">Once a week</option>
										<option value="Multiple times a week">Multiple times a week</option>
									</select>
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
	</div>
</section>

<?php get_footer(); ?>

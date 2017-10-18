<?php /* Template Name: Court Agency Directory */ ?>

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
						$subject = "Court agency directory message";
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
						<h3>Download Our Free Filing Guidelines</h3>
						<br/><br/>
						<figure>
							<?php if ($success): ?>
								<a href="<?php echo get_template_directory_uri() . '/pdf/working-filing-guidelines.pdf'; ?>" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/a1x/img/filing_guidelines_thumbnail.jpg" alt="Premerger filing tip sheet" />
								</a>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/a1x/img/filing_guidelines_thumbnail.jpg" alt="Premerger filing tip sheet" />
							<?php endif; ?>
						</figure>
					</div>
					<div class="general-column">
						<?php if ($success): ?>
							<span></span>
							<p>Thank you, please click on the document image to the left to access our Filing Guidelines, or: </p>

							<a href="<?php echo get_template_directory_uri() . '/pdf/working-filing-guidelines.pdf'; ?>" style="display: inline-block; background: #333; color: #fff; border-radius: 5px; padding: 10px 40px;" target="_blank">Download Filing Guidelines</a>
						<?php else: ?>
							<h3 style="margin: 30px 0px 20px; font-size: 20px; border: 0;">Complete the below to download our filing guidelines</h3>

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
									<select name="filling_frequency" class="no-fancy">
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

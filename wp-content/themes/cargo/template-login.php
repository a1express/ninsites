<?php /* Template Name: Login */ ?>

<?php get_header(); ?>

<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<section class="boldSection topSpaced bottomSpaced gutter inherit">
	<div class="port">
		<div class="boldCell">
			<div class="boldCellInner">
				<div id="main" class="single about">
					<h3>Customer Portal</h3>
					<h4>Online Order Entry / Tracking</h4>	
					<span>&nbsp;</span>

					<style type="text/css">
						.general-layout .general-column {
							box-sizing: border-box;
							padding: 5px;
						}
						.general-layout .go-form {
							box-shadow: 0 0 5px #666;
							padding: 15px;
						}
						.general-layout .title {
							text-align: center;
							padding-bottom: 15px;
							font-size: 16px;
							border-bottom: 1px solid #888;
							margin-bottom: 15px;
						}
						.general-layout .submit {
							text-align: center;
						}
						.general-layout .footer {
							line-height: 1.4;
							text-align: center;
							margin-top: 15px;
						}
						.general-layout .footer a {
							color: #0014f7;
						}
					</style>

					<div class="general-layout">
						<div class="general-column">
							<form action="http://www.cmstracking.com/index.php" class="go-form" method="post" novalidate="novalidate" target="_blank">
								<input type="hidden" name="f" value="1" />
								<input type="hidden" name="submit" value="Login" />
								<div class="title">
									Please Login Below To Place Orders Online
								</div>
								<div class="formfield">
									<label>Username:</label>
									<input type="text" name="username" class="full-width" placeholder="Enter Username" />
								</div>
								<div class="formfield">
									<label>Password:</label>
									<input type="password" name="password" class="full-width" placeholder="Enter Password" />
								</div>
								<div class="submit">
									<button style="background: #0014f7; color: #fff;">Submit</button>
								</div>
								<div class="footer">
									<a href="http://www.cmstracking.com/registration.php">
										Register Your Account For
										<br/>
										Online Order Entry/Tracking
									</a>
								</div>
							</form>
						</div>
						<div class="general-column">
							<form action="http://www.cmstracking.com/detail_instantj.php" class="go-form" method="post" novalidate="novalidate"target="_blank">
								<input type="hidden" name="f" value="1" />
								<input type="hidden" name="submit" value="Track Package" />
								<div class="title">
									Enter Job # to Track a Package
								</div>
								<div class="formfield">
									<label>Tracking Number:</label>
									<input type="text" name="tracknum" class="full-width" placeholder="Enter Job #" />
								</div>
								<div class="submit">
									<button style="background: #0014f7; color: #fff;">Track Package</button>
								</div>
								<div class="footer">
									No dash needed with Job #
									<br/><br/>
									Example:
									<br/>
									1234-567 &nbsp; <i class="fa fa-remove"></i>
									<br/>
									1234567 &nbsp; <i class="fa fa-check"></i>   
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

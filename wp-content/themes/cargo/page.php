<?php get_header(); ?>
<?php if ( get_queried_object_id() == DomainManager::GetVariable(1673, 2410, 1716, 1731, 1731, 1654, 1654, 1714, 1654, 1673, 1731, 1943) ): ?>
	<?php get_template_part( 'a1x/templates/quick-quote' ); ?>
<?php endif; ?>

<?php if ( DomainManager::IsDEV2CourierDomain() && get_queried_object_id() == 1820 ): ?>

<section class="boldSection gutter">
	<div class="port">
		<div class="boldCell">
			<div class="boldCellInner">
				<div class="boldRow ">
					<div class="rowItem col-md-12 col-ms-12  btTextCenter inherit">
						<div class="rowItemContent">
							<div class="btText">
								<p>&nbsp;</p>
								<h3 style="margin: 0;">PLACE ORDER</h3>
								<h6 style="margin: 0 0 30px;">WAREHOUSE SERVICE ORDERS:</h6>

								<style type="text/css">
									form.btQuoteBooking {
										padding-bottom: 80px; 
										opacity: 1; 
										max-width: 660px; 
										margin: 0px auto 20px;
									}
									form.btQuoteBooking input.btBtn {
										display: inline-block;
										width: auto;
									}
								</style>

								<form method="POST" action="http://trackitpro.sdsgl.com/trackitpro/tracking/pLogin.php" name="formLogin" class="btLightSkin btQuoteBooking">
									<input type="hidden" name="PHPSESSID" value="f285b0abe3c112018112065dfd96a600" />
									<input type="hidden" name="bLoginSubmitted" value="True" />
									<input type="hidden" name="nTimezoneOffset" value="" />
									<script language="JavaScript"><!--
										var dateLoc = new Date();
										document.getElementById('nTimezoneOffset').value=dateLoc.getTimezoneOffset();
									//--></script>

									<div class="btQuoteItem btQuoteItemFullWidth">
										<label>User Name</label>
										<input class="form-control" type="text" name="strUsername" size="15" tabindex="1" />
									</div>
									<div class="btQuoteItem btQuoteItemFullWidth">
										<label>Password</label>
										<input class="form-control" type="password" name="strPassword" size="15" tabindex="2" />
									</div>
									<input class="btBtn btnFilled btContactSubmit" type="submit" Name="DoLogin" Alt="Login" tabindex=3 value="Log In" />
									<input class="btBtn btnFilled btContactSubmit" type="reset" value="Reset" name="Reset" tabindex="16" />
								</form>

								<div style="padding-bottom: 100px;">
									(Logging in will open a new browser window)<br/>
									Not Registered? <a href="/new-account/">Click Here!</a>
								</div>

								<script language="JavaScript"><!-- document.formLogin.strUsername.focus(); //--></script>
								<SCRIPT language=javascript>
									oMsgTD = document.getElementById('messages');
								 	if (oMsgTD!=null) { oMsgTD.innerHTML=''; }
								</SCRIPT>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		

<?php else: 

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

endif;

get_footer();

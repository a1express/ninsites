<?php /* Template name: Currency Conversion */ ?>

<?php get_header(); ?>

	<section class="boldSection topSpaced bottomSpaced gutter inherit">
		<div class="port">
			<div class="boldCell">
				<div class="boldCellInner">
					<div class="boldRow">
						<div class="rowItem col-md-12">
							<div class="rowItemContent">
								<h3><?php the_title(); ?></h3>
							</div>
						</div>
					</div>
					<form method="post" action="http://www.oanda.com/convert/classic">
						<div class="boldRow">
							<div class="rowItem col-md-6 inherit">
								<input type="hidden" name="value" value="1" />
								<select class="qclist" name="exch">
									<option selected="" value="USD">USA</option>
									<option value="AUD">Australia</option>
									<option value="GBP">UK</option>

									<option value="CAD">Canada</option>
									<option value="EUR">Euro</option>
									<option value="HKD">Hong Kong</option>
									<option value="IDR">Indonesia</option>
									<option value="JPY">Japan</option>
									<option value="SGD">Singapore</option>

									<option value="SEK">Sweden</option>
									<option value="CHF">Switzerland</option>
									<option value="THB">Thailand</option>
								</select>
							</div>
							<div class="rowItem col-md-6 inherit">
								<select class="qclist" name="expr">
									<option value="USD">USA</option>

									<option value="AUD">Australia</option>
									<option value="GBP">UK</option>
									<option value="CAD">Canada</option>
									<option selected="" value="EUR">Euro</option>
									<option value="HKD">Hong Kong</option>
									<option value="IDR">Indonesia</option>

									<option value="JPY">Japan</option>
									<option value="SGD">Singapore</option>
									<option value="SEK">Sweden</option>
									<option value="CHF">Switzerland</option>
									<option value="THB">Thailand</option>
								</select>
							</div>
						</div>
						<div class="boldRow">
							<div class="rowItem col-md-12">
								<br />
								<input type="hidden" name="Convert" />
								<button style="padding: 7px 15px;">Convert Now &raquo;</button>
							</div>
						</div>
					</form>
					<div class="boldRow">
						<div class="rowItem col-md-12">
							<br /><br />
							Powered by:<br><a href="http://www.oanda.com/"><img src="http://www.oanda.com/site/logos/copyright.gif" alt="OANDA.com, Currency Converters" border="0"></a>
							<br /><br />
							FXConverter&trade;: Classic <a href="http://www.oanda.com/convert/classic">164 Currency Converter</a>
							<br />
							&copy; 1997-2005 by <a href="http://www.oanda.com/" target="_blank">OANDA.com</a>.
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php

get_footer();

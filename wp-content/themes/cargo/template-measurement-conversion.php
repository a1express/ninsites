<?php /* Template name: Measurement Conversion */ ?>

<?php get_header(); ?>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.6/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/a1x/js/measurement-conversion.js?t=<?php echo time(); ?>"></script>

	<div class="locations-wrapper" ng-app="A1xApp">
		<section class="boldSection topSpaced bottomSpaced gutter inherit" ng-controller="MeasurementConversionController">
			<div class="port">
				<div class="boldCell">
					<div class="boldCellInner">
						<div class="boldRow">
							<div class="rowItem col-md-12">
								<div class="rowItemContent">
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
							<div class="rowItem col-md-8 inherit measurement-conversion">
								<div class="top-part">
									<h4>Weight</h4>

									<div>
										<label>
											<strong>Convert kilograms to pounds</strong>
										</label>
									</div>
									<div class="inline-form">
										<label>Kilograms:</label>
										<input type="text" ng-model="form1.kilograms1" />
										<button ng-click="Calculate1()">convert &raquo;</button>
										<label>Pounds:</label>
										<input type="text" ng-model="form1.pounds1" readonly="readonly" />
									</div>

									<div>
										<label>
											<strong>Convert pounds to kilograms</strong>
										</label>
									</div>
									<div class="inline-form">
										<label>Pounds:</label>
										<input type="text" ng-model="form1.pounds2" />
										<button ng-click="Calculate2()">convert &raquo;</button>
										<label>Kilograms:</label>
										<input type="text" ng-model="form1.kilograms2" readonly="readonly" />
									</div>
								</div>

								<div class="bottom-part">
									<h4>Length</h4>

									<div>
										<label>Convert what quantity?</label>
										<input type="text" ng-focus="ClearResult()" ng-model="form2.source" />
									</div>

									<div class="big-selectors">
										<div class="one-half">
											<label>From:</label>
											<select name="from" size="9" class="not-fancyable" ng-model="form2.from" ng-change="Calculate3()">
												<option selected="selected">centimeter</option>
												<option>feet</option>
												<option>inch</option>
												<option>kilometer</option>
												<option>league</option>
												<option>league [nautical]</option>
												<option>meter</option>
												<option>microinch</option>
												<option>mile</option>
												<option>millimeter</option>
												<option>yard</option>
											</select>
										</div>
										<div class="one-half">
											<label>To:</label>
											<select name="from" size="9" class="not-fancyable" ng-model="form2.to" ng-change="Calculate3()">
												<option selected="selected">centimeter</option>
												<option>feet</option>
												<option>inch</option>
												<option>kilometer</option>
												<option>league</option>
												<option>league [nautical]</option>
												<option>meter</option>
												<option>microinch</option>
												<option>mile</option>
												<option>millimeter</option>
												<option>yard</option>
											</select>
										</div>
									</div>

									<div class="big-selectors-button">
										<button ng-click="Calculate3()">Convert</button>
									</div>

									<div>
										<label>Result (rounded to 7 decimal places):</label>
										<input type="text" readonly="readonly" ng-model="form2.result" />
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php

get_footer();

<?php /* Template name: Locations */ ?>

<?php get_header(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/a1x/js/jquery.vmap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/a1x/js/jquery.vmap.usa.js"></script>

	<section class="boldSection bottomSpaced gutter inherit">
		<div class="port">
			<div class="boldCell">
				<div class="boldCellInner">
					<div class="boldRow">
						<div class="rowItem col-md-12">
							<div class="rowItemContent">
								<h3>Warehouse Locations</h3>
							</div>
						</div>
						<div class="rowItem col-md-6 inherit">
							<div class="rowItemContent">
								<img src="<?php echo get_template_directory_uri(); ?>/img/a1x/warehouse_map.png" alt="Warehouses" />
							</div>
						</div>
						<div class="rowItem col-md-6 inherit">
							<div class="rowItemContent">
								<header class="header btClear large customHeaderContent btLightAccentDash btRegularTitle">
									<br/><br/><br/>
									<h3>Learn more about our<br/>Warehouse Locations</h3>
									<br/>
									<img src="//nindelivers.com/wp-content/uploads/2017/02/warehouse.jpg" alt="Warehouse" />
								</header>

								<div class="info-box" style="display: none;">
									<div class="title">NY/Metro Area Warehouse</div>
									<div class="body">
										<div class="two-cols">
											<div class="column">

											</div>
											<div class="column">
												<img src="//nindelivers.com/wp-content/uploads/2017/02/warehouse.jpg" alt="Warehouse" />
											</div>
										</div>
										<div class="three-cols">
											<div class="column">
												<img src="//nindelivers.com/wp-content/uploads/2017/02/warehouse.jpg" alt="Warehouse" />
											</div>
											<div class="column">

											</div>
											<div class="column">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="boldSection bottomSpaced gutter inherit">
		<div class="port">
			<div class="boldCell">
				<div class="boldCellInner">
					<div class="boldRow">
						<div class="rowItem col-md-12 inherit">
							<div class="rowItemContent">
								<script type="text/javascript">
									jQuery(document).ready(function(){
										jQuery('#vmap').vectorMap({
											map: 'usa_en',
											backgroundColor: null,
											color: '#0a1a77',
											enableZoom: false,
											showTooltip: true,
											selectedColor: null,
											hoverColor: null,
											colors: {
												ak: '#f5f5f5',
												hi: '#f5f5f5',
												ny: '#27521f',
												pa: '#27521f',
												nj: '#27521f',
												ct: '#0b7a46',
												il: '#94765f',
												ky: '#f78b8b',
												nc: '#884c9e',
												sc: '#517594',
												va: '#a82828',
												md: '#a82828',
												ga: '#d1d100',
												fl: '#cf1919'
											},
											onRegionClick: function(event, code, region){
												event.preventDefault();
											},
											onLabelShow: function(event, label, code) {
												if (code == 'ak' || code == 'hi') {
													event.preventDefault();
												} else if ( code == 'il' ) {
													label[0].innerHTML = '<strong>Chicago Office</strong>';
												} else if ( code == 'nc' ) {
													label[0].innerHTML = '<strong>North Carolina Warehouse</strong>';
												} else if ( code == 'ny' || code == 'pa' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else if ( code == 'ct' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else if ( code == 'nc' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else if ( code == 'sc' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else if ( code == 'ga' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else if ( code == 'fl' ) {
													label[0].innerHTML = '<strong>Connecticut, Southern New England Office,</strong><br/>expresswaycourier.com 203-790-1755';
												} else {
													label[0].innerHTML = '<strong>' + label[0].innerHTML + '</strong><br/>https://nindelivers.com +1 (800) 469-0929';
												}
											}
										});
									});
								</script>

								<h3>Office Locations</h3>
								<h4>(Click location for more info)</h4>
								<div id="vmap" style="width: 100%; height: 600px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php

get_footer();

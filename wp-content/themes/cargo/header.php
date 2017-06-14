<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<?php
	
	bt_set_override();
	bt_header_init();
	bt_header_meta();

	wp_head();
	
	?>

	<style type="text/css">


	
		body.page-id-1739 .btContent { text-align: center; }
		body.page-id-1739 .btContent table {
			display: block;
			margin: 0px auto;
			width: 660px;
		}
		body.page-id-1739 .btContent table tbody,
		body.page-id-1739 .btContent table tr,
		body.page-id-1739 .btContent table td {
			display: block;
		}
		body.page-id-1739 .btContent table iframe { height: 1360px !important; }
		.mainHeader .btCurveHeader .btCurveHolder { max-width: none; }
		.mainHeader .btCurveHeader .btCurveLeftHolder,
		.mainHeader .btCurveHeader .btCurveRightHolder {
			background: #fff;
			height: 20px;
			overflow: hidden;
		}

		.btIconImageRow { display: none; }
		.btIconImageRow.active { display: block; }

		.banner-qq label {
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
		}
		.banner-qq input {
			display: inline-block;
			vertical-align: middle;
			width: 100px;
			text-align: center;
			margin: 0px 5px;
			color: #333 !important;
			padding: 0px;
			height: 35px;
		}
		.banner-qq .submit-button {  
			border: 0px none;
			-webkit-appearance: none;
			text-transform: uppercase;
			font-weight: 700;
			padding: 5px 20px;
			cursor: pointer;
			color: #fff;
			background: #272bf7;
			border-radius: 2px;
			border: 1px solid transparent;
			transition: all 300ms linear;
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
		}
		.banner-qq .submit-button:hover {
			color: #272bf7;
			background: #fff;
			border: 1px solid #aaa;
			box-shadow: 0px 0px 5px #ccc;
		}

		@media screen and (max-width: 767px) {
    		.banner-qq label, .banner-qq input, .banner-qq button {
    			display: block;
    			text-align: center;
    			margin: 0px auto 10px;
    		}
		}
	</style>

	<script type="text/javascript">
		(function($) {
			$(document).ready(function(){
				$("#slider .btIconImageRow").each(function(){
					var imageRow = $(this);

					imageRow.empty();
					imageRow.append( 
						$("<form/>", { "action": "/quick-quote", "class": "banner-qq" })
							.append( $("<label/>", { "text": "enter your pick-up zip code" }) )
							.append( $("<input/>", { "type": "text", "name": "origin" }) )
							.append( $( "<button/>", { "text": "Get Quote", "class": "submit-button" } ) ) 
					);

					imageRow.find("form input").on("focus", function(){
						jQuery('.slick-slider').slick('slickPause');
					});

					imageRow.addClass("active");
				});
			});
		})( jQuery );
	</script>
</head>

<body <?php body_class( bt_get_body_class() ); ?> id="btBody">

<?php echo bt_preloader_html(); ?>

<div class="btPageWrap" id="top">
	
    <header class="mainHeader btClear">
		<?php if ( ! bt_get_option( 'top_tools_in_menu' ) ) echo bt_top_bar_html("top"); ?>
        <div class="port">
			<div class="menuHolder btClear">
				<div class="btVerticalMenuTrigger">&nbsp;<?php echo bt_get_icon_html( 'fa_f0c9', '#', '', 'borderless extrasmall' ); ?></div>
				<div class="btHorizontalMenuTrigger">&nbsp;<?php echo bt_get_icon_html( 'fa_f0c9', '#', '', 'borderless extrasmall' ); ?></div>
				<div class="logo">
					<span>
						<?php bt_logo( 'header' ); ?>
					</span>
				</div><!-- /logo -->
				<div class="menuPort">
					<?php if ( bt_get_option( 'top_tools_in_menu' ) ) echo bt_top_bar_html("menu"); ?>
					<nav>
						<ul>
							<?php bt_nav_menu(); ?>
						</ul>
					</nav>
					
				
				</div><!-- .menuPort -->
			</div><!-- /menuHolder -->
		</div>
		<div class="btCurveHeader">
			<div class="btCurveHolder">
				<div class="btCurveLeftHolder">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="20px" viewBox="0 0 80 20" enable-background="new 0 0 80 20" xml:space="preserve">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M 81 20 c 0 0 -16 0 -30 0 c -30 0 -23 -15 -50 -15 l 0 -5 L 81 0 L 81 20 Z" class="btCurveLeft"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M 81 -1 L 31 -1 c 27 -1 21 15 51 16 C 82 3 82 -1 82 -1 Z" class="btCurveLeftFill"/>
					</svg>
				</div>
				<div class="btCurveRightHolder">
					<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="20px" viewBox="0 0 80 20" enable-background="new 0 0 80 20" xml:space="preserve">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M 0 20 c 0 0 16 0 30 0 c 30 0 23 -15 50 -15 l 0 -5 L 0 0 L 0 20 Z" class="btCurveRight"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M -1 -1 L 50 -1 C 23 -1 30 15 -1 15 C -1 3 -1 -1 -1 -1 Z" class="btCurveRightFill"/>
					</svg>
				</div>
				<div class="btSiteHeaderCurveSleeve"></div>
			</div>
		</div><!-- /port -->
		
    </header><!-- /.mainHeader -->
	<div class="btContentWrap btClear">
		<div class="btContentHolder">
			<div class="btContent">
			<?php bt_header_headline() ?>
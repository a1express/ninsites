<?php get_header(); ?>

<?php if ( get_queried_object_id() == DomainManager::GetVariable(1943, 2410, 1716, 1731, 1950) ): ?>
	<?php get_template_part( 'a1x/templates/quick-quote' ); ?>
<?php endif; ?>

<?php

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

get_footer();

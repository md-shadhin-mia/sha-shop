<?php 
while ( have_posts() ) :
    the_post();
    ?>
		<header class="entry-header">
		<?php


		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
        the_content();
		?>
        
		</header><!-- .entry-header -->
		<?php
endwhile;
<?php 
while ( have_posts() ) :
    the_post();
    ?>
		<header class="entry-header">
		<?php


		if ( is_single() ) {
			// $post;
		} else {
			// the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
        echo "<h1>".get_the_title($post->post_parent)."</h1>";
        the_content();
		?>
        
		</header><!-- .entry-header -->
		<?php
endwhile;
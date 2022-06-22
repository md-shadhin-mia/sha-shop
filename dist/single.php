
<?php get_header()?>
  <div class="main">
    <?php 
      while( have_posts() ){
        the_post();
        if(is_single())
        {
          the_title( '<h1 class="entry-title">', '</h1>' );
        }else {
          the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        }

        the_content(
          sprintf(
            /* translators: %s: post title */
            '<span class="screen-reader-text">' . get_the_title() . '</span>'
          )
        );
        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
            'after'  => '</div>',
          )
        );
      }


      ?>
  </div>
<?php get_footer()?>
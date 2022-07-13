
<?php get_header()?>
  <div class="main">
    <?php 

        get_template_part("loop");
        // the_content(
        //   sprintf(
        //     /* translators: %s: post title */
        //     '<span class="screen-reader-text">' . get_the_title() . '</span>'
        //   )
        // );
        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
            'after'  => '</div>',
          )
        );

       comments_template();
      ?>
  </div>
<?php get_footer()?>
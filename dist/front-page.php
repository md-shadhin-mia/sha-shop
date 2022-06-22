<?php get_header()?>
        <?php

                if ( have_posts() ) {
                    if ( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail();
                    }
        ?>
            <div class="main">
                <?php the_content()?>
            </div>
        <?php
                }else {

                    get_template_part( 'content', 'none' );

                }
        ?>
        </div>
<?php get_footer()?>
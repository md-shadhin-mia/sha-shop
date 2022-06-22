<?php get_header()?>
    <div class="main">
        <h1>page hphp</h1>
        <?php
                if ( have_posts() ) :

                    get_template_part( 'loop' );

                else :

                    get_template_part( 'content', 'none' );

                endif;
        ?>
    </div>
<?php get_footer()?>
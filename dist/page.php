<?php get_header()?>
    <div class="main min-h-screen">
        <?php
                if ( have_posts() ) {
                    if (is_page()) {
                        ?>
                        <nav class="shashop-breadcrumbs" aria-label="Breadcrumb">
                            <ol>
                                <li><a href="">Home</a></li>
                                        <i class="before:mdi before:mdi-chevron-right text-lg text-gray-500"></i>
                                <li><?php the_title()?></li>
                            </ol>
                        </nav>
                        <?php 
                        # code...
                        the_content(
                            sprintf(
                                /* translators: %s: post title */
                                '<span class="screen-reader-text">' . get_the_title() . '</span>'
                            )
                        );
                    }
                
                }else {

                    get_template_part( 'content', 'none' );

                };
        ?>
    </div>
<?php get_footer()?>
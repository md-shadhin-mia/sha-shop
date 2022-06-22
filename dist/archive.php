<?php get_header();?>
    <div class="main">
        <?php 
        while(have_posts()){
            the_post();
            ?>
            <?php the_post_thumbnail(); ?>

            <a href="<?php the_permalink()?>"><h1><?php the_title();?></h1></a>
            <p><?php the_excerpt(); ?></p>
            <?php
        }
        ?>
    </div>
<?php get_footer();?>
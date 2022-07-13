<?php get_header(); ?>
<div class="main">

    <nav class="shashop-breadcrumbs" aria-label="Breadcrumb">
        <ol>
            <li><a href="<?php home_url() ?>">Home</a></li>
                    <i class="before:mdi before:mdi-chevron-right text-lg text-gray-500"></i>
            <li><?php echo is_category()? single_cat_title() : the_archive_title()?></li>
        </ol>
    </nav>
    <div class="pt-4 grid grid-cols-2 md:grid-cols-3">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <div class="px-3 mb-12 border m-1 border-gray-200">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail($size = 'post-thumbnail', array("class" => "h-80 w-full object-cover rounded")); ?>
                </a>
                <p class="mt-6 text-sm text-blue-400">
                    <?php
                        $catagories  = get_the_category();
                        foreach($catagories as $cat){
                            ?>
                            <a href="<?php echo get_category_link($cat->cat_ID) ?>">
                                <span class="inline-block py-1 px-3 text-xs font-semibold bg-blue-100 text-blue-600 rounded-xl mr-3"><?php echo $cat->name ?></span>
                            </a>
                            <?php
                        }
                    ?>
                    
                    <span class="text-blueGray-400 text-xs"><?php the_date() ?></span></p>
                <h3 class="my-2 text-2xl font-bold font-heading"><a class="hover:text-blue-500" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <p class="text-blueGray-400 leading-loose"><?php the_excerpt(); ?></p>
            </div>
        <?php } ?>
    </div>

</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<div class="main">

    <nav class="p-4 border border-gray-200 rounded" aria-label="Breadcrumb">
        <h2>Search Result : <?php echo get_search_query()?></h2>
    </nav>
        <?php
        if(have_posts()){
            get_template_part("loop");
        } else {
            echo "<h1 class=\"text-center text-gray-500 p-4\">Not any post fount!</h1>";
        } ?>

</div>
<?php get_footer(); ?>
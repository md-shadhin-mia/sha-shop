<?php get_header()?>
<div class="main">
<h1>index php</h1>
<?php
    while(have_posts()){
        the_post();
        the_post_thumbnail(array(360, 360));
        the_title("<h1><a href=".the_permalink().">", "</a></h1>");
    }
?>

</div>
<?php get_footer()?>
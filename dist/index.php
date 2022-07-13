<?php get_header()?>
<div class="main">
    
            <?php
            if(have_posts()){
                get_template_part("loop");
            } else {
                echo "<h3>not fount</h3>";
            } ?>
    

</div>
<?php get_footer()?>
    <!-- footer start hear -->
<footer>
    
    <div class="flex justify-around flex-col md:flex-row md:w-full">
            <?php
                $est = apply_filters('shashop_widgets_array', array());
                foreach($est as $key => $value){
                        if(is_active_sidebar( $key )){
                            ?>
                                <div class="widget_wrapper p-2">
                                    <?php dynamic_sidebar( $key );?>
                                </div>
                            <?php 
                        }
                }
            ?>
    </div>
    <?php $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' )  ?>
    <h5 style="text-align:center" class="border-t-gray-300 border-t">shashop <?php echo $content?></h5>
</footer>
<?php wp_footer()?>
</body>
</html>
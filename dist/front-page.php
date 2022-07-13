<?php get_header()?>
        <?php

            if ( have_posts() ) {
                if ( has_post_thumbnail()) {
                    if(get_theme_mod('shashop_home_caption_enable')){
         ?>

        <div class="w-full md:min-h-[70vh] bg-cover flex flex-col justify-center" style="<?php
                                $imageurl = wp_get_attachment_url(get_post_thumbnail_id());
                                echo 'background-image:url('.$imageurl.');';
                            ?>">
                    <div class="caption main flex flex-col w-full" style="<?php
                                $align = get_theme_mod('shashop_home_caption_align');
                                $itemsPos = $align == 'left'? 'start': ($align == 'right'? 'end': 'center');
                                echo 'align-items:'.$itemsPos.';text-align:'.$align.';';
                            ?>">
                        <h1 class="caption_title mb-1" style="<?php
                            $size = get_theme_mod('shashop_home_caption_title_size');
                            $color = get_theme_mod('shashop_home_caption_title_color');
                            echo 'font-size: '.$size.'rem; line-height: '.$size.'rem;color:'.$color.';';
                        ?>"><?php echo get_theme_mod('shashop_home_caption_title_text')?></h1>
                        <p class="caption_describe mb-1"
                            style="<?php
                                $size = get_theme_mod('shashop_home_caption_describe_size');
                                $color = get_theme_mod('shashop_home_caption_describe_color');
                                echo 'font-size: '.$size.'rem; line-height: '.$size.'rem;color:'.$color.';';
                            ?>" 
                        >
                        <?php echo get_theme_mod('shashop_home_caption_describe_text')?>
                    </p>
                    <div class="caption_button my-1">
                        <a class="button bg-purple-500 inline-block p-2" style="<?php
                            $size = get_theme_mod('shashop_home_caption_button_size');
                            $color = get_theme_mod('shashop_home_caption_button_text_color');
                            $bgcolor = get_theme_mod('shashop_home_caption_button_color');
                            echo 'font-size: '.$size.'rem; line-height: '.$size.'rem;color:'.$color.';background-color: '.$bgcolor.';';
                        ?>" href="<?php echo get_theme_mod('shashop_home_caption_button_link') ?>"><?php echo get_theme_mod('shashop_home_caption_button_text') ?></a>
                    </div>
                    </div>
        </div>
    <?php }
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
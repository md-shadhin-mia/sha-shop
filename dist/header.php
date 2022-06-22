<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title()?></title>
    <?php wp_head()?>


    <!-- if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} -->
</head>
<body <?php body_class() ?>>
    <header>
        <nav class="navbar">
            <div class="nav">
                    <a href="<?php echo esc_url( home_url( '/' ) )?>" class="navbar-brand" id="brand-information">
                    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ){ ?>
                        <h1><?php echo get_custom_logo()?></h1>
                    <?php }else{?>
                        <h1><?php echo esc_html( get_bloginfo( 'name' ) ) ?></h1>
                        <h4><?php echo esc_html( get_bloginfo('description', 'display') ) ?></h4>
                     <?php }?>
                </a>
                <div class="header-search">
                    <?php
                    if(shashop_is_woocommerce_activated()){
                        the_widget( 'WC_Widget_Product_Search', 'title=' );
                    }else{
                        get_search_form();
                    }
                     ?>
                </div>
                
                <div class="header-cart">
                    <a href="<?php echo wc_get_cart_url()?>" class="p-2 relative before:mdi before:mdi-cart text-3xl"><span class="badge" id="custom_fragment_cart_count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'shashop' ), WC()->cart->get_cart_contents_count() ) ); ?></span></a>
                    <?php if(!is_cart() && !is_checkout()){ ?>
                        <div class="cart-overlay">
                            <div class="cart">
                                <?php the_widget( 'WC_Widget_Cart', 'title=' )?>
                            </div>
                        </div>
                   <?php }?>
                </div>
                
                <button class="mobile-menu-toggler"><i></i></button>         
            </div>
            <div class="nav">
                <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'menu_class'=>"nav-menu",
                    ));
                ?>
            </div>
        </nav>
    </header>
    <!-- Ending Header  -->



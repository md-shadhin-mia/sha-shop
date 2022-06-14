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
                <?php get_search_form()?>           
            </div>
            <div class="nav">
                <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'menu_class'=>"nav-menu"
                    ));
                ?>
            </div>
        </nav>
    </header>
    <!-- Ending Header  -->
    <div class="main">


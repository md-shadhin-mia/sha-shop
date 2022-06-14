<?php

use function PHPSTORM_META\type;

function load_stylesheet_script(){
    wp_register_style("sha-stylesheet", get_template_directory_uri()."/style.css", "",1, "all");
    wp_enqueue_style("sha-stylesheet");
}

add_action("wp_enqueue_scripts", "load_stylesheet_script");

function load_javascipt_script(){
    wp_register_script("sha-javascript", get_template_directory_uri()."/js/main.js", "", 1.0, true);
    wp_enqueue_script("sha-javascript");
}

add_action("wp_enqueue_scripts", "load_javascipt_script", );
function sha_shop_setup_theme(){
    add_theme_support("custom-logo");
    register_nav_menus(array(
        'primary' => __("Primary Menu", "shashop"),
        'secondary' => __("Secondary Menu", "shashop"),
    ));
}

add_action('after_setup_theme', 'sha_shop_setup_theme');
function sha_shop_customizer_register($wp_customize){


    $wp_customize->selective_refresh->add_partial(
        'custom_logo',
        array(
            'selector'        => '#brand-information',
        )
    );


    $wp_customize->add_section(
        'shashop_header',
        array(
            'title'    => __( 'Header', 'shashop' ),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'shashop_header_background_color',
        array(
            'default' => '#ededed',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_background_color',
            array(
                'label' => __( 'Background color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_background_color',
                'priority' => 20,
            )
        )
    );
    //--header-menu-color
    $wp_customize->add_setting(
        'shashop_header_menu_color',
        array(
            'default' => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_menu_color',
            array(
                'label' => __( 'Menu Text color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_menu_color',
                'priority' => 25,
            )
        )
    );

    //--menu-hover-color
    $wp_customize->add_setting(
        'shashop_header_menu_hover_color',
        array(
            'default' => '#2f2f2f',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_menu_hover_color',
            array(
                'label' => __( 'Menu Hover color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_menu_hover_color',
                'priority' => 25,
            )
        )
    );
    //--menu-selected-color
    $wp_customize->add_setting(
        'shashop_header_menu_selected_color',
        array(
            'default' => '#004040',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_menu_selected_color',
            array(
                'label' => __( 'Selected Menu color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_menu_selected_color',
                'priority' => 25,
            )
        )
    );
    //--menu-selected-color
    $wp_customize->add_setting(
        'shashop_header_menu_selected_color',
        array(
            'default' => '#004040',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_menu_selected_color',
            array(
                'label' => __( 'Selected Menu color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_menu_selected_color',
                'priority' => 25,
            )
        )
    );
    //--header-menu-font-size
    $wp_customize->add_setting(
        'shashop_header_menu_font_size',
        array(
            'capability'        => 'edit_theme_options',
            'default'=>'1rem',
        )
    );
/*xs 0.75rem sm 0.875rem  base 1rem lg 1.125rem lx 1.25rem 2lx 1.5rem 3xl 1.875rem 4xl 2.25rem 5xl */
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'shashop_header_menu_font_size',
            array(
                'label'=>__("Menu Text size", 'shashop'),
                'type'=>'select',
                'section'=>'shashop_header',
                'priority'=>30,
                'choices'=>array(
                    '1rem'=>__('base', 'shashop'),
                    '0.75rem'=>__('xs', 'shashop'),
                    '0.875rem'=>__('sm', 'shashop'),
                    '1.125rem'=>__('lg', 'shashop'),
                    '1.25rem'=>__('lx', 'shashop'),
                    '1.5rem'=>__('2xl', 'shashop'),
                )
            )
        )
    );
        

}

add_action("customize_register", "sha_shop_customizer_register");


function shashop_Cutomize_theme(){
    ?>
        <style>
            :root{
                --header-background-color: <?php echo get_theme_mod('shashop_header_background_color')?>;
                --header-menu-color: <?php echo get_theme_mod('shashop_header_menu_color')?>;
                --header-menu-hover-color: <?php echo get_theme_mod('shashop_header_menu_hover_color')?>;
                --header-menu-selected-color:<?php echo get_theme_mod('shashop_header_menu_selected_color')?>;
                --header-menu-font-size: <?php echo get_theme_mod('shashop_header_menu_font_size')?>;
            }
        </style>
    <?php
}

add_action('wp_head', 'shashop_Cutomize_theme');


//adding custom search theme
function get_shashop_search_form($form){
    $form = 
    '<form action="'.esc_url(home_url('/')).'" method="post">
        <div class="shashop-search">
            <label for="shashop-search-input"></label>
            <input type="text" value="'.get_search_query().'" id="shashop-search-input">
            <input type="submit" value="'.esc_attr__('Search').'" class="btn">
        </div>
    </form>';
    return $form;
}
add_filter('get_search_form', 'get_shashop_search_form');
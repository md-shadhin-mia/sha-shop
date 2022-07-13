<?php

if ( ! function_exists( 'shashop_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function shashop_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

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
function shashop_add_woocommerce_support(){
    add_theme_support(
        'woocommerce',
            array(
                'single_image_width'    => 416,
                'thumbnail_image_width' => 324,
                'product_grid'          => array(
                    'default_columns' => 3,
                    'default_rows'    => 4,
                    'min_columns'     => 1,
                    'max_columns'     => 6,
                    'min_rows'        => 1,
                ),
            )
        );
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_action('after_setup_theme', 'sha_shop_setup_theme');

// adding woocommerce support 
add_action('after_setup_theme', 'shashop_add_woocommerce_support');
/*
    customize of this theme
    shadhin make this theme easy to undenstand
*/
function sha_shop_customizer_register($wp_customize){




    //add header setting
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
    //shashop_header_text_color
    $wp_customize->add_setting(
        'shashop_header_text_color',
        array(
            'default' => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_header_text_color',
            array(
                'label' => __( 'Text color', 'shashop' ),
                'section'  => 'shashop_header',
                'settings' => 'shashop_header_text_color',
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
            'default'=>1,
            'transport' => 'refresh'
        )
    );
        /*xs 0.75rem sm 0.875rem  base 1rem lg 1.125rem lx 1.25rem 2lx 1.5rem 3xl 1.875rem 4xl 2.25rem 5xl */

    $wp_customize->add_control(
        'shashop_header_menu_font_size',
        array(
            'label'=>__("Menu Text size", 'shashop'),
            'section'=>'shashop_header',
            'priority'=>30,
            'type'        => 'range',
            'input_attrs' => array(
                'max'=> 4,
                'step'=> 0.125
            )
        )
    );







    //footer setting
    $wp_customize->add_section(
        'shashop_footer',
        array(
            'title'    => __( 'footer', 'shashop' ),
            'priority' => 30,
        )
    );

    //footer background color
    $wp_customize->add_setting(
        'shashop_footer_background_color',
        array(
            'default' => '#efefef',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_footer_background_color',
            array(
                'label' => __( 'Footer Background color', 'shashop' ),
                'section'  => 'shashop_footer',
            )
        )
    );
    //footer text color
    $wp_customize->add_setting(
        'shashop_footer_text_color',
        array(
            'default' => '#0f0f0f',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_footer_text_color',
            array(
                'label' => __( 'Footer Text color', 'shashop' ),
                'section'  => 'shashop_footer',
            )
        )
    );
    //footer link color
    $wp_customize->add_setting(
        'shashop_footer_link_color',
        array(
            'default' => '#000ff0',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_footer_link_color',
            array(
                'label' => __( 'Footer link color', 'shashop' ),
                'section'  => 'shashop_footer',
            )
        )
    );








    //caption settings
    $wp_customize->add_section(
        'shashop_home_caption',
        array(
            'title'    => __( 'Home Captions', 'shashop' ),
            'priority' => 30,
        )
    );


    //caption title text
    $wp_customize->add_setting(
        'shashop_home_caption_enable',
        array(
            'default' => true,
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'shashop_home_caption_enable', array(
                'label'       => __( 'Caption enable', 'Shashop' ),
                'section'     => 'shashop_home_caption',
                'type'        => 'checkbox',
            )
        )
    );

    //caption alignment

    $wp_customize->add_setting(
        'shashop_home_caption_align',
        array(
            'default' => 'center',
            'transport' => 'refresh',
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'shashop_home_caption_align',
            array(
                'label'=>__("Captions Align", 'shashop'),
                'type'=>'select',
                'section'=>'shashop_home_caption',
                'choices'=>array(
                    'left'=>__('Left', 'shashop'),
                    'center'=>__('Center', 'shashop'),
                    'right'=>__('Right', 'shashop'),
                )
            )
        )
    );
    
    //caption title text
    $wp_customize->add_setting(
        'shashop_home_caption_title_text',
        array(
            'default' => 'Welcome to Shashop',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'shashop_home_caption_title_text', array(
                'label'       => __( 'Caption title', 'Shashop' ),
                'section'     => 'shashop_home_caption',
                'type'        => 'text',
            )
        )
    );


    $wp_customize->selective_refresh->add_partial(
        'shashop_home_caption_title_text',
        array(
            'selector' => '.caption .caption_title',
            'type'     => 'text',
        )
    );

    //caption title color
    $wp_customize->add_setting(
        'shashop_home_caption_title_color',
        array(
            'default' => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_home_caption_title_color',
            array(
                'label' => __( 'Captions color', 'shashop' ),
                'section'  => 'shashop_home_caption',
            )
        )
    );


    //caption title size
    $wp_customize->add_setting(
        'shashop_home_caption_title_size',
        array(
            'default' => 2,
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'shashop_home_caption_title_size',
        array(
            'label'       => __( 'Caption Title Size', 'Shashop' ),
            'section'     => 'shashop_home_caption',
            'type'        => 'range',
            'input_attrs' => array(
                'max'=> 8,
                'step'=> 0.125
            )
        )
    );

    
    //caption describe text
    $wp_customize->add_setting(
        'shashop_home_caption_describe_text',
        array(
            'default' => 'heare is sort description',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'shashop_home_caption_describe_text', array(
                'label'       => __( 'Caption describe', 'Shashop' ),
                'section'     => 'shashop_home_caption',
                'type'        => 'textarea',
            )
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'shashop_home_caption_describe_text',
        array(
            'selector' => '.caption .caption_describe',
            'type'     => 'text',
        )
    );
    //caption describe color
    $wp_customize->add_setting(
        'shashop_home_caption_describe_color',
        array(
            'default' => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_home_caption_describe_color',
            array(
                'label' => __( 'Captions Describe color', 'shashop' ),
                'section'  => 'shashop_home_caption',
            )
        )
    );

    //caption describe size
    $wp_customize->add_setting(
        'shashop_home_caption_describe_size',
        array(
            'default' => 1,
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'shashop_home_caption_describe_size',
        array(
            'label'       => __( 'Caption describe Size', 'Shashop' ),
            'description' => __( 'Make sure that the contrast is high enough so that the text is readable.', 'Shashop' ),
            'section'     => 'shashop_home_caption',
            'type'        => 'range',
            'input_attrs' => array(
                'max'=> 4,
                'step'=> 0.125
            )
        )
    );
    
    
    //caption button text
    $wp_customize->add_setting(
        'shashop_home_caption_button_text',
        array(
            'default' => 'Welcome to Shashop',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'shashop_home_caption_button_text', array(
                'label'       => __( 'Button Text', 'Shashop' ),
                'section'     => 'shashop_home_caption',
                'type'        => 'text',
            )
        )
    );


    $wp_customize->selective_refresh->add_partial(
        'shashop_home_caption_button_text',
        array(
            'selector' => '.caption_button',
            'type'     => 'text',
        )
    );

     //caption button link
     $wp_customize->add_setting(
        'shashop_home_caption_button_link',
        array(
            'default' => '#',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'shashop_home_caption_button_link', array(
                'label'       => __( 'Button Link', 'Shashop' ),
                'section'     => 'shashop_home_caption',
                'type'        => 'text',
            )
        )
    );


    //caption button color
    $wp_customize->add_setting(
        'shashop_home_caption_button_color',
        array(
            'default' => '#a855f7',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_home_caption_button_color',
            array(
                'label' => __( 'Button color', 'shashop' ),
                'section'  => 'shashop_home_caption',
            )
        )
    );

    //caption button text color
    $wp_customize->add_setting(
        'shashop_home_caption_button_text_color',
        array(
            'default' => '#000000',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'shashop_home_caption_button_text_color',
            array(
                'label' => __( 'Button text color', 'shashop' ),
                'section'  => 'shashop_home_caption',
            )
        )
    );


    //caption button size
    $wp_customize->add_setting(
        'shashop_home_caption_button_size',
        array(
            'default' => 1,
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'shashop_home_caption_button_size',
        array(
            'label'       => __( 'Caption button Size', 'Shashop' ),
            'section'     => 'shashop_home_caption',
            'type'        => 'range',
            'input_attrs' => array(
                'max'=> 4,
                'step'=> 0.125
            )
        )
    );
 
}

add_action("customize_register", "sha_shop_customizer_register");
function footer_widget_setup(){


    $widget_wapper = array(
            'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		    'after_title'   => '</h2>',
            'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		    'after_widget'  => '</div></div>'
    );
    function widgets_array_genarate(){
        $footer_widgets = array();
        for($footer=1; $footer <= 4; $footer++)
        {
            $id = sprintf('footerbar_%d', $footer);
            $name = sprintf('Footer #%d', $footer);
            $description = sprintf('Widgets in this area will be displayed in the %ds column in the footer', $footer);
            $footer_widgets[$id] = array(
                'name' => __($name, 'shashop'),
                'id'          => $id,
                'description' => __( $description,'shashop')
            );
        }
        return $footer_widgets;
    }

    foreach(widgets_array_genarate() as $widget){
        register_sidebar($widget_wapper+$widget);
    }
    add_filter('shashop_widgets_array', 'widgets_array_genarate');
}
add_action('widgets_init', 'footer_widget_setup');


function shashop_Cutomize_theme(){
    ?>
        <style >
            :root{
                --header-background-color: <?php echo get_theme_mod('shashop_header_background_color')?>;
                --header-text-color: <?php echo get_theme_mod('shashop_header_text_color')?>;
                --header-menu-color: <?php echo get_theme_mod('shashop_header_menu_color')?>;
                --header-menu-hover-color: <?php echo get_theme_mod('shashop_header_menu_hover_color')?>;
                --header-menu-selected-color:<?php echo get_theme_mod('shashop_header_menu_selected_color')?>;
                --header-menu-font-size: <?php echo get_theme_mod('shashop_header_menu_font_size').'rem'?>;
                --footer-background-color: <?php echo get_theme_mod('shashop_footer_background_color')?>;
                --footer-text-color: <?php echo get_theme_mod('shashop_footer_text_color')?>;
                --footer-link-color: <?php echo get_theme_mod('shashop_footer_link_color')?>;
            }
        </style>
    <?php
}

add_action('wp_head', 'shashop_Cutomize_theme');


//adding custom search theme
function get_shashop_search_form($form){
    $form = 
    '<form role="search" method="get" class="woocommerce-product-search" action="<?php  echo home_url(); ?>" >
        <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="" name="s">
        <label class="product-search-label" for="woocommerce-product-search-field-0"><i class=" text-3xl before:mdi before:mdi-magnify"></i></label>
        <button type="submit" class="product-search-submit button" value="Search">Search</button>
        <input type="hidden" name="post_type" value="product">
    </form>';
    return $form;
}
add_filter('get_search_form', 'get_shashop_search_form');

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' <i class="before:mdi before:mdi-chevron-right text-lg text-gray-500"></i> ',
            'wrap_before' => '<nav class="shashop-breadcrumbs" aria-label="Breadcrumb"><ol>',
            'wrap_after'  => '</ol></nav>',
            'before'      => '<li >',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

// add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
// function wcc_change_breadcrumb_home_text( $defaults ) {
//     // Change the breadcrumb home text from 'Home' to 'Apartment'
    
// 	// $defaults['home'] = "dokan";
//     $defaults['delimiter'] = ' &gt; ';
// 	return $defaults;
// }

add_theme_support('post-thumbnails');
add_theme_support(
    'custom-background',
    array(
            'default-color' =>  '0000ff',
            'default-image' => '',
    )
);
add_theme_support('custom-background',array(
    'default-color' => 'ffffff' ,
    'default-image' => '',
));

// //woocommerce unhook
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


// remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// //woocommerce hook

// remove_action('woocommerce_before_main_content', 'shashop_theme_wrapper_start', 10);
// remove_action('woocommerce_after_main_content', 'shashop_theme_wrapper_end', 10);

add_action( 'woocommerce_before_main_content', 'shashop_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'shashop_theme_wrapper_end', 10 );
function shashop_theme_wrapper_start(){
    echo '<div class="working-towrok">';
}

function shashop_theme_wrapper_end(){
    echo '</div>';
}


//woocommerch adding aditional action to development

add_action('shashop_woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
add_action('shashop_woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close');

add_action('shashop_woocommerce_shop_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart');

//adiing filter 

add_filter('woocommerce_add_to_cart_fragments','item_is_counted');

function item_is_counted($fregment){
    $item_count = WC()->cart->get_cart_contents_count();
    $fregment["#custom_fragment_cart_count"]='<span class="badge '.($item_count===0? 'hidden':'').'" id="custom_fragment_cart_count">'.$item_count.'</span>';
    return $fregment;
}


function enable_threaded_comments(){
    if (!is_admin()) {
         if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
              wp_enqueue_script('comment-reply');
        }
}
    
add_action('get_header', 'enable_threaded_comments');
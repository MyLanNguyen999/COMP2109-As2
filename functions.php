<?php
//* Adding the menu function to my custom theme (part of assignment one)
function custom_theme_setup() {
  register_nav_menus( array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
  ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

//* Add Featured image support to our posts (part of assignment one)
add_theme_support( 'post-thumbnails' );

//* set up our custom footer widgets 
function footer_widgets_init(){
  register_sidebar(array(
    'name'          => __( 'Footer Widget Area One', 'footerwidget' ),
    'id'            => 'footer-widget-area-one',
    'description'   => __( 'The first footer widget area', 'footerwidget' ),
    'before_widget' => '<div class="logo-widget">',
    'after_widget'  => '</div>',
  ));
  register_sidebar( array(
    'name'          => __( 'Footer Widget Area Two', 'footerwidget' ),
    'id'            => 'footer-widget-area-two',
    'description'   => __( 'The second footer widget area', 'footerwidget' ),
    'before_widget' => '<div class="footer-menu-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ));
//   register_sidebar( array(
//     'name'          => __( 'Footer Widget Area Three', 'footerwidget' ),
//     'id'            => 'footer-widget-area-three',
//     'description'   => __( 'The third footer widget area', 'footerwidget' ),
//     'before_widget' => '<div class="contact-widget">',
//     'after_widget'  => '</div>',
//     'before_title'  => '<h4 class="widget-title">',
//     'after_title'   => '</h4>',
//   ));
}
add_action( 'widgets_init', 'footer_widgets_init' );
//* My custom post type
function book_init(){
  $args = array(
    'label' => 'Book',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'taxonomies'  => array( 'category'),
    'hierarchical' => 'false',
    'query_var' => true,
    'menu_icon' => 'dashicons-smiley',
    'supports' => array(
      'title',
      'editor',
      'excerpts',
      'comments',
      'thumbnail',
      'author',
      'post-formats',
      'page-attributes',
    )
  );
  register_post_type('book', $args);
}
add_action('init', 'book_init');

//* now create a shortcode for my custom post-type
function book_shortcode(){
  $query = new WP_Query(array('post_type' => 'book', 'post_per_page' => 8, 'order' => 'asc'));
  while ($query -> have_posts()) : $query-> the_post(); ?>
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="image-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      </div>
      <div class="book-content">
        <h4><?php the_title(); ?></h4>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php
  endwhile;
  wp_reset_postdata();
}
//* register shortcode
add_shortcode('book', 'book_shortcode');


// changing my excerpt length
add_filter( 'excerpt_length', function($length) {
  return 25;
}, PHP_INT_MAX );
// adding woocommerce support to our theme
function customtheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );
function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );

/**
 * 
 * Before content
 * add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
 * add_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
 * add_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
 
 * Left column
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
 * add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
 
 * Right column
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_rating', 10);
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 10);
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_excerpt', 20);
 
 * Add to cart
 * do_action( 'woocommerce_before_add_to_cart_form');
 * do_action( 'woocommerce_before_add_to_cart_button');
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
 * add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
 * add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30);
 * add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30);
 * add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30);
 * add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10);
 * add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
 * do_action( 'woocommerce_before_quantity_input_field');
 * do_action( 'woocommerce_after_quantity_input_field');
 * do_action( 'woocommerce_after_add_to_cart_button');
 * do_action( 'woocommerce_after_add_to_cart_form');
 
 * Product meta
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
 * do_action( 'woocommerce_product_meta_start');
 * do_action( 'woocommerce_product_meta_end');
 
 * Sharing
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
 * do_action( 'woocommerce_share');
 
 * Tabs, upsells, and related products
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
 * add_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10);
 * do_action( 'woocommerce_product_after_tabs');
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
 
 * Reviews
 * add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
 * add_action( 'woocommerce__review_before_comment_meta', 'woocommerce_review_display_rating', 10);
 * add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10);
 * do_action( 'woocommerce_review_before_comment_text', $comment);
 * add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10);
 * do_action( 'woocommerce_review_after_comment_text', $comment);
 
 * After content
 * do_action( 'woocommerce_after_single_product');
 * do_action( 'woocommerce_after_main_content');
 */
// * add function to zoom into the gallery of the product photos
  function web_add_woocommerce_support() {
    add_theme_support( 'woocommerce');
  }
  add_theme_support( 'wc-product-gallery-zoom');
  add_theme_support( 'wc-product-gallery-lightbox');
  add_theme_support( 'wc-product-gallery-slider');
  add_action( 'after_setup_theme', 'web_add_woocommerce_support');
  ?>
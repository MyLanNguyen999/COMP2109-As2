<?php
/**
 * Template Name: Custom Post-Type Book Layout
 * Template Post Type: Book
 */
get_header();
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<!-- //* masthead -->
<section class="post-masthead" style="background: url('<?php echo $featuredImg[0]; ?>');">
  <div>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<!-- //* class post content-->
<section class="row single-post-row-one">

  <div class="col-sm-12 col-md-8 col-lg-8 post-content">
    <p><?php echo get_the_content(); ?></p>
    <p><?php echo get_the_date(); ?></p>
    <p><?php the_tags(); ?></p>
    <p>Category: <?php echo the_category(',', '', get_the_ID()); ?></p>
  </div>

  <!-- //* create aside content -->
  <aside class="post-list col-sm-12 col-md-4 col-lg-4 row related-posts">
    <?php
    $the_query = new WP_Query(array('post_type' => 'food', 'post_per_page' => 3, 'order' => 'desc'));
    while ($the_query -> have_posts()) : $the_query -> the_post();
      ?>
      <article class="col-sm-12 col-md-12 col-lg-12">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $featuredImg[0]; ?>" alt="post featured image">
        </a>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </article>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
  </aside>
</section>

<?php
get_footer();
?>
<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>

    <!-- add JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script src="<?php echo esc_url( home_url('wp-content/themes/customtheme/assets/js/custom-js.js')); ?>"></script>

    <!-- add our custom CSS file -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo esc_url( home_url('wp-content/themes/customtheme/assets/css/custom-styles.css')); ?>">

    <!-- add our custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Shrikhand&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<header class="default-header">
  <div>
    <a href="<?php echo esc_url( home_url() );?>">
      <img src="<?php echo esc_url( home_url( 'wp-content/uploads/2024/03/logo.png' ) ); ?>" alt="header logo" id="headerLogo">
    </a>
  </div>
  <nav>
    <?php
    wp_nav_menu( array(
      'menu'           => 'main',
      'theme_location' => '',
      'depth'          => 2,
      'fallback_cb'    => false
    ));
    ?>
  </nav>
</header>
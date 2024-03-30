<footer>
  <section class="top-footer row">
    <div class="first-widget-area col-sm-12 col-md-3 col-lg-3">
      <a href="<?php echo esc_url( home_url() );?>">
        <?php dynamic_sidebar( 'footer-widget-area-one' ); ?>
      </a>
    </div>
    <div class="second-widget-area col-sm-12 col-md-3 col-lg-6">
      <?php dynamic_sidebar( 'footer-widget-area-two' ); ?>
    </div>
    <!-- <div class="third-widget-area col-sm-12 col-md-3 col-lg-3">
      <?php dynamic_sidebar( 'footer-widget-area-three' ); ?>
    </div> -->
  </section>
  <!-- <section class="bottom-footer">
    <p>Website Created by: MyLan Nguyen</p>
  </section> -->
</footer>
</body>
</html>
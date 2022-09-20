<?php

/**
 * Theme Footer
 * 
 * @package Mediterraneo
 */

//TODO: This should go in footer template part, all the links sould be rendered dynamically.
?>



<!-- Footer -->
<section class="footer">
  <footer>
    <div class="footer-content">
      <div class="social-links">
        <ul class="sci">
          <li>
            <a href="<?php echo get_option("tiktok_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/tiktok.png" alt="" /></a>
          </li>
          <li>
            <a href="<?php echo get_option("ig_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/instagram.png" alt="" /></a>
          </li>
          <li>
            <a href="<?php echo get_option("fb_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.png" alt="" /></a>
          </li>
        </ul>
      </div>

      <div class="menu-links grid-container">
        <a class="grid-item" href="/">Delivery</a>
        <a class="grid-item" href="/">About</a>
        <a class="grid-item" href="/">Contact</a>
        <a class="grid-item" href="/">FAQs</a>
        <a class="grid-item" href="/">Policy</a>
        <a class="grid-item" href="/">App</a>
        <a class="grid-item" href="/">Blog</a>
      </div>

      <div class="page-links grid-container">
        <a href="/">Careers</a>
        <a href="/">Site Map</a>
        <a href="/">Partners</a>
        <a href="/">Terms & Conditions</a>
        <a href="/">Privacy Policy</a>
        <a href="/">Cookie Notice</a>
        <a href="/">Accessibility</a>
        <a href="/">Copyright</a>
        <a href="/">GDPR</a>
      </div>

      <div class="logo-container">
        <div class="logo-text">Mediterraneo</div>
      </div>

      <div class="footer-text">
        <p>Mediterraneo Limited is a Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae qui sed nisi Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt vero placeat ab Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, perspiciatis!</p><br>
        <small>Mediterraneo Limited, registered office: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero quia fugit accusamus.</small>

      </div>
    </div>
  </footer>
</section>
<?php
wp_footer();
?>
</body>

</html>
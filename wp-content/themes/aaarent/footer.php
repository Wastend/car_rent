<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="footer" id="footer">
  <div class="container footer__top">
    <div class="footer__cols">
      <div>
        <h4>Company</h4>
        <a href="#">About</a>
        <a href="#">Newsletter</a>
        <a href="#">Jobs</a>
        <a href="#">Blog</a>
        <a href="#">Franchise</a>
      </div>
      <div>
        <h4>Travel</h4>
        <a href="#">Travel Advice</a>
        <a href="#">Check In</a>
        <a href="#">Book a rental</a>
        <a href="#">Our Cars</a>
        <a href="#">Driving Rules</a>
      </div>
      <div>
        <h4>Policies</h4>
        <a href="#">Privacy</a>
        <a href="#">Sustainability</a>
        <a href="#">Terms of Use</a>
        <a href="#">Your Data</a>
        <a href="#">GDPR</a>
      </div>
      <div>
        <h4>Contact Us</h4>
        <a href="mailto:info@aaarent.ee">info@aaarent.ee</a>
        <a href="tel:+37258065100">+372 5806 5100</a>
        <a href="#">WhatsApp Chat</a>
        <img src="<?php echo aaarent_asset('assets/google-stat.png'); ?>" alt="Google Reviews badge">
      </div>
    </div>
  </div>

  <div class="container footer__logo-row">
    <a class="logo logo--light footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo aaarent_asset('assets/logo.png'); ?>" alt="AAARent logo">
    </a>
  </div>

  <div class="container footer__bottom">
    <span>© 2026 AAARent</span>
    <div class="footer__follow">
      <span>Follow Us</span>
      <a class="footer__social" href="#" aria-label="Facebook">
        <img src="<?php echo aaarent_asset('assets/icons/facebook.svg'); ?>" alt="" aria-hidden="true">
      </a>
      <a class="footer__social" href="#" aria-label="Instagram">
        <img src="<?php echo aaarent_asset('assets/icons/inst.svg'); ?>" alt="" aria-hidden="true">
      </a>
    </div>
  </div>
</footer>
</div>
<?php get_template_part('template-parts/sections/menu-overlays'); ?>
<?php wp_footer(); ?>
</body>
</html>

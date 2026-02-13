<?php if (!defined('ABSPATH')) { exit; } ?>
<div class="menu-overlay menu-overlay--tablet is-hidden" aria-hidden="true">
  <div class="menu-overlay__inner">
    <button class="menu-overlay__close" type="button" aria-label="Close menu" data-menu-close></button>
    <a class="logo logo--light" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo aaarent_asset('assets/logo.png'); ?>" alt="AAARent logo">
    </a>
    <nav class="menu-overlay__nav" aria-label="Tablet Menu">
      <a href="#vehicles">Vehicles</a>
      <a href="#extras">Extras</a>
      <a href="#long-term">Long-term rental</a>
      <a href="#tips">Useful</a>
      <a href="#footer">Contact</a>
    </nav>
    <div class="menu-overlay__info">
      <div>
        <h4>Contact Us</h4>
        <p>info@aaarent.ee<br>Ph. +372 5806 5100<br>WhatsApp</p>
      </div>
      <div>
        <h4>Our Location</h4>
        <p>Keevise 10, Tallinn<br>Tallinn, Estonia<br>Google.Maps</p>
      </div>
    </div>
    <a class="btn btn--menu" href="#">Book Now</a>
  </div>
</div>

<div class="menu-overlay menu-overlay--mobile is-hidden" aria-hidden="true">
  <div class="menu-overlay__inner">
    <button class="menu-overlay__close" type="button" aria-label="Close menu" data-menu-close></button>
    <a class="logo logo--light" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo aaarent_asset('assets/logo.png'); ?>" alt="AAARent logo">
    </a>
    <nav class="menu-overlay__nav" aria-label="Mobile Menu">
      <a href="#vehicles">Vehicles</a>
      <a href="#extras">Extras</a>
      <a href="#long-term">Long-term rental</a>
      <a href="#tips">Useful</a>
      <a href="#footer">Contact</a>
    </nav>
    <a class="btn btn--menu" href="#">Book Now</a>
    <div class="menu-overlay__info menu-overlay__info--mobile">
      <div>
        <h4>Contact Us</h4>
        <p>info@aaarent.ee<br>Ph. +372 5806 5100<br>WhatsApp</p>
      </div>
      <div>
        <h4>Our Location</h4>
        <p>Keevise 10, Tallinn<br>Tallinn, Estonia<br>Google.Maps</p>
      </div>
    </div>
  </div>
</div>

<?php if (!defined('ABSPATH')) { exit; } ?>
<section class="airport section" id="long-term">
  <div class="airport__bg">
    <img class="airport__bg-img airport__bg-img-desktop" src="<?php echo aaarent_asset('assets/city.png'); ?>" alt="City view near airport">
    <img class="airport__bg-img airport__bg-img-tablet" src="<?php echo aaarent_asset('assets/city-tablet.png'); ?>" alt="City view near airport">
  </div>
  <div class="airport__route" aria-hidden="true">
    <img class="airport__line" src="<?php echo aaarent_asset('assets/icons/line.svg'); ?>" alt="">
    <div class="airport__icon airport__icon--airport">
      <img src="<?php echo aaarent_asset('assets/icons/plane-icon.png'); ?>" alt="">
    </div>
    <div class="airport__icon airport__icon--company">
      <img src="<?php echo aaarent_asset('assets/icons/rent-map-icon.png'); ?>" alt="">
    </div>
  </div>

  <div class="container airport__content">
    <article class="airport__card">
      <h2><span>2 minutes walk</span> from airport</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      <a href="#" class="btn btn--light">Our Contacts</a>
      <a href="#" class="btn btn--light">Open in Google.Maps</a>
    </article>
  </div>
</section>

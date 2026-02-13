<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page">
<header class="header">
  <div class="container header__inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="AAARent home">
      <img src="<?php echo aaarent_asset('assets/logo.png'); ?>" alt="AAARent logo">
    </a>

    <nav class="header__nav" aria-label="Primary">
      <a href="#vehicles">Vehicles</a>
      <a href="#extras">Extras</a>
      <a href="#long-term">Long-term rental</a>
      <a href="#tips">Useful</a>
      <a href="#footer">Contact</a>
    </nav>

    <div class="header__right">
      <div class="lang-switcher" data-lang-switcher>
        <button
          class="header__lang"
          type="button"
          aria-expanded="false"
          aria-haspopup="true"
          aria-controls="lang-menu"
          data-lang-toggle
        >
          <span data-lang-current>EN</span>
          <img class="header__lang-arrow" src="<?php echo aaarent_asset('assets/icons/arrow.svg'); ?>" alt="" aria-hidden="true">
        </button>
        <div class="lang-menu" id="lang-menu" role="menu" aria-hidden="true" data-lang-menu>
          <button class="lang-menu__option is-active" type="button" role="menuitem" data-lang-value="EN">EN</button>
          <button class="lang-menu__option" type="button" role="menuitem" data-lang-value="FR">FR</button>
        </div>
      </div>
      <a class="header__phone" href="tel:+37258065100">
        <img class="header__phone-icon" src="<?php echo aaarent_asset('assets/icons/phone.svg'); ?>" alt="" aria-hidden="true">
        <span>+372 58 065 100</span>
      </a>
      <a class="header__booking" href="#">
        <img class="header__booking-icon" src="<?php echo aaarent_asset('assets/icons/user.svg'); ?>" alt="" aria-hidden="true">
        <span>My Booking</span>
      </a>
      <button class="header__burger" type="button" aria-label="Open menu" aria-expanded="false" data-menu-toggle>
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

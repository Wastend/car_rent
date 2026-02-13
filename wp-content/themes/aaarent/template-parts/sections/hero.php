<?php if (!defined('ABSPATH')) { exit; } ?>
<section class="hero" id="top">
  <div class="hero__media">
    <img class="hero__media-img" src="<?php echo aaarent_asset('assets/hero-image.jpg'); ?>" alt="AAARent hero image">
  </div>
  <div class="hero__overlay"></div>

  <div class="container hero__content">
    <h1 class="hero__title hero__title--desktop">Car rent <span>without credit card Tallinn</span></h1>
    <h1 class="hero__title hero__title--tablet">Tallinn Airport <span>Car Rental</span></h1>

    <p class="hero__caption">Unlimited mileage. Free extra driver. No credit card needed</p>

    <form class="search-card" action="#" method="get">
      <div class="search-card__row search-card__row--desktop">
        <label class="field field--wide">
          <span>Rental dates</span>
          <select class="field__select" name="rental_dates_desktop">
            <option>30/12/2025 09:00 - 01/01/2026 10:00</option>
            <option>02/01/2026 09:00 - 05/01/2026 10:00</option>
            <option>10/01/2026 09:00 - 12/01/2026 10:00</option>
          </select>
        </label>
        <label class="field">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_from_desktop">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <label class="field">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_to_desktop">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <button class="search-card__submit" type="submit">Go</button>
      </div>

      <div class="search-card__row search-card__row--tablet">
        <label class="field field--full">
          <span>Rental dates</span>
          <select class="field__select" name="rental_dates_tablet">
            <option>30/12/2025 09:00 - 01/01/2026 10:00</option>
            <option>02/01/2026 09:00 - 05/01/2026 10:00</option>
            <option>10/01/2026 09:00 - 12/01/2026 10:00</option>
          </select>
        </label>
        <label class="field">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_from_tablet">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <label class="field">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_to_tablet">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <button class="search-card__submit" type="submit">Go</button>
      </div>

      <div class="search-card__row search-card__row--mobile">
        <label class="field field--full">
          <span>Rental dates</span>
          <select class="field__select" name="rental_dates_mobile">
            <option>30/12/2025 09:00 - 01/01/2026 10:00</option>
            <option>02/01/2026 09:00 - 05/01/2026 10:00</option>
            <option>10/01/2026 09:00 - 12/01/2026 10:00</option>
          </select>
        </label>
        <label class="field field--full">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_from_mobile">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <label class="field field--full">
          <span>Pick Up</span>
          <select class="field__select" name="pickup_to_mobile">
            <option>Tallinn Ferry Port D-Term</option>
            <option>Tallinn Airport</option>
            <option>Tallinn City Center</option>
          </select>
        </label>
        <button class="search-card__submit search-card__submit--mobile" type="submit">Continue</button>
      </div>
    </form>

    <p class="hero__pay-note">Book today. Pay 100% at the counter</p>
  </div>
</section>

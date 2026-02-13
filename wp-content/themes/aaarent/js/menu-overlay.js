(function () {
  var toggle = document.querySelector('[data-menu-toggle]');
  if (!toggle) return;

  var overlayTablet = document.querySelector('.menu-overlay--tablet');
  var overlayMobile = document.querySelector('.menu-overlay--mobile');
  var activeOverlay = null;

  function getOverlayByViewport() {
    if (window.matchMedia('(max-width: 767px)').matches) {
      return overlayMobile;
    }
    if (window.matchMedia('(max-width: 1199px)').matches) {
      return overlayTablet;
    }
    return null;
  }

  function setOpenState(isOpen) {
    toggle.setAttribute('aria-expanded', String(isOpen));
    document.body.classList.toggle('menu-open', isOpen);
  }

  function closeMenu() {
    if (!activeOverlay) return;

    var closingOverlay = activeOverlay;
    closingOverlay.classList.remove('is-active');
    closingOverlay.classList.add('is-closing');
    setOpenState(false);
    activeOverlay = null;

    function finishClose() {
      closingOverlay.classList.add('is-hidden');
      closingOverlay.classList.remove('is-closing');
      closingOverlay.setAttribute('aria-hidden', 'true');
    }

    function onTransitionEnd(event) {
      if (event.target !== closingOverlay || event.propertyName !== 'transform') return;
      finishClose();
      closingOverlay.removeEventListener('transitionend', onTransitionEnd);
    }

    closingOverlay.addEventListener('transitionend', onTransitionEnd);
    setTimeout(function () {
      if (closingOverlay.classList.contains('is-closing')) {
        finishClose();
        closingOverlay.removeEventListener('transitionend', onTransitionEnd);
      }
    }, 450);
  }

  function openMenu() {
    var targetOverlay = getOverlayByViewport();
    if (!targetOverlay) return;

    targetOverlay.classList.remove('is-hidden');
    targetOverlay.classList.remove('is-closing');
    targetOverlay.setAttribute('aria-hidden', 'false');
    requestAnimationFrame(function () {
      targetOverlay.classList.add('is-active');
      activeOverlay = targetOverlay;
      setOpenState(true);
    });
  }

  toggle.addEventListener('click', function () {
    if (activeOverlay) closeMenu();
    else openMenu();
  });

  [overlayTablet, overlayMobile].forEach(function (overlay) {
    if (!overlay) return;

    overlay.addEventListener('click', function (event) {
      if (event.target === overlay) {
        closeMenu();
      }
    });

    var closeButton = overlay.querySelector('[data-menu-close]');
    if (closeButton) {
      closeButton.addEventListener('click', closeMenu);
    }

    var menuLinks = overlay.querySelectorAll('a[href^="#"]');
    menuLinks.forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeMenu();
    }
  });

  window.addEventListener('resize', function () {
    if (!activeOverlay) return;

    var targetOverlay = getOverlayByViewport();
    if (targetOverlay === activeOverlay) return;

    closeMenu();
  });
})();

(function () {
  var switcher = document.querySelector('[data-lang-switcher]');
  if (!switcher) return;

  var toggle = switcher.querySelector('[data-lang-toggle]');
  var menu = switcher.querySelector('[data-lang-menu]');
  var current = switcher.querySelector('[data-lang-current]');
  var options = switcher.querySelectorAll('[data-lang-value]');

  function setOpen(isOpen) {
    menu.classList.toggle('is-open', isOpen);
    menu.setAttribute('aria-hidden', String(!isOpen));
    toggle.setAttribute('aria-expanded', String(isOpen));
  }

  toggle.addEventListener('click', function (event) {
    event.stopPropagation();
    setOpen(!menu.classList.contains('is-open'));
  });

  options.forEach(function (option) {
    option.addEventListener('click', function () {
      var lang = option.getAttribute('data-lang-value');
      current.textContent = lang;
      options.forEach(function (item) {
        item.classList.toggle('is-active', item === option);
      });
      setOpen(false);
    });
  });

  document.addEventListener('click', function (event) {
    if (!switcher.contains(event.target)) {
      setOpen(false);
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      setOpen(false);
    }
  });
})();

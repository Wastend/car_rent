(function () {
  var items = document.querySelectorAll('.tips__item');
  if (!items.length) return;

  items.forEach(function (item) {
    var button = item.querySelector('.tips__question');
    var answer = item.querySelector('.tips__answer');
    if (!button || !answer) return;

    function closeAnswer() {
      button.setAttribute('aria-expanded', 'false');
      answer.classList.remove('is-open');
      answer.style.maxHeight = answer.scrollHeight + 'px';
      requestAnimationFrame(function () {
        answer.style.maxHeight = '0px';
      });
      answer.addEventListener('transitionend', function onEnd(event) {
        if (event.propertyName !== 'max-height') return;
        answer.hidden = true;
        answer.removeEventListener('transitionend', onEnd);
      });
    }

    function openAnswer() {
      button.setAttribute('aria-expanded', 'true');
      answer.hidden = false;
      answer.classList.add('is-open');
      answer.style.maxHeight = '0px';
      requestAnimationFrame(function () {
        answer.style.maxHeight = answer.scrollHeight + 'px';
      });
    }

    button.addEventListener('click', function () {
      var isOpen = button.getAttribute('aria-expanded') === 'true';

      if (isOpen) closeAnswer();
      else openAnswer();
    });
  });

  window.addEventListener('resize', function () {
    var opened = document.querySelectorAll('.tips__question[aria-expanded="true"]');
    if (!opened.length) return;

    opened.forEach(function (button) {
      var answer = button.closest('.tips__item').querySelector('.tips__answer');
      if (!answer) return;
      answer.style.maxHeight = answer.scrollHeight + 'px';
    });
  });
})();

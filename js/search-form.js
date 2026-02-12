(function () {
  var form = document.querySelector('.search-card');
  if (!form) return;

  function getVisibleRow() {
    var rows = form.querySelectorAll('.search-card__row');
    for (var i = 0; i < rows.length; i += 1) {
      if (window.getComputedStyle(rows[i]).display !== 'none') {
        return rows[i];
      }
    }
    return rows[0] || null;
  }

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    var row = getVisibleRow();
    if (!row) return;

    var fields = row.querySelectorAll('.field');
    if (fields.length < 3) return;

    var rentalDates = fields[0].querySelector('.field__select').value;
    var pickupFrom = fields[1].querySelector('.field__select').value;
    var pickupTo = fields[2].querySelector('.field__select').value;

    alert(
      'Rental dates: ' + rentalDates + '\n' +
      'Pick up (from): ' + pickupFrom + '\n' +
      'Pick up (to): ' + pickupTo
    );
  });
})();

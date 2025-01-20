document.addEventListener('DOMContentLoaded', function () {
  const inputs = document.querySelectorAll('.form-control');

  inputs.forEach(function (input) {
    input.addEventListener('change', function (event) {
      formValidation();
    });

    input.addEventListener('click', function (event) {
      formValidation();
    });

    input.addEventListener('keyup', function (event) {
      formValidation();
    });
  });
});

function formValidation() {
  const name = document.getElementById('name').value;
  const brand = document.getElementById('brand').value;
  const ean = document.getElementById('ean').value;
  const measurement_unit = document.getElementById('measurement_unit').value;
  const purchase_price = document.getElementById('purchase_price').value;
  const sale_price = document.getElementById('sale_price').value;
  const stock_quantity = document.getElementById('stock_quantity').value;
  const minimum_stock = document.getElementById('minimum_stock').value;
  const image = document.getElementById('image').value;
  const status = document.getElementById('status').value;
  const description = document.getElementById('description').value;
  const observation = document.getElementById('observation').value;
  const submitButton = document.getElementById('submitButton');

  if (
    name.length > 5 &&
    brand.length > 3 &&
    ean != '' &&
    measurement_unit != '' &&
    purchase_price != '' &&
    sale_price != '' &&
    stock_quantity > 0 &&
    minimum_stock > 0 &&
    image != '' &&
    description.length > 20
  ) {
    submitButton.removeAttribute('disabled');
  } else {
    submitButton.setAttribute('disabled', 'disabled');
  }
}

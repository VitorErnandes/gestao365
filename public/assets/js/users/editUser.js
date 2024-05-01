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
  const email = document.getElementById('email').value;
  const submitButton = document.getElementById('submitButton');

  if (name.length > 2 && isValidEmail(email)) {
    submitButton.removeAttribute('disabled');
  } else {
    submitButton.setAttribute('disabled', 'disabled');
  }
}

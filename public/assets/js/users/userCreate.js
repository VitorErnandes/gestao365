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
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  const submitButton = document.getElementById('submitButton');

  if (name.length > 2 && isValidEmail(email) && password == confirmPassword && password.length > 5) {
    submitButton.removeAttribute('disabled');
  } else {
    submitButton.setAttribute('disabled', 'disabled');
  }
}

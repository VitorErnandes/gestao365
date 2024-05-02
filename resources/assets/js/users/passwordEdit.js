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
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  const submitButton = document.getElementById('submitButton');

  if (password.length > 5 && password == confirmPassword) {
    submitButton.removeAttribute('disabled');
  } else {
    submitButton.setAttribute('disabled', 'disabled');
  }
}

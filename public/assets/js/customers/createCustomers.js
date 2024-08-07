document.addEventListener('DOMContentLoaded', function () {
  const inputs = document.querySelectorAll('.form-control');
  const customerType = document.getElementById('customerType');

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

  customerType.addEventListener('change', function (event) {
    custumerTypeValidation(this);
  });

  customerType.dispatchEvent(new Event('change'));

  document.getElementById('cep').addEventListener('change', function (event) {
    cepValidation(this);
  });
});

function formValidation() {}

function custumerTypeValidation(e) {
  const physicalCustomer = document.getElementById('physicalCustomer');
  const legalCustomer = document.getElementById('legalCustomer');

  if (e.value == 2) {
    physicalCustomer.classList.add('d-none');
    legalCustomer.classList.remove('d-none');
  } else {
    legalCustomer.classList.add('d-none');
    physicalCustomer.classList.remove('d-none');
  }
}

function cepValidation(e) {
  const url = 'https://viacep.com.br/ws/' + e.value + '/json/';

  $.ajax({
    type: 'get',
    url: url,
    dataType: 'JSON',
    success: function (response) {
      document.getElementById('address').value = response.logradouro;
      document.getElementById('neighborhood').value = response.bairro;
      document.getElementById('city').value = response.localidade;
      document.getElementById('uf').value = response.uf;
    },
    error: function (error) {
      alert('CEPwwwww inválido. ' + error.responseText);
    }
  });
}

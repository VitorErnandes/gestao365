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

function custumerTypeValidation(e) {
  const physicalCustomer = document.getElementById('physicalCustomer');
  const legalCustomer = document.getElementById('legalCustomer');
  const physicalInputs = physicalCustomer.querySelectorAll('input, select');
  const legalInputs = legalCustomer.querySelectorAll('input, select');

  if (e.value == 2) {
    physicalCustomer.classList.add('d-none');
    legalCustomer.classList.remove('d-none');

    physicalInputs.forEach(input => {
      input.removeAttribute('required');
      input.setAttribute('disabled', 'true');
      input.removeAttribute('name');
    });

    legalInputs.forEach(input => {
      input.setAttribute('required', 'true');
      input.removeAttribute('disabled');
      input.setAttribute('name', input.id);
    });
  } else {
    legalCustomer.classList.add('d-none');
    physicalCustomer.classList.remove('d-none');

    legalInputs.forEach(input => {
      input.removeAttribute('required');
      input.setAttribute('disabled', 'true');
      input.removeAttribute('name');
    });

    physicalInputs.forEach(input => {
      input.setAttribute('required', 'true');
      input.removeAttribute('disabled');
      input.setAttribute('name', input.id);
    });
  }
}

function cepValidation(e) {
  const url = 'https://viacep.com.br/ws/' + e.value + '/json/';

  $.ajax({
    type: 'get',
    url: url,
    dataType: 'JSON',
    success: function (response) {
      document.getElementById('address').value = !response.erro ? response.logradouro : '';
      document.getElementById('neighborhood').value = !response.erro ? response.bairro : '';
      document.getElementById('city').value = !response.erro ? response.localidade : '';
      document.getElementById('uf').value = !response.erro ? response.uf : '';
    },
    error: function (error) {
      alert('CEP inválido.');
    }
  });
}

function formValidation() {
  const customerType = document.getElementById('customerType').value;

  // Campos para cliente físico
  const name = document.getElementById('name').value.trim();
  const birthdayDate = document.getElementById('birthdayDate').value.trim();
  const gender = document.getElementById('gender').value;
  const cpf = document.getElementById('cpf').value.trim();
  const rg = document.getElementById('rg').value.trim();
  const maritalStatus = document.getElementById('maritalStatus').value;

  // Campos para cliente jurídico
  const fantasyName = document.getElementById('fantasyName').value.trim();
  const companyFounding = document.getElementById('companyFounding').value.trim();
  const cnpj = document.getElementById('cnpj').value.trim();
  const ie = document.getElementById('ie').value.trim();

  // Campos comuns (endereço e observação)
  const cep = document.getElementById('cep').value.trim();
  const address = document.getElementById('address').value.trim();
  const numberAddress = document.getElementById('numberAddress').value.trim();
  const neighborhood = document.getElementById('neighborhood').value.trim();
  const city = document.getElementById('city').value.trim();
  const uf = document.getElementById('uf').value.trim();
  const observation = document.getElementById('observation').value.trim();
  const submitButton = document.getElementById('submitButton');

  let validationVar = true;

  // Validação de cliente físico
  if (customerType == 1) {
    if (
      name.length <= 5 ||
      !isValidDate(birthdayDate) ||
      gender === '' ||
      !isValidCPF(cpf) ||
      rg.length < 5 ||
      maritalStatus === ''
    ) {
      validationVar = false;
    }
  }
  // Validação de cliente jurídico
  else {
    if (fantasyName.length <= 5 || !isValidDate(companyFounding) || !isValidCNPJ(cnpj) || ie.length < 9) {
      validationVar = false;
    }
  }

  // Validação de campos comuns (endereço e observação)
  if (
    cep.length !== 8 ||
    address.length < 5 ||
    numberAddress === '' ||
    neighborhood.length < 3 ||
    city.length < 3 ||
    uf.length !== 2
  ) {
    validationVar = false;
  }

  // Habilitar ou desabilitar o botão de submit
  if (validationVar) {
    submitButton.setAttribute('disabled', 'disabled');
  } else {
    submitButton.removeAttribute('disabled');
  }
}

// Função para validar data (formato DD/MM/AAAA)
function isValidDate(date) {
  const regex = /^\d{2}\/\d{2}\/\d{4}$/;
  if (!regex.test(date)) return false;

  const [day, month, year] = date.split('/').map(Number);
  const dateObj = new Date(year, month - 1, day);
  return dateObj.getFullYear() === year && dateObj.getMonth() === month - 1 && dateObj.getDate() === day;
}

// Função para validar CPF (simplificada)
function isValidCPF(cpf) {
  if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

  let sum = 0,
    remainder;

  for (let i = 1; i <= 9; i++) sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);

  remainder = (sum * 10) % 11;

  if (remainder === 10 || remainder === 11) remainder = 0;

  if (remainder !== parseInt(cpf.substring(9, 10))) return false;

  sum = 0;

  for (let i = 1; i <= 10; i++) sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);

  remainder = (sum * 10) % 11;

  if (remainder === 10 || remainder === 11) remainder = 0;

  return remainder === parseInt(cpf.substring(10, 11));
}

// Função para validar CNPJ (simplificada)
function isValidCNPJ(cnpj) {
  if (cnpj.length !== 14 || /^(\d)\1+$/.test(cnpj)) return false;

  let length = cnpj.length - 2;
  let numbers = cnpj.substring(0, length);
  let digits = cnpj.substring(length);
  let sum = 0;
  let pos = length - 7;

  for (let i = length; i >= 1; i--) {
    sum += numbers.charAt(length - i) * pos--;

    if (pos < 2) pos = 9;
  }

  let result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

  if (result != digits.charAt(0)) return false;

  length = length + 1;
  numbers = cnpj.substring(0, length);
  sum = 0;
  pos = length - 7;

  for (let i = length; i >= 1; i--) {
    sum += numbers.charAt(length - i) * pos--;

    if (pos < 2) pos = 9;
  }

  result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

  return result === digits.charAt(1);
}

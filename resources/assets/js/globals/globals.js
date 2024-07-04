window.setTimeout(function () {
  $('.alert')
    .fadeTo(500, 0)
    .slideUp(500, function () {
      $(this).remove();
    });
}, 10000);

document.addEventListener('DOMContentLoaded', function () {
  const moneyInputs = document.querySelectorAll('.money');

  moneyInputs.forEach(function (input) {
    input.addEventListener('input', function () {
      maskMoney(input);
    });
  });

  /**
   * Função recebe o input e o trata com uma mascara monetaria no padrao #.###,##
   */
  function maskMoney(input) {
    valor = input.value;

    const valueAsNumber = valor.replace(/\D+/g, '');
    valorFinal = new Intl.NumberFormat('pt-BR', {
      minimumFractionDigits: 2
    }).format(valueAsNumber / 100);

    $(input).val(valorFinal);
  }
});

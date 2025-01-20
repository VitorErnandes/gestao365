function deactivateCustomer(e) {
  const customer = e.value;
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  Swal.fire({
    title: 'Confirmação',
    html: 'Realmente deseja desativar este cliente?',
    showCancelButton: true,
    confirmButtonColor: '#C82333'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        url: window.location.href + '/' + customer,
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        data: { _method: 'delete' }
      }).always(function () {
        window.location.reload();
      });
    }
  });
}

function deactivateProductGroup(e) {
  const group = e.value;
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  Swal.fire({
    title: 'Confirmação',
    html: 'Realmente deseja desativar este grupo de produtos?',
    showCancelButton: true,
    confirmButtonColor: '#C82333'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        url: window.location.href + '/' + group,
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

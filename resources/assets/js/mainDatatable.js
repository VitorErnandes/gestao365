window.onload = async function () {
  await startDatatables();

  await stylizingDatatables();
};

async function startDatatables() {
  $('#mainTable').DataTable({
    paging: false,
    scrollY: '70vh',
    dom: '<"card-header d-flex flex-wrap py-3"<"me-5 ms-n2"f><"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end gap-3 gap-sm-2 flex-wrap flex-sm-nowrap"lB>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    language: {
      emptyTable: 'Nenhum registro encontrado',
      info: 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
      infoFiltered: '(Filtrados de _MAX_ registros)',
      infoThousands: '.',
      loadingRecords: 'Carregando...',
      zeroRecords: 'Nenhum registro encontrado',
      search: '',
      paginate: {
        next: 'Próximo',
        previous: 'Anterior',
        first: 'Primeiro',
        last: 'Último'
      },
      aria: {
        sortAscending: ': Ordenar colunas de forma ascendente',
        sortDescending: ': Ordenar colunas de forma descendente'
      },
      select: {
        rows: {
          _: 'Selecionado %d linhas',
          1: 'Selecionado 1 linha'
        },
        cells: {
          1: '1 célula selecionada',
          _: '%d células selecionadas'
        },
        columns: {
          1: '1 coluna selecionada',
          _: '%d colunas selecionadas'
        }
      },
      buttons: {
        copySuccess: {
          1: 'Uma linha copiada com sucesso',
          _: '%d linhas copiadas com sucesso'
        },
        collection: 'Coleção  <span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span>',
        colvis: 'Visibilidade da Coluna',
        colvisRestore: 'Restaurar Visibilidade',
        copy: 'Copiar',
        copyKeys:
          'Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..',
        copyTitle: 'Copiar para a Área de Transferência',
        csv: 'CSV',
        excel: 'Excel',
        pageLength: {
          '-1': 'Mostrar todos os registros',
          _: 'Mostrar %d registros'
        },
        pdf: 'PDF',
        print: 'Imprimir',
        createState: 'Criar estado',
        removeAllStates: 'Remover todos os estados',
        removeState: 'Remover',
        renameState: 'Renomear',
        savedStates: 'Estados salvos',
        stateRestore: 'Estado %d',
        updateState: 'Atualizar'
      },
      autoFill: {
        cancel: 'Cancelar',
        fill: 'Preencher todas as células com',
        fillHorizontal: 'Preencher células horizontalmente',
        fillVertical: 'Preencher células verticalmente'
      },
      lengthMenu: 'Exibir _MENU_ resultados por página',
      searchBuilder: {
        add: 'Adicionar Condição',
        button: {
          0: 'Construtor de Pesquisa',
          _: 'Construtor de Pesquisa (%d)'
        },
        clearAll: 'Limpar Tudo',
        condition: 'Condição',
        conditions: {
          date: {
            after: 'Depois',
            before: 'Antes',
            between: 'Entre',
            empty: 'Vazio',
            equals: 'Igual',
            not: 'Não',
            notBetween: 'Não Entre',
            notEmpty: 'Não Vazio'
          },
          number: {
            between: 'Entre',
            empty: 'Vazio',
            equals: 'Igual',
            gt: 'Maior Que',
            gte: 'Maior ou Igual a',
            lt: 'Menor Que',
            lte: 'Menor ou Igual a',
            not: 'Não',
            notBetween: 'Não Entre',
            notEmpty: 'Não Vazio'
          },
          string: {
            contains: 'Contém',
            empty: 'Vazio',
            endsWith: 'Termina Com',
            equals: 'Igual',
            not: 'Não',
            notEmpty: 'Não Vazio',
            startsWith: 'Começa Com',
            notContains: 'Não contém',
            notStartsWith: 'Não começa com',
            notEndsWith: 'Não termina com'
          },
          array: {
            contains: 'Contém',
            empty: 'Vazio',
            equals: 'Igual à',
            not: 'Não',
            notEmpty: 'Não vazio',
            without: 'Não possui'
          }
        },
        data: 'Data',
        deleteTitle: 'Excluir regra de filtragem',
        logicAnd: 'E',
        logicOr: 'Ou',
        title: {
          0: 'Construtor de Pesquisa',
          _: 'Construtor de Pesquisa (%d)'
        },
        value: 'Valor',
        leftTitle: 'Critérios Externos',
        rightTitle: 'Critérios Internos'
      },
      searchPanes: {
        clearMessage: 'Limpar Tudo',
        collapse: {
          0: 'Painéis de Pesquisa',
          _: 'Painéis de Pesquisa (%d)'
        },
        count: '{total}',
        countFiltered: '{shown} ({total})',
        emptyPanes: 'Nenhum Painel de Pesquisa',
        loadMessage: 'Carregando Painéis de Pesquisa...',
        title: 'Filtros Ativos',
        showMessage: 'Mostrar todos',
        collapseMessage: 'Fechar todos'
      },
      thousands: '.',
      datetime: {
        previous: 'Anterior',
        next: 'Próximo',
        hours: 'Hora',
        minutes: 'Minuto',
        seconds: 'Segundo',
        amPm: ['am', 'pm'],
        unknown: '-',
        months: {
          0: 'Janeiro',
          1: 'Fevereiro',
          10: 'Novembro',
          11: 'Dezembro',
          2: 'Março',
          3: 'Abril',
          4: 'Maio',
          5: 'Junho',
          6: 'Julho',
          7: 'Agosto',
          8: 'Setembro',
          9: 'Outubro'
        },
        weekdays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb']
      },
      editor: {
        close: 'Fechar',
        create: {
          button: 'Novo',
          submit: 'Criar',
          title: 'Criar novo registro'
        },
        edit: {
          button: 'Editar',
          submit: 'Atualizar',
          title: 'Editar registro'
        },
        error: {
          system: 'Ocorreu um erro no sistema (<a target="\\" rel="nofollow" href="\\">Mais informações</a>).'
        },
        multi: {
          noMulti: 'Essa entrada pode ser editada individualmente, mas não como parte do grupo',
          restore: 'Desfazer alterações',
          title: 'Multiplos valores',
          info: 'Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais.'
        },
        remove: {
          button: 'Remover',
          confirm: {
            _: 'Tem certeza que quer deletar %d linhas?',
            1: 'Tem certeza que quer deletar 1 linha?'
          },
          submit: 'Remover',
          title: 'Remover registro'
        }
      },
      decimal: ',',
      stateRestore: {
        creationModal: {
          button: 'Criar',
          columns: {
            search: 'Busca de colunas',
            visible: 'Visibilidade da coluna'
          },
          name: 'Nome:',
          order: 'Ordernar',
          paging: 'Paginação',
          scroller: 'Posição da barra de rolagem',
          search: 'Busca',
          searchBuilder: 'Mecanismo de busca',
          select: 'Selecionar',
          title: 'Criar novo estado',
          toggleLabel: 'Inclui:'
        },
        emptyStates: 'Nenhum estado salvo',
        removeConfirm: 'Confirma remover %s?',
        removeJoiner: 'e',
        removeSubmit: 'Remover',
        removeTitle: 'Remover estado',
        renameButton: 'Renomear',
        renameLabel: 'Novo nome para %s:',
        renameTitle: 'Renomear estado',
        duplicateError: 'Já existe um estado com esse nome!',
        emptyError: 'Não pode ser vazio!',
        removeError: 'Falha ao remover estado!'
      },
      infoEmpty: 'Mostrando 0 até 0 de 0 registro(s)',
      processing: 'Carregando...',
      searchPlaceholder: 'Buscar registros'
    },
    buttons: [
      {
        extend: 'collection',
        className: 'btn btn-secondary dropdown-toggle ms-sm-0 me-3',
        text: 'Exportar',
        buttons: [
          {
            extend: 'print',
            text: '<i class="bx bx-printer me-2" ></i>Print',
            className: 'dropdown-item',
            exportOptions: {
              columns: ':not(:last-child)',
              format: {
                body: function (e, t, s) {
                  var a;
                  return e.length <= 0
                    ? e
                    : ((e = $.parseHTML(e)),
                      (a = ''),
                      $.each(e, function (e, t) {
                        void 0 !== t.classList && t.classList.contains('customer-name')
                          ? (a += t.lastChild.firstChild.textContent)
                          : void 0 === t.innerText
                          ? (a += t.textContent)
                          : (a += t.innerText);
                      }),
                      a);
                }
              }
            },
            customize: function (e) {
              $(e.document.body).css('color', a).css('border-color', t).css('background-color', s),
                $(e.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
            }
          },
          {
            extend: 'csv',
            text: '<i class="bx bx-file me-2" ></i>Csv',
            className: 'dropdown-item',
            exportOptions: {
              columns: ':not(:last-child)',
              format: {
                body: function (e, t, s) {
                  var a;
                  return e.length <= 0
                    ? e
                    : ((e = $.parseHTML(e)),
                      (a = ''),
                      $.each(e, function (e, t) {
                        void 0 !== t.classList && t.classList.contains('customer-name')
                          ? (a += t.lastChild.firstChild.textContent)
                          : void 0 === t.innerText
                          ? (a += t.textContent)
                          : (a += t.innerText);
                      }),
                      a);
                }
              }
            }
          },
          {
            extend: 'excel',
            text: '<i class="bx bxs-file-export me-2"></i>Excel',
            className: 'dropdown-item',
            exportOptions: {
              columns: ':not(:last-child)',
              format: {
                body: function (e, t, s) {
                  var a;
                  return e.length <= 0
                    ? e
                    : ((e = $.parseHTML(e)),
                      (a = ''),
                      $.each(e, function (e, t) {
                        void 0 !== t.classList && t.classList.contains('customer-name')
                          ? (a += t.lastChild.firstChild.textContent)
                          : void 0 === t.innerText
                          ? (a += t.textContent)
                          : (a += t.innerText);
                      }),
                      a);
                }
              }
            }
          },
          {
            extend: 'pdf',
            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
            className: 'dropdown-item',
            exportOptions: {
              columns: ':not(:last-child)',
              format: {
                body: function (e, t, s) {
                  var a;
                  return e.length <= 0
                    ? e
                    : ((e = $.parseHTML(e)),
                      (a = ''),
                      $.each(e, function (e, t) {
                        void 0 !== t.classList && t.classList.contains('customer-name')
                          ? (a += t.lastChild.firstChild.textContent)
                          : void 0 === t.innerText
                          ? (a += t.textContent)
                          : (a += t.innerText);
                      }),
                      a);
                }
              }
            }
          },
          {
            extend: 'copy',
            text: '<i class="bx bx-copy me-2" ></i>Copy',
            className: 'dropdown-item',
            exportOptions: {
              columns: ':not(:last-child)',
              format: {
                body: function (e, t, s) {
                  var a;
                  return e.length <= 0
                    ? e
                    : ((e = $.parseHTML(e)),
                      (a = ''),
                      $.each(e, function (e, t) {
                        void 0 !== t.classList && t.classList.contains('customer-name')
                          ? (a += t.lastChild.firstChild.textContent)
                          : void 0 === t.innerText
                          ? (a += t.textContent)
                          : (a += t.innerText);
                      }),
                      a);
                }
              }
            }
          }
        ]
      },
      {
        text: '<span class="d-sm-inline-block">Adicionar</span>',
        className: 'add-new btn btn-primary',
        attr: {
          'data-bs-toggle': 'offcanvas',
          'data-bs-target': '#offcanvasEcommerceCustomerAdd'
        },
        action: function () {
          window.location.href = window.location.href + '/create';
        }
      }
    ],
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (e) {
            return 'Details of ' + e.data().customer;
          }
        }),
        type: 'column',
        renderer: function (e, t, s) {
          s = $.map(s, function (e, t) {
            return '' !== e.title
              ? '<tr data-dt-row="' +
                  e.rowIndex +
                  '" data-dt-column="' +
                  e.columnIndex +
                  '"><td>' +
                  e.title +
                  ':</td> <td>' +
                  e.data +
                  '</td></tr>'
              : '';
          }).join('');
          return !!s && $('<table class="table"/><tbody />').append(s);
        }
      }
    }
  });
}

async function stylizingDatatables() {
  $('.dataTables_length').addClass('mt-0 mt-md-3 me-2');
  $('.dt-action-buttons').addClass('pt-0');
  $('.dt-buttons').addClass('d-flex flex-wrap mb-2');
  $('.dt-buttons').removeClass('dt-buttons');
  $('.card-header').addClass('justify-content-between');

  $('.dataTables_filter .form-control').removeClass('form-control-sm');
  $('#dt-search-0').addClass('mb-2').removeClass('form-control-sm');
  $('.dataTables_length .form-select').removeClass('form-select-sm');
}

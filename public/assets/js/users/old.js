'use strict';
$(function () {
  let t, s, a;
  a = (
    isDarkStyle
      ? ((t = config.colors_dark.borderColor), (s = config.colors_dark.bodyBg), config.colors_dark)
      : ((t = config.colors.borderColor), (s = config.colors.bodyBg), config.colors)
  ).headingColor;
  var e,
    n = $('.datatables-customers'),
    o = $('.select2');
  o.length &&
    (o = o).wrap('<div class="position-relative"></div>').select2({
      placeholder: 'United States ',
      dropdownParent: o.parent()
    }),
    n.length &&
      ((e = n.DataTable({
        ajax: assetsPath + 'json/ecommerce-customer-all.json',
        columns: [
          {
            data: ''
          },
          {
            data: 'id'
          },
          {
            data: 'customer'
          },
          {
            data: 'customer_id'
          },
          {
            data: 'country'
          },
          {
            data: 'order'
          },
          {
            data: 'total_spent'
          }
        ],
        columnDefs: [
          {
            className: 'control',
            searchable: !1,
            orderable: !1,
            responsivePriority: 2,
            targets: 0,
            render: function (e, t, s, a) {
              return '';
            }
          },
          {
            targets: 1,
            orderable: !1,
            searchable: !1,
            responsivePriority: 3,
            checkboxes: !0,
            checkboxes: {
              selectAllRender: '<input type="checkbox" class="form-check-input">'
            },
            render: function () {
              return '<input type="checkbox" class="dt-checkboxes form-check-input">';
            }
          },
          {
            targets: 2,
            responsivePriority: 1,
            render: function (e, t, s, a) {
              var n = s.customer,
                o = s.email,
                r = s.image;
              return (
                '<div class="d-flex justify-content-start align-items-center customer-name"><div class="avatar-wrapper"><div class="avatar me-2">' +
                (r
                  ? '<img src="' + assetsPath + 'img/avatars/' + r + '" alt="Avatar" class="rounded-circle">'
                  : '<span class="avatar-initial rounded-circle bg-label-' +
                    ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'][
                      Math.floor(6 * Math.random())
                    ] +
                    '">' +
                    (r = (
                      ((r = (n = s.customer).match(/\b\w/g) || []).shift() || '') + (r.pop() || '')
                    ).toUpperCase()) +
                    '</span>') +
                '</div></div><div class="d-flex flex-column"><a href="app-ecommerce-customer-details-overview.html" ><span class="fw-medium">' +
                n +
                '</span></a><small class="text-muted">' +
                o +
                '</small></div></div>'
              );
            }
          },
          {
            targets: 3,
            render: function (e, t, s, a) {
              return "<span class='fw-medium text-heading'>#" + s.customer_id + '</span>';
            }
          },
          {
            targets: 4,
            render: function (e, t, s, a) {
              var n = s.country,
                s = s.country_code;
              return (
                '<div class="d-flex justify-content-start align-items-center customer-country"><div>' +
                (s
                  ? `<i class ="fis fi fi-${s} rounded-circle me-2 fs-3"></i>`
                  : '<i class ="fis fi fi-xx rounded-circle me-2 fs-3"></i>') +
                '</div><div><span>' +
                n +
                '</span></div></div>'
              );
            }
          },
          {
            targets: 5,
            render: function (e, t, s, a) {
              return '<span>' + s.order + '</span>';
            }
          },
          {
            targets: 6,
            render: function (e, t, s, a) {
              return '<span class="fw-medium text-heading">' + s.total_spent + '</span>';
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header d-flex flex-wrap py-3"<"me-5 ms-n2"f><"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end gap-3 gap-sm-2 flex-wrap flex-sm-nowrap"lB>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        language: {
          sLengthMenu: '_MENU_',
          search: '',
          searchPlaceholder: 'Search Order'
        },
        buttons: [
          {
            extend: 'collection',
            className: 'btn btn-label-secondary dropdown-toggle ms-sm-0 me-3',
            text: '<i class="bx bx-export me-1"></i>Export',
            buttons: [
              {
                extend: 'print',
                text: '<i class="bx bx-printer me-2" ></i>Print',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [1, 2, 3, 4, 5, 6],
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
                  columns: [1, 2, 3, 4, 5, 6],
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
                  columns: [1, 2, 3, 4, 5, 6],
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
                  columns: [1, 2, 3, 4, 5, 6],
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
                  columns: [1, 2, 3, 4, 5, 6],
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
            text: '<i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Customer</span>',
            className: 'add-new btn btn-primary',
            attr: {
              'data-bs-toggle': 'offcanvas',
              'data-bs-target': '#offcanvasEcommerceCustomerAdd'
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
      })),
      $('.dataTables_length').addClass('mt-0 mt-md-3 me-2'),
      $('.dt-action-buttons').addClass('pt-0'),
      $('.dt-buttons > .btn-group > button').removeClass('btn-secondary'),
      $('.dt-buttons').addClass('d-flex flex-wrap')),
    $('.datatables-customers tbody').on('click', '.delete-record', function () {
      e.row($(this).parents('tr')).remove().draw();
    }),
    setTimeout(() => {
      $('.dataTables_filter .form-control').removeClass('form-control-sm'),
        $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);
}),
  (function () {
    var e = document.querySelectorAll('.phone-mask'),
      t = document.getElementById('eCommerceCustomerAddForm');
    e &&
      e.forEach(function (e) {
        new Cleave(e, {
          phone: !0,
          phoneRegionCode: 'US'
        });
      }),
      FormValidation.formValidation(t, {
        fields: {
          customerName: {
            validators: {
              notEmpty: {
                message: 'Please enter fullname '
              }
            }
          },
          customerEmail: {
            validators: {
              notEmpty: {
                message: 'Please enter your email'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: function (e, t) {
              return '.mb-3';
            }
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        }
      });
  })();

"use strict";
// Class definition

var KTDatatableAutoColumnHideDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL + '/shops/list-shops',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false
            },

            // column sorting
            sortable: true,
            pagination: true,
            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [
                {
                    field: 'supplier_id',
                    title: 'Proveedor',
                    sortable: 'asc',
                    template: function (row) {
                        return row.supplier.supplier;                    }
                },
                {
                    field: 'product_id',
                    title: 'Producto',
                    sortable: 'asc',
                    template: function (row) {
                        return row.product.nombre;                    }
                },
                
                {
                    field: 'amount',
                    title: 'Cantidad',
                    sortable: 'asc',
                    template: function (row) {

                        return row.amount;

                    }
                }
                ,
                {
                    field: 'fecha_compra',
                    title: 'Fecha de compra',
                    sortable: 'asc',
                    template: function (row) {

                        return row.fecha_compra;

                    }
                },
            
                {
                    field: 'status',
                    title: 'Status',
                    template: function (row) {
                        var status = {
                            Solicitada: {
                                'title': 'Solicitada',
                                'class': 'label-light-primary'
                            },
                            Entregada: {
                                'title': 'Entregada',
                                'class': 'label-light-danger'
                            }
                        };

                        return "<span class='label font-weight-bold label-lg " + status[row.status].class + " label-inline'>" + status[row.status].title + "</span>";
                    }
                },
                {
                    field: 'Actions',
                    title: 'Acciones',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    template: function (row) {
                        var content = '';

                        content += '\
                            <div class="dropdown dropdown-inline">\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                            </g>\
                                        </svg>\
                                    </span>\
                                </a>\
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class="navi flex-column navi-hover py-2">\
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
                                            Selecciona una opción:\
                                        </li>';



                        if (statusShop) {
                            if (row.status == 'Solicitada') {                              
                                content += '<li class="navi-item">\
                                                        <a href="#" class="navi-link suspended" data-shopId="'+ row.id + '">\
                                                            <span class="navi-icon">\
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                                        <mask fill="white">\
                                                                            <use xlink:href="#path-1"/>\
                                                                        </mask>\
                                                                        <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"/>\
                                                                    </g>\
                                                                </svg>\
                                                            </span>\
                                                            <span class="navi-text">Entregada</span>\
                                                        </a>\
                                                    </li>';

                            } else {

                                content += '<li class="navi-item">\
                                                        <a href="#" class="navi-link actived" data-shopId="'+ row.id + '">\
                                                            <span class="navi-icon">\
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                                        <mask fill="white">\
                                                                            <use xlink:href="#path-1"/>\
                                                                        </mask>\
                                                                        <path d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z" fill="#000000"/>\
                                                                    </g>\
                                                                </svg>\
                                                            </span>\
                                                            <span class="navi-text">Solicitud</span>\
                                                        </a>\
                                                    </li>';
                            }
                        }



                        content += '</ul></div></div>';

                        return content;
                    },
                }

            ],

        });

        $('#kt_datatable_search_status').on('change', function () {
            datatable.search($(this).val(), 'status');
        });

        $('#kt_datatable_search_authorized').on('change', function () {
            datatable.search($(this).val(), 'authorized');
        });

        $('#kt_datatable_search_status').selectpicker();
        $('#kt_datatable_search_authorized').selectpicker();
    };

    return {
        // public functions
        init: function () {
            demo();
        },
    };
}();

jQuery(document).ready(function () {
    KTDatatableAutoColumnHideDemo.init();
});





/* Suspended */
$(document).on('click', '.suspended', function () {

    var shopId = $(this).attr('data-shopId');
    var url = '/shops-inactive/' + shopId;

    suspendedActivedItem(url, "¿Estás seguro de cambiar el estado de la compra a solicitado?", "La orden de compra ha cambiado su estatus", "Orden de compra solicitada!");
});


/* Actived */
$(document).on('click', '.actived', function () {

    var shopId = $(this).attr('data-shopId');
    var url = '/shops-active/' + shopId;

    suspendedActivedItem(url, "¿Estás seguro de marcar la orden de compra como entregada por el proveedor?", "La orden de compra ha sido entregada", "Entregado!");
});



// Class Validation
var KTLogin = function () {

    var _handleEditForm = function () {
        var validation;

        // Función para crear reglas de validación comunes
        var getValidator = function(field) {
            return {
                validators: {
                    notEmpty: {
                        message: field + ' es un campo requerido'
                    }
                }
            }
        }

        // Init form validation rules.
        validation = FormValidation.formValidation(
            KTUtil.getById('newFormShop'),
            {
                fields: {
                    amount: getValidator('Cantidad'),
                    fecha_compra: getValidator('Fecha de compra')
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );
    }

    return {
        // public functions
        init: function () {
            _handleEditForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
/* Class validations */
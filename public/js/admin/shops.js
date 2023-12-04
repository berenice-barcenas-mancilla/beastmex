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

                        return row.supplier_id;

                    }
                },

                {
                    field: 'product_id',
                    title: 'Producto',
                    sortable: 'asc',
                    template: function (row) {

                        return row.product_id;

                    }
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
                    title: 'Fecha de orden',
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
                            Active: {
                                'title': 'Activo',
                                'class': 'label-light-primary'
                            },
                            Suspended: {
                                'title': 'Suspendido',
                                'class': 'label-light-danger'
                            }
                        };

                        return `<span class='label font-weight-bold label-lg ${status[row.status] ? status[row.status].class : ''} label-inline'>
                        ${status[row.status] ? status[row.status].title : ''}</span>`;
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
                        var content = `
                            <div class="dropdown dropdown-inline">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
                                    <span class="svg-icon svg-icon-md">
                                        <!-- SVG code here -->
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                            Selecciona una opción:
                                        </li>`;

                        if (typeof statusShop !== 'undefined' && typeof ver !== 'undefined') {
                            if (statusShop) {
                                if (row.status == 'Solicitada') {
                                    content += `
                                        <li class="navi-item">
                                            <a href="#" class="navi-link suspended" data-shopId="${row.id}">
                                                <!-- SVG code for Entregada -->
                                                <span class="navi-text">Entregada</span>
                                            </a>
                                        </li>`;
                                } else {
                                    content += `
                                        <li class="navi-item">
                                            <a href="#" class="navi-link actived" data-shopId="${row.id}">
                                                <!-- SVG code for Solicitada -->
                                                <span class="navi-text">Solicitada</span>
                                            </a>
                                        </li>`;
                                }
                            }

                            if (ver) {
                                content += `
                                    <li class="navi-item">
                                        <a href="#" class="navi-link ver" data-document="${row.document_file}">
                                            <!-- SVG code for Ver documento -->
                                            <span class="navi-text">Ver documento</span>
                                        </a>
                                    </li>`;
                            }
                        }

                        content += `</ul></div></div>`;
                        return content;
                    }
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

    suspendedActivedItem(url, "¿Estás seguro de marcar como entregada esta orden compra?", "La orden compra ha sido entregada por el proveedor ", "Orden de compra entregada!");
});


/* Actived */
$(document).on('click', '.actived', function () {

    var shopId = $(this).attr('data-shopId');
    var url = '/shops-active/' + shopId;

    suspendedActivedItem(url, "¿Estás seguro de marcar como orden de compra solicitada?", "La orden de compra esta en solicitud", "Orden de compra solicitada!");
});



// Class validations
var KTLogin = function () {

    var handleEditForm = function () { // Corrected function name
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('newFormShop'),
            {
                fields: {
                    supplier_id: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre de proveedor es un campo requerido'
                            }
                        }
                    },
                    product_id: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre de producto es un campo requerido'
                            }
                        }
                    },

                    amount: {
                        validators: {
                            notEmpty: {
                                message: 'Cantidad del producto es un campo requerido'
                            }
                        }
                    },
                    fecha_compra: {
                        validators: {
                            notEmpty: {
                                message: 'Fecha de la orden de compra es un campo requerido'
                            }
                        }
                    }

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            handleEditForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
/* Class validations */
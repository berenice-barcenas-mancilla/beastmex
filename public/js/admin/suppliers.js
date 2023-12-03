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
                        url: HOST_URL + '/suppliers/list-suppliers',
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
                    field: 'supplier',
                    title: 'Proveedor',
                    sortable: 'asc',
                    template: function (row) {

                        return row.supplier;

                    }
                },
                
                {
                    field: 'description',
                    title: 'Descripcion',
                    sortable: 'asc',
                    template: function (row) {

                        return row.supplier;

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

                        if (editSupplier) {

                            content += '<li class="navi-item">\
                                            <a href="#" class="navi-link editSupplier" data-toggle="modal" data-target="#supplierEditModal" data-supplierId="'+ row.id + '" >\
                                                <span class="navi-icon">\
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                            <rect x="0" y="0" width="24" height="24"/>\
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                                        </g>\
                                                    </svg>\
                                                </span>\
                                                <span class="navi-text">Editar</span>\
                                            </a>\
                                        </li>';
                        }



                        if (statusSupplier) {

                            if (row.status == 'Active') {

                                content += '<li class="navi-item">\
                                                        <a href="#" class="navi-link suspended" data-supplierId="'+ row.id + '">\
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
                                                            <span class="navi-text">Suspender</span>\
                                                        </a>\
                                                    </li>';

                            } else {

                                content += '<li class="navi-item">\
                                                        <a href="#" class="navi-link actived" data-supplierId="'+ row.id + '">\
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
                                                            <span class="navi-text">Reactivar</span>\
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



$(document).ready(function () {

    /* Edit */
    $(document).on('click', '.editSupplier', function () {

        var supplierId = $(this).attr('data-supplierId');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/suppliers/' + supplierId,
            beforeSend: function () {

            }
        }).done(function (response) {

            if (response.exito) {

                $('#supplierEdit').val(response.supplier.supplier);
                $('#descriptionEdit').val(response.supplier.description);

                document.getElementById('editFormSupplier').action = '/suppliers-update/' + supplierId;

            } else {
                toastr.error('Error al obtener la información');
            }

        }).fail(function () {
            toastr.error('Ocurrio un error al tratar de obtener la información');
        });

    });
});



/* Suspended */
$(document).on('click', '.suspended', function () {

    var supplierId = $(this).attr('data-supplierId');
    var url = '/suppliers-inactive/' + supplierId;

    suspendedActivedItem(url, "¿Estás seguro de suspender este proveedor?", "El proveedor ha sido suspendido", "Suspendido!");
});


/* Actived */
$(document).on('click', '.actived', function () {

    var supplierId = $(this).attr('data-supplierId');
    var url = '/suppliers-active/' + supplierId;

    suspendedActivedItem(url, "¿Estás seguro de activar este proveedor?", "El proveedor ha sido activada", "Activado!");
});



// Class validations
var KTLogin = function () {

    var handleEditForm = function () {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('editFormSupplier'),
            {
                fields: {
                    supplier: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre de proveedor es un campo requerido'
                            }
                        }
                    },
                    
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Descripcion del proveedor es un campo requerido'
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


    var _handleEditForm = function () {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('newFormSupplier'),
            {
                fields: {
                    supplier: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre de proveedor es un campo requerido'
                            }
                        }
                    },
                
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Descripcion es un campo requerido'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Quité un espacio en blanco al final de esta línea
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            _handleEditForm();
            handleEditForm();
        }
    };
}();


// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
/* Class validations */
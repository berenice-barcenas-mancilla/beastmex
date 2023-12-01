"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL + '/users/list-users',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,
            pagination: true,
            search: {
                input: $('#kt_datatable_search_query')
            },

            // columns definition
            columns: [
            {
                field: 'name',
                title: 'Nombre',
                sortable: 'asc',
                template: function(row) {

                    return row.name + " "+ row.last_name;
                    
                }
            },
            {
                field: 'email',
                title: 'Correo' ,
                template: function(row) {

                    return row.email;
                }               
            },
            {
                field: 'status',
                title: 'Status',
                template: function(row) {
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

                    return "<span class='label font-weight-bold label-lg " + status[row.status].class + " label-inline'>"+ status[row.status].title  +"</span>";                    
                }
            },
            {
                field: 'Actions',
                title: 'Acciones',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    var content = '';

                    content +='\
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

                    if (editUser) {

                        content +='<li class="navi-item">\
                                        <a href="#" class="navi-link editUser" data-toggle="modal" data-target="#userEditModal" data-userId="'+ row.id +'" >\
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

                    if (row.status == 'Active') {

                        if (statusUser) {

                            content +='<li class="navi-item">\
                                        <a href="#" class="navi-link suspended" data-userId="'+ row.id +'">\
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
                        }
                        
                    } else {

                        if (statusUser) {

                            content +='<li class="navi-item">\
                                        <a href="#" class="navi-link actived" data-userId="'+ row.id +'">\
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

                    content +='</ul></div></div>';

                    return content;    
                },
            }],

        });

        $('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val(), 'status');
		});

        $('#kt_datatable_search_status').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});


/* Edit User */
$(document).ready(function(){
    $(document).on('click', '.editUser', function() {

        var userId = $(this).attr('data-userId'); 
        
        $.ajax({ 
            type: 'GET',
            dataType: 'json',
            url: '/users/' + userId,
            beforeSend: function () {
                               
            } 
        }).done(function (response) {

            if ( response.exito ) {

                var roles = response.role;
                console.log(roles[0]);

                $('#nameEdit').val(response.user.name);
                $('#lastNameEdit').val(response.user.last_name);
                $('#emailEdit').val(response.user.email);
                $('#groupEdit').val(roles[0]).prop('selected', true);
                $('#groupEdit').change();
                
                document.getElementById('editFormUser').action ='/users-update/' + userId;

            } else { 
                toastr.error('Error al obtener la información');
            }            

        }).fail(function () {
            toastr.error('Ocurrio un error al tratar de obtener la información');
        });
        
    }); 
});



// Class validations
var KTLogin = function() {
    
    var handleEditForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('editFormUser'),
			{
				fields: {
                    name: {
						validators: {
							notEmpty: {
								message: 'Nombre es un campo requerido'
							}
						}
					},
                    last_name: {
						validators: {
							notEmpty: {
								message: 'Apellido es un campo requerido'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Correo es un campo requerido'
							},
                            emailAddress: {
								message: 'Ingresa una dirección de correo electrónico válida'
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


    var _handleEditForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('newFormUser'),
			{
				fields: {
                    name: {
						validators: {
							notEmpty: {
								message: 'Nombre es un campo requerido'
							}
						}
					},
                    last_name: {
						validators: {
							notEmpty: {
								message: 'Apellido es un campo requerido'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Correo es un campo requerido'
							},
                            emailAddress: {
								message: 'Ingresa una dirección de correo electrónico válida'
							}
						}
					},
                    password: {
						validators: {
							notEmpty: {
								message: 'Password es un campo requerido'
							}
						}
					},
                    password_confirmation: {
						validators: {
							notEmpty: {
								message: 'Confirmación de password es un campo requerido'
							}
						}
					},
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
        init: function() {
            _handleEditForm();
            handleEditForm();
        }
    };
}();


// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
/* Class validations */



/* Suspended */
$(document).on('click', '.suspended', function() {

    var userId = $(this).attr('data-userId');
    var url = '/users-inactive/' +  userId;

    suspendedActivedItem(url, "¿Estás seguro de suspender este usuario?", "El usuario ha sido suspendido", "Suspendido!" );
});


/* Actived */
$(document).on('click', '.actived', function() {

    var userId = $(this).attr('data-userId');
    var url = '/users-active/' +  userId; 

    suspendedActivedItem(url, "¿Estás seguro de activar este usuario?", "El usuario ha sido activado", "Activado!" );
});

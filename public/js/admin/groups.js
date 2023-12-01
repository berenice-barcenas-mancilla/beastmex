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
                        url: HOST_URL + '/groups/list-groups',
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
                sortable: 'asc'
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

                        if (editGroup) {
                            
                            content +='<li class="navi-item">\
                                        <a href="#" class="navi-link editGroup" data-toggle="modal" data-target="#groupEditModal" data-groupId="'+ row.id +'" >\
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
                        

                        if (deleteGroup) {

                            content +='<li class="navi-item">\
                                        <a href="#" class="navi-link deleted" data-groupId="'+ row.id +'">\
                                            <span class="navi-icon">\
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24"/>\
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                                    </g>\
                                                </svg>\
                                            </span>\
                                            <span class="navi-text">Eliminar</span>\
                                        </a>\
                                    </li>';
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




$(document).ready(function(){

    /* Edit Group */
    $(document).on('click', '.editGroup', function() {

        var groupId = $(this).attr('data-groupId'); 
        
        $.ajax({ 
            type: 'GET',
            dataType: 'json',
            url: '/groups/' + groupId,
            beforeSend: function () {
                               
            } 
        }).done(function (response) {

            console.log(response);

            if ( response.exito ) {

                $('#nameEdit').val(response.role.name);
                var data = response.permissions;
                var permissions = response.permissions_role;
                var x = 0;

                for (x = 0; x < data.length; x++) {

                    if (permissions.indexOf(data[x]) != -1){

                        $('#permission_' + data[x]).prop('checked', true);
                    } else {

                        $('#permission_' + data[x]).prop('checked', false);
                    }
                }
                
                document.getElementById('editFormGroup').action ='/groups-update/' + groupId;

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
			KTUtil.getById('editFormGroup'),
			{
				fields: {
                    name: {
						validators: {
							notEmpty: {
								message: 'Nombre es un campo requerido'
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


    var handleNewForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('newFormGroup'),
			{
				fields: {
                    name: {
						validators: {
							notEmpty: {
								message: 'Nombre es un campo requerido'
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
        init: function() {
            handleNewForm();
            handleEditForm();
        }
    };
}();


// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
/* Class validations */



/* Deleted */
$(document).on('click', '.deleted', function() {

    var groupId = $(this).attr('data-groupId');
    var url = '/groups/deleted/' +  groupId;

    suspendedActivedItem(url, "¿Estás seguro de eliminar este grupo? Al eliminar el grupo los usuarios perderan sus privilegios", "El grupo ha sido eliminado", "Eliminado!" );
});
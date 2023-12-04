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
                        url: HOST_URL + '/stores/list-stores',
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
                key: 'nombre'
            },

            // columns definition
            columns: [
                {
                    field: 'nombre',
                    title: 'Producto',
                    sortable: 'asc',
                    template: function (row) {

                        return row.nombre;

                    }
                },
                
                {
                    field: 'noDeSerie',
                    title: 'No. Serie',
                    sortable: 'asc',
                    template: function (row) {

                        return row.noDeSerie;

                    }
                },
                {
                    field: 'marca',
                    title: 'Marca',
                    sortable: 'asc',
                    template: function (row) {

                        return row.marca;

                    }
                },
                {
                    field: 'stock',
                    title: 'Stock',
                    sortable: 'asc',
                    template: function (row) {
                        //return row.stock < 2 ? "<span class='label font-weight-bold label-lg'>" + row.stock + "</span>" : row.stock;
                        return row.stock < 2 ? "<span class='label font-weight-bold label-lg' style='background-color: orange; color: white;'>" + row.stock + "</span>" : row.stock;

                    }
                },
                {
                    field: 'costoCompra',
                    title: 'Costo',
                    sortable: 'asc',
                    template: function (row) {

                        return row.costoCompra;

                    }
                },               
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




// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
/* Class validations */
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Lista de Productos</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <!--begin::Productos-->
                <div class="card card-custom p-5">

                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label fs-1">Lista de productos</h3>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--begin::Search Form-->
                        <div class="mb-10">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">

                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control fs-1 p-4"
                                                    placeholder="Buscar..." />
                                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 my-2 my-md-0">
                                            <select class="form-control fs-2" id="kt_datatable_search_field">
                                                <option value="nombre">Nombre</option>
                                                <option value="noDeSerie">Número de Serie</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Search Form-->

                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom p-5" id="kt_datatable_productos">
                        </div>
                        <!--end: Datatable-->

                    </div>
                </div>
                <!--end::Card Productos-->
            </div>

        </div>
    </div>
</div>

{{-- Definimos variables JavaScript --}}
@section('scripts')
    @parent
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/admin/stores.js?v=1.0.10"></script>
@endsection
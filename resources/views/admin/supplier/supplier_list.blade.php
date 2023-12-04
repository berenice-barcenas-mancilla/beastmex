{{-- Se incluye la plantilla ya predefinida del menú --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección según el sitio que se esté consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Módulo de Proveedores</span>
@endsection

{{-- A partir de esta sección se comienza a estructurar el contenido de este módulo de capacitaciones --}}
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Lista de proveedores
                </h3>
            </div>

            {{-- Verificamos el permiso para crear proveedores --}}
            @can('system.supplier.create')
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal"
                        data-target="#supplierNewModal">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        Nuevo proveedor
                    </a>
                    <!--end::Button-->
                </div>
            @endcan
        </div>
        <div class="card-body">

            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Buscar..."
                                        id="kt_datatable_search_query" />
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
@endsection

{{-- Incluimos los modales necesarios --}}
@section('modals')
    @include('admin.forms.supplier.create')
    @include('admin.forms.supplier.edit')
@endsection

{{-- Definimos variables JavaScript --}}
@section('scripts')
    <script>
        var HOST_URL = "{{ env('APP_HOST', 'http://127.0.0.1:8000') }}";
        var editSupplier = false;
        var statusSupplier = false;

        {{-- Verificamos el permiso para editar proveedores --}}
        @can('system.supplier.edit')
            editSupplier = true;
        @endcan

        {{-- Verificamos el permiso para cambiar el estado de proveedores --}}
        @can('system.supplier.status')
            statusSupplier = true;
        @endcan
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="js/admin/suppliers.js?v=1.0.3"></script>

    <script>
        {{-- Mostramos mensajes Toastr si existen --}}
        @if (Session::has('status'))
            toastr.success("{{ Session::get('status') }}");
        @endif

        @if (Session::has('errorsDB'))
            toastr.error("{{ Session::get('errorsDB') }}");
        @endif
    </script>
    <!--end::Page Scripts-->
@endsection

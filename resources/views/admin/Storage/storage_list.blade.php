{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Consulta de Productos</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo de ventas --}}
@section('content')

    <!--begin::Card-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                    Lista de productos
                </h3>
		    </div>
            

            @can('system.store.create')
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>		Exportar
                    </button>
                
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Elige una opción:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-copy"></i></span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#userNewModal">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>	
                    Nuevo producto
                </a>
                <!--end::Button-->
		    </div>
            @endcan
            {{-- manejo de mensajes modulo almacen --}}
            @if(session()->has('Exito'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "{{ session('Exito') }}",
                });
            </script>
            @endif
            
            @if($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se envió el formulario, por favor verifique los datos',
                });
            </script>
            @endif
		    
	    </div>
	    <div class="card-body">
		    
		    <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Buscar..." id="kt_datatable_search_query" />
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div>
                                <!--begin::Button-->
                                <a href="#" class="btn btn-primary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                                        </svg><!--end::Svg Icon-->
                                    </span>	
                                    Filtrar
                                </a>
                            <!--end::Button-->
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

<!-- Start table -->
<div class="mt-5 text-center">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Número de Serie</th>
                <th scope="col">Marca</th>
                <th scope="col">Stock</th>
                <th scope="col">Costo de Compra</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Foto</th>
                <th scope="col">Estatus</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Tarjeta Gráfica NVIDIA RTX 3080</td>
                <td>12345678</td>
                <td>NVIDIA</td>
                <td>50</td>
                <td>600.00</td>
                <td>900.00</td>
                <td>2023-11-05</td>
                <td>
                </td>
                <td>Activo</td>
                <td>
                    <a href="#" class="btn btn-primary">
                        <img src="{{ asset('images/sun.png') }}" alt="Cambiar estatus" width="15">
                         
                    </a>
                    @can('system.store.edit')
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#userEditModal">
                        <img src="{{ asset('images/edit-circle.png') }}" alt="Editar" width="15">
                    </a>
                    @endcan
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Procesador Intel Core i9-12900K</td>
                <td>98765432</td>
                <td>Intel</td>
                <td>30</td>
                <td>400.00</td>
                <td>550.00</td>
                <td>2023-11-06</td>
                <td>
                </td>
                <td>Inactivo</td>
                <td>
                    <a href="#" class="btn btn-primary">
                        <img src="{{ asset('images/sun.png') }}" alt="Cambiar estatus" width="15">
                         
                    </a>
                    @can('system.store.edit')
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#userEditModal">
                        <img src="{{ asset('images/edit-circle.png') }}" alt="Editar" width="15">
                    </a>
                    @endcan
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Memoria RAM Corsair Vengeance LPX 32GB</td>
                <td>54321098</td>
                <td>Corsair</td>
                <td>60</td>
                <td>120.00</td>
                <td>150.00</td>
                <td>2023-11-07</td>
                <td>
                </td>
                <td>Activo</td>
                <td>
                    <a href="#" class="btn btn-primary">
                        <img src="{{ asset('images/sun.png') }}" alt="Cambiar estatus" width="15">
                        
                    </a>
                    @can('system.store.edit')
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#userEditModal">
                        <img src="{{ asset('images/edit-circle.png') }}" alt="Editar" width="15">
                    </a>
                    @endcan
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- end table -->



@endsection

@section('modals')

    @include('admin.forms.StorageModule.create')
    @include('admin.forms.StorageModule.edit')

@endsection


@section('scripts')
    <script>
        var HOST_URL = "{{ env('APP_HOST', 'http://127.0.0.1:8000') }}";
        var editUser = false;
        var statusUser = false;

        @can('system.store.edit')
            editUser = true;
        @endcan

        @can('system.store.status')
            statusUser = true;
        @endcan
        
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="js/admin/users.js?v=1.0.1"></script>
    <!--end::Page Scripts-->


    <script>
        @if (Session::has('status'))

            toastr.success("{{ Session::get('status') }}");
        @endif


        @if (Session::has('errorsDB'))

            toastr.error("{{ Session::get('errorsDB') }}");
        @endif
        
    </script>
@endsection
{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Módulo de Gerencia</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo de ventas --}}
@section('content')


    <!--begin::Card Usuarios-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                   Usuarios
                </h3>
		    </div>

            @can('system.users.create')
            <div class="card-toolbar">
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
                    Nuevo usuario
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
                                    <input type="text" class="form-control" placeholder="Buscar..." id="kt_datatable_search_query" />
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Todos</option>
                                        <option value="Active">Activo</option>
                                        <option value="Suspended">Suspendido</option>
                                    </select>
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
    <br>
    <!--begin::Card Ventas-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                    Consulta de ventas
                </h3>
		    </div>
		    
	    </div>
	    <div class="card-body">
		    
		    <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Periodo:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Mes</option>
                                        <option value="Active">Enero</option>
                                        <option value="Suspended">Febrero</option>
                                        <option value="Suspended">Marzo</option>
                                        <option value="Suspended">Abril</option>
                                        <option value="Suspended">Mayo</option>
                                        <option value="Suspended">Junio</option>
                                        <option value="Suspended">Julio</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Año</option>
                                        <option value="Active">2023</option>
                                        <option value="Suspended">2022</option>
                                        <option value="Suspended">2021</option>
                                        <option value="Suspended">2020</option>
                                        <option value="Suspended">2019</option>
                                        <option value="Suspended">2018</option>
                                        <option value="Suspended">2019</option>
                                    </select>
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
                                    Buscar
                                </a>

                                <a href="#" class="btn btn-secondary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                          </svg><!--end::Svg Icon-->
                                    </span>	
                                    Reportes
                                </a>

                            <!--end::Button-->
                            </div>

                            

                        </div>                        
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

            <!-- Creo que aquí van las tablas pero agrego las mías de momento -->
		    <!--begin: Datatable-->
		    <!-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>  --> 
		    <!--end: Datatable-->
	    </div>
    </div>
    <!--end::Card-->

    <br>
    <!--begin::Card Compras-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                    Consulta de compras
                </h3>
		    </div>
		    
	    </div>
	    <div class="card-body">
		    
		    <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Periodo:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Mes</option>
                                        <option value="Active">Enero</option>
                                        <option value="Suspended">Febrero</option>
                                        <option value="Suspended">Marzo</option>
                                        <option value="Suspended">Abril</option>
                                        <option value="Suspended">Mayo</option>
                                        <option value="Suspended">Junio</option>
                                        <option value="Suspended">Julio</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Año</option>
                                        <option value="Active">2023</option>
                                        <option value="Suspended">2022</option>
                                        <option value="Suspended">2021</option>
                                        <option value="Suspended">2020</option>
                                        <option value="Suspended">2019</option>
                                        <option value="Suspended">2018</option>
                                        <option value="Suspended">2019</option>
                                    </select>
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
                                    Buscar
                                </a>
                                
                                <a href="#" class="btn btn-secondary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                          </svg><!--end::Svg Icon-->
                                    </span>	
                                    Reportes
                                </a>

                            <!--end::Button-->
                            </div>

                            

                        </div>                        
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

            <!-- Creo que aquí van las tablas pero agrego las mías de momento -->
		    <!--begin: Datatable-->
		    <!-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>  --> 
		    <!--end: Datatable-->
	    </div>
    </div>
    <!--end::Card-->


    
    
@endsection


@section('scripts')
    <script>
        var HOST_URL = "{{ env('APP_HOST', 'http://127.0.0.1:8000') }}";
        var editUser = false;
        var statusUser = false;

        @can('system.users.edit')
            editUser = true;
        @endcan

        @can('system.users.status')
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

@section('modals')

    @include('admin.forms.users.create')
    @include('admin.forms.users.edit')

@endsection
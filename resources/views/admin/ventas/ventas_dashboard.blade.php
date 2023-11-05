{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Consulta de Ventas</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo de ventas --}}
@section('content')

    <!--begin::Card-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                    Ventas
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
                                    Filtrar
                                </a>

                                <a href="/seller/products" class="btn btn-secondary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                        </svg><!--end::Svg Icon-->
                                    </span>	
                                    Productos
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

    <!-- Start table -->
    <div class="mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>                    
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end table -->
    
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
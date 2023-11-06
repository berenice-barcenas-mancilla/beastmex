{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Reporte</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo der empleados --}}
@section('content')

    <div class="d-flex flex-row">

        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{ $name }}</h3>
                    </div>

                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ $url }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>	
                                Exportar
                            </a>
                            <!--end::Button-->
                        </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">

                    <div class="card-body">
                        
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Filtrar por palabra..." id="kt_datatable_search_query" />
                                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                                            </div>
                                        </div>
                                        
                                    </div>        
                                                    
                                </div>
                                <h5> Periodo de reporte: <p class="text-danger">{{ $date_ini }} - {{ $date_end }}</p> </h5>
                            </div>
                        </div>
                        <!--end::Search Form-->
            
                        <h5> Total de registros: {{ $total }}</h5>
                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                        <!--end: Datatable-->

                    </div>

                </div>
                <!--end::Body-->
            </div>
        </div>
        <!--end::Content-->

    </div>

@endsection

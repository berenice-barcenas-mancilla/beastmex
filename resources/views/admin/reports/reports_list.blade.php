@extends('admin.layouts.app')

@section('breadcrumb')
    <span class="font-weight-bold mr-4">Lista de reportes</span>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">


        <!--begin::Container-->
        <div class=" container">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Column-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7">
                                <div class="symbol symbol-circle symbol-lg-90">
                                    <span class="svg-icon svg-icon-6x">
                                        <div class="symbol symbol-circle symbol-lg-90">
                                            <span
                                                class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="12" y="4"
                                                            width="3" height="13" rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="7" y="9"
                                                            width="3" height="8" rx="1.5" />
                                                        <path
                                                            d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <rect fill="#000000" opacity="0.3" x="17" y="11"
                                                            width="3" height="6" rx="1.5" />
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">
                                    Compras

                                </a>
                            </div>

                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal"
                                    data-target="#employeeRecordModal">
                                    GENERAR REPORTE
                                </button>
                            </div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Column-->


                <!--begin::Column-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7">
                                <div class="symbol symbol-circle symbol-lg-90">
                                    <span class="svg-icon svg-icon-6x">
                                        <div class="symbol symbol-circle symbol-lg-90">
                                            <span
                                                class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="12" y="4"
                                                            width="3" height="13" rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="7" y="9"
                                                            width="3" height="8" rx="1.5" />
                                                        <path
                                                            d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <rect fill="#000000" opacity="0.3" x="17" y="11"
                                                            width="3" height="6" rx="1.5" />
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">
                                    Ventas
                                </a>
                            </div>
                            <!--end::Name-->

                            <!--begin::Label-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder"
                                    data-toggle="modal" data-target="#employeeReportActiveModal">
                                    GENERAR REPORTE
                                </button>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Column-->


                <!--begin::Column-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7">
                                <div class="symbol symbol-circle symbol-lg-90">
                                    <span class="svg-icon svg-icon-6x">
                                        <div class="symbol symbol-circle symbol-lg-90">
                                            <span
                                                class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="12"
                                                            y="4" width="3" height="13"
                                                            rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="7"
                                                            y="9" width="3" height="8"
                                                            rx="1.5" />
                                                        <path
                                                            d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <rect fill="#000000" opacity="0.3" x="17"
                                                            y="11" width="3" height="6"
                                                            rx="1.5" />
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">
                                    Gerencia
                                </a>
                            </div>
                            <!--end::Name-->

                            <!--begin::Label-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#employeeReportSuspendedModal">
                                    GENERAR REPORTE
                                </button>
                            </div> <!--end::Label-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Column-->

            </div>
            <!--end::Row-->



            <div class="row">
                <!--begin::Column-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7">
                                <div class="symbol symbol-circle symbol-lg-90">
                                    <span class="svg-icon svg-icon-6x">
                                        <div class="symbol symbol-circle symbol-lg-90">
                                            <span
                                                class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="12"
                                                            y="4" width="3" height="13"
                                                            rx="1.5" />
                                                        <rect fill="#000000" opacity="0.3" x="7"
                                                            y="9" width="3" height="8"
                                                            rx="1.5" />
                                                        <path
                                                            d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <rect fill="#000000" opacity="0.3" x="17"
                                                            y="11" width="3" height="6"
                                                            rx="1.5" />
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">
                                    Almacen
                                </a>
                            </div>
                            <!--end::Name-->

                            <!--begin::Label-->
                            <div class="dropdown dropdown-inline mr-2" >
                                <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#employeeTrainingModal">
                                    GENERAR REPORTE
                                </button>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Column-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('modals')
    @include('admin.forms.reports.shop')
    @include('admin.forms.reports.seller')
    @include('admin.forms.reports.mannagement')
    @include('admin.forms.reports.store')
@endsection

@section('script')

@endsection


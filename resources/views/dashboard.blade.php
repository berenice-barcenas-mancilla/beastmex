@extends('admin.layouts.app')

@section('breadcrumb')
    <span class="text-muted font-weight-bold mr-4">BEASTMEX</span>
@endsection

@section('content')
    <!--begin::Dashboard-->
    <!--begin::Row-->
    <div class="row">

        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">Dashboard</h3>
                </div>
                <!--end::Header-->


                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                    <!--end::Chart-->

                    <!--begin::Stats-->

                    <!--end::Stats-->


                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <a href="/users" class="text-primary font-weight-bold font-size-h6 mt-2">
                                    Gerencia
                                </a>
                            </div>

                            @can('system.groups.list')
                                <div class="col bg-light-info  px-6 py-8 rounded-xl mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    <a href="/groups" class="text-info font-weight-bold font-size-h6">
                                        Almacen 
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7">
                                <span
                                    class="svg-icon svg-icon-warning svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                <br>
                                <a href="/employees" class="text-warning font-weight-bold font-size-h6 mt-2">
                                    Ventas
                                </a>
                            </div>

                            <div class="col bg-light-success px-6 py-8 rounded-xl">
                                <span
                                    class="svg-icon svg-icon-3x svg-icon-success d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16"
                                                rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5">
                                            </rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5">
                                            </rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5">
                                            </rect>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                <a href="/reports" class="text-success font-weight-bold font-size-h6 mt-2">
                                    Compras
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Body-->

            </div>
            <!--end::Mixed Widget 1-->
        </div>

        <div class="col-lg-6 col-xxl-6">
            <div class="row">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{ $chart->options['chart_title'] }}</h1>
                            {!! $chart->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-xxl-4"></div>
        <div class="col-lg-6 col-xxl-4"></div>
        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1"></div>
        <div class="col-xxl-8 order-2 order-xxl-1"></div>
        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2"></div>
        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2"></div>
        <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2"></div>
    </div>
    <!--end::Row-->
    <!--end::Dashboard-->
@endsection

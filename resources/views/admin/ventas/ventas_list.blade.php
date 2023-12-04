{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Consulta de Productos</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo de ventas --}}
@section('content')
@if(session()->has('confirmacionVenta'))
    <script>
    Swal.fire({
    title: "Success",
    text: "{{session('confirmacionVenta')}}",
    icon: "success"
    });
    </script>
    @endif

@if(session()->has('confirmacion'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{session('confirmacion')}} </strong>
    </div>
@endif


    <!--begin::Card-->      
    <div class="card card-custom">
	    <div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
                <h3 class="card-label">
                    Lista de productos
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

                                <a href="/seller" class="btn btn-secondary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                        </svg><!--end::Svg Icon-->
                                    </span>	
                                    Dashboard
                                </a>

                                <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#sellsNewModal">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg><!--end::Svg Icon-->
                                    </span>	
                                    Carrito <span class="badge bg-danger">{{Cart::count()}}</span>
                                </a>
                            <!--end::Button-->
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <!--end::Search Form-->

		    <!--begin: Datatable-->
		    
		    <!--end: Datatable-->
	    </div>
    </div>
    <!--end::Card-->
    <!-- Start table -->
    <div class="mt-5">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Agregar</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->marca}}</td>
                    <td>{{$item->stock}}</td>
                    <td>{{$item->precioVenta}}</td>
                    <td>
                        <form action="{{route('add')}}" method="post">
                        @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                            </svg>
                            </button>
                        </form>
                    </td>
                      
                </tr>
                @endforeach 
            </tbody>
        </table>

        

    </div>
    
    <!-- end table -->
    
    
@endsection



@section('modals')

    @include('admin.forms.sells.create')

@endsection




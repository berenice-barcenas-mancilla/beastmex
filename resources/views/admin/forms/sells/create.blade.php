<!--begin::EditModal-->
<div class="modal fade" id="sellsNewModal" tabindex="-1" role="dialog" aria-labelledby="sellsNewModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
 
            <div class="modal-body">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-info svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>                        
                    </div>
                    <div class="alert-text">
                        Los campos marcados con <code>*</code> son obligatorios<br />
                    </div>
                </div>
            </div>
                                                
                
                    
                    <div class="container row align-center">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Cart::count())
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <th scope="row">{{$item->name}}</th>
                                    <td>{{$item->qty}}</td>
                                    <td>{{number_format($item->qty * $item->price,2)}}</td>
                                    <td>
                                            <form action="{{route('removeitem')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                            <button type="submit" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                </svg>
                                            </button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <th scope="row">Ingresa un producto</th>
                                </tr>
                                @endif                      
                            </tbody>
                        </table>
                        <a href="{{route('clear')}}" class="text-center">Vaciar Carrito</a>
                    </div>

                    <form action="{{route('comprar')}}" method="post">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Fecha *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="date" class="form-control" id="fecha" required name="fecha">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Cliente *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="cliente" required name="cliente">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Subtotal</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required readonly name="subtotal" placeholder="{{Cart::subtotal()}}"> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Tax (21%)</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required readonly name="tax" placeholder="{{Cart::tax()}}"> 
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Total *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required readonly name="total" placeholder="{{Cart::total()}}"> 
                        </div>
                    </div>
                    
                </div> 
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold">Comprar</button>
                </form>
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cerrar</button>
                </div>                
            
        </div>
    </div>
</div>
<!--end::EditModal-->
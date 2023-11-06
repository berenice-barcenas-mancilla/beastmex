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
                                                
            <form class="form" method="post" id="newFormVentas" action="/seller/venta">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Fecha *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="date" class="form-control" id="name" required name="name" placeholder="Ingresa el nombre"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Cliente *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="cliente" required name="cliente" placeholder=""/>
                        </div>
                    </div>
                    
                    <div class="form-group row align-center">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Soy</td>
                                    <td>El</td>
                                    <td>Ticket</td>
                                </tr>                      
                            </tbody>
                        </table>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Total *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required readonly name="total" placeholder="1,900.00"> 
                        </div>
                    </div>
                    
                </div> 
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success font-weight-bold">Comprar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!--end::EditModal-->
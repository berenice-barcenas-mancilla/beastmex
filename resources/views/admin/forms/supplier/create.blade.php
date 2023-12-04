<!--begin::NewModal-->
<div class="modal fade" id="supplierNewModal" tabindex="-1" role="dialog" aria-labelledby="supplierNewModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
 
             {{-- Mostramos el mensaje con la key --}}
            @if(session()->has('Exito'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                
                <strong>{{session('Exito')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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
               
            <form class="form" method="post" id="newFormSupplier" action="/suppliers">
                {{ csrf_field() }}
                <div class="modal-body">
                   
                
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Razon Social *</b> </label>
                        <div class="col-lg-6 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="supplier"  name="supplier" placeholder="Ingresa la razon social de la empresa" value="{{ old('supplier') }}"/>
                            <p class="text-warning">{{ $errors->first('supplier') }}</p>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Descripción </b> </label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <textarea name="description" id="description" class="form-control" rows="8"> {{ old('description') }}</textarea>
                            <p class="text-warning">{{ $errors->first('description') }}</p>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Correo *</b> </label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="email" class="form-control" id="email" required name="email" placeholder="Ingresa el correo" value="{{ old('email') }}"/>
                        </div>
                        <p class="text-warning">{{ $errors->first('email') }}</p>

                    </div>
                
                </div> 
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Guardar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!--end::NewModal-->
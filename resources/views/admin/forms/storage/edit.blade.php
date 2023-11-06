<!--begin::EditModal-->
<div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="userEditModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
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
                                                
            <form class="form" method="POST" id="newFormProduct" action="/storage/save">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="txtName" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Nombre *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="name" name="txtName" placeholder="Ingresa el nombre" value="{{ old('txtName') }}"  >
                        </div>
                        <p class="text-warning">{{ $errors->first('txtName') }}</p>
                    </div>
                    
                    <div class="form-group row">
                        <label for="txtSerialNumber" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Número de Serie *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="serial_number" name="txtSerialNumber" placeholder="Ingresa el número de serie" value="{{ old('txtSerialNumber') }}"  >
                        </div>
                        <div class="col-md-5">

                            <p class="text-warning">
                              {{ $errors->first('txtSerialNumber') }}  
                            </p>
                          
                          </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="brand" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Marca *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" name="brand" id="brand">
                                <option value="">Selecciona una marca</option>
                                <option value="Asus" {{ old('brand') == 'Asus' ? 'selected' : '' }}>Asus</option>
                                <option value="MSI" {{ old('brand') == 'MSI' ? 'selected' : '' }}>MSI</option>
                                <option value="Gigabyte" {{ old('brand') == 'Gigabyte' ? 'selected' : '' }}>Gigabyte</option>
                                <option value="AMD" {{ old('brand') == 'AMD' ? 'selected' : '' }}>AMD</option>
                                <option value="Intel" {{ old('brand') == 'Intel' ? 'selected' : '' }}>Intel</option>
                                <option value="Corsair" {{ old('brand') == 'Corsair' ? 'selected' : '' }}>Corsair</option>
                                <option value="HyperX" {{ old('brand') == 'HyperX' ? 'selected' : '' }}>HyperX</option>
                                <option value="Kingston" {{ old('brand') == 'Kingston' ? 'selected' : '' }}>Kingston</option>
                                <option value="Logitech" {{ old('brand') == 'Logitech' ? 'selected' : '' }}>Logitech</option>
                                <option value="Razer" {{ old('brand') == 'Razer' ? 'selected' : '' }}>Razer</option>
                                <option value="Thermaltake" {{ old('brand') == 'Thermaltake' ? 'selected' : '' }}>Thermaltake</option>
                                <option value="Cooler Master" {{ old('brand') == 'Cooler Master' ? 'selected' : '' }}>Cooler Master</option>
                                <option value="NZXT" {{ old('brand') == 'NZXT' ? 'selected' : '' }}>NZXT</option>
                                <option value="EVGA" {{ old('brand') == 'EVGA' ? 'selected' : '' }}>EVGA</option>
                                <option value="Seasonic" {{ old('brand') == 'Seasonic' ? 'selected' : '' }}>Seasonic</option>
                                <option value="XFX" {{ old('brand') == 'XFX' ? 'selected' : '' }}>XFX</option>
                                <option value="Zotac" {{ old('brand') == 'Zotac' ? 'selected' : '' }}>Zotac</option>
                                <option value="Otra" {{ old('brand') == 'Otra' ? 'selected' : '' }}>Otra (especificar)</option>
                            </select>
                        </div>

                        <p class="text-warning">{{ $errors->first('brand') }}</p>
                    </div>
                    <div id="otherBrand" class="form-group row" style="display:{{ old('brand') == 'Otra' ? 'block' : 'none' }}">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" name="otherBrand" placeholder="Especifica la marca" value="{{ old('otherBrand') }}">
                        </div>
                        <p class="text-warning">{{ $errors->first('otherBrand') }}</p>
                    </div>
                    <script>
                        $('#brand').change(function() {
                            if ($(this).val() == 'Otra') {
                                $('#otherBrand').show();
                            } else {
                                $('#otherBrand').hide();
                            }
                        });
                    </script>
                    
                    
                    <div id="otherBrand" class="form-group row" style="display:none;">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" name="otherBrand" placeholder="Especifica la marca"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="txtStock" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Stock *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="stock" name="txtStock" placeholder="Ingresa el stock" value="{{ old('txtStock') }}"  >
                        </div>
                        <div class="col-md-5">
                            <p class="text-warning">{{ $errors->first('txtStock') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtPurchaseCost" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Costo de Compra *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="purchase_cost" name="txtPurchaseCost" placeholder="Ingresa el costo de compra" value="{{ old('txtPurchaseCost') }}"  >
                        </div>
                        <div class="col-md-5">
                            <p class="text-warning">{{ $errors->first('txtPurchaseCost') }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="txtEntryDate" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Fecha de Ingreso *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="date" class="form-control" id="entry_date" name="txtEntryDate" value="{{ old('txtEntryDate') }}"  >
                        </div>
                        <p class="text-warning">{{ $errors->first('dateEntry') }}</p>
                    </div>
                    
                    <div class="form-group row">
                        <label for="photo" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Foto</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="file" class="form-control-file" id="photo" name="photo"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="status" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Estatus *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" name="status" id="status"  >
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
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
<!--end::EditModal-->
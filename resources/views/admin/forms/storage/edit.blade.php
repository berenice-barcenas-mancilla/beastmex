<!--begin::EditModal-->
<div class="modal fade" id="userEditModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="userEditModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-info svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text">
                        Los campos marcados con <code>*</code> son obligatorios<br />
                    </div>
                </div>
            </div>

            <form class="form" method="POST" id="newFormProduct" action="{{ route('store.update', $item->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="txtName" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Nombre *</b>
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="name" name="txtName"
                                value="{{ $item->nombre }}">
                        </div>
                        <p class="text-warning">{{ $errors->first('txtName') }}</p>
                    </div>

                    <div class="form-group row">
                        <label for="txtSerialNumber" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Número de
                                Serie *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="serial_number" name="txtSerialNumber"
                                placeholder="Ingresa el número de serie" value="{{ $item->noDeSerie }}">
                        </div>
                        <div class="col-md-5">
                            <p class="text-warning">
                                {{ $errors->first('txtSerialNumber') }}
                            </p>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Marca *</b>
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" name="brand" id="brand">
                                {{ $savedBrand = $item->marca }}
                                <option value="">Selecciona una marca</option>
                                <option value="Asus" @if ($savedBrand == 'Asus') selected @endif>Asus</option>
                                <option value="MSI" @if ($savedBrand == 'MSI') selected @endif>MSI</option>
                                <option value="Gigabyte" @if ($savedBrand == 'Gigabyte') selected @endif>Gigabyte
                                </option>
                                <option value="AMD" @if ($savedBrand == 'AMD') selected @endif>AMD</option>
                                <option value="Intel" @if ($savedBrand == 'Intel') selected @endif>Intel</option>
                                <option value="Corsair" @if ($savedBrand == 'Corsair') selected @endif>Corsair
                                </option>
                                <option value="HyperX" @if ($savedBrand == 'HyperX') selected @endif>HyperX</option>
                                <option value="Kingston" @if ($savedBrand == 'Kingston') selected @endif>Kingston
                                </option>
                                <option value="Logitech" @if ($savedBrand == 'Logitech') selected @endif>Logitech
                                </option>
                                <option value="Razer" @if ($savedBrand == 'Razer') selected @endif>Razer</option>
                                <option value="Thermaltake" @if ($savedBrand == 'Thermaltake') selected @endif>
                                    Thermaltake</option>
                                <option value="Cooler Master" @if ($savedBrand == 'Cooler Master') selected @endif>
                                    Cooler Master</option>
                                <option value="NZXT" @if ($savedBrand == 'NZXT') selected @endif>NZXT</option>
                                <option value="EVGA" @if ($savedBrand == 'EVGA') selected @endif>EVGA</option>
                                <option value="Seasonic" @if ($savedBrand == 'Seasonic') selected @endif>Seasonic
                                </option>
                                <option value="XFX" @if ($savedBrand == 'XFX') selected @endif>XFX</option>
                                <option value="Zotac" @if ($savedBrand == 'Zotac') selected @endif>Zotac
                                </option>
                            </select>
                        </div>

                        <p class="text-warning">{{ $errors->first('brand') }}</p>
                    </div>

                    <div class="form-group row">
                        <label for="txtStock" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Stock *</b>
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="stock" name="txtStock"
                                placeholder="Ingresa el stock" value="{{ $item->stock }}">
                        </div>
                        <div class="col-md-5">
                            <p class="text-warning">{{ $errors->first('txtStock') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtPurchaseCost" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Costo de
                                Compra *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="purchase_cost" name="txtPurchaseCost"
                                placeholder="Ingresa el costo de compra" value="{{ $item->costoCompra }}">
                        </div>
                        <div class="col-md-5">
                            <p class="text-warning">{{ $errors->first('txtPurchaseCost') }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="txtEntryDate" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Fecha de
                                Ingreso *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="date" class="form-control" id="entry_date" name="txtEntryDate"
                                value="{{ $item->fechaIngreso }}">
                        </div>
                        <p class="text-warning">{{ $errors->first('dateEntry') }}</p>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Foto</b>
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="file" class="form-control-file" id="photo" name="photo" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-form-label text-right col-lg-3 col-sm-12"> <b>Estatus *</b>
                        </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" name="status" id="status">
                                {{ $savedStatus = $item->estatus }}
                                <option value="1" @if ($savedStatus == '1') selected @endif>Activo
                                </option>
                                <option value="0" @if ($savedStatus == '0') selected @endif>Inactivo
                                </option>

                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::EditModal-->


<!--begin::imageModal-->

<div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel{{ $item->id }}">Imagen de {{$item->nombre}} || {{$item->noDeSerie}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $item->foto) }}" alt="Foto en grande" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--end::imageModal-->



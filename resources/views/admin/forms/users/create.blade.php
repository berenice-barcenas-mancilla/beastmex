<!--begin::EditModal-->
<div class="modal fade" id="userNewModal" tabindex="-1" role="dialog" aria-labelledby="userNewModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
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
                                                
            <form class="form" method="post" id="newFormUser" action="/users">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Nombre *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="name" required name="name" placeholder="Ingresa el nombre"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Apellido *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="lastName" required name="last_name" placeholder="Ingresa el apellido"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Correo *</b> </label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="email" class="form-control" id="email" required name="email" placeholder="Ingresa el correo"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Grupo *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" name="group" id="group" required>
                                @foreach($roles AS $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Password *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="password" class="form-control" required name="password" placeholder="Ingresa tu contraseña"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Confirmar password *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="password" class="form-control" required name="password_confirmation" placeholder="Confirma tu contraseña"/>
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
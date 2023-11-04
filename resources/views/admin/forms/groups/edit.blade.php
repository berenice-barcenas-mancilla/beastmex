<!--begin::EditModal-->
<div class="modal fade" id="groupEditModal" tabindex="-1" role="dialog" aria-labelledby="groupEditModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar grupo</h5>
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
               
                                                
            <form class="form" method="post" id="editFormGroup" action="#">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Nombre *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="nameEdit" required name="name" placeholder="Ingresa el nombre"/>
                        </div>
                    </div>
                    
                    @foreach($permissions as $key => $permission)
                        @if ($key == 0) 
                            <hr>
                            <h3>{{ $permission->group }}</h3>
                        @else 
                            @if($permission->group != $rol) 
                                <hr>
                                <h3>{{ $permission->group }}</h3>
                            @endif

                        @endif
                        <div class="form-group row kt-margin-t-20">
                            <label class="col-form-label col-lg-9 col-sm-12">{{ $permission->description }}</label>
                            <div class="col-lg-3 col-md-3 col-sm-12 input-group">
                                <span class="switch">
                                    <label>
                                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        @php
                            $rol = $permission->group;
                        @endphp
                    @endforeach

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
@extends('layouts.plantillagerencia')

@section('title', 'Gerencia')

@section('contenido')

<div class="container col-md-6 mt-5 mb-5">
    <div class="card " style="background: #043D3C">

        <div class="card-header fs-4 fw-medium text-success text-center " style="background: #002F2E">
          Registro de usuarios
        </div>
    
        <div class="card-body ">
            <form method="POST" action="">
    
                @csrf 
    
                <div class="mb-3">
                  <label class="form-label text-white">Nombre: </label>
                  <input type="text" style="background: #002F2E" name="txtNombre" class="form-control text-white"  value="{{ old('txtNombre')}}" >
                  <p class="text-danger fw-bold">{{ $errors->first('txtNombre') }}</p>
                </div>
    
                <div class="mb-3">
                    <label class="form-label text-white">Apellido Paterno: </label>
                    <input type="text"  style="background: #002F2E" name="txtAp" class="form-control text-white" value="{{ old('txtAp')}}">
                    <p class="text-danger fw-bold">{{ $errors->first('txtAp') }}</p>
                </div>
                
                <div class="mb-3">
                  <label class="form-label text-white">Apellido Materno: </label>
                  <input type="text" style="background: #002F2E" name="txtAm" class="form-control text-white" value="{{ old('txtAm')}}" >
                  <p class="text-danger fw-bold">{{ $errors->first('txtAm') }}</p>
                </div>
    
                <div class="mb-3">
                    <label class="form-label text-white">Puesto: </label>
                    <input type="text" style="background: #002F2E" name="txtPuesto" class="form-control text-white" value="{{ old('txtPuesto')}}">
                    <p class="text-danger fw-bold">{{ $errors->first('txtPuesto') }}</p>
                </div>  

                <div class="mb-3">
                    <label class="form-label text-white">Correo: </label>
                    <input type="text" style="background: #002F2E" name="txtCorreo" class="form-control text-white" value="{{ old('txtCorreo')}}">
                    <p class="text-danger fw-bold">{{ $errors->first('txtCorreo') }}</p>
                </div>  

                <div class="mb-3">
                    <label class="form-label text-white">Contraseña: </label>
                    <input type="password" style="background: #002F2E" name="txtContra" class="form-control text-white" value="{{ old('txtContra')}}">
                    <p class="text-danger fw-bold">{{ $errors->first('txtContra') }}</p>
                </div>  
        </div>
    
        <div class="card-footer text-body-secondary" style="background: #002F2E">
            <div style="text-align: right">
                <button type="submit" class="btn btn-success">Registrar usuario</button>
                </form>
            </div>                
        </div>
    
    </div>
</div>




@endsection
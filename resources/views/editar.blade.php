<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@extends('plantilla')
<x-app-layout>
</x-app-layout>
@section('seccion')

    <div>
        <div>
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Inicio</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link  text-white">Iniciar Registro </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="{{ route('getMostrar') }}">Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active disabled"  href="{{ route('getMostrar') }}">Editando</a>
                </li>
                <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('getMostrarPersonas') }}" >Crear Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarMatrimonios') }}" >Mostrar Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('getMostrarHitorialMatrimonios')}}">Historial de matrimonios</a>
            </li>

                
               
            </ul>
        </div>
    </div>
    <br>
    <br>

    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

                <li class="nav-item">
                    <a class="nav-link active " >Datos Generales</a>
                </li>
                
            </ul
        </div>
    </div>

    <div align="center">
        <div class="card-body">

            <div>
            <form action="{{ route('modificar', $personas->id) }}" method="POST">
                @method('PUT')
                    @csrf
                    <h3> Datos Registro Inicial</h3>
                    <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>
                   
                    <div class="row">
                       
                       
                        <div class="col-lg-4 col-sm-12 form-group " >
                            <label for="nombre" class="control-label">{{ 'Nombre' }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                                name="nombre" id="nombre" pattern="[A-Z a-z \s A-Z a-z]+" title="Solo admite letras" required
                                value="{{$personas->Nombre}}">
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="apPaterno" class="control-label">{{ 'Apellido Paterno' }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('apPaterno') ? 'is-invalid' : '' }} "
                                name="apPaterno" id="apPaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                                value="{{$personas->ApellidoP}}">
                            {!! $errors->first('apPaterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="apMaterno" class="control-label">{{ 'Apellido Materno' }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                                name="apMaterno" id="apMaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                                value="{{$personas->ApellidoM}}">
                            {!! $errors->first('apMaterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        @if ($personas->Sexo=='Masculino')
                                     	@php ($hombre = 'checked')
                                     	@php ($mujer = '')
                                     @else
                                      	@php ($hombre = '')
                                     	@php ($mujer = 'checked')
                                     @endif  
                        
                        <div class="col-lg-4 col-sm-12 form-group">
                        <p>Sexo: <br>
                       
                <input type="radio" name="sexo" value="Masculino"  {{ $hombre }} required> Hombre
                <input type="radio" name="sexo" value="Femenino" {{ $mujer }} required> Mujer
            </p>  
                        </div>
                       
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="edad" class="control-label">{{ 'Edad' }}<span class="text-danger">*</span></label>
                            <input type="number" min="18" max="100"class="form-control {{ $errors->has('edad') ? 'is-invalid' : '' }} "
                                pattern="[0-9]{2}" name="edad" id="edad"  
                                value="{{$personas->Edad}}">
                            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        @if ($personas->EdoCivil=='Casado(a)')
                                     	@php ($casado = 'checked')
                                     	@php ($soltero = '')
                                     @else
                                      	@php ($casado = '')
                                     	@php ($soltero = 'checked')
                                     @endif  
                        <div class="col-lg-4 col-sm-12 form-group">
                        <p>Estado Civil: <br>
                <input type="radio" name="estado" value="Casado(a)"{{$casado}} required> Casado(a)
                <input type="radio" name="estado" value="Soltero(a)"{{$soltero}} required> Soltero(a)
            </p>  
                        </div>       


                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </form>
              
            </div>
        </div>

    </div>
    
@stop



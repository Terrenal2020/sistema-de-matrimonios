<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@extends('plantilla')
<x-app-layout>
</x-app-layout>
@section('seccion')

    <div>
        <div>
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

                <li class="nav-item">
                    <a class="nav-link text-white  "  href="{{ route('dashboard') }}">Inicio</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link   text-white" href="{{ route('getRegistro') }}">Iniciar Registro </a>

                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('getMostrar') }}">Consulta</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active disabled" href="{{ route('getMostrarPersonas') }}" >Crear Matrimonios</a>
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
                    <a class="nav-link disable " >Datos del esposo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Datos de la esposa</a>
                </li>
                
            </ul
        </div>
    </div>

    <div align="center">
        <div class="card-body">
       
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
                                value="{{$personasss->Nombre}}" readonly="readonly">
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="apPaterno" class="control-label">{{ 'Apellido Paterno' }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('apPaterno') ? 'is-invalid' : '' }} "
                                name="apPaterno" id="apPaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                                value="{{$personasss->ApellidoP}}" readonly="readonly">
                            {!! $errors->first('apPaterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="apMaterno" class="control-label">{{ 'Apellido Materno' }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                                name="apMaterno" id="apMaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                                value="{{$personasss->ApellidoM}}" readonly="readonly">
                            {!! $errors->first('apMaterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="sexo" class="control-label">{{ 'Sexo' }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('edad') ? 'is-invalid' : '' }} "
                                pattern="[0-9]{2}" name="sexo" id="sexo"  
                                value="{{$personasss->Sexo}}" readonly="readonly">
                            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="edad" class="control-label">{{ 'Edad' }}<span class="text-danger">*</span></label>
                            <input type="number" min="18" max="100"class="form-control {{ $errors->has('edad') ? 'is-invalid' : '' }} "
                                pattern="[0-9]{2}" name="edad" id="edad"  
                                value="{{$personasss->Edad}}" readonly="readonly">
                            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <label for="estado" class="control-label">{{ 'Estado Civil' }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }} "
                                 name="estado" id="estado"  
                                value="{{$personasss->EdoCivil}}" readonly="readonly">
                            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
                        </div>


                    </div>
                    <br>
                    
        <table class="table">
    <thead class="thead-red">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Ap Paterno</th>
            <th scope="col">Ap Materno</th>
            <th scope="col">Sexo</th>
            <th scope="col">Edad</th>
            <th scope="col">Estatus</th>
            <th scope="col">Operacion</th>
           
        </tr>
    </thead>
    <tbody>
    @foreach($personass as $personass)
        <tr>
            <th scope="row">{{$personass->Nombre}}</th>
            <td>{{$personass->ApellidoP}}</td>
            <td>{{$personass->ApellidoM}}</td>
            <td>{{$personass->Sexo}}</td>
            <td>{{$personass->Edad}}</td>
            <td>{{$personass->EdoCivil}}</td>
            

            <td><a class="btn btn-primary" ">Crear Matrimonio </a></td>
                          
        </tr>
        @endforeach

    </tbody>
</table>

        </div>

    </div>
    
@stop

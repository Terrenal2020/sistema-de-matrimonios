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
                <a class="nav-link text-white " href="{{ route('getMostrarPersonas') }}" >Crear Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active disabled" href="{{ route('getMostrarPersonas') }}" >Mostrar Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('getMostrarHitorialMatrimonios')}}">Historial de matrimonios</a>
            </li>
                
               
            </ul>
        </div>
    </div>
    <br>
    <br>
    
        <br><br>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

                <li class="nav-item">
                    <a class="nav-link active " >Datos del registro del matrimonio</a>
                </li>
                <li class="nav-item">
               
                
            </ul
        </div>
    </div>
    
   
        <div align="center">
            <h3>Datos del Matrimonio</h3>
        </div>
       
        <br><br>

    <div align="center">
        <div class="card-body">

        <table class="table">
    <thead class="thead-red">
        <tr>
            <th scope="col">Nombre del esposo</th>
            <th scope="col">Nombre de la Esposa</th>
            <th scope="col">Estatus</th>
            <th scope="col">Operacion</th>
           
           
           
        </tr>
    </thead>
    <tbody>
    @foreach($registroDe as $personas)
        <tr>
            <th scope="row">{{$personas->NombreEsposo}} {{$personas->ApellidoP}} {{$personas->ApellidoM}}</th>
            <th scope="row">{{$personas->NombreEsposa}} {{$personas->ApellidoPa}} {{$personas->ApellidoMa}}</th>
            <th scope="row">{{$personas->estatus}} </th>
            
            <td><a class="btn btn-warning" href="{{route('getDivorcio',['id' =>$personas->id ,
                 'nombre' => $personas->NombreEsposo,'apellidoP' => $personas->ApellidoP,
                 'nombreM' => $personas->NombreEsposa,'apellidoPM' => $personas->ApellidoPa])}}">Divorciar </a></td>
        
        </tr>
        @endforeach

    </tbody>
</table>

        </div>

    </div>
    
@stop

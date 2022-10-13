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
    <form   method="post">
        @csrf
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

                <li class="nav-item">
                    <a class="nav-link active " >Datos del  matrimonio</a>
                </li>   
            </ul
        </div>
    </div>
    
        
        <br><br>
        <form method="POST" >

    <div align="center">
        <div class="card-body">

        <table class="table">
    <thead class="thead-red">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Ap Paterno</th>
            <th scope="col">Ap Materno</th>
            <th scope="col">Sexo</th>
            <th scope="col">Edad</th>
            <th scope="col">Estatus</th>
           
           
        </tr>
    </thead>
    <tbody>
    @foreach($registroDe as $personas)
        <tr>
            <th scope="row">{{$personas->Nombre}}</th>
            <td>{{$personas->ApellidoP}}</td>
            <td>{{$personas->ApellidoM}}</td>
            <td>{{$personas->Sexo}}</td>
            <td>{{$personas->Edad}}</td>
            <td>{{$personas->EdoCivil}}</td>
        
        </tr>
        @endforeach

    </tbody>
</table>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

                <li class="nav-item">
                    <a class="nav-link active " >Datos de la Esposa</a>
                </li>   
            </ul
        </div>
    </div>
    <div align="center">
        <div class="card-body">

        <table class="table">
    <thead class="thead-red">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Ap Paterno</th>
            <th scope="col">Ap Materno</th>
            <th scope="col">Sexo</th>
            <th scope="col">Edad</th>
            <th scope="col">Estatus</th>
           
           
        </tr>
    </thead>
    <tbody>
    @foreach($registroLo as $personas)
        <tr>
            <th scope="row">{{$personas->Nombre}}</th>
            <td>{{$personas->ApellidoP}}</td>
            <td>{{$personas->ApellidoM}}</td>
            <td>{{$personas->Sexo}}</td>
            <td>{{$personas->Edad}}</td>
            <td>{{$personas->EdoCivil}}</td>
        
        </tr>
        @endforeach

    </tbody>
</table>

        </div>
    </div>
    
    
@stop
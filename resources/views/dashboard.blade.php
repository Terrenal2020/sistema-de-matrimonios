
@section('seccion')

<x-app-layout>
</x-app-layout>
@extends('plantilla')
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link active disabled ">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('getRegistro') }}">Iniciar Registro </a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrar') }}" >Consulta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarPersonas') }}" >Crear Matrimonios</a>
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
<div align="center">
    <h3>¡Sistema de Registro de Matrimonios!</h3><br>
  
    <p><b>Iniciar Registro -</b> registrar a personas <br>
        <b>Consulta -</b> Consulta una persona, para poder modificar, o dar de baja <br>
        <b>Crear Matrimonios -</b> Crea matrimonios entre dos personas <br>
        <b>Mostrar Matrimonios -</b> Muestra los matrimonios realizados  <br>
     
     
    </p>
</div>

<br>
<div align="center">
    <img src="logo.jpg" width="550">
</div>
<br>

            </div>
        </div>
    </div>

@endsection


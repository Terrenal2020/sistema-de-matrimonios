<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@extends('plantilla')
<x-app-layout>
</x-app-layout>
@section('seccion')

<div>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link text-white  " href="{{ route('dashboard') }}">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link   text-white" href="{{ route('getRegistro') }}">Iniciar Registro </a>

            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('getMostrar') }}">Consulta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('getMostrarPersonas') }}">Crear Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarPersonas') }}">Mostrar Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active disable" href="{{route('getMostrarHitorialMatrimonios')}}">Historial de
                    matrimonios</a>
            </li>



        </ul>
    </div>
</div>
<br>
<br>
<form action="{{ route('getBuscarCompre') }}" method="post">
    @csrf
    <div style="margin-right: 85%" class="col-lg-4 col-sm-5 form-group">
    <select class="itemName form-control" name="itemName"></select>   
    </div>
    <div align="center">
    <select class="itemName form-control" name="itemName"></select>   

        <button class="btn btn-primary" type="submit">Buscar Historial</button>
    </div>
    <select class="itemNamee form-control" name="itemNamee"></select>   

</form>
<br><br>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

            <li class="nav-item">
                <a class="nav-link active ">Datos del registro del matrimonio</a>
            </li>
            <li class="nav-item">


        </ul </div>
    </div>


    <div align="center">
        <h3>Consulta de personas en un Matrimonio</h3>
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
                        <th scope="col">Fecha de Registro</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach($comprometidos as $personas)
                    <tr>
                        <th scope="row">{{$personas->NombreEsposo}} {{$personas->ApellidoP}} {{$personas->ApellidoM}}
                        </th>
                        <th scope="row">{{$personas->NombreEsposa}} {{$personas->ApellidoPa}} {{$personas->ApellidoMa}}
                        </th>
                        <th scope="row">{{$personas->estatus}} </th>
                        
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
    <script type="text/javascript">
        $('.itemNamee').select2({
            placeholder: 'Seleccionar',
            ajax: {
                url: '/select2-autocompletar',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.Nombre,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        </script>

    @stop
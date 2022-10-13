<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                <a class="nav-link active disabled" href="{{ route('getMostrarPersonas') }}">Crear Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarMatrimonios') }}">Mostrar Matrimonios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('getMostrarHitorialMatrimonios')}}">Historial de
                    matrimonios</a>
            </li>


        </ul>
    </div>
</div>
<br>
<br>
<form action="{{ route('comprometer') }}" method="post">
    @csrf
    <div style="margin-right: 85%" class="col-lg-4 col-sm-5 form-group">
        <label for="expediente" class="control-label">{{ 'Clave de Identificacion' }}<span
                class="text-danger">*</span></label>
        <input type="text" class="form-control " name="folio" id="idFolio" required>

    </div>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

                <li class="nav-item">
                    <a class="nav-link active ">Datos del registro del matrimonio</a>
                </li>


            </ul </div>
        </div>



        <div align="center">
            <h3>Consulta para matrimonio</h3>
        </div>
        <label class="control-label">{{ 'Busqueda de las personas' }}</label>
        <div class="card text-center">
        </div>
        <br>

        <br>


        <br>
        <div align="center" class="row">
            <div class="col-lg-4 col-sm-12 form-group">
                <label for="nombre" class="control-label">{{ 'Nombre del esposo'}}</label>
                <select class="itemName form-control" name="itemName"></select>

            </div>
            <div class="col-lg-4 col-sm-12 form-group">
                <label for="apPaterno" class="control-label">{{ 'Nombre de la esposa' }}</label>
                <select class="itemNameF form-control" name="itemNameF"></select>

            </div>
            <div class="col-lg-4 col-sm-12 form-group">
                <button class="btn btn-primary" type="submit">Crear Matrimonio</button>
            </div>
        </div>


        <br><br>

        <br><br>

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
                        @foreach($personas as $personas)
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
        <script type="text/javascript">
        $('.itemName').select2({
            placeholder: 'Seleccionar',
            ajax: {
                url: '/select2-autocomplete',
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

        <script type="text/javascript">
        $('.itemNameF').select2({
            placeholder: 'Seleccionar',
            ajax: {
                url: '/select2-autocomplet',
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
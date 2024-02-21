@extends('layouts.app')

@section('content')
<div class="container">
<div class="alert alert-success alert-dismissible" role="alert">
    @if (Session::has('mensaje'))<!-- si hay un mensaje lomuestra-->
{{ Session::get('mensaje') }}

@endif
<button type="button" class="close" data-dismiss="alert"aria-label="close">
    <span aria-hidden="true">&times;</span>
</button>
</div>


<a href="{{ url('empleado/create') }} " class="btn btn-outline-secondary">Registrar nuevo empleado</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($empleados as $empleado )

        <tr>
            <td>{{ $empleado->id }}</td>

            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt=""></td><!-- asset da acceso a storage que es donde se guardan las imagenes-->

            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->correo }}</td>
            <td><a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-dark" >Editar</a>
                <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Quieres Borrar?')" class="btn btn-danger" value="Borrar">
                </form>


            </td>
        </tr>
        @endforeach
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
</div>
@endsection

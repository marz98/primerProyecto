
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data"><!-- enctype="multipart/form-data" permite enviar fotogracia-->
@csrf<!--imprimer una llave de seguridad-->
@include('empleado.form',['modo'=>'Crear'])<!-- ['modo'=>'Crear'] sirve para indicar la accion que de ejecuta en el boton-->
</form>
</div>
@endsection

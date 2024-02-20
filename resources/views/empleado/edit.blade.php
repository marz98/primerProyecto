@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}<!-- indicando que esta usando un metodo patch en ves de post-->
    @include('empleado.form',['modo'=>'Editar'])<!-- ['modo'=>'Editar'] sirve para indicar la accion que de ejecuta en el boton-->
</form>
</div>
@endsection

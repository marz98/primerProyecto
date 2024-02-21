<h1 class="">{{ $modo }} Empleado</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" class="form-control"
        value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }} " id="Nombre">
    <br>
</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input type="text" name="Apellido" class="form-control"
        value="{{ isset($empleado->apellido) ? $empleado->apellido : '' }}"
        id="Apellido"><!-- isset($empleado->apellido)?$empleado->apellido:''  dice que si existe el valor apellido lo va a implrimir si no no imprime nada-->
    <br>
</div>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" class="form-control"
        value="{{ isset($empleado->correo) ? $empleado->correo : '' }}" id="Correo">
    <br>
</div>
<div class="form-group">
    <label for="Foto"></label>
    @if (isset($empleado->foto))
        <img class="img-thumball img-fluid" src="{{ asset('storage') . '/' . $empleado->foto }}" width="100"
            alt=""><!-- asset da acceso a storage que es donde se guardan las imagenes-->
    @endif
    <input type="file" name="Foto" value="" id="Foto">
    <br>
</div>


<input class="btn btn-success" type="submit"
    value="{{ $modo }} datos"><!-- $modo esta en el en cada vista, sirve para indicar la accion que de ejecuta en el boton(crear, editar)-->
<a class="btn btn-primary" href="{{ url('empleado/') }}">Regresar</a>
<br>

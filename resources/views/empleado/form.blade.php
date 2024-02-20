<h1 class="">{{ $modo }} Empleado</h1>
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($empleado->nombre )?$empleado->nombre: ''}} " id="Nombre">
<br>
<label for="Apellido">Apellido</label>
<input type="text" name="Apellido" value="{{isset($empleado->apellido)?$empleado->apellido:''  }}" id="Apellido"><!-- isset($empleado->apellido)?$empleado->apellido:''  dice que si existe el valor apellido lo va a implrimir si no no imprime nada-->
<br>
<label for="Correo">Correo</label>
<input type="text" name="Correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}" id="Correo" >
<br>
<label for="Foto">Foto</label>
@if (isset($empleado->foto))
    <img src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt=""><!-- asset da acceso a storage que es donde se guardan las imagenes-->
@endif
<input type="file" name="Foto" value="" id="Foto">
<br>
<input type="submit" value="{{ $modo }} datos"><!-- $modo esta en el en cada vista, sirve para indicar la accion que de ejecuta en el boton(crear, editar)-->
<a href="{{ url('empleado/') }}">Regresar</a>
<br>

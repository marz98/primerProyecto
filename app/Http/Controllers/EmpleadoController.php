<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datoEmpleados=request()->except('_token');//all();//obtiene toda la imformacion que enien
        if ($request->hasFile('Foto')) {
            $datoEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleado::insert($datoEmpleados);

       // return response()->json($datoEmpleados);//responde con toda la informacion en un json
    return redirect('empleado')->with('mensaje','Registro agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);//para pasar la informacion al formulario editar
        return view('empleado.edit',compact('empleado'));//esto va junto
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datoEmpleados=request()->except(['_token','_method']);//para quitar el oken

        if ($request->hasFile('Foto')) {//verifica si existe esa foto
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->foto);//con esto se borra la informacion
            $datoEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleado::where('id','=',$id)->update($datoEmpleados);//busca la informacion que esta con el id que esta pasando y cuando lo encuentre hacer update con los datos
        //  para regresar al formulario que me envio informacion
        $empleado=Empleado::findOrFail($id);//para pasar la informacion al formulario editar
        return view('empleado.edit',compact('empleado'));//esto va junto
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //permite borrar
        $empleado=Empleado::findOrFail($id);//buscar la informacion
        if (Storage::delete('public/'.$empleado->foto)) {
            Empleado::destroy($id);
        }

       return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}

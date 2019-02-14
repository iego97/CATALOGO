<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//-->USA MODELO
use App\Mascota;
use App\Especie;

class CatalogoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //trae los registros
        $mascotas = Mascota::orderBy('id','desc')->get();

        //creamos los argumentos que le enviaremos a la vista

        $argumentos = array();
        $argumentos['mascotas'] = $mascotas;


        //-->CREAMOS LA VISTA
        return view('mascotas.index', $argumentos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



  //CREAR FORMULARIO
  public function create()
  {

      $especies = Especie::all();

      $argumentos = array();
      $argumentos['especies'] = $especies;



      return view('mascotas.create',$argumentos);
      
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creando instancia
        $nuevaMascota = new Mascota;

        //Los parametros del input son los "name" de 
        //los inputs del formulario del create

        
        $nuevaMascota->id_especie = $request->input('especie');
        $nuevaMascota->nombre = $request->input('nombre');
        $nuevaMascota->precio = $request->input('precio');
        $nuevaMascota->nacimiento = $request->input('nacimiento');

        //Guardar el nuevo registro

        $nuevaMascota->save();

        return redirect()->route('mascotas.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especies = Especie::all();
        $mascota = Mascota::find($id);

        $argumentos = array();
        $argumentos['especies'] = $especies;
        $argumentos['mascota'] = $mascota;

  
  
        return view('mascotas.edit',$argumentos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Encontrar mascota editar
        $mascota = Mascota::find($id);
        //Modificar valores
        $mascota->id_especie = $request->input('especie');
        $mascota->nombre = $request->input('nombre');
        $mascota->precio = $request->input('precio');
        $mascota->nacimiento = $request->input('nacimiento');
        //Guardar cambios
        $mascota->save();

        return redirect()->route('mascotas.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota = Mascota::find($id);

        if($mascota->delete()){

            return redirect()->route('mascotas.index')->
            with('exito','Mascota eliminada');

        };

        

        return redirect()->route('mascotas.index')->
        with('error','No se pudo eliminar mascota');
    }
    


}

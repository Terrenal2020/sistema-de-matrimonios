<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Personas=Personas::all();
        return view('mostrar')->with('personas',$Personas);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $personas =new  Personas();
        $personas->Nombre=$request->get('nombre');
        $personas->ApellidoP=$request->get('apPaterno');
        $personas->ApellidoM=$request->get('apMaterno');
        $personas->Sexo=$request->get('sexo');
        $personas->Edad=$request->get('edad');
        $personas->EdoCivil=$request->get('estado');
        $personas->save();
        echo "<script>alert('Registro guardado');</script>";
        return view('registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //$personas=Personas::all($id);
        $personas = Personas::findOrFail($id);

        return view('editar')->with('personas',$personas);;
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $personas=Personas::findOrFail($id);
        $personas->Nombre=$request->nombre;
        $personas->ApellidoP=$request->apPaterno;
        $personas->ApellidoM=$request->apMaterno;
        $personas->Sexo=$request->sexo;
        $personas->Edad=$request->edad;
        $personas->EdoCivil=$request->estado;
        $personas->save();
        $Personas=Personas::all();
        return view('mostrar')->with('personas',$Personas);;
        //return back()->with('mensaje', 'Persona Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas=Personas::findOrFail($id);
        $personas->delete();
        //return redirect('productos');

        return back()->with('mensaje', 'Persona Eliminada');
        //dd($id);

    }

    public function getRegistro(){
        return view('registro');
    }

//metodo mostrar consulta
public function getMostrar(){
    return view('mostrar');
}
//inicio de sesion
 //inicio de sesion

 //metodo para casar
 public function  mostrarPersonas(){
   
 $Personas = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
 ->where('EdoCivil', 'Soltero(a)')->get();

 $Personas=Personas::all();

   return view('crearMatrimonio', ['personas' => $Personas],compact('Personas') );
//return view('crearMatrimonio')->with('personas',$Personas);;
 }

 public function mostrarMujeres($id){
 
    $Personas = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
 ->where('EdoCivil', 'Soltero(a)')->where('Sexo', 'Femenino')->get();

 $Personass = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
 ->where('id', $id)->get();

 $personasss = Personas::findOrFail($id);      
   return view('mostrarMujeres', ['personas' => $Personas], ['personass' => $Personass])->with('personasss',$personasss);
 }

 public function getMatrimonioMujer($id){

 }

}

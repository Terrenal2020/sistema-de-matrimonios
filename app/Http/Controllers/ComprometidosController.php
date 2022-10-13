<?php

namespace App\Http\Controllers;
use App\Models\Personas;
use App\Models\historialmatrimonios;
use App\Models\Comprometidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ComprometidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comprometidos  $comprometidos
     * @return \Illuminate\Http\Response
     */
    public function show(Comprometidos $comprometidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comprometidos  $comprometidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Comprometidos $comprometidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprometidos  $comprometidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comprometidos $comprometidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprometidos  $comprometidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comprometidos $comprometidos)
    {
        //
    }

    public function comprometer (Request $request){
        $nom = $request->itemName;
        $nomM=$request->itemNameF;
        $apM=$request->apMaterno;
     
        $apPM=$request->apPaternoF;
        $apMM=$request->apMaternoF;

        //echo "<script> alert($nom) </script>";
        //echo "<script> alert($nomM) </script>";

        $registroDe = DB::select('select personas.id,Nombre, ApellidoP,ApellidoM,Sexo,Edad,EdoCivil from 
        personas where personas.id=? ', [
            $nom
            
            ]
        ); 
        $registroLo = DB::select('select personas.id,Nombre, ApellidoP,ApellidoM,Sexo,Edad,EdoCivil from 
        personas where personas.id=? ', [
    
            $nomM
           
            ]
        ); 
      
       
        $Personas = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
        ->where('EdoCivil', 'Casado(a)')->get();
            $Personas=Personas::all();

        if(sizeof($registroDe)>0){
            if(sizeof($registroLo)>0){
                  //obtenemos el id de las personas hombre y mujer
                $personasss = DB::table( 'personas' )->where( 'id', '=', $nom )->get();
               
                $NomPersonaHombre=$personasss[0]->Nombre;
                $APersonaHombre=$personasss[0]->ApellidoP;
                $AMdPersonaHombre=$personasss[0]->ApellidoM;
                $personass = DB::table( 'personas' )->where( 'id', '=', $nomM )->get();
                $NomPersonaMujer=$personass[0]->Nombre;
                $ApMPersonaMujer=$personass[0]->ApellidoP;
                $aMPersonaMujer=$personass[0]->ApellidoM;
        
                //gurdar en la base de datos comprometidos
                $comprometido =new  Comprometidos();
                $comprometido->clave=$request->get('folio');
                $comprometido->NombreEsposo= $NomPersonaHombre;
                $comprometido->ApellidoP=$APersonaHombre;
                $comprometido->ApellidoM=$AMdPersonaHombre;
                $comprometido->NombreEsposa=$NomPersonaMujer;
                $comprometido->ApellidoPa=  $ApMPersonaMujer;
                $comprometido->ApellidoMa=$aMPersonaMujer;
                $comprometido->estatus='Comprometido(a)';
                $comprometido->save();
                ///guarda en el historial
                $guardaHistorial=new historialmatrimonios();
                $guardaHistorial->clave=$request->get('folio');
                $guardaHistorial->Nombre=$NomPersonaHombre;
                $guardaHistorial->ApellidoP=$APersonaHombre;
                $guardaHistorial->ApellidoM=$AMdPersonaHombre;
                $guardaHistorial->NombreP1=$NomPersonaMujer;
                $guardaHistorial->ApellidoP2=$ApMPersonaMujer;
                $guardaHistorial->ApellidoM2=$aMPersonaMujer;
                $guardaHistorial->estatus='Comprometido(a)';
                $guardaHistorial->save();

                //guarda datos
                $guardaHistorial=new historialmatrimonios();
                $guardaHistorial->clave=$request->get('folio');
                $guardaHistorial->Nombre=$NomPersonaMujer;
                $guardaHistorial->ApellidoP=$ApMPersonaMujer;
                $guardaHistorial->ApellidoM=$aMPersonaMujer;
                $guardaHistorial->NombreP1=$NomPersonaHombre;
                $guardaHistorial->ApellidoP2=$APersonaHombre;
                $guardaHistorial->ApellidoM2=$AMdPersonaHombre;
                $guardaHistorial->estatus='Comprometido(a)';
                $guardaHistorial->save();

                ///modificar en la base de datos de personas del hombre
           
                $personas=Personas::findOrFail($nom);
                $personas->EdoCivil='Casado(a)';
                $personas->save();
                $personas=Personas::findOrFail($nomM);
                $personas->EdoCivil='Casado(a)';
                $personas->save();

            echo "<script> alert('Registro Encontrado con exito') </script>";
           return view( 'comprometido', compact( 'registroDe','registroLo'));


            }else{
                echo "<script> alert('Registro Femenino No encontrado') </script>";
                return view('crearMatrimonio', ['personas' => $Personas],compact('Personas') );

            }
        }else{
            echo "<script> alert('Registro Masculino No Encontrado') </script>";
             return view('crearMatrimonio', ['personas' => $Personas],compact('Personas') );
    
        }
    }

    //mostrar todos los matrimonios

    public function mostrarMatrimonios(){
        
 $comprometidos = DB::table('comprometidos') ->select('id','clave', 'NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa',
 'ApellidoMa','estatus')->get();

 $comprometidos=Comprometidos::all();

   return view('mostrarComprometidos', ['comprometidos' => $comprometidos],compact('comprometidos') );
        
    }
//metodo para buscar mediante el folio
    public function getBuscarCompre(Request $request){
        $folio = $request->folio;
        $registroDe = DB::select('select comprometidos.id,clave, NombreEsposo,ApellidoP,ApellidoM,NombreEsposa,ApellidoPa,ApellidoMa,estatus from 
        comprometidos where comprometidos.clave=? ', [
            $folio
           
            ]
        ); 
        $comprometidos = DB::table('comprometidos') ->select('id','clave', 'NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa',
        'ApellidoMa','estatus')->get();
       
        $comprometidos=Comprometidos::all();

        if(sizeof($registroDe)>0){
            echo "<script> alert('Registro Encontrado con exito') </script>";
           return view( 'encontradoComprometido', compact( 'registroDe'));
            }else{
                echo "<script> alert('Clave de registro No Valida') </script>";
                       
            $comprometidos = DB::table('comprometidos') ->select('id','clave', 'NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa',
            'ApellidoMa','estatus')->get();

            $comprometidos=Comprometidos::all();

            return view('mostrarComprometidos', ['comprometidos' => $comprometidos],compact('comprometidos') );
          
            }
        }
        //funcion para Hacer el divorcio
        public function divorcio($id,$nombre,$apellidoP,$nombreM,$apellidoPM){
            //consulta a la base de datos
            $personasss = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
        ->where('Nombre','=' ,$nombre)->get();
        $personass = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
        ->where('Nombre','=' ,$nombreM)->get();

            $idPersonaHombre=$personasss[0]->id;
            $idPersonaMujer=$personass[0]->id;
            //pasa a soltero nuevamente del divorcio
            $personas=Personas::findOrFail($idPersonaHombre);
                $personas->EdoCivil='Soltero(a)';
                $personas->save();
                $personas=Personas::findOrFail($idPersonaMujer);
                $personas->EdoCivil='Soltero(a)';
                $personas->save();
                //borra de la tabla comprometido
                $comprometido=Comprometidos::findOrFail($id);
                $comprometido->delete();

                //rregresar a la vista de todos
                $comprometidos = DB::table('comprometidos') ->select('id','clave', 'NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa',
                'ApellidoMa','estatus')->get();
    
                $comprometidos=Comprometidos::all();
                echo "<script> alert('Divorcio realizado con exito') </script>";
                return view('mostrarComprometidos', ['comprometidos' => $comprometidos],compact('comprometidos') );

           
        }
        //funcion para el select masculinos solteros
        public function ajaxdata(Request $request)
        {
             $data = [];
 
             if ($request->has('q')) {
                 $search = $request->q;
                 $data = Personas::select("id","Nombre")->where('Nombre','LIKE',"%$search%")->where('Sexo', 'Masculino') ->where('EdoCivil', 'Soltero(a)')->get();
             }
             return response()->json($data);
        }
        //funcion para el select femeninos solteras
        public function ajaxdataa(Request $request)
        {
             $data = [];
 
             if ($request->has('q')) {
                 $search = $request->q;
                 $data = Personas::select("id","Nombre")->where('Nombre','LIKE',"%$search%")->where('Sexo', 'Femenino') ->where('EdoCivil', 'Soltero(a)')->get();
             }
             return response()->json($data);
        }

        //select en historial
        public function ajaxdataSelect(Request $request)
        {
             $data = [];
 
             if ($request->has('q')) {
                 $search = $request->q;
                 $data = Personas::select("id","Nombre")->where('Nombre','LIKE',"%$search%")->where('Sexo', 'Masculino') ->where('EdoCivil', 'Soltero(a)')->get();
             }
             return response()->json($data);
        }



//mostrar el historial de comprometidos
public function mostrarHistorialMatrimonios(){
           
 $comprometidos = DB::table('comprometidos') ->select('id','clave', 'NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa',
 'ApellidoMa','estatus')->get();

 $Personas = DB::table('personas') ->select('id','Nombre', 'ApellidoP','ApellidoM','Sexo','Edad','EdoCivil')
 ->where('EdoCivil', 'Soltero(a)')->get();

 $Personas=Personas::all();

   return view('historialMatrimonios', ['personas' => $Personas], ['comprometidos' => $comprometidos],compact('Personas') );
 $comprometidos=Comprometidos::all();

 
}
    }
        
    


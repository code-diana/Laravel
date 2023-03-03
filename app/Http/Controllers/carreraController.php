<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Runner;
use App\Models\Inscription;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class carreraController extends Controller
{
    public function addRace(Request $request){
        
        if(isset($_POST['send']) && Race::where('description',request('description'))->count()==0){
            Race::create([
                'title'=>request('title'),
                'description'=>request('description'),
                'unevenness'=>request('unevenness'),
                'image'=>request('image'),
                'number_participants'=>request('number_participants'),
                'km'=>request('km'),
                'date'=>request('date'),
                'promotion'=>request('promotion'),
                'start'=>request('start'),
                'state'=>1,
                'price'=>request('price')
               

            ]);  

            //subir la imagen
            if($request->hasFile('image')){
                $imagen = $request->file('image');
                $promotion = $request->file('promotion');

                //aquí le asignamos el nombre
                $nombreimagen = Str::slug($request->file('image')).".".$imagen->guessExtension();
                $nombreprom = Str::slug($request->file('promotion')).".".$promotion->guessExtension();

                //y la ruta
                $ruta = public_path("../resources/img/");
    
                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);     
                copy($promotion->getRealPath(),$ruta.$nombreprom);     
                
            }
        }
        else{
            echo "Esta carrera ya ha sido creada";
        }

        return redirect('/anyadirCarrera');
    }

    public function showAddRace(){
        return view('admin.carreras.anyadirCarrera');
    }

    public function changeState(Request $request){
        $race= Race::find($request->id);
        $estado = $race->state;
        if($estado==1){
            $race->state = 0;
        }
        else{
            $race->state = 1;
        }
        $race->save();
        $race = Race::all();
        
        //hay que hacerlo asi si no peta y no se muestran las imagenes por el id
        return redirect()->route('editarCarrera',[
            'carreras' => $race
        ]);  
    }

    public function editRace(Request $request){
        $carrera = Race::find($request->id);
        if ($request->isMethod('post')){
            $carrera->title = $request->input('title');
            $carrera->description = $request->input('description');
            $carrera->unevenness = $request->input('unevenness');
            $carrera->number_participants = $request->input('number_participants');
            $carrera->km = $request->input('km');
            $carrera->date = $request->input('date');
            $carrera->start = $request->input('start');
            $carrera->price = $request->input('price');


            $carrera->save();
            $carrera = Race::all();
            return redirect()->route('editarCarrera' , [
                'carreras'=>$carrera
            ]); 
        }      
        else{
            return view('admin.carreras.cambiarCarrera' ,[
                'carreras' => $carrera
            ]);
        }
    }

    public function editImage(Request $request){
        $carrera = Race::find($request->id);
        if ($request->isMethod('post')){
            //importante poner file no input
            $carrera->image = $request->file('image');
            //lo de subir la imagen... importante multipart/form-data
            if($request->hasFile('image')){
                $imagen = $request->file('image');

                //aquí le asignamos el nombre
                $nombreimagen = Str::slug($request->file('image')).".".$imagen->guessExtension();
                //y la ruta
                $ruta = public_path("../resources/img/");
    
                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);     
            }

            $carrera->save();
            $carrera = Race::all();
            return redirect()->route('editarCarrera' , [
                'carreras'=>$carrera
            ]); 
        }      
        else{
            return view('admin.carreras.cambiarImagen' ,[
                'carreras' => $carrera
            ]);
        }
    }


    public function editProm(Request $request){
        $carrera = Race::find($request->id);
        if ($request->isMethod('post')){
            //importante poner file no input
            $carrera->promotion = $request->file('image');
            //lo de subir la imagen... importante multipart/form-data
            if($request->hasFile('image')){
                $imagen = $request->file('image');

                //aquí le asignamos el nombre
                $nombreimagen = Str::slug($request->file('image')).".".$imagen->guessExtension();
                //y la ruta
                $ruta = public_path("../resources/img/");
    
                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);     
            }

            $carrera->save();
            $carrera = Race::all();
            return redirect()->route('editarCarrera' , [
                'carreras'=>$carrera
            ]); 
        }      
        else{
            return view('admin.carreras.cambiarCartel' ,[
                'carreras' => $carrera
            ]);
        }
    }


    public function showEditRace(){
        $carreras = Race::all();
        return view('admin.carreras.editarCarrera',[
            'carreras' => $carreras
        ]);  
        //echo $carreras;
    }

    public function showInfoRace(Request $request){
        $id = $request->id;
        $races = Race::find($id);
        return view('infoRace' , [
            'races' => $races
        ]);
    }


    public function qr(Request $request){ 
        $id = $request -> id;
        $races = Race::find($id);

        //importante el where!
        $runner = Runner::select('runners.*')->join('inscriptions', 'inscriptions.runner_id', '=', 'runners.id')->join('races', 'races.id','=','inscriptions.race_id')->where('inscriptions.race_id',$id)->get();
        $dorsales= Inscription::where('race_id',$id)->get();
        //rellenar los dorsales
        return view('admin.carreras.qrs',[
            'races' => $races,
            'runner' => $runner,
            'dorsales' => $dorsales
        ]);
       
        
    }

    
}

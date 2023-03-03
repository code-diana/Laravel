<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Race;
use Illuminate\Support\Str;

class pictureController extends Controller
{
    //
    public function uploadF(Request $request){
        $carrera = Race::find($request->id);
        if ($request->isMethod('post')){

            Picture::create([
            'race_id' => $request->id,
            'image' => request('image'),
            ]);

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

            $carrera = Race::all();
            return redirect()->route('editarCarrera' , [
                'carreras'=>$carrera
            ]); 
        }      
        else{
            return view('admin.carreras.subirFotos' ,[
                'carreras' => $carrera
            ]);
        }
    }

    public function viewF(Request $request){
        $carrera = Race::find($request->id);
        
        $pictures= Picture::where('race_id',$request->id)->get();
        return view('admin.carreras.verFotos' ,[
            'fotos' => $pictures,
            'carreras'=> $carrera
        ]);
        
    }

    public function viewPage(Request $request){
        $carrera = Race::find($request->id);
        
        $pictures= Picture::where('race_id',$request->id)->get();
        return view('fotosCarreras' ,[
            'fotos' => $pictures,
            'carreras'=> $carrera
        ]);
        
    }
}
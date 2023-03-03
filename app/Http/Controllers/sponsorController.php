<?php

namespace App\Http\Controllers;
use App\Models\Sponsor;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class sponsorController extends Controller
{
    public function index(){
        $sponsor = Sponsor::all();
        return view("admin.sponsors.mostrarSponsors" , [
            'sponsor' => $sponsor
        ]);
    }

    public function create(Request $request){
        if(isset($_POST['create'])){
            $sponsor = new Sponsor();
            $name = $request->input('name');
            //Si existe un nombre duplicado del sponsor
            if ($sponsor::where('name', $name)->exists()) {
                ?><script>alert("Ya existe este sponsor!")</script><?php
                return view('admin.sponsors.anyadirSponsor');
            }
            else{
                $sponsor = Sponsor::create([
                    'name' => $request->input('name'),
                    'description' => $request->input('desc'),
                    'logo' => $request->file('logo'),
                    'main_plain' => $request->input('pp'),
                ]);
                
                //subir la imagen
                if($request->hasFile('logo')){
                    $imagen = $request->file('logo');

                    //aquí le asignamos el nombre
                    $nombreimagen = Str::slug($request->file('logo')).".".$imagen->guessExtension();

                    //y la ruta
                    $ruta = public_path("../resources/img/");

                    //$imagen->move($ruta,$nombreimagen);
                    copy($imagen->getRealPath(),$ruta.$nombreimagen);        
                }
                return redirect('mostrarSponsors');
            }
        }        
        else{
            $race = Race::where('state', 1)->get();
            return view('admin.sponsors.anyadirSponsor' , ['race' => $race]);
        }
    }

    public function activate(Request $request){
        $id = $request->id;
        $sponsor = Sponsor::find($id);
        $estado = $sponsor->sponsorState;
        if($estado==1){
            $estado = $sponsor->sponsorState = 0;
            echo $estado;
        }
        else{
            $sponsor->sponsorState = 1;
        }
        $sponsor->save();
        return redirect('mostrarSponsors');   
    }

    public function edit(Request $request){
        $id = $request->id;
        $sponsor = Sponsor::find($id);
        //Si se envian datos , modifica el registro
        if ($request->isMethod('post')){            
            $sponsor->name = $request->input('name');
            $sponsor->description = $request->input('desc');
            $sponsor->main_plain = $request->input('pp');
            $sponsor->save();
            return redirect('mostrarSponsors');
        }      
        else{
            return view('admin.sponsors.editarSponsor' ,[
                'sponsor' => $sponsor
            ]);
        }
    }

    public function editLogo(Request $request){
        $id = $request->id;
        $sponsor = Sponsor::find($id);
        if ($request->isMethod('post')){
            $sponsor->logo = $request->file('logo');

            //Editar el logo
            if($request->hasFile('logo')){
                $imagen = $request->file('logo');

                //aquí le asignamos el nombre
                $nombreimagen = Str::slug($request->file('logo')).".".$imagen->guessExtension();

                //y la ruta
                $ruta = public_path("../resources/img/");

                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);        
                
            }
            $sponsor->save();
            $sponsor = Sponsor::all();
            return redirect()->route('mostrarSponsors' , [
                'sponsors'=>$sponsor
            ]);
        }
        else{
            return view('admin.sponsors.editarLogo' ,[
                'sponsor' => $sponsor
            ]);
        }
    }
}

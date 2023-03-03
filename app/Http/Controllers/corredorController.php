<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Runner;
use App\Models\Race;
use App\Models\Insurance;
use App\Models\Inscription;
use App\Models\Ensure;


class corredorController extends Controller
{
    //
    public function showForm(Request $request){
        //común para enviar a inscripciones y form
        $id = $request->id;
        $races = Race::find($id);


        if(isset ($_POST['inscription'])){
            //control de isncripciones
            
            //el ordden es importante ... >:CCC
            if (Inscription::find(request('id'))==NULL || Inscription::all()->count()<$races->number_participants){
                if(request('sexo')=='masculino'){
                    $sex=1;
                }
                else{
                    $sex=0;
                }


                if(request('option')=='pro'){
                    $pro=1;
                }
                else{
                    $pro=0;
                }


                $runner=Runner::create([
                    'name'=>request('nombre'),
                    'last_name'=>request('surname'),
                    'adress'=>request('direction'),
                    'birth_date'=>request('birth'),
                    'sex'=>$sex,
                    'pro'=>$pro,
                    'federation_number'=>request('fed'),
                    'points'=>0

                ]);

                // $corredor=DB::table('runners')->where('name', request('nombre') );
                $nameAs=request('aseguradora');

                $As=Insurance::where('name', $nameAs)->first();
                //hacerlo así si no peta(poner nombre en la ruta!!)
                
                // if ($pro==0){
                    return redirect()->route('ins',[
                            'runner'=>$runner->id,
                            'id'=> request('id'),
                            'aseguradora' => $As->id,
                            'pro' => $pro
                    ]);
                // }
                // else{
                //     return redirect('/');
                // }
            }
            else{
                ?> <script>alert('No se pueden inscribir más corredores')</script> <?php
                return view('corredor.altaCorredor',[
                    'races' => $races,
                    'aseguradoras' => Insurance::all()
                ]);
            }
            
        }
        else{
        return view('corredor.altaCorredor',[
            'races' => $races,
            'aseguradoras' => Insurance::select('insurances.*')
            ->join('ensures', 'ensures.id_insurances', '=', 'insurances.id')->
            where('ensures.id_race','=', $id)->get(),

            'ensures' => Ensure::select('ensures.*')->where('ensures.id_race', '=', $id)->get()
        ]);
        }

    }


}
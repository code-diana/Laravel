<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //Crear un nuevo registro
    public function create(Request $request){
        $admin = new Admin();
        if (isset($_POST['send'])){
            $user_name = $admin->user_name = $_POST['email'];
            $passwd=$_POST['passwd'];
            //Si existe la clave primaria
            if (Admin::where('user_name', $user_name )->where('passwd',$passwd)->exists()) {
                $_POST['email'] = session('admin');
                $request->session()->start();
                return redirect('/paginaPrincipal');
            }
            else{
                ?><script>alert('Nombre de usuario o contraseña incorrectos');</script><?php
                return view('admin.formAdmin');
            }
        }
    }

    public function show(){
        return view('admin.formAdmin');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
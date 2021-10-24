<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   //Listado
   public function list(){
    $users = DB::table('usuarios')

        ->join('rol', 'usuarios.rol_id', '=', 'rol.id_rol')
        ->select('usuarios.*', 'rol.descripcion')
        ->paginate(5);


    return view('usuarios.list', compact('users'));

    }

    //Formulario
    public function userform(){
        $rol=Rol::all();

        return view('usuarios.userform', compact('rol'));

    }

    //Guardar Usuarios
    public function save(Request $request){
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:100',
            'email'=> 'required|string|max:100|email|unique:usuarios',
            'rol'=> 'required'
        ]);
        Usuario::create([
            'nombre'=>$validator['nombre'],
            'email'=>$validator['email'],
            'rol_id'=>$validator['rol']
        ]);

        return back()->with('usuarioGuardado','Usuario Guardado');
    }

     //Formulario Editar usuarios
     public function editform($id){
        $rol=Rol::all();
        $usuario = Usuario::findOrfail($id);
        return view ('usuarios.editform', compact('usuario', 'rol'));

    }

    //Editar usuarios
    public function edit(Request $request,$id)
    {

        $dataUsuario = request()->except ((['_token','_method']));
        Usuario::where('id', '=', $id)->update($dataUsuario);

        return back()->with('usuarioModificado', 'Usuario Modificado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuarioRequest;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LengthException;

class UsuarioController extends Controller
{
   public function store (usuarioRequest $request){
    $usuario = usuario::create([
     'nome' => $request->nome,
     'cpf' =>$request->cpf,
     'celular' => $request->celular,
     'email' => $request->email,
     'password'=>Hash::make($request->password) 
    ]);
    return response()->json([
        "success" => true,
        "message" => "usuario cadastrado com sucesso",
        "data"    =>$usuario
    ],200);
   }

   public function pesquisaPorId($id){
    $usuario = Usuario:: find ($id);

if($usuario == null){
   return response()->json([
      'status'=> false,
      'message' =>"Usuário não encontrado"
   ]);
}

    return response()->json([
        'status'=> true,
        'data' => $usuario
    ]);
   }

   public function pesquisaPorCpf($cpf){
    $usuario =Usuario::where('cpf', '=', $cpf)->first();

    if($usuario == null){
    return response()->json([
        'status'=> false,
        'message' =>"Usuário não encontrado"
     ]);
  }
 
    return response()->json([
        'status'=> true,
        'data' => $usuario
    ]);
   }

   public function retornarTodos(){
    $usuarios =  Usuario::all();
    return response()->json([
        'status'=> true,
        'data' => $usuarios
    ]);
   }

   public function pesquisarPorNome(Request $request){
    $usuarios =  usuario::where('nome', 'like', '%'. $request->nome . '%')->get();

   

      if(count($usuarios ) > 0){
    return response()->json([
        'status'=> true,
        'data' => $usuarios
 ]);

}


    return response()->json([
        'status'=> false,
        'message' =>"Usuário não encontrado"
     ]);
  }

public function excluir($id){
 $usuario = Usuario::find($id);

 if(!isset($usuario)){
    return response()->json([
   'status' => false,'message' => "usuário não encontrado"
    ]);
 }

 $usuario->delete();

 return response()->json([
'status' => true, 'message'=> "usuário excluído com sucesso"
 ]);





}
public function update(Request $request){
    $usuario = Usuario::find($request->id);

    if(!isset($usuario)){
        return response()->json([
            'status' => 'Usuário não encontrado'
        ]);
    }
if(isset($request->nome)){
    $usuario->nome =$request->nome;
}

if(isset($request->email)){
    $usuario->email =$request->email;
}
if(isset($request->cpf)){
    $usuario->cpf =$request->cpf;

$usuario->update();

return response()->json([
'status' =>true,
'message'=> 'usuário atualizando'
]);
}

}
}
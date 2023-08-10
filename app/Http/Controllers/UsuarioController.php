<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
   public function store (Request $request){
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
}

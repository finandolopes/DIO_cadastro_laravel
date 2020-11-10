<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use App\Model\Usuario as UsuarioModel;

class Usuario extends Controller
{
    public function cadastrar()
    {
        return view('usuario.cadastro');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            "nome" => "required",
            "email" => "required|email|unique:usuario,email",
            "senha" => "required|min:5"
        ]);

        if (UsuarioModel::cadastrar($request)) {
            return view('usuario.sucesso', [
                'fulano' => $request->input('nome')
            ]);

        } else {
            echo "Falha na execução";
        }


    }
}

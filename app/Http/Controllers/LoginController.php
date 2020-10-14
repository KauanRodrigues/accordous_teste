<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionarios;

class LoginController extends Controller
{
    private $funcionarios;

    function __construct(Funcionarios $funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }

    /**
     * Responsável por realizar o login no sistema
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logar(Request $request)
    {
        $dados['usuario']   = trim($request->usuario);
        $dados['senha']     = MD5(trim($request->senha));

        $response = $this->funcionarios->select('nome', 'email', 'usuario')
                                        ->where([ [ 'usuario', '=', $dados['usuario'] ], [ 'senha', '=', $dados['senha'] ] ])
                                        ->first();

        if(empty($response))
            return response()->json(false);

        session()->put('FUNCIONARIO', [
            'NOME'      => $response->nome,
            'EMAIL'     => $response->email,
            'USUARIO'   => $response->usuario
        ]);

        return response()->json(true);
    }

    /**
     * Realiza o logout no sistema destruindo todas as sessoes e redirecionando para a tela principal
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}

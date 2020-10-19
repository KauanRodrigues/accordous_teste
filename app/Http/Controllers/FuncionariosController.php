<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
    private $funcionarios;

    function __construct(Funcionarios $funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }

    /**
     * Redireciona para a tela de cadastro de funcionário
     */
    public function create()
    {
        return view('cadastro.funcionario');
    }

    /**
     * Insere um novo funcionário ao banco de dados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['nome']      = trim($request->nome);
        $dados['email']     = trim($request->email);
        $dados['usuario']   = trim($request->usuario);
        $dados['senha']     = MD5(trim($request->senha));

        if(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) 
            return response()->json('invalid_mail');

        try{
            $this->funcionarios->create($dados);
            DB::commit();
            return response()->json(true);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(false);
        }
    }

    /**
     * Redireciona o usuário para a tela de relatório de funcionários
     */
    public function index()
    {
        return view('relatorio.funcionario');
    }

    /**
     * Busca todos os funcionários cadastrados no banco de dados para a tabela de funcionários no relatório
     * 
     * @return \Illuminate\Http\Response
     */
    public function get_all_funcionarios()
    {
        $response = $this->funcionarios->select('id', 'nome', 'email', 'usuario')->get();
        return response()->json($response);
    }
}
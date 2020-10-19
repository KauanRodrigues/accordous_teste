<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proprietarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProprietariosController extends Controller
{
    private $proprietarios;

    function __construct(Proprietarios $proprietarios)
    {
        $this->proprietarios = $proprietarios;
    }

    /**
     * Redireciona para a tela de cadastro de proprietário
     */
    public function create()
    {
        return view('cadastro.proprietario');
    }

    /**
     * Insere um novo proprietário no banco de dados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['nome']          = trim($request->nome);
        $dados['email']         = trim($request->email);
        $dados['cpf']           = $request->cpf;
        $dados['cep']           = $request->cep;
        $dados['logradouro']    = trim($request->logradouro);
        $dados['numero']        = trim($request->numero);
        $dados['bairro']        = trim($request->bairro);
        $dados['cidade']        = trim($request->cidade);
        $dados['uf']            = $request->uf;
        $dados['complemento']   = trim($request->complemento);

        if(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) 
            return response()->json('invalid_mail');

        try{
            $this->proprietarios->create($dados);
            DB::commit();
            return response()->json(true);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(false);
        }
    }

    /**
     * Busca proprietários cadastrados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get_proprietario(Request $request)
    {
        if(empty($request->search))
        {
            $response = $this->proprietarios->select('id', 'nome')->get();
        }
        else
        {
            $response = $this->proprietarios->select('id', 'nome')->where([ [ 'nome', 'like', '%'.$request->search.'%' ] ])->get();
        }

        return response()->json($response);
    }

    /**
     * Redireciona para a tela de relatório de proprietários
     */
    public function index()
    {
        return view('relatorio.proprietario');
    }

    /**
     * Busca os proprietários cadastrados no banco de dados para exibir no relatório
     * 
     * @return \Illuminate\Http\Response
     */
    public function get_all_proprietarios()
    {
        $response = $this->proprietarios->select('id', 'nome', 'email', 'cpf')->get();
        return response()->json($response);
    }
}
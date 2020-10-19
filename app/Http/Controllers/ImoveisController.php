<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imoveis;
use Illuminate\Support\Facades\DB;

class ImoveisController extends Controller
{
    private $imoveis;

    function __construct(Imoveis $imoveis)
    {
        $this->imoveis = $imoveis;
    }

    /**
     * Redireciona para a tela de cadastro de imóveis
     */
    public function create()
    {
        return view('cadastro.imoveis');
    }

    /**
     * Insere novo imóvel no banco de dados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['fk_proprietario']   = $request->proprietario;
        $dados['quartos']           = $request->quartos;
        $dados['salas']             = $request->salas;
        $dados['garagem']           = $request->garagem;
        $dados['andares']           = $request->andares;
        $dados['cozinhas']          = $request->cozinhas;
        $dados['banheiros']         = $request->banheiros;
        $dados['cep']               = $request->cep;
        $dados['logradouro']        = trim($request->logradouro);
        $dados['numero']            = trim($request->numero);
        $dados['bairro']            = trim($request->bairro);
        $dados['cidade']            = trim($request->cidade);
        $dados['uf']                = $request->uf;
        $dados['complemento']       = trim($request->complemento);

        try{
            $this->imoveis->create($dados);
            DB::commit();
            return response()->json(true);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(false);
        }
    }

    /**
     * Redireciona para a tela de relatório de imóveis
     */
    public function index()
    {
        return view('relatorio.imoveis');
    }

    /**
     * Busca os imóveis cadastrados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get_imoveis(Request $request)
    {
        $sinal = '=';

        if($request->status == 2)
            $sinal = '!=';

        $response = $this->imoveis->select('imoveis.id', 'imoveis.status', 'imoveis.logradouro', 'imoveis.numero', 'imoveis.bairro', 'imoveis.cidade', 'imoveis.uf', 'prop.nome')
                        ->join('proprietarios AS prop', 'prop.id', '=', 'imoveis.fk_proprietario')
                        ->where([ [ 'imoveis.status', $sinal, $request->status ] ])
                        ->get();
        
        return response()->json($response);
    }

    /**
     * Remove um imóvel especifico
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $this->imoveis->where([ [ 'imoveis.id', '=', $request->id ] ])->delete();
            DB::commit();
            return response()->json(true);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(false);
        }
    }
}
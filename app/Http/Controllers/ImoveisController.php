<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imoveis;
use App\Models\Proprietarios;
use Illuminate\Support\Facades\DB;

class ImoveisController extends Controller
{
    private $imoveis;
    private $proprietarios;

    function __construct(Imoveis $imoveis, Proprietarios $proprietarios)
    {
        $this->imoveis = $imoveis;
        $this->proprietarios = $proprietarios;
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

    /**
     * Exibe detalhes do imóvel
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get_detalhes_imovel(Request $request)
    {
        $response = $this->imoveis->select('imoveis.quartos', 'imoveis.garagem', 'imoveis.andares', 'imoveis.banheiros', 'imoveis.salas', 'imoveis.cozinhas',
                                            'imoveis.logradouro', 'imoveis.bairro', 'imoveis.cidade', 'imoveis.uf', 'imoveis.numero', 'imoveis.complemento', 'imoveis.status',
                                            'prop.nome AS nome_prop', 'prop.email AS email_prop', 'prop.cpf AS cpf_prop',
                                            'alugueis.nome AS nome_contratante', 'alugueis.email AS email_contratante', 'alugueis.cpf_cnpj AS cpf_cnpj_contratante')
                                    ->join('proprietarios AS prop', 'prop.id', '=', 'imoveis.fk_proprietario')
                                    ->leftJoin('alugueis', 'alugueis.fk_imovel', '=', 'imoveis.id')
                                    ->where([ [ 'imoveis.id', '=', $request->id ] ])
                                    ->first();

        return response()->json($response);
    }
}
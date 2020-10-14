<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alugueis;
use App\Models\Imoveis;

class AlugueisController extends Controller
{
    private $alugueis;
    private $imoveis;

    function __construct(Alugueis $alugueis, Imoveis $imoveis)
    {
        $this->alugueis = $alugueis;
        $this->imoveis = $imoveis;
    }

    /**
     * Redireciona para a tela de operações de aluguel
     */
    public function create()
    {
        return view('operacoes.aluguel');
    }

    /**
     * Insere os dados do aluguel no banco de dados
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['fk_imovel'] = $request->imovel;
        $dados['nome'] = trim($request->nome);
        $dados['email'] = trim($request->email);
        $dados['documento'] = $request->documento;
        $dados['cpf_cnpj'] = $request->cpf_cnpj;

        try{
            $this->alugueis->create($dados);
            $this->imoveis->where([ [ 'id', '=', $dados['fk_imovel'] ] ])->update(['status' => 1]);
            DB::commit();
            return response()->json(true);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(false);
        }
    }

    /**
     * Busca os imoveis cadastrados para serem exibidos no select2 da tela de alugueis
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get_all_imoveis(Request $request)
    {
        if(empty($request->search))
        {
            $response = $this->imoveis->select('id', 'logradouro', 'bairro', 'cidade', 'uf')->where([ [ 'status', '=', 0 ] ])->get();
        }
        else
        {
            $response = $this->imoveis->select('id', 'logradouro', 'bairro', 'cidade', 'uf')
                                        ->where([ [ 'logradouro', 'LIKE', '%'.$request->search.'%' ] ])
                                        ->orWhere([ [ 'bairro', 'LIKE', '%'.$request->search.'%' ] ])
                                        ->orWhere([ [ 'cidade', 'LIKE', '%'.$request->search.'%' ] ])
                                        ->orWhere([ [ 'uf', 'LIKE', '%'.$request->search.'%' ] ])
                                        ->get();
        }

        return response()->json($response);
    }

    /**
     * Gera o contrato de aluguel do imóvel
     */
    public function contrato_pdf()
    {
        $dados = $this->alugueis->select('alugueis.nome', 'alugueis.email', 'alugueis.documento', 'alugueis.cpf_cnpj',
                                        'imoveis.logradouro', 'imoveis.numero', 'imoveis.bairro', 'imoveis.cidade', 'imoveis.uf',
                                        'proprietarios.nome AS nome_prop', 'proprietarios.cpf AS cpf_prop')
                                ->join('imoveis', 'imoveis.id', '=', 'alugueis.fk_imovel')
                                ->join('proprietarios', 'proprietarios.id', '=', 'imoveis.fk_proprietario')
                                ->where([ [ 'fk_imovel', '=', 1 ] ])
                                ->first();

        $mpdf = new \Mpdf\Mpdf();

        $pdf = "";

        $pdf .= "<div style='text-align: center;'>";
            $pdf .= "<h4>CONTRATO DE LOCAÇÃO DE IMÓVEL</h4>";
        $pdf .= "</div>";

        $pdf .= "<div style='text-align: justify;'>";
            $pdf .= "<p><b>Locador:</b> ".$dados->nome_prop.", portador do CPF nº ".$dados->cpf_prop."</p>";
            $pdf .= "<p><b>Locatário:</b> ".$dados->nome.", portador do ".$dados->documento." nº ".$dados->cpf_cnpj." e do endereço de e-mail ".$dados->email."</p>";
            $pdf .= "<p><b>Cláusula Primeira:</b> O objeto deste contrato de locação é o imóvel residencial, situado à ".$dados->logradouro.", ".$dados->numero.", ".$dados->bairro.", ".$dados->cidade." - ".$dados->uf.".</p>";
            $pdf .= "<p><b>Cláusula Segunda:</b> O prazo da locação é de xx meses, iniciando-se em xx/xx/xx com término em xx/xx/xx, independentemente e aviso, notificação ou interpelação judicial ou mesmo extrajudicial.</p>";
            $pdf .= "<p><b>Cláusula Terceira:</b> O aluguel mensal, deverá ser pago até o dia 10 (dez) do mês subseqüente ao vencido, no local indicado pelo LOCADOR, é de R$ xxxxx (Valor) mensais, reajustados anualmente, de conformidade com a variação do IGP-M apurada no ano anterior, e na sua falta, por outro índice criado pelo Governo Federal e, ainda, em sua substituição, pela Fundação Getúlio Vargas, reajustamento este sempre incidente e calculado sobre o último aluguel pago no último mês do ano anterior.</p>";
            $pdf .= "<p><b>Cláusula Quarta:</b> O LOCATÁRIO será responsável por todos os tributos incidentes sobre o imóvel bem como despesas ordinárias de condomínio, e quaisquer outras despesas que recaírem sobre o imóvel, arcando tambem com as despesas provenientes de sua utilização seja elas, ligação e consumo de luz, força, água e gás que serão pagas diretamente às empresas concessionárias dos referidos serviços.</p>";
        $pdf .= "</div>";

        $pdf .= "<div style='text-align: center;'>";
            $pdf .= "<p><b>Local e Data</b></p>";
            $pdf .= "<p>_______________, __________ de ___________________________________________ de _____________</p>";
        $pdf .= "</div>";

        $pdf .= "<div style='text-align: center;'>";
            $pdf .= "<p><b>Locador</b></p>";
            $pdf .= "<p>_____________________________________________________________________________________</p>";
        $pdf .= "</div>";

        $pdf .= "<div style='text-align: center;'>";
            $pdf .= "<p><b>Locatário</b></p>";
            $pdf .= "<p>______________________________________________________________________________________</p>";
        $pdf .= "</div>";

        $pdf .= "<div style='text-align: center;'>";
            $pdf .= "<p><b>Testemunha</b></p>";
            $pdf .= "<p>______________________________________________________________________________________</p>";
        $pdf .= "</div>";

        $mpdf->WriteHTML($pdf);
        $mpdf->Output();
    }
}
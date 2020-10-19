$(document).ready(function(){
    // Cria a tabela de imoveis
    $("#table_imoveis").DataTable({
        responsive: true,
        autoFill: false
    });
});

/**
 * Responsável por submeter os filtros de pesquisa e alimentar a tabela com os resultados
 */
function pesquisar()
{
    let dados = {
        _token: _token,
        status: $("#status").val()
    };

    let response = requisicao('/relatorio/get_imoveis', dados);

    $("#table_imoveis").DataTable().destroy();

    let table = $("#table_imoveis").DataTable({responsive: true, autoFill: false});
    table.clear().draw();

    response.map(function(dados){
        let status = '<span class="badge badge-danger">NÃO CONTRATADA</span>';
        
        if(dados.status == 1)
            status = '<span class="badge badge-success">CONTRATADA</span>';

        table.row.add([
            status,
            dados.nome,
            dados.logradouro+', '+dados.numero+', '+dados.bairro+', '+dados.cidade+' - '+dados.uf,
            "<button id='btn_detalhes' class='btn btn-sm btn-info' onclick='detalhes("+dados.id+")'>Detalhes</button>",
            "<button id='btn_remover' class='btn btn-sm btn-danger' onclick='remover_imovel("+dados.id+")'>Remover</button>"
        ]).draw();
    });
}

/**
 * Responsável por exibir detalhes do imóvel contratado.
 * 
 * @param {integer} id
 */
function detalhes(id)
{
    let dados = {
        _token: _token,
        id: id
    };

    let data = requisicao('/relatorio/imoveis/get_detalhes_imovel', dados);

    let header = body = "";

    let imovel = data.logradouro+', '+data.numero+', '+data.bairro+', '+data.cidade+' - '+data.uf;

    let nome_contratante = "";
    let email_contratante = "";
    let cpf_cnpj_contratante = "";

    if(data.status == 1)
    {
        nome_contratante = data.nome_contratante;
        email_contratante = data.email_contratante;
        cpf_cnpj_contratante = data.cpf_cnpj_contratante
    }

    header += "Detalhes do Imóvel";

    body += "<div class='row'>";
        body += "<div class='form-group col-md-6'>";
            body += "<label>Imóvel</label>";
            body += "<input type='text' readonly value='"+imovel+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Salas</label>";
            body += "<input type='text' readonly value='"+data.salas+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Banheiros</label>";
            body += "<input type='text' readonly value='"+data.banheiros+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Andares</label>";
            body += "<input type='text' readonly value='"+data.andares+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Garagem</label>";
            body += "<input type='text' readonly value='"+data.garagem+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Quartos</label>";
            body += "<input type='text' readonly value='"+data.quartos+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-1'>";
            body += "<label>Cozinhas</label>";
            body += "<input type='text' readonly value='"+data.cozinhas+"' class='form-control form-control-sm'>";
        body += "</div>";
    body += "</div>";

    body += "<div class='row'>";
        body += "<div class='form-group col-md-6'>";
            body += "<label>Proprietário</label>";
            body += "<input type='text' readonly value='"+data.nome_prop+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-3'>";
            body += "<label>E-mail</label>";
            body += "<input type='text' readonly value='"+data.email_prop+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-3'>";
            body += "<label>CPF</label>";
            body += "<input type='text' readonly value='"+data.cpf_prop+"' class='form-control form-control-sm'>";
        body += "</div>";
    body += "</div>";

    body += "<div class='row'>";
        body += "<div class='form-group col-md-6'>";
            body += "<label>Contratante</label>";
            body += "<input type='text' readonly value='"+nome_contratante+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-3'>";
            body += "<label>E-mail</label>";
            body += "<input type='text' readonly value='"+email_contratante+"' class='form-control form-control-sm'>";
        body += "</div>";
        body += "<div class='form-group col-md-3'>";
            body += "<label>E-mail</label>";
            body += "<input type='text' readonly value='"+cpf_cnpj_contratante+"' class='form-control form-control-sm'>";
        body += "</div>";
    body += "</div>";

    $(".modal-dialog").addClass('modal-xl');
    abrir_modal(header, body);
}

/**
 * Responsável por excluir um registro da tabela
 * 
 * @param {integer} id 
 */
function remover_imovel(id)
{
    swal({
        title: "Deseja deletar este imóvel?",
        text: "Ao clicar em confirmar, não será possível desfazer a exclusão!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete) {
            let dados = {
                _token: _token,
                id: id
            };

            let response = requisicao('/relatorio/deletar_imovel', dados);

            if(response)
            {
                swal('Sucesso!', 'Imóvel excluído com sucesso.', 'success');
                pesquisar();
            }
            else
            {
                swal('Erro!', 'Não foi possível excluir este imóvel.', 'error');
            }
        } else {
            swal("Operação cancelada pelo usuário!");
        }
      });
}
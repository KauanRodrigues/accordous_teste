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
            "<button id='btn_remover' class='btn btn-sm btn-danger' onclick='remover_imovel("+dados.id+")'>Remover</button>"
        ]).draw();
    });
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
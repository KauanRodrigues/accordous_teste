$(document).ready(function(){
    carregar_table(); // Chamada da função que alimenta a tabela assim que a tela é carregada
});

function carregar_table()
{
    let table = $("#table_proprietario").DataTable({responsive: true, autoFill: false});
    table.clear().draw(); // Limpa a tabela
    
    let dados = {
        _token: _token
    };

    let response = requisicao('/relatorio/get_all_proprietarios', dados);

    // Popula a tabela
    response.map(function(dados){
        table.row.add([
            dados.nome,
            dados.email,
            dados.cpf
        ]).draw();
    });
}

$(document).ready(function(){
    $("#cep").mask('00.000-000', {placeholder: '00.000-000'}); // Mascara para o campo de CEP
    $("#quartos, #salas, #garagem, #andares, #banheiros, #cozinhas").mask('00'); // Mascara para os campos QUARTOS, SALAS, GARAMGE, ANDARES, BANHEIROS e COZINHAS

    /**
     * Alimenta o select2 de proprietarios
     */
    $("#proprietario").select2({
        placeholder: 'Selecione',
        ajax: {
            url: base_url+'/get_proprietario',
            datatype: 'json',
            type: 'post',
            data: function(params){
                var query = {
                    _token: _token,
                    search: params.term
                }
                return query;
            },
            processResults: function(data){
                return {
                    results: data.map(function(item){
                        return {
                            id: item.id,
                            text: item.nome
                        }
                    })
                }
            }
        }
    });
});

/**
 * Responsável por submeter os dados de cadastro.
 */
function salvar()
{
    let proprietario = $("#proprietario").val();
    let quartos = $("#quartos").val();
    let salas = $("#salas").val();
    let andares = $("#andares").val();
    let banheiros = $("#banheiros").val();
    let cozinhas = $("#cozinhas").val();
    let garagem = $("#garagem").val();
    let cep         = $("#cep").val();
    let logradouro  = $("#logradouro").val();
    let numero      = $("#numero").val();
    let bairro      = $("#bairro").val();
    let cidade      = $("#cidade").val();
    let uf          = $("#uf").val();
    let complemento = $("#complemento").val();

    if(empty(proprietario) || empty(cep) || empty(logradouro) || empty(numero) || empty(bairro) || 
        empty(cidade) || empty(uf))
    {
        swal('Aviso!', 'Todos os campos obrigatórios devem ser preenchidos.', 'info');
        return false;
    }

    let dados = {
      _token: _token,
      proprietario: proprietario,
      quartos: quartos,
      salas: salas,
      andares: andares,
      banheiros: banheiros,
      cozinhas: cozinhas,
      garagem: garagem,
      cep: cep,
      logradouro: logradouro,
      numero: numero,
      bairro: bairro,
      cidade: cidade,
      uf: uf,
      complemento: complemento  
    };

    let response = requisicao('/cadastro/imoveis', dados);

    if(!response)
    {
        swal('Erro!', 'Não foi possível cadastrar este imóvel.', 'error');
        return false;
    }
    
    swal_response('Sucesso!', 'Imóvel cadastrado com sucesso.', 'success');
}
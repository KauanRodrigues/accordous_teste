$(document).ready(function(){
    $("#cpf_cnpj").mask('000.000.000-00', {placeholder: '000.000.000-00'}); // Mascara do campo de CPF/CNPJ

    /**
     * Alimenta o select2 de Imoveis
     */
    $("#imovel").select2({
        placeholder: 'Selecione',
        ajax: {
            url: base_url+'/operacoes/get_all_imoveis',
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
                            text: item.logradouro+', '+item.bairro+', '+item.cidade+' - '+item.uf
                        }
                    })
                }
            }
        }
    });
})

/**
 * Responsável por alterar a mascara do campo de documento de CPF ou CNPJ
 * 
 * @param {*} value 
 */
function change_cpf_cnpj(value)
{
    if(value == 'cnpj')
    {
        $("#lbl_cpf_cnpj").html('CNPJ');
        $("#cpf_cnpj").mask('00.000.000/0000-00', {placeholder: '00.000.000/0000-00'});
    }
    else
    {
        $("#lbl_cpf_cnpj").html('CPF');
        $("#cpf_cnpj").mask('000.000.000-00', {placeholder: '000.000.000-00'});
    }
}

/**
 * Responsável por submeter os dados de cadastro.
 */
function salvar()
{
    let imovel = $("#imovel").val();
    let nome = $("#nome").val();
    let email = $("#email").val();
    let documento = $("#documento").val();
    let cpf_cnpj = $("#cpf_cnpj").val();

    if(empty(imovel) || empty(nome) || empty(email) || empty(documento) || empty(cpf_cnpj))
    {
        swal('Aviso!', 'Todos os campos obrigatórios devem ser informados.', 'info');
        return false;
    }

    let dados = {
        _token: _token,
        imovel: imovel,
        nome: nome,
        email: email,
        documento: documento,
        cpf_cnpj: cpf_cnpj
    };

    let response = requisicao('/operacoes/aluguel', dados);

    if(!response)
    {
        swal('Erro!', 'Não foi possível concluir a operação de aluguel deste imóvel.', 'error');
        return false;
    }

    swal_response('Sucesso!', 'Imóvel alugado com sucesso.', 'success');
}
$(document).ready(function(){
    $("#nome").focus();

    $("#cpf").mask('000.000.000-00', {placeholder: '000.000.000-00'}); // Mascara do campo de CPF
    $("#cep").mask('00.000-000', {placeholder: '00.000-000'}); // Mascara do campo de CEP
});

/**
 * Responsável por submeter os dados de cadastro.
 */
function salvar()
{
    let nome        = $("#nome").val();
    let email       = $("#email").val();
    let cpf         = $("#cpf").val();
    let cep         = $("#cep").val();
    let logradouro  = $("#logradouro").val();
    let numero      = $("#numero").val();
    let bairro      = $("#bairro").val();
    let cidade      = $("#cidade").val();
    let uf          = $("#uf").val();
    let complemento = $("#complemento").val();

    if(empty(nome) || empty(email) || empty(cpf) || empty(cep) || empty(logradouro) || empty(numero) || empty(bairro) || 
        empty(cidade) || empty(uf))
    {
        swal('Aviso!', 'Todos os campos obrigatórios devem ser preenchidos.', 'info');
        return false;
    }

    let dados = {
        _token      : _token,
        nome        : nome, 
        email       : email,
        cpf         : cpf,
        cep         : cep,
        logradouro  : logradouro,
        numero      : numero,
        bairro      : bairro,
        cidade      : cidade,
        uf          : uf,
        complemento: complemento
    };

    let response = requisicao('/cadastro/proprietarios', dados);

    if(response == 'invalid_mail')
    {
        swal('Aviso!', 'E-mail informado não é válido.', 'info');
        return false;
    }
    else if(!response)
    {
        swal('Erro!', 'Não foi possível cadastrar este proprietário.', 'error');
        return false;
    }

    swal_response('Sucesso!', 'Proprietário cadastrado com sucesso.', 'success');
}
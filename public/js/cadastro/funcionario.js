$(document).ready(function(){
    $("#nome").focus();
});

/**
 * Responsável por submeter os dados de cadastro.
 */
function salvar()
{
    let nome = $("#nome").val();
    let email = $("#email").val();
    let usuario = $("#usuario").val();
    let senha = $("#senha").val();

    if(empty(nome) || empty(email) || empty(usuario) || empty(senha))
    {
        swal('Aviso!', 'Todos os campos obrigatórios devem ser preenchidos.', 'info');
        return false;
    }

    let dados = {
        _token: _token,
        nome: nome,
        email: email,
        usuario: usuario,
        senha: senha
    };

    let response = requisicao('/cadastro/funcionarios', dados);

    if(response == 'invalid_mail')
    {
        swal('Aviso!', 'E-mail informado não é válido.', 'info');
        return false;
    }
    else if(!response)
    {
        swal('Erro!', 'Não foi possível cadastrar este funcionário.', 'error');
        return false;
    }

    swal_response('Sucesso!', 'Funcionário cadastrado com sucesso.', 'success');
}
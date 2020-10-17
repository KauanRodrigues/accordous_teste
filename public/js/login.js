$(document).ready(function(){
    $("#usuario").focus();
});

/**
 * Responsável por enviar os dados de login
 */
function logar()
{
    let usuario = $("#usuario").val();
    let senha = $("#senha").val();

    if(empty(usuario) || empty(senha))
    {
        swal('Aviso!', 'Usuário e senha devem ser informados.', 'info');
        return false;
    }

    let dados = {
        _token: _token,
        usuario: usuario,
        senha: senha
    };

    let response = requisicao('/logar', dados);

    if(response)
    {
        window.location.href = base_url+'/home';
    }
    else
    {
        swal('Erro!', 'Não conseguimos localizar o usuário informado.', 'error');        
    }
}
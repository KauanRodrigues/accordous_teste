<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Carrega o CSS do bootstrap 4 --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- Carrega o arquivo geral de CSS da estilização do sistema --}}
    <link rel="stylesheet" href="{{ asset('css/geral_login.css') }}">
    {{-- Titulo da aba do navegador --}}
    <title>Accordous</title>
</head>

{{-- Campo hidden com a URL padrão do sistema --}}
<input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">

<body class="no_scroll bg_login">
    <div class="sobreposicao_cor">
        <div class="container">
            @csrf
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    {{-- Inicio card --}}
                    <div class="card card_login">
                        {{-- Inicio card body --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" placeholder="NOME DE USUÁRIO">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="password" name="senha" id="senha" class="form-control form-control-sm" placeholder="SENHA">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-sm btn-block btn-primary button_request" id="btn_submit" onclick="logar()">ENTRAR</button>
                                </div>
                            </div>
                        </div>
                        {{-- Fim card body --}}
                    </div>
                    {{-- Fim card --}}
                </div>
            </div>
        </div>
    </div>
</body>
    {{-- Carrega o jquery v3.5.1 --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    {{-- Carrega o bootstrap 4 --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    {{-- Carrega o popper do bootstrap 4 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    {{-- Carrega o sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Carrega o arquivo js com as funções utilizadas no sistema --}}
    <script src="{{ asset('plugins/funcoes.js') }}" type="text/javascript"></script>
    {{-- Carrega o arquivo js da tela de login --}}
    <script src="{{ asset('js/login.js') }}" type="text/javascript"></script>
    <script>
        var base_url = $("#base_url").val();
        var _token = $("input[name='_token']").val();
    </script>
</html>

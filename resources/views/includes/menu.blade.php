<nav class="navbar navbar-expand-lg navbar-light bg-light">
  {{-- Logo --}}
    <a class="navbar-brand" href="{{ route('home') }}">Accordous</a>
    {{-- Botao do menu responsive (Mobile) --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barranavegacao" aria-controls="barranavegacao" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="barranavegacao">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navcadastro" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navcadastro">
            <a class="dropdown-item" href="{{ route('cadastro.funcionarios') }}">Funcionários</a>
            <a class="dropdown-item" href="{{ route('cadastro.proprietarios') }}">Proprietários</a>
            <a class="dropdown-item" href="{{ route('cadastro.imoveis') }}">Imoveis</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navoperacoes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Operações
            </a>
            <div class="dropdown-menu" aria-labelledby="navoperacoes">
              <a class="dropdown-item" href="{{ route('operacoes.aluguel') }}">Aluguel</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navrelatorios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Relatórios
            </a>
            <div class="dropdown-menu" aria-labelledby="navrelatorios">
              <a class="dropdown-item" href="{{ route('relatorio.funcionarios') }}">Funcionários</a>
              <a class="dropdown-item" href="{{ route('relatorio.imoveis') }}">Imoveis</a>
              <a class="dropdown-item" href="{{ route('relatorio.proprietarios') }}">Proprietários</a>
            </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navfunc" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ session()->get('FUNCIONARIO.NOME') }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navfunc">
                <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
            </div>
        </li>
      </ul>
    </div>
  </nav>
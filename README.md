# Teste Accordous!

O sistema **Teste Accordous** tem o intuito de automatizar a contratação de imóveis. Facilitando assim o processo de busca por um imóvel e a geração do contrato de locação.


# Instalação

O sistema funciona totalmente **online**, mas caso seu intuito seja utiliza-lo em um ambiente de trabalho local, aqui segue o passo a passo de como realizar a instalação e configuração do mesmo.
**obs:** Para melhor entendimento e diminuição de riscos, peça para um técnico em informática te auxiliar no processo se possível.

## Windows

 1. Faça o download do arquivo **.zip**.
 2. Caso não possua o MySQL e nem o PHP instalado em sua máquina realize o download e instalação do [xampp](https://www.apachefriends.org/pt_br/index.html).
 3. Ao concluir a instalação do xampp, inicie o serviço do MySQL e PHP.
 4. Crie um Banco de Dados com o nome accordous.
 5. Descompacte o arquivo **.zip** do sistema que você realizou o download anteriormente.
 6. Abra o **Prompt Comando (CMD)** do windows.
 7. Navegue para dentro da pasta do sistema que você descompactou.
 8. Execute o seguinte comando.`php artisan migrate`, este comando irá criar as tabelas necessárias para o funcionamento correto do sistema.
 9. Após concluir a criação das tabelas inicie o sistema executando o seguinte comando `php artisan serve --host=0.0.0.0`, o comando **--host** permite que o sistema fique acessível para uso em rede utilizando o ip da sua máquina.
 10. Ao concluir todos os passos com sucesso basta abrir seu navegador utilizando [http://localhost:8000](http://localhost:8000) ou em outro dispositivo da sua rede trocando **localhost** pelo ip da sua maquina que está executando o sistema.

#Funcionalidades
Agora iremos ensinar como funciona cada funcionalidade do sistema.

## Login

| Campos | Tipo  | Obrigatório |
|--|--|--|
| Usuário | String | Sim |
| Senha | String | Sim |

Ao informar o usuário e a senha deve-se clicar no botão **ENTRAR** para que o login seja realizado.

## Cadastro

### Funcionários

| Campo | Tipo | Obrigatório |
|--|--|--|
| Nome | String | Sim |
| E-mail | String | Sim |
| Usuário | String | Sim |
| Senha | String | Sim

### Proprietários

| Campo | Tipo | Obrigatório |
|--|--|--|
| Nome | String | Sim |
| E-mail | String | Sim |
| CPF | Number | Sim |
| CEP | Number | Sim |
| Logradouro | String | Sim | 
| Numero | Number | Sim | 
| Bairro | String | Sim |
| Cidade | String | Sim |
| UF | Select | Sim |
| Complemento | String | Não |

### Imóveis

| Campo | Tipo | Obrigatório |
|--|--|--|
| Proprietário | Select | Sim |
| Quartos | Number | Não |
| Andares | Number | Não |
| Banheiros | Number | Não |
| Cozinhas | Number | Não |
| Salas | Number | Não |
| Garagem | Number | Não |
| CEP | Number | Sim |
| Logradouro | String | Sim | 
| Numero | Number | Sim | 
| Bairro | String | Sim |
| Cidade | String | Sim |
| UF | Select | Sim |
| Complemento | String | Não |

## Operações

### Aluguel

| Campo | Tipo | Obrigatório |
|--|--|--|
| Imóvel | Select | Sim |
| Nome | String | Sim |
| E-mail | String | Sim |
| Documento | Select | Sim |
| CPF / CNPJ | Number | Sim |

## Relatórios

### Funcionários

Não precisa de nenhum tipo de filtro, pois a tela já carrega os funcionários cadastrados ao abrir a tela.

### Imóveis

| Campo | Tipo | Obrigatório |
|--|--|--|
| Status | Select | Sim |

Ao selecionar o status deve-se clicar no botão **Pesquisar** para que possa ser alimentada a tabela com os registros.

### Proprietários

Não precisa de nenhum tipo de filtro, pois a tela já carrega os proprietários cadastrados ao abrir a tela.

## Nome do Funcionário

### Sair

Destroi todas as sessões de login e redireciona o usuário para a tela de login.

# Tecnologias Utilizadas

 - **Framework:** Laravel;
 - **Linguagem:** PHP 7, Javascript, HTML5, CSS3;
 - **Framework Front-end:** Bootstrap 4;
 - **Banco de Dados:** MySQL;
 - **Editor:** Visual Studio Code;
 - **Plugins:** DataTable, Select2, Jquery Mask;

# Desenvolvedores

| Nome | Função | Experiência (anos) |
|--|--|--|
| Kauan F. Rodrigues | Desenvolvedor WEB Full Stack | 4 anos |

## Sobre o desenvolvedor

 - **Kauan F. Rodrigues:** com 22 anos de idade, sendo 4 anos de experiência em desenvolvimento web. Com experiência em sistemas de gestão de lojas e varejo em geral, teve também como maior desafio e aprendizado quando trabalhou com sistemas de compra e venda de criptoativos como **Bitcoin**. Um profissional autodidata, apaixonado por desafios e pelo que faz, busca por conhecimento de coisas novas, é dedicado e procura dar o seu melhor naquilo que faz.

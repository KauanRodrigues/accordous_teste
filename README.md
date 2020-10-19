# Teste Accordous!

O sistema **Teste Accordous** tem o intuito de automatizar a contratação de imóveis. Facilitando assim o processo de busca por um imóvel e a geração do contrato de locação.


# Instalação

O sistema funciona totalmente **online**, mas caso seu intuito seja utiliza-lo em um ambiente de trabalho local, aqui segue o passo a passo de como realizar a instalação e configuração do mesmo.
**obs:** Para melhor entendimento e diminuição de riscos, peça para um técnico em informática te auxiliar no processo se possível.

## Windows

 1. Faça o download do arquivo **.zip** ou execute um `git clone`.
 2. Realize o download e instalação do [Docker](https://www.docker.com/get-started).
 3. Realize o download e configuração do [Composer](https://getcomposer.org/).
 4. Agora vamos acessar a pasta do projeto que você descompactou ou clonou via git.
 5. Segure a tecla **SHIFT** do seu teclado e clique em algum lugar da tela com o **botão direito** do mouse, agora clique na opção **abrir janela do PowerShell aqui**.
 6. Vamos carregar os arquivos que faltam para o Laravel fazer nosso sistema funcionar corretamente, para isso vamos executar o seguinte comando `composer update`, isso fará com que o composer baixe as dependências necessárias do Laravel (este procedimento poderá demorar alguns minutos devido a alta quantidade de arquivos que serão baixados).
 7. Agora execute o seguinte comando `docker-compose up -d`, este comando é responsável pela criação dos containers onde ficaram armazenados o **MySQL** e a nossa **Aplicação Laravel**.
 8. Execute o comando `docker ps` para poder saber se está tudo ok com nossos containers.
 9. Vamos agora executar o seguinte comando `php artisan migrate --seed` para podermos criar as nossas tabelas em nosso banco de dados.
 10. Agora você vai até a pasta que você descompactou e vai procurar pelo arquivo chamado **.env**, pode abri-lo com o editor de texto de sua preferência e vamos alterar a linha **DB_HOST=127.0.0.1** para **DB_HOST=172.20.0.1**, isso vai fazer com que nossa aplicação na hora de acessar o Banco de Dados, seja redirecionada para o container do **MySQL**.
 11. Pronto, agora vamos testar nossa aplicação acessando [http://localhost:8000](http://localhost:8000). O login padrão é **Usuário: admin** e **Senha: admin**.

# Funcionalidades
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

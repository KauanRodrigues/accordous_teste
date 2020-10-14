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

# SICAP (Backend)

O SICAP é um sistema de achados e perdidos desenvolvido para a disciplina de Engenhria de Software do curso de Licent da Universidade Eduardo Mondlane. O sistema foi desenvolvido em PHP utilizando o framework Laravel.

## 🧑‍💻 Instalação e configuração

> Antes de correr o projeto, é necessário ter instalado o [Composer](https://getcomposer.org/) e o [Node.js](https://nodejs.org/en/). 

> Também é necessário ter instalado o [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou o [WAMP](http://www.wampserver.com/en/) para correr o servidor local.

O primeiro passo é clonar o repositório do projeto para a sua máquina local.

Após clonar o repositório, entre na pasta do projeto e execute o seguinte comando para instalar as dependências do projeto:

```bash
composer install
```

Copie o arquivo `.env.example` e renomeie para `.env` e configure as variáveis de ambiente para a sua base de dados. Altere o valor da variável `DB_DATABASE` para o nome da base de dados que deseja criar.

Depois crie a base de dados com o mesmo nome que especificou na variável `DB_DATABASE` do ficheiro `.env`.

Após criar a base de dados, execute o seguinte comando para criar as tabelas na base de dados:

```bash
php artisan migrate
```

Gere a chave da aplicação com o seguinte comando:

```bash
php artisan key:generate
```

Após popular o banco de dados com dados de teste, execute o seguinte comando para correr o servidor local:

```bash
php artisan serve
```

## Documentação da API

A documentação da API pode ser encontrada [aqui](https://documenter.getpostman.com/view/23156057/2s8YYCv6Ng). :arrow_backward::fire:

A documentação da API foi feita utilizando o [Postman](https://www.postman.com/). Para importar a documentação para o Postman, clique no botão `Run in Postman` na página da documentação.

Isto irá abrir o Postman e importar a documentação para o Postman. Para correr a documentação, basta clicar no botão `Run` no canto superior direito.

Esta API será utilizada pelo [frontend]() do SICAP.

:exclamation: A API ainda está na fase de desenvolvimento e não está completa.

As rotas estão em inglês, mas a documentação está em português.
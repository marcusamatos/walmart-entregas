Walmart Entregas
================

Introdução
----------
Este webservice permite o cadastro de mapas (utilizando o formato malha logística) e consulta de rotas com o melhor custo.
*obs: Este webservice foi desenvolvidor para teste e não deve ser utilizado em produção.

Como Instalar
-------------

A execução padrão esta com o banco de dados SQLITE, mas pode ser migrado facilmente para qualquer banco de dados suportado pela linguagem PHP.

* Executar a linha de comando: `php composer.phar install` para instalar as dependências via composer.
* Executar a linha de comando `touch database.sqlite` para criar o bando de dados
* Executar a linha de comando `vendor/bin/doctrine-module orm:schema-tool:update --force` para que o doctrine implemente as tabelas do banco de dados
* Executar um servidor web, com suporte php, de sua preferência:


Padrão Utilizado
----------------

O webservice Walmart Entrega utilizam o padrão REST e o formato JSON codificado em UTF-8 para expor os recursos disponíveis.

Como testar requisições POST, PUT, etc..
----------------------------------------

Para os webservices que são acessíveis via POST, como o webservice de cadastro de novos mapas e consulta de rotas por exemplo, aconselhamos a utilização de alguma das ferramentas abaixo para simular o post:

    Fiddler (http://www.fiddler2.com)
    Poster (https://addons.mozilla.org/pt-BR/firefox/addon/2691) - plugin para Firefox

Como cadastrar novo mapa
----------------------------------------

POST: http://DOMINIO/api/mapa

Parametros:

```
{
    "nome": "Mapa de Exemplo",
    "mapa": "A B 10\nB D 15\nA C 20\nC D 30\nB E 50\nD E 30"
}
```

Retorno:

```
{
    "status": "success",
    "message": ""
}
```

Consultar a rota com o melhor custo
-----------------------------------

POST: http://DOMINIO/api/rota

Parametros:

```
{
    "origem": "A",
    "destino": "B",
    "autonomia": 10,
    "valor_litro": 2.5
}
```

Retorno:

```
{
    "rota": "A B D",
    "custo": 6.25,
    "status": "success",
    "message": ""
}
```
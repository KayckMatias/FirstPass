# FirstPass

[![MIT license](https://poser.pugx.org/jansenfelipe/nfephp-serialize/license.svg)](http://opensource.org/licenses/MIT)

FirstPass é uma aplicação web escrita sob o [Laravel Framework PHP](http://laravel.com).

# Instalação

Para clonar o repositório
```shell
$ git clone https://github.com/KayckMatias/FirstPass/
```
Execute o composer install para instalar depedências
```shell
$ composer install
```
Execute o npm install para instalar depedências
```shell
$ npm install
```

Acesse o diretório da aplicação, copie o `.env.example` para `.env` e edite de acordo com sua configuração.

Gere uma chave utilizando o comando:
```shell
$ php artisan key:generate
```

Execute o npm run build para fazer a construção dos arquivos
```shell
$ npm run build
```
Faça a migração das tabelas na database utilizando:
```shell
$ php artisan migrate
```

Pronto! Projeto instalado :D

Você pode utilizar o [PHP Built-in web server](http://php.net/manual/en/features.commandline.webserver.php) para executar a aplicação localmente:

```shell
$ php artisan serve
```

Por padrão, a aplicação irá executar na porta 8000

[http://localhost:8000](http://localhost:8000)

# License
Copyright 2022 Kayck Matias

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

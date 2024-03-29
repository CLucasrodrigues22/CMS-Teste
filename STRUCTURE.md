## Requisitos para rodar o projeto

### Setup de ambiente:

- [PHP 8.3](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Node LTS](https://nodejs.org/en)


### Como rodar na minha máquina?

- Clone o projeto `git clone https://github.com/CLucasrodrigues22/Laravel-Task`

- Abra um terminal na raiz do repositório clonado e crie um .env, a arquivo irá conter as chaves e valores para definir o ambiente de um projeto como credenciais de acesso da aplicação ao banco de dados.

```
cp .env.example .env
```

- Abra o diretório do projeto em um editor de texto ou IDE de preferência, no arquivo .env, configure as seguintes variáveis de acordo com seu ambiente:

```
DB_DATABASE=(nome do banco)
DB_USERNAME=(usuário do banco)
DB_PASSWORD=(senha do banco)
```

- Instale as depedências da API usando o composer:

```
composer install
```

- Execute as migratons para que seja configuradas as tabelas necessárias:

```
php artisan migrate
```

- Gere uma chave para a API no .env:

```
php artisan key:generate
```

- Caso use algumas distro Linux, execute o comando chmod para dar permissão na criação do arquivo de Log do sistema:

```
sudo chmod -R 775 storage/logs
```

- Instale as depedências do VueJS usando o NPM:

`Para produção`

```
npm install && npm run build 
```

- Inicie o servidor:

```
php artisan serve
```

- Caso esteja usando em ambiente de desenvolvimento, instale as depedências do VueJS e execute o npm run dev:

`Para desenvolvimento`

```
npm install && npm run dev 
```


### Estrutura do projeto

- `./app`: Contém o código-fonte da api, incluindo modelos, controladores e outros.
- `./public`: É o ponto de entrada para a aplicação web. Os arquivos neste diretório são acessíveis publicamente.
- `./resources`: Armazena ativos como arquivos de visualização (views), arquivos de tradução e recursos não processados como Sass ou JavaScript.
- `./routes`: Define as rotas da api ou rodas web, especificando qual controlador e método serão chamados para um determinado end-point.

### Como me localizar no projeto?

- Todos os metodos responsáveis por tratar as requisições HTTP e coordenar as ações necessárias para processar essas requisições de cada endpoint estão em `./app/Http/Controllers`.
- Os arquivos responsáveis por manipulação de dados no banco, etc, estão em `./app/Models`.
- As validações de formulários para campos obrigatórios, tipo de dados, identificadores unicos estão em `./app/Http/Requests`.
- Todas as migrations responsáveis pelas tabelas do banco estão em `./database/migrations`
- Arquivo com os todos os endpoint da API esta localizado em `./routes/api`
- Arquivo com as rotas de cada view esta localizado em `./routes/web`
- Todos os elementos como formulários, lista, tabelas, entre outros elementos de interface que serão redenrizados nas viewes estão em `./resources/js/components`.
- Todos os Log de Exception ocorridos nos metodos dos controllers, é gerado e salvo em `./storage/logs/error-yyyy-mm-dd.log`.
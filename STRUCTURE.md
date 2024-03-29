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


## techguide.sh Site

### Estrutura do projeto

- `./pages`: É a página que o Next.js usa para montar o sistema de roteamento
- `./src/components`: São todos os pedaços primordiais de interface como componentes de formulário, `<Text>` (para qualquer texto) e o `<Box>`
  - `<Text>`: Uma das ideias por tras do text é tematizar melhor o projeto no futuro e ele servir como um adapter para qualquer padronização de design que possamos vir a ter.
  - `<Box>`: É nossa abstração para criar estilos, sempre use um box e **nunca crie um styled component diretamente no projeto**.
    - Ele recebe uma prop chamada `styleSheet` e a mesma pode receber ou uma chave com nome de propriedade do CSS com seu valor, ou ao invés de o valor você pode passar um objeto com a resolução que a propriedade deve ser aplicada.
      - **Exemplo**:
        - `<Box styleSheet={{ color: 'red' }} />` ou `<Box styleSheet={{ color: { xs: 'red', md: 'blue' } }} />`;
- `./src/patterns`: Patterns são todos os pedaços de interface que são menos genéricos que os componentes mas são reusados em mais de 3 lugares do projeto e fazem parte da estrutura geral dele
- `./src/screens`: Toda screen representa uma tela do projeto, uma tela caso tenha componentes específicos inicialmente deve ter os mesmos guardados na sua própria pasta, repetindo a estrutura anterior do projeto e evitando o reuso antes do uso de fato.

### Como me localizar no projeto?

- Todas as páginas do projeto estão listadas em `./pages`
  - Todos os `componentes` que representam as páginas estão em `./src/screens`
    - Uma vez dentro de uma página você pode ir navegando pelos componentes para ir se encontrando e fazer a alteração que deseja

### Como funciona a parte de i18n (internacionalização)?

- Todo conteúdo multi-língua é alterado por meio da pasta `_data/locale/COUNTRY.json`
  - Para acessar um conteúdo dentro do código siga o exemplo abaixo:

```js
import { Box, Text, Image, Link } from "@src/components";
import { useI18n } from "@src/infra/i18n";
import React from "react";

export default function SecondContentSection() {
  const i18n = useI18n();
  return (
    <Text>
      {i18n.content("CHAVE.DO.CONTEUDO.NO.JSON")}
    <Text>
  )
}
```

> Caso deseje passar um link, você DEVE usar a tag do html `<a href="link"></a>`

### Como gerar o favicon do site?

- Atualmente estamos usando esse projeto https://www.favicon-generator.org/

## techguide.sh GraphQL API

> A API GraphQL não deve ser usada no ambiente de produção até segunda ordem.

### Como usar?

- Em dev, após rodar o projeto você pode alterar os arquivos da pasta `_api/*`

### Estrutura do projeto

- `./_api/modules/*`: Cada pasta aqui representa uma entidade do sistema, atualmente temos `guides` e `cards`
  - Após criar uma nova entidade a mesma deve ser importada no arquivo `./_api/api.ts`, tal como os anteriores.
  - Importa no mesmo PR rodar o comando `yarn generate:types` (em uma segunda aba de terminal com o projeto rodando) para deixar a tipagem typescript sincronizada tanto para o backend quanto para o frontend.

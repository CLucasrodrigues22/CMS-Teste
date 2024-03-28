# ApiCmsTask

Api-cms-task é uma aplicação genérica que permite aos usuários manipular totalmente tarefas em geral com título, descrição e status da mesma.

## Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### Pré-requisitos

Tecnologias necessárias (recomendado):

* Composer ^2.7.2 
* PHP ^8.2
* MySql ^8.0


### 🔧 Instalação

Depois de conferir os requisitos, chegou a hora da instalação da API

#### Ubuntu/Debian

Abra o terminal no diretório de preferência e clone o repositório:

```
git clone https://github.com/CLucasrodrigues22/CMS-Teste.git
```

Ainda no terminal, entre no diretório clonado:

```
cd /ApiCmsTask
```

Crie um arquivo .env para o ambiente:

```
cp .env.example .env
```

No arquivo .env, configure as seguintes variáveis de acordo com seu ambiente:

```
DB_DATABASE=(nome do banco)
DB_USERNAME=(usuário do banco)
DB_PASSWORD=(senha do banco)
```

Torne o script de configuração executavél:

```
chmod +x start.sh
```

Execute o script:

```
./start.sh
```


#### Windows

Abra o powershell no diretório de preferência e clone o repositório:

```
git clone https://github.com/CLucasrodrigues22/CMS-Teste.git
```

Ainda na mesma janela do powershell, entre no diretório clonado:

```
cd /ApiCmsTask
```

Crie um arquivo .env para o ambiente:

```
cp .env.example .env
```

No arquivo .env, configure as seguintes variáveis de acordo com seu ambiente:

```
DB_DATABASE=(nome do banco)
DB_USERNAME=(usuário do banco)
DB_PASSWORD=(senha do banco)
```

Na raiz do repositório, clique duas vezes no arquivo **start.bat** para configurar o ambiente


### ⌨️ E testes de estilo de codificação

Explique que eles verificam esses testes e porquê.

```
Dar exemplos
```

## 📦 Implantação

Adicione notas adicionais sobre como implantar isso em um sistema ativo

## 🛠️ Construído com

Mencione as ferramentas que você usou para criar seu projeto

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - O framework web usado
* [Maven](https://maven.apache.org/) - Gerente de Dependência
* [ROME](https://rometools.github.io/rome/) - Usada para gerar RSS

## 🖇️ Colaborando

Por favor, leia o [COLABORACAO.md](https://gist.github.com/usuario/linkParaInfoSobreContribuicoes) para obter detalhes sobre o nosso código de conduta e o processo para nos enviar pedidos de solicitação.

## 📌 Versão

Nós usamos [SemVer](http://semver.org/) para controle de versão. Para as versões disponíveis, observe as [tags neste repositório](https://github.com/suas/tags/do/projeto). 

## ✒️ Autores

Mencione todos aqueles que ajudaram a levantar o projeto desde o seu início

* **Um desenvolvedor** - *Trabalho Inicial* - [umdesenvolvedor](https://github.com/linkParaPerfil)
* **Fulano De Tal** - *Documentação* - [fulanodetal](https://github.com/linkParaPerfil)

Você também pode ver a lista de todos os [colaboradores](https://github.com/usuario/projeto/colaboradores) que participaram deste projeto.

## 📄 Licença

Este projeto está sob a licença (sua licença) - veja o arquivo [LICENSE.md](https://github.com/usuario/projeto/licenca) para detalhes.

## 🎁 Expressões de gratidão

* Conte a outras pessoas sobre este projeto 📢;
* Convide alguém da equipe para uma cerveja 🍺;
* Um agradecimento publicamente 🫂;
* etc.


---
⌨️ com ❤️ por [Armstrong Lohãns](https://gist.github.com/lohhans) 😊
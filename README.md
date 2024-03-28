# ApiCmsTask

Api-cms-task é uma aplicação genérica que permite aos usuários manipular totalmente tarefas em geral com título, descrição e status da mesma.

### Pré-requisitos

Tecnologias necessárias (recomendado):

* Composer ^2.7.2 
* PHP ^8.2
* MySql ^8.0
* NodeJS ^20.12

### 🔧 Instalação

Depois de conferir os requisitos, chegou a hora da implantação da API e Front-end

## 📦 Implantação da API

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

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

## 📦 Implantação do Front-end

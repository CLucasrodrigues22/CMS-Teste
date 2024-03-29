# ApiCmsTask

Api-cms-task é uma aplicação genérica que permite aos usuários manipular totalmente tarefas em geral com título, descrição e status da mesma.

### Pré-requisitos

Tecnologias necessárias (recomendado):

* Composer ^2.7.2 
* PHP ^8.2
* MySql ^8.0
* NodeJS ^20.12
* NPM ^10.5

### 🔧 Instalação

Depois de conferir os requisitos, chegou a hora da implantação da API e Front-end

## 📦 Implantação da Aplicação

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

#### Instalando dependencias e subindo servidor


Abra um terminal no diretório da aplicação e crie um arquivo .env para o ambiente:

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

Execute o script para instalar depedências e iniciar o servidor http da API:

```
./start.sh
```
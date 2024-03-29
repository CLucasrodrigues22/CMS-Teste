# Laravel-Task

Laravel-Task é um sistema que permite aos usuários criar, gerenciar e acompanhar tarefas ou atividades que precisam ser realizadas. Essa aplicação pode ser útil em uma variedade de contextos, como gestão de projetos, lista de afazeres pessoais, acompanhamento de prazos, entre outros.

### Pré-requisitos

Tecnologias necessárias (recomendado):

* Composer ^2.7.2 
* PHP ^8.2
* MySql ^8.0
* NodeJS ^20.12
* NPM ^10.5

### 🔧 Instalação

Depois de conferir os requisitos, chegou a hora da implantação da API e compilar o front-end

## 📦 Implantação da Aplicação

Após clonar esse repositório em sua máquina, essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento ou produção.

#### Instalando dependências e subindo servidor


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

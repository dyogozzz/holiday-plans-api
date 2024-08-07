This documentation is available in PT-BR and EN

There is a file called "Insomnia_xxx-xx-xx.json" in the root of the project which is an insomnia/postman file to more easily import and test the routes, in addition to the operation of the routes further down in this documentation.

A documentação está disponível em PT-BR e em EN

Tem um arquivo chamado "Insomnia_xxx-xx-xx.json" na raiz do projeto que é um arquivo insomnia/postman para importar e testar mais facilmente as rotas, além do funcionamento das rotas mais abaixo nessa documentação.

## EN

# Holiday Plans API

The API for managing vacation plans, with CRUD (Create, Read, Update, Delete) functionality and generating PDFs of the plans.

## Description

This API allows users to create, view, update and delete vacation plans. It also provides the functionality to generate PDFs for the vacation plans.

## Installation

### Prerequisites

Make sure you have Docker and Docker Compose installed on your machine.

### Configuration Steps

1. Clone the repository:

```bash
git clone https://github.com/dyogozzz/holiday-plans-api.git
```

2. Navigate to the project directory:

```bash
cd holiday-plans-api
```

3. Configure the environment:
- Copy the `.env.example` file, changing the name to '.env' and adjust the settings.

```bash
cp .env.example .env
```

4. Create and start the docker containers:

```bash
docker-compose up -d
```

5. Access the application container and install the dependencies:

```bash
docker-compose exec app composer install
```

6. Generate the application key:

```bash
docker-compose exec app php artisan key:generate
```

7. Run the migrations:

```bash
docker-compose exec app php artisan migrate
```

##
Usage

The api will be available at "http://127.0.0.1:8080/api"

Authentication:

Register user

POST to /register

  ```
    {
      "name: "Dyogo",
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }
  ```

Login

POST to /login

  ```
    {
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }
  ```

Holiday crud

Create

POST to /holiday-plans

  ```
    {
      "title" : "Beach Trip",
      "description": "Beach Trip Planning",
      "date": "2024-12-25",
      "location": "Copacabana Beach",
      "participants": ["Alice", Bob]
    }
  ```

List

GET to /holiday-plans

View

GET to /holiday-plans/{id}

Refresh

PUT to /holiday-plans/{id}

  ```
    {
      "title": "Mountain Trip",
      "description": "Mountain Trip Planning"
    }
  ```

Delete

DELETE for /holiday-plans/{id}

PDF Generation

POST for /holiday-plans/{id}/generate-pdf

##
Running Automated Tests

- Copy the `.env.testing.example` file, renaming it '.env.testing' and adjusting the APP_KEY.

```bash
docker-compose exec app php artisan test
```

##
Demo Video

[Demo Video](https://www.youtube.com/watch?v=N2OX8sSO7SU) (open in new tab)

##

## PT-BR

# Holiday Plans API

A API para gerenciar planos de férias, com funcionalidades para CRUD (Criar, Ler, Atualizar, Excluir) e geração de PDFs dos planos.

## Descrição

Esta API permite que os usuários criem, visualizem, atualizem e excluam planos de férias. Também oferece a funcionalidade de gerar PDFs para os planos de férias.

## Instalação

### Pré-requisitos

Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

### Passos para Configuração

1. Clone o repositório:

```bash
git clone https://github.com/dyogozzz/holiday-plans-api.git
```

2. Navegue até o diretório do projeto:

```bash
cd holiday-plans-api
```

3. Configure o ambiente:
  - Copie o arquivo `.env.example` mudando o nome para '.env' e ajuste as configurações.

```bash
cp .env.example .env
```

4. Crie e inicie os container docker:

```bash
docker-compose up -d
```

5. Acesse o container do aplicativo e instale as dependências:

```bash
docker-compose exec app composer install
```

6. Gere a chave de aplicação:

```bash
docker-compose exec app php artisan key:generate
```

7. Execute as migrations:

```bash
docker-compose exec app php artisan migrate
```

##
Uso

A api estará disponível em "http://127.0.0.1:8080/api"

Autenticação:
  
Registrar usuário 
  
POST para /register

  ```
    {
      "name: "Dyogo",
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }
  ```

  Login 
  
POST para /login

  ```
    {
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }
  ```

Holiday crud

Criar

POST para /holiday-plans

  ```
    {
      "title" : "Viagem para a praia",
      "description": "Planejamento de viagem para a praia",
      "date": "2024-12-25",
      "location": "Praia de Copacabana",
      "participants": ["Alice", Bob]
    }
  ```  

Listar

GET para /holiday-plans

Visualizar

GET para /holiday-plans/{id}

Atualizar

PUT para /holiday-plans/{id}

  ```
    {
      "title": "Viagem para a montanha",
      "description": "Planejamento de viagem para a montanha"
    }
  ```

Deletar

DELETE para /holiday-plans/{id}

Geração de PDF

POST para /holiday-plans/{id}/generate-pdf

##
Executando testes automatizados

- Copie o arquivo `.env.testing.example` mudando o nome para '.env.testing' e ajuste o APP_KEY.

```bash
docker-compose exec app php artisan test
```

##
Video demonstrativo

[Video de demonstração](https://www.youtube.com/watch?v=N2OX8sSO7SU) (abra em outra guia)
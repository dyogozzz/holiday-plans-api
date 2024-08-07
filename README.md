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

  ```
  cp .env.example .env
  ```

4. Crie e inicie os container docker:

  ```
  docker-compose up -d
  ```

5. Acesse o container do aplicativo e instale as dependências:

  ```
  docker-compose exec app composer install
  ```

6. Gere a chave de aplicação:

  ```
  docker-compose exec app php artisan key:generate
  ```

7. Execute as migrations:

  ```
  docker-compose exec app php artisan migrate
  ```

##
Uso

A api estará disponível em "http://127.0.0.1:8080/api"

Autenticação:
  
Registrar usuário 
  
POST to /register

    {
      "name: "Dyogo",
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }

  Login 
  
POST to /login

    {
      "email": "dyogozanetti@test.com",
      "password": "12345678"
    }

Holiday crud

Create

POST to /holiday-plans
    
    {
      "title" : "Viagem para a praia",
      "description": "Planejamento de viagem para a praia",
      "date": "2024-12-25",
      "location": "Praia de Copacabana",
      "participants": ["Alice", Bob]
    }

List

GET to /holiday-plans

View

GET to /holiday-plans/{id}

Update

PUT to /holiday-plans/{id}

    {
      "title": "Viagem para a montanha",
      "description": "Planejamento de viagem para a montanha"
    }

Delete

DELETE to /holiday-plans/{id}

PDF Generation

POST to /holiday-plans/{id}/generate-pdf

##
Executando testes automatizados

- Copie o arquivo `.env.testing.example` mudando o nome para '.env.testing' e ajuste o APP_KEY.

```
docker-compose exec app php artisan test
```

##
Video demonstrativo

[Video de demonstração](https://www.youtube.com/watch?v=N2OX8sSO7SU) (abra em outra guia)
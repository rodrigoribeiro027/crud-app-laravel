# Projeto CRUD de Candidatos

Este projeto é uma aplicação web básica para gerenciar candidatos, desenvolvida usando o framework Laravel. Ele permite listar, cadastrar, visualizar, editar e excluir candidatos. Abaixo você encontrará detalhes sobre as rotas disponíveis e como configurar e iniciar o projeto.

![Homepage image](https://github.com/rodrigoribeiro027/crud-app-laravel/blob/main/resources/images/crud.png)

## Requisitos

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- Banco de Dados (MySQL)

## Instalação

1. **Clone o repositório**:

    ```bash
    git clone https://github.com/rodrigoribeiro027/crud-app-laravel
    cd crud-app-laravel
    ```

2. **Instale as dependências**:

    ```bash
    composer install
    ```

3. **Configure o arquivo `.env`**:

    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as configurações do banco de dados:

    ```bash
    cp .env.example .env
    ```

    Atualize as variáveis de banco de dados no arquivo `.env`:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```

4. **Gere a chave da aplicação**:

    ```bash
    php artisan key:generate
    ```

5. **Execute as migrações**:

    ```bash
    php artisan migrate
    ```

## Inicializando o Projeto

Para iniciar o servidor de desenvolvimento do Laravel, execute:

```bash
php artisan serve
```


A aplicação estará disponível em [http://localhost:8000](http://localhost:8000).

## Rotas

### Listar Candidatos

- **Rota**: /
- **Método**: GET
- **Descrição**: Lista todos os candidatos.
- **View**: listar_candidatos

### Cadastrar Candidato

- **Rota**: /cadastrar-candidato
  - **Método**: GET
  - **Descrição**: Exibe o formulário de cadastro de candidato.
  - **View**: cadastrar_candidato
  
- **Rota**: /cadastrar-candidato
  - **Método**: POST
  - **Descrição**: Processa o cadastro de um novo candidato.
  - **Validação**:
    - `nome_candidato`: obrigatório, string, máximo 255 caracteres.
    - `telefone_candidato`: obrigatório, string, máximo 20 caracteres.
  - **Redirecionamento**: Retorna para a rota principal (/) com uma mensagem de sucesso se o cadastro for bem-sucedido.

### Mostrar Candidato

- **Rota**: /mostrar-candidato/{id_do_candidato}
- **Método**: GET
- **Descrição**: Exibe detalhes de um candidato específico.
- **View**: mostrar_candidato

### Editar Candidato

- **Rota**: /editar-candidato/{id_do_candidato}
  - **Método**: GET
  - **Descrição**: Exibe o formulário de edição de um candidato.
  - **View**: editar_candidato

- **Rota**: /editar-candidato/{id_do_candidato}
  - **Método**: PUT
  - **Descrição**: Processa a edição de um candidato existente.
  - **Validação**:
    - `nome`: obrigatório, string, máximo 255 caracteres.
    - `telefone`: obrigatório, string, máximo 20 caracteres.
  - **Redirecionamento**: Retorna para a rota principal (/) com uma mensagem de sucesso se a edição for bem-sucedida.

### Excluir Candidato

- **Rota**: /excluir-candidato/{id_do_candidato}
- **Método**: DELETE
- **Descrição**: Exclui um candidato específico.
- **Redirecionamento**: Retorna para a rota principal (/) com uma mensagem de sucesso se a exclusão for bem-sucedida.

### Listar Candidatos

- **Rota**: /listar-candidatos
- **Método**: GET
- **Descrição**: Lista todos os candidatos.
- **View**: listar_candidatos

### Buscar Candidatos

- **Rota**: /buscar-candidatos
- **Método**: GET
- **Descrição**: Busca candidatos pelo nome.
- **Parâmetros**:
  - `nome`: string para busca parcial no nome dos candidatos.
- **View**: listar_candidatos


## Estrutura do Projeto

O projeto segue a estrutura padrão do Laravel. As principais pastas e arquivos são:

- `app/Models/Candidato.php`: Modelo Eloquent para a entidade Candidato.
- `resources/views/`: Contém as views do projeto.
- `routes/web.php`: Define as rotas web da aplicação.

## Considerações Finais

Este projeto é um exemplo básico de CRUD (Create, Read, Update, Delete) utilizando o Laravel.

Para mais informações sobre Laravel, consulte a [documentação oficial](https://laravel.com/docs).

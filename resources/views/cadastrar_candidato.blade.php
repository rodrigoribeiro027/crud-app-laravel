<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Candidato</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Candidato</h1>
        <form action="/cadastrar-candidato" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_candidato">Nome</label>
                <input type="text" id="nome_candidato" name="nome_candidato" class="form-control" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="telefone_candidato">Telefone</label>
                <input type="text" id="telefone_candidato" name="telefone_candidato" class="form-control" placeholder="Digite seu telefone" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Cadastrar Usuário</title>
</head>

<body>
    <div id="customer-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de usuário</h1>
        <form action="/customers/cadastrar" method="POST">
            @csrf
            <div class="form-group">
            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" placeholder="Digite seu nome aqui.." name="name">
            <br />
            </div>
            <div class="form-group">
            <label class="form-label">Email:</label>
            <input class="form-control" type="text" placeholder="Digite seu email aqui.." name="email">
            <br />
            </div>
            <div class="form-group">
            <label class="form-label">Telefone:</label>
            <input class="form-control" type="text" placeholder="Digite seu telefone aqui.." name="phone">
            <br />
            </div>
            <button class="btn btn-success">Criar cadastro</button>
        </form>
    </div>
</body>

</html>

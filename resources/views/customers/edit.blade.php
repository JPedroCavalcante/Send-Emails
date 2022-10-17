<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Editar Cliente</title>
</head>
<body>
        <div id="customer-update-container" class="col-md-6 offset-md-3">
            
            <form action="/customers/update/{{$customer->id}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" id="id" value="{{$customer->id}}" id="id" />
              <label>Nome</label></br>
              <input type="text" name="name" id="name" value="{{$customer->name}}" class="form-control"></br>
              <label>Email</label></br>
              <input type="text" name="email" id="address" value="{{$customer->email}}" class="form-control"></br>
              <label>Telefone</label></br>
              <input type="text" name="mobile" id="mobile" value="{{$customer->phone}}" class="form-control"></br>
              <input type="submit" value="Atualizar" class="btn btn-success"></br>
          </form>
        
        </div>
      </div>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="./css/styleCustomers.css" type="text/css" />
</head>

<body>
    <br />
    <br />
    <div class="container">
        <h1 align="center">DISPARO DE E-MAILS</h1>


        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td><input type="checkbox" class="user-checkbox" name="customers[]" onchange='checkChange();' value="{{ $customer->id }}">
                        </td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="/customers/edit/{{ $customer->id }}" title="Editar Cliente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                            
                            <form method="POST" action="/customers/{{$customer->id }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method ('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Excluir Cliente" onclick="return confirm(&quot;Deseja realmente excluir?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" onclick="location.href='/customers/cadastro'">Criar Usuário</button>
            &nbsp;&nbsp;
            <button class="btn btn-dark send-email">Disparar Email's</button>
        </div>
        {{ $customers->links() }}
    </div>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    $(".send-email").click(function(){
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;
  
        if (selectRowsCount > 0) {
  
            var ids = $.map($("input[class='user-checkbox']:checked"), function(c){return c.value; });
  
            $.ajax({
               type:'POST',
               url:"{{ route('ajax.send.email') }}",
               data:{ids:ids},
               success:function(data){
                  alert(data.success);
               }
            });
  
        }else{
            alert("Você precisa selecionar pelo menos um cliente!");
        }
        console.log(selectRowsCount);
    });
    </script>

</body>

</html>

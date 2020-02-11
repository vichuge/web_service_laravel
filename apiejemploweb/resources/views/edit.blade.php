<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

</head>

<body>
    <h1>Editar pokemon</h1>
    <form action="{{url('update/'.$pokemon[0]['id'])}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        
        @include('form',['Modo'=>'editar'])
        <!--</div>-->
    </form>
</body>

</html>
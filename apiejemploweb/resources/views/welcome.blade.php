<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

</head>

<body>
    <button type="button" class="btn btn-success" onclick="window.location.href='{{url('create/')}}'">
        Nuevo
    </button>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemones as $pokemon)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pokemon['updated_at']}}</td>
                <td>{{$pokemon['name']}}</td>
                <td align="center">
                    <button type="button" class="btn btn-success"
                        onclick="window.location.href='{{url('edit/'.$pokemon['id'])}}'">
                        Editar
                    </button>
                    <!-- onclick="window.location.href='{{url('delete/'.$pokemon['id'])}}'" -->
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{url('delete/'.$pokemon['id'])}}'">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de mascotas</title>
</head>
<body>
    
    <button>Agregar Mascotas</button>

<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acciones</th>
    <tr>
        <tbody>
                @foreach($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->precio</td>
                        <td>
                            <button>Editar</button>
                            <button>Borrar</button>
                        </td>
                    </tr>
                @endforeach 
        </tbody>
    </thead>

</table>

</body>
</html>
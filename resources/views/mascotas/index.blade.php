@extends('layouts.default')
@section('contenido')


    <a href="{{route('mascotas.create')}}">
    <button>Agregar Mascotas</button>
    </a>


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
                        <td>{{ $mascota->precio }} </td>
                        <td>
                            <a href="{{route('mascotas.edit',$mascota->id)}}">
                            <button>Editar</button>
                            </a>
                            <form method="POST" action="{{route('mascotas.destroy',$mascota->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
        </tbody>
    </thead>

</table>

@endsection

<body>
    
</body>
</html>

@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo', 'Mascotas')
@section('subtitulo','Editar mascota')
@section('contenido')

<!--//se quita el html, dejando el form-->
   
<form action="{{route('mascotas.update',$mascota->id)}}" method="post">
        @csrf
        @method('PUT')

        <label >Especie</label>
            <select class="form-control" name="especie" required>
                <option disabled value="">Elige una especie</option>
                @foreach($especies as $especie)
                    <option value="{{$especie->id}}" 
                    @if($especie->id == $mascota->id_especie) selected @endif>
                    {{$especie->nombre}}</option>
                @endforeach
             </select>
        
        <br/>
        <label>Nombre</label>
        <input class="form-control" required type="text" name="nombre" placeholder="nombre de la mascota" value="{{$mascota->nombre}}">
        <br/>
        <label >Precio</label>
        <input required class="form-control" type="text" name="precio" value="{{$mascota->precio}}" placeholder="Precio de la mascota">
        <br/>
        <label >Fecha de nacimiento</label>
            <div>
            <input required type="date" name="nacimiento" value="{{$mascota->nacimiento}}">
        |   </div>
        <br/>
        <button type="submit" class="btn btn-primary">Actualizar mascota</button> 


    </form>

@endsection
@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo', 'Mascotas')
@section('subtitulo','Crear mascotas')
@section('contenido')

<!--//se quita el html, dejando el form-->
    <form action="{{route('mascotas.store')}}" method="post">
        @csrf
        <label >Especie</label>
            <select name="especie" required>
                <option disabled selected value="">Elige una especie</option>
                @foreach($especies as $especie)
                    <option value="{{$especie->id}}">{{$especie->nombre}}</option>
                @endforeach
             </select>
        
        <br/>
        <label>Nombre</label>
        <input required type="text" name="nombre" placeholder="nombre de la mascota">
        <br/>
        <label >Precio</label>
        <input required type="text" name="precio" placeholder="Precio de la mascota">
        <br/>
        <label >Fecha de nacimiento</label>
        <input required type="date" name="nacimiento">
        <br/>
        <button type="submit">Crear nueva mascota</button> 


    </form>

@endsection
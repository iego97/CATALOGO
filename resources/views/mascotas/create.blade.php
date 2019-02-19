@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo', 'Mascotas')
@section('subtitulo','Crear mascotas')
@section('contenido')

<!--//se quita el html, dejando el form-->
   
<form action="{{route('mascotas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label >Elige una especie</label>
            </div>
            <div>
                <select name="especie" required>
                    <option disabled selected value="">Elige una especie</option>
                    @foreach($especies as $especie)
                        <option value="{{$especie->id}}">{{$especie->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label >Nombre</label>
            <input required type="text" name="nombre" class="form-control"  placeholder="Ingrese el nombre">
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input required type="text"  name="precio" class="form-control"  placeholder="Ingresa el precio">
        </div>
       
       <div>
             <label>Fecha de nacimiento</label>
        
            <div>
                <input required type="date" name="nacimiento">
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary" style="margin-top:20px">Crear nueva mascota</button>
</form>

@endsection
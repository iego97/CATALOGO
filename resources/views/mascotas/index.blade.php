@extends('layouts.default')
@section('titulo_pagina','Mascotas | Lista de mascotas')
@section('titulo', 'Mascotas')
@section('subtitulo','Lista de mascotas')
@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabla de lista de mascotas</h3>
                </div>
                <div class="box-body">


                    <a href="{{route('mascotas.create')}}">
                    <button class="btn btn-primary">Agregar Mascotas</button>
                    </a>
                        <table class ="table">
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
                                                <td>${{ $mascota->precio }}.00 </td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('mascotas.edit',$mascota->id)}}">
                                                    <i class="fa fa-fw fa-edit"> </i>
                                                    </a>
                                                    <form method="POST" action="{{route('mascotas.destroy',$mascota->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach 
                                </tbody>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection
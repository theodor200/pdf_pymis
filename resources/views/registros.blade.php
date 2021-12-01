@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de personas que se registraron para descargar documento PDF</h2>
        <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres y apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Código de colaborador</th>
                <th scope="col">Puesto de colaborador</th>
                <th scope="col">Área colaborador</th>
                <th scope="col">Fecha de recepción</th>
                <th scope="col">Firma</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 1
            @endphp

            @foreach($data as $user)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$user->nombre_apellidos}}</td>
                <td>{{$user->dni}}</td>
                <td>{{$user->codigo_colaborador}}</td>
                <td>{{$user->puesto_colaborador}}</td>
                <td>{{$user->area_colaborador}}</td>
                <td>{{$user->fecha_recepcion}}</td>
                @if(file_exists(storage_path('/app/public/'.$user->firma)))
                    <td><img src= "{{asset('storage/'.$user->firma)}}" width="250" height="70"></td>
                @else
                    <td>No se encuentra el archivo de la firma.</td>
                @endif
                <td scope="col">
                    <a href="{{route('documento.generar.pdf.admin',['documento'=>'1','user'=>$user->id])}}" target="_blank" class="btn btn-primary mt-2 mb-2">Generar pdf</a>
                    <form action="{{route('datos.usuario.eliminar',$user->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mt-2 mb-2">Eliminar registro</button>
                    </form>

                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection

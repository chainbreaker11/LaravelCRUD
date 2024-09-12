@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Protagonistas de anime</h2>

    @if(Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}
        </div>
    @endif

    <a href="{{ url('anime/create') }}" class="btn btn-success">Protagonista de anime</a>
    <br/><br/>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Alias</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Meta</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animes as $anime)
            <tr>
                <td>{{ $anime->id }}</td>
                <td>{{ $anime->Nombre }}</td>
                <td>{{ $anime->Alias }}</td>
                <td>{{ $anime->Edad }}</td>
                <td>{{ $anime->Genero }}</td>
                <td>{{ $anime->Meta }}</td>
                <td>
                    <img src="{{ asset('storage/'.$anime->Foto) }}" width="100">
                </td>
                <td>
                    <a href="{{ url('/anime/'.$anime->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('/anime/'.$anime->id) }}" method="post" style="display:inline;">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $animes->links() }} <!-- Paginación -->
</div>
@endsection

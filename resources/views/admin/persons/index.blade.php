@extends('adminlte::page')

@section('title', 'Prueba')

@section('css')
@endsection

@section('content_header')
    <a href="{{ route('admin.persons.create') }}" class="btn btn-secondary float-right">Crear Usuario</a>
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-responsive" id="table">
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Pais</th>
                        <th>Telefono</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $per)
                        <tr>
                            <td>
                                {{ $per->identification }}
                            </td>
                            <td>
                                {{ $per->name . ' ' . $per->surname }}
                            </td>
                            <td>
                                {{ $per->email }}
                            </td>
                            <td>
                                {{ $per->country }}
                            </td>
                            <td>
                                {{ $per->phone }}
                            </td>
                            <td>
                                {{ $per->category->name }}
                            </td>
                            <td>
                                <form action="{{ route('admin.persons.destroy', $per) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('admin.persons.edit', $per) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

@endsection

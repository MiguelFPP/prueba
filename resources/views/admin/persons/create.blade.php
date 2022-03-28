@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Crear Nuevo Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.persons.store') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="identification">
                                    Identificacion
                                </label>
                                <input type="identification" min="1" name="identification" id="identification"
                                    class="form-control">
                                @error('identification')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Nombre
                                </label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Correo Electronico
                                </label>
                                <input type="text" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addres">
                                    Direccion
                                </label>
                                <input type="text" name="addres" id="addres" class="form-control">
                                @error('addres')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- //////////////////////////////////// --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">
                                    Pais
                                </label>
                                <select name="country" id="country" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['country'] }}">{{ $country['country'] }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname">
                                    Apellido
                                </label>
                                <input type="text" name="surname" id="surname" class="form-control">
                                @error('surname')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">
                                    Telefono
                                </label>
                                <input type="tel" name="phone" id="phone" class="form-control">
                                @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">
                                    Categoria
                                </label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success ">Guardar</button>

            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

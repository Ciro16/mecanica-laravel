
@extends('plantilla')

@section('contenido')
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- Si hay errores -->
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif

            <!-- Mensaje exito -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-body">

                <h5 class="card-title">CREE LOS USUARIOS!</h5>
            
                <form action="{{ route('usuario.crear') }}" method='POST'>
                    @csrf
                    <div class="form-group">
                        <input class='form-control' name='nombre' type="text" value="{{old('nombre')}}" placeholder='Nombre'>
                    </div>
                
                    <div class="form-group">
                        <input class='form-control' name='apellido' type="text" value="{{old('apellido')}}" placeholder='Apellido'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='email' type="email" value="{{old('email')}}" placeholder='Correo Electónico'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='usuario' type="text" value="{{old('usuario')}}" placeholder='Usuario'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='pass' type="password" placeholder='Ingrese contraseña'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='pass2' type="password" placeholder='Repetir contraseña'>
                    </div>

                    <input type="submit" class='btn btn-success btn-block' value='Crear Usuario' name='guardar'>

                </form>
            </div>    
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo Electrónico</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->usuario }}</td>
                            <td>
                                <a class='ml-3' style='font-size: 20px' href="{{ route('usuario.editar', [ 'id' => $usuario->id ]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class='ml-3 borrar' style='font-size: 20px' href="vistas/usuario/eliminar.php?id=<?php /*$row['id']*/ ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
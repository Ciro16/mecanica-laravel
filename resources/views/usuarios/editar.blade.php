
@extends('plantilla')

@section('contenido')
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="{{ route('usuario.actualizar', ['id' => $usuario->id]) }}" method='POST'>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nombreact">Nombre:</label>
                        <input class='form-control' type="text" name='nombreact' value="{{ $usuario->nombre }}">
                    </div>

                    <div class="form-group">
                        <label for="apellidoact">Apellido:</label>
                        <input class='form-control' type="text" name='apellidoact' value='{{ $usuario->apellido }}'>
                    </div>

                    <div class="form-group">
                        <label for="correoact">Correo Electrónico:</label>
                        <input class='form-control' type="email" name='correoact' value='{{ $usuario->email }}'>
                    </div>

                    <div class="form-group">
                        <label for="usuarioact">Usuario:</label>
                        <input class='form-control' type="text" name='usuarioact' value='{{ $usuario->usuario }}'>
                    </div>

                    <button class='btn btn-success' type='submit' name='actualizar'>Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
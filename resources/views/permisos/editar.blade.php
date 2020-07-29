
@extends('plantilla')

@section('contenido')    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="{{route('permiso.actualizar', ['id' => $permiso->id])}}" method='POST'>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombreact">Nombre</label>
                        <input class='form-control' type="text" name='nombreact' value='{{$permiso->nombre}}'>
                    </div>

                    <div class="form-group">
                        <label for="decripcionact">Descripcion</label>
                        <textarea class='form-control' name="descripcionact" rows="2">{{$permiso->descripcion}}</textarea>
                    </div>
                    
                    <button class='btn btn-success' type='submit' name='actualizar'>Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
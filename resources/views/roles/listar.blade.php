
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
                    
                    <h5 class="card-title">CREE LOS ROLES!</h5>
                    
                    <form action="{{ route('role.crear') }}" method='POST'>
                        @csrf
                        <div class="form-group">
                            <input class='form-control' name='nombre' type="text" placeholder='Nombre del rol'>
                        </div>
                        
                        <div class="form-group">
                            <textarea class='form-control' name='desc' rows="2" placeholder='Descripción'></textarea>
                        </div>
                    
                        <input type="submit" class='btn btn-success btn-block' value='Crear Rol' name='guardar'>
                    </form>
            </div>    
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont = 0 ?>

                    @foreach ($roles as $role)                    
                        <tr>
                            <td>{{ $role->nombre }}</td>
                            <td>{{ $role->descripcion }}</td>
                            <td>
                                <a class='ml-3' style='font-size: 20px' href="{{ route('role.editar', ['id' => $role->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('role.borrar', ['id' => $role->id]) }}" method="POST" class='myformroles'>
                                    @csrf
                                    @method('DELETE')
                                    <a class='ml-3 borrar' style='font-size: 20px' href="javascript:{}" onclick="document.querySelectorAll('.myformroles')[{{ $cont }}].submit()">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        <?php $cont++ ?>
                    @endforeach
                        
                    </tbody>
                </table>
        </div>
        
    </div>
</div>
@endsection
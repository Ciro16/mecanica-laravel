
@extends('plantilla')

@section('contenido')
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if( isset($_SESSION['mensaje']) ): ?>
                <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); endif; ?>

            <div class="card card-body">

                <h5 class="card-title">CREE LOS USUARIOS!</h5>
            
                <form action="vistas/usuario/crear.php" method='POST'>
                    <div class="form-group">
                        <input class='form-control' name='nombre' type="text" placeholder='Nombre'>
                    </div>
                
                    <div class="form-group">
                        <input class='form-control' name='apellido' type="text" placeholder='Apellido'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='correo' type="email" placeholder='Correo Electónico'>
                    </div>

                    <div class="form-group">
                        <input class='form-control' name='usuario' type="text" placeholder='Usuario'>
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
                    <?php
                    /*$query = "SELECT * FROM usuarios";
                    $result = mysqli_query($conexion, $query);

                    while ($row = mysqli_fetch_assoc($result)):*/ ?>
                        <tr>
                            <td><?php /*$row['nombre'] */?></td>
                            <td><?php /*$row['apellido']*/ ?></td>
                            <td><?php /*$row['correo_electronico']*/ ?></td>
                            <td><?php /*$row['usuario']*/ ?></td>
                            <td>
                                <a class='ml-3' style='font-size: 20px' href="vistas/usuario/editar.php?id=<?php /*$row['id']*/ ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class='ml-3 borrar' style='font-size: 20px' href="vistas/usuario/eliminar.php?id=<?php /*$row['id']*/ ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        
                    <?php /* endwhile; */ ?>
                    
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
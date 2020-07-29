<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-5" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{ strpos( Request::url(), 'usuario' ) ? 'active' : '' }}" href="{{ route('/') }}">Usuarios</a>
            <a class="nav-item nav-link {{ strpos( Request::url(), 'roles' ) ? 'active' : '' }}" href="{{ route('roles.listar') }}">Roles</a>
            <a class="nav-item nav-link {{ strpos( Request::url(), 'permisos' ) ? 'active' : '' }}" href="{{ route('permisos.listar') }}">Permisos</a>
       </div>

        <span class="navbar-text ml-auto mr-5 text-primary">
            <?php echo isset($_SESSION['usuario_data']) ? "Bienvenido " . $_SESSION['usuario_data']['nombre'] . ' ' . $_SESSION['usuario_data']['apellido'] : ''; ?>
        </span>

    </div>
</nav>

@yield('contenido')

<script src="https://kit.fontawesome.com/0b71cc9d92.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--<script src='js/validaciones.js'></script>-->
</body>
</html>
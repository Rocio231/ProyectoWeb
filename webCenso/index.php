<?php
    include('../webCenso/modelo/SingeltonDB.php');
    include('../webCenso/modelo/CRUD.php');

    $error = ''; // Inicializar la variable $error

    // Validar usuario y contraseña al enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $crud = new CRUD();

        // Verificar el usuario y la contraseña utilizando el método verificarLogin
        $validLogin = $crud->verificarLogin($user, $pass);

        if ($validLogin) {
            // Usuario y contraseña válidos, redirigir al menú de opciones
            header('Location: vista/menuOpciones.php');
            exit();
        } else {
            // Usuario y/o contraseña inválidos, mostrar mensaje de error
            $error = 'Usuario y/o contraseña incorrectos';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../webCenso/vista/css/estiloLogin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <form name="forma" action="" method="post">
            <h1 class="text-center">Login</h1>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user']) && !empty($error)): ?>
                <div id="error-msg" class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php elseif (!empty($error)): ?>
                <div id="error-msg" class="alert alert-danger" style="display: none;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese usuario">
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese contraseña">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

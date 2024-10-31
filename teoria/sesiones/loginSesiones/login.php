<?php
    session_start();

    //simular bbdd con usuarios
    $users = [
        [
            'username' => 'user1',
            'password' => 'pass1'
        ],
        [
            'username' => 'user2',
            'password' => 'pass2'
        ],
        [
            'username' => 'user3',
            'password' => 'pass3'
        ],
    ];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //verifico si el usuario existe
        foreach ($users as $user){
            if($user['username'] == $username && $user['password'] == $password){
                //si existe la envio a la pagina de bienvenida, pero antes, guardo en la sesion 
                $_SESSION['username'] = $username;
                header('Location: bienvenida.php');
            }else{
                $error = 'Usuario o contraseña incorrecto';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <h2>Inicio de sesion</h2>
    <h4><?php echo $error?></h4>
    <form action="login.php" method="POST">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required>
        <button type="submit">Iniciar sesion</button>
    </form>
</body>
</html>